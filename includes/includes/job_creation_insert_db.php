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
	$jcreation_service    		= sanitize_text_field($_POST['jcreation_service']);
	$jcreation_sample_edata    	= sanitize_text_field($_POST['jcreation_sample_edata']);
	// table name for clients and columns data
	$mfp_job_creation 				= 	 $wpdb->prefix.'mfp_job_creation';
	$table_name                     = $mfp_job_creation;
	
	$column_name = array(
		'user_id'				=> $currentuser_id, 
		'no_worker_jobcres'		=> $nfinancial_service,
		'no_ent_sample_jobcres'	=>$nfinancial_edu_service
	);
	insert_user_info_db($table_name, $column_name);