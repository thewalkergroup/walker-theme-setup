<?php
namespace WSS\Setup;

// Set up plugin class
class ACF {

	function __construct() {

		// Hide ACF menu item in Production
		if (WP_ENV == 'production') {
			add_filter('acf/settings/show_admin', '__return_false');
		}
		
	}

}

 ?>
