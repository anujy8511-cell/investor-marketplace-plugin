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
	$nfinancial_service         = sanitize_text_field($_POST['nfinancial_service']);
	$nfinancial_edu_service    	= sanitize_text_field($_POST['nfinancial_edu_service']);
	$efinancial_sample_service  = sanitize_text_field($_POST['efinancial_sample_service']);
	// table name for clients and columns data
	$mfp_enterprises_financed 		= 	 $wpdb->prefix.'mfp_enterprises_financed';
	$table_name = $mfp_enterprises_financed;
	
	$column_name = array(
		'user_id'=> $currentuser_id, 
		'no_ep_ent_financed'=> $nfinancial_service,
		'no_stup_ent_financed'=>$nfinancial_edu_service,
		'no_clsmaple_ent_financed'=>$efinancial_sample_service	
	);
	insert_user_info_db($table_name, $column_name);