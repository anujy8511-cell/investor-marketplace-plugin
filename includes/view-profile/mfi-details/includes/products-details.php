<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_products WHERE user_id = $user_id", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$product_trans       		= $result->no_trans_product;	
			$product_channel_agent      = $result->nt_agents_products;	
			$product_channel_atms       = $result->nt_atms_products;	
			$product_channel_internet   = $result->nt_internet_products;	
			$product_channel_mbank      = $result->nt_mob_bank_products;	
			$product_channel_mpos       = $result->nt_mer_pos_products;	
			$product_channel_rstaff     = $result->nt_rov_staff_products;	
			$product_channel_sbranches  = $result->nt_sub_branch_products;	
			$product_nira       		= $result->value_trans_product;	
			$product_nira_agent       	= $result->vt_agents_products;	
			$product_nira_atms       	= $result->vt_atms_products;	
			$product_nira_internet      = $result->vt_internet_products;	
			$product_nira_mbank       	= $result->vt_mob_bank_products;	
			$product_nira_mpos       	= $result->vt_mer_pos_products;	
			$product_nira_rstaff       	= $result->vt_rov_staff_products;	
			$product_nira_sbranches     = $result->vt_sub_branch_products;
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
				<th>Number of transactions</th>
				<th><?php echo $product_trans; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Delivery channels:-<br>Agents</td>
				<td><?php echo $product_channel_agent; ?></td>
			</tr>
			<tr>
				<td>ATM's</td>
				<td><?php echo $product_channel_atms; ?></td>
			</tr>
			<tr>
				<td>Internet</td>
				<td><?php echo $product_channel_internet; ?></td>
			</tr>
			<tr>
				<td>Mobile Banking</td>
				<td><?php echo $product_channel_mbank; ?></td>
			</tr>
			<tr>
				<td>Merchant POS</td>
				<td><?php echo $product_channel_mpos; ?></td>
			</tr>
			<tr>
				<td>Roving Staff</td>
				<td><?php echo $product_channel_rstaff; ?></td>
			</tr>
			<tr>
				<td>Sub Branches</td>
				<td><?php echo $product_channel_sbranches; ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Value OF TRANSACTIONS (Naira)</th>
				<th><?php echo $product_nira; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Delivery channels:-<br>Agents</td>
				<td><?php echo $product_nira_agent; ?></td>
			</tr>
			<tr>
				<td>ATM's</td>
				<td><?php echo $product_nira_atms; ?></td>
			</tr>
			<tr>
				<td>Internet</td>
				<td><?php echo $product_nira_internet; ?></td>
			</tr>
			<tr>
				<td>Mobile Banking</td>
				<td><?php echo $product_nira_mbank; ?></td>
			</tr>
			<tr>
				<td>Merchant POS</td>
				<td><?php echo $product_nira_mpos; ?></td>
			</tr>
			<tr>
				<td>Roving Staff</td>
				<td><?php echo $product_nira_rstaff; ?></td>
			</tr>
			<tr>
				<td>Sub Branches</td>
				<td><?php echo $product_nira_sbranches; ?></td>
			</tr>
		</tbody>
	</table>
	
	

</div>