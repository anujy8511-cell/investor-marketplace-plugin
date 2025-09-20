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
	$poverty_measure    		= sanitize_text_field($_POST['poverty_measure']);

		$mfp_poverty_outreach 			= 	 $wpdb->prefix.'mfp_poverty_outreach';
		$table_name 					= 	$mfp_poverty_outreach;
		
		$column_name = array(
			'user_id'          			=> $currentuser_id, 
			'no_worker_poverty' 		=> $poverty_measure,
		);
		
	insert_user_info_db($table_name, $column_name);