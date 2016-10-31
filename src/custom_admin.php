<?php

use Roots\Sage\Assets;


/**
 * Add custom admin styles and scripts
 */


add_action('admin_enqueue_scripts','custom_admin_assets');

function custom_admin_assets() {
    if(class_exists('Roots\Sage\Assets')) {
        wp_enqueue_style( 'admin-style', Assets\asset_path('styles/admin-style.css') );
        wp_enqueue_script( 'admin-script', Assets\asset_path('scripts/admin-script.js') );
    }
}
