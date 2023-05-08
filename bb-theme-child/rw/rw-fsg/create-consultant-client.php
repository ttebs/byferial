<?php
	
/* -------------------------------------------------
	Create Consultant User Role
------------------------------------------------- */

// Only needs to run once (This was done manually) need to run again when making live.
//add_role( 'consultant', 'Consultant', get_role( 'customer' )->capabilities );

/* -------------------------------------------------
	Create Consultant Client Lookup Table
	THIS DOESN'T WORK - RUN SQL Manually
------------------------------------------------- 
	
CREATE TABLE wpl8_rw_consultant_client_lookup (
consultant_id INTEGER NOT NULL,
user_id INTEGER NOT NULL,
PRIMARY KEY (consultant_id, user_id)
) COLLATE utf8mb4_unicode_520_ci;
	
*/



// ---------------------------- //
// Add Links to My Account menu //
// ---------------------------- //
add_filter ( 'woocommerce_account_menu_items', 'rw_add_account_menu_buttons', 40 );
function rw_add_account_menu_buttons( $menu_links ) {
	
	if ( current_user_can('administrator') ) {
		
		//rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N" ) {
		$membership_check = rw_consultant_access_check( "Y", "Y", "N", "N" );
		
		//echo "<pre>";
		//print_r($membership_check);
		//echo "</pre>";
		
		if ($membership_check['has_access'] == "TRUE") {
	
			$new_menu_links = array_slice( $menu_links, 0, 5, true ) 
			+ array( 'fsg-admin' => 'FSG Admin' )
			+ array( 'my-clients' => 'My Clients' )
			+ array( 'personal-fsg' => 'View Fashion & Style Guide' )
			+ array( 'directory-profile' => 'Edit Directory Profile' )
			+ array( 'consultant-help' => 'Consultant Help Docs' )
			+ array_slice( $menu_links, 5, NULL, true );
		
		}
		
	} else if ( current_user_can('consultant') ) {
		
			//rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N", $purchase_check="N" ) {
			$membership_check = rw_consultant_access_check( "Y", "Y", "N", "Y" );
			
			//echo "<pre>";
			//print_r($membership_check);
			//echo "</pre>";
			
			if ($membership_check['membership_check'] == "PASS") {
				
				$new_menu_links = array_slice( $menu_links, 0, 5, true );
				
				if ( in_array('my-clients', $membership_check['member_permissions']) ) {
					
					$my_clients = array('my-clients' => 'My Clients');
					$new_menu_links = array_merge($new_menu_links, $my_clients);

				}
				
				if ( in_array('personal-fsg', $membership_check['member_permissions']) ) {
					
					$personal_fsg = array('personal-fsg' => 'View Fashion & Style Guide');
					$new_menu_links = array_merge($new_menu_links, $personal_fsg);
					
				}
				
				if ( in_array('directory-profile', $membership_check['member_permissions']) ) {
					
					$directory_profile = array('directory-profile' => 'Edit Directory Profile');
					$new_menu_links = array_merge($new_menu_links, $directory_profile);
					
				}
				
				if ( in_array('consultant-help', $membership_check['member_permissions']) ) {
					
					$consultant_help = array('consultant-help' => 'Consultant Help Docs');
					$new_menu_links = array_merge($new_menu_links, $consultant_help);

				}
				
				$end_links = array_slice( $menu_links, 5, NULL, true );
				$new_menu_links = array_merge($new_menu_links, $end_links);
			
			}
			
		
	} else if ( current_user_can('customer') ) {
		
		//if ( (current_user_can( 'customer' )) ) { - This would make it so only end customers would see FSG link
		$customer_id = get_current_user_id();
		
		//function rw_personal_fsg_access_check( $role_check="N", $fsg_questionnaire_check="N", $fsg_purchase_check="N" ) {
		$rw_access_check = rw_personal_fsg_access_check('Y','Y','Y');
		
		//echo "<pre>";
		//print_r($rw_access_check);
		//echo "</pre>";
		
		if ($rw_access_check['has_access'] == "TRUE") {
		
			$new_menu_links = array_slice( $menu_links, 0, 5, true ) 
			+ array( 'personal-fsg' => 'View Fashion & Style Guide' )
			+ array_slice( $menu_links, 5, NULL, true );
			
		} else {
			
			$new_menu_links = $menu_links;
			
		}
		
	}
	
	return $new_menu_links;

}



// ---------------------------------------------- //
// Create a link for Client to view their own FSG //
// ---------------------------------------------- //
// Set URL of Personal FSG button
add_filter( 'woocommerce_get_endpoint_url', 'rw_add_personal_fsg_endpoint', 10, 4 );
function rw_add_personal_fsg_endpoint( $url, $endpoint, $value, $permalink ){
	
	//if ( (current_user_can( 'customer' )) && (is_page_template( 'tpl-my-account.php' )) ) {
	if ( is_user_logged_in() ) {
	
		//if ( (current_user_can( 'customer' )) ) { - This would make it so only end customers would see FSG link
		$customer_id = get_current_user_id();
		
		//function rw_personal_fsg_access_check( $role_check="N", $fsg_questionnaire_check="N", $fsg_purchase_check="N" ) {
		$rw_access_check = rw_personal_fsg_access_check('Y','Y','Y');
		
		//echo "<pre>";
		//print_r($rw_access_check);
		//echo "</pre>";
		
		if ($rw_access_check['has_access'] == "TRUE") {
		
			$client = get_user_by( 'id' , $customer_id );
			
			if( $endpoint === 'personal-fsg' ) {
		 
				// ok, here is the place for your custom URL, it could be external
				$url = site_url() . '/personal-fsg/';
		 
			}
		
		}
	
	}
	
	return $url;

}

// ---------------------------------------------------- //
// Create a link for Consultant to View Consultant Help //
// ---------------------------------------------------- //
// Set URL of Personal FSG button
add_filter( 'woocommerce_get_endpoint_url', 'rw_add_consultant_help_endpoint', 10, 4 );
function rw_add_consultant_help_endpoint( $url, $endpoint, $value, $permalink ){
	
	//if ( (current_user_can( 'customer' )) && (is_page_template( 'tpl-my-account.php' )) ) {
	if ( is_user_logged_in() ) {
	
		//if ( (current_user_can( 'customer' )) ) { - This would make it so only end customers would see FSG link
		$customer_id = get_current_user_id();
		
		//function rw_personal_fsg_access_check( $role_check="N", $fsg_questionnaire_check="N", $fsg_purchase_check="N" ) {
		$rw_access_check = rw_consultant_access_check('Y','Y','Y');
		
		//echo "<pre>";
		//print_r($rw_access_check);
		//echo "</pre>";
		
		if ($rw_access_check['has_access'] == "TRUE") {
		
			$consultant = get_user_by( 'id' , $customer_id );
			
			if( $endpoint === 'consultant-help' ) {
		 
				// ok, here is the place for your custom URL, it could be external
				$url = site_url() . '/consultant-help/';
		 
			}
		
		}
	
	}
	
	return $url;

}



