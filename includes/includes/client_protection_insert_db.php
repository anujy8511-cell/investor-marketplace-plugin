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
	$institution_policies    		= sanitize_text_field($_POST['institution_policies']);
	$institution_audits    			= sanitize_text_field($_POST['institution_audits']);
	$institution_discloses    		= sanitize_text_field($_POST['institution_discloses']);
	$institution_discloses_apr    	= sanitize_text_field($_POST['institution_discloses_apr']);
	$institution_codeofconduct    	= sanitize_text_field($_POST['institution_codeofconduct']);
	$institution_sanctions    		= sanitize_text_field($_POST['institution_sanctions']);
	$institution_complaints    		= sanitize_text_field($_POST['institution_complaints']);
	$institution_privacy    		= sanitize_text_field($_POST['institution_privacy']);
	$institution_interest    		= sanitize_text_field($_POST['institution_interest']);

		$msp_client_protection			=	 $wpdb->prefix.'msp_client_protection';
		$table_name 					= 	$msp_client_protection;
		
		$column_name = array(
			'user_id'          			=>  $currentuser_id,
			'clientp_capacity' 			=> $institution_policies,
			'clientp_indebt' 			=> $institution_audits,
			'clientp_discloses' 		=> $institution_discloses,
			'clientp_discloses_annual' 	=> $institution_discloses_apr,
			'clientp_spell_coc' 		=> $institution_codeofconduct,
			'clientp_viol_coc' 			=> $institution_sanctions,
			'clientp_repo_system' 		=> $institution_complaints,
			'clientp_data_privacy' 		=> $institution_privacy,
			'clientp_interest_rate' 	=> $institution_interest,	
		);
		
	insert_user_info_db($table_name, $column_name);