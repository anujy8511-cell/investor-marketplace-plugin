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


	// $currentuser_id             	= get_current_user_id();
	$dproduct_deposit     			= sanitize_text_field($_POST['dproduct_deposit']);	
	$dproduct_deposit_corporations  = sanitize_text_field($_POST['dproduct_deposit_corporations']);	
	$dproduct_deposit_finstitute    = sanitize_text_field($_POST['dproduct_deposit_finstitute']);	
	$dproduct_deposit_govt     		= sanitize_text_field($_POST['dproduct_deposit_govt']);	
	$dproduct_deposit_demand     	= sanitize_text_field($_POST['dproduct_deposit_demand']);	
	$dproduct_deposit_time     		= sanitize_text_field($_POST['dproduct_deposit_time']);	
	$dproduct_deposit_compulsary    = sanitize_text_field($_POST['dproduct_deposit_compulsary']);	
	$dproduct_naira     			= sanitize_text_field($_POST['dproduct_naira']);	
	$dproduct_naira_corporations    = sanitize_text_field($_POST['dproduct_naira_corporations']);	
	$dproduct_naira_finstitute     	= sanitize_text_field($_POST['dproduct_naira_finstitute']);	
	$dproduct_naira_govt     		= sanitize_text_field($_POST['dproduct_naira_govt']);	
	$dproduct_naira_demand     		= sanitize_text_field($_POST['dproduct_naira_demand']);	
	$dproduct_naira_time     		= sanitize_text_field($_POST['dproduct_naira_time']);	
	$dproduct_naira_compulsary    	= sanitize_text_field($_POST['dproduct_naira_compulsary']);	
	// table name for clients and columns data
	$mfp_deposit_products 			= 	$wpdb->prefix.'mfp_deposit_products';
	$table_name 					=	$mfp_deposit_products;
	
	$column_name = array(
		'user_id'					=>	$currentuser_id, 
		'no_depoditors_dproduct'	=>	$dproduct_deposit,
		'nd_dfc_dpro'				=>	$dproduct_deposit_corporations,
		'nd_dffi_dpro'				=>	$dproduct_deposit_finstitute, 
		'nd_dfg_dpro'				=>	$dproduct_deposit_govt, 
		'nd_dd_dpro'				=>	$dproduct_deposit_demand, 
		'nd_td_dpro'				=>	$dproduct_deposit_time, 
		'nd_cd_dpro'				=>	$dproduct_deposit_compulsary, 
		'deposits_value_dproduct'	=>	$dproduct_naira, 
		'dv_dfc_dpro'				=>	$dproduct_naira_corporations, 
		'dv_dffi_dpro'				=>	$dproduct_naira_finstitute, 
		'dv_dfg_dpro'				=>	$dproduct_naira_govt, 
		'dv_dd_dpro'				=>	$dproduct_naira_demand, 
		'dv_td_dpro'				=>	$dproduct_naira_time, 
		'dv_cd_dpro'				=>	$dproduct_naira_compulsary		
	);
	insert_user_info_db($table_name, $column_name);