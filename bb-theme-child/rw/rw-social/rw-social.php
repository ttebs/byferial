<?php

// Add RW Social Icon Shortcode
function rw_social_icons_shortcode() {
	
	$rw_facebook_url = "https://www.facebook.com/RadicalWebsStrategicInternetMarketing";
	$rw_twitter_url = "https://twitter.com/RadicalWebs";
	$rw_instagram_url = "";
	$rw_linkedin_url = "https://www.linkedin.com/company/radical-webs-inc";
	$rw_googleplus_url = "https://plus.google.com/+Radicalwebs";
	$rw_youtube_url = "https://www.youtube.com/radicalwebsmarketing";

	$output = '<ul class="rw-social-icons">';
			if ($rw_facebook_url != "") {
			$output .= '<li class="social"><a href="' . $rw_facebook_url . '"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>';
			}
			if ($rw_twitter_url != "") {
			$output .= '<li class="social"><a href="' . $rw_twitter_url . '"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
			}
			if ($rw_instagram_url != "") {
			$output .= '<li class="social"><a href="' . $rw_instagram_url . '"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
			}
			if ($rw_googleplus_url != "") {
			$output .= '<li class="social"><a href="' . $rw_googleplus_url . '"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
			}
			if ($rw_linkedin_url != "") {
			$output .= '<li class="social"><a href="' . $rw_linkedin_url . '"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
			}
			if ($rw_youtube_url != "") {
			$output .= '<li class="social"><a href="' . $rw_youtube_url . '"><i class="fa fa-youtube" aria-hidden="true"></i></a>';
			}
		$output .= '</ul>';
	
	return $output;

}
add_shortcode( 'rw-social', 'rw_social_icons_shortcode' );

?>