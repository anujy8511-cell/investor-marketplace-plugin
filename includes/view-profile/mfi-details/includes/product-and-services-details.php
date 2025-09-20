<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}msp_products_services WHERE user_id = $user_id", OBJECT );	
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
	//print_r($poverty_tool);

?>

<div class="social-edit">
	<div class="detail-col">
		<p class="field-name">Please indicate which types of credit products your institution offers:</p>
		<ul class="field-value">
			<?php
			if(!empty($offer_creproducts)){ 
				foreach ($offer_creproducts as $key => $value) {
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
		<p class="field-name">Please indicate which types of income generating loans your institution offers:</p>
		<ul class="field-value">
			<?php
			if(!empty($offer_income_gloan)){ 
				foreach ($offer_income_gloan as $key => $value) {
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
		<p class="field-name">Please indicate which types of non-income generating loans your institution offers:</p>
		<ul class="field-value">
			<?php
			if(!empty($offer_nonincome_gloan)){ 
				foreach ($offer_nonincome_gloan as $key => $value) {
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
		<p class="field-name">Please indicate which types of savings products your institution offers/requires:</p>
		<ul class="field-value">
			<?php
			if(!empty($types_saving_products)){ 
				foreach ($types_saving_products as $key => $value) {
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
		<p class="field-name">Please indicate which types of voluntary savings products your institution offers:</p>
		<ul class="field-value">
			<?php
			if(!empty($voluntary_sav_products)){ 
				foreach ($voluntary_sav_products as $key => $value) {
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
		<p class="field-name">Does your institution require compulsory insurance?</p>
		<ul class="field-value">
			<?php 
				if(!empty($compulsary_insurance)){
					echo '<li>'.$compulsary_insurance.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">Please indicate which types of compulsory insurance your institution requires:</p>
		<ul class="field-value">
			<?php
			if(!empty($type_compulsary_insurance)){ 
				foreach ($type_compulsary_insurance as $key => $value) {
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
		<p class="field-name">Does your institution offer voluntary insurance?</p>
		<ul class="field-value">
			<?php 
				if(!empty($voluntary_insurance)){
					echo '<li>'.$voluntary_insurance.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">Please indicate which types of voluntary insurance your institution offers:</p>
		<ul class="field-value">
			<?php
			if(!empty($type_voluntary_insurance)){ 
				foreach ($type_voluntary_insurance as $key => $value) {
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
		<p class="field-name">Does your institution offer any other financial services?</p>
		<ul class="field-value">
			<?php 
				if(!empty($financial_services)){
					echo '<li>'.$financial_services.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">Please indicate which types of other financial services your institution offers:</p>
		<ul class="field-value">
			<?php
			if(!empty($type_financial_services)){ 
				foreach ($type_financial_services as $key => $value) {
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
		<p class="field-name">Does your institution offer nonfinancial enterprise services?</p>
		<ul class="field-value">
			<?php 
				if(!empty($nonfinancial_services)){
					echo '<li>'.$nonfinancial_services.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">Please indicate which types of nonfinancial enterprise services your institution offers:</p>
		<ul class="field-value">
			<?php
			if(!empty($type_nonfinancial_services)){ 
				foreach ($type_nonfinancial_services as $key => $value) {
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
		<p class="field-name">Does your institution offer nonfinancial women's empowerment services?</p>
		<ul class="field-value">
			<?php 
				if(!empty($nonfinancial_women_empower)){
					echo '<li>'.$nonfinancial_women_empower.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">Please indicate which types of women's empowerment services your institution offers:</p>
		<ul class="field-value">
			<?php
			if(!empty($women_emower_services)){ 
				foreach ($women_emower_services as $key => $value) {
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
		<p class="field-name">Does your institution offer other nonfinancial education services?</p>
		<ul class="field-value">
			<?php 
				if(!empty($nonfinancial_education)){
					echo '<li>'.$nonfinancial_education.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">Please indicate which types of other nonfinancial education services your institution offers:</p>
		<ul class="field-value">
			<?php
			if(!empty($nonfinancial_education_services)){ 
				foreach ($nonfinancial_education_services as $key => $value) {
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
		<p class="field-name">Does your institution offer nonfinancial health services?</p>
		<ul class="field-value">
			<?php 
				if(!empty($nonfinacial_health)){
					echo '<li>'.$nonfinacial_health.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">Please indicate which types of nonfinancial health services your institution offers:</p>
		<ul class="field-value">
			<?php
			if(!empty($nonfinancial_health_services)){ 
				foreach ($nonfinancial_health_services as $key => $value) {
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