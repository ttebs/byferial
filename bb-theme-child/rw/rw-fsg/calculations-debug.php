<?php

// Vertical Body Type
$debug = "<b>Vertical Body Type</b><br><br>";
			
$debug .= "head_length 		= head_to_floor - bust_to_floor<br>";
$debug .= "midsection_length 	= bust_to_floor - hip_to_floor<br>";
$debug .= "thigh_length 		= hip_to_floor - kneecap_to_floor<br>";
$debug .= "calf_length 		= kneecap_to_floor<br><br>";

$debug .= "if( (thigh_length + calf_length) >= (3 + head_length + midsection_length) ) {<br>";
$debug .= "\t<i style='color:#5A8BD8'>if( (" . $vertical_body_type['thigh_length'] . " + " . $vertical_body_type['calf_length'] . ") >= (3 + " . $vertical_body_type['head_length'] . " + " . $vertical_body_type['midsection_length'] . ") ) {<br>";
$debug .= "\tif( (" . ($vertical_body_type['thigh_length'] + $vertical_body_type['calf_length']) . ") >= (" . ($vertical_body_type['head_length'] + $vertical_body_type['midsection_length'] + 3) . ") ) {</i><br>";
$debug .= "\tvertical_body_type = Long Legs / Short Body<br><br>";

$debug .= "} else {<br><br>";
$debug .= "\tif( (head_length + midsection_length) >= (0.75 + thigh_length + calf_length) ) {<br>";
$debug .= "\t\t<i style='color:#5A8BD8'>if( (" . $vertical_body_type['head_length'] . " + " . $vertical_body_type['midsection_length'] . ") >= (0.75 + " . $vertical_body_type['thigh_length'] . " + " . $vertical_body_type['calf_length'] . ") ) {<br>";
$debug .= "\t\tif( (" . ($vertical_body_type['head_length'] + $vertical_body_type['midsection_length']) . ") >= (" . (0.75 + $vertical_body_type['thigh_length'] + $vertical_body_type['calf_length']) . ") ) {</i><br>";

$debug .= "\t\tvertical_body_type = Short Legs / Long Body<br><br>";
$debug .= "\t} else {<br><br>";
$debug .= "\t\tvertical_body_type = Balanced Body<br><br>";
$debug .= "\t}<br>";
$debug .= "}<br><br>";


// Horizontal Body Shape
$debug .= "<b>Horizontal Body Shape</b><br><br>";
		
$debug .= "if ( (waist_circumference >= 45) && (waist_circumference <= (full_bust_circumference + 2) && (waist_circumference <= (full_hip_circumference + 2)) ) ) {<br>";
$debug .= "\t<i style='color:#5A8BD8'>if ( (" . $waist_circumference . " >= 45) && (" . $waist_circumference . " <= (" . $full_bust_circumference . " + 2) && (" . $waist_circumference . " <= (" . $full_hip_circumference . " + 2)) ) ) {</i><br>";
$debug .= "\t<i style='color:#5A8BD8'>if ( (" . $waist_circumference . " >= 45) && (" . $waist_circumference . " <= (" . ($full_bust_circumference + 2) .") && (" . $waist_circumference . " <= (" . ($full_hip_circumference + 2) . ")) ) ) {</i><br>";
$debug .= "\thorizontal_body_shape = Oval<br><br>";

$debug .= "} elseif ( ((full_bust_circumference - full_hip_circumference <= 2) || (full_bust_circumference - full_hip_circumference >= -2)) && ((waist_circumference <= full_bust_circumference - 9) && (waist_circumference <= full_hip_circumference - 9)) ) {<br>";
$debug .= "\t<i style='color:#5A8BD8'>} elseif ( ((" . $full_bust_circumference . " - " . $full_hip_circumference . " <= 2) || (" . $full_bust_circumference . " - " . $full_hip_circumference . " >= -2)) && ((" . $waist_circumference . " <= " . $full_bust_circumference . " - 9) && (" . $waist_circumference . " <= " . $full_hip_circumference . " - 9)) ) {</i><br>";
$debug .= "\t<i style='color:#5A8BD8'>} elseif ( ((" . ($full_bust_circumference - $full_hip_circumference) . " <= 2) || (" . ($full_bust_circumference - $full_hip_circumference) . " >= -2)) && ((" . $waist_circumference . " <= " . ($full_bust_circumference - 9) . " ) && (" . $waist_circumference . " <= " . ($full_hip_circumference - 9) . ")) ) {</i><br>";
$debug .= "\thorizontal_body_shape = Hourglass<br><br>";

