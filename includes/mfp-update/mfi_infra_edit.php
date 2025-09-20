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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_infrastructure WHERE user_id = $userid", OBJECT );	
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

<div class="row-col2">
	<div class="col">
		<div class="form-main-grp">
			<p class="form-title"></p>
			<div class="field-group">
				<label for="infra_no_personnel">Number of personnel
					<input type="text" name="infra_no_personnel" id="infra_no_personnel" value="<?php echo $infra_no_personnel; ?>">
				</label>
				<p class="field-for">Gender</p>
				<label for="infra_active_female">Female
					<input type="text" name="infra_active_female" id="infra_active_female" value="<?php echo $infra_active_female; ?>">
				</label>
				<label for="infra_staff_stable">Number of staff employed for one year or more
					<input type="text" name="infra_staff_stable" id="infra_staff_stable" value="<?php echo $infra_staff_stable; ?>">
				</label>
			</div>
			<div class="field-group">
				<label for="infra_no_managers">Number of managers
					<input type="text" name="infra_no_managers" id="infra_no_managers" value="<?php echo $infra_no_managers; ?>">
				</label>
				<p class="field-for">Gender</p>
				<label for="infra_manager_female">Female
					<input type="text" name="infra_manager_female" id="infra_manager_female" value="<?php echo $infra_manager_female; ?>">
				</label>
			</div>
			<div class="field-group">
				<label for="infra_loan_officers">Number of loan officers
					<input type="text" name="infra_loan_officers" id="infra_loan_officers" value="<?php echo $infra_loan_officers; ?>">
				</label>
				<p class="field-for">Gender</p>
				<label for="infra_officer_female">Female
					<input type="text" name="infra_officer_female" id="infra_officer_female" value="<?php echo $infra_officer_female; ?>">
				</label>
			</div>
			<div class="field-group">
				<label for="infra_board_member">Number of board members
					<input type="text" name="infra_board_member" id="infra_board_member" value="<?php echo $infra_board_member; ?>">
				</label>
				<p class="field-for">Gender</p>
				<label for="infra_board_female">Female
					<input type="text" name="infra_board_female" id="infra_board_female" value="<?php echo $infra_board_female; ?>">
				</label>
				<label for="infra_staff_leave">Number of staff leaving the organization  during the period
					<input type="text" name="infra_staff_leave" id="infra_staff_leave" value="<?php echo $infra_staff_leave; ?>">
				</label>
				<label for="infra_branches">Number of branches
					<input type="text" name="infra_branches" id="infra_branches" value="<?php echo $infra_branches; ?>">
				</label>
			</div>
			<div class="field-group">
				<label for="infra_no_agents">Number of agents
					<input type="text" name="infra_no_agents" id="infra_no_agents" value="<?php echo $infra_no_agents; ?>">
				</label>
				<!-- <p class="field-for">Active 30 days status</p>
				<label for="infra_agents_active30">Active 30 days
					<input type="text" name="infra_agents_active30" id="infra_agents_active30" value="<?php //echo $infra_agents_active30; ?>">
				</label>
 -->			</div>
			
		</div>
	</div>
	<div class="col">
		
	</div>
</div>