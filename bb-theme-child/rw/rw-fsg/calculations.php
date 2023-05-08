<?php
	
// Do Calculations
			
// Calculate Vertical Body Type
// =IF(F5+F6>=3+F3+F4,I4,IF(F3+F4>=0.75+F5+F6,I5,I3))
function calculateVerticalBodyType($head_to_floor, $bust_to_floor, $hip_to_floor, $kneecap_to_floor) {
	
	$head_length 		= $head_to_floor - $bust_to_floor;
	$midsection_length 	= $bust_to_floor - $hip_to_floor;
	$thigh_length 		= $hip_to_floor - $kneecap_to_floor;
	$calf_length 		= $kneecap_to_floor;
	
	if( ($thigh_length + $calf_length) >= (3 + $head_length + $midsection_length) ) {
		$vertical_body_type = "Long Legs / Short Body";
	} else {
		if( ($head_length + $midsection_length) >= (0.75 + $thigh_length + $calf_length) ) {
			$vertical_body_type = "Short Legs / Long Body";
		} else {
			$vertical_body_type = "Balanced Body";
		}
	}
	
	$output['head_length'] = $head_length;
	$output['midsection_length'] = $midsection_length;
	$output['thigh_length'] = $thigh_length;
	$output['calf_length'] = $calf_length;
	$output['vertical_body_type'] = $vertical_body_type;
	
	return $output;
	
}



// calculate Horizontal Body Shape
/*
IF(AND(F9>=45,AND(F9<=F8+2,F9<=F10+2)),I13,
IF(AND(OR(AND(2>=F8-F10,0<=F8-F10),AND(2>=F10-F8,0<=F10-F8),F8=F10),AND(F9<=F8-9,F9<=F10-9)),I8,
IF(AND(F8>=F9,F8>F10+1),I9,
IF(AND(F9<=F10,F10>F8+2.875),I10,
IF(AND(OR(F8<=F10, F10<=F8+2.875),OR(F9<=F8,F9<=F10)),I11,
IF(OR(F9>F8,F9>F10),I13,"unknown"))))))
*/
//F9 = Q8. Waist Circumference = $waist_circumference
//F8 = Q5. Full Bust Circumference = $full_bust_circumference
//F10 = Q7. Full Hip Circumference = $full_hip_circumference

// NOTE: DIAMOND IS NOT IN THE CALCULATION BUT THERE IS A CONTENT BLOCK FOR IT



function calculateHorizontalBodyShape($waist_circumference, $full_bust_circumference, $full_hip_circumference) {

	if ( ($waist_circumference >= 45) && ($waist_circumference <= ($full_bust_circumference + 2) && ($waist_circumference <= ($full_hip_circumference + 2)) ) ) {
		
		$horizontal_body_shape = "Oval";
	
	//=IF(AND(OR(F8-F10<=2,F8-F10>=-2),AND(F9<=F8-9,F9<=F10-9)),L9,"-")
		//if ( (((2>=($F8-$F10)) && (0<=($F8-$F10))) || ((2>=($F10-$F8)) && (0<=($F10-$F8)) ) ) && (($F9<=($F8-9)) && ($F9<=($F10-9))) ) 
	} elseif ( (($full_bust_circumference - $full_hip_circumference <= 2) || ($full_bust_circumference - $full_hip_circumference >= -2)) && (($waist_circumference <= $full_bust_circumference - 9) && ($waist_circumference <= $full_hip_circumference - 9)) ) {
		
		$horizontal_body_shape = "Hourglass";
		
	} elseif (($full_bust_circumference >= $waist_circumference) && ($full_bust_circumference > ($full_hip_circumference + 1))) {
		
		$horizontal_body_shape = "Inverted Triangle";
			
	} elseif (($waist_circumference <= $full_hip_circumference) && ($full_hip_circumference > ($full_bust_circumference + 2.875))) {
		
		$horizontal_body_shape = "Triangle";
	
	} elseif ( ($full_bust_circumference <= $full_hip_circumference || ($full_hip_circumference <= ($full_bust_circumference + 2.875))) && (($waist_circumference <= $full_bust_circumference) || ($waist_circumference <= $full_hip_circumference)) ) {
		
		$horizontal_body_shape = "Rectangle";
	
	} elseif ($waist_circumference > $full_bust_circumference || $waist_circumference > $full_hip_circumference) {
		
		$horizontal_body_shape = "Oval";
	
	} else {
		
		$horizontal_body_shape = "unknown";
	
	}

	$output = $horizontal_body_shape;
	
	return $output;

}



