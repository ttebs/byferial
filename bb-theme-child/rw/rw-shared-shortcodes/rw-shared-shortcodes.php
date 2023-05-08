<?php

function rw_h1_full_width_row_shortcode($atts) {
    
    extract(shortcode_atts(array(
		'page_title' => '',
	), $atts));
    
    $output = '';
    
    $output .= '<div class="fl-row fl-row-full-width fl-row-bg-none h1-full-width-row" data-node="rw-h1">';
    $output .= '    <div class="fl-row-content-wrap">';
    $output .= '        <div class="fl-row-content fl-row-fixed-width fl-node-content">';
    $output .= '            <div class="fl-col-group">';
    $output .= '                <div class="fl-col">';
    $output .= '                    <div class="fl-col-content fl-node-content">';
    $output .= '                        <div class="fl-module fl-module-rich-text">';
    $output .= '                            <div class="fl-module-content fl-node-content">';
    $output .= '                                <div class="fl-rich-text">';
    $output .= '                                    <h1>' . $page_title . '</h1>';
    $output .= '                                </div>';
    $output .= '                           </div>';
    $output .= '                        </div>';
    $output .= '                    </div>';
    $output .= '                </div>';
    $output .= '            </div>';
    $output .= '        </div>';
    $output .= '    </div>';
    $output .= '</div>';
    
    return $output;
    
}
add_shortcode( 'rw-h1-full-width-row', 'rw_h1_full_width_row_shortcode' );



function rw_breadcrumbs_shortcode($atts) {
    
    $output = '';

    $output .= '<div class="fl-row fl-row-full-width fl-row-bg-none rw-breadcrumbs" data-node="rw-bc">';
    $output .= '    <div class="fl-row-content-wrap">';
    $output .= '        <div class="fl-row-content fl-row-fixed-width">';
    $output .= '            <div class="fl-col-group">';
    $output .= '                <div class="fl-col">';
    $output .= '                    <div class="fl-col-content fl-node-content">';
    $output .= '                        <div class="fl-module fl-module-html">';
    $output .= '                            <div class="fl-module-content">';
    $output .= '                                <div class="fl-html">';
    $output .= '                                    ' . do_shortcode("[wpseo_breadcrumb]");
    $output .= '                                </div>';
    $output .= '                            </div>';
    $output .= '                        </div>';
    $output .= '                    </div>';
    $output .= '                </div>';
    $output .= '            </div>';
    $output .= '        </div>';
    $output .= '    </div>';
    $output .= '</div>';

    return $output;

}
add_shortcode( 'rw-breadcrumbs-shortcode', 'rw_breadcrumbs_shortcode' );



/* Add Menus by Shortcode
/* Useful for including menu in a sidebar without
/* using the WP-Sidebar Widgets.
/* Also with Beaver Builder the Menu Option
/* doesn't allow for a title to be added
------------------------------------------------*/

function rw_menu_function( $atts, $content = null ) {
    extract(
        shortcode_atts(
            array( 'menu_id' => null, ),
            $atts
        )
    );
    return wp_nav_menu(
        array(
            'menu' => $menu_id,
            'echo' => false
        )
    );
}
add_shortcode( 'rw-menu', 'rw_menu_function' );


/* !Add Search By Shortcode ------------------------------------------------*/

function rw_search_shortcode() {
	
	ob_start();
	
	FLTheme::nav_search();
	
	$output = ob_get_clean();
	
	return $output;

}
add_shortcode( 'rw-beaver-search', 'rw_search_shortcode' );


/* !Year Shortcode ------------------------------------------------*/

function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('year', 'year_shortcode');



?>