// ---------------------------- //
// Register Permalink Endpoints //
// ---------------------------- //
add_action( 'init', 'rw_add_endpoint' );
function rw_add_endpoint() {

	add_rewrite_endpoint( 'my-clients', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'fsg-admin', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'view-consultant', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'directory-profile', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'add-consultant-client', EP_ROOT | EP_PAGES );

}



// ------------------------------------------------------------------------------------ //
// Content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint //
// ------------------------------------------------------------------------------------ //
// Go to Settings > Permalinks and just push "Save Changes" button.
add_action( 'woocommerce_account_my-clients_endpoint', 'rw_my_account_my_clients_endpoint_content' );
function rw_my_account_my_clients_endpoint_content() {

	get_template_part( 'rw/rw-fsg/my-account', 'my-clients' );

}

add_action( 'woocommerce_account_fsg-admin_endpoint', 'rw_my_account_fsg_admin_endpoint_content' );
function rw_my_account_fsg_admin_endpoint_content() {

	get_template_part( 'rw/rw-fsg/my-account', 'fsg-admin' );

}

add_action( 'woocommerce_account_add-client_endpoint', 'rw_my_account_add_client_endpoint_content' );
function rw_my_account_add_client_endpoint_content() {

	get_template_part( 'rw/rw-fsg/my-account', 'add-client' );

}

add_action( 'woocommerce_account_view-client_endpoint', 'rw_my_account_view_client_endpoint_content' );
function rw_my_account_view_client_endpoint_content() {

	get_template_part( 'rw/rw-fsg/my-account', 'view-client' );

}

add_action( 'woocommerce_account_edit-client_endpoint', 'rw_my_account_edit_client_endpoint_content' );
function rw_my_account_edit_client_endpoint_content() {

	get_template_part( 'rw/rw-fsg/my-account', 'edit-client' );

}

add_action( 'woocommerce_account_view-consultant_endpoint', 'rw_my_account_view_consultant_endpoint_content' );
function rw_my_account_view_consultant_endpoint_content() {

	get_template_part( 'rw/rw-fsg/my-account', 'view-consultant' );

}

add_action( 'woocommerce_account_directory-profile_endpoint', 'rw_my_account_directory_profile_endpoint_content' );
function rw_my_account_directory_profile_endpoint_content() {

	get_template_part( 'rw/rw-fsg/my-account', 'directory-profile' );

}

add_action( 'woocommerce_account_add-consultant-client_endpoint', 'rw_my_account_add_consultant_client_endpoint_content' );
function rw_my_account_add_consultant_client_endpoint_content() {

	get_template_part( 'rw/rw-fsg/my-account', 'add-consultant-client' );

}



// ------------------------------------------------- //
//	Change Woocommerce My Account Endpoints to.      //
//	have same title as the Endpoint Name             //
// ------------------------------------------------- //
add_filter( 'woocommerce_get_query_vars', 'myaccount_custom_endpoints_query_vars' );
function myaccount_custom_endpoints_query_vars( $query_vars ) {
	
	$query_vars['my-clients'] = 'my-clients';
	$query_vars['add-client'] = 'add-client';
	$query_vars['view-client'] = 'view-client';
	$query_vars['edit-client'] = 'edit-client';
	$query_vars['fsg-admin'] = 'fsg-admin';
	$query_vars['view-consultant'] = 'view-consultant';
	$query_vars['directory-profile'] = 'directory-profile';
	$query_vars['add-consultant-client'] = 'add-consultant-client';
	return $query_vars;

}

add_filter( 'the_title', 'woocommerce_endpoint_titles', 10, 2 );
function woocommerce_endpoint_titles( $title, $id ) {

	// Standard Woocommerce Endpoints
	if ( is_wc_endpoint_url('orders') && in_the_loop() ) {
		$title = 'My Orders';    
	}
	if ( is_wc_endpoint_url( 'downloads' ) && in_the_loop() ) {
		$title = 'My Downloads';    
	}
	if ( is_wc_endpoint_url( 'edit-address' ) && in_the_loop() ) {
		$title = 'My Addresses';    
	}
	if ( is_wc_endpoint_url( 'edit-account' ) && in_the_loop() ) {
		$title = 'Edit My Account'; 
	}
	if ( is_wc_endpoint_url( 'view-order' ) && in_the_loop() ) {
		$title = 'View Orders';    
	}
	if ( is_wc_endpoint_url( 'lost-password' ) && in_the_loop() ) {
		$title = 'Lost Password';    
	}
	if ( is_wc_endpoint_url( 'customer-logout' ) && in_the_loop() ) {
		$title = 'Logout';   
	}
	if ( is_wc_endpoint_url( 'order-pay' ) && in_the_loop() ) {
		$title = 'Order Payment';    
	}
	if ( is_wc_endpoint_url( 'order-received' ) && in_the_loop() ) {
		$title = 'Order Received';   
	}
	if ( is_wc_endpoint_url( 'add-payment-method' ) && in_the_loop() ) {
		$title = 'Add Payment Method';   
	}
	
	// RW Endpoints
	if ( is_wc_endpoint_url( 'my-clients' ) ) {
		$title = 'My Clients';    
	}
	if ( is_wc_endpoint_url( 'add-client' ) ) {
		$title = 'Add Client';    
	}
	if ( is_wc_endpoint_url( 'view-client' ) ) {
		$title = 'View Client';    
	}
	if ( is_wc_endpoint_url( 'edit-client' ) ) {
		$title = 'Edit Client';    
	}
	if ( is_wc_endpoint_url( 'fsg-admin' ) ) {
		$title = 'FSG Admin';    
	}
	if ( is_wc_endpoint_url( 'view-consultant' ) ) {
		$title = 'View Consultant';    
	}
	if ( is_wc_endpoint_url( 'directory-profile' ) ) {
		$title = 'Edit Directory Profile';    
	}
	if ( is_wc_endpoint_url( 'add-consultant-client' ) ) {
		$title = 'Add Consultant Client';    
	}

	return $title;
}



/*
 * https ://wordpress.stackexchange.com/questions/309151/apply-the-title-filter-in-post-page-title-but-not-in-menu-title
 * WordPress applies the_title filter twice on the navigation menu items'
 * title (if the menu items correspond to existing posts or pages).
 * 
 * First as the corresponding post or page title. This happens in the
 * wp_setup_nav_menu_item() function of wp-includes/nav-menu.php file.
 * 
 * Then as the Menu item title itself. This happens in the Walker_Nav_Menu class.
 * 
 * We need to stop the the_title filter both the times.
 * 
 * Fortunately, WordPress has two filters: pre_wp_nav_menu fires before filtering menu titles
 * and wp_nav_menu_items fires after filtering menu titles. So we can use these two filters to
 * first remove the the_title filter for nav menu item titles and then add
 * the the_title filter back again for other titles.
 */
