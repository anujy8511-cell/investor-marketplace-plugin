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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_delinquency WHERE user_id = $userid", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$delinquency_gloan    	= $result->gloan_port_deli;
			$delinquency_cportfolio = $result->glp_current_deli;
			$delinquency_rloan    	= $result->glp_rene_loans_deli;
			$delinquency_p1to30    	= $result->glp_par_1to30_deli;
			$delinquency_pto30    	= $result->glp_par_30_deli;
			$delinquency_p31to90    = $result->glp_par_31to90_deli;
			$delinquency_pto90    	= $result->glp_par_90_deli;
			$delinquency_p91to180   = $result->glp_par_91to180_deli;
			$delinquency_pto180    	= $result->glp_par_180_deli;
			$delinquency_write_off  = $result->glp_woffs_deli;		
			
				//echo $infra_no_personnel;
		}
	}

?>
<div class="row-col1">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="field-group">
				<label for="delinquency_gloan">Gross loan portfolio (value- Naira)
					<input type="text" value="<?php echo $delinquency_gloan; ?>" name="delinquency_gloan" id="delinquency_gloan">
				</label>
				<!-- <p class="field-for">Delinquency</p> -->
				<label for="delinquency_cportfolio">Current Portfolio
					<input type="text" value="<?php echo $delinquency_cportfolio; ?>" name="delinquency_cportfolio" id="delinquency_cportfolio">
				</label>
				<label for="delinquency_rloan">Renegotiated loans
					<input type="text" value="<?php echo $delinquency_rloan; ?>" name="delinquency_rloan" id="delinquency_rloan">
				</label>
				<label for="delinquency_p1to30">PAR 1-30 days
					<input type="text" value="<?php echo $delinquency_p1to30; ?>" name="delinquency_p1to30" id="delinquency_p1to30">
				</label>
				<label for="delinquency_pto30">PAR > 30 days
					<input type="text" value="<?php echo $delinquency_pto30; ?>" name="delinquency_pto30" id="delinquency_pto30">
				</label>
				<label for="delinquency_p31to90">PAR 31-90 days
					<input type="text" value="<?php echo $delinquency_p31to90; ?>" name="delinquency_p31to90" id="delinquency_p31to90">
				</label>
				<label for="delinquency_pto90">PAR > 90 days
					<input type="text" value="<?php echo $delinquency_pto90; ?>" name="delinquency_pto90" id="delinquency_pto90">
				</label>
				<label for="delinquency_p91to180">PAR 91-180 days
					<input type="text" value="<?php echo $delinquency_p91to180; ?>" name="delinquency_p91to180" id="delinquency_p91to180">
				</label>
				<label for="delinquency_pto180">PAR > 180 days
					<input type="text" value="<?php echo $delinquency_pto180; ?>" name="delinquency_pto180" id="delinquency_pto180">
				</label><label></label>
				<label for="delinquency_write_off">Write-offs (value)
					<input type="text" value="<?php echo $delinquency_write_off; ?>" name="delinquency_write_off" id="delinquency_write_off">
				</label>
			</div>
		</div>
	</div>
</div>