// calculate Bust Size
//=IF(F16="A",I16,IF(F16="B",I16,IF(F16="C",I17,IF(F16="D",I17,IF(F16="DD",I18,IF(F16="O",I18,"error"))))))
//F16 = Bra Cup Size = $bra_cup_size
function calculateBustSize($bra_cup_size) {
	
	switch ($bra_cup_size) {
		case "A":
			$output = "Small";
			break;
		case "B":
			$output = "Small";
			break;
		case "C":
			$output = "Medium";
			break;
		case "D":
			$output = "Large";
			break;
		case "DD":
			$output = "Large";
			break;
		case "Over":
			$output = "Large";
			break;
		default:
			$output = "Large";
	}
	
	return $output;
	
}



// Calculate Bone Structure
//F21 = $_POST['q9'] = $wrist_circumference
//F22 = $_POST['q10']; $ankle_circumference
//F23 = $_POST['q1'];  $head_to_floor
//D42 = $_POST['q16']; $weight
//F25 = $hw_oo
//F24 = $big_or_notbig

function calculateBoneStructure($wrist_circumference, $ankle_circumference, $head_to_floor, $weight) {

	global $wpdb;
	
	$hw_oo = $wpdb->get_var( $wpdb->prepare( 
		"SELECT hw_oo FROM {$wpdb->prefix}fsg_height_weight where hw_h = %d", $head_to_floor
	) );
	
	// =IF(D42 > F25,"OO","not big")
	// =IF($weight > $hw_oo,"OO","not big")
	$big_or_notbig = ($weight > $hw_oo) ? "OO" : "not big";
	
	if($big_or_notbig == "OO") {
		
		$output = "Extra Large";
	
	} else {
		
		if ($head_to_floor <= 63) {
		
			$output = "Small";
		
		} else {
		
			if (($head_to_floor < 67) && ($wrist_circumference < 5.5) && ($ankle_circumference < 7.5)) {
		
				$output = "Small";
		
			} else {
		
				if (($head_to_floor < 68) && ($wrist_circumference > 5.5) && ($wrist_circumference < 7.5) && ($ankle_circumference > 7.5) && ($ankle_circumference <= 9)) {
		
					$output = "Medium";
		
				} else {
		
					if ((($head_to_floor < 68) && (($wrist_circumference < 7.5) || ($ankle_circumference < 9)))) {
		
						$output = "Medium";
		
					} else {
		
						if (($head_to_floor >= 68) || ($wrist_circumference >= 7.5) || ($ankle_circumference > 9)) {
		
							$output = "Large";
		
						} else {
		
							$output = "unknown";
		
						}
					}
				}
			}
		}
	}
	
	return $output;

}




// Calculate Neck Length
//=IF(F27<3,I27,IF(AND(F27>=3,F27<4),I28,I29))
//F27 = $_POST['q11'] = $neck_length
function calculateNeckLength($neck_length) {

	if ($neck_length < 3) {
		$output = "Short";
	} else if($neck_length >= 3 && $neck_length < 4) {
		$output = "Medium";
	} else {
		$output = "Long";
	}
	
	return $output;
	
}

//  Calculate height
// =IF(D3<=63,I44,IF(D3<=64,I45,IF(D3<=67.5,I46,I47)))
//D3 = $_POST['q1'] = $head_to_floor

function calculateHeight($head_to_floor) {
	
	if ($head_to_floor <= 63) {
		$output = "Petite";
	} elseif ($head_to_floor <= 64) {
		$output = "Short";
	} elseif ($head_to_floor <= 67.5) {
		$output = "Average";
	} else {
		$output = "Tall";
	}
	
	return $output;
	
}



// Calculate Shoulders
// =IF(F32="BS",I32,IF(F32="BT",I33,IF(F32="AS",I34,IF(F32="AT",I35,"error"))))
//F32 = $_POST['q13'] = $shoulders
// Don't Need This
/*
function calculateShoulders($shoulders) {
	
	switch ($shoulders) {
		case "BS":
			$output = "Broad &amp; Square";
			break;
		case "BT":
			$output = "Broad &amp; Tapered";
			break;
		case "AS":
			$output = "Average &amp; Sloping";
			break;
		case "AT":
			$output = "Average &amp; Tapered";
			break;
		default:
			$output = "error";
	}
	
	return $output;
	
}
*/













	
?>