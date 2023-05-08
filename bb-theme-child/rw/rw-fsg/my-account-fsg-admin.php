<?php
$rw_debug = "N";

// rw_consultant_access_check( $role_check="N", $membership_check="N", $client_check="N" )
$rw_access_check = rw_consultant_access_check('Y','N','N');

if ( current_user_can('administrator') && ($rw_debug == "Y") ) {
	
	echo "<pre>";
	echo "<p>";
	print_r($rw_access_check);
	echo "</p>";
	if ( get_query_var('view-client') !== "") {
		echo "<p><strong>Client Slug:</strong> " . get_query_var('view-client') . "</p>";
	}
	if (isset($consultant_id)) {
		echo "<p><strong>Consultant ID:</strong> " . $consultant_id . "</p>";
	}
	echo "</pre>";
	
}
?>

<?php if ($rw_access_check['has_access'] == "FALSE") { ?>

	<div class="alert alert-danger" role="alert">
		<?php 
		if ($rw_access_check['role_check'] == "FAIL") {
			echo '<p style="margin-bottom:0;">' . $rw_access_check['role_error'] . "</p>";
		}
		if ($rw_access_check['membership_check'] == "FAIL") {
			echo '<p style="margin-bottom:0;">' . $rw_access_check['membership_error'] . "</p>";
		}
		if ($rw_access_check['consultant_client_check'] == "FAIL") {
			echo '<p style="margin-bottom:0;">' . $rw_access_check['consultant_client_error'] . "</p>";
		}
		?>
	</div>

<?php } elseif ($rw_access_check['has_access'] == "TRUE") { ?>
	
	<?php
	$roles = array('consultant','customer');
	$orderby = 'meta_value';
	$meta_key = 'last_name';
	$order = 'ASC';
	
	$args = array(
        'fields' 	=> 'all_with_meta',
        'role__in' 	=> $roles,
        'meta_key' 	=> $meta_key,
        'orderby' 	=> 'meta_value',
        'order'   	=> $order
    );

	$loop = get_users( $args );
	
	$get_last_name = ( isset( $_GET['last_name'] ) ) ? sanitize_text_field( $_GET['last_name'] ) : '';
	$get_role = ( isset( $_GET['role'] ) ) ? sanitize_text_field( $_GET['role'] ) : '';
	//$get_email = ( isset( $_GET['email'] ) ) ? sanitize_text_field( $_GET['email'] ) : '';

	?>
	
	
	
	<form action="<?php echo wc_get_account_endpoint_url('fsg-admin'); ?>">
		<div class="rw-filter-wrapper">
			<div>
				<select name="last_name" id="last_name">
					<option value="">Last Name...</option>
					<?php foreach( $loop as $key => $row) { ?>
					<option value="<?php echo $row->last_name; ?>"<?php if($get_last_name == $row->last_name) echo" selected"; ?>><?php echo ucwords($row->last_name); ?></option>
					<?php } ?>
				</select>
			</div>
			<div>
				<select name="role" id="role">
					<option value="">Role...</option>
					<option value="Consultant"<?php if($get_role == "Consultant") echo" selected"; ?>>Consultant</option>
					<option value="Customer"<?php if($get_role == "Customer") echo" selected"; ?>>Customer</option>
				</select>
			</div>
			<div>
				<input type="submit" value="Submit">
			</div>
		</div>
	</form>
		
	
	
	<div class="rw-div-table rw-consultant-client-list">
		<div class="rw-table-head">
			<div class="rw-row">
				<div class="rw-admin-name">
					User
				</div>
				<div class="rw-admin-role">
					Role
				</div>
				<div class="rw-admin-email">
					Email
				</div>
				<div class="rw-edit">
					Edit
				</div>
				<div class="rw-view">
					View FSG
				</div>
			</div>
		</div>
		<div class="rw-table-body">
			
			<?php
			// function get_users_by_role($role, $orderby, $order) {
			//$loop = get_users_by_role('consultant','display_name','ASC');
			
			//check if $_GET variables are set for Last Name, Role or email.
			//if so use them, if not use the defaults
			
			if ($get_role != "") {
				$roles = $get_role;
			} else {
				$roles = array('consultant','customer');
			}
			if ($get_last_name != "") {
				$search = "*" . $get_last_name . "*";
			} else {
				$search = "";
			}
			
			$orderby = 'meta_value';
			$meta_key = 'last_name';
			$order = 'ASC';
			
			
			$args = array(
				
				'search'         => $search,
				'search_columns' => array( 'display_name' ),
				
		        'fields' 	=> 'all_with_meta',
		        'role__in' 	=> $roles,
		        'meta_key' 	=> $meta_key,
		        'orderby' 	=> 'meta_value',
		        'order'   	=> $order
		    );

			$loop = get_users( $args );
			
			//echo "<pre>";
			//print_r($loop);
			//echo "</pre>";
		
			foreach( $loop as $key => $row) {
				// each column in your row will be accessible like this
				//$my_column = $row->column_name;}
			?>
			
			<div class="rw-row">
				<div class="rw-admin-name">
					<?php
					if ($row->first_name != "") {	
	
						if ($row->roles[0] == "consultant") {
						?>
							<a href="<?php echo home_url() . '/my-account/view-consultant/' . $row->user_nicename . '/'; ?>"><?php echo ucwords($row->first_name . " " . $row->last_name); ?></a>
						<?php
						} else if ($row->roles[0] == "customer") {
						?>
							<a href="<?php echo home_url() . '/my-account/view-client/' . $row->user_nicename . '/'; ?>"><?php echo ucwords($row->first_name . " " . $row->last_name); ?></a>
						<?php	
						} else {
						?>
							<?php echo ucwords($row->first_name . " " . $row->last_name); ?>
						<?php
						}
					} else {
						?>
						<a href="<?php echo home_url() . '/my-account/view-client/' . $row->user_nicename . '/'; ?>">No Name</a>
						<?php
					}
					?>
				</div>
				<div class="rw-admin-role">
					<?php echo ucwords($row->roles[0]); ?>
				</div>
				<div class="rw-admin-email">
					<?php echo $row->user_email; ?>
				</div>
				<div class="rw-edit">
					<?php
					if ($row->roles[0] == "customer") {
					?>
						<a href="<?php echo home_url() . '/my-account/edit-client/' . $row->user_nicename . '/'; ?>">Edit Client</a>
					<?php
					}
					?>
				</div>
				<div class="rw-view">
					<a href="<?php echo home_url() . '/consultant-client-fsg/client/' . $row->user_nicename . '/'; ?>">View FSG</a>
				</div>
			</div>
			
			<?php } ?>
			
		</div>
	</div>

<?php } ?>