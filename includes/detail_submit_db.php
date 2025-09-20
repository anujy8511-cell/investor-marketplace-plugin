<?php 


if(isset($_POST['sbt_mfi_details'])){
	$update_time = $_POST['updatedata_date'];
	//echo $update_time; die();
	$url = $_SERVER['REQUEST_URI'];
	$parts = parse_url($url);
	$output = [];
	parse_str($parts['query'], $output);
	$user_id = $output['user_id'];
	if(is_admin()){
		$userid = $user_id;
	}else{
		$userid = get_current_user_id();
	}
	update_user_meta($userid, 'data_update_date', $update_time);
	global $wpdb;
	// infrastructure table data
	include('includes/infrastructure_details_insert_db.php');
	// infrastructure table data end
	// clients table data
	include('includes/clients_details_insert_db.php');
	
	// clients table data end
	// products table data 
	include('includes/products_details_insert_db.php');	
	// products table data end
	// credit products table data
	
	include('includes/credit_products_insert_db.php');	
				

	// credit products table data end
	// deposit products table data 
	include('includes/deposit_products_insert_db.php');	
	

	// deposit products table data end
	// deliquency table data
	include('includes/deliquency_details_insert_db.php');	
	

	// deliquency table data end
	// non financial services table data
	include('includes/nonfinancial_services_insert_db.php');

	// non financial services table data end
	// enterprises financed table data
	include('includes/enterprise_financial_insert_db.php');
	
	
	// enterprises financed table data end
	// job creation table data
	include('includes/job_creation_insert_db.php');
	
	// job creation table data end
	// poverty Outreach table data
	include('includes/poverty_outreach_insert_db.php');

	// poverty Outreach table data end
	// balance sheet table data
	
	include('includes/balance_sheet_insert_db.php');
	
	// balance sheet table data end
	// income statement table data 
	include('includes/income_statement_insert_db.php');

	// income statement table data end
	// Social goals table data 
	include('includes/social_goals_insert_db.php');

	// social goals table data end	
	// Governance & HR table data 
	include('includes/governance_hr_insert_db.php');
	
	// Governance & HR table data end
	// Products & services table data 
	include('includes/product_services_insert_db.php');

	// Products & services table data end
	// Client protection table data 
	include('includes/client_protection_insert_db.php');
	// Client protection table data end
	// Environment table data 
	include('includes/portfolio_summary_insert_db.php');
	// Environment table data end
	// data files insert
	include('includes/data_files_insert_db.php');
	// data files insert
	$_SESSION['mfi_update_msg'] = '<p class="success-msg">MFI Data Update Successfully</p>';

	//include('includes/profile_details_update.php');


}