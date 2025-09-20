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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_deposit_products WHERE user_id = $userid", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$dproduct_deposit     			= $result->no_depoditors_dproduct;	
			$dproduct_deposit_corporations  = $result->nd_dfc_dpro;	
			$dproduct_deposit_finstitute    = $result->nd_dffi_dpro;	
			$dproduct_deposit_govt     		= $result->nd_dfg_dpro;	
			$dproduct_deposit_demand     	= $result->nd_dd_dpro;	
			$dproduct_deposit_time     		= $result->nd_td_dpro;	
			$dproduct_deposit_compulsary    = $result->nd_cd_dpro;	
			$dproduct_naira     			= $result->deposits_value_dproduct;	
			$dproduct_naira_corporations    = $result->dv_dfc_dpro;	
			$dproduct_naira_finstitute     	= $result->dv_dffi_dpro;	
			$dproduct_naira_govt     		= $result->dv_dfg_dpro;	
			$dproduct_naira_demand     		= $result->dv_dd_dpro;	
			$dproduct_naira_time     		= $result->dv_td_dpro;	
			$dproduct_naira_compulsary    	= $result->dv_cd_dpro;	
			
				//echo $infra_no_personnel;
		}
		
		// foreach ($results as $key => $value) {
		// 	# code...
		// }
	}

?>
<div class="row-col2">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="field-group">
				<label for="dproduct_deposit">Number of Depositors
					<input type="text" value="<?php echo $dproduct_deposit; ?>" name="dproduct_deposit" id="dproduct_deposit">
				</label>
				<!-- <p class="field-for">Deposit products</p> -->
				<label for="dproduct_deposit_corporations">Deposit From Corporations
					<input type="text" value="<?php echo $dproduct_deposit_corporations; ?>" name="dproduct_deposit_corporations" id="dproduct_deposit_corporations">
				</label>
				<label for="dproduct_deposit_finstitute">Deposits from financial institutions
					<input type="text" value="<?php echo $dproduct_deposit_finstitute; ?>" name="dproduct_deposit_finstitute" id="dproduct_deposit_finstitute">
				</label>
				<label for="dproduct_deposit_govt">Deposits From Government
					<input type="text" value="<?php echo $dproduct_deposit_govt; ?>" name="dproduct_deposit_govt" id="dproduct_deposit_govt">
				</label>
				<!-- <p class="field-for">Retail Deposits</p> -->
				<!-- <p class="sub-field-for">Voluntary deposits</p> -->
				<label for="dproduct_deposit_demand">Demand Deposits
					<input type="text" value="<?php echo $dproduct_deposit_demand; ?>" name="dproduct_deposit_demand" id="dproduct_deposit_demand">
				</label>
				<label for="dproduct_deposit_time">Time Deposits
					<input type="text" value="<?php echo $dproduct_deposit_time; ?>" name="dproduct_deposit_time" id="dproduct_deposit_time">
				</label>
				<label for="dproduct_deposit_compulsary">Compulsory Deposits
					<input type="text" value="<?php echo $dproduct_deposit_compulsary; ?>" name="dproduct_deposit_compulsary" id="dproduct_deposit_compulsary">
				</label>
			</div>
		</div>
	</div>
	<div class="col">									
		<div class="form-main-grp">
			<div class="field-group">
				<label for="dproduct_naira">Deposits (Value- Naira) 
					<input type="text" value="<?php echo $dproduct_naira; ?>" name="dproduct_naira" id="dproduct_naira">
				</label>
				<!-- <p class="field-for">Deposit products</p> -->
				<label for="dproduct_naira_corporations">Deposit From Corporations
					<input type="text" value="<?php echo $dproduct_naira_corporations; ?>" name="dproduct_naira_corporations" id="dproduct_naira_corporations">
				</label>
				<label for="dproduct_naira_finstitute">Deposits from financial institutions
					<input type="text" value="<?php echo $dproduct_naira_finstitute; ?>" name="dproduct_naira_finstitute" id="dproduct_naira_finstitute">
				</label>
				<label for="dproduct_naira_govt">Deposits From Government
					<input type="text" value="<?php echo $dproduct_naira_govt; ?>" name="dproduct_naira_govt" id="dproduct_naira_govt">
				</label>
				<!-- <p class="field-for">Retail Deposits</p> -->
				<!-- <p class="sub-field-for">Voluntary deposits</p> -->
				<label for="dproduct_naira_demand">Demand Deposits
					<input type="text" value="<?php echo $dproduct_naira_demand; ?>" name="dproduct_naira_demand" id="dproduct_naira_demand">
				</label>
				<label for="dproduct_naira_time">Time Deposits
					<input type="text" value="<?php echo $dproduct_naira_time; ?>" name="dproduct_naira_time" id="dproduct_naira_time">
				</label>
				<label for="dproduct_naira_compulsary">Compulsory Deposits
					<input type="text" value="<?php echo $dproduct_naira_compulsary; ?>" name="dproduct_naira_compulsary" id="dproduct_naira_compulsary">
				</label>
			</div>
		</div>
		
	</div>
</div>