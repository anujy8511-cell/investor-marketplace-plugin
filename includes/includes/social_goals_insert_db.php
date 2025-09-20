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
	$target_market    		= json_encode($_POST['target_market']);	
	$dev_goal    			= json_encode($_POST['dev_goal']);
	$poverty_level    		= json_encode($_POST['poverty_level']);
	$measure_poverty    	= sanitize_text_field($_POST['measure_poverty']);
	$poverty_tool    		= json_encode($_POST['poverty_tool']);


	$msp_social_goals				=	 $wpdb->prefix.'msp_social_goals';
	$table_name 					= 	 $msp_social_goals;
	
	$column_name = array(
		'user_id'          		=> $currentuser_id, 
		'sg_target_market' 		=> $target_market, 
		'sg_inst_pursue'		=> $dev_goal, 
		'sg_pov_level'			=> $poverty_level, 
		'sg_does_meas_plevel'	=> $measure_poverty, 
		'sg_tool_meas_plevel'	=> $poverty_tool, 
	);
	
	insert_user_info_db($table_name, $column_name);

  

