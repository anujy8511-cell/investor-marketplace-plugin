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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_enterprises_financed WHERE user_id = $userid", OBJECT );	
//print_r($result->s); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$nfinancial_service       	 = $result->no_ep_ent_financed;	
			$nfinancial_edu_service      = $result->no_stup_ent_financed;	
			$efinancial_sample_service   = $result->no_clsmaple_ent_financed;		
			
			
		}
	}

?>
<div class="row-col1">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="field-group">
				<label for="efinancial_service">Number of enterprises financed
					<input type="text" value="<?php echo $nfinancial_service; ?>" name="nfinancial_service" id="nfinancial_service">
				</label>
				<label for="efinancial_start_service">Number of start-up enterprises financed
					<input type="text" value="<?php echo $nfinancial_edu_service; ?>" name="nfinancial_edu_service" id="nfinancial_edu_service">
				</label>
				<label for="efinancial_sample_service">Number of clients sampled for enterprise data
					<input type="text" value="<?php echo $efinancial_sample_service; ?>" name="efinancial_sample_service" id="efinancial_sample_service">
				</label>
			</div>
		</div>
	</div>
</div>