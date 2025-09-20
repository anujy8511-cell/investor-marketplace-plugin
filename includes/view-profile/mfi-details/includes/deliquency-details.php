<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_delinquency WHERE user_id = $user_id", OBJECT );	
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
		
		// foreach ($results as $key => $value) {
		// 	# code...
		// }
	}

?>
<div class="table-view-details">
	<table class="table table-collapsed view-details">
		<thead>
			<tr>
				<th>Gross loan portfolio (value- Naira)</th>
				<th><?php echo $delinquency_gloan; ?></th>
			</tr>
		</thead>
		<tbody>
			<!-- <tr>
				<td>Delinquency:-</td>
			</tr> -->
			<tr>
				<td>Current Portfolio</td>
				<td><?php echo $delinquency_cportfolio; ?></td>
			</tr>
			<tr>
				<td>Renegotiated loans</td>
				<td><?php echo $delinquency_rloan; ?></td>
			</tr>
			<tr>
				<td>PAR 1-30 days</td>
				<td><?php echo $delinquency_p1to30; ?></td>
			</tr>
			<tr>
				<td>PAR > 30 days</td>
				<td><?php echo $delinquency_pto30; ?></td>
			</tr>
			<tr>
				<td>PAR 31-90 days</td>
				<td><?php echo $delinquency_p31to90; ?></td>
			</tr>
			<tr>
				<td>PAR > 90 days</td>
				<td><?php echo $delinquency_pto90; ?></td>
			</tr>
			<tr>
				<td>PAR 91-180 days</td>
				<td><?php echo $delinquency_p91to180; ?></td>
			</tr>
			<tr>
				<td>PAR > 180 days</td>
				<td><?php echo $delinquency_pto180; ?></td>
			</tr>
			<tr>
				<td>Write-offs (value)</td>
				<td><?php echo $delinquency_write_off; ?></td>
			</tr>
			
		</tbody>
	</table>
</div>