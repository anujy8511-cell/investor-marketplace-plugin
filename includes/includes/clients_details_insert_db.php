<?php 
$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
$output = [];
parse_str($parts['query'], $output);
$user_id = $output['user_id'];
if(is_admin()){
	$currentuser_id = $user_id;
}else{
	$currentuser_id = get_current_user_id();
}


	// $currentuser_id             = get_current_user_id();
	$client_active_clients      = sanitize_text_field($_POST['client_active_clients']);
	$client_active_male       	= sanitize_text_field($_POST['client_active_male']);
	$client_active_female       = sanitize_text_field($_POST['client_active_female']);
	$client_active_entity       = sanitize_text_field($_POST['client_active_entity']);
	$client_active_location     = sanitize_text_field($_POST['client_active_location']);
	$client_active_borrow       = sanitize_text_field($_POST['client_active_borrow']);
	$client_loan_outstanding    = sanitize_text_field($_POST['client_loan_outstanding']);
	$client_loan_male       	= sanitize_text_field($_POST['client_loan_male']);
	$client_loan_female       	= sanitize_text_field($_POST['client_loan_female']);
	$client_loan_entity       	= sanitize_text_field($_POST['client_loan_entity']);
	$client_loan_loaction       = sanitize_text_field($_POST['client_loan_loaction']);
	$client_loan_borrow       	= sanitize_text_field($_POST['client_loan_borrow']);
	$client_gross_port       	= sanitize_text_field($_POST['client_gross_port']);
	$client_gross_male       	= sanitize_text_field($_POST['client_gross_male']);
	$client_gross_female       	= sanitize_text_field($_POST['client_gross_female']);
	$client_gross_entity       	= sanitize_text_field($_POST['client_gross_entity']);
	$client_gross_loaction      = sanitize_text_field($_POST['client_gross_loaction']);
	// table name for clients and columns data
	$mfp_clients 			        =	$wpdb->prefix.'mfp_clients';
	$table_name 					= 	$mfp_clients;
	
	$column_name = array(
		'user_id'					=>	$currentuser_id, 
		'no_act_brw_client'			=>	$client_active_clients, 
		'abi_male_clients'			=>	$client_active_male, 
		'abi_female_clients'		=>	$client_active_female, 
		'abi_legal_ent_clients'		=>	$client_active_entity, 
		'abi_location_clients'		=>	$client_active_location, 
		'abi_new_brws_clients'		=>	$client_active_borrow, 
		'gross_loan_port_clients'	=>	$client_gross_port, 
		'glp_male_clients'			=>	$client_gross_male, 
		'glp_female_clients'		=>	$client_gross_female, 
		'glp_legal_ent_clients'		=>	$client_gross_entity, 
		'glp_location_clients'		=>	$client_gross_loaction, 
		'no_loan_outs_clients'		=>	$client_loan_outstanding, 
		'nlo_male_clients'			=>	$client_loan_male, 
		'nlo_female_clients'		=>	$client_loan_female, 
		'nlo_legal_ent_clients'		=>	$client_loan_entity, 
		'nlo_location_clients'		=>	$client_loan_loaction, 
		'nlo_no_brws_clients'		=>	$client_loan_borrow
	);
	insert_user_info_db($table_name, $column_name);