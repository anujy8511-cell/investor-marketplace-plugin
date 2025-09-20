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


	// $currentuser_id         		= get_current_user_id();
	$environmental_policies    		= json_encode($_POST['environmental_policies']);
	$environmental_friendly    		= json_encode($_POST['environmental_friendly']);

		$msp_environment				=	 $wpdb->prefix.'msp_environment';
		$table_name 					= 	$msp_environment;
		
		$column_name = array(
			'user_id'          		=>  $currentuser_id,
			'env_policies' 			=> $environmental_policies,
			'env_products' 			=> $environmental_friendly,
		);
		//print_r($column_name);
		
	insert_user_info_db($table_name, $column_name);