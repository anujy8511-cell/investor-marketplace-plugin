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
	$orientation_explain    	= sanitize_text_field($_POST['orientation_explain']);
	$social_performance_board   = sanitize_text_field($_POST['social_performance_board']);
	$member_skill    			= sanitize_text_field($_POST['member_skill']);
	$staff_incentive    		= json_encode($_POST['staff_incentive']);
	$client_incentivized    	= json_encode($_POST['client_incentivized']);
	$hr_policies    			= json_encode($_POST['hr_policies']);


	$msp_governance_hr				=	 $wpdb->prefix.'msp_governance_hr';
	$table_name 					= 	 $msp_governance_hr;
	
	$column_name = array(
		'user_id'          			=> $currentuser_id, 
		'g_hr_social_goals' 		=> $orientation_explain, 
		'g_hr_setup_board'			=> $social_performance_board, 
		'g_hr_member_eligibility'	=> $member_skill, 
		'g_hr_staff_inc'			=> $staff_incentive, 
		'g_hr_how_inc'				=> $client_incentivized, 
		'g_hr_human_policy'			=> $hr_policies, 
	);
	
	insert_user_info_db($table_name, $column_name);

  

