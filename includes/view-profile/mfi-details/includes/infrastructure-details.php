<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_infrastructure WHERE user_id = $user_id", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$infra_no_personnel 		= $result->infra_no_personnel;
			$infra_active_female 		= $result->infra_active_female;
			$infra_staff_stable 		= $result->infra_staff_stable;
			$infra_no_managers 			= $result->infra_no_managers;
			$infra_manager_female 		= $result->infra_manager_female;
			$infra_loan_officers 		= $result->infra_loan_officers;
			$infra_officer_female 		= $result->infra_officer_female;
			$infra_board_member 		= $result->infra_board_member;
			$infra_board_female 		= $result->infra_board_female;
			$infra_staff_leave 			= $result->infra_staff_leave;
			$infra_branches 			= $result->infra_branches;
			$infra_no_agents 			= $result->infra_no_agents;
			$infra_agents_active30 		= $result->infra_agents_active30;
			$infra_no_atms 				= $result->infra_no_atms;
			$infra_atm_active30 		= $result->infra_atm_active30;
			$infra_no_merchant 			= $result->infra_no_merchant;
			$infra_merchants_active30 	= $result->infra_merchants_active30;
			$infra_no_sub_branch 		= $result->infra_no_sub_branch;
			$infra_branch_active30 		= $result->infra_branch_active30;
			$infra_no_rov_staff 		= $result->infra_no_rov_staff;
			$infra_roving_active30 		= $result->infra_roving_active30;
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
				<th>Number of personnel</th>
				<th><?php echo $infra_no_personnel; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Gender<br>Female</td>
				<td><?php echo $infra_active_female; ?></td>
			</tr>
			<tr>
				<td>Number of staff employed for one year or more</td>
				<td><?php echo $infra_staff_stable; ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Number of managers</th>
				<th><?php echo $infra_no_managers; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Gender<br>Female</td>
				<td><?php echo $infra_manager_female; ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Number of loan officers</th>
				<th><?php echo $infra_loan_officers; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Gender<br>Female</td>
				<td><?php echo $infra_officer_female; ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Number of board members</th>
				<th><?php echo $infra_board_member; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Gender<br>Female</td>
				<td><?php echo $infra_board_female; ?></td>
			</tr>
			<tr>
				<td>Number of staff leaving the organization during the period</td>
				<td><?php echo $infra_staff_leave; ?></td>
			</tr>
			<tr>
				<td>Number of branches</td>
				<td><?php echo $infra_branches; ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Number of agents</th>
				<th><?php echo $infra_no_agents; ?></th>
			</tr>
		</thead>
		<tbody>
			<!-- <tr>
				<td>Active 30 days status<br>Active 30 days</td>
				<td><?php //echo $infra_agents_active30; ?></td>
			</tr>
 -->		</tbody>
	</table>

</div>