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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_credit_products WHERE user_id = $userid", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$cproduct_loan     				= $result->no_loan_outs_cproduct;		
			$cproduct_loan_menterprises     = $result->nlo_microenterprise_cpro;
			$cproduct_loan_snmenterprises   = $result->nlo_s&m_enterp_cpro;		
			$cproduct_loan_lcorporation     = $result->nlo_lcorpo_cpro;		
			$cproduct_loan_consumption      = $result->nlo_consumption_cpro;		
			$cproduct_loan_housing     		= $result->nlo_mortgage_cpro;		
			$cproduct_loan_hfinance     	= $result->nlo_other_house_cpro;		
			$cproduct_loan_indivisual     	= $result->nlo_indvis_cpro;		
			$cproduct_loan_solidarity     	= $result->nlo_solid_cpro;		
			$cproduct_loan_vbanking     	= $result->nlo_vallage_shg_cpro;		
			$cproduct_loan_disbursed     	= $result->nlo_loan_pdisb_cpro;		
			$cproduct_loan_ldisbursed     	= $result->nlo_no_loan_disb_cpro;		
			$cproduct_gloan     			= $result->gloan_portfolio_cproduct;		
			$cproduct_gloan_menterprises    = $result->glp_microenterprise_cpro;		
			$cproduct_gloan_snmenterprises  = $result->glp_s&m_enterp_cpro;		
			$cproduct_gloan_lcorporation    = $result->glp_lcorpo_cpro;		
			$cproduct_gloan_consumption     = $result->glp_consumption_cpro;		
			$cproduct_gloan_housing     	= $result->glp_mortgage_cpro;		
			$cproduct_gloan_hfinance     	= $result->glp_other_house_cpro;		
			$cproduct_gloan_indivisual     	= $result->glp_indvis_cpro;		
			$cproduct_gloan_solidarity     	= $result->glp_solid_cpro;		
			$cproduct_gloan_vbanking     	= $result->glp_vallage_shg_cpro;
			
				//echo $cproduct_loan;
		}
		
		// foreach ($results as $key => $value) {
		// 	# code...
		// }
	}

?>
<div class="row-col2">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="field-group">
				<label for="cproduct_loan">Number of loans outstanding
					<input type="text" value="<?php echo $cproduct_loan; ?>" name="cproduct_loan" id="cproduct_loan">
				</label>
				<!-- <p class="field-for">Credit products</p> -->
				<!-- <p class="sub-field-for">Enterprise Finance</p> -->
				<label for="cproduct_loan_menterprises">Microenterprise
					<input type="text" value="<?php echo $cproduct_loan_menterprises; ?>" name="cproduct_loan_menterprises" id="cproduct_loan_menterprises">
				</label>
				<label for="cproduct_loan_snmenterprises">Small and Medium Enterprises
					<input type="text" value="<?php echo $cproduct_loan_snmenterprises; ?>" name="cproduct_loan_snmenterprises" id="cproduct_loan_snmenterprises">
				</label>
				<label for="cproduct_loan_lcorporation">Large Corporation
					<input type="text" value="<?php echo $cproduct_loan_lcorporation; ?>" name="cproduct_loan_lcorporation" id="cproduct_loan_lcorporation">
				</label>
				<!-- <p class="sub-field-for">Enterprise Finance</p> -->
				<label for="cproduct_loan_consumption">Consumption
					<input type="text" value="<?php echo $cproduct_loan_consumption; ?>" name="cproduct_loan_consumption" id="cproduct_loan_consumption">
				</label>
				<label for="cproduct_loan_housing">Mortgage/ Housing
					<input type="text" value="<?php echo $cproduct_loan_housing; ?>" name="cproduct_loan_housing" id="cproduct_loan_housing">
				</label>
				<label for="cproduct_loan_hfinance">Other Household finance
					<input type="text" value="<?php echo $cproduct_loan_hfinance; ?>" name="cproduct_loan_hfinance" id="cproduct_loan_hfinance">
				</label>			

			</div>
		</div>
	</div>
	<div class="col">									
		<div class="form-main-grp">
			<div class="field-group">
				<label for="cproduct_gloan">Gross loan portfolio (Value in Naira)
					<input type="text" value="<?php echo $cproduct_gloan; ?>" name="cproduct_gloan" id="cproduct_gloan">
				</label>
				<!-- <p class="field-for">Credit products</p> -->
				<!-- <p class="sub-field-for">Enterprise Finance</p> -->
				<label for="cproduct_gloan_menterprises">Microenterprise
					<input type="text" value="<?php echo $cproduct_gloan_menterprises; ?>" name="cproduct_gloan_menterprises" id="cproduct_gloan_menterprises">
				</label>
				<label for="cproduct_gloan_snmenterprises">Small and Medium Enterprises
					<input type="text" value="<?php echo $cproduct_gloan_snmenterprises; ?>" name="cproduct_gloan_snmenterprises" id="cproduct_gloan_snmenterprises">
				</label>
				<label for="cproduct_gloan_lcorporation">Large Corporation
					<input type="text" value="<?php echo $cproduct_gloan_lcorporation; ?>" name="cproduct_gloan_lcorporation" id="cproduct_gloan_lcorporation">
				</label>
				<!-- <p class="sub-field-for">Enterprise Finance</p> -->
				<label for="cproduct_gloan_consumption">Consumption
					<input type="text" value="<?php echo $cproduct_gloan_consumption; ?>" name="cproduct_gloan_consumption" id="cproduct_gloan_consumption">
				</label>
				<label for="cproduct_gloan_housing">Mortgage/ Housing
					<input type="text" value="<?php echo $cproduct_gloan_housing; ?>" name="cproduct_gloan_housing" id="cproduct_gloan_housing">
				</label>
				<label for="cproduct_gloan_hfinance">Other Household finance
					<input type="text" value="<?php echo $cproduct_gloan_hfinance; ?>" name="cproduct_gloan_hfinance" id="cproduct_gloan_hfinance">
				</label>
			</div>
		</div>
		
	</div>
</div>