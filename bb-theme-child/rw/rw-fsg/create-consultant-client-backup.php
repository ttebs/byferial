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
	
function rw_consultant_client_create_db() {
	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	
	//* Create the teams table
	$table_name = $wpdb->prefix . 'rw_consultant_client_lookup';
	$sql = "CREATE TABLE $table_name (
	consultant_id INTEGER NOT NULL AUTO_INCREMENT,
	user_id TEXT NOT NULL,
	PRIMARY KEY (consultant_id, user_id)
	) $charset_collate;";
	dbDelta( $sql );
}
add_action( 'init', 'rw_consultant_client_create_db' );
*/



// --------------------------------- //
// Add Link (Tab) to My Account menu //
// --------------------------------- //

if ( current_user_can('administrator') || current_user_can('consultant') ) {
	
	add_filter ( 'woocommerce_account_menu_items', 'rw_add_myclients', 40 );
	function rw_add_myclients( $menu_links ) {
		
		$menu_links = array_slice( $menu_links, 0, 5, true ) 
		+ array( 'my-clients' => 'My Clients' )
		+ array_slice( $menu_links, 5, NULL, true );
		
		return $menu_links;

	}

}



// ---------------------------------------------- //
// Create a link for Client to view their own FSG //
// ---------------------------------------------- //

// Get Current User ID
// Check if current user role == Customer. and if we are on a page using the my-account template to reduce how often this query is run
// Check to see if Current User has a FSG Questionnaire where post_author = current_user_id
// Add Filter to add the View Personal FSG to My Account menu

//if ( (current_user_can( 'customer' )) && (is_page_template( 'tpl-my-account.php' )) ) {
if ( (current_user_can( 'customer' )) ) {
//if ( is_account_page() ) {
	
	if ( is_user_logged_in() ) {
		
		$customer_id = get_current_user_id();
		
		//function rw_personal_fsg_access_check( $role_check="N", $fsg_questionnaire_check="N", $fsg_purchase_check="N" ) {
		$rw_access_check = rw_personal_fsg_access_check('Y','Y','Y');
		
		if ($rw_access_check['has_access'] == "TRUE") {
	
			// Add Button to My Account Menu
			add_filter ( 'woocommerce_account_menu_items', 'rw_add_personal_fsg', 40 );
			function rw_add_personal_fsg( $menu_links ) {
				
				$menu_links = array_slice( $menu_links, 0, 5, true ) 
				+ array( 'personal-fsg' => 'View Fashion & Style Guide' )
				+ array_slice( $menu_links, 5, NULL, true );
				
				return $menu_links;
		
			}
			
			// Set URL of button
			add_filter( 'woocommerce_get_endpoint_url', 'rw_add_personal_fsg_endpoint', 10, 4 );
			function rw_add_personal_fsg_endpoint( $url, $endpoint, $value, $permalink ){
				
				$customer_id = get_current_user_id();
				
				$client = get_user_by( 'id' , $customer_id );
			 
				if( $endpoint === 'personal-fsg' ) {
			 
					// ok, here is the place for your custom URL, it could be external
					$url = site_url() . '/personal-fsg/';
			 
				}
				return $url;
			 
			}
			
		}
	
	}
	
}



// ---------------------------- //
// Register Permalink Endpoints //
// ---------------------------- //
add_action( 'init', 'rw_add_endpoint' );
function rw_add_endpoint() {

	add_rewrite_endpoint( 'my-clients', EP_ROOT | EP_PAGES );

}



// ------------------------------------------------------------------------------------ //
// Content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint //
// ------------------------------------------------------------------------------------ //
// Go to Settings > Permalinks and just push "Save Changes" button.
add_action( 'woocommerce_account_my-clients_endpoint', 'rw_my_account_my_clients_endpoint_content' );
function rw_my_account_my_clients_endpoint_content() {

	get_template_part( 'rw/rw-fsg/my-account', 'my-clients' );

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
	return $query_vars;

}

