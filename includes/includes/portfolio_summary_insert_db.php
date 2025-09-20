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
	$ave_no_staff    			= sanitize_text_field($_POST['ave_no_staff']);
	$no_active_borrowers    	= sanitize_text_field($_POST['no_active_borrowers']);
	$no_active_savers   		= sanitize_text_field($_POST['no_active_savers']);
	$no_total_savings   		= sanitize_text_field($_POST['no_total_savings']);
	$no_total_income 			= sanitize_text_field($_POST['no_total_income']);
	$loan_loss_rate_per    		= sanitize_text_field($_POST['loan_loss_rate_per']);
	$total_assets_naira    		= sanitize_text_field($_POST['total_assets_naira']);
	$total_equity_naira    		= sanitize_text_field($_POST['total_equity_naira']);
	$total_liabilities_naira    = sanitize_text_field($_POST['total_liabilities_naira']);
	$total_portfolio_summary    = sanitize_text_field($_POST['total_portfolio_summary']);
	$portfolio_at_risk   		= sanitize_text_field($_POST['portfolio_at_risk']);
	$per_grth_portfolio    		= sanitize_text_field($_POST['per_grth_portfolio']);
	$loan_loss_rate    			= sanitize_text_field($_POST['loan_loss_rate']);
	$debt_equity_ratio    		= sanitize_text_field($_POST['debt_equity_ratio']);
	$opn_self_sufficiency    	= sanitize_text_field($_POST['opn_self_sufficiency']);

	// echo $opn_self_sufficiency;
	// die();

	$mfp_portfolio_summary			=	 $wpdb->prefix.'mfp_portfolio_summary';
	$table_name 					= 	$mfp_portfolio_summary;
	
	$column_name = array(
		'user_id'          			=> $currentuser_id, 
		'ave_no_staff' 				=> $ave_no_staff, 
		'no_active_borrowers'		=> $no_active_borrowers, 
		'no_active_savers'			=> $no_active_savers, 
		'no_total_savings'			=> $no_total_savings, 
		'no_total_income'			=> $no_total_income, 
		'loan_loss_rate_per'		=> $loan_loss_rate_per, 
		'total_assets_naira'		=> $total_assets_naira, 
		'total_equity_naira'		=> $total_equity_naira, 
		'total_liabilities_naira'	=> $total_liabilities_naira, 
		'total_portfolio_summary'	=> $total_portfolio_summary, 
		'portfolio_at_risk'			=> $portfolio_at_risk, 
		'per_grth_portfolio'		=> $per_grth_portfolio, 
		'loan_loss_rate'			=> $loan_loss_rate, 
		'debt_equity_ratio'			=> $debt_equity_ratio, 
		'opn_self_sufficiency'		=> $opn_self_sufficiency, 
		
	);
	// print_r($column_name);
	// die();
	
	insert_user_info_db($table_name, $column_name);

  

