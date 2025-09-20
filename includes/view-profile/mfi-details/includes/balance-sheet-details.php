<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_balance_sheet WHERE user_id = $user_id", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$balance_sheet_cash    		= $result->cce_asset_bal;
			$balance_sheet_net_loan    	= $result->nlp_asset_bal;
			$balance_sheet_gross_loan   = $result->glp_asset_bal;
			$balance_sheet_impairment   = $result->ila_asset_bal;
			$balance_sheet_other_assets = $result->other_asset_bal;
			$balance_sheet_fassets    	= $result->nfa_asset_bal;
			$balance_sheet_tassets    	= $result->total_asset_bal;
			$balance_liab_deposits    	= $result->deposit_liab_bal;
			$balance_liab_borrow    	= $result->borrow_liab_bal;
			$balance_liab_debt    		= $result->subd_liab_bal;
			$balance_liab_other_short   = $result->ostfl_liab_bal;
			$balance_liab_other_liab    = $result->other_liab_bal;
			$balance_liab_total_liab    = $result->total_liab_bal;
			$balance_equity_paid    	= $result->paid_equity_bal;
			$balance_equity_donate    	= $result->donate_equity_bal;
			$balance_equity_retained    = $result->retain_equity_bal;
			$balance_equity_other    	= $result->other_equity_bal;
			$balance_equity_total    	= $result->total_equity_bal;
			$total_balance_sheet    	= $result->total_bal_sheet_bal;
			$total_portfolio    		= $result->total_portfolio_bal;
			$growth_portfolio    		= $result->growth_portfolio_bal;
			$par_rescheduled    		= $result->par30_resch_bal;
			$write_off    				= $result->write_off_bal;
			$net_income    				= $result->net_income_bal;
			$oper_self_sufficiency    	= $result->op_self_suff_bal;
			$debt_equity    			= $result->debt_bal;
			$num_of_borrow    			= $result->no_borrw_bal;	
				//echo $infra_no_personnel;
		}
		
		// foreach ($results as $key => $value) {
		// 	# code...
		// }
	}

?>
<div class="table-view-details">
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Assets</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Cash and cash equivalents (Values- 50k in naira)</td>
				<td><?php echo $balance_sheet_cash; ?></td>
			</tr>	
			<tr>
				<td>Net loan portfolio</td>
				<td><?php echo $balance_sheet_net_loan; ?></td>
			</tr>
			<tr>
				<td>Gross loan portfolio(Values)</td>
				<td><?php echo $balance_sheet_gross_loan; ?></td>
			</tr>	
			<tr>
				<td>Impairment loss allowance(Values)</td>
				<td><?php echo $balance_sheet_impairment; ?></td>
			</tr>
			<tr>
				<td>Other assets (Values)</td>
				<td><?php echo $balance_sheet_other_assets; ?></td>
			</tr>
			<tr>
				<td>Net fixed assets (Values)</td>
				<td><?php echo $balance_sheet_fassets; ?></td>
			</tr>
			<tr>
				<td>Total assets(Values)</td>
				<td><?php echo $balance_sheet_tassets; ?></td>
			</tr>
			<tr>
				<td>Liabilities</td>
			</tr>
			<tr>
				<td>Deposits (Values)</td>
				<td><?php echo $balance_liab_deposits; ?></td>
			</tr>
			<tr>
				<td>Borrowings (Values)</td>
				<td><?php echo $balance_liab_borrow; ?></td>
			</tr>
			<tr>
				<td>Subordinated debt (Values)</td>
				<td><?php echo $balance_liab_debt; ?></td>
			</tr>
			<tr>
				<td>Other short-term financial liabilities(Values)</td>
				<td><?php echo $balance_liab_other_short; ?></td>
			</tr>
			<tr>
				<td>Other liabilities(Values)</td>
				<td><?php echo $balance_liab_other_liab; ?></td>
			</tr>
			<tr>
				<td>Total liabilities(Values)</td>
				<td><?php echo $balance_liab_total_liab; ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Equity</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Paid in capital(Values)</td>
				<td><?php echo $balance_equity_paid; ?></td>
			</tr>	
			<tr>
				<td>Donated equity(Values)</td>
				<td><?php echo $balance_equity_donate; ?></td>
			</tr>
			<tr>
				<td>Retained earnings(Values)</td>
				<td><?php echo $balance_equity_retained; ?></td>
			</tr>	
			<tr>
				<td>Other equity(Values)</td>
				<td><?php echo $balance_equity_other; ?></td>
			</tr>
			<tr>
				<td>Total equity(Values)</td>
				<td><?php echo $balance_equity_total; ?></td>
			</tr>
			<tr>
				<td>Total balance sheet</td>
				<td><?php echo $total_balance_sheet; ?></td>
			</tr>
			<tr>
				<td>Total Portfolio</td>
				<td><?php echo $total_portfolio; ?></td>
			</tr>
			<tr>
				<td>% Growth Portfolio</td>
				<td><?php echo $growth_portfolio; ?></td>
			</tr>
			<tr>
				<td>PAR30 + Rescheduled</td>
				<td><?php echo $par_rescheduled; ?></td>
			</tr>
			<tr>
				<td>Write off</td>
				<td><?php echo $write_off; ?></td>
			</tr>
			<tr>
				<td>Net income</td>
				<td><?php echo $net_income; ?></td>
			</tr>
			<tr>
				<td>Operational self sufficiency(%)</td>
				<td><?php echo $oper_self_sufficiency; ?></td>
			</tr>
			<tr>
				<td>Debt/ Equity</td>
				<td><?php echo $debt_equity; ?></td>
			</tr>
			<tr>
				<td>Number of borrowers</td>
				<td><?php echo $num_of_borrow; ?></td>
			</tr>
		</tbody>
	</table>
</div>