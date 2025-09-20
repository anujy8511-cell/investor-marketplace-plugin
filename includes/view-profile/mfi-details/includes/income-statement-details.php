<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_income_statement WHERE user_id = $user_id", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$istatement_revenue    			= $result->frfl_income;
			$istatement_interest_income    	= $result->iilp_income;
			$istatement_interest_cincome   	= $result->fee_comm_income;
			$istatement_interest_penalty   	= $result->penalty_fee_income;
			$istatement_interest_other 		= $result->revenue_income;
			$istatement_interest_oincome    = $result->operations_income;
			$other_income    				= $result->other_income;
			$financial_expenses_liab    	= $result->fefl_income;
			$financial_interest_expense    	= $result->ieb_income;
			$financial_interest_edeposite   = $result->ied_income;
			$financial_interest_other   	= $result->other_exp_income;
			$net_impairment    				= $result->nil_glp_income;
			$net_impairment_loss    		= $result->il_glp_income;
			$net_recovery_loan    			= $result->rlwo_income;
			$operating_expense    			= $result->op_expense_income;
			$personnel_expense    			= $result->pers_expense_income;
			$operating_depreciation_expense = $result->da_expense_income;
			$operating_admin_expense    	= $result->admin_expense_income;
			$net_noperating_income    		= $result->non_op_income;
			$net_noperating_revenue    		= $result->non_revenue_income;
			$net_noperating_expense    		= $result->nonoper_expense_income;
			$income_donation    			= $result->donations_income;
			$inxome_tax_expenses    		= $result->tax_expense_income;
			$income_profit    				= $result->profit_income;
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
				<th>Net impairment loss, gross loan portfolio</th>
				<th><?php echo $net_impairment; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Impairment loss (reversal of impairment loss), gross loan portfolio</td>
				<td><?php echo $net_impairment_loss; ?></td>
			</tr>			
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Operating expense</th>
				<th><?php echo $operating_expense; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Personnel expense</td>
				<td><?php echo $personnel_expense; ?></td>
			</tr>	
			<tr>
				<td>Depreciation and amortisation expense</td>
				<td><?php echo $operating_depreciation_expense; ?></td>
			</tr>
			<tr>
				<td>Administrative expense</td>
				<td><?php echo $operating_admin_expense; ?></td>
			</tr>			
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Net non-operating income</th>
				<th><?php echo $net_noperating_income; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Non-operating revenue</td>
				<td><?php echo $net_noperating_revenue; ?></td>
			</tr>	
			<tr>
				<td>Non-operating expense</td>
				<td><?php echo $net_noperating_expense; ?></td>
			</tr>		
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Donations</th>
				<th><?php echo $income_donation; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Tax expense</td>
				<td><?php echo $inxome_tax_expenses; ?></td>
			</tr>	
			<tr>
				<td>Profit (loss)</td>
				<td><?php echo $income_profit; ?></td>
			</tr>		
		</tbody>
	</table>
</div>