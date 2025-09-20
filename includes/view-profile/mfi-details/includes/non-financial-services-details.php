<?php
$userid = get_current_user_id();
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_non_financial_service WHERE user_id = $user_id", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$nfinancial_service       = $result->ent_so_non_fs;	
			$nfinancial_edu_service      = $result->edu_so_non_fs;	
			$nfinancial_women_service    = $result->women_eso_non_fs;	
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
				<td>Number of Enterprises services Outreach</td>
				<td><?php echo $nfinancial_service; ?></td>
			</tr>
			<tr>
				<td>Number of Education services outreach</td>
				<td><?php echo $nfinancial_edu_service; ?></td>
			</tr>
			<tr>
				<td>Number of empowerment services outreach</td>
				<td><?php echo $nfinancial_women_service; ?></td>
			</tr>		
			
		</tbody>
	</table>
</div>