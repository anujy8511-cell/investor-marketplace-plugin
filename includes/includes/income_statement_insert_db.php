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
	$interest_income    			= sanitize_text_field($_POST['interest_income']);
	$fee_other_income    			= sanitize_text_field($_POST['fee_other_income']);
	$total_income   				= sanitize_text_field($_POST['total_income']);
	$operating_expense   			= sanitize_text_field($_POST['operating_expense']);
	$operating_admin_expense 		= sanitize_text_field($_POST['operating_admin_expense']);
	$total_expenses    				= sanitize_text_field($_POST['total_expenses']);
	$net_income_profit    			= sanitize_text_field($_POST['net_income_profit']);
	// echo $net_income_profit;
	// die;


	$mfp_income_statement			=	 $wpdb->prefix.'mfp_income_statement';
	$table_name 					= 	$mfp_income_statement;
	
	$column_name = array(
		'user_id'          			=> $currentuser_id, 
		'interest_income' 			=> $interest_income, 
		'fee_other_income'			=> $fee_other_income, 
		'total_income'				=> $total_income, 
		'operating_expense'			=> $operating_expense, 
		'operating_admin_expense'	=> $operating_admin_expense, 
		'net_income_profit'			=> $net_income_profit,
	);
	
	insert_user_info_db($table_name, $column_name);

  

