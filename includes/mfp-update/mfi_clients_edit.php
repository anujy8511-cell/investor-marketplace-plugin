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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_clients WHERE user_id = $userid", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$client_active_clients      = $result->no_act_brw_client;
			$client_active_male       	= $result->abi_male_clients;
			$client_active_female       = $result->abi_female_clients;
			// $client_active_entity       = $result->abi_legal_ent_clients;
			// $client_active_location     = $result->abi_location_clients;
			$client_active_borrow       = $result->abi_new_brws_clients;
			$client_loan_outstanding    = $result->gross_loan_port_clients;
			$client_loan_male       	= $result->glp_male_clients;
			$client_loan_female       	= $result->glp_female_clients;
			// $client_loan_entity       	= $result->glp_legal_ent_clients;
			// $client_loan_loaction       = $result->glp_location_clients;
			$client_loan_borrow       	= $result->no_loan_outs_clients;
			$client_gross_port       	= $result->nlo_male_clients;
			$client_gross_male       	= $result->nlo_female_clients;
			$client_gross_female       	= $result->nlo_legal_ent_clients;
			// $client_gross_entity       	= $result->nlo_location_clients;
			// $client_gross_loaction      = $result->nlo_no_brws_clients;
			
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
			<div class="field-group">
				<label for="client_active_clients">Number of active borrowers
					<input type="text" value="<?php echo $client_active_clients; ?>" name="client_active_clients" id="client_active_clients">
				</label>
				<p class="field-for">Gender</p>
				<label for="client_active_male">Male
					<input type="text" value="<?php echo $client_active_male; ?>" name="client_active_male" id="client_active_male">
				</label>
				<label for="client_active_female">Female
					<input type="text" value="<?php echo $client_active_female; ?>" name="client_active_female" id="client_active_female">
				</label>
				<label for="client_active_borrow">Number of New Borrowers
					<input type="text" value="<?php echo $client_active_borrow; ?>" name="client_active_borrow" id="client_active_borrow">
				</label>
			</div>
		</div>
		<div class="form-main-grp">
			<div class="field-group">
				<label for="client_loan_outstanding">Number of loans outstanding
					<input type="text" value="<?php echo $client_loan_outstanding; ?>" name="client_loan_outstanding" id="client_loan_outstanding">
				</label>
				<p class="field-for">Gender</p>
				<label for="client_loan_male">Male
					<input type="text" value="<?php echo $client_loan_male; ?>" name="client_loan_male" id="client_loan_male">
				</label>
				<label for="client_loan_female">Female
					<input type="text" value="<?php echo $client_loan_female; ?>" name="client_loan_female" id="clientloan_female">
				</label>
			</div>
		</div>
	</div>
	<div class="col">									
		<div class="form-main-grp">
			<div class="field-group">
				<label for="client_gross_port">Gross loan portfolio
					<input type="text" value="<?php echo $client_gross_port; ?>" name="client_gross_port" id="client_gross_port">
				</label>
				<p class="field-for">Gender</p>
				<label for="client_gross_male">Male
					<input type="text" value="<?php echo $client_gross_male; ?>" name="client_gross_male" id="client_gross_male">
				</label>
				<label for="client_gross_female">Female
					<input type="text" value="<?php echo $client_gross_female; ?>" name="client_gross_female" id="client_gross_female">
				</label>				
			</div>
		</div>
	</div>
</div>