function wpse309151_remove_title_filter_nav_menu( $nav_menu, $args ) {
	// we are working with menu, so remove the title filter
	remove_filter( 'the_title', 'woocommerce_endpoint_titles', 10, 2 );
	return $nav_menu;
}
// this filter fires just before the nav menu item creation process
add_filter( 'pre_wp_nav_menu', 'wpse309151_remove_title_filter_nav_menu', 10, 2 );

function wpse309151_add_title_filter_non_menu( $items, $args ) {
	// we are done working with menu, so add the title filter back
	add_filter( 'the_title', 'woocommerce_endpoint_titles', 10, 2 );
	return $items;
}
// this filter fires after nav menu item creation is done
add_filter( 'wp_nav_menu_items', 'wpse309151_add_title_filter_non_menu', 10, 2 );



// --------------------------------------------- //
// Consultant Client Page						 //
// Tell Wordpress of new query variable to track //
// --------------------------------------------- //
function rw_add_query_vars($vars) {
	$vars[] = "view-client";
	$vars[] = "edit-client";
	$vars[] = "client";
	$vars[] = "view-consultant";
	$vars[] = "consultant";
	$vars[] = "add-consultant-client";
	return $vars;
}
// hook rw_add_query_vars function into query_vars
add_filter('query_vars', 'rw_add_query_vars');



// http s ://wordpress.stackexchange.com/questions/292066/woocommerce-my-account-endpoint-how-to-get-id-parameter-from-url
add_action( 'init', 'rw_add_consultant_client_rewrite_rules' );
function rw_add_consultant_client_rewrite_rules() {

	add_rewrite_rule( 'consultant-client-fsg/client/([^/]+)/?$', 'index.php?pagename=consultant-client-fsg&client=$matches[1]', 'top' );
	
	// Member Profile for Consultant Directory
	add_rewrite_rule( 'consultant-directory/([^/]+)/?$', 'index.php?pagename=consultant-directory&consultant=$matches[1]', 'top' );

}



// -------------------------------------- //
//	Add New Client Form Processing Script //
//--------------------------------------- //
add_action( 'acf/pre_save_post', 'rw_generate_new_user_id', 10, 2 );
function rw_generate_new_user_id( $post_id, $form ) {
	
	// Check that we are targeting the right form by checking the acf_form ID.
	if ( !isset( $form['id'] ) || 'new-client-registration' != $form['id'] ) {
		return $post_id;
	}
	
	// Exit if this is not a new user
	if( $post_id != 'new_user' ) {
        return $post_id;
    }
	
	$password = wp_generate_password( 12, true, false );
	$candidate_email = sanitize_email( $_POST['acf']['field_60c4e106b20b4'] );
	
	// check if user exists, exit if so
	if ( email_exists( $candidate_email ) ) {

		wp_redirect( home_url() . '/my-account/add-client/?email_exists=Y&user_email=' . $candidate_email );
		exit;

	}

	// Create an empty array to add user field data into
	$userdata = array();

	// Check for the fields we need in our postdata, and add them to the $user_fields array if they exist
	if ( isset( $_POST['acf']['field_60c4e13fb20b5'] ) ) {
		$userdata['first_name'] = sanitize_text_field( $_POST['acf']['field_60c4e13fb20b5'] );
	}
	if ( isset( $_POST['acf']['field_60c4e170b20b6'] ) ) {
		$userdata['last_name'] = sanitize_text_field( $_POST['acf']['field_60c4e170b20b6'] );
	}
	if ( isset( $_POST['acf']['field_60c4e079b20b3'] ) ) {
		$userdata['user_login'] = sanitize_user( $_POST['acf']['field_60c4e079b20b3'] );
	}
	if ( isset( $candidate_email ) ) {
		$userdata['user_email'] = $candidate_email;
	}
	if ( isset( $password ) ) {
		$userdata['user_pass'] = md5($password);
	}
	if ( isset( $_POST['acf']['field_60c4e13fb20b5'], $_POST['acf']['field_60c4e170b20b6'] ) ) {
		$userdata['display_name'] = sanitize_text_field( $_POST['acf']['field_60c4e13fb20b5'] . ' ' . $_POST['acf']['field_60c4e170b20b6'] );
	}
	
	$userdata['use_ssl'] = true;
	$userdata['show_admin_bar_front'] = false;
	$userdata['role'] = 'customer';
	$userdata['user_nicename'] = sanitize_title( $userdata['first_name'] . "-" . $userdata['last_name'] );
	
	$user_id = wp_insert_user( $userdata );
	$consultant_id = get_current_user_id();

	if ( is_wp_error( $user_id ) ) {
		wp_die( $user_id->get_error_message() );
	} else {
		// Set the 'post_id' to the newly created user_id, including the 'user_' ACF uses to target a user
		//return 'user_' . $user_id;
		
		// Next Add IDs to wp42_rw_consultant_client_lookup
		global $wpdb;
		$table = $wpdb->prefix . 'rw_consultant_client_lookup';
		$data = array(	
			'consultant_id' => $consultant_id,
			'user_id' => $user_id
		);
		$wpdb->insert($table,$data);
		
		wp_redirect( home_url() . '/my-account/view-client/' . $userdata['user_nicename'] . '/' );
        exit;
        
	}
	
}



// --------------------------------------------------- //
// Populate the Client Edit Fields with current values //
// --------------------------------------------------- //
function rw_load_acf_consultant_client_field_value($field) {
    
    $rw_client_slug = sanitize_text_field( urldecode( get_query_var('edit-client') ) );
    
    $client = get_user_by( 'slug' , $rw_client_slug );
    
    if (!empty($client)) {
    
	    //echo "<pre>";
	    //print_r($client);
	    //echo "</pre>";
	    
		switch( $field['key'] ) {
					
			//Edit Form
			case 'field_60d630d15491b': // user_login
				$field['value'] = $client->user_login;
				$field['disabled'] = true;
				$field['wrapper'] = array(
					'class' => 'rw-field-disabled'
				);
				break;
			
			case 'field_60d630d154965': // email
				$field['value'] = $client->user_email;
				break;
				
			case 'field_60d630d1549a8': // first_name
				$field['value'] = $client->first_name;
				break;
				
			case 'field_60d630d1549ea': // last_name
				$field['value'] = $client->last_name;
				break;
		
		}
	
		wp_reset_postdata();
		
	}

	return $field;
	
}
add_filter('acf/load_field', 'rw_load_acf_consultant_client_field_value');



