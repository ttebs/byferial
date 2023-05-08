<?php
// Preamble
//---------------------------

// Show Questionnaire Answers and Calculation Results
//------------------------------------------------------

echo '<div class="rw-fsg-section">';
echo '	<div class="rw-fixed-width">';
echo '	<h2>Your Questionnaire Answers</h2>';
echo '	<div class="rw-fsg-qresults">';
echo '		<div class="rw-tr">';
echo '			<div class="rw-td">';
echo '				<div class="vtable">';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Head to Floor:</div>';
echo '						<div class="rw-td">' . $head_to_floor . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Bust to Floor:</div>';
echo '						<div class="rw-td">' . $bust_to_floor . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Hip to Floor:</div>';
echo '						<div class="rw-td">' . $hip_to_floor . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Kneecap to Floor:</div>';
echo '						<div class="rw-td">' . $kneecap_to_floor . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Full Bust Circumference:</div>';
echo '						<div class="rw-td">' . $full_bust_circumference . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Bra Cup Size:</div>';
echo '						<div class="rw-td">' . $bra_cup_size . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Waist Circumference:</div>';
echo '						<div class="rw-td">' . $waist_circumference . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Full Hip Circumference:</div>';
echo '						<div class="rw-td">' . $full_hip_circumference . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Wrist Circumference:</div>';
echo '						<div class="rw-td">' . $wrist_circumference . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Ankle Circumference:</div>';
echo '						<div class="rw-td">' . $ankle_circumference . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Neck Length:</div>';
echo '						<div class="rw-td">' . $neck_length . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Neck Circumference:</div>';
echo '						<div class="rw-td">' . $neck_circumference . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Shoulders:</div>';
echo '						<div class="rw-td">' . $shoulders . '</div>';
echo '					</div>';
echo '				</div>';
echo '			</div>';
echo '			<div class="rw-td">';
echo '				<div class="vtable">';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Prominent Features:</div>';
echo '						<div class="rw-td">';
								if (!empty($prominent_features)) {
echo '							<ul>';
								foreach ( $prominent_features as $feature ) :
echo '								<li>' . $feature . '</li>';
								endforeach;
echo '							<ul>';
								} else {
echo '							No Prominent Features';									
								}
echo '						</div>';
echo '					</div>';

echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Face Shape:</div>';
echo '						<div class="rw-td">' . $face_shape . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Weight (lbs):</div>';
echo '						<div class="rw-td">' . $weight . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Age:</div>';
echo '						<div class="rw-td">' . $age . '</div>';
echo '					</div>';


echo '				</div>';
echo '			</div>';	
echo '		</div>';
echo '	</div>';
	
echo "	<h2>Your Fashion &amp; Style Guide Determination</h2>";	

echo '	<div class="rw-fsg-qresults">';
echo '		<div class="rw-tr">';
echo '			<div class="rw-td">';
echo '				<div class="vtable">';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Vertical Body Type:</div>';
echo '						<div class="rw-td">' . $vertical_body_type['vertical_body_type'] . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Horizontal Body Shape:</div>';
echo '						<div class="rw-td">' . $horizontal_body_shape . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Bust Size:</div>';
echo '						<div class="rw-td">' . $bust_size . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Bone Structure:</div>';
echo '						<div class="rw-td">' . $bone_structure . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Neck Length:</div>';
echo '						<div class="rw-td">' . $neck_length . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Shoulder Type:</div>';
echo '						<div class="rw-td">' . $shoulders . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Face Shape:</div>';
echo '						<div class="rw-td">' . $face_shape . '</div>';
echo '					</div>';
echo '					<div class="rw-tr">';
echo '						<div class="rw-th">Height:</div>';
echo '						<div class="rw-td">' . $height . '</div>';
echo '					</div>';
echo '				</div>';
echo '			</div>';	
echo '		</div>';
echo '	</div>';

echo "</div>";
echo "</div>";

echo '<div class="rw-color-bar"></div>';



//$content_block = get_page_by_path( 'what-your-clothes-say-about-you', OBJECT, 'fsg_content_blocks' );
//echo "<h2>" . $content_block->post_title . "</h2>";
//echo wpautop( apply_filters( 'the_content', $content_block->post_content, -1 ) );

$content_block = get_page_by_path( 'what-your-clothes-say-about-you', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block);

