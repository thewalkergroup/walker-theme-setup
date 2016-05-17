<?php
namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function wss_setup() {
  //add_theme_support( 'custom-logo' );

}
add_action('after_setup_theme', __NAMESPACE__ . '\\wss_setup');