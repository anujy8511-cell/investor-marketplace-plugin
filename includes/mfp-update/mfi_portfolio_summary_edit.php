<?php
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
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_portfolio_summary WHERE user_id = $userid", OBJECT );	
//print_r($result->s); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$ave_no_staff    			= $result->ave_no_staff;
			$no_active_borrowers    	= $result->no_active_borrowers;
			$no_active_savers   		= $result->no_active_savers;
			$no_total_savings   		= $result->no_total_savings;
			$no_total_income 			= $result->no_total_income;
			$loan_loss_rate_per    		= $result->loan_loss_rate_per;
			$total_assets_naira    		= $result->total_assets_naira;
			$total_equity_naira    		= $result->total_equity_naira;
			$total_liabilities_naira    = $result->total_liabilities_naira;
			$total_portfolio_summary    = $result->total_portfolio_summary;
			$portfolio_at_risk   		= $result->portfolio_at_risk;
			$per_grth_portfolio    		= $result->per_grth_portfolio;
			$loan_loss_rate    			= $result->loan_loss_rate;
			$debt_equity_ratio    		= $result->debt_equity_ratio;
			$opn_self_sufficiency    	= $result->opn_self_sufficiency;	
			
			
		}
	}

?>
<div class="row-col2">
	
	<div class="col">									
		<div class="form-main-grp">
			<!-- <p class="form-title">Value of transactions (Nira)</p> -->
			<div class="field-group">
				<label for="ave_no_staff">Average number of Staff
					<input type="text" value="<?php echo $ave_no_staff; ?>" name="ave_no_staff" id="ave_no_staff">
				</label>
				<label for="no_active_borrowers">Number of active borrowers
					<input type="text" value="<?php echo $no_active_borrowers; ?>" name="no_active_borrowers" id="no_active_borrowers">
				</label>
				<label for="no_active_savers">Number of active Savers
					<input type="text" value="<?php echo $no_active_savers; ?>" name="no_active_savers" id="no_active_savers">
				</label>
				<label for="no_total_savings">Value of total savings (Naira)
					<input type="text" value="<?php echo $no_total_savings; ?>" name="no_total_savings" id="no_total_savings">
				</label>
				<label for="no_total_income">Value of total income (Naira)
					<input type="text" value="<?php echo $no_total_income; ?>" name="no_total_income" id="no_total_income">
				</label>         
				<label for="loan_loss_rate_per">Loan loss rate (%)
					<input type="text" value="<?php echo $loan_loss_rate_per; ?>" name="loan_loss_rate_per" id="loan_loss_rate_per">
				</label>
				<label for="total_assets_naira">Total Assets (Naira)
					<input type="text" value="<?php echo $total_assets_naira; ?>" name="total_assets_naira" id="total_assets_naira">
				</label>
				<label for="total_equity_naira">Total Equity (Naira)
					<input type="text" value="<?php echo $total_equity_naira; ?>" name="total_equity_naira" id="total_equity_naira">
				</label>
				<label for="total_liabilities_naira">Total Liabilities (Naira)
					<input type="text" value="<?php echo $total_liabilities_naira; ?>" name="total_liabilities_naira" id="total_liabilities_naira">
				</label>
				<label for="total_portfolio_summary">Total Porfolio
					<input type="text" value="<?php echo $total_portfolio_summary; ?>" name="total_portfolio_summary" id="total_portfolio_summary">
				</label>
				<label for="portfolio_at_risk">Portfolio at risk
					<input type="text" value="<?php echo $portfolio_at_risk; ?>" name="portfolio_at_risk" id="portfolio_at_risk">
				</label>
				<label for="per_grth_portfolio">Percentage in Growth portfolio
					<input type="text" value="<?php echo $per_grth_portfolio; ?>" name="per_grth_portfolio" id="per_grth_portfolio">
				</label>
				<label for="loan_loss_rate">Loan Loss Rate
					<input type="text" value="<?php echo $loan_loss_rate; ?>" name="loan_loss_rate" id="loan_loss_rate">
				</label>
				<label for="debt_equity_ratio">Debt/ Equity ratio
					<input type="text" value="<?php echo $debt_equity_ratio; ?>" name="debt_equity_ratio" id="debt_equity_ratio">
				</label>
				<label for="opn_self_sufficiency">Operational Self-Sufficiency(%)
					<input type="text" value="<?php echo $opn_self_sufficiency; ?>" name="opn_self_sufficiency" id="opn_self_sufficiency">
				</label>
			</div>
		</div>		
	</div>
	<div class="col"></div>
</div>