// ------------------------------------------------- //
// Edit Client Form Processing Script
// As this is for the consultant to edit a client,   //
// at this time I've made is so passwords can not 	 //
// be updated. Clients can do that themselves. 		 //
// Consultants can update email or names in case 	 //
// of typos.										 //
// ------------------------------------------------- //
add_action( 'acf/pre_save_post', 'rw_update_client_info', 10, 2 );
function rw_update_client_info( $post_id, $form ) {
	
	// Check that we are targeting the right form by checking the acf_form ID.
	if ( ! isset( $form['id'] ) || 'edit-client-registration' != $form['id'] ) {
		return $post_id;
	}
	
	//echo "<pre>";
	//var_dump( $post_id ); // OUTPUT: NULL
    //var_dump( $_POST['post_id'] ); // OUTPUT: string(3) "new"
    //echo '</pre>';
    //die();
	
	// Exit if this is a new user
	if( $post_id == 'new_user' ) {
        return $post_id;
    }

	$rw_client_slug = sanitize_text_field( urldecode( get_query_var('edit-client') ) );
	
	$client = get_user_by( 'slug' , $rw_client_slug );
	
	$candidate_old_email = $client->user_email;
	$candidate_email = sanitize_email( $_POST['acf']['field_60d630d154965'] );
	
	if ($candidate_old_email != $candidate_email) {
		
		// check if user exists, exit if so
		if ( email_exists( $candidate_email ) ) {
		
			wp_redirect( home_url() . '/my-account/edit-client/'. $rw_client_slug . '/?email_exists=Y&user_email=' . $candidate_email );
			exit;
		
		}
		
	}
	
	// Create an empty array to add user field data into
	$userdata = array();

	// Check for the fields we need in our postdata, and add them to the $user_fields array if they exist	
	$user_id = explode("_", $post_id);
	$userdata['ID'] = $user_id[1];
	
	if ( isset( $_POST['acf']['field_60d630d1549a8'] ) ) {
		$userdata['first_name'] = sanitize_text_field( $_POST['acf']['field_60d630d1549a8'] );
	}
	
	if ( isset( $_POST['acf']['field_60d630d1549ea'] ) ) {
		$userdata['last_name'] = sanitize_text_field( $_POST['acf']['field_60d630d1549ea'] );
	}
	
	if ( isset( $_POST['acf']['field_60d630d1549a8'], $_POST['acf']['field_60d630d1549ea'] ) ) {
		$userdata['display_name'] = sanitize_text_field( $_POST['acf']['field_60d630d1549a8'] . ' ' . $_POST['acf']['field_60d630d1549ea'] );
	}
	
	if ( isset( $candidate_email ) ) {
		$userdata['user_email'] = $candidate_email;
	}
	
	$userdata['user_nicename'] = sanitize_title( $userdata['first_name'] . "-" . $userdata['last_name'] );
	
	$user_id = wp_update_user( $userdata );

	wp_redirect( home_url() . '/my-account/view-client/'. $userdata['user_nicename'] . '/' );
	exit;

}



// ----------------------------------------------------- //
//	Add New Client For Consultant Form Processing Script //
//------------------------------------------------------ //
add_action( 'acf/pre_save_post', 'rw_generate_new_client_for_consultant', 10, 2 );
function rw_generate_new_client_for_consultant( $post_id, $form ) {
	
	// Check that we are targeting the right form by checking the acf_form ID.
	if ( !isset( $form['id'] ) || 'new-client-for-consultant-registration' != $form['id'] ) {
		return $post_id;
	}
	
	// Exit if this is not a new user
	if( $post_id != 'new_user' ) {
        return $post_id;
    }
	
	$password = wp_generate_password( 12, true, false );
	$candidate_email = sanitize_email( $_POST['acf']['field_60c4e106b20b4'] );
	
	// check if user exists, exit if so
	if ( email_exists( $candidate_email ) ) {

		wp_redirect( home_url() . '/my-account/add-client/?email_exists=Y&user_email=' . $candidate_email );
		exit;

	}

	// Create an empty array to add user field data into
	$userdata = array();

	// Check for the fields we need in our postdata, and add them to the $user_fields array if they exist
	if ( isset( $_POST['acf']['field_60c4e13fb20b5'] ) ) {
		$userdata['first_name'] = sanitize_text_field( $_POST['acf']['field_60c4e13fb20b5'] );
	}
	if ( isset( $_POST['acf']['field_60c4e170b20b6'] ) ) {
		$userdata['last_name'] = sanitize_text_field( $_POST['acf']['field_60c4e170b20b6'] );
	}
	if ( isset( $_POST['acf']['field_60c4e079b20b3'] ) ) {
		$userdata['user_login'] = sanitize_user( $_POST['acf']['field_60c4e079b20b3'] );
	}
	if ( isset( $candidate_email ) ) {
		$userdata['user_email'] = $candidate_email;
	}
	if ( isset( $password ) ) {
		$userdata['user_pass'] = md5($password);
	}
	if ( isset( $_POST['acf']['field_60c4e13fb20b5'], $_POST['acf']['field_60c4e170b20b6'] ) ) {
		$userdata['display_name'] = sanitize_text_field( $_POST['acf']['field_60c4e13fb20b5'] . ' ' . $_POST['acf']['field_60c4e170b20b6'] );
	}
	
	$userdata['use_ssl'] = true;
	$userdata['show_admin_bar_front'] = false;
	$userdata['role'] = 'customer';
	$userdata['user_nicename'] = sanitize_title( $userdata['first_name'] . "-" . $userdata['last_name'] );
	
	$user_id = wp_insert_user( $userdata );
	
	if ( isset( $_POST['consultant_id'] ) ) {
		$consultant_id = sanitize_text_field( $_POST['consultant_id'] );
	}
	if ( isset( $_POST['consultant_slug'] ) ) {
		$consultant_slug = sanitize_text_field( $_POST['consultant_slug'] );
	}

	if ( is_wp_error( $user_id ) ) {
		wp_die( $user_id->get_error_message() );
	} else {
		// Set the 'post_id' to the newly created user_id, including the 'user_' ACF uses to target a user
		//return 'user_' . $user_id;
		
		// Next Add IDs to wp42_rw_consultant_client_lookup
		global $wpdb;
		$table = $wpdb->prefix . 'rw_consultant_client_lookup';
		$data = array(	
			'consultant_id' => $consultant_id,
			'user_id' => $user_id
		);
		$wpdb->insert($table,$data);
		
		wp_redirect( home_url() . '/my-account/view-consultant/' . $consultant_slug . '/' );
        exit;
		
	}
	
}



