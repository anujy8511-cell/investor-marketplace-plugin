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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_poverty_outreach WHERE user_id = $userid", OBJECT );	
//print_r($result->s); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$poverty_measure       		= $result->no_worker_poverty;		
			
			
		}
	}

?>
<div class="row-col1">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="field-group">
				<label for="poverty_measure">Number of clients sampled for poverty measurement
					<input type="text" value="<?php echo $poverty_measure; ?>" name="poverty_measure" id="poverty_measure">
				</label>
			</div>
		</div>
	</div>
</div>