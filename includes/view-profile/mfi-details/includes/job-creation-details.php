<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_job_creation WHERE user_id = $user_id", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$jcreation_service       	= $result->no_worker_jobcres;	
			$jcreation_sample_edata     = $result->no_ent_sample_jobcres;	
				//echo $infra_no_personnel;
		}
		
		// foreach ($results as $key => $value) {
		// 	# code...
		// }
	}

?>
<div class="table-view-details">
	<table class="table table-collapsed view-details">
		<!-- <thead>
			<tr>
				<th>Enterprise services outreach</th>
				<th><?php echo $nfinancial_service; ?></th>
			</tr>
		</thead> -->
		<tbody>
			<tr>
				<td>Number of jobs created through loans and credit provided by the MFI</td>
				<td><?php echo $jcreation_service; ?></td>
			</tr>
			<tr>
				<td>Number of enterprises sampled for employment data</td>
				<td><?php echo $jcreation_sample_edata; ?></td>
			</tr>		
			
		</tbody>
	</table>
</div>