// ---------------------------------------------------------------------//
// When the Questionnaire is save by a consultant for their client		//
// Update the post_author to be the client id and not the consultant id //
// ---------------------------------------------------------------------//
function rw_acf_update_consultant_client_questionnaire_author( $post_id ) {
	
	// If not FSG CPT, exit
	if (get_post_type($post_id) != 'fsg_questionnaire') {
		return $post_id;
	}
	
	$rw_client_slug = sanitize_text_field( urldecode( get_query_var('client') ) );
	$client = get_user_by( 'slug' , $rw_client_slug );

	wp_update_post( array( 'ID'=>$post_id, 'post_author'=>$client->ID) );
	
}
add_action('acf/save_post', 'rw_acf_update_consultant_client_questionnaire_author', 20);



// ---------------------------------------------- //
// Consultant Account Area Access Checks Function //
// To be included on all consultant pages		  //
// In the My Account Area						  //
// -----------------------------------------------//
// 1. Role Check: if user is Consultant or Admin
// 2. Membership Check: Does consultant have an active Empower Membership
// 3. Client Check: Make sure client is a child of current logged in consultant
function rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N", $fsg_purchase_check="N" ) {
	
	// bail if Memberships isn't active
	if ( ! function_exists( 'wc_memberships' ) ) {
		return;
	}
	
	// Get Current Consultant ID
	$consultant_id = get_current_user_id();
	
	// Set Array For Returning Values
	$rw_access_check = array();
	$rw_access_check['has_access'] = "FALSE";
	
	////////////////
	// ROLE CHECK //
	////////////////
	// Check if current User role is consultant or admin
	
	if ($role_check == "Y") {
		
		$user_info = wp_get_current_user();
		$allowed_roles = array( 'administrator', 'consultant' );
		
		if ( array_intersect( $allowed_roles, $user_info->roles ) ) {
			
		//if ( current_user_can('administrator') || current_user_can('consultant') ) {
			
			//$rw_access_check['where_am_i'] = "Here";
			
			$rw_access_check['has_access'] = "TRUE";
			$rw_access_check['role_check'] = "PASS";
			$rw_access_check['role'] = $user_info->roles[0];
			
			if (current_user_can('administrator')){
				
				// Grant All Permissions for Admin
				
				$rw_member_permissions = array('my-clients', 'personal-fsg', 'directory-profile', 'consultant-help');
				$rw_access_check['member_permissions'] = $rw_member_permissions;
				
			}
			
				//////////////////////
				// MEMBERSHIP CHECK //
				//////////////////////
				
				if ($membership_check == "Y") {
					
					// Make sure Consultant is an Active Empower Group Professional or Master Member
					if ( 
						wc_memberships_is_user_active_member( $consultant_id, 'empower-member' ) ||
						wc_memberships_is_user_active_member( $consultant_id, 'empower-consultant' ) ||
						wc_memberships_is_user_active_member( $consultant_id, 'empower-professional' ) ||
						wc_memberships_is_user_active_member( $consultant_id, 'empower-master' ) ||
						wc_memberships_is_user_active_member( $consultant_id, 'empower-licensee' ) || 
						current_user_can('administrator') // allows admin to see everything
						) {
				
						$rw_access_check['has_access'] = "TRUE";
						$rw_access_check['membership_check'] = "PASS";
						
						$memberships = wc_memberships_get_user_active_memberships( $consultant_id );
						
						//echo '<pre>';
						//print_r($memberships);
						//echo '</pre>';
						
						//echo '<pre>';
						//print_r($rw_access_check);
						//echo '</pre>';
						
						if (!empty($memberships)) {
							$rw_access_check['membership_level'] = $memberships[0]->plan->slug;
						} else {
							if (current_user_can('administrator')) {
								$rw_access_check['membership_level'] = 'administrator';
								$rw_access_check['membership_plan'] = $memberships[0]->plan->slug;
							}
						}
						
						// Set Permissions for Each Member Level
						
						switch ($rw_access_check['membership_level']) {
							
							case 'empower-master':
							
								$rw_member_permissions = array('my-clients', 'personal-fsg', 'directory-profile', 'consultant-help');
								$rw_access_check['member_permissions'] = $rw_member_permissions;
							
							break;
							case 'empower-professional':
							
								$rw_member_permissions = array('personal-fsg', 'directory-profile', 'consultant-help');
								$rw_access_check['member_permissions'] = $rw_member_permissions;
							
							break;
							case 'empower-consultant':
							
								$rw_member_permissions = array('directory-profile');
								$rw_access_check['member_permissions'] = $rw_member_permissions;
							
							break;
							case 'empower-member':
							
								$rw_member_permissions = array('directory-profile');
								$rw_access_check['member_permissions'] = $rw_member_permissions;
							
							break;
							
						}
						
					} else {
						
						$rw_access_check['has_access'] = "FALSE";
						$rw_access_check['membership_check'] = "FAIL";
						$rw_access_check['membership_error'] = "An active Empower Professional or Master Membership is required to view this page";
						
						
					}
					
				} // End Membership Check
				
				// Purchase Check for Consultants not on the Professional Plan
				// Check if customer has purchased an FSG					
				if ($fsg_purchase_check == "Y") {
					
					//echo "purchase check<br>";
					
					// Enter Product ID of FSG Product Here = 9116
					if (rw_has_logged_in_user_purchased_product(9116) == "Y") {
					
						$rw_access_check['has_access'] = "TRUE";
						$rw_access_check['fsg_purchase_check'] = "PASS";
						array_push($rw_member_permissions, 'personal-fsg');
						$rw_access_check['member_permissions'] = $rw_member_permissions;
					
					} else {
						
						$rw_access_check['has_access'] = "FALSE";
						$rw_access_check['fsg_purchase_check'] = "FAIL";
						$rw_access_check['fsg_purchase_check_error'] = "A purchase is necessary to access this content";
						
					}
				
				}
				
				
				//////////////////
				// CLIENT CHECK //
				//////////////////
				// Get Client from Slug
				// Re:  www. uforocks .com/blog/passing-get-query-string-parameters-in-wordpress-url
				// Uses following functions in create-consultant-client.php
				// rw_add_query_vars
				// rw_add_rewrite_rules
				
				if ($client_check == "Y") {
					
					if (current_user_can('administrator')) {
					
						$rw_access_check['has_access'] = "TRUE";
						$rw_access_check['consultant_client_check'] = "PASS";
						$rw_access_check['admin_overide'] = "TRUE";
					
					} else {
					
						if ( get_query_var('view-client') !== "" ) {
							
							$rw_client_slug = sanitize_text_field( urldecode( get_query_var('view-client') ) );
							
						} elseif ( get_query_var('edit-client') !== "" ) {
							
							$rw_client_slug = sanitize_text_field( urldecode( get_query_var('edit-client') ) );
							
						} elseif ( get_query_var('client') !== "" ) {
							
							$rw_client_slug = sanitize_text_field( urldecode( get_query_var('client') ) );
							
						}
						
						if (isset($rw_client_slug) && $rw_client_slug != "") {
							
							// Get User Object from Slug
							// Note you have to use 'slug' and not 'user_nicename'
							$client = get_user_by( 'slug' , $rw_client_slug );
							
							// Check if client is a child of consultant
							global $wpdb;
							$mytable = $wpdb->prefix . "rw_consultant_client_lookup";
							$mylink = $wpdb->get_row( $wpdb->prepare("SELECT * FROM " . $mytable . " WHERE consultant_id = %d AND user_id = %d", $consultant_id, $client->ID ) );
							
							$row_count = $wpdb->num_rows;
							
							if ($row_count > 0) {
					
								$rw_access_check['has_access'] = "TRUE";
								$rw_access_check['consultant_client_check'] = "PASS";
								
							} else {
								
								//echo "This client does not belong to this consultant";
								$rw_access_check['has_access'] = "FALSE";
								$rw_access_check['consultant_client_check'] = "FAIL";
								$rw_access_check['consultant_client_error'] = "You do not have access to this client";
								
							}
							
						} else {
						
							$rw_access_check['rw_client_slug'] = "Not Set";
						
						}
						
					}
					
				} // End Client Check
		
		} else {
			
			$rw_access_check['has_access'] = "FALSE";
			$rw_access_check['role_check'] = "FAIL";
			$rw_access_check['role_error'] = "Insufficient privileges to view this page";
			
		}
		
	} // End Role Check

	return $rw_access_check;
	
}



