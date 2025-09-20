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


	// $currentuser_id             	= get_current_user_id();
	$cproduct_loan     				= sanitize_text_field($_POST['cproduct_loan']);		
	$cproduct_loan_menterprises     = sanitize_text_field($_POST['cproduct_loan_menterprises']);		
	$cproduct_loan_snmenterprises   = sanitize_text_field($_POST['cproduct_loan_snmenterprises']);		
	$cproduct_loan_lcorporation     = sanitize_text_field($_POST['cproduct_loan_lcorporation']);		
	$cproduct_loan_consumption      = sanitize_text_field($_POST['cproduct_loan_consumption']);		
	$cproduct_loan_housing     		= sanitize_text_field($_POST['cproduct_loan_housing']);		
	$cproduct_loan_hfinance     	= sanitize_text_field($_POST['cproduct_loan_hfinance']);		
	$cproduct_loan_indivisual     	= sanitize_text_field($_POST['cproduct_loan_indivisual']);		
	$cproduct_loan_solidarity     	= sanitize_text_field($_POST['cproduct_loan_solidarity']);		
	$cproduct_loan_vbanking     	= sanitize_text_field($_POST['cproduct_loan_vbanking']);		
	$cproduct_loan_disbursed     	= sanitize_text_field($_POST['cproduct_loan_disbursed']);		
	$cproduct_loan_ldisbursed     	= sanitize_text_field($_POST['cproduct_loan_ldisbursed']);		
	$cproduct_gloan     			= sanitize_text_field($_POST['cproduct_gloan']);		
	$cproduct_gloan_menterprises    = sanitize_text_field($_POST['cproduct_gloan_menterprises']);		
	$cproduct_gloan_snmenterprises  = sanitize_text_field($_POST['cproduct_gloan_snmenterprises']);		
	$cproduct_gloan_lcorporation    = sanitize_text_field($_POST['cproduct_gloan_lcorporation']);		
	$cproduct_gloan_consumption     = sanitize_text_field($_POST['cproduct_gloan_consumption']);		
	$cproduct_gloan_housing     	= sanitize_text_field($_POST['cproduct_gloan_housing']);		
	$cproduct_gloan_hfinance     	= sanitize_text_field($_POST['cproduct_gloan_hfinance']);		
	$cproduct_gloan_indivisual     	= sanitize_text_field($_POST['cproduct_gloan_indivisual']);		
	$cproduct_gloan_solidarity     	= sanitize_text_field($_POST['cproduct_gloan_solidarity']);		
	$cproduct_gloan_vbanking     	= sanitize_text_field($_POST['cproduct_gloan_vbanking']);
	// table name for clients and columns data
	$mfp_credit_products 			=	 $wpdb->prefix.'mfp_credit_products';
	$table_name 					= $mfp_credit_products;
	
	$column_name = array(
		'user_id'					=>	$currentuser_id, 
		'no_loan_outs_cproduct'		=>	$cproduct_loan,
		'nlo_microenterprise_cpro'	=>	$cproduct_loan_menterprises,
		'nlo_s&m_enterp_cpro'		=>	$cproduct_loan_snmenterprises, 
		'nlo_lcorpo_cpro'			=>	$cproduct_loan_lcorporation, 
		'nlo_consumption_cpro'		=>	$cproduct_loan_consumption, 
		'nlo_mortgage_cpro'			=>	$cproduct_loan_housing, 
		'nlo_other_house_cpro'		=>	$cproduct_loan_hfinance, 
		'nlo_indvis_cpro'			=>	$cproduct_loan_indivisual, 
		'nlo_solid_cpro'			=>	$cproduct_loan_solidarity, 
		'nlo_vallage_shg_cpro'		=>	$cproduct_loan_vbanking, 
		'nlo_loan_pdisb_cpro'		=>	$cproduct_loan_disbursed, 
		'nlo_no_loan_disb_cpro'		=>	$cproduct_loan_ldisbursed, 
		'gloan_portfolio_cproduct'	=>	$cproduct_gloan, 
		'glp_microenterprise_cpro'	=>	$cproduct_gloan_menterprises, 
		'glp_s&m_enterp_cpro'		=>	$cproduct_gloan_snmenterprises, 
		'glp_lcorpo_cpro'			=>	$cproduct_gloan_lcorporation, 
		'glp_consumption_cpro'		=>	$cproduct_gloan_consumption,
		'glp_mortgage_cpro'			=>	$cproduct_gloan_housing, 
		'glp_other_house_cpro'		=>	$cproduct_gloan_hfinance, 
		'glp_indvis_cpro'			=>	$cproduct_gloan_indivisual, 
		'glp_solid_cpro'			=>	$cproduct_gloan_solidarity, 
		'glp_vallage_shg_cpro'		=>	$cproduct_gloan_vbanking
	);
	insert_user_info_db($table_name, $column_name);