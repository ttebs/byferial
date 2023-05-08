<?php

function rw_beaver_social_icons_shortcode() {

//$settings = get_options();
    
    $settings = get_theme_mods('fl_theme_mods');
    
    print_r($settings);

    if ( isset( $settings[ $key ] ) ) {
        return $settings[ $key ];
    } else {
        return '';
    }

    $icons = apply_filters( 'fl_social_icons', array(
        'facebook',
        'twitter',
        'google',
        'linkedin',
        'yelp',
        'xing',
        'pinterest',
        'tumblr',
        'vimeo',
        'youtube',
        'flickr',
        'instagram',
        'skype',
        'dribbble',
        '500px',
        'blogger',
        'github',
        'rss',
        'email',
    ) );
    
    print_r($icons);

?>


<div class="fl-social-icons">
<?php

foreach ( $icons as $icon ) {

	$link_target = ' target="_blank"';

	if ( ! empty( $settings[ 'fl-social-' . $icon ] ) ) {

		$setting = $settings[ 'fl-social-' . $icon ];
		$icon_sreen_reader = '<span class="sr-only">' . ucfirst( $icon ) . '</span>';
		if ( 'email' == $icon ) {
			$setting = 'mailto:' . $setting;
			$link_target = '';
			$icon = 'envelope';
		}

		if ( ! $circle ) {

			if ( 'blogger' == $icon ) {
				$class = 'fl-icon fl-icon-color-' . $settings['fl-social-icons-color'] . ' fl-icon-' . $icon . ' fl-icon-' . $icon . '-regular';
				echo '<a href="' . $settings[ 'fl-social-' . $icon ] . '"' . $link_target . ' class="' . $class . '">' . $icon_sreen_reader . '</a>';
			} else {
				printf( '<a href="%s"%s>%s<i class="fa fa-%s %s"></i></a>', $setting, $link_target, $icon_sreen_reader, $icon, $settings['fl-social-icons-color'] );
			}
		} else {

			if ( 'blogger' == $icon ) {
				$class = 'fl-icon fallback fl-icon-color-' . $settings['fl-social-icons-color'] . ' fl-icon-' . $icon . ' fl-icon-' . $icon;
				$class .= $circle ? '-circle' : '-regular';
				echo '<a href="' . $settings[ 'fl-social-' . $icon ] . '"' . $link_target . ' class="' . $class . '">' . $icon_sreen_reader . '</a>';
			} else {
				printf( '<a href="%s" class="fa-stack icon-%s"%s>%s
				<i class="fa fa-circle fa-stack-2x %s"></i>
				<i class="fa fa-%s %s fa-stack-1x fa-inverse"></i>
				</a>',
					$setting,
					$icon,
					$link_target,
					$icon_sreen_reader,
					$settings['fl-social-icons-color'],
					$icon,
					$settings['fl-social-icons-color']
				);
			}
		}
	}// End if().
}// End foreach().

?>
</div>

<?php


}
add_shortcode( 'rw-beaver-social', 'rw_beaver_social_icons_shortcode' );

?>