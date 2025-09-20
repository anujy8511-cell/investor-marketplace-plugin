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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}msp_governance_hr WHERE user_id = $userid", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$orientation_explain    	= $result->g_hr_social_goals;
			$social_performance_board   = $result->g_hr_setup_board;
			$member_skill    			= $result->g_hr_member_eligibility;
			$staff_incentive    		= json_decode($result->g_hr_staff_inc);
			$client_incentivized    	= json_decode($result->g_hr_how_inc);
			$hr_policies    			= json_decode($result->g_hr_human_policy);
			
		}
		
		
	}
	//print_r($staff_incentive);
	//var_dump($orientation_explain ) ;

?>

<div class="row-col2">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="field-group">
				<p class="field-for">During orientation, board members are provided with an explanation of (or training on) the institution’s social mission and goals.</p>
					<input type="radio" id="orientation_explain" name="orientation_explain" value="yes" <?php if($orientation_explain == 'yes'){ echo 'checked="checked"';}?>>
					<label for="orientation_explain">Yes</label>

					<input type="radio" id="orientation_explain_no" name="orientation_explain" value="no" <?php if($orientation_explain == 'no'){ echo 'checked="checked"';}?>>
					<label for="orientation_explain_no">No</label>

					<input type="radio" id="orientation_explain_unknown" name="orientation_explain" value="unknown" <?php if($orientation_explain == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="orientation_explain_unknown">Unknown</label>
			</div>
			<div class="field-group">
				<p class="field-for">A social performance management champion has been designated and/or a social performance committee has been formally set up within the board.</p>
					<input type="radio" id="social_performance_board" name="social_performance_board" value="yes" <?php if($social_performance_board == 'yes'){ echo 'checked="checked"';}?>>
					<label for="social_performance_board">Yes</label>

					<input type="radio" id="social_performance_board_no" name="social_performance_board" value="no" <?php if($social_performance_board == 'no'){ echo 'checked="checked"';}?>>
					<label for="social_performance_board_no">No</label>

					<input type="radio" id="social_performance_board_unknown" name="social_performance_board" value="unknown" <?php if($social_performance_board == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="social_performance_board_unknown">Unknown</label>
			</div>
			<div class="field-group">
				<p class="field-for">At least one board member has education and/or work experience related to social performance.</p>
					<input type="radio" id="member_skill" name="member_skill" value="yes" <?php if($member_skill == 'yes'){ echo 'checked="checked"';}?>>
					<label for="member_skill">Yes</label>

					<input type="radio" id="member_skill_no" name="member_skill" value="no" <?php if($member_skill == 'no'){ echo 'checked="checked"';}?>>
					<label for="member_skill_no">No</label>

					<input type="radio" id="member_skill_unknown" name="member_skill" value="unknown" <?php if($member_skill == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="member_skill_unknown">Unknown</label>
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate whether your institution has staff incentives related to any of the following areas:</p>
					<input type="checkbox" id="incentive_number_of_clients" name="staff_incentive[]" value="Number of Clients" <?php if(in_array('Number of Clients',$staff_incentive)){ echo 'checked="checked"';}?>>
	  				<label for="incentive_number_of_clients">Number of Clients</label><br>

	  				<input type="checkbox" id="incentive_feedback_mechanism" name="staff_incentive[]" value="Quality of interaction with clients based on client feedbacks mechanism" <?php if(in_array('Quality of interaction with clients based on client feedbacks mechanism',$staff_incentive)){ echo 'checked="checked"';}?>>
	  				<label for="incentive_feedback_mechanism">Quality of interaction with clients based on client feedbacks mechanism</label><br>

	  				<input type="checkbox" id="incentive_social_data" name="staff_incentive[]" value="Quality of Social data collected" <?php if(in_array('Quality of Social data collected',$staff_incentive)){ echo 'checked="checked"';}?>>
	  				<label for="incentive_social_data">Quality of Social data collected</label><br>

	  				<input type="checkbox" id="incentive_portfolio_quality" name="staff_incentive[]" value="Portfolio Quality" <?php if(in_array('Portfolio Quality',$staff_incentive)){ echo 'checked="checked"';}?>>
	  				<label for="incentive_portfolio_quality">Portfolio Quality</label><br>

	  				<input type="checkbox" id="incentive_none_above" name="staff_incentive[]" value="None of the above" <?php if(in_array('None of the above',$staff_incentive)){ echo 'checked="checked"';}?>>
	  				<label for="incentive_none_above">None of the above</label><br>
			</div>
			
		</div>
	</div>
	<div class="col">
		<div class="form-main-grp">
			<div class="field-group">
				<p class="field-for">Please indicate how the number of clients is incentivized:</p>
					<input type="checkbox" id="incentivized_number_of_clients" name="client_incentivized[]" value="Total number of clients"  <?php if(in_array('Total number of clients',$client_incentivized)){ echo 'checked="checked"';}?>>
	  				<label for="incentivized_number_of_clients">Total number of clients</label><br>

	  				<input type="checkbox" id="incentivized_new_clients" name="client_incentivized[]" value="Number of new clients" <?php if(in_array('Number of new clients',$client_incentivized)){ echo 'checked="checked"';}?>>
	  				<label for="incentivized_new_clients">Number of new clients</label><br>

	  				<input type="checkbox" id="incentivized_clients_retntion" name="client_incentivized[]" value="Clients retention" <?php if(in_array('Clients retention',$client_incentivized)){ echo 'checked="checked"';}?>>
	  				<label for="incentivized_clients_retntion">Clients retention</label><br>

	  				<input type="checkbox" id="incentivized_none" name="client_incentivized[]" value="None of the above"  <?php if(in_array('None of the above',$client_incentivized)){ echo 'checked="checked"';}?>>
	  				<label for="incentivized_none">None of the above</label><br>
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate which of the following, if any, are included in your human resource policies:</p>
					<input type="checkbox" id="policies_protection" name="hr_policies[]" value="Social Protection (Medical Insurance and/ or pension contribution)" <?php if(in_array('Social Protection (Medical Insurance and/ or pension contribution)',$hr_policies)){ echo 'checked="checked"';}?>>
	  				<label for="policies_protection">Social Protection (Medical Insurance and/ or pension contribution)</label><br>

	  				<input type="checkbox" id="policies_safety" name="hr_policies[]" value="Safety Policy" <?php if(in_array('Safety Policy',$hr_policies)){ echo 'checked="checked"';}?>>
	  				<label for="policies_safety">Safety Policy</label><br>

	  				<input type="checkbox" id="policies_retension" name="hr_policies[]" value="Anti-harassment policy" <?php if(in_array('Anti-harassment policy',$hr_policies)){ echo 'checked="checked"';}?>>
	  				<label for="policies_retension">Anti-harassment policy</label><br>

	  				<input type="checkbox" id="policies_descriminaion" name="hr_policies[]" value="Non-descrimination policy" <?php if(in_array('Non-descrimination policy',$hr_policies)){ echo 'checked="checked"';}?>>
	  				<label for="policies_descriminaion">Non-descrimination policy</label><br>

	  				<input type="checkbox" id="policies_grievance" name="hr_policies[]" value="Grievance resolution policy" <?php if(in_array('Grievance resolution policy',$hr_policies)){ echo 'checked="checked"';}?>>
	  				<label for="policies_grievance">Grievance resolution policy</label><br>

	  				<input type="checkbox" id="incentivized_none" name="hr_policies[]" value="None of the above" <?php if(in_array('None of the above',$hr_policies)){ echo 'checked="checked"';}?>>
	  				<label for="incentivized_none">None of the above</label><br>
			</div>
		</div>
	</div>
</div>