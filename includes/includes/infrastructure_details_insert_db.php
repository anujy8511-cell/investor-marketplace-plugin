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
	// $currentuser_id         	= get_current_user_id();
	$infra_no_personnel       	= sanitize_text_field($_POST['infra_no_personnel']);
	$infra_active_female        = sanitize_text_field($_POST['infra_active_female']);
	$infra_staff_stable 		= sanitize_text_field($_POST['infra_staff_stable']);
	$infra_no_managers 			= sanitize_text_field($_POST['infra_no_managers']);
	$infra_manager_female 		= sanitize_text_field($_POST['infra_manager_female']);
	$infra_loan_officers 		= sanitize_text_field($_POST['infra_loan_officers']);
	$infra_officer_female 		= sanitize_text_field($_POST['infra_officer_female']);
	$infra_board_member 		= sanitize_text_field($_POST['infra_board_member']);
	$infra_board_female 		= sanitize_text_field($_POST['infra_board_female']);
	$infra_staff_leave 			= sanitize_text_field($_POST['infra_staff_leave']);
	$infra_branches 			= sanitize_text_field($_POST['infra_branches']);
	$infra_no_agents 			= sanitize_text_field($_POST['infra_no_agents']);
	$infra_agents_active30 		= sanitize_text_field($_POST['infra_agents_active30']);
	$infra_no_atms 				= sanitize_text_field($_POST['infra_no_atms']);
	$infra_atm_active30 		= sanitize_text_field($_POST['infra_atm_active30']);
	$infra_no_merchant 			= sanitize_text_field($_POST['infra_no_merchant']);
	$infra_merchants_active30 	= sanitize_text_field($_POST['infra_merchants_active30']);
	$infra_no_sub_branch 		= sanitize_text_field($_POST['infra_no_sub_branch']);
	$infra_branch_active30 		= sanitize_text_field($_POST['infra_branch_active30']);
	$infra_no_rov_staff 		= sanitize_text_field($_POST['infra_no_rov_staff']);
	$infra_roving_active30		= sanitize_text_field($_POST['infra_roving_active30']);
	// table name for infrastructure
	$mfp_infrastructure 			=	$wpdb->prefix.'mfp_infrastructure';

	$table_name 					= 	$mfp_infrastructure;
	
	$column_name = array(
		'user_id'          			=> $currentuser_id, 
		'infra_no_personnel' 		=> $infra_no_personnel, 
		'infra_active_female'		=> $infra_active_female, 
		'infra_staff_stable'		=> $infra_staff_stable, 
		'infra_no_managers'			=> $infra_no_managers, 
		'infra_manager_female'		=> $infra_manager_female, 
		'infra_loan_officers'		=> $infra_loan_officers, 
		'infra_officer_female'		=> $infra_officer_female, 
		'infra_board_member'		=> $infra_board_member, 
		'infra_board_female'		=> $infra_board_female, 
		'infra_staff_leave'			=> $infra_staff_leave, 
		'infra_branches'			=> $infra_branches, 
		'infra_no_agents'			=> $infra_no_agents, 
		'infra_agents_active30'		=> $infra_agents_active30, 
		'infra_no_atms'				=> $infra_no_atms, 
		'infra_atm_active30'		=> $infra_atm_active30, 
		'infra_no_merchant'			=> $infra_no_merchant, 
		'infra_merchants_active30'	=> $infra_merchants_active30,
		'infra_no_sub_branch'		=> $infra_no_sub_branch,
		'infra_branch_active30'		=> $infra_branch_active30,
		'infra_no_rov_staff'		=> $infra_no_rov_staff,
		'infra_roving_active30'		=> $infra_roving_active30,
	);
	
	insert_user_info_db($table_name, $column_name);