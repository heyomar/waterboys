<?php
require_once(__DIR__ . '/vendor/autoload.php');

/*
  If the request is a POST then continue processing, if it's anything else then
  die.
 */
if ($_POST) {
  if (file_exists(__DIR__ . '/.env')) {
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();
  }

  $dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD', 'DB_HOST']);

  // TODO: replace this with the production key
  \Stripe\Stripe::setApiKey('sk_live_s6A94UlFldNLpwFA99wpks3R');

  // var sanitization
  $prefix = getenv('DB_PREFIX') ?: 'WP_';

  // If ya ain't got a token, throw an exception
  if (!isset($_POST['stripeToken']))
    throw new Exception("Stripe Token Invalid");

  // try to charge the card or else throw relevant error
  try {
    \Stripe\Charge::create(array(
      'amount' => $_POST['donationAmount'],
      'currency' => 'usd',
      'source' => $_POST['stripeToken'],
      'metadata' => array(
        'player' => $_POST['player'],
        'group' => $_POST['group'],
        'email' => $_POST['email']
      )
    ));

    $db = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
    if ($db->connect_error)
      die('Error : (' . $db->connect_errno . ') ' . $db->connect_error);

    // SANITIZED DB INPUTS
    $player = '"' . $db->real_escape_string($_POST['player']) . '"';
    $group = '"' . $db->real_escape_string($_POST['group']) . '"';
    $donation = '"' . $db->real_escape_string($_POST['donationAmount']) . '"';
    $email = '"' . $db->real_escape_string($_POST['email']) . '"';

    $insert = $db->query("INSERT INTO wp_donations (plyr_id, grp_id, donation, email) VALUES ($player, $group, $donation, $email)");

    // TODO: delet this
    echo var_dump($db);
  } catch (\Stripe\Error\Card $e) {
    // Since it's a decline, \Stripe\Error\Card will be caught
    displayError($e);
  } catch (\Stripe\Error\RateLimit $e) {
    // Too many requests made to the API too quickly
    displayError($e);
  } catch (\Stripe\Error\InvalidRequest $e) {
    // Invalid parameters were supplied to Stripe's API
    displayError($e);
  } catch (\Stripe\Error\Authentication $e) {
    // Authentication with Stripe's API failed
    // (maybe you changed API keys recently)
    displayError($e);
  } catch (\Stripe\Error\ApiConnection $e) {
    // Network communication with Stripe failed
    displayError($e);
  } catch (\Stripe\Error\Base $e) {
    // Display a very generic error to the user, and maybe send
    // yourself an email
    displayError($e);
  } catch (Exception $e) {
    // Something else happened, completely unrelated to Stripe
    displayError($e);
  }
} else {
  die();
}

function displayError ($e) {
  $body = $e->getJsonBody();
  $err  = $body['error'];

  print('Status is:' . $e->getHttpStatus() . "\n");
  print('Type is:' . $err['type'] . "\n");
  print('Code is:' . $err['code'] . "\n");
  // param is '' in this case
  print('Param is:' . $err['param'] . "\n");
  print('Message is:' . $err['message'] . "\n");
}