// -------------------------------------- //
// ACCESS CHECKS FOR VIEWING PERSONAL FSG //
// -------------------------------------- //
// 1. Role Check: if user is Customer, Consultant or Admin
// 2. Questionnaire Checl: User has a completed questionnaire link to their profile
// 3. Purchase Checl: Has current user purchased a Fashion and Style Guide
function rw_personal_fsg_access_check( $role_check="N", $fsg_questionnaire_check="N", $fsg_purchase_check="N" ) {
	
	// Get Current User ID
	$current_user_id = get_current_user_id();
	
	// Set Array For Returning Values
	$rw_access_check = array();
	$rw_access_check['has_access'] = "FALSE";
	
	////////////////
	// ROLE CHECK //
	////////////////
	// Check if current User role is Customer, Consultant or Admin
	
	if ($role_check == "Y") {
		
		$user_info = wp_get_current_user();
		
		$allowed_roles = array( 'administrator', 'consultant', 'customer' );
			
		if ( array_intersect( $allowed_roles, $user_info->roles ) ) {
	
			$rw_access_check['has_access'] = "TRUE";
			$rw_access_check['role_check'] = "PASS";
			$rw_access_check['roles'] = $user_info->roles;
			
			// Because User can either have a FSG created by a consultant
			// or they can purchase and DIY
			// First Check if they have a Questionnaire completed (tests positive for both a consultant completed or customer completed form)
			// If not then check if the customer has purchased a FSG
			
			if ($fsg_questionnaire_check == "Y") {
				
				global $wpdb;
				$mytable = $wpdb->prefix . "posts";
				$result = $wpdb->get_row( $wpdb->prepare("SELECT * FROM " . $mytable . " WHERE post_author = %d AND post_type = %s", $current_user_id, 'fsg_questionnaire' ) );
				
				$row_count = $wpdb->num_rows;
				
				if ($row_count > 0) {
					
					$rw_access_check['fsg_questionnaire_check'] = "PASS";
					
				} else {
					
					
					//echo "no questionnaire<br>";

					
					//echo "This user does not have a fsg questionnaire record";
					$rw_access_check['fsg_questionnaire_check'] = "FAIL";
					$rw_access_check['fsg_questionnaire_check_error'] = "No FSG Questionnaire Record Exists";

					// Check if customer has purchased an FSG					
					if ($fsg_purchase_check == "Y") {
						
						//echo "purchase check<br>";
						
						if ( array_intersect( array('consultant'), $user_info->roles ) ) {
							
							//echo "consultant overide<br>";
					
							$rw_access_check['has_access'] = "TRUE";
							$rw_access_check['fsg_purchase_check'] = "PASS";
							$rw_access_check['fsg_purchase_note'] = "CONSULTANT OVERRIDE";
						
						} else {
					
							// Enter Product ID of FSG Product Here = 9116
							if (rw_has_logged_in_user_purchased_product(9116) == "Y") {
							
								$rw_access_check['has_access'] = "TRUE";
								$rw_access_check['fsg_purchase_check'] = "PASS";
							
							} else {
								
								$rw_access_check['has_access'] = "FALSE";
								$rw_access_check['fsg_purchase_check'] = "FAIL";
								$rw_access_check['fsg_purchase_check_error'] = "A purchase is necessary to access this content";
								
							}
							
						}
					
					}
					
				}
				
			}

		} else {
			
			$rw_access_check['has_access'] = "FALSE";
			$rw_access_check['role_check'] = "FAIL";
			$rw_access_check['role_check_error'] = "Current User does not have the correct role";
			
		}
		
	}
	
	return $rw_access_check;
	
}



// ------------------------------------------------------------------------------------- //
// Function to check if a customer has purchased a particular product
// RE: businessbloomer .com/woocommerce-check-current-user-already-purchased-product/	 //
// ------------------------------------------------------------------------------------- //
function rw_has_logged_in_user_purchased_product($product_id) {
	
	$has_purchased = "N";
	
	// Make sure user is logged in
	if ( ! is_user_logged_in() ) return;
	
	$current_user = wp_get_current_user();
	
	if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product_id ) ) {
		
		$has_purchased = "Y";
		
	} else {
		
		$has_purchased = "N";
		
	}
	
	return $has_purchased;

}



// --------------------------------------------------- //
// Check if customer has completed FSG Questionnaire
// --------------------------------------------------- //
function rw_check_if_customer_has_fsg() {
	
	$current_user_id = get_current_user_id();
	
	global $wpdb;
	$mytable = $wpdb->prefix . "posts";
	$result = $wpdb->get_row( $wpdb->prepare("SELECT * FROM " . $mytable . " WHERE post_author = %d AND post_type = %s", $current_user_id, 'fsg_questionnaire' ) );
	
	$row_count = $wpdb->num_rows;
	
	if ($row_count > 0) {
		
		$fsg_exists = "Y";
		
	} else {
		
		$fsg_exists = "N";
		
	}
	
	return $fsg_exists;
	
}



