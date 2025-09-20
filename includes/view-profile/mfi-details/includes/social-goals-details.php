<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}msp_social_goals WHERE user_id = $user_id", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$target_market    		= json_decode($result->sg_target_market);
			$dev_goal    			= json_decode($result->sg_inst_pursue);
			$poverty_level    		= json_decode($result->sg_pov_level);
			$measure_poverty    	= $result->sg_does_meas_plevel;
			$poverty_tool    		= json_decode($result->sg_tool_meas_plevel);
			
		}
		
		
	}
	//print_r($poverty_tool);

?>

<div class="social-edit">
	<div class="detail-col">
		<p class="field-name">Which of the following clients represent your target market? Please select a maximum of three.</p>
		<ul class="field-value">
			<?php
			if(!empty($target_market)){ 
				foreach ($target_market as $key => $value) {
					?>
					<li><?php echo $value; ?></li>
					<?php
				}
			}else{
				echo "No data Found";
			}?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">Which development goals does your institution specifically pursue through its provision of financial and non-financial products and services? Please select a maximum of five.</p>
		<ul class="field-value">
			<?php
			if(!empty($dev_goal)){ 
				foreach ($dev_goal as $key => $value) {
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
		<p class="field-name">What is the poverty level of the clients that your institution aims to reach? Please check all that apply:</p>
		<ul class="field-value">
			<?php
			if(!empty($poverty_level)){ 
				foreach ($poverty_level as $key => $value) {
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
		<p class="field-name">Does your institution measure the poverty level of its clients?</p>
		<ul class="field-value">
			<?php 
				if(!empty($measure_poverty)){
					echo '<li>'.$measure_poverty.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">Please indicate which tool(s) your institution uses to measure client poverty:</p>
		<ul class="field-value">
			<?php
			if(!empty($poverty_tool)){ 
				foreach ($poverty_tool as $key => $value) {
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