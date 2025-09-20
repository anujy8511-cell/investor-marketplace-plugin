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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_income_statement WHERE user_id = $userid", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$interest_income    			= $result->interest_income;
			$fee_other_income    			= $result->fee_other_income;
			$total_income   				= $result->total_income;
			$operating_expense   			= $result->operating_expense;
			$operating_admin_expense 		= $result->operating_admin_expense;
			$total_expenses    				= $result->total_expenses;
			$net_income_profit    			= $result->net_income_profit;
			
			
		}
	}

?>
<div class="row-col">
	
	<div class="col">									
		<div class="form-main-grp">
			<div class="field-group">
				<label for="interest_income">Interest income from loan portfolio
					<input type="text" value="<?php echo $interest_income; ?>" name="interest_income" id="interest_income">
				</label>
				<label for="fee_other_income">Fees and other income
					<input type="text" value="<?php echo $fee_other_income; ?>" name="fee_other_income" id="fee_other_income">
				</label>
				<label for="total_income">Total Income
					<input type="text" value="<?php echo $total_income; ?>" name="total_income" id="total_income">
				</label>
				<label for="operating_expense">Operating expense
					<input type="text" value="<?php echo $operating_expense; ?>" name="operating_expense" id="operating_expense">
				</label>        
				<label for="operating_admin_expense">Administrative expense
					<input type="text" value="<?php echo $operating_admin_expense; ?>" name="operating_admin_expense" id="operating_admin_expense">
				</label>
				<label for="total_expenses">Total expense
					<input type="text" value="<?php echo $total_expenses; ?>" name="total_expenses" id="total_expenses">
				</label>
				<label for="net_income_profit">Net income/ Profit
					<input type="text" value="<?php echo $net_income_profit; ?>" name="net_income_profit" id="net_income_profit">
				</label> 
			</div>
		</div>
	</div>
</div>