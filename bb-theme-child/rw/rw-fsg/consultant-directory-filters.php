<?php

// --------------------------------------------------- //
// Get List of Countries that have active members
// --------------------------------------------------- //
function get_directory_filters(){
    $country_arr = array();
	$states_arr = array();
	$filter_consultant_data = get_active_members_for_membership_default();
	foreach ( $filter_consultant_data as $consultant ) {
		$filter_consultant_country = get_field('consultant_country', 'user_' . $consultant->user_id);
		if(!in_array($filter_consultant_country, $country_arr, true)){
			array_push($country_arr, $filter_consultant_country);
		}
		if($filter_consultant_country == "United States") {
			$filter_consultant_state__province = get_field('consultant_state__province', 'user_' . $consultant->user_id);
			if($filter_consultant_state__province !== "" && !in_array($filter_consultant_state__province, $states_arr, true)) {
				array_push($states_arr, $filter_consultant_state__province);
			}
		}
	}

    return ["country" => $country_arr, "states" => $states_arr];
}

function get_country_dropdown(){
    $directory_filters = get_directory_filters();
    $html = '';
    $html += `<form action="" method="get">
        <select name="filter_country" id="filter_country">`;
            foreach($directory_filters['country'] as $filter_country){
                $html += '<option value="'.$filter_country.'">'.$filter_country.'</option>';
            }
    $html += `</select>
        <input type="submit" value="Search">
    </form>`;

    return $html;
}

?>