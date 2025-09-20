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
	$delinquency_write_off    	= sanitize_text_field($_POST['nfinancial_service']);
	$nfinancial_edu_service    	= sanitize_text_field($_POST['nfinancial_edu_service']);
	$nfinancial_women_service   = sanitize_text_field($_POST['nfinancial_women_service']);
	// table name for clients and columns data
	$mfp_non_financial_service 		= 	 $wpdb->prefix.'mfp_non_financial_service';
	$table_name = $mfp_non_financial_service;
	
	$column_name = array(
		'user_id'=> $currentuser_id, 
		'ent_so_non_fs'=> $delinquency_write_off,
		'edu_so_non_fs'=>$nfinancial_edu_service,
		'women_eso_non_fs'=>$nfinancial_women_service	
	);
	insert_user_info_db($table_name, $column_name);