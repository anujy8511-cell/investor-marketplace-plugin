<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_credit_products WHERE user_id = $user_id", OBJECT );	
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
				//echo $infra_no_personnel;
		}
		
		// foreach ($results as $key => $value) {
		// 	# code...
		// }
	}

?>
<div class="table-view-details">
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Number of loans outstanding</th>
				<th><?php echo $cproduct_loan; ?></th>
			</tr>
		</thead>
		<tbody>
			<!-- <tr>
				<td>Credit products:-</td>
			</tr> -->
			<tr>
				<td>Microenterprise</td>
				<td><?php echo $cproduct_loan_menterprises; ?></td>
			</tr>
			<tr>
				<td>Small and Medium Enterprises</td>
				<td><?php echo $cproduct_loan_snmenterprises; ?></td>
			</tr>
			<tr>
				<td>Large Corporation</td>
				<td><?php echo $cproduct_loan_lcorporation; ?></td>
			</tr>
			<tr>
				<td>Consumption</td>
				<td><?php echo $cproduct_loan_consumption; ?></td>
			</tr>
			<tr>
				<td>Mortgage/ Housing</td>
				<td><?php echo $cproduct_loan_housing; ?></td>
			</tr>
			<tr>
				<td>Other Household finance</td>
				<td><?php echo $cproduct_loan_hfinance; ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Gross loan portfolio (Value in Naira)</th>
				<th><?php echo $cproduct_gloan; ?></th>
			</tr>
		</thead>
		<tbody>
			<!-- <tr>
				<td>Credit products:-</td>
			</tr> -->
			<tr>
				<td>Microenterprise</td>
				<td><?php echo $cproduct_gloan_menterprises; ?></td>
			</tr>
			<tr>
				<td>Small and Medium Enterprises</td>
				<td><?php echo $cproduct_gloan_snmenterprises; ?></td>
			</tr>
			<tr>
				<td>Large Corporation</td>
				<td><?php echo $cproduct_gloan_lcorporation; ?></td>
			</tr>
			<tr>
				<td>Consumption</td>
				<td><?php echo $cproduct_gloan_consumption; ?></td>
			</tr>
			<tr>
				<td>Mortgage/ Housing</td>
				<td><?php echo $cproduct_gloan_housing; ?></td>
			</tr>
			<tr>
				<td>Other Household finance</td>
				<td><?php echo $cproduct_gloan_hfinance; ?></td>
			</tr>
		</tbody>
	</table>
	
	
	

</div>