$debug .= "} elseif ((full_bust_circumference >= waist_circumference) && (full_bust_circumference > (full_hip_circumference + 1))) {<br>";
$debug .= "\t<i style='color:#5A8BD8'>} elseif ((" . $full_bust_circumference . " >= " . $waist_circumference . ") && (" . $full_bust_circumference . " > (" . $full_hip_circumference . " + 1))) {</i><br>";
$debug .= "\t<i style='color:#5A8BD8'>} elseif ((" . $full_bust_circumference . " >= " . $waist_circumference . ") && (" . $full_bust_circumference . " > (" . ($full_hip_circumference + 1) . "))) {</i><br>";
$debug .= "\thorizontal_body_shape = Inverted Triangle<br><br>";

$debug .= "} elseif ((waist_circumference <= full_hip_circumference) && (full_hip_circumference > (full_bust_circumference + 2.875))) {<br>";
$debug .= "\t<i style='color:#5A8BD8'>} elseif ((" . $waist_circumference . " <= " . $full_hip_circumference . ") && (" . $full_hip_circumference . " > (" . $full_bust_circumference . " + 2.875))) {</i><br>";
$debug .= "\t<i style='color:#5A8BD8'>} elseif ((" . $waist_circumference . " <= " . $full_hip_circumference . ") && (" . $full_hip_circumference . " > (" . ($full_bust_circumference + 2.875) . "))) {</i><br>";
$debug .= "\thorizontal_body_shape = Triangle<br><br>";		
			
$debug .= "} elseif ( (full_bust_circumference <= full_hip_circumference || (full_hip_circumference <= (full_bust_circumference + 2.875))) && ((waist_circumference <= full_bust_circumference) || (waist_circumference <= full_hip_circumference)) ) {<br>";
$debug .= "\t<i style='color:#5A8BD8'>} elseif ( (" . $full_bust_circumference . " <= " . $full_hip_circumference . " || (" . $full_hip_circumference . " <= (" . $full_bust_circumference . " + 2.875))) && ((" . $waist_circumference . " <= " . $full_bust_circumference . ") || (" . $waist_circumference . " <= " . $full_hip_circumference . ")) ) {</i><br>";
$debug .= "\t<i style='color:#5A8BD8'>} elseif ( (" . $full_bust_circumference . " <= " . $full_hip_circumference . " || (" . $full_hip_circumference . " <= (" . ($full_bust_circumference + 2.875) . "))) && ((" . $waist_circumference . " <= " . $full_bust_circumference . ") || (" . $waist_circumference . " <= " . $full_hip_circumference . ")) ) {</i><br>";
$debug .= "\thorizontal_body_shape = Rectangle<br><br>";

$debug .= "} elseif (waist_circumference > full_bust_circumference || waist_circumference > full_hip_circumference) {<br>";
$debug .= "\t<i style='color:#5A8BD8'>} elseif ($waist_circumference > $full_bust_circumference || $waist_circumference > $full_hip_circumference) {</i><br>";							
$debug .= "\thorizontal_body_shape = Oval<br><br>";							
							
$debug .= "} else {<br>";
$debug .= "\thorizontal_body_shape = unknown<br><br>";	
$debug .= "}<br>";


echo "<pre style='background: #f5f5f5; border: 1px solid #ddd; padding: 20px; font-size: 10px;'>";
echo $debug;
echo "</pre>";

?>