<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_enterprises_financed WHERE user_id = $user_id", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$nfinancial_service       	 = $result->no_ep_ent_financed;	
			$nfinancial_edu_service      = $result->no_stup_ent_financed;	
			$efinancial_sample_service   = $result->no_clsmaple_ent_financed;	
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
				<td>Number of enterprises financed</td>
				<td><?php echo $nfinancial_service; ?></td>
			</tr>
			<tr>
				<td>Number of start-up enterprises financed</td>
				<td><?php echo $nfinancial_edu_service; ?></td>
			</tr>
			<tr>
				<td>Number of clients sampled for enterprise data</td>
				<td><?php echo $efinancial_sample_service; ?></td>
			</tr>		
			
		</tbody>
	</table>
</div>