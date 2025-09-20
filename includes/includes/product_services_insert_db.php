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


	// $currentuser_id         			= get_current_user_id();
	$offer_creproducts    				= json_encode($_POST['offer_creproducts']);
	$offer_income_gloan    				= json_encode($_POST['offer_income_gloan']);
	$offer_nonincome_gloan    			= json_encode($_POST['offer_nonincome_gloan']);
	$types_saving_products    			= json_encode($_POST['types_saving_products']);
	$voluntary_sav_products    			= json_encode($_POST['voluntary_sav_products']);
	$compulsary_insurance    			= sanitize_text_field($_POST['compulsary_insurance']);
	$type_compulsary_insurance    		= json_encode($_POST['type_compulsary_insurance']);
	$voluntary_insurance    			= sanitize_text_field($_POST['voluntary_insurance']);
	$type_voluntary_insurance    		= json_encode($_POST['type_voluntary_insurance']);
	$financial_services    				= sanitize_text_field($_POST['financial_services']);
	$type_financial_services    		= json_encode($_POST['type_financial_services']);
	$nonfinancial_services    			= sanitize_text_field($_POST['nonfinancial_services']);
	$type_nonfinancial_services    		= json_encode($_POST['type_nonfinancial_services']);
	$nonfinancial_women_empower    		= sanitize_text_field($_POST['nonfinancial_women_empower']);
	$women_emower_services    			= json_encode($_POST['women_emower_services']);
	$nonfinancial_education    			= sanitize_text_field($_POST['nonfinancial_education']);
	$nonfinancial_education_services    = json_encode($_POST['nonfinancial_education_services']);
	$nonfinacial_health    				= sanitize_text_field($_POST['nonfinacial_health']);
	$nonfinancial_health_services    	= json_encode($_POST['nonfinancial_health_services']);

		$msp_products_services			=	 $wpdb->prefix.'msp_products_services';
		$table_name 					= 	$msp_products_services;
		
		$column_name = array(
			'user_id'          					=>  $currentuser_id,
			'offer_creproducts' 				=> $offer_creproducts,
			'offer_income_gloan' 				=> $offer_income_gloan,
			'offer_nonincome_gloan' 			=> $offer_nonincome_gloan,
			'types_saving_products' 			=> $types_saving_products,
			'voluntary_sav_products' 			=> $voluntary_sav_products,
			'compulsary_insurance' 				=> $compulsary_insurance,
			'type_compulsary_insurance' 		=> $type_compulsary_insurance,
			'voluntary_insurance' 				=> $voluntary_insurance,
			'type_voluntary_insurance' 			=> $type_voluntary_insurance,
			'financial_services' 				=> $financial_services,
			'type_financial_services' 			=> $type_financial_services,
			'nonfinancial_services' 			=> $nonfinancial_services,
			'type_nonfinancial_services' 		=> $type_nonfinancial_services,
			'nonfinancial_women_empower' 		=> $nonfinancial_women_empower,
			'women_emower_services' 			=> $women_emower_services,
			'nonfinancial_education' 			=> $nonfinancial_education,
			'nonfinancial_education_services' 	=> $nonfinancial_education_services,
			'nonfinacial_health' 				=> $nonfinacial_health,
			'nonfinancial_health_services' 		=> $nonfinancial_health_services,
		);
		
	insert_user_info_db($table_name, $column_name);