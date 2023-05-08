<?php

/**
 * Helper class for child theme functions.
 *
 * @class FLChildTheme
 */
final class FLChildTheme {
    
    /**
	 * Enqueues scripts and styles.
	 *
     * @return void
     */
    static public function enqueue_scripts()
    {
        //wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800' );
        wp_enqueue_style( 'rw-base-css', FL_CHILD_THEME_URL . '/css/base.css' );
        wp_enqueue_style( 'rw-layout-css', FL_CHILD_THEME_URL . '/css/layout.css' );
        //wp_enqueue_style( 'rw-modules-css', FL_CHILD_THEME_URL . '/css/modules.css' );
        wp_enqueue_style( 'rw-gravity-forms-css', FL_CHILD_THEME_URL . '/css/gravityforms.css' );
        wp_enqueue_style( 'rw-theme-css', FL_CHILD_THEME_URL . '/style.css' );
        wp_enqueue_style( 'rw-woocommerce-css', FL_CHILD_THEME_URL . '/rw/rw-woocommerce.css' );
        wp_enqueue_style( 'rw-testimonials-css', FL_CHILD_THEME_URL . '/rw/rw-testimonials/rw-testimonials.css' );
        wp_enqueue_style( 'rw-fsg', FL_CHILD_THEME_URL . '/rw/rw-fsg/rw-fsg.css' );
        wp_enqueue_style( 'rw-consultant-directory', FL_CHILD_THEME_URL . '/rw/rw-fsg/rw-consultant-directory.css' );
        
        /* Check if Waypoints is loaded.
        // If Beaver Builder is used on a page waypoints gets loaded
        // If it isn't used waypoints is not loaded and the sticky nav doesn't work because of error */
        if ( class_exists( 'FLBuilderLoader' ) ) {
            wp_enqueue_script( 'waypoints', site_url() . '/wp-content/plugins/bb-plugin/js/jquery.waypoints.min.js', array( 'jquery' ), null , true );
        }
        
        wp_enqueue_script( 'rw-jquery', FL_CHILD_THEME_URL . '/rw/shared-js/rw-jquery.js', array( 'jquery' ), '1.0.0', true );
        
    }
        
    
    
}




