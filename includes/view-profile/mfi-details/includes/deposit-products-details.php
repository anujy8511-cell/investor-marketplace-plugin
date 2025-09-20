<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_deposit_products WHERE user_id = $user_id", OBJECT );	
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
<div class="table-view-details">
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Number of Depositors</th>
				<th><?php echo $dproduct_deposit; ?></th>
			</tr>
		</thead>
		<tbody>
			<!-- <tr>
				<td>Deposit products:-</td>
			</tr> -->
			<tr>
				<td>Deposit From Corporations</td>
				<td><?php echo $dproduct_deposit_corporations; ?></td>
			</tr>
			<tr>
				<td>Deposits from financial institutions</td>
				<td><?php echo $dproduct_deposit_finstitute; ?></td>
			</tr>
			<tr>
				<td>Deposits From Government</td>
				<td><?php echo $dproduct_deposit_govt; ?></td>
			</tr>
			<!-- <tr>
				<td>Retail Deposits:-</td>
			</tr> -->
			<tr>
				<td>Demand Deposits</td>
				<td><?php echo $dproduct_deposit_demand; ?></td>
			</tr>
			<tr>
				<td>Time Deposits</td>
				<td><?php echo $dproduct_deposit_time; ?></td>
			</tr>
			<tr>
				<td>Compulsory Deposits</td>
				<td><?php echo $dproduct_deposit_compulsary; ?></td>
			</tr>
			
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Deposits (Value- Naira)</th>
				<th><?php echo $dproduct_naira; ?></th>
			</tr>
		</thead>
		<tbody>
			<!-- <tr>
				<td>Deposit products:-</td>
			</tr> -->
			<tr>
				<td>Deposit From Corporations</td>
				<td><?php echo $dproduct_naira_corporations; ?></td>
			</tr>
			<tr>
				<td>Deposits from financial institutions</td>
				<td><?php echo $dproduct_naira_finstitute; ?></td>
			</tr>
			<tr>
				<td>Deposits From Government</td>
				<td><?php echo $dproduct_naira_govt; ?></td>
			</tr>
			<!-- <tr>
				<td>Retail Deposits:-</td>
			</tr> -->
			<tr>
				<td>Demand Deposits</td>
				<td><?php echo $dproduct_naira_demand; ?></td>
			</tr>
			<tr>
				<td>Time Deposits</td>
				<td><?php echo $dproduct_naira_time; ?></td>
			</tr>
			<tr>
				<td>Compulsory Deposits</td>
				<td><?php echo $dproduct_naira_compulsary; ?></td>
			</tr>
			
		</tbody>
	</table>
</div>