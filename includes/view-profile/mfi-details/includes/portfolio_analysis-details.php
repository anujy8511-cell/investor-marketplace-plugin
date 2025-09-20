<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_portfolio_summary WHERE user_id = $user_id", OBJECT );	
// print_r($result); die();
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
<div class="table-view-details">
	<table class="table table-collapsed view-details">
		<tbody>
			<tr>
				<td>Average number of Staff</td>
				<td><?php echo $ave_no_staff; ?></td>
			</tr>	
			<tr>
				<td>Number of active borrowers</td>
				<td><?php echo $no_active_borrowers; ?></td>
			</tr>
			<tr>
				<td>Number of active Savers</td>
				<td><?php echo $no_active_savers; ?></td>
			</tr>	
			<tr>
				<td>Value of total savings (Naira)</td>
				<td><?php echo $no_total_savings; ?></td>
			</tr>
			<tr>
				<td>Value of total income (Naira)</td>
				<td><?php echo $no_total_income; ?></td>
			</tr>
			<tr>
				<td>Loan loss rate (%)</td>
				<td><?php echo $loan_loss_rate_per; ?></td>
			</tr>
			<tr>
				<td>Total Assets (Naira)</td>
				<td><?php echo $total_assets_naira; ?></td>
			</tr>
			<tr>
				<td>Total Equity (Naira)</td>
				<td><?php echo $total_equity_naira; ?></td>
			</tr>
			<tr>
				<td>Total Liabilities (Naira)</td>
				<td><?php echo $total_liabilities_naira; ?></td>
			</tr>
			<tr>
				<td>Total Porfolio</td>
				<td><?php echo $total_portfolio_summary; ?></td>
			</tr>
			<tr>
				<td>Portfolio at risk</td>
				<td><?php echo $portfolio_at_risk; ?></td>
			</tr>
			<tr>
				<td>Percentage in Growth portfolio</td>
				<td><?php echo $per_grth_portfolio; ?></td>
			</tr>
			<tr>
				<td>Loan Loss Rate</td>
				<td><?php echo $loan_loss_rate; ?></td>
			</tr>
			<tr>
				<td>Debt/ Equity ratio</td>
				<td><?php echo $debt_equity_ratio; ?></td>
			</tr>
			<tr>
				<td>Operational Self-Sufficiency(%)</td>
				<td><?php echo $opn_self_sufficiency; ?></td>
			</tr>
		</tbody>
	</table>
</div>