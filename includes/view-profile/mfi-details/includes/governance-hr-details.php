<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}msp_governance_hr WHERE user_id = $user_id", OBJECT );	
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
	//print_r($poverty_tool);

?>

<div class="social-edit">
	<div class="detail-col">
		<p class="field-name">During orientation, board members are provided with an explanation of (or training on) the institution’s social mission and goals.</p>
		<ul class="field-value">
			<?php 
				if(!empty($orientation_explain)){
					echo '<li>'.$orientation_explain.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">A social performance management champion has been designated and/or a social performance committee has been formally set up within the board.</p>
		<ul class="field-value">
			<?php 
				if(!empty($social_performance_board)){
					echo '<li>'.$social_performance_board.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">At least one board member has education and/or work experience related to social performance.</p>
		<ul class="field-value">
			<?php 
				if(!empty($member_skill)){
					echo '<li>'.$member_skill.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">Please indicate whether your institution has staff incentives related to any of the following areas:</p>
		<ul class="field-value">
			<?php
			if(!empty($staff_incentive)){ 
				foreach ($staff_incentive as $key => $value) {
					?>
					<li><?php echo $value; ?></li>
					<?php
				}
			}else{
				echo "No data Found";
			}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">Please indicate how the number of clients is incentivized:</p>
		<ul class="field-value">
			<?php
			if(!empty($client_incentivized)){ 
				foreach ($client_incentivized as $key => $value) {
					?>
					<li><?php echo $value; ?></li>
					<?php
				}
			}else{
				echo "No data Found";
			}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">Please indicate which of the following, if any, are included in your human resource policies:</p>
		<ul class="field-value">
			<?php
			if(!empty($hr_policies)){ 
				foreach ($hr_policies as $key => $value) {
					?>
					<li><?php echo $value; ?></li>
					<?php
				}
			}else{
				echo "No data Found";
			}
			?>
		</ul>
	</div>

</div>