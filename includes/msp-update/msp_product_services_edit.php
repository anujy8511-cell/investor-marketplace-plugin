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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}msp_products_services WHERE user_id = $userid", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$offer_creproducts    				= json_decode($result->offer_creproducts);
			$offer_income_gloan    				= json_decode($result->offer_income_gloan);
			$offer_nonincome_gloan    			= json_decode($result->offer_nonincome_gloan);
			$types_saving_products    			= json_decode($result->types_saving_products);
			$voluntary_sav_products    			= json_decode($result->voluntary_sav_products);
			$compulsary_insurance    			= $result->compulsary_insurance;
			$type_compulsary_insurance    		= json_decode($result->type_compulsary_insurance);
			$voluntary_insurance    			= $result->voluntary_insurance;
			$type_voluntary_insurance    		= json_decode($result->type_voluntary_insurance);
			$financial_services    				= $result->financial_services;
			$type_financial_services    		= json_decode($result->type_financial_services);
			$nonfinancial_services    			= $result->nonfinancial_services;
			$type_nonfinancial_services    		= json_decode($result->type_nonfinancial_services);
			$nonfinancial_women_empower    		= $result->nonfinancial_women_empower;
			$women_emower_services    			= json_decode($result->women_emower_services);
			$nonfinancial_education    			= $result->nonfinancial_education;
			$nonfinancial_education_services    = json_decode($result->nonfinancial_education_services);
			$nonfinacial_health    				= $result->nonfinacial_health;
			$nonfinancial_health_services    	= json_decode($result->nonfinancial_health_services);
			
		}
		
		
	}
	//print_r($nonfinancial_health_services);

