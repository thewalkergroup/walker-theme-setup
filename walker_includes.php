<?php
/**
 * The Walker Group includes
 *
 * The $wss_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$wss_includes = [
  'lib/walker-theme-setup/walker_setup.php',              // WSS specific setup
  'lib/walker-theme-setup/walker_branding.php',           // Brand with The Walker Group logos
  'lib/walker-theme-setup/wp_bootstrap_navwalker.php', // Bootstrap Navwalker
  'lib/walker-theme-setup/metaboxes.php',              // Register and manipulate metaboxes
  'lib/walker-theme-setup/custom_admin.php'            // Add custom scripts and styles to admin

];

foreach ($wss_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
