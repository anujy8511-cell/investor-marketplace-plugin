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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_balance_sheet WHERE user_id = $userid", OBJECT );	
//print_r($result->s); die();
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
			
			
		}
	}

?>
<div class="row-col2">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="field-group">
				<p class="field-for bal">Assets</p>
				<label for="balance_sheet_cash">Cash and cash equivalents (Values- 50k in naira)
					<input type="text" value="<?php echo $balance_sheet_cash; ?>"  name="balance_sheet_cash" id="balance_sheet_cash">
				</label>
				<label for="balance_sheet_net_loan">Net loan portfolio
					<input type="text" value="<?php echo $balance_sheet_net_loan; ?>"  name="balance_sheet_net_loan" id="balance_sheet_net_loan">
				</label>
				<label for="balance_sheet_gross_loan">Gross loan portfolio(Values)
					<input type="text" value="<?php echo $balance_sheet_gross_loan; ?>"  name="balance_sheet_gross_loan" id="balance_sheet_gross_loan">
				</label>
				<label for="balance_sheet_impairment">Impairment loss allowance(Values)
					<input type="text" value="<?php echo $balance_sheet_impairment; ?>"  name="balance_sheet_impairment" id="balance_sheet_impairment">
				</label>
				<label for="balance_sheet_other_assets">Other assets (Values)
					<input type="text" value="<?php echo $balance_sheet_other_assets; ?>"  name="balance_sheet_other_assets" id="balance_sheet_other_assets">
				</label>
				<label for="balance_sheet_fassets">Net fixed assets (Values)
					<input type="text" value="<?php echo $balance_sheet_fassets; ?>"  name="balance_sheet_fassets" id="balance_sheet_fassets">
				</label>
				<label for="balance_sheet_tassets">Total assets(Values)
					<input type="text" value="<?php echo $balance_sheet_tassets; ?>"  name="balance_sheet_tassets" id="balance_sheet_tassets">
				</label>
				<p class="field-for bal">Liabilities</p>
				<label for="balance_liab_deposits">Deposits (Values)
					<input type="text" value="<?php echo $balance_liab_deposits; ?>"  name="balance_liab_deposits" id="balance_liab_deposits">
				</label>
				<label for="balance_liab_borrow">Borrowings (Values)
					<input type="text" value="<?php echo $balance_liab_borrow; ?>"  name="balance_liab_borrow" id="balance_liab_borrow">
				</label>
				<label></label>
				<label for="balance_liab_debt">Subordinated debt (Values)
					<input type="text" value="<?php echo $balance_liab_debt; ?>"  name="balance_liab_debt" id="balance_liab_debt">
				</label>
				<label for="balance_liab_other_short">Other short-term financial liabilities(Values)
					<input type="text" value="<?php echo $balance_liab_other_short; ?>"  name="balance_liab_other_short" id="balance_liab_other_short">
				</label>
				<label for="balance_liab_other_liab">Other liabilities(Values)
					<input type="text" value="<?php echo $balance_liab_other_liab; ?>"  name="balance_liab_other_liab" id="balance_liab_other_liab">
				</label>
				<label for="balance_liab_total_liab">Total liabilities(Values)
					<input type="text" value="<?php echo $balance_liab_total_liab; ?>"  name="balance_liab_total_liab" id="balance_liab_total_liab">
				</label>

			</div>
		</div>
	</div>
	<div class="col">									
		<div class="form-main-grp">
			<div class="field-group">				
				<p class="field-for bal">Equity</p>
				<label for="balance_equity_paid">Paid in capital(Values)
					<input type="text" value="<?php echo $balance_equity_paid; ?>"  name="balance_equity_paid" id="balance_equity_paid">
				</label>
				<label for="balance_equity_donate">Donated equity(Values)
					<input type="text" value="<?php echo $balance_equity_donate; ?>"  name="balance_equity_donate" id="balance_equity_donate">
				</label>
				<label for="balance_equity_retained">Retained earnings(Values)
					<input type="text" value="<?php echo $balance_equity_retained; ?>"  name="balance_equity_retained" id="balance_equity_retained">
				</label>
				<label for="balance_equity_other">Other equity(Values)
					<input type="text" value="<?php echo $balance_equity_other; ?>"  name="balance_equity_other" id="balance_equity_other">
				</label>
				<label for="balance_equity_total">Total equity(Values)
					<input type="text" value="<?php echo $balance_equity_total; ?>"  name="balance_equity_total" id="balance_equity_total">
				</label>
				<label for="total_balance_sheet">Total balance sheet
					<input type="text" value="<?php echo $total_balance_sheet; ?>"  name="total_balance_sheet" id="total_balance_sheet">
				</label>
				<label for="total_portfolio">Total Portfolio
					<input type="text" value="<?php echo $total_portfolio; ?>"  name="total_portfolio" id="total_portfolio">
				</label>
				<label for="growth_portfolio">% Growth Portfolio
					<input type="text" value="<?php echo $growth_portfolio; ?>"  name="growth_portfolio" id="growth_portfolio">
				</label>
				<label for="par_rescheduled">PAR30 + Rescheduled
					<input type="text" value="<?php echo $par_rescheduled; ?>"  name="par_rescheduled" id="par_rescheduled">
				</label>
				<label for="write_off">Write off
					<input type="text" value="<?php echo $write_off; ?>"  name="write_off" id="write_off">
				</label>
				<label for="net_income">Net income
					<input type="text" value="<?php echo $net_income; ?>"  name="net_income" id="net_income">
				</label>
				<label for="oper_self_sufficiency">Operational self sufficiency(%)
					<input type="text" value="<?php echo $oper_self_sufficiency; ?>"  name="oper_self_sufficiency" id="oper_self_sufficiency">
				</label>
				<label for="debt_equity">Debt/ Equity
					<input type="text" value="<?php echo $debt_equity; ?>"  name="debt_equity" id="debt_equity">
				</label>
				<label for="num_of_borrow">Number of borrowers
					<input type="text" value="<?php echo $num_of_borrow; ?>"  name="num_of_borrow" id="num_of_borrow">
				</label>
			</div>
		</div>
		
	</div>
</div>