?>
<div class="row-col2">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			
			<div class="field-group">
				<p class="field-for">Please indicate which types of credit products your institution offers:</p>
					<input type="checkbox" id="income_genrating" name="offer_creproducts[]" value="Income generating loans"<?php if(in_array('Income generating loans',$offer_creproducts)){ echo 'checked="checked"';}?>>
	  				<label for="income_genrating">Income generating loans</label><br>

	  				<input type="checkbox" id="non_income_genrating" name="offer_creproducts[]" value="Non-income generating loans"<?php if(in_array('Non-income generating loans',$offer_creproducts)){ echo 'checked="checked"';}?>>
	  				<label for="non_income_genrating">Non-income generating loans</label><br>

	  				<input type="checkbox" id="no_offer_creproducts" name="offer_creproducts[]" value="Does not offer credit products"<?php if(in_array('Does not offer credit products',$offer_creproducts)){ echo 'checked="checked"';}?>>
	  				<label for="no_offer_creproducts">Does not offer credit products</label><br>	  				
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate which types of income generating loans your institution offers:</p>
					<input type="checkbox" id="microenterprise_loan" name="offer_income_gloan[]" value="Microenterprise loans" <?php if(in_array('Microenterprise loans',$offer_income_gloan)){ echo 'checked="checked"';}?>>
	  				<label for="microenterprise_loan">Microenterprise loans</label><br>

	  				<input type="checkbox" id="sme_loans" name="offer_income_gloan[]" value="SME loans" <?php if(in_array('SME loans',$offer_income_gloan)){ echo 'checked="checked"';}?>>
	  				<label for="sme_loans">SME loans</label><br>

	  				<input type="checkbox" id="agricultural_loans" name="offer_income_gloan[]" value="Agricultural/ livestock loans" <?php if(in_array('Agricultural/ livestock loans',$offer_income_gloan)){ echo 'checked="checked"';}?>>
	  				<label for="agricultural_loans">Agricultural/ livestock loans</label><br>

	  				<input type="checkbox" id="express_loans" name="offer_income_gloan[]" value="Express Loans" <?php if(in_array('Express Loans',$offer_income_gloan)){ echo 'checked="checked"';}?>>
	  				<label for="express_loans">Express Loans</label><br>

	  				<input type="checkbox" id="offer_income_gloan_none" name="offer_income_gloan[]" value="None of the above" <?php if(in_array('None of the above',$offer_income_gloan)){ echo 'checked="checked"';}?>>
	  				<label for="offer_income_gloan_none">None of the above</label><br>	  				
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate which types of non-income generating loans your institution offers:</p>
					<input type="checkbox" id="offer_educatio_loan" name="offer_nonincome_gloan[]" value="Eduaction loans" <?php if(in_array('Eduaction loans',$offer_nonincome_gloan)){ echo 'checked="checked"';}?>>
	  				<label for="offer_educatio_loan">Eduaction loans</label><br>

	  				<input type="checkbox" id="offer_emergency_loan" name="offer_nonincome_gloan[]" value="Emergency loans" <?php if(in_array('Emergency loans',$offer_nonincome_gloan)){ echo 'checked="checked"';}?>>
	  				<label for="offer_emergency_loan">Emergency loans</label><br>

	  				<input type="checkbox" id="offer_housing_loans" name="offer_nonincome_gloan[]" value="Housing loans" <?php if(in_array('Housing loans',$offer_nonincome_gloan)){ echo 'checked="checked"';}?>>
	  				<label for="offer_housing_loans">Housing loans</label><br>

	  				<input type="checkbox" id="offer_other_household_loan" name="offer_nonincome_gloan[]" value="Loan for other household needs/ consumption" <?php if(in_array('Loan for other household needs/ consumption',$offer_nonincome_gloan)){ echo 'checked="checked"';}?>>
	  				<label for="offer_other_household_loan">Loan for other household needs/ consumption</label><br>
	  				<input type="checkbox" id="offer_noincome_gloan_none" name="offer_nonincome_gloan[]" value="None of the above" <?php if(in_array('None of the above',$offer_nonincome_gloan)){ echo 'checked="checked"';}?>>
	  				<label for="offer_noincome_gloan_none">None of the above</label><br>	  				
			</div>
			<!-- <div class="field-group">
				<p class="field-for">Please indicate which types of non-income generating loans your institution offers:</p>
					<input type="checkbox" id="offer_educatio_loan" name="offer_nonincome_gloan[]" value="Eduaction loans">
	  				<label for="offer_educatio_loan">Eduaction loans</label><br>
	  				<input type="checkbox" id="offer_emergency_loan" name="offer_nonincome_gloan[]" value="Emergency loans">
	  				<label for="offer_emergency_loan">Emergency loans</label><br>
	  				<input type="checkbox" id="offer_housing_loans" name="offer_nonincome_gloan[]" value="Housing loans">
	  				<label for="offer_housing_loans">Housing loans</label><br>
	  				<input type="checkbox" id="offer_other_household_loan" name="offer_nonincome_gloan[]" value="Loan for other household needs/ consumption">
	  				<label for="offer_other_household_loan">Loan for other household needs/ consumption</label><br>
	  				<input type="checkbox" id="offer_noincome_gloan_none" name="offer_nonincome_gloan[]" value="None of the above">
	  				<label for="offer_noincome_gloan_none">None of the above</label><br>	  				
			</div> -->
			<div class="field-group">
				<p class="field-for">Please indicate which types of savings products your institution offers/requires:</p>
					<input type="checkbox" id="types_saving_products1" name="types_saving_products[]" value="Compulsary saving accounts" <?php if(in_array('Compulsary saving accounts',$types_saving_products)){ echo 'checked="checked"';}?>>
	  				<label for="types_saving_products1">Compulsary saving accounts</label><br>

	  				<input type="checkbox" id="types_saving_products2" name="types_saving_products[]" value="Voluntary savings accounts" <?php if(in_array('Voluntary savings accounts',$types_saving_products)){ echo 'checked="checked"';}?>>
	  				<label for="types_saving_products2">Voluntary savings accounts</label><br>

	  				<input type="checkbox" id="types_saving_products3" name="types_saving_products[]" value="Does not offer saving products" <?php if(in_array('Does not offer saving products',$types_saving_products)){ echo 'checked="checked"';}?>>
	  				<label for="types_saving_products3">Does not offer saving products</label><br>	  					  				
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate which types of voluntary savings products your institution offers:</p>
					<input type="checkbox" id="voluntary_sav_products1" name="voluntary_sav_products[]" value="Demand deposit accounts" <?php if(in_array('Demand deposit accounts products',$voluntary_sav_products)){ echo 'checked="checked"';}?>>
	  				<label for="voluntary_sav_products1">Demand deposit accounts</label><br>

	  				<input type="checkbox" id="voluntary_sav_products2" name="voluntary_sav_products[]" value="Time deposit accounts" <?php if(in_array('Time deposit accounts',$voluntary_sav_products)){ echo 'checked="checked"';}?>>
	  				<label for="voluntary_sav_products2">Time deposit accounts</label><br>

	  				<input type="checkbox" id="voluntary_sav_products3" name="voluntary_sav_products[]" value="None of the above" <?php if(in_array('None of the above',$voluntary_sav_products)){ echo 'checked="checked"';}?>>
	  				<label for="voluntary_sav_products3">None of the above</label><br> 					  				
			</div>
			<div class="field-group">
				<p class="field-for">Does your institution require compulsory insurance?</p>
					<input type="radio" id="compulsary_insurance1" name="compulsary_insurance" value="yes" <?php if($compulsary_insurance == 'yes'){ echo 'checked="checked"';}?>>
					<label for="compulsary_insurance1">Yes</label>

					<input type="radio" id="compulsary_insurance2" name="compulsary_insurance" value="no" <?php if($compulsary_insurance == 'no'){ echo 'checked="checked"';}?>>
					<label for="compulsary_insurance2">No</label>

					<input type="radio" id="compulsary_insurance3" name="compulsary_insurance" value="unknown" <?php if($compulsary_insurance == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="compulsary_insurance3">Unknown</label>				  				
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate which types of compulsory insurance your institution requires:</p>
					<input type="checkbox" id="type_compulsary_insurance1" name="type_compulsary_insurance[]" value="Credit life Insurance" <?php if(in_array('Credit life Insurance',$type_compulsary_insurance)){ echo 'checked="checked"';}?>>
	  				<label for="type_compulsary_insurance1">Credit life Insurance</label><br>

	  				<input type="checkbox" id="type_compulsary_insurance2" name="type_compulsary_insurance[]" value="Life/ accident insurance" <?php if(in_array('Life/ accident insurance',$type_compulsary_insurance)){ echo 'checked="checked"';}?>>
	  				<label for="type_compulsary_insurance2">Life/ accident insurance</label><br>

	  				<input type="checkbox" id="type_compulsary_insurance3" name="type_compulsary_insurance[]" value="Agricultural insurance" <?php if(in_array('Agricultural insurance',$type_compulsary_insurance)){ echo 'checked="checked"';}?>>
	  				<label for="type_compulsary_insurance3">Agricultural insurance</label><br>

	  				<input type="checkbox" id="type_compulsary_insurance4" name="type_compulsary_insurance[]" value="None of the above" <?php if(in_array('None of the above',$type_compulsary_insurance)){ echo 'checked="checked"';}?>>
	  				<label for="type_compulsary_insurance4">None of the above</label><br> 					  				
			</div>
			
			
		</div>
	</div>
	<div class="col">
		<div class="form-main-grp">
			<div class="field-group">
				<p class="field-for">Does your institution offer voluntary insurance?</p>
					<input type="radio" id="voluntary_insurance1" name="voluntary_insurance" value="yes" <?php if($voluntary_insurance == 'yes'){ echo 'checked="checked"';}?>>
					<label for="voluntary_insurance1">Yes</label>

					<input type="radio" id="voluntary_insuranc2" name="voluntary_insurance" value="no" <?php if($voluntary_insurance == 'no'){ echo 'checked="checked"';}?>>
					<label for="voluntary_insuranc2">No</label>
					<input type="radio" id="voluntary_insurance3" name="voluntary_insurance" value="unknown" <?php if($voluntary_insurance == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="voluntary_insurance3">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate which types of voluntary insurance your institution offers:</p>
					<input type="checkbox" id="type_voluntary_insurance1" name="type_voluntary_insurance[]" value="Credit life Insurance" <?php if(in_array('Credit life Insurance',$type_voluntary_insurance)){ echo 'checked="checked"';}?>>
	  				<label for="type_voluntary_insurance1">Credit life Insurance</label><br>

	  				<input type="checkbox" id="type_voluntary_insurance2" name="type_voluntary_insurance[]" value="Life/ accident insurance" <?php if(in_array('Life/ accident insurance',$type_voluntary_insurance)){ echo 'checked="checked"';}?>>
	  				<label for="type_voluntary_insurance2">Life/ accident insurance</label><br>

	  				<input type="checkbox" id="type_voluntary_insurance3" name="type_voluntary_insurance[]" value="Agricultural insurance" <?php if(in_array('Agricultural insurance',$type_voluntary_insurance)){ echo 'checked="checked"';}?>>
	  				<label for="type_voluntary_insurance3">Agricultural insurance</label><br>

	  				<input type="checkbox" id="type_voluntary_insurance4" name="type_voluntary_insurance[]" value="Health insurance" <?php if(in_array('Health insurance',$type_voluntary_insurance)){ echo 'checked="checked"';}?>>
	  				<label for="type_voluntary_insurance4">Health insurance</label>

	  				<br>
	  				<input type="checkbox" id="type_voluntary_insurance5" name="type_voluntary_insurance[]" value="House insurance" <?php if(in_array('House insurance',$type_voluntary_insurance)){ echo 'checked="checked"';}?>>
	  				<label for="type_voluntary_insurance5">House insurance</label>
	  				<br>

	  				<input type="checkbox" id="type_voluntary_insurance6" name="type_voluntary_insurance[]" value="Workplace insurance" <?php if(in_array('Workplace insurance',$type_voluntary_insurance)){ echo 'checked="checked"';}?>>
	  				<label for="type_voluntary_insurance6">Workplace insurance</label>
	  				<br>

	  				<input type="checkbox" id="type_voluntary_insurance7" name="type_voluntary_insurance[]" value="None of the above" <?php if(in_array('None of the above',$type_voluntary_insurance)){ echo 'checked="checked"';}?>>
	  				<label for="type_voluntary_insurance7">None of the above</label><br> 				  				
			</div>
			<div class="field-group">
				<p class="field-for">Does your institution offer any other financial services?</p>
					<input type="radio" id="financial_services1" name="financial_services" value="yes"<?php if($financial_services == 'yes'){ echo 'checked="checked"';}?>>
					<label for="financial_services1">Yes</label>

					<input type="radio" id="financial_services2" name="financial_services" value="no"<?php if($financial_services == 'no'){ echo 'checked="checked"';}?>>
					<label for="financial_services2">No</label>

					<input type="radio" id="financial_services3" name="financial_services" value="unknown"<?php if($financial_services == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="financial_services3">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate which types of other financial services your institution offers:</p>
					<input type="checkbox" id="type_financial_services1" name="type_financial_services[]" value="Debit/ credit card" <?php if(in_array('Debit/ credit card',$type_financial_services)){ echo 'checked="checked"';}?>>
	  				<label for="type_financial_services1">Debit/ credit card</label><br>

	  				<input type="checkbox" id="type_financial_services2" name="type_financial_services[]" value="Mobile/ branchless banking services" <?php if(in_array('Mobile/ branchless banking services',$type_financial_services)){ echo 'checked="checked"';}?>>
	  				<label for="type_financial_services2">Mobile/ branchless banking services</label><br>

	  				<input type="checkbox" id="type_financial_services3" name="type_financial_services[]" value="Agricultural insurance" <?php if(in_array('Agricultural insurance',$type_financial_services)){ echo 'checked="checked"';}?>>
	  				<label for="type_financial_services3">Savings facilitation services</label><br>

	  				<input type="checkbox" id="type_financial_services4" name="type_financial_services[]" value="Remittance/ money transfer services" <?php if(in_array('Remittance/ money transfer services',$type_financial_services)){ echo 'checked="checked"';}?>>
	  				<label for="type_financial_services4">Remittance/ money transfer services</label>
	  				<br>

	  				<input type="checkbox" id="type_financial_services5" name="type_financial_services[]" value="Payment services" <?php if(in_array('Payment services',$type_financial_services)){ echo 'checked="checked"';}?>>
	  				<label for="type_financial_services5">Payment services</label>
	  				<br>

	  				<input type="checkbox" id="type_financial_services6" name="type_financial_services[]" value="Microleasing" <?php if(in_array('Microleasing',$type_financial_services)){ echo 'checked="checked"';}?>>
	  				<label for="type_financial_services6">Microleasing</label>
	  				<br>

	  				<input type="checkbox" id="type_financial_services8" name="type_financial_services[]" value="Scholarship/ educational grants" <?php if(in_array('Scholarship/ educational grants',$type_financial_services)){ echo 'checked="checked"';}?>>
	  				<label for="type_financial_services8">Scholarship/ educational grants</label>
	  				<br>

	  				<input type="checkbox" id="type_financial_services7" name="type_financial_services[]" value="None of the above" <?php if(in_array('None of the above',$type_financial_services)){ echo 'checked="checked"';}?>>
	  				<label for="type_financial_services7">None of the above</label><br> 				  				
			</div>
			<div class="field-group">
				<p class="field-for">Does your institution offer nonfinancial enterprise services?</p>
					<input type="radio" id="nonfinancial_services1" name="nonfinancial_services" value="yes" <?php if($nonfinancial_services == 'yes'){ echo 'checked="checked"';}?>>
					<label for="nonfinancial_services1">Yes</label>

					<input type="radio" id="nonfinancial_services2" name="nonfinancial_services" value="no" <?php if($nonfinancial_services == 'no'){ echo 'checked="checked"';}?>>
					<label for="nonfinancial_services2">No</label>
					<input type="radio" id="nonfinancial_services3" name="nonfinancial_services" value="unknown" <?php if($nonfinancial_services == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="nonfinancial_services3">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate which types of nonfinancial enterprise services your institution offers:</p>
					<input type="checkbox" id="type_nonfinancial_services1" name="type_nonfinancial_services[]" value="Enterprise skills development" <?php if(in_array('Enterprise skills development',$type_nonfinancial_services)){ echo 'checked="checked"';}?>>
	  				<label for="type_nonfinancial_services1">Enterprise skills development</label><br>

	  				<input type="checkbox" id="type_nonfinancial_services2" name="type_nonfinancial_services[]" value="Business development services" <?php if(in_array('Business development services',$type_nonfinancial_services)){ echo 'checked="checked"';}?>>
	  				<label for="type_nonfinancial_services2">Business development services</label><br>	  				
	  				<input type="checkbox" id="type_nonfinancial_services7" name="type_nonfinancial_services[]" value="None of the above" <?php if(in_array('None of the above',$type_nonfinancial_services)){ echo 'checked="checked"';}?>>
	  				<label for="type_nonfinancial_services7">None of the above</label><br> 				  				
			</div>
			<div class="field-group">
				<p class="field-for">Does your institution offer nonfinancial women's empowerment services?</p>
					<input type="radio" id="nonfinancial_women_empower1" name="nonfinancial_women_empower" value="yes" <?php if($nonfinancial_women_empower == 'yes'){ echo 'checked="checked"';}?>>
					<label for="nonfinancial_women_empower1">Yes</label>

					<input type="radio" id="nonfinancial_women_empower2" name="nonfinancial_women_empower" value="no" <?php if($nonfinancial_women_empower == 'no'){ echo 'checked="checked"';}?>>
					<label for="nonfinancial_women_empower2">No</label>

					<input type="radio" id="nonfinancial_women_empower3" name="nonfinancial_women_empower" value="unknown" <?php if($nonfinancial_women_empower == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="nonfinancial_women_empower3">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate which types of women's empowerment services your institution offers:</p>
					<input type="checkbox" id="women_emower_services1" name="women_emower_services[]" value="Leadership traning for women" <?php if(in_array('Leadership traning for women',$women_emower_services)){ echo 'checked="checked"';}?>>
	  				<label for="women_emower_services1">Leadership traning for women</label><br>

	  				<input type="checkbox" id="women_emower_services2" name="women_emower_services[]" value="Womens right education/ gender issues training" <?php if(in_array('Womens right education/ gender issues training',$women_emower_services)){ echo 'checked="checked"';}?>>
	  				<label for="women_emower_services2">Women's right education/ gender issues training</label><br>

	  				<input type="checkbox" id="women_emower_services3" name="women_emower_services[]" value="Counselling/ legal services for female victims of violence" <?php if(in_array('Counselling/ legal services for female victims of violence',$women_emower_services)){ echo 'checked="checked"';}?>>
	  				<label for="women_emower_services3">Counselling/ legal services for female victims of violence</label><br>	 

	  				<input type="checkbox" id="women_emower_services4" name="women_emower_services[]" value="None of the above" <?php if(in_array('None of the above',$women_emower_services)){ echo 'checked="checked"';}?>>
	  				<label for="women_emower_services4">None of the above</label><br> 				  				
			</div>
			<div class="field-group">
				<p class="field-for">Does your institution offer other nonfinancial education services?</p>
					<input type="radio" id="nonfinancial_education1" name="nonfinancial_education" value="yes" <?php if($nonfinancial_education == 'yes'){ echo 'checked="checked"';}?>>
					<label for="nonfinancial_education1">Yes</label>

					<input type="radio" id="nonfinancial_education2" name="nonfinancial_education" value="no" <?php if($nonfinancial_education == 'no'){ echo 'checked="checked"';}?>>
					<label for="nonfinancial_education2">No</label>

					<input type="radio" id="nonfinancial_education3" name="nonfinancial_education" value="unknown" <?php if($nonfinancial_education == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="nonfinancial_education3">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate which types of other nonfinancial education services your institution offers:</p>
					<input type="checkbox" id="nonfinancial_education_services1" name="nonfinancial_education_services[]" value="Basic health/ nutrition education" <?php if(in_array('Basic health/ nutrition education',$nonfinancial_education_services)){ echo 'checked="checked"';}?>>
	  				<label for="nonfinancial_education_services1">Basic health/ nutrition education</label><br>

	  				<input type="checkbox" id="nonfinancial_education_services2" name="nonfinancial_education_services[]" value="Child and youth education" <?php if(in_array('Child and youth education',$nonfinancial_education_services)){ echo 'checked="checked"';}?>>
	  				<label for="nonfinancial_education_services2">Child and youth education</label><br>

	  				<input type="checkbox" id="nonfinancial_education_services3" name="nonfinancial_education_services[]" value="Occupation health and safety in the workplace education" <?php if(in_array('Occupation health and safety in the workplace education',$nonfinancial_education_services)){ echo 'checked="checked"';}?>>
	  				<label for="nonfinancial_education_services3">Occupation health and safety in the workplace education</label><br>	  				

	  				<input type="checkbox" id="nonfinancial_education_services4" name="nonfinancial_education_services[]" value="None of the above" <?php if(in_array('None of the above',$nonfinancial_education_services)){ echo 'checked="checked"';}?>>
	  				<label for="nonfinancial_education_services4">None of the above</label><br> 				  				
			</div>
			<div class="field-group">
				<p class="field-for">Does your institution offer nonfinancial health services?</p>
					<input type="radio" id="nonfinacial_health1" name="nonfinacial_health" value="yes" <?php if($nonfinacial_health == 'yes'){ echo 'checked="checked"';}?>>
					<label for="nonfinacial_health1">Yes</label>

					<input type="radio" id="nonfinacial_health2" name="nonfinacial_health" value="no"<?php if($nonfinacial_health == 'no'){ echo 'checked="checked"';}?>>
					<label for="nonfinacial_health2">No</label>

					<input type="radio" id="nonfinacial_health3" name="nonfinacial_health" value="unknown"<?php if($nonfinacial_health == 'unknown'){ echo 'checked="checked"';}?>>
					<label for="nonfinacial_health3">Unknown</label>					  				
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate which types of nonfinancial health services your institution offers:</p>
					<input type="checkbox" id="nonfinancial_health_services1" name="nonfinancial_health_services[]" value="Basic medical services" <?php if(in_array('Basic medical services',$nonfinancial_health_services)){ echo 'checked="checked"';}?>>
	  				<label for="nonfinancial_health_services1">Basic medical services</label><br>

	  				<input type="checkbox" id="nonfinancial_health_services2" name="nonfinancial_health_services[]" value="Special medical service for women and children" <?php if(in_array('Special medical service for women and children',$nonfinancial_health_services)){ echo 'checked="checked"';}?>>
	  				<label for="nonfinancial_health_services2">Special medical service for women and children</label><br>

	  				<input type="checkbox" id="nonfinancial_health_services3" name="nonfinancial_health_services[]" value="Occupation health and safety in the workplace education" <?php if(in_array('Occupation health and safety in the workplace education',$nonfinancial_health_services)){ echo 'checked="checked"';}?>>
	  				<label for="nonfinancial_health_services3">Occupation health and safety in the workplace education</label><br>	
	  				  				
	  				<input type="checkbox" id="nonfinancial_health_services4" name="nonfinancial_health_services[]" value="None of the above" <?php if(in_array('None of the above',$nonfinancial_health_services)){ echo 'checked="checked"';}?>>
	  				<label for="nonfinancial_health_services4">None of the above</label><br> 				  				
			</div>

		</div>
	</div>
</div>