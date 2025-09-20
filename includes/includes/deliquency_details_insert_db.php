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


	// $currentuser_id         = get_current_user_id();
	$delinquency_gloan    	= sanitize_text_field($_POST['delinquency_gloan']);
	$delinquency_cportfolio = sanitize_text_field($_POST['delinquency_cportfolio']);
	$delinquency_rloan    	= sanitize_text_field($_POST['delinquency_rloan']);
	$delinquency_p1to30    	= sanitize_text_field($_POST['delinquency_p1to30']);
	$delinquency_pto30    	= sanitize_text_field($_POST['delinquency_pto30']);
	$delinquency_p31to90    = sanitize_text_field($_POST['delinquency_p31to90']);
	$delinquency_pto90    	= sanitize_text_field($_POST['delinquency_pto90']);
	$delinquency_p91to180   = sanitize_text_field($_POST['delinquency_p91to180']);
	$delinquency_pto180    	= sanitize_text_field($_POST['delinquency_pto180']);
	$delinquency_write_off  = sanitize_text_field($_POST['delinquency_write_off']);	
	// table name for clients and columns data
	$mfp_delinquency 				= 	$wpdb->prefix.'mfp_delinquency';
	$table_name 					= 	$mfp_delinquency;
	
	$column_name = array(
		'user_id'				=>	$currentuser_id, 
		'gloan_port_deli'		=>	$delinquency_gloan,
		'glp_current_deli'		=>	$delinquency_cportfolio,
		'glp_rene_loans_deli'	=>	$delinquency_rloan, 
		'glp_par_1to30_deli'	=>	$delinquency_p1to30, 
		'glp_par_30_deli'		=>	$delinquency_pto30, 
		'glp_par_31to90_deli'	=>	$delinquency_p31to90, 
		'glp_par_90_deli'		=>	$delinquency_pto90, 
		'glp_par_91to180_deli'	=>	$delinquency_p91to180, 
		'glp_par_180_deli'		=>	$delinquency_pto180, 
		'glp_woffs_deli'		=>	$delinquency_write_off, 	
	);
	insert_user_info_db($table_name, $column_name);