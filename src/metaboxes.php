<?php
namespace WSS\Setup;

// Set up plugin class
class Metaboxes {

	function __construct() {

		// Move Yoast SEO metabox to bottom if present
		add_filter( 'wpseo_metabox_prio', array( $this, 'yoasttobottom' ) );

		// Move SEO Framework metabox to bottom if present
		add_filter( 'the_seo_framework_metabox_priority', array( $this, 'my_seo_metabox_priority' ) );

	}

	function yoasttobottom() {
			return 'low';
	}

	function my_seo_metabox_priority() {
			return 'low';
	}

}

?>
