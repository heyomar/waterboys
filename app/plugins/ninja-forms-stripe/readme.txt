=== Ninja Forms - Stripe Extension ===
Contributors: kstover, jameslaws
Donate link: http://ninjaforms.com
Tags: form, forms
Requires at least: 4.1
Tested up to: 4.3
Stable tag: 1.0.10

License: GPLv2 or later

== Description ==
The Ninja Forms Stripe Extension allows users to accept payments through their forms using the Stripe Payments system.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the `ninja-forms-stripe` directory to your `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Visit the 'Forms' menu item in your admin sidebar
4. When you create a form, you will have now have Stripe options on the form settings page.

== Use ==

For help and video tutorials, please visit our website: [NinjaForms.com](http://ninjaforms.com)

== Changelog ==

= 1.0.10 (09 September 2015) =

*Changes:*

* Customers should now be created in Stripe after their charge.

= 1.0.9 (08 September 2015) =

*Bugs:*

* Fixed a bug that could cause multiple Stripe enabled forms to fail if they were on the same page.

= 1.0.8 (12 May 2015) =

*Bugs:*

* Fixed a bug that could cause failed transactions to prevent future transactions from resolving properly.

*Changes:*

* Changed the position of the live and test keys to match the Stripe Dashboard.

= 1.0.7 (17 November 2014) =

*Bugs:*

* Removed the "is this a Stripe Item" option from non-processing fields like descriptions and submit buttons.
* Updated i18n support.
* Fixed a bug that prevented a Stripe form from working properly on a page with a non-Stripe form.

= 1.0.6 (22 September 2014) =

*Changes:*

* Added a .pot file for translation.

= 1.0.5 (12 August 2014) =

*Bugs:*

* Fixed a bug with thousand separators.
 
* Fixed a bug that prevented non-USD currency from being selected in some cases.

*Changes:*

* Added a shortcode for displaying/sending Stripe charge ids: [nf_stripe_charge_id].

= 1.0.4 (24 July 2014) =

*Changes:*

* Compatibility with Ninja Forms 2.7.

= 1.0.3 =

*Bugs:*

* Stripe should now work properly in all multi-part forms implementations.

= 1.0.2 =

*Changes:*

* More logic to help prevent conflicts with other Stripe plugins.

= 1.0.1 =

*Changes:*

* Added some logic to detect and attempt to prevent conflicts with other Stripe plugins.

= 1.0 =

* Initial release