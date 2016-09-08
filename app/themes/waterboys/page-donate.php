<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="wb__page-hero dn__hero-bg">
      <h2 class="mission__title"> Donate<br>
        <img class="mission__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png">
      </h2>
    </div>

    <div class="dn__flex-ctn">
      <div class="dn__now-ctn">
        <div class="dn__now-copy-ctn">
          <p class="copy-highlight">
             Each deep borehole well costs $45,000 to install. Just one can serve up to 7,500 people. That’s $6 per person. Six dollars can save a life, send a child to school, and return countless hours.
          </p>
          <p>
            For an issue with impact this broad, every contribution counts: every dollar, every drop.
          </p>
          <div class="dn__select-ctn">
            <h3 class="wb__red-sm-title">Donate Now</h3>
            <div class="dn__select-amount-ctn">

              <div class="dn__flex-ctn"><span class="dn__select-amount-btn" data-donation="6">$6</span>
              <p>to provide water access to one person</p></div>

              <div class="dn__flex-ctn"><span class="dn__select-amount-btn" data-donation="30">$30</span>
              <p>to provide water access to one household</p></div>

              <div class="dn__flex-ctn"><span class="dn__select-amount-btn" data-donation="100">$100</span>
              <p>to save 35,000 hours spent on retrival</p></div>

              <div class="dn__flex-ctn"><span class="dn__select-amount-btn" data-donation="300">$300</span>
              <p>to prevent a 181,440 mile jerrycan carry</p></div>

              <div class="dn__flex-ctn">
                <label class="" for="custom-amount">$ Donation Amount</label>
                <input type="number" id="custom-amount" name="custom-amount" value="">
              </div>

              <div class="dn__flex-ctn" id="playerInput"></div>

              <script src="https://checkout.stripe.com/checkout.js"></script>

              <button id="donatebutton" class="form-button">Donate</button>

              <script>
                var player = '0' // scoped here so we can set it externally from CC call

                jQuery('#custom-amount').on('blur', function () {
                  jQuery(this).val(parseFloat(jQuery(this).val()).toFixed(2))
                })

                jQuery.QueryString = (function (a) {
                  if (a == '') return {}
                  var b = {}
                  for (var i = 0; i < a.length; ++i) {
                    var p=a[i].split('=', 2)
                    if (p.length != 2) continue
                    b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, ' '))
                  }
                  return b;
                })(window.location.search.substr(1).split('&'));

                if (!jQuery.QueryString.plyr) {
                  var playerInput = '<label class="" for="custom-amount">Donation Team</label>'
                  playerInput += '<select>'
                  playerInput += '<option value="0">No Team</option>'
                  <?php
                    $players = new WP_Query( array('post_type' => 'player', 'posts_per_page' => -1 , 'orderby' => 'title' , 'order' => 'ASC') );
                    while ($players->have_posts()) : $players->the_post();
                  ?>
                      playerInput += '<option value="<?php the_ID(); ?>">'
                      playerInput += '<?php the_field('player_name'); ?> &mdash; '
                      playerInput += '<?php the_field('team'); ?>'
                      playerInput += '</option>'
                  <?php
                    endwhile;
                  ?>
                  playerInput += '</select>'

                  jQuery('#playerInput').html(playerInput)

                  jQuery('#playerInput select').on('change', function () {
                    player = jQuery('#playerInput select option:selected').val()
                  })
                }

                var handler = StripeCheckout.configure({
                  // TODO: change to production key
                  key: 'pk_test_dAnBHTFaqcq516ofFXuP2izz',
                  image: '',
                  locale: 'auto',
                  token: function (token) {
                    // optional query strings
                    var group = '0'
                    if (jQuery.QueryString.grp) {
                      group = jQuery.QueryString.grp
                    }

                    if (jQuery.QueryString.plyr) {
                      player = jQuery.QueryString.plyr
                    }

                    jQuery.ajax({
                      url: '/donations.php',
                      method: 'POST',
                      data: {
                        email: token.email,
                        player: player,
                        group: group,
                        donationAmount: jQuery('#custom-amount').val() * 100,
                        stripeToken: token.id
                      }
                    }).done(function (data) {
                      console.log(data)
                      // TODO: take user to thank you page
                    })
                  }
                });

                jQuery('#donatebutton').on('click', function(e) {
                  if (jQuery('#custom-amount').val()) {
                    // Open Checkout with further options:
                    handler.open({
                      name: 'The Chris Long Foundation',
                      description: 'Waterboys Donation',
                      zipCode: true,
                      billingAddress: true,
                      amount: jQuery('#custom-amount').val() * 100
                    })
                    e.preventDefault()
                  } else {
                    alert("Please enter a donation amount before continuing.")
                  }
                });

                // Close Checkout on page navigation:
                jQuery(window).on('popstate', function() {
                  handler.close()
                })
              </script>
            </div>
          </div>
        </div>
      </div>



      <div class="cn__sidebar-ctn">
        <div class="cn__sidebar-info">
          <p>
            Water scarcity limits millions of people in the developing world in ways you might not imagine.
          </p>
          <h3 class="wb__red-sm-title">Education</h3>
          <p class="wb__player__content__body">
            Women are primarily responsible for retrieving water, and often have to bring their children. Reducing the distance to a water source by just 15 minutes results in a 12% increase in girls’ school attendance.
          </p>

          <h3 class="wb__red-sm-title">Economy</h3>
          <p class="wb__player__content__body">
            People living in Sub-Saharan Africa spend more than 40 billion hours per year retrieving water. Water access frees time to generate income.
          </p>

          <h3 class="wb__red-sm-title">Agriculture</h3>
          <p class="wb__player__content__body">
            With dependable access to ample drinking water, families can afford to farm.
          </p>

          <h3 class="wb__red-sm-title">Health</h3>
          <p class="wb__player__content__body">
            Water-related diseases currently cause nearly 1 in 5 deaths of children under 5. It doesn’t have to be this way.
          </p>
        </div>
      </div>
    </div>
    <div class="st__bar-ctn">
      <p>14 million Tanzanians lack access to safe water. Dig deep with us. &nbsp;</p>
    </div>
    <?php endwhile; ?>
      <?php endif ?>
        <?php get_footer(); ?>
