<?php

// ======================================================================== //		
// Move the Yoast SEO block to the bottom of edit pages
// ======================================================================== //   

    function yoasttobottom() {
        return 'low';
    }
    add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
    
// ======================================================================== //



// ======================================================================== //		
// Move the SEO Framework block to the bottom of edit pages
// ======================================================================== //  

    add_filter( 'the_seo_framework_metabox_priority', 'my_seo_metabox_priority' );
    function my_seo_metabox_priority() {
        //* Accepts 'high', 'default', 'low'. Default is 'high'.
        return 'low';
    }

// ======================================================================== //  