add_filter( 'the_title', 'woocommerce_endpoint_titles', 10, 2 );
function woocommerce_endpoint_titles( $title, $id ) {

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
	
	
	if ( is_wc_endpoint_url( 'my-clients' ) && in_the_loop() ) {
		$title = 'My Clients';    
	}
	if ( is_wc_endpoint_url( 'add-client' ) && in_the_loop() ) {
		$title = 'Add Client';    
	}
	if ( is_wc_endpoint_url( 'view-client' ) && in_the_loop() ) {
		$title = 'View Client';    
	}
	if ( is_wc_endpoint_url( 'edit-client' ) && in_the_loop() ) {
		$title = 'Edit Client';    
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
	return $title;
}



// --------------------------------------------- //
// Consultant Client Page						 //
// Tell Wordpress of new query variable to track //
// --------------------------------------------- //
function rw_add_query_vars($vars) {
	$vars[] = "view-client";
	$vars[] = "edit-client";
	$vars[] = "client";
	return $vars;
}
// hook rw_add_query_vars function into query_vars
add_filter('query_vars', 'rw_add_query_vars');



// http s ://wordpress.stackexchange.com/questions/292066/woocommerce-my-account-endpoint-how-to-get-id-parameter-from-url
add_action( 'init', 'rw_add_consultant_client_rewrite_rules' );
function rw_add_consultant_client_rewrite_rules() {

	add_rewrite_rule( 'consultant-client-fsg/client/([^/]+)/?$', 'index.php?pagename=consultant-client-fsg&client=$matches[1]', 'top' );

}



// -------------------------------------- //
//	Add New Client Form Processing Script //
//--------------------------------------- //
add_action( 'acf/pre_save_post', 'rw_generate_new_user_id', 10, 2 );
function rw_generate_new_user_id( $post_id, $form ) {
	
	// Check that we are targeting the right form by checking the acf_form ID.
	if ( ! isset( $form['id'] ) || 'new-client-registration' != $form['id'] ) {
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



// ------------------------------------------------- //
// Edit Consultant Client FSG Questionnaire
// ------------------------------------------------- //
/*
add_action( 'acf/pre_save_post', 'rw_update_consultant_client_fsg_questionnaire', 10, 2 );
function rw_update_consultant_client_fsg_questionnaire( $post_id, $form ) {
	
	// Check that we are targeting the right form by checking the acf_form ID.
	if ( ! isset( $form['id'] ) || 'edit-consultant-client-fsg-questionnaire' != $form['id'] ) {
		return $post_id;
	}
	
	// Exit if this is a new post
	if( $post_id == 'new_post' ) {
        return $post_id;
    }

	$rw_client_slug = sanitize_text_field( urldecode( get_query_var('client') ) );
	
	$obj_id = get_queried_object_id();
	$redirect_url = get_permalink( $obj_id ) . 'client/' . $rw_client_slug . '/';
	
	$client = get_user_by( 'slug' , $rw_client_slug );
	
	// Create an empty array to add user field data into
	$postdata = array();

	// Check for the fields we need in our postdata, and add them to the $user_fields array if they exist	
	//$user_id = explode("_", $post_id);
	//$userdata['ID'] = $user_id[1];
	
	if ( isset( $_POST['acf']['field_5f92f68176b50'] ) ) {
		$postdata['head_to_floor'] = sanitize_text_field( $_POST['acf']['field_5f92f68176b50'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f6ae76b51'] ) ) {
		$postdata['bust_to_floor'] = sanitize_text_field( $_POST['acf']['field_5f92f6ae76b51'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f6b976b52'] ) ) {
		$postdata['hip_to_floor'] = sanitize_text_field( $_POST['acf']['field_5f92f6b976b52'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f6c476b53'] ) ) {
		$postdata['kneecap_to_floor'] = sanitize_text_field( $_POST['acf']['field_5f92f6c476b53'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f6ce76b54'] ) ) {
		$postdata['full_bust_circumference'] = sanitize_text_field( $_POST['acf']['field_5f92f6ce76b54'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f6db76b55'] ) ) {
		$postdata['bra_cup_size'] = sanitize_text_field( $_POST['acf']['field_5f92f6db76b55'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f70176b56'] ) ) {
		$postdata['full_hip_circumference'] = sanitize_text_field( $_POST['acf']['field_5f92f70176b56'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f71076b57'] ) ) {
		$postdata['waist_circumference'] = sanitize_text_field( $_POST['acf']['field_5f92f71076b57'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f71976b58'] ) ) {
		$postdata['wrist_circumference'] = sanitize_text_field( $_POST['acf']['field_5f92f71976b58'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f72876b59'] ) ) {
		$postdata['ankle_circumference'] = sanitize_text_field( $_POST['acf']['field_5f92f72876b59'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f73276b5a'] ) ) {
		$postdata['neck_length'] = sanitize_text_field( $_POST['acf']['field_5f92f73276b5a'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f75cd3bc9'] ) ) {
		$postdata['neck_circumference'] = sanitize_text_field( $_POST['acf']['field_5f92f75cd3bc9'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f782d3bca'] ) ) {
		$postdata['shoulders'] = sanitize_text_field( $_POST['acf']['field_5f92f782d3bca'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f7afd3bcb'] ) ) {
		$postdata['prominent_features'] = sanitize_text_field( $_POST['acf']['field_5f92f7afd3bcb'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f8e0e202b'] ) ) {
		$postdata['face_shape'] = sanitize_text_field( $_POST['acf']['field_5f92f8e0e202b'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f923e202c'] ) ) {
		$postdata['weight'] = sanitize_text_field( $_POST['acf']['field_5f92f923e202c'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f93fe202d'] ) ) {
		$postdata['age'] = sanitize_text_field( $_POST['acf']['field_5f92f93fe202d'] );
	}

	//$postdata['post_author'] = $client->ID;
	
	$post_id = wp_update_post( $postdata );

	wp_redirect( $redirect_url );
	exit;
	
	return $post_id;

}
*/


// ------------------------------------------------- //
// Edit End User FSG Questionnaire
// ------------------------------------------------- //

add_action( 'acf/pre_save_post', 'rw_update_user_fsg_questionnaire', 10, 2 );
function rw_update_user_fsg_questionnaire( $post_id, $form ) {
	
	// Check that we are targeting the right form by checking the acf_form ID.
	if ( (!isset($form['id'])) || ($form['id'] != 'edit-user-fsg-questionnaire') ) {
		return $post_id;
	}
	
	// Exit if this is a new post
	if ( $post_id == 'new_post' ) {
        return $post_id;
    }
	
	$obj_id = get_queried_object_id();
	$redirect_url = get_permalink( $obj_id );
	
	//$client = get_user_by( 'slug' , $rw_client_slug );
	
	// Create an empty array to add user field data into
	$postdata = array();

	// Check for the fields we need in our postdata, and add them to the $user_fields array if they exist	
	if ( isset( $_POST['acf']['field_5f92f68176b50'] ) ) {
		$postdata['head_to_floor'] = sanitize_text_field( $_POST['acf']['field_5f92f68176b50'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f6ae76b51'] ) ) {
		$postdata['bust_to_floor'] = sanitize_text_field( $_POST['acf']['field_5f92f6ae76b51'] );		
	}
	
	if ( isset( $_POST['acf']['field_5f92f6b976b52'] ) ) {
		$postdata['hip_to_floor'] = sanitize_text_field( $_POST['acf']['field_5f92f6b976b52'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f6c476b53'] ) ) {
		$postdata['kneecap_to_floor'] = sanitize_text_field( $_POST['acf']['field_5f92f6c476b53'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f6ce76b54'] ) ) {
		$postdata['full_bust_circumference'] = sanitize_text_field( $_POST['acf']['field_5f92f6ce76b54'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f6db76b55'] ) ) {
		$postdata['bra_cup_size'] = sanitize_text_field( $_POST['acf']['field_5f92f6db76b55'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f70176b56'] ) ) {
		$postdata['full_hip_circumference'] = sanitize_text_field( $_POST['acf']['field_5f92f70176b56'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f71076b57'] ) ) {
		$postdata['waist_circumference'] = sanitize_text_field( $_POST['acf']['field_5f92f71076b57'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f71976b58'] ) ) {
		$postdata['wrist_circumference'] = sanitize_text_field( $_POST['acf']['field_5f92f71976b58'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f72876b59'] ) ) {
		$postdata['ankle_circumference'] = sanitize_text_field( $_POST['acf']['field_5f92f72876b59'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f73276b5a'] ) ) {
		$postdata['neck_length'] = sanitize_text_field( $_POST['acf']['field_5f92f73276b5a'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f75cd3bc9'] ) ) {
		$postdata['neck_circumference'] = sanitize_text_field( $_POST['acf']['field_5f92f75cd3bc9'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f782d3bca'] ) ) {
		$postdata['shoulders'] = sanitize_text_field( $_POST['acf']['field_5f92f782d3bca'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f7afd3bcb'] ) ) {
		$postdata['prominent_features'] = sanitize_text_field( $_POST['acf']['field_5f92f7afd3bcb'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f8e0e202b'] ) ) {
		$postdata['face_shape'] = sanitize_text_field( $_POST['acf']['field_5f92f8e0e202b'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f923e202c'] ) ) {
		$postdata['weight'] = sanitize_text_field( $_POST['acf']['field_5f92f923e202c'] );
	}
	
	if ( isset( $_POST['acf']['field_5f92f93fe202d'] ) ) {
		$postdata['age'] = sanitize_text_field( $_POST['acf']['field_5f92f93fe202d'] );
	}

	//$postdata['post_author'] = $client->ID;
	
	$post_id = wp_update_post( $postdata );

	wp_redirect( $redirect_url );
	exit;

}




// ---------------------------------------------------------------------//
// When the Questionnaire is save by a consultant for their client		//
// Update the post_author to be the client id and not the consultant id //
// ---------------------------------------------------------------------//

function rw_acf_update_consultant_client_questionnaire_author( $post_id ) {
	
	// If not CPT, exit
	if (get_post_type($post_id) != 'fsg_questionnaire') {
		return;
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
function rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N" ) {
	
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
			
				//////////////////////
				// MEMBERSHIP CHECK //
				//////////////////////
				
				if ($membership_check == "Y") {
				
					// Make sure Consultant is an Active Empower Group Member
					if ( wc_memberships_is_user_active_member( $consultant_id, 'empower-global-group' ) ) {
				
						$rw_access_check['has_access'] = "TRUE";
						$rw_access_check['membership_check'] = "PASS";
						
					} else {
						
						$rw_access_check['has_access'] = "FALSE";
						$rw_access_check['membership_check'] = "FAIL";
						$rw_access_check['membership_error'] = "A current Empower Membership is required to view this page";
						
					}
					
				} // End Membership Check
				
				//////////////////
				// CLIENT CHECK //
				//////////////////
				// Get Client from Slug
				// Re:  www. uforocks .com/blog/passing-get-query-string-parameters-in-wordpress-url
				// Uses following functions in create-consultant-client.php
				// rw_add_query_vars
				// rw_add_rewrite_rules
				
				if ($client_check == "Y") {
					
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
			
			// Because User can either have a FSG created by a consultant
			// or they can purchase and DIY
			// This next step is an OR statement - If either condition is true then grant access
			
			if ($fsg_questionnaire_check == "Y") {

				global $wpdb;
				$mytable = $wpdb->prefix . "posts";
				$result = $wpdb->get_row( $wpdb->prepare("SELECT * FROM " . $mytable . " WHERE post_author = %d AND post_type = %s", $current_user_id, 'fsg_questionnaire' ) );
				
				$row_count = $wpdb->num_rows;
				
				if ($row_count > 0) {
					
					$rw_access_check['has_access'] = "TRUE";
					$rw_access_check['fsg_questionnaire_check'] = "PASS";
					
				} else {
					
					//echo "This user does not have a fsg questionnaire record";
					$rw_access_check['has_access'] = "FALSE";
					$rw_access_check['fsg_questionnaire_check'] = "FAIL";
					$rw_access_check['fsg_questionnaire_check_error'] = "No FSG Questionnaire Record Exists";
					
				}
				
			}
			
			if ($fsg_purchase_check == "Y") {
				
				// Enter Product ID of FSG Product Here = on test site its 2400
				if (rw_has_logged_in_user_purchased_product(2400) == "Y") {
				
					$rw_access_check['has_access'] = "TRUE";
					$rw_access_check['fsg_purchase_check'] = "PASS";
				
				} else {
					
					$rw_access_check['has_access'] = "FALSE";
					$rw_access_check['fsg_purchase_check'] = "FAIL";
					$rw_access_check['fsg_purchase_check_error'] = "A purchase is necessary to access this content";
					
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


?>