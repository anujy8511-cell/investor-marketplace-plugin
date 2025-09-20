<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_poverty_outreach WHERE user_id = $user_id", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$poverty_measure       		= $result->no_worker_poverty;	
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
				<td>Number of clients sampled for poverty measurement</td>
				<td><?php echo $poverty_measure; ?></td>
			</tr>		
			
		</tbody>
	</table>
</div>