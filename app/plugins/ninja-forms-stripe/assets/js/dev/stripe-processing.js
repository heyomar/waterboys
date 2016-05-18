Stripe.setPublishableKey(stripe_vars.publishable_key);
function stripeResponseHandler( status, response ) {

    var form_elem_id = jQuery( document ).data( 'stripe_form_id' );
    var form_id = form_elem_id.replace( 'ninja_forms_form_', '' );
    var form = jQuery( '#' + form_elem_id );

    if (response.error) {

        var param = response.error.param.replace("_", "-");

		// show errors returned by Stripe
        jQuery( '.ninja-forms-credit-card-' + param + '-error' ).html( response.error.message ).parent().addClass( 'ninja-forms-error' );

		// re-enable the submit button
		jQuery( ':submit' ).attr( 'disabled' , false);

        jQuery( '#nf_processing_' + form_id ).hide();
        jQuery( '#nf_submit_' + form_id ).show();
        jQuery( document ).triggerHandler( 'stripeError', response.error );

    } else {
    	
        // token contains id, last4, and card type
        var token = response['id'];
        // insert the token into the form so it gets submitted to the server
        jQuery( form ).append( '<input type="hidden" name="_stripe_token" id="stripe_token_' + form_id + '" value="' + token + '"/>' );
        // and submit
        jQuery( ':submit' ).attr( 'disabled', false );
        jQuery( form ).submit();

    } // End If Response Error


    // Reset the token for future submission attempts
    jQuery( '#stripe_token_' + form_id ).val( null );


} // End Stripe Response Handler


jQuery(document).ready(function($) {

	$( document ).on('beforeSubmit.stripe', function(e, formData, jqForm, options ){

        var form_id  = $( jqForm ).prop( 'id' ).replace( 'ninja_forms_form_', '' );

        if ( typeof $( '#stripe_token_' + form_id ).val() === 'undefined' && $( document ).data( 'submit_action' ) == 'submit' ) {

            var process_stripe = window['ninja_forms_form_' + form_id + '_settings'].stripe;

            if ( 1 == process_stripe ) {

                ninja_forms_default_before_submit( formData, jqForm, options );

                $( ':submit' ).attr( 'disabled', 'disabled' );
                $( document ).data( 'stripe_form_id', $( jqForm ).prop( 'id' ) );

                jQuery( '#nf_submit_' + form_id ).hide();
                jQuery( '#nf_processing_' + form_id ).show();

                var form = $( '#ninja_forms_form_' + form_id );

                // send the card details to Stripe
                Stripe.createToken( {
                    name:            form.find( '.card-name' ).val(),
                    number:          form.find( '.card-number' ).val(),
                    cvc:             form.find( '.card-cvc' ).val(),
                    exp_month:       form.find( '.card-expiry-month' ).val(),
                    exp_year:        form.find( '.card-expiry-year' ).val(),
                    address_line1:   form.find( '.billing-address.address1' ).val(),
                    address_line2:   form.find( '.billing-address.address2' ).val(),
                    address_city:    form.find( '.billing-address.city' ).val(),
                    address_state:   form.find( '.billing-address.state' ).val(),
                    address_zip:     form.find( '.billing-address.zip' ).val(),
                    address_country: form.find( '.billing-address.country' ).val()
                }, stripeResponseHandler );
         
                // prevent the form from submitting with the default action
                return false;  
            }

            return true;

        } // End Stripe Token Check

	}); // End Before Submit Stripe

}); // End Document Ready