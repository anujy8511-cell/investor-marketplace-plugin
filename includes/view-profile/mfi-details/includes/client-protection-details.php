<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}msp_client_protection WHERE user_id = $user_id", OBJECT );	
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
	//print_r($poverty_tool);

?>

<div class="social-edit">
	<div class="detail-col">
		<p class="field-name">The institution’s policies support good repayment capacity analysis. Loan approval does not rely solely on guarantees (whether peer guarantees, co-signers or collateral) as a substitute for good capacity analysis.</p>
		<ul class="field-value">
			<?php 
				if(!empty($institution_policies)){
					echo '<li>'.$institution_policies.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">The institution’s internal audit and/or internal controls department verifies the compliance with the policies and systems used to prevent the risk of client over-indebtedness.</p>
		<ul class="field-value">
			<?php 
				if(!empty($institution_audits)){
					echo '<li>'.$institution_audits.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">The institution fully discloses to the clients all prices, installments, terms, and conditions of all financial products, including all charges and fees, associated prices, penalties, linked products, third party fees, and whether these can change over time.</p>
		<ul class="field-value">
			<?php 
				if(!empty($institution_discloses)){
					echo '<li>'.$institution_discloses.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">The institution discloses the annual percentage rate (APR) of its loan products to clients. APRs state all interest payments and fees related to a loan as a single, annualized percentage of the loan principal.</p>
		<ul class="field-value">
			<?php 
				if(!empty($institution_discloses_apr)){
					echo '<li>'.$institution_discloses_apr.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">The institution clearly spells out in a Code of Conduct (i.e. Code of Ethics, Book of Staff Rules) acceptable and unacceptable behavior expected of all employees involved in collections (including third party staff).</p>
		<ul class="field-value">
			<?php 
				if(!empty($institution_codeofconduct)){
					echo '<li>'.$institution_codeofconduct.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">The institution sanctions cases of violations of the Code of Conduct or collections policies (identified by management, internal audit or an efficient complaint mechanism) according to set rules.</p>
		<ul class="field-value">
			<?php 
				if(!empty($institution_sanctions)){
					echo '<li>'.$institution_sanctions.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">The institution has a clear reporting system in place to ensure that complaints from clients at branches/points of service reach complaints-handling staff. This system makes sure clients receive action on their complaint within a month of submission.</p>
		<ul class="field-value">
			<?php 
				if(!empty($institution_complaints)){
					echo '<li>'.$institution_complaints.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">The institution's contracts include a data privacy clause, describing how and when data can be shared (in addition to credit bureau information).</p>
		<ul class="field-value">
			
			<?php 
				if(!empty($institution_privacy)){
					echo '<li>'.$institution_privacy.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	<div class="detail-col">
		<p class="field-name">How does your institution state the interest rate of its most representative credit product(s)?</p>
		<ul class="field-value">
			<?php 
				if(!empty($institution_interest)){
					echo '<li>'.$institution_interest.'</li>'; 
				}else{echo "No data Found";}
			?>
		</ul>
	</div>
	
</div>