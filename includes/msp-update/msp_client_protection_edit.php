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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}msp_client_protection WHERE user_id = $userid", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$institution_policies    		= $result->clientp_capacity;
			$institution_audits    			= $result->clientp_indebt;
			$institution_discloses    		= $result->clientp_discloses;
			$institution_discloses_apr    	= $result->clientp_discloses_annual;
			$institution_codeofconduct    	= $result->clientp_spell_coc;
			$institution_sanctions    		= $result->clientp_viol_coc;
			$institution_complaints    		= $result->clientp_repo_system;
			$institution_privacy    		= $result->clientp_data_privacy;
			$institution_interest    		= $result->clientp_interest_rate;
			
		}
		
		
	}
	//print_r($nonfinancial_health_services);

?>
<div class="row-col2">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			
			<div class="field-group">
				<p class="field-for">The institution’s policies support good repayment capacity analysis. Loan approval does not rely solely on guarantees (whether peer guarantees, co-signers or collateral) as a substitute for good capacity analysis.</p>
					<input type="radio" id="institution_policies1" name="institution_policies" value="yes"<?php if($institution_policies == 'yes'){ echo 'checked="checked"';}?>>
					<label for="institution_policies1">Yes</label>

					<input type="radio" id="institution_policies2" name="institution_policies" value="no"<?php if($institution_policies == 'no'){ echo 'checked="checked"';}?>>
					<label for="institution_policies2">No</label>

					<input type="radio" id="institution_policies3" name="institution_policies" value="unknown"<?php if($institution_policies == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="institution_policies3">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">The institution’s internal audit and/or internal controls department verifies the compliance with the policies and systems used to prevent the risk of client over-indebtedness.</p>
					<input type="radio" id="institution_audits1" name="institution_audits" value="yes"<?php if($institution_audits == 'yes'){ echo 'checked="checked"';}?>>
					<label for="institution_audits1">Yes</label>

					<input type="radio" id="institution_audits2" name="institution_audits" value="no"<?php if($institution_audits == 'no'){ echo 'checked="checked"';}?>>
					<label for="institution_audits2">No</label>

					<input type="radio" id="institution_audits3" name="institution_audits" value="unknown"<?php if($institution_audits == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="institution_audits3">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">The institution fully discloses to the clients all prices, installments, terms, and conditions of all financial products, including all charges and fees, associated prices, penalties, linked products, third party fees, and whether these can change over time.</p>
					<input type="radio" id="institution_discloses1" name="institution_discloses" value="yes" <?php if($institution_discloses == 'yes'){ echo 'checked="checked"';}?>>
					<label for="institution_discloses1">Yes</label>

					<input type="radio" id="institution_discloses2" name="institution_discloses" value="no" <?php if($institution_discloses == 'no'){ echo 'checked="checked"';}?>>
					<label for="institution_discloses2">No</label>

					<input type="radio" id="institution_discloses3" name="institution_discloses" value="unknown" <?php if($institution_discloses == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="institution_discloses3">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">The institution discloses the annual percentage rate (APR) of its loan products to clients. APRs state all interest payments and fees related to a loan as a single, annualized percentage of the loan principal.</p>
					<input type="radio" id="institution_discloses_apr1" name="institution_discloses_apr" value="yes" <?php if($institution_discloses_apr == 'yes'){ echo 'checked="checked"';}?>>
					<label for="institution_discloses_apr1">Yes</label>

					<input type="radio" id="institution_discloses_apr2" name="institution_discloses_apr" value="no" <?php if($institution_discloses_apr == 'no'){ echo 'checked="checked"';}?>>
					<label for="institution_discloses_apr2">No</label>

					<input type="radio" id="institution_discloses3_apr" name="institution_discloses_apr" value="unknown" <?php if($institution_discloses_apr == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="institution_discloses3_apr">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">The institution clearly spells out in a Code of Conduct (i.e. Code of Ethics, Book of Staff Rules) acceptable and unacceptable behavior expected of all employees involved in collections (including third party staff).</p>
					<input type="radio" id="institution_codeofconduct1" name="institution_codeofconduct" value="yes" <?php if($institution_codeofconduct == 'yes'){ echo 'checked="checked"';}?>>
					<label for="institution_codeofconduct1">Yes</label>

					<input type="radio" id="institution_codeofconduct2" name="institution_codeofconduct" value="no" <?php if($institution_codeofconduct == 'no'){ echo 'checked="checked"';}?>>
					<label for="institution_codeofconduct2">No</label>

					<input type="radio" id="institution_codeofconduct3" name="institution_codeofconduct" value="unknown" <?php if($institution_codeofconduct == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="institution_codeofconduct3">Unknown</label>					  				
			</div>
			
			
		</div>
	</div>
	<div class="col">
		<div class="form-main-grp">
			<div class="field-group">
				<p class="field-for">The institution sanctions cases of violations of the Code of Conduct or collections policies (identified by management, internal audit or an efficient complaint mechanism) according to set rules.</p>
					<input type="radio" id="institution_sanctions1" name="institution_sanctions" value="yes" <?php if($institution_sanctions == 'yes'){ echo 'checked="checked"';}?>>
					<label for="institution_sanctions1">Yes</label>

					<input type="radio" id="institution_sanctions2" name="institution_sanctions" value="no" <?php if($institution_sanctions == 'no'){ echo 'checked="checked"';}?>>
					<label for="institution_sanctions2">No</label>

					<input type="radio" id="institution_sanctions3" name="institution_sanctions" value="unknown" <?php if($institution_sanctions == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="institution_sanctions3">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">The institution has a clear reporting system in place to ensure that complaints from clients at branches/points of service reach complaints-handling staff. This system makes sure clients receive action on their complaint within a month of submission.</p>
					<input type="radio" id="institution_complaints1" name="institution_complaints" value="yes" <?php if($institution_complaints == 'yes'){ echo 'checked="checked"';}?>>
					<label for="institution_complaints1">Yes</label>

					<input type="radio" id="institution_complaints2" name="institution_complaints" value="no" <?php if($institution_complaints == 'no'){ echo 'checked="checked"';}?>>
					<label for="institution_complaints2">No</label>

					<input type="radio" id="institution_complaints3" name="institution_complaints" value="unknown" <?php if($institution_complaints == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="institution_complaints3">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">The institution's contracts include a data privacy clause, describing how and when data can be shared (in addition to credit bureau information).</p>
					<input type="radio" id="institution_privacy1" name="institution_privacy" value="yes" <?php if($institution_privacy == 'yes'){ echo 'checked="checked"';}?>>
					<label for="institution_privacy1">Yes</label>
					<input type="radio" id="institution_privacy2" name="institution_privacy" value="no" <?php if($institution_privacy == 'no'){ echo 'checked="checked"';}?>>
					<label for="institution_privacy2">No</label>

					<input type="radio" id="institution_privacy3" name="institution_privacy" value="unknown" <?php if($institution_privacy == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="institution_privacy3">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">How does your institution state the interest rate of its most representative credit product(s)?</p>
					<input type="radio" id="institution_interest1" name="institution_interest" value="yes"  <?php if($institution_interest == 'yes'){ echo 'checked="checked"';}?>>
					<label for="institution_interest1">Yes</label>

					<input type="radio" id="institution_interest2" name="institution_interest" value="no" <?php if($institution_interest == 'no'){ echo 'checked="checked"';}?>>
					<label for="institution_interest2">No</label>

					<input type="radio" id="institution_interest3" name="institution_interest" value="unknown" <?php if($institution_interest == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="institution_interest3">Unknown</label>					  				
			</div>

		</div>
	</div>
</div>