<?php

/* Use this filter to change the order of the social icons. 
========================================================================*/

function my_social_icons( $icons ) {
    $icons = array(
        
        'facebook',
        'linkedin',
        'twitter',
        'youtube',
        'instagram',
        'google',
        'yelp',
        'pinterest',
        'tumblr',
        'vimeo',
        'flickr',
        'dribbble',
        '500px',
        'blogger',
        'github',
        'rss',
        'email'
    );
    return $icons;
}
add_filter( 'fl_social_icons', 'my_social_icons' );

/* Shortcode which class the FLTheme Class
========================================================================*/

function rw_beaver_social_icons_shortcode() {
    
    /* Make Sure Beaver Builder Theme Is Installed */
    
    $check_theme = wp_get_theme( 'bb-theme' );
    
    if ( $check_theme->exists() ) {

        ob_start();

        FLTheme::social_icons($circle=false);
        
        return ob_get_clean();
        
    }

}
add_shortcode( 'rw-beaver-social', 'rw_beaver_social_icons_shortcode' );

?>