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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_job_creation WHERE user_id = $userid", OBJECT );	
//print_r($result->s); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$jcreation_service       	= $result->no_worker_jobcres;	
			$jcreation_sample_edata     = $result->no_ent_sample_jobcres;	
			
			
		}
	}

?>
<div class="row-col1">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="field-group">
				<label for="jcreation_service">Number of jobs created through loans and credit provided by the MFI
					<input type="text" value="<?php echo $jcreation_service?>" name="jcreation_service" id="jcreation_service">
				</label>
				<label for="jcreation_sample_edata">Number of enterprises sampled for employment data
					<input type="text" value="<?php echo $jcreation_sample_edata?>" name="jcreation_sample_edata" id="jcreation_sample_edata">
				</label>
			</div>
		</div>
	</div>
</div>