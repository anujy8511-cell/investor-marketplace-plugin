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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_non_financial_service WHERE user_id = $userid", OBJECT );	
//print_r($result->s); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$nfinancial_service       = $result->ent_so_non_fs;	
			$nfinancial_edu_service      = $result->edu_so_non_fs;	
			$nfinancial_women_service    = $result->women_eso_non_fs;		
			
			
		}
	}

?>
<div class="row-col1">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="field-group">
				<label for="nfinancial_service">Number of Enterprises services Outreach
					<input type="text" value="<?php echo $nfinancial_service; ?>" name="nfinancial_service" id="nfinancial_service">
				</label>
				<label for="nfinancial_edu_service">Number of Education services outreach
					<input type="text" value="<?php echo $nfinancial_edu_service; ?>" name="nfinancial_edu_service" id="nfinancial_edu_service">
				</label>
				<label for="nfinancial_women_service">Number of empowerment services outreach
					<input type="text" value="<?php echo $nfinancial_women_service; ?>" name="nfinancial_women_service" id="nfinancial_women_service">
				</label>
			</div>
		</div>
	</div>
</div>