<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_clients WHERE user_id = $user_id", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$client_active_clients      = $result->no_act_brw_client;
			$client_active_male       	= $result->abi_male_clients;
			$client_active_female       = $result->abi_female_clients;
			// $client_active_entity       = $result->abi_legal_ent_clients;
			// $client_active_location     = $result->abi_location_clients;
			$client_active_borrow       = $result->abi_new_brws_clients;
			$client_loan_outstanding    = $result->gross_loan_port_clients;
			$client_loan_male       	= $result->glp_male_clients;
			$client_loan_female       	= $result->glp_female_clients;
			// $client_loan_entity       	= $result->glp_legal_ent_clients;
			// $client_loan_loaction       = $result->glp_location_clients;
			$client_loan_borrow       	= $result->no_loan_outs_clients;
			$client_gross_port       	= $result->nlo_male_clients;
			$client_gross_male       	= $result->nlo_female_clients;
			$client_gross_female       	= $result->nlo_legal_ent_clients;
			// $client_gross_entity       	= $result->nlo_location_clients;
			// $client_gross_loaction      = $result->nlo_no_brws_clients;
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
				<th>Number of active borrowers</th>
				<th><?php echo $client_active_clients; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Gender<br>male</td>
				<td><?php echo $client_active_male; ?></td>
			</tr>
			<tr>
				<td>Gender<br>female</td>
				<td><?php echo $client_active_female; ?></td>
			</tr>
			<tr>
				<td>Number of New Borrowers</td>
				<td><?php echo $client_active_borrow; ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Number of loans outstanding</th>
				<th><?php echo $client_loan_outstanding; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Gender<br>male</td>
				<td><?php echo $client_loan_male; ?></td>
			</tr>
			<tr>
				<td>Gender<br>Female</td>
				<td><?php echo $client_loan_female; ?></td>
			</tr>
			<tr>
				<td>Number of Borrowers</td>
				<td><?php echo $client_loan_borrow; ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Gross loan portfolio</th>
				<th><?php echo $client_gross_port; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Gender<br>male</td>
				<td><?php echo $client_gross_male; ?></td>
			</tr>
			<tr>
				<td>Gender<br>Female</td>
				<td><?php echo $client_gross_female; ?></td>
			</tr>
		</tbody>
	</table>
	

</div>