// ------------------------------------------------------------------------------------- //
// Function to disable a repeat purchase of the FSG for a customer (not consultant).     //
// RE: http s: // www . skyverge. com/blog/prevent-repeat-purchase-with-woocommerce/	 //
// ------------------------------------------------------------------------------------- //
function rw_disable_repeat_purchase($purchasable, $product) {
	
	$user_info = wp_get_current_user();
	$allowed_roles = array( 'customer' );
	
	if ( array_intersect( $allowed_roles, $user_info->roles ) ) {
	
		// Enter the ID of the product that shouldn't be purchased again
		$non_purchasable = 9116;
		
		// Get the ID for the current product (passed in)
		$product_id = $product->get_id();
		
		// Bail unless the ID is equal to our desired non-purchasable product
		if ( $non_purchasable != $product_id ) {
			return $purchasable;
		}
		
		// return false if the customer has bought the product
		if ( wc_customer_bought_product( wp_get_current_user()->user_email, get_current_user_id(), $product_id ) ) {
			$purchasable = false;
		}
		
		// Double-check for variations: if parent is not purchasable, then variation is not
		if ( $purchasable && $product->is_type( 'variation' ) ) {
			$parent = wc_get_product( $product->get_parent_id() );
			$purchasable = $parent->is_purchasable();
		}
		
		if (rw_check_if_customer_has_fsg() == "Y") {
			$purchasable = false;
		}

	}
	
	return $purchasable;

}
add_filter( 'woocommerce_variation_is_purchasable', 'rw_disable_repeat_purchase', 10, 2 );
add_filter( 'woocommerce_is_purchasable', 'rw_disable_repeat_purchase', 10, 2 );

// ------------------------------------------------------------------------------------- //
// Function to message to tell customer they can only purchase 1 FSG                     //
// RE: http s: // www . skyverge. com/blog/prevent-repeat-purchase-with-woocommerce/	 //
// ------------------------------------------------------------------------------------- //
function rw_purchase_disabled_message() {
	
	$user_info = wp_get_current_user();
	$allowed_roles = array( 'customer' );
	
	if ( array_intersect( $allowed_roles, $user_info->roles ) ) {
	
		// Enter the ID of the product that shouldn't be purchased again
		$no_repeats_id = 9116;
		$no_repeats_product = wc_get_product( $no_repeats_id );
		
		// Get the current product to check if purchasing should be disabled
		global $product;
		
		if ( $no_repeats_product->is_type( 'variation' ) ) {
		
			// Bail if we're not looking at the product page for the non-purchasable product
			if ( ! $no_repeats_product->get_parent_id() === $product->get_parent_id() ) {
			
				return;
			
			}
			
			// Render the purchase restricted message if we are
			if ( wc_customer_bought_product( wp_get_current_user()->user_email, get_current_user_id(), $no_repeats_id ) ) {
				
				sv_render_variation_non_purchasable_message( $product, $no_repeats_id );
			
			}
			
		} elseif ( $no_repeats_id === $product->get_id() ) {
			
			if ( ( wc_customer_bought_product( wp_get_current_user()->user_email, get_current_user_id(), $no_repeats_id ) ) || (rw_check_if_customer_has_fsg() == "Y") ) {
				
				// Create your message for the customer here
				echo '<div class="woocommerce"><div class="woocommerce-info wc-nonpurchasable-message">You\'ve already purchased this product! It can only be purchased once.</div></div>';
				
			}
		
		}
	
	}
	
	
}
add_action( 'woocommerce_single_product_summary', 'rw_purchase_disabled_message', 31 );



// --------------------------------------------------- //
// Count how many FSGs a consultant has created
// --------------------------------------------------- //
function rw_get_total_consultant_fsg() {
	
	$current_user_id = get_current_user_id();
	
	global $wpdb;
	$mytable = $wpdb->prefix . "posts";
	$result = $wpdb->get_row( $wpdb->prepare("SELECT * FROM " . $mytable . " WHERE post_author = %d AND post_type = %s", $current_user_id, 'fsg_questionnaire' ) );
	
	$row_count = $wpdb->num_rows;
	
	return $row_count;

}



