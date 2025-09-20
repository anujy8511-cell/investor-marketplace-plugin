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
	$balance_sheet_cash    		= sanitize_text_field($_POST['balance_sheet_cash']);
	$balance_sheet_net_loan    	= sanitize_text_field($_POST['balance_sheet_net_loan']);
	$balance_sheet_gross_loan   = sanitize_text_field($_POST['balance_sheet_gross_loan']);
	$balance_sheet_impairment   = sanitize_text_field($_POST['balance_sheet_impairment']);
	$balance_sheet_other_assets = sanitize_text_field($_POST['balance_sheet_other_assets']);
	$balance_sheet_fassets    	= sanitize_text_field($_POST['balance_sheet_fassets']);
	$balance_sheet_tassets    	= sanitize_text_field($_POST['balance_sheet_tassets']);
	$balance_liab_deposits    	= sanitize_text_field($_POST['balance_liab_deposits']);
	$balance_liab_borrow    	= sanitize_text_field($_POST['balance_liab_borrow']);
	$balance_liab_debt    		= sanitize_text_field($_POST['balance_liab_debt']);
	$balance_liab_other_short   = sanitize_text_field($_POST['balance_liab_other_short']);
	$balance_liab_other_liab    = sanitize_text_field($_POST['balance_liab_other_liab']);
	$balance_liab_total_liab    = sanitize_text_field($_POST['balance_liab_total_liab']);
	$balance_equity_paid    	= sanitize_text_field($_POST['balance_equity_paid']);
	$balance_equity_donate    	= sanitize_text_field($_POST['balance_equity_donate']);
	$balance_equity_retained    = sanitize_text_field($_POST['balance_equity_retained']);
	$balance_equity_other    	= sanitize_text_field($_POST['balance_equity_other']);
	$balance_equity_total    	= sanitize_text_field($_POST['balance_equity_total']);
	$total_balance_sheet    	= sanitize_text_field($_POST['total_balance_sheet']);
	$total_portfolio    		= sanitize_text_field($_POST['total_portfolio']);
	$growth_portfolio    		= sanitize_text_field($_POST['growth_portfolio']);
	$par_rescheduled    		= sanitize_text_field($_POST['par_rescheduled']);
	$write_off    				= sanitize_text_field($_POST['write_off']);
	$net_income    				= sanitize_text_field($_POST['net_income']);
	$oper_self_sufficiency    	= sanitize_text_field($_POST['oper_self_sufficiency']);
	$debt_equity    			= sanitize_text_field($_POST['debt_equity']);
	$num_of_borrow    			= sanitize_text_field($_POST['num_of_borrow']);


	$mfp_balance_sheet				=	 $wpdb->prefix.'mfp_balance_sheet';
	$table_name 					= 	$mfp_balance_sheet;
	
	$column_name = array(
		'user_id'          		=> $currentuser_id, 
		'cce_asset_bal' 		=> $balance_sheet_cash, 
		'nlp_asset_bal'			=> $balance_sheet_net_loan, 
		'glp_asset_bal'			=> $balance_sheet_gross_loan, 
		'ila_asset_bal'			=> $balance_sheet_impairment, 
		'other_asset_bal'		=> $balance_sheet_other_assets, 
		'nfa_asset_bal'			=> $balance_sheet_fassets, 
		'total_asset_bal'		=> $balance_sheet_tassets, 
		'deposit_liab_bal'		=> $balance_liab_deposits, 
		'borrow_liab_bal'		=> $balance_liab_borrow, 
		'subd_liab_bal'			=> $balance_liab_debt, 
		'ostfl_liab_bal'		=> $balance_liab_other_short, 
		'other_liab_bal'		=> $balance_liab_other_liab, 
		'total_liab_bal'		=> $balance_liab_total_liab, 
		'paid_equity_bal'		=> $balance_equity_paid, 
		'donate_equity_bal'		=> $balance_equity_donate, 
		'retain_equity_bal'		=> $balance_equity_retained, 
		'other_equity_bal'		=> $balance_equity_other,
		'total_equity_bal'		=> $balance_equity_total,
		'total_bal_sheet_bal'	=> $total_balance_sheet,
		'total_portfolio_bal'	=> $total_portfolio,
		'growth_portfolio_bal'	=> $growth_portfolio,
		'par30_resch_bal'		=> $par_rescheduled,
		'write_off_bal'			=> $write_off,
		'net_income_bal'		=> $net_income,
		'op_self_suff_bal'		=> $oper_self_sufficiency,
		'debt_bal'				=> $debt_equity,
		'no_borrw_bal'			=> $num_of_borrow,
	);
	
	insert_user_info_db($table_name, $column_name);

  

