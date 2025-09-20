<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}msp_environment WHERE user_id = $user_id", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$environmental_policies    		= json_decode($result->env_policies);
			$environmental_friendly    		= json_decode($result->env_products);
			
		}
		
		
	}
	//print_r($poverty_tool);

?>

<div class="social-edit">
	<div class="detail-col">
		<p class="field-name">Please indicate whether you have any of the following environmental policies in place:</p>
		<ul class="field-value">
			<?php
			if(!empty($environmental_policies)){ 
				foreach ($environmental_policies as $key => $value) {
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
		<p class="field-name">Please indicate the types of environmentally friendly products and/or practices for which your institution offers specific loans:</p>
		<ul class="field-value">
			<?php
			if(!empty($environmental_friendly)){ 
				foreach ($environmental_friendly as $key => $value) {
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