$content_block = get_page_by_path( 'you-are-in-control', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

$content_block = get_page_by_path( 'the-impeccable-image', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block);

echo '<div class="rw-color-bar"></div>';

// Introduction
//------------------------------------------------------
$content_block = get_page_by_path( 'fashion-style-guide-information', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block);
echo '<div class="rw-color-bar"></div>';



// Personal Style Guide Intro
//------------------------------------------------------
$content_block = get_page_by_path( 'your-personal-style-guide', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');



// Vertical Body Shape
//------------------------------------------------------
$content_block = get_page_by_path( 'vertical-body-shape', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// Display the Body Shape According To the Calculations
if ($vertical_body_type['vertical_body_type'] == "Balanced Body") {
	
	$content_block = get_page_by_path( 'balanced-body', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($vertical_body_type['vertical_body_type'] == "Long Legs / Short Body") {

	$content_block = get_page_by_path( 'long-legs-short-body', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($vertical_body_type['vertical_body_type'] == "Short Legs / Long Body") {
	
	$content_block = get_page_by_path( 'short-legs-long-body', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} else {

	echo "<p>Vertical Body Type Calculation or Display Error</p>";

}



// Horizontal Body Shape
//------------------------------------------------------
$content_block = get_page_by_path( 'horizontal-body-types', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

// Display the Body Shape According To the Calculations
if ($horizontal_body_shape == "Oval") {

	$content_block = get_page_by_path( 'fuller-figure', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} elseif ($horizontal_body_shape == "Hourglass") {

	$content_block = get_page_by_path( 'hourglass-figure', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} elseif ($horizontal_body_shape == "Inverted Triangle") {
	
	$content_block = get_page_by_path( 'inverted-triangle', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} elseif ($horizontal_body_shape == "Triangle") {

	$content_block = get_page_by_path( 'triangle-pear-shape', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} elseif ($horizontal_body_shape == "Rectangle") {
	
	$content_block = get_page_by_path( 'rectangle', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} elseif ($horizontal_body_shape == "Diamond") {
	
	$content_block = get_page_by_path( 'diamond', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} else {

	echo "<p>Horizontal Body Type Calculation or Display Error</p>";

}



// Body & Bone Structure
//------------------------------------------------------
$content_block = get_page_by_path( 'body-scale-bone-structure', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

if ($bone_structure == "Small") {

	$content_block = get_page_by_path( 'small-bone-structure', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($bone_structure == "Medium") {
	
	$content_block = get_page_by_path( 'medium-bone-structure', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($bone_structure == "Large") {

	$content_block = get_page_by_path( 'large-bone-structure', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($bone_structure == "Extra Large") {
	
	$content_block = get_page_by_path( 'extra-large-bone-structure', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} else {

	echo "<p>Bone Structure Calculation or Display Error</p>";

}

$content_block = get_page_by_path( 'body-scale-bone-structure', OBJECT, 'fsg_content_blocks' );
$content_block_gallery = get_field('rw_section_gallery', $content_block->ID);
$size = 'medium'; // (thumbnail, medium, large, full or custom size)

if ( $content_block_gallery ):
echo '<div class="rw-fsg-section">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-gallery fsg-col-3">';
foreach( $content_block_gallery as $image ):
echo '			<div class="item">';
echo '				<img src="' . esc_url($image['sizes']['medium']) . '" alt="' . esc_attr($image['alt']) . '" width="184" height="216" />';
echo '				<p>' . esc_html($image['caption']) . '</p>';
echo '			</div>';
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';
endif;




// Necklines
//------------------------------------------------------//
$content_block = get_page_by_path( 'necklines', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

if ($bust_size == "Small") {

	$content_block = get_page_by_path( 'small-bust', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} elseif ($bust_size == "Medium") {
	
	$content_block = get_page_by_path( 'medium-bust', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} elseif ($bust_size == "Large") {
	
	$content_block = get_page_by_path( 'large-bust', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} else {

echo "<p>Bust Size Calculation or Display Error</p>";

}

$content_block = get_page_by_path( 'necklines', OBJECT, 'fsg_content_blocks' );
$rw_section_images = get_field('rw_section_images', $content_block->ID);

//echo "<pre>";
//print_r($rw_section_images);
//echo "</pre>";

$size = 'full'; // (thumbnail, medium, large, full or custom size)

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Sweetheart":
			if ($bust_size == "Medium") :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Wide Strap":
			if ( ($bust_size == "Medium") || ($bust_size == "Large") ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Square":
			if ($bust_size == "Large") :
				$overlay_class = "fsg-bad";
			elseif ( ($horizontal_body_shape == 'Triangle') || ($bust_size == "Small")  || ($bust_size == "Medium") ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Gathered":
			if ( in_array("Large Bust", $prominent_features) ) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-bad";
			elseif ( in_array("Small Bust", $prominent_features) ) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif ($bust_size == "Small") :
				$overlay_class = "fsg-good";
			elseif ($bust_size == "Large") :	
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Ruffle Front":
			if ($bust_size == 'Small') :
				$overlay_class = "fsg-good";
			elseif ( ($bust_size == 'Medium') || ($bust_size == 'Large') ) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Jewel":
			if ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Halter":
			if ($horizontal_body_shape == 'Triangle') :
				$overlay_class = "fsg-bad";
			elseif (($bust_size == 'Small') || ($bust_size == 'Large')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Medium Jewel":
			if ($bust_size == 'Medium') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Split":
			if ( ($bust_size == 'Small') || ($bust_size == 'Large') ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Grecian":
			if ($bust_size == 'Medium') :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Décolleté":
			if ( ($bust_size == 'Small') || ($bust_size == 'Large') ) :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Medium') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Spaghetti Straps":
			if ( ($bust_size == 'Small') || ($bust_size == 'Large') ) :
				$overlay_class = "fsg-bad";
			elseif ($bust_size == 'Medium') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Strapless":
			if ($horizontal_body_shape == 'Triangle') :
				$overlay_class = "fsg-good";
			elseif ( ($bust_size == 'Large') || ($bust_size == "Medium") ) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Deep V":
			if ( ($bust_size == 'Small') || ($bust_size == 'Medium') ) :
				$overlay_class = "fsg-bad";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Banded Front":
			if ( ($bust_size == 'Medium') || ($bust_size == 'Large') ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Placket":
			if ($bust_size == "Large") :
				$overlay_class = "fsg-bad";
			elseif ( ($horizontal_body_shape == 'Inverted Triangle') || ($bust_size == "Small")  || ($bust_size == "Medium") ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Keyhole":
			if ( ($bust_size == 'Small') || ($bust_size == 'Medium') ) :
				$overlay_class = "fsg-good";
			elseif ($bust_size == "Large") :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Deep Oval Scoop":
			if ($bust_size == 'Medium') :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Wide Scoop":
			if ( ($horizontal_body_shape == 'Triangle') || ($bust_size == "Small")  || ($bust_size == "Medium") ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Boatneck":
			if ( ($horizontal_body_shape == 'Triangle') || ($bust_size == "Small") ) :
				$overlay_class = "fsg-good";
			elseif ( ($horizontal_body_shape != 'Triangle') || ($bust_size == "Large") ) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Funnel":
			if (($bust_size == 'Small') || ($bust_size == 'Medium') ) :
				$overlay_class = "fsg-good";
			elseif ($bust_size == "Large") :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Classic V":
			/////// CHECK THIS FIRST ONE AS MIGHT BE TRIGGERED FROM Very Thin Arms or Very Thin Legs
			if ( in_array("Very Thin", $prominent_features) ) :  /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-bad";
			elseif ( in_array("Obese", $prominent_features) ) :  /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif ( isset($horizontal_body_shape) || isset($bust_size) ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
		case "Crossover":
			if ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			elseif ($bust_size == 'Medium') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Draped":
			if ($bust_size == 'Small') :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}
	
	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);

endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;




// Collars and Lapels
//------------------------------------------------------
$content_block = get_page_by_path( 'collars-and-lapels', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

if ($neck_length == "Short") {

	$content_block = get_page_by_path( 'short-neck', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($neck_length == "Medium") {

	$content_block = get_page_by_path( 'medium-neck', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($neck_length == "Long") {

	$content_block = get_page_by_path( 'long-neck', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} else {

	echo "<p>Neck Size Calculation or Display Error</p>";

}

$content_block = get_page_by_path( 'collars-and-lapels', OBJECT, 'fsg_content_blocks' );
$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section white rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Turtleneck":
			if ($horizontal_body_shape == 'Triangle') :
				$overlay_class = "fsg-bad";
			elseif ($neck_length == 'Short') :
				$overlay_class = "fsg-bad";
			elseif ($neck_length == 'Long') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Mandarin":
			if ( ($neck_length == 'Medium') || ($neck_length == 'Long') ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Mock Turtleneck":
			if ( ($neck_length == 'Medium') || ($neck_length == 'Long') ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Grandpa":
			if ( ($horizontal_body_shape == 'Inverted Triangle') || ($neck_length == 'Medium') || ($neck_length == 'Short') ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Notched":
			if ( ($neck_length == 'Medium') || ($neck_length == 'Short') ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Convertible":
			if ( ($neck_length == 'Medium') || ($neck_length == 'Long') ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Standing Collar":
			if ( in_array("Dowagers Hump", $prominent_features) ) : /// NEED TO EXTRACT FROM PROMINENT FEATURES ARRAY
				$overlay_class = "fsg-bad";
			elseif ($neck_length == 'Short') :
				$overlay_class = "fsg-bad"; 
			elseif ($neck_length == 'Long') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Yoked":
			if ($neck_length == 'Medium') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Peter Pan":
			if ( ($neck_length == 'Long') || ($neck_length == 'Medium') || ($neck_length == 'Short') ) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Rolled Shoulder":
			if ($neck_length == 'Long') :
				$overlay_class = "fsg-good";
			elseif ( ($neck_length == 'Medium') || ($neck_length == 'Short') ) :
				$overlay_class = "fsg-bad"; 
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Sailor":
			if ( ($horizontal_body_shape == 'Triangle') || ($neck_length == 'Long') ) :
				$overlay_class = "fsg-bad";
			elseif ($neck_length == 'Short') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Wide Collar":
			if ($horizontal_body_shape == 'Triangle') :
				$overlay_class = "fsg-good"; 
			elseif ($neck_length == 'Long') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Shawl":
			if (($horizontal_body_shape == 'Inverted Triangle') || ($neck_length == 'Medium') || ($neck_length == 'Short')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Long Point":
			if (($bust_size == 'Large') || ($neck_length == 'Long')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Shoulder Point":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-bad";
			elseif ( ($neck_length == 'Long') || ($neck_length == 'Short') ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Peaked":
			if ($neck_length == 'Short') :
				$overlay_class = "fsg-bad";
			elseif ($neck_length == 'Medium') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Crewneck":
			if ( ($neck_length == 'Long') || ($neck_length == 'Medium')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Clover Leaf":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cowl":
			if ($neck_length == 'Medium') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Rolled":
			if ($neck_length == 'Long') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Ruffle Front":
			if ($bust_size == 'Small') :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------------
// Sleeves
//------------------------------------------------------
$content_block = get_page_by_path( 'sleeves', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

if ($shoulders == "Broad and Square") {
	
	$content_block = get_page_by_path( 'broad-and-square', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} elseif ($shoulders == "Broad and Tapered") {
	
	$content_block = get_page_by_path( 'broad-and-tapered', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} elseif ($shoulders == "Average and Sloping") {
	
	$content_block = get_page_by_path( 'average-and-sloping', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} elseif ($shoulders == "Average and Tapered") {
	
	$content_block = get_page_by_path( 'average-and-tapered', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'light-grey', 'results-box');

} else {

	echo "<p>Shoulder Calculation or Display Error</p>";

}

$content_block = get_page_by_path( 'sleeves', OBJECT, 'fsg_content_blocks' );
$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):

	switch ($image['rw_name']) {
		case "Open Shoulder":
			if ( ($shoulders == 'Broad and Square') || ($shoulders == 'Broad and Tapered') ) :
				$overlay_class = "fsg-good";
			elseif ($shoulders == 'Average and Slopey') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Flutter":
			if ( ($shoulders == 'Average and Slopey') || ($shoulders == 'Broad and Tapered') ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Set-in":
			if ( ($shoulders == 'Average and Slopey') || ($shoulders == 'Broad and Tapered') || ($shoulders == 'Average and Tapered') ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Raglin":
			if ( ($horizontal_body_shape == 'Inverted Triangle') || ($shoulders == 'Broad and Square') || ($shoulders == 'Average and Tapered')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Saddle":
			if ( ($shoulders == 'Broad and Square') || ($shoulders == 'Average and Slopey') ) :
				$overlay_class = "fsg-bad";
			elseif ($shoulders == 'Broad and Tapered') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Dropped":
			if ( ($horizontal_body_shape == 'Triangle') || ($shoulders == 'Broad and Square') ) :
				$overlay_class = "fsg-good";
			elseif ( ($shoulders == 'Average and Slopey') || ($shoulders == 'Average and Tapered') ) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Short":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-bad";
			elseif ( ($bust_size == 'Small') || ($shoulders == 'Broad and Tapered') || ($shoulders == 'Average and Slopey') ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bat Wing":
			if (($horizontal_body_shape == 'Inverted Triangle') || ($shoulders == 'Average and Slopey')) :
				$overlay_class = "fsg-bad";
			elseif ($shoulders == 'Broad and Square') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//-----------------------------------------------------//
// Sleeves & Cuffs                                     //
//-----------------------------------------------------//
$content_block = get_page_by_path( 'sleeves-and-cuffs', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section white rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):

	switch ($image['rw_name']) {
		case "Sleeveless":
			if ((in_array("Heavy Upper Arms", $prominent_features)) ||
				(in_array("Very Thin Arms", $prominent_features)) ||
				(in_array("Aged Upper Arms", $prominent_features))) :
					$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Inverted Triangle') ||
				($bust_size == "Medium")) :
					$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') ||
				($horizontal_body_shape == 'Diamond') ||
				($horizontal_body_shape == 'Oval') ||
				($bust_size == "Large")) :
					$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cap":
			//if (($BUS == "YES") ||   // NO LONGER IN QUESTIONNAIRE
			if (($horizontal_body_shape == 'Triangle') ||
				($horizontal_body_shape == 'Hourglass') ||
				($horizontal_body_shape == 'Rectangle') ||
				($horizontal_body_shape == 'Diamond') ||
				($horizontal_body_shape == 'Oval') ||
				($bust_size == "Large")) :
					$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "3/4 Tapered":
			//if ($BUS == "YES") :  // NO LONGER IN QUESTIONNAIRE
			//	$overlay_class = "fsg-good";
			//elseif (($TW == "YES") || ($VTH == "YES") || ($OB == "YES")) :  // NO LONGER IN QUESTIONNAIRE
			//		$overlay_class = "fsg-bad";
			if (($horizontal_body_shape == 'Hourglass') ||
				($horizontal_body_shape == 'Inverted Triangle') ||
				($horizontal_body_shape == 'Triangle') ||
				($horizontal_body_shape == 'Rectangle')) :
					$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') ||
				($horizontal_body_shape == 'Oval')) : 
					$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Tapered":
			if (($horizontal_body_shape == 'Inverted Triangle') ||
				($horizontal_body_shape == 'Hourglass')) :
					$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') ||
				($horizontal_body_shape == 'Diamond') ||
				($horizontal_body_shape == 'Oval')) :
					$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "T Sleeve":
			if (($horizontal_body_shape == 'Inverted Triangle') ||
				($horizontal_body_shape == 'Triangle') ||
				($horizontal_body_shape == 'Rectangle')) :
					$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Full Sleeve Wide":
			if (in_array("Very Thin Arms", $prominent_features)) :
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') ||
				($horizontal_body_shape == 'Diamond') ||
				($horizontal_body_shape == 'Oval')) :
					$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "3/4 Wide":
			if (in_array("Very Thin Arms", $prominent_features)) :
				$overlay_class = "fsg-good";
			//elseif ( ($TW == "YES") || ($VTH == "YES") || ($OB == "YES")) :  // NO LONGER IN QUESTIONNAIRE
			//	$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Hourglass')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Half":
			//if ($BUS == "YES") :  // NO LONGER IN QUESTIONNAIRE
			//	$overlay_class = "fsg-bad";
			if ((in_array("Heavy Upper Arms", $prominent_features)) || (in_array("Very Thin Arms", $prominent_features)) || (in_array("Aged Upper Arms", $prominent_features))) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($bust_size == "Large")) :
				$overlay_class = "fsg-bad";
			elseif ((($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Hourglass')) && (($bust_size == "Small") || ($bust_size == "Medium"))) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//-----------------------------------------------------//
//  Cuffs                                              //
//-----------------------------------------------------//
$content_block = get_page_by_path( 'cuffs', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):

	switch ($image['rw_name']) {
		case "Puffed":
			if (in_array("Very Thin Arms", $prominent_features)) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Inverted Triangle')  || ($bust_size == "Large")) :
				$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Rectangle') || ($bust_size == "Small")) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Leg of Mutton":
			if (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval') || ($bust_size == "Large")) :
				$overlay_class = "fsg-bad";
			elseif (($bust_size == "Small")) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Full Length Tailored":
			if ((in_array("Heavy Upper Arms", $prominent_features)) || (in_array("Very Thin Arms", $prominent_features)) || (in_array("Aged Upper Arms", $prominent_features))) :
				$overlay_class = "fsg-good";
			//elseif ((isset($horizontal_body_shape)) || ($bust_size == "Small")) // The first clause is always true
			elseif ($bust_size == "Small") :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bishop":
			if (in_array("Very Thin Arms", $prominent_features)) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Oval') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bell":
			// There is no formula for Bell so defaults to OK
			$overlay_class = "fsg-ok";
			break;
		case "Classic":
			if (isset($horizontal_body_shape)) : // This will always be true
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Narrow":
			if (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Contrast":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Flip Back":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Large":
			if (($vertical_body_type == 'Petite-Scaled') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Pointed":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Flared":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Handkerchief":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Triangle') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//-----------------------------------------------------//
//  Pockets                                            //
//-----------------------------------------------------//

$content_block = get_page_by_path( 'pockets', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section white rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Bust":
			if ( in_array("Large Bust", $prominent_features) ) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($bust_size == "Small")) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Oval') || ($bust_size == "Large")) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Patch":
			if ( in_array("Large Bust", $prominent_features) ) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Triangle') ||  ($bust_size == "Small")) :
					$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Oval') || ($bust_size == "Large")) :
					$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Safari":
			if (($horizontal_body_shape == 'Inverted Triangle') ||  ($bust_size == "Small")) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Oval') || ($bust_size == "Large")) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Jet":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Welt":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Flap":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Diagonal":
			if ($horizontal_body_shape == 'Triangle') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Hidden Inseam":
			if ( in_array("LHI", $prominent_features) ) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif ( ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval') ) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Round":
			if ( in_array("LHI", $prominent_features) ) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Triangle')  || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//-----------------------------------------------------//
//  Skirts                                             //
//-----------------------------------------------------//
$content_block = get_page_by_path( 'skirts', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "6 + Gore":
			if (($horizontal_body_shape == 'Inverted Triangle')  || ($horizontal_body_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "4 Gore":
			if (($horizontal_body_shape == 'Diamond')  || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Angled":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Triangle')  || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond')  || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "A-Line":
			if ( in_array("LHI", $prominent_features) ) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-bad";
			elseif ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle')  || ($horizontal_body_shape == 'Diamond')  || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Asymmetric":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Triangle')  || ($horizontal_body_shape == 'Rectangle') ||($horizontal_body_shape == 'Diamond')  || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bandless":
			if ( in_array("Large Bust", $prominent_features) ) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif (in_array("Large Stomach", $prominent_features) || in_array("Large Thighs", $prominent_features)) :
				$overlay_class = "fsg-good";
			elseif (($vertical_body_type == 'Long Legs / Short Body') || ($vertical_body_type == 'Petite-Scaled') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif (in_array("Large Midriff", $prominent_features) || in_array("Large Bottom", $prominent_features)) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bell Skirt":
			if (($horizontal_body_shape == 'Triangle')  || ($horizontal_body_shape == 'Diamond')  || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bias":
			if ( in_array("Large Bust", $prominent_features) ) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Triangle')  :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Blouson":
			if (($horizontal_body_shape == 'Triangle')  || ($horizontal_body_shape == 'Diamond')  || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || in_array("Large Midriff", $prominent_features)) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Circle":
			if (($horizontal_body_shape == 'Triangle')  || ($horizontal_body_shape == 'Diamond')  || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Dirndl":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Divided":
			if (($vertical_body_type == 'Petite-Scaled') || ($horizontal_body_shape == 'Hourglass')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Flounced":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-good";
			elseif (($vertical_body_type == 'Petite-Scaled') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Godet":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond')  || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Hip Stitched Pleats":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Inverted Front":
			if (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Hourglass')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Triangle')  || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Kilt":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Knife Pleats":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Modified Dirndl":
			if (in_array("Very Thin Legs", $prominent_features)) :
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Open Box Pleats":
			if ($horizontal_body_shape == 'Inverted Triangle') : 
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Pencil":
			if ((in_array("VTH", $prominent_features)) || (in_array("Obese", $prominent_features))) :  /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Hourglass')  || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle')  || ($horizontal_body_shape == 'Diamond')  || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Ruffled":
			if ($vertical_body_type == 'Long Legs / Short Body') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Sarong":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Split":
			if ($vertical_body_type == 'Short Legs / Long Body') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Wrap":
			if (in_array("LHI", $prominent_features) == "YES") :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Tulip":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Thigh Stitched Pleats":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Straight":
			if (($vertical_body_type == 'Short Legs / Long Body') || ($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//-----------------------------------------------------//
//  Dresses                                            //
//-----------------------------------------------------//
$content_block = get_page_by_path( 'dresses', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section white rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):

	switch ($image['rw_name']) {
		case "Shirtmaker":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Raised Waist":
			if (($vertical_body_type == 'Petite-Scaled') || ($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($bust_size == 'Large')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Low Waist":
			if ($vertical_body_type == 'Long Legs / Short Body') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Dropped Waist":
			if ((in_array("SMB", $prominent_features)) || (in_array("Obese", $prominent_features))) :
				$overlay_class = "fsg-bad";
			elseif (in_array("Large Thighs", $prominent_features)) :
				$overlay_class = "fsg-bad";
			elseif ($vertical_body_type == 'Short Legs / Long Body') :
				$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Princess Line":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Hourglass')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Double Breasted":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Empire":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Blouson":
			if (($vertical_body_type=='Long Legs / Short Body') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			elseif (in_array("Large Midriff", $prominent_features)) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Sheath":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			elseif ($horizontal_body_shape == 'Inverted Triangle' || (in_array("Flat Bottom", $prominent_features))) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Princess Sheath":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			elseif (in_array("Flat Bottom", $prominent_features)) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Chemise":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "French Dart":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			elseif (in_array("Flat Bottom", $prominent_features)) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Wrap Dress":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Sundress":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Overdress":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Pinafore":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//-----------------------------------------------------//
//  Hemline                                            //
//-----------------------------------------------------//
$content_block = get_page_by_path( 'hemlines', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Below The Knee":
			if (($height == 'Petite') || ($height == 'Short') || ($height == 'Average') || ($height == 'Tall')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Above The Knee":
			if ($height == 'Average') :
				$overlay_class = "fsg-good";
			elseif ($height == 'Tall') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Below Ankle Bone":
			if ($height == 'Tall') :
				$overlay_class = "fsg-good";
			elseif (($height == 'Petite') || ($height == 'Short')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//----------------------------------------------------------------//
//  Jackets Silhouette                                            //
//----------------------------------------------------------------//
$content_block = get_page_by_path( 'jacket-silhouettes', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section white rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Loose Fit":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Fitted":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Square & Firm":
			if ($age < 'Under 30') :
				$overlay_class = "fsg-good";
			elseif (($age == '51 to 65') || ($age == 'over 65') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Square & Soft":
			if (in_array("Large Bust", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif (($age == 'Under 30') || ($age == '51 to 65') || ($age == 'over 65') || (in_array("Large Midriff", $prominent_features))) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);

endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//-----------------------------------------------------------------------//
// Jacket & Button Placements                                            //
//-----------------------------------------------------------------------//
$content_block = get_page_by_path( 'jacket-button-placements', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "1 Button":
			if (in_array("Large Bust", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "2 Button":
			if (in_array("Large Bust", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE 
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "3 Button":
			if (in_array("Large Bust", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "4 Button":
			if (in_array("Large Bust", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif (($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Diamond')) :
				$overlay_class = "fsg-good";
			elseif (($vertical_body_type == 'Short Legs / Long Body') || ($vertical_body_type == 'Petite-Scaled')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "2/4 Button Breasted":
			if (in_array("VTH", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "2/6 Button Breasted":
			if ((in_array("Small Bust", $prominent_features)) || (in_array("VTH", $prominent_features))) : 
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "3/6 Button Breasted":
			if ((in_array("Small Bust", $prominent_features)) || (in_array("VTH", $prominent_features))) : 
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "4/8 Button Breasted":
			if (in_array("VTH", $prominent_features)) :
				$overlay_class = "fsg-good";
			elseif ($vertical_body_type == 'Long Legs / Short Body') :
				$overlay_class = "fsg-good";
			elseif (($vertical_body_type == 'Short Legs / Long Body') || ($horizontal_body_shape == 'Diamond')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Wrap":
			if (in_array("LHI", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Asymmetrical":
			if (in_array("TW???", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Safari":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Peplin":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif ($vertical_body_type == 'Short Legs / Long Body') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cardigan":
			if (($vertical_body_type == 'Short Legs / Long Body') || ($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Lapel-less":
			if ((in_array("Large Bust", $prominent_features)) || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval') || ($bust_size == 'Large')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Draped":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Soft Knit":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Oval') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Tunic":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($vertical_body_type == 'Short Legs / Long Body') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif (in_array("Saddlebag Thighs", $prominent_features)) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bolero":
			if (($vertical_body_type == 'Short Legs / Long Body') || ($bust_size == 'Small')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Oval') || ($bust_size == 'Large')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bomber":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			elseif (in_array("Saddlebag Thighs", $prominent_features)) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Basque":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//---------------------------------------------------------//
// Jacket Lengths                                          //
//---------------------------------------------------------//
$content_block = get_page_by_path( 'jacket-lengths', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section white rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Hipbone":
			if (($vertical_body_type == 'Short Legs / Long Body') || ($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif (in_array("Large Midriff", $prominent_features)) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Waist":
			if ($vertical_body_type == 'Balanced Body') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			elseif (in_array("Large Midriff", $prominent_features)) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bolero":
			if ($bust_size == 'Small') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval') || ($bust_size == 'Large')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Crotch":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($vertical_body_type == 'Short Legs / Long Body') ||($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Finger Tip & Longer":
			if ($vertical_body_type == 'Long Legs / Short Body') :
				$overlay_class = "fsg-good";
			elseif ($vertical_body_type == 'Short Legs / Long Body') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "1st Finger Joint":
			if ($vertical_body_type == 'Long Legs / Short Body') :
				$overlay_class = "fsg-good";
			elseif ($vertical_body_type == 'Short Legs / Long Body') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "2nd Finger Joint":
			if ($vertical_body_type == 'Long Legs / Short Body') :
				$overlay_class = "fsg-good";
			elseif ($vertical_body_type == 'Short Legs / Long Body') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Knuckles":
			if (($vertical_body_type == 'Balanced Body') || ($vertical_body_type == 'Long Legs / Short Body') ||($vertical_body_type == 'Short Legs / Long Body') || ($vertical_body_type == 'Petite-Scaled') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif ((in_array("Large Bottom", $prominent_features)) || (in_array("Large Stomach", $prominent_features)) || (in_array("Large Thighs", $prominent_features))) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Vests                                          //
//------------------------------------------------//
$content_block = get_page_by_path( 'vests', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Classic Closed":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Classic Open":
			if (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif ((in_array("Sway Back", $prominent_features)) || (in_array("Large Bottom", $prominent_features)) || (in_array("Large Stomach", $prominent_features)) || (in_array("Large Thighs", $prominent_features))) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Double Breasted":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Over Shoulder":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cut-in":
			if (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Diamond')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Full Shoulder":
			if ($horizontal_body_shape == 'Oval') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cropped":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Oval') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Halter":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Very Fitted":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Long Line Semi-Fitted":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Triangle')	|| ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif ((in_array("Saddlebag Thighs", $prominent_features)) || (in_array("Large Midriff", $prominent_features)) || (in_array("Large Bottom", $prominent_features)) || (in_array("Large Stomach", $prominent_features)) || (in_array("Large Thighs", $prominent_features))) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Tunic":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif ($vertical_body_type == 'Short Legs / Long Body') :
				$overlay_class = "fsg-bad";
			elseif ((in_array("Saddlebag Thighs", $prominent_features)) || (in_array("Large Midriff", $prominent_features))) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Raglan":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Pants & Trousers                               //
//------------------------------------------------//
$content_block = get_page_by_path( 'pants-and-trousers', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section white rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Light Pants":
			if (($vertical_body_type == 'Short Legs / Long Body') || ($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Oval') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Medium Pants":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Diamond') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Dark Pants":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Pattern Pants":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Textured Pants":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Flat Front Pants":
			if ($horizontal_body_shape == 'Oval') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Forward Pleat Pants":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Reverse Pleat Pants":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		
		case "Jump Suit":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Overalls":
			//Overalls - no condition mentioned in the factsheet
			$overlay_class = "fsg-ok";
			break;
		case "Jeans":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($vertical_body_type == 'Short Legs / Long Body') || ($vertical_body_type == 'Petite-Scaled') || ($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cargo Jeans":
			if (($vertical_body_type == 'Petite-Scaled') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Boot Leg Pants":
			if (in_array("LHI", $prominent_features)) :
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-good";
			elseif ((in_array("Saddlebag Thighs", $prominent_features)) || (in_array("Large Midriff", $prominent_features))) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Pyjama Pants":
			if (($vertical_body_type == 'Short Legs / Long Body') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Straight Pants":
			if (in_array("OLD-SW", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE. Added old to avoid false positives
				$overlay_class = "fsg-good";
			elseif (($vertical_body_type == 'Short Legs / Long Body') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
					$overlay_class = "fsg-good";
			elseif (in_array("Sway Back", $prominent_features)) :
					$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Tapered Pants":
			if (in_array("OLD-SW", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE. Added old to avoid false positives
				$overlay_class = "fsg-good";
			elseif ((in_array("VTH", $prominent_features)) || (in_array("Obese", $prominent_features))) :
				$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Hourglass')) :
					$overlay_class = "fsg-good";
			elseif (in_array("Saddlebag Thighs", $prominent_features)) :
					$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Stirrups Pants":
			if (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Track Pants":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Yoked Pants":
			if ($horizontal_body_shape == 'Triangle') :
				$overlay_class = "fsg-good";
			elseif (in_array("Flat Bottom", $prominent_features)) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Wide to Palazzo Pants":
			if (($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			elseif (in_array("Saddlebag Thighs", $prominent_features)) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Unitard":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Leggings":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Hipster Pants":
			if ($vertical_body_type == 'Long Legs / Short Body') :
				$overlay_class = "fsg-good";
			elseif ($vertical_body_type == 'Short Legs / Long Body') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Capri Pants":
			if ((in_array("LHI", $prominent_features)) || (in_array("OLD-TW", $prominent_features)) ) :
				$overlay_class = "fsg-bad";
			elseif (($vertical_body_type == 'Petite-Scaled') || ($height == 'Petite') || ($height == 'Short') || ($height == 'Tall')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cropped Pants":
			if (($vertical_body_type == 'Petite-Scaled') || ($height == 'Petite') || ($height == 'Short') || ($height == 'Tall')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bell Pants":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval') || ($height == 'Petite') || ($height == 'Short')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Shorts                                         //
//------------------------------------------------//
$content_block = get_page_by_path( 'shorts', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Bermuda":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bike":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Boxer":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Hot Pants":
			if (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Jamaica":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif (in_array("Saddlebag Thighs", $prominent_features)) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Loose":
			if (($horizontal_body_shape == 'Hourglass')|| ($horizontal_body_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Diamond') :
				$overlay_class = "fsg-bad";
			elseif (in_array("Saddlebag Thighs", $prominent_features)) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Playsuit":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Tailored":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif (in_array("Very Thin Legs", $prominent_features)) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Flared":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Coats                                          //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-coats', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section white rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Anorak":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Fur Coat":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cape":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cloak":
			if ($vertical_body_type == 'Long Legs / Short Body') :
				$overlay_class = "fsg-good";
			elseif ($vertical_body_type == 'Petite-Scaled') :
				$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Balmacaan":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Belted":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Pea Coat":
			if (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Parka":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Duffle Coat":
			if ($horizontal_body_shape == 'Rectangle') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Chesterfield Coat":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Coachman Coat":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Reefer Coat":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			elseif (($vertical_body_type == 'Short Legs / Long Body') || ($horizontal_body_shape == 'Rectangle'))	:
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Classic Coat":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Polo Coat":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Slicker Coat":
			if ($horizontal_body_shape == 'Triangle') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval'))	:
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Barrel":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Motorcycle Coat":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Wrap Coat":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Trench Coat":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Swing Coat":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Swimsuits                                      //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-swimsuits', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Dark Inner Band":
			if ($horizontal_body_shape == 'Diamond') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Dark Outer Band":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Dark Over Bust":
			if (in_array("Large Bust", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif (in_array("Small Bust", $prominent_features)) :
				$overlay_class = "fsg-bad";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($bust_size == 'Small')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Dark On Hip":
			if (in_array("LHI", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif ((in_array("Large Thighs", $prominent_features))) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Waist Definition":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Light Over Bust":
			if (in_array("Large Bust", $prominent_features)) : /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-bad";
			elseif (in_array("Small Bust", $prominent_features)) :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Small') :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cup Inserts":
			if (in_array("Small Bust", $prominent_features)) :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Small') :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Racer Back":
			if (($vertical_body_type == 'Petite-Scaled') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cross Back":
			if ($bust_size == 'Small') :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Deep Back":
			if ($vertical_body_type == 'Long Legs / Short Body') :
				$overlay_class = "fsg-good";
			elseif ($vertical_body_type == 'Short Legs / Long Body') :	
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "High Back":
			if ($horizontal_body_shape == 'Rectangle') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Square Back":
			if ($horizontal_body_shape == 'Rectangle') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cropped":
			if (($vertical_body_type == 'Short Legs / Long Body') || ($horizontal_body_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cross":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Halter":
			if ($horizontal_body_shape == 'Rectangle') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Strapless":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval') || ($bust_size == 'Large')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bikini":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			elseif ($age == 'Under 30') :
				$overlay_class = "fsg-good";
			elseif (($age == '51 to 65') || ($age == 'over 65')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Blouson":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Camisole":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bustier":
			if ($horizontal_body_shape == 'Inverted Triangle') :
				$overlay_class = "fsg-bad";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Skirt":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Vest":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Triangle":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Ruffle Front":
			if ($bust_size == 'Small') :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Large Print":
			if (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval') || ($bust_size == 'Large') || ($bone_structure == 'Large') || ($bone_structure == 'Extra Large')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Vertical Stripes":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Solid Color":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval') || ($bone_structure == 'Large') || ($bone_structure == 'Extra Large')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Formed Bust":
			if ($bust_size == 'Small') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Narrow Strap":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Medium Strap":
			if ($bust_size == 'Large') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Wide Strap":
			if ($horizontal_body_shape == 'Rectangle') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Form Fitting":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Accessories                                    //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-accessories', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section //



//------------------------------------------------//
// Accessories - Belts                            //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-belts', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section white rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Classic Belt":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($vertical_body_type == 'Short Legs / Long Body') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Concave Belt":
			if ($horizontal_body_shape == 'Rectangle') :
				$overlay_class = "fsg-good";
			elseif ($vertical_body_type == 'Short Legs / Long Body') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Convex Belt":
			if (in_array("OLD SW", $prominent_features)) :  /// NO LONGER IN QUESTIONNAIRE
				$overlay_class = "fsg-bad";
			elseif ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Accessories - Necklaces                        //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-necklaces', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section white rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Choker":
			if (($neck_length == 'Medium') || ($neck_length == 'Long')) :
				$overlay_class = "fsg-good";
			elseif ($neck_length == 'Short') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Matinee":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($neck_length == 'Short') || ($neck_length == 'Medium') || ($neck_length == 'Long')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Opera":
			if (($vertical_body_type == 'Long Legs / Short Body') || ($neck_length == 'Short')) :
				$overlay_class = "fsg-good";
			elseif (($vertical_body_type == 'Petite-Scaled') || ($bust_size == 'Large') || ($neck_length == 'Long')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Princess":
			if (($neck_length == 'Short') || ($neck_length == 'Medium') || ($neck_length == 'Long')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Accessories - Bracelets                        //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-bracelets', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section white rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Small-Medium":
			if ($bone_structure == 'Small') :
				$overlay_class = "fsg-good";
			elseif (($bone_structure == 'Large') || ($bone_structure == 'Extra Large')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Medium-Large":
			if (($bone_structure == 'Medium') || ($bone_structure == 'Extra Large')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Large-X Large":
			if ($bone_structure == 'Large') :
				$overlay_class = "fsg-good";
			elseif (($bone_structure == 'Small') || ($bone_structure == 'Extra Large')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Accessories - Other                            //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-other-accessories', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section white rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Shoulder Design":
			if (($horizontal_body_shape == 'Triangle') || ($shoulders == 'BT')) :
				$overlay_class = "fsg-good";
			elseif ($shoulders == 'Broad and Square') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Shoulder Pad S.M.L.":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($bust_size == 'Large') || ($shoulders == 'Average and Sloping') || ($shoulders == 'Average and Tapered')) :
				$overlay_class = "fsg-good";
			elseif ($shoulders == 'Broad and Square') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Stocking":
			if (($shoulders == 'Broad and Square') || ($shoulders == 'Broad and Tapered') || ($shoulders == 'Average and Sloping') || ($shoulders == 'Average and Tapered')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Medium Handbag":
			if (($bone_structure == 'Medium') || ($bone_structure == 'Large')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Accessories - Make the most of                 //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-make-the-most-of-accessories', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

$content_block = get_page_by_path( 'jewelry-faux-or-real', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

$content_block = get_page_by_path( 'seasonal-accessories', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

$content_block = get_page_by_path( 'spring-and-summer-accessories', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

$content_block = get_page_by_path( 'autumn-and-winter-accessories', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

$content_block = get_page_by_path( 'evening-accessories', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

$content_block = get_page_by_path( 'shoes', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');



//------------------------------------------------//
// Accessories - Earrings                         //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-earrings', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Button":
			if (($face_shape == 'Oval') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Round') || ($face_shape == 'Square')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Long Drop":
			if ($neck_length == 'Medium') :
				$overlay_class = "fsg-good";
			elseif (($neck_length == 'Short') || ($neck_length == 'Long') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Small Drop":
			if (($neck_length == 'Short') || ($neck_length == 'Medium')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Square":
			if (($face_shape == 'Oval') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') || ($face_shape == 'Diamond') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Medium":
			if ($neck_length == 'Medium') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Oval Earrings":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') || ($face_shape == 'Square') || ($face_shape == 'Diamond') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Oversized":
			if (($bone_structure == 'Small') || ($bone_structure == 'Medium') || ($bone_structure == 'Large')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Small":
			if (($bone_structure == 'Large') || ($bone_structure == 'Extra Large')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Face Shape.                                    //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-face-shape', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// Display the Face Shape According To Questionnaire Answers
if ($face_shape == "Oval") {
	
	$content_block = get_page_by_path( 'fsg-oval', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($face_shape == "Oblong") {
	
	$content_block = get_page_by_path( 'fsg-oblong', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($face_shape == "Rectangle") { /// Rectangle and Oblong are now in Profile Master
	
	$content_block = get_page_by_path( 'fsg-oblong', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($face_shape == "Square") {
	
	$content_block = get_page_by_path( 'fsg-square', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($face_shape == "Round") {
	
	$content_block = get_page_by_path( 'fsg-round', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($face_shape == "Diamond") {
	
	$content_block = get_page_by_path( 'fsg-diamond', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($face_shape == "Triangle") {
	
	$content_block = get_page_by_path( 'fsg-triangle', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($face_shape == "Inverted Triangle") {
	
	$content_block = get_page_by_path( 'fsg-inverted-triangle', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} elseif ($face_shape == "Heart") { /// Heart is now combined with Inverted Triange In Profile Master
	
	$content_block = get_page_by_path( 'fsg-heart', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

} else {

	echo "<p>Face Shape Questionnaire or Display Error</p>";

}



//------------------------------------------------//
// Accessories - Hats.                            //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-hats', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Slanted Breton":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Square') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') || ($face_shape == 'Diamond')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Panama":
			if ($face_shape == 'Round') :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Oblong') || ($face_shape == 'Rectangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Floppy":
			if (($face_shape == 'Oval') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') || ($face_shape == 'Diamond') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif ($face_shape == 'Square') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Caperine":
			if (($face_shape == 'Square') || ($face_shape == 'Diamond')) :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cloche":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') || ($face_shape == 'Square')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Wide Brim":
			if (($face_shape == 'Oval') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif ($vertical_body_type == 'Petite-Scaled') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Crusher":
			if (($face_shape == 'Oval') || ($face_shape == 'Diamond')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Lamp Shade":
			if ($face_shape == 'Triangle') :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Oval') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') || ($face_shape == 'Square') || ($face_shape == 'Diamond')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Baseball Cap":
			if ($age == 'Under 30') :
				$overlay_class = "fsg-good";
			elseif (($age == '51 to 65') || ($age == 'over 65')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Beanie Hat":
			if ($age == 'Under 30') :
				$overlay_class = "fsg-good";
			elseif (($age=='51 to 65') || ($age=='over 65')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Newsboy Cap":
			if ($age=='Under 30') :
				$overlay_class = "fsg-good";
			elseif (($age=='51 to 65') || ($age=='over 65')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Fedora Hat":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Square') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif 	($face_shape == 'Diamond') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "High Beret":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Square')) :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Side Beret":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Square') || ($face_shape == 'Diamond') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Cossack Hat":
			if (($face_shape == 'Oval') || ($face_shape == 'Round')) :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Oblong') || ($face_shape == 'Rectangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;	
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Framing Your Face.                             //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-framing-your-face', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');




//------------------------------------------------//
// Glasses.                                       //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-glasses', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Arm at Base of Frame":
			if (($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Round') || ($face_shape == 'Square') || ($face_shape == 'Diamond')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bevel":
			if ($face_shape == 'Heart') :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Oval') || ($face_shape == 'Square')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Curved":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Decorative Side":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') || ($face_shape == 'Square') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Diamond":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Square')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Foxy":
			if (($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') || ($face_shape == 'Diamond')) :
				$overlay_class = "fsg-good";
			elseif ($face_shape == 'Square') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Oval Thin":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Oblong')) :
				$overlay_class = "fsg-good";
			elseif ($face_shape == 'Rectangle') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Rectangle":
			if (($face_shape == 'Rectangle') || ($face_shape == 'Square') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Round') || ($face_shape == 'Oblong') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Round":
			if (($face_shape == 'Rectangle') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') || ($face_shape == 'Square') || ($face_shape == 'Diamond')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Square Round":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') || ($face_shape == 'Square') || ($face_shape == 'Diamond') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Aviator":
			if (($face_shape == 'Round') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') || ($face_shape == 'Square')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Boston":
			if (($face_shape == 'Rectangle') || ($face_shape == 'Square') || ($face_shape == 'Diamond')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Dark and Heavy":
			if ($face_shape == 'Triangle') :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') ||($face_shape == 'Square') || ($face_shape == 'Diamond')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Decorative Top":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Oblong') || ($face_shape == 'Square') || ($face_shape == 'Diamond')) :
				$overlay_class = "fsg-good";
			elseif (($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Flat Top":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Oblong') || ($face_shape == 'Rectangle') || ($face_shape == 'Heart') || ($face_shape == 'Inverted Triangle') || ($face_shape == 'Triangle')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Oval":
			if (($face_shape == 'Oval') || ($face_shape == 'Round') || ($face_shape == 'Oblong')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Lingerie                                       //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-lingerie', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// No Calculations for this section //

$rw_section_images = get_field('rw_section_images', $content_block->ID);

// Check rows exists.
if ( $rw_section_images ):

echo '<div class="rw-fsg-section light-grey rw-section-images">';
echo '	<div class="rw-fixed-width">';
echo '		<div class="fsg-section-images fsg-col-4">';
foreach( $rw_section_images as $image ):
	
	switch ($image['rw_name']) {
		case "Bustier":
			if ($horizontal_body_shape == 'Rectangle') :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Teddy":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Body Shaper":
			if (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Torsolette":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Control Brief":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Full Brief":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "V Front":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Forward Side Seam":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Bikini":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Tanga":
			if (($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Thong":
			if (($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Soft Cup Stretch":
			if ($bust_size == 'Large') :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Small') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Minimizer Bar":
			if ($bust_size == 'Large') :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Small') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Seamless":
			if (($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Rectangle')) :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Sports Bra":
			if (($horizontal_body_shape == 'Hourglass') || ($horizontal_body_shape == 'Inverted Triangle') || ($horizontal_body_shape == 'Triangle') || ($horizontal_body_shape == 'Rectangle') || ($horizontal_body_shape == 'Diamond') || ($horizontal_body_shape == 'Oval')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Push Up":
			if (($horizontal_body_shape == 'Hourglass') || ($bust_size == 'Small')) :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Demi":
			if ($horizontal_body_shape == 'Hourglass') :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Under Wire":
			if (($bust_size == 'Small') || ($bust_size == 'Medium') || ($bust_size == 'Large')) :
				$overlay_class = "fsg-good";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		case "Strapless":
			if (($bust_size == 'Small') || ($bust_size == 'Medium')) :
				$overlay_class = "fsg-good";
			elseif ($bust_size == 'Large') :
				$overlay_class = "fsg-bad";
			else :
				$overlay_class = "fsg-ok";
			endif;
			break;
		default:
			$overlay_class = "not-set";
	}

	// Output section image (function in create-content-blocks-cpt.php	
	echo rw_ouput_section_image($image, $overlay_class);
	
endforeach;
echo '		</div>';
echo '	</div>';
echo '</div>';

// No value.
else :
// Do something...
endif;



//------------------------------------------------//
// Prominent Features                             //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-prominent-features', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');

// Display the Prominent Features According To Questionnaire Answers
if (in_array("Heavy Upper Arms", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-heavy-upper-arms', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}

if (in_array("Very Thin Arms", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-very-thin-arms', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}

if (in_array("Aged Upper Arms", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-aged-upper-arms', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}

if (in_array("Dowagers Hump", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-dowagers-hump', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}

if (in_array("Saddlebag Thighs", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-saddlebag-thighs', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}

if (in_array("Large Midriff", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-large-midriff', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}

if (in_array("Sway Back", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-sway-back', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}

if (in_array("Flat Bottom", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-flat-bottom', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}

if (in_array("Large Bottom", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-large-bottom', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}

if (in_array("Large Stomach", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-large-stomach', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}

if (in_array("Large Thighs", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-large-thighs', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');
	
}

if (in_array("Very Thin Legs", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-very-thin-legs', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}

if (in_array("Heavy Calves / Thick Ankles / Marked Lower Legs", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-heavy-calves', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}

if (in_array("Bowed Legs", $prominent_features)) {
	
	$content_block = get_page_by_path( 'fsg-bowed-legs', OBJECT, 'fsg_content_blocks' );
	echo rw_get_fsg_content_block($content_block, 'white', 'results-box');

}



//------------------------------------------------//
// Bridal Wear                                    //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-bridal', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');



//------------------------------------------------//
// Wardrobe Organization                          //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-wardrobe-organization', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');



//------------------------------------------------//
// Capsule Dressing                               //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-capsule-dressing', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');



//------------------------------------------------//
// Cost Per Wear                                  //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-cost-per-wear', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');



//------------------------------------------------//
// Polishing Your Appearance                      //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-polishing', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');



//------------------------------------------------//
// Communicating With Color                       //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-communicating-with-color', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');



//------------------------------------------------//
// Healthy Living                                 //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-healthy-living', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');



//------------------------------------------------//
// Guide To Fabrics                               //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-guide-to-fabrics', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');



//------------------------------------------------//
// Types of Natural Fabrics                       //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-types-natural-fabrics', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');



//------------------------------------------------//
// Stain Removal                                  //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-stain-removal', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');



//------------------------------------------------//
// The Least You Need To Know                     //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-the-least-you-need-to-know', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');



//------------------------------------------------//
// Fashion Mistakes that Can Spoil Your Look      //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-fashion-mistakes', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');



//------------------------------------------------//
// Look Lighter and Slimmer in 10 Minutes!        //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-lighter-slimmer', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');



//------------------------------------------------//
// Behind ByFerial Beauty                         //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-behind-byferial', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');



//------------------------------------------------//
// What is Beauty?                                //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-what-is-beauty', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'light-grey');



//------------------------------------------------//
// Your Fashion and Style Guide Outline           //
//------------------------------------------------//
$content_block = get_page_by_path( 'fsg-your-fashion-and-style-guide-outline', OBJECT, 'fsg_content_blocks' );
echo rw_get_fsg_content_block($content_block, 'white');


?>