// --------------------------------------------------- //
// Lookup to find out if a user has purchased a FSG
// --------------------------------------------------- //
function wc_product_sold_count() {
	
    // Only for logged in users
    if ( ! is_user_logged_in() ) return; // Exit for non logged users

    global $wpdb, $product;

    $user_id = get_current_user_id(); // Current User ID - Need check for consultants and admins only
    $product_id = 9116; // Current Product ID

    // The SQL request
    $units_bought = $wpdb->get_var( "
		SELECT SUM(woim2.meta_value)
		FROM {$wpdb->prefix}woocommerce_order_items AS woi
		INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta woim ON woi.order_item_id = woim.order_item_id
		INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta woim2 ON woi.order_item_id = woim2.order_item_id
		INNER JOIN {$wpdb->prefix}postmeta pm ON woi.order_id = pm.post_id
		INNER JOIN {$wpdb->prefix}posts AS p ON woi.order_id = p.ID
		WHERE woi.order_item_type LIKE 'line_item'
		AND p.post_type LIKE 'shop_order'
		AND p.post_status IN ('wc-completed','wc-processing')
		AND pm.meta_key = '_customer_user'
		AND pm.meta_value = '$user_id'
		AND woim.meta_key = '_product_id'
		AND woim.meta_value = '$product_id'
		AND woim2.meta_key = '_qty'
    ");
    
    return $units_bought;
    
}



// --------------------------------------------------- //
// Get a list of users by role
// --------------------------------------------------- //
function get_users_by_role($role, $orderby, $order) {
    
    $args = array(
        'role'    => $role,
        'orderby' => $orderby,
        'order'   => $order
    );

    $users = get_users( $args );

    return $users;
}



// --------------------------------------------------- //
// Look Up Consultant ID
// User to find out if a Customer has a Consultant 
// --------------------------------------------------- //
function get_consultant_by_client_id($client_id) {
	
	global $wpdb;
				
	$loop = $wpdb->get_results( 
				$wpdb->prepare(
					"SELECT * " .
					"FROM {$wpdb->prefix}rw_consultant_client_lookup " .
					"WHERE user_id = %d", $client_id
				)
			);
			
	//echo "<pre>";
	//print_r($loop);
	//echo "</pre>";
	
	if (!empty($loop)) {
	
		$consultant_id = $loop[0]->consultant_id;
	
	} else {
		
		$consultant_id = "";
		
	}
			
	return $consultant_id;

}



// --------------------------------------------------- //
// Get List of Countries that have active members
// --------------------------------------------------- //
function get_active_member_countries(){
    global $wpdb;

    // Getting all User IDs and data for a membership plan
    //SELECT DISTINCT um.user_id, u.user_email, u.display_name, p2.post_title, p2.post_type
    /*
    return $wpdb->get_results( "
		SELECT DISTINCT um.meta_value 
		FROM {$wpdb->prefix}posts AS p
		LEFT JOIN {$wpdb->prefix}posts AS p2 ON p2.ID = p.post_parent
		LEFT JOIN {$wpdb->prefix}users AS u ON u.id = p.post_author
		LEFT JOIN {$wpdb->prefix}usermeta AS um ON u.id = um.user_id
		WHERE p.post_type = 'wc_user_membership'
		AND p.post_status IN ('wcm-active')
		AND p2.post_type = 'wc_membership_plan'
		AND um.meta_key = 'consultant_country'
		ORDER BY um.meta_value ASC
    ");
    */
    
     return $wpdb->get_results( "
		SELECT DISTINCT um.meta_value 
		FROM {$wpdb->prefix}posts AS p
		LEFT JOIN {$wpdb->prefix}posts AS p2 ON p2.ID = p.post_parent
		LEFT JOIN {$wpdb->prefix}users AS u ON u.id = p.post_author
		LEFT JOIN {$wpdb->prefix}usermeta AS um ON u.id = um.user_id
		WHERE p.post_type = 'wc_user_membership'
		AND p.post_status IN ('wcm-active')
		AND p2.post_type = 'wc_membership_plan'
		AND p2.post_name IN ('empower-member', 'empower-consultant', 'empower-professional', 'empower-master')
		AND um.meta_key = 'consultant_country'
		ORDER BY um.meta_value ASC
    ");
    
    
    
    
}



// --------------------------------------------------- //
// Get Active Members By Country
// --------------------------------------------------- //

/*
wcm-active – Active
wcm-delayed – Delayed
wcm-complimentary – Complimentary
wcm-pending – Pending cancellation
wcm-expired – Expired
wcm-cancelled – Cancelled
*/

function get_active_members_for_membership($country) {
    
    global $wpdb;

    // Getting all User IDs and data for a membership plan
    //SELECT DISTINCT um.user_id, u.user_email, u.display_name, u.user_nicename, p2.post_title, p2.post_type 
	$sql = 	$wpdb->prepare(
			"SELECT DISTINCT u.id, um.user_id, u.user_nicename 
			FROM {$wpdb->prefix}posts AS p
			LEFT JOIN {$wpdb->prefix}posts AS p2 ON p2.ID = p.post_parent
			LEFT JOIN {$wpdb->prefix}users AS u ON u.id = p.post_author
			LEFT JOIN {$wpdb->prefix}usermeta AS um ON u.id = um.user_id
			WHERE p.post_type = 'wc_user_membership'
			AND p.post_status IN ('wcm-active','wcm-pending')
			AND p2.post_type = 'wc_membership_plan'
			AND um.meta_key = 'consultant_country'
			AND um.meta_value = %s", $country);
	
	//echo $sql;
	//AND p2.post_type = 'wc_membership_plan'
	
	$result = $wpdb->get_results($sql);
			    
	//echo '<pre>'; print_r( $result ); echo '</pre>';
	
	return $result;

}


function get_active_members_for_membership_default() {
    
    global $wpdb;

    // Getting all User IDs and data for a membership plan
    //SELECT DISTINCT um.user_id, u.user_email, u.display_name, u.user_nicename, p2.post_title, p2.post_type 
	$sql = 	$wpdb->prepare(
			"SELECT DISTINCT u.id, um.user_id, u.user_nicename 
			FROM {$wpdb->prefix}posts AS p
			LEFT JOIN {$wpdb->prefix}posts AS p2 ON p2.ID = p.post_parent
			LEFT JOIN {$wpdb->prefix}users AS u ON u.id = p.post_author
			LEFT JOIN {$wpdb->prefix}usermeta AS um ON u.id = um.user_id
			WHERE p.post_type = 'wc_user_membership'
			AND p.post_status IN ('wcm-active')
			AND p2.post_type = 'wc_membership_plan'
			AND p2.post_name IN ('empower-member', 'empower-consultant', 'empower-professional', 'empower-master')
			AND um.meta_key = 'consultant_country'
			ORDER BY um.meta_value ASC");
	
	$result = $wpdb->get_results($sql);
			    
	//echo '<pre>'; print_r( $result ); echo '</pre>';
	
	return $result;

}



// --------------------------------------------------- //
// Directory Profile Form Processing
// --------------------------------------------------- //
add_action( 'admin_post_rw_save_directory_profile_form', 'rw_save_directory_profile_form' );
function rw_save_directory_profile_form() {
	
	if(!isset($_REQUEST['user_id'])) return;
	
	do_action('acf/save_post', $_REQUEST['user_id']);
	
	wp_redirect(add_query_arg('updated', 'success', wp_get_referer()));
	
	exit;
	
}



// --------------------------------------------------- //
// Populate Directory Profile Form with current values //
// --------------------------------------------------- //
/*
$consultant_name = get_field('consultant_name', 'user_' . $consultant_id);
$consultant_company = get_field('consultant_company', 'user_' . $consultant_id);
$consultant_city = get_field('consultant_city', 'user_' . $consultant_id);
$consultant_state__province = get_field('consultant_state__province', 'user_' . $consultant_id);
$consultant_country = get_field('consultant_country', 'user_' . $consultant_id);
$consultant_phone = get_field('consultant_phone', 'user_' . $consultant_id);
$consultant_email = get_field('consultant_email', 'user_' . $consultant_id);
$consultant_website = get_field('consultant_website', 'user_' . $consultant_id);
$consultant_profile_image = get_field('consultant_profile_image', 'user_' . $consultant_id);
$consultant_bio = get_field('consultant_bio', 'user_' . $consultant_id);
*/
	
function rw_load_acf_consultant_directory_profile_field_value($field) {
	
	// only on front end
	if ( is_admin() ) {
		return $field;
	}
	
	$consultant_id = get_current_user_id();

	switch( $field['key'] ) {
				
		//Edit Form
		case 'field_611afef700cf9':
			$field['value'] = get_user_meta( $consultant_id, 'consultant_name', true );
			break;
		
		case 'field_611aff1500cfa':
			$field['value'] = get_user_meta( $consultant_id, 'consultant_company', true );
			break;
		
		case 'field_611aff2400cfb':
			$field['value'] = get_user_meta( $consultant_id, 'consultant_city', true );
			break;
			
		case 'field_611aff2c00cfc':
			$field['value'] = get_user_meta( $consultant_id, 'consultant_state__province', true );
			break;
		
		case 'field_611aff3e00cfd':
			$field['value'] = get_user_meta( $consultant_id, 'consultant_country', true );
			break;
		
		case 'field_611affac8e153':
			$field['value'] = get_user_meta( $consultant_id, 'consultant_phone', true );
			break;
		
		case 'field_611affb78e154':
			$field['value'] = get_user_meta( $consultant_id, 'consultant_email', true );
			break;
			
		case 'field_611affc28e155':
			$field['value'] = get_user_meta( $consultant_id, 'consultant_website', true );
			break;
			
		case 'field_611affc28e155':
			$field['value'] = get_user_meta( $consultant_id, 'consultant_website', true );
			break;
			
		case 'field_611c201ab894d':
			$field['value'] = get_user_meta( $consultant_id, 'consultant_bio', true );
			break;
	
	}

	return $field;
	
}
add_filter('acf/load_field', 'rw_load_acf_consultant_directory_profile_field_value');




?>