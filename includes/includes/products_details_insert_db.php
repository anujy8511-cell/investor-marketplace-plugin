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
	$product_trans       		= sanitize_text_field($_POST['product_trans']);	
	$product_channel_agent      = sanitize_text_field($_POST['product_channel_agent']);	
	$product_channel_atms       = sanitize_text_field($_POST['product_channel_atms']);	
	$product_channel_internet   = sanitize_text_field($_POST['product_channel_internet']);	
	$product_channel_mbank      = sanitize_text_field($_POST['product_channel_mbank']);	
	$product_channel_mpos       = sanitize_text_field($_POST['product_channel_mpos']);	
	$product_channel_rstaff     = sanitize_text_field($_POST['product_channel_rstaff']);	
	$product_channel_sbranches  = sanitize_text_field($_POST['product_channel_sbranches']);	
	$product_nira       		= sanitize_text_field($_POST['product_nira']);	
	$product_nira_agent       	= sanitize_text_field($_POST['product_nira_agent']);	
	$product_nira_atms       	= sanitize_text_field($_POST['product_nira_atms']);	
	$product_nira_internet      = sanitize_text_field($_POST['product_nira_internet']);	
	$product_nira_mbank       	= sanitize_text_field($_POST['product_nira_mbank']);	
	$product_nira_mpos       	= sanitize_text_field($_POST['product_nira_mpos']);	
	$product_nira_rstaff       	= sanitize_text_field($_POST['product_nira_rstaff']);	
	$product_nira_sbranches     = sanitize_text_field($_POST['product_nira_sbranches']);
	// table name for clients and columns data
	$mfp_products 			        = 	 $wpdb->prefix.'mfp_products';
	$table_name = $mfp_products;
	
	$column_name = array(
		'user_id'=> $currentuser_id, 
		'no_trans_product'=>$product_trans, 
		'nt_agents_products'=>$product_channel_agent, 
		'nt_atms_products'=>$product_channel_atms, 
		'nt_internet_products'=>$product_channel_internet, 
		'nt_mob_bank_products'=>$product_channel_mbank, 
		'nt_mer_pos_products'=>$product_channel_mpos, 
		'nt_rov_staff_products'=>$product_channel_rstaff, 
		'nt_sub_branch_products'=>$product_channel_sbranches, 
		'value_trans_product'=>$product_nira, 
		'vt_agents_products'=>$product_nira_agent, 
		'vt_atms_products'=>$product_nira_atms, 
		'vt_internet_products'=>$product_nira_internet, 
		'vt_mob_bank_products'=>$product_nira_mbank, 
		'vt_mer_pos_products'=>$product_nira_mpos, 
		'vt_rov_staff_products'=>$product_nira_rstaff, 
		'vt_sub_branch_products'=>$product_nira_sbranches
	);
	insert_user_info_db($table_name, $column_name);