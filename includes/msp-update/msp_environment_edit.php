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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}msp_environment WHERE user_id = $userid", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$environmental_policies    		= json_decode($result->env_policies);
			$environmental_friendly    		= json_decode($result->env_products);
			
		}
		
		
	}
	//print_r($environmental_friendly);

?>
<div class="row-col">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="field-group">
				<p class="field-for">Please indicate whether you have any of the following environmental policies in place:</p>
					<input type="checkbox" id="environmental_policies1" name="environmental_policies[]" value="The institution conducts activities related to raising awareness of environment impacts, such as:running training sessions and discussions, displaying posters, distributinf flyers, etc." <?php if(in_array('The institution conducts activities related to raising awareness of environment impacts, such as:running training sessions and discussions, displaying posters, distributinf flyers, etc.',$environmental_policies)){ echo 'checked="checked"';}?>>
	  				<label for="environmental_policies1">The institution conducts activities related to raising awareness of environment impacts, such as:running training sessions and discussions, displaying posters, distributinf flyers, etc.</label><br>

	  				<input type="checkbox" id="environmental_policies2" name="environmental_policies[]" value="The Instituion includes clauses in loan contracts that require clients to improve environmental practices/ mitigate environmental risks." <?php if(in_array('The Instituion includes clauses in loan contracts that require clients to improve environmental practices/ mitigate environmental risks.',$environmental_policies)){ echo 'checked="checked"';}?>>
	  				<label for="environmental_policies2">The Instituion includes clauses in loan contracts that require clients to improve environmental practices/ mitigate environmental risks.</label><br>

	  				<input type="checkbox" id="environmental_policies3" name="environmental_policies[]" value="The Instituion uses specific tools to evaluate the environmental risks of clients activities(categorizing client risk level by sector, surveying environmental impacts, uses of an exclusion list, etc.)" <?php if(in_array('The Instituion uses specific tools to evaluate the environmental risks of clients activities(categorizing client risk level by sector, surveying environmental impacts, uses of an exclusion list, etc.)',$environmental_policies)){ echo 'checked="checked"';}?>>
	  				<label for="environmental_policies3">The Instituion uses specific tools to evaluate the environmental risks of client's activities(categorizing client risk level by sector, surveying environmental impacts, uses of an exclusion list, etc.)</label><br>

	  				<input type="checkbox" id="environmental_policies5" name="environmental_policies[]" value="The Instituion offers specific loans linked to environmentally friendly products and/ or practces." <?php if(in_array('The Instituion offers specific loans linked to environmentally friendly products and/ or practces.',$environmental_policies)){ echo 'checked="checked"';}?>>
	  				<label for="environmental_policies5">The Instituion offers specific loans linked to environmentally friendly products and/ or practces.</label><br>

	  				<input type="checkbox" id="environmental_policies4" name="environmental_policies[]" value="None of the above" <?php if(in_array('None of the above',$environmental_policies)){ echo 'checked="checked"';}?>>
	  				<label for="environmental_policies4">None of the above</label><br> 				  				
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate the types of environmentally friendly products and/or practices for which your institution offers specific loans:</p>
					<input type="checkbox" id="environmental_friendly1" name="environmental_friendly[]" value="Products related to renewable energy(e.g. solar panels, biogas digesters, etc.)" <?php if(in_array('Products related to renewable energy(e.g. solar panels, biogas digesters, etc.)',$environmental_friendly)){ echo 'checked="checked"';}?>>
	  				<label for="environmental_friendly1">Products related to renewable energy(e.g. solar panels, biogas digesters, etc.)</label><br>

	  				<input type="checkbox" id="environmental_friendly2" name="environmental_friendly[]" value="Products related to energy efficiency (e.g. insulation, improved cooked stoves, etc.)" <?php if(in_array('Products related to energy efficiency (e.g. insulation, improved cooked stoves, etc.)',$environmental_friendly)){ echo 'checked="checked"';}?>>
	  				<label for="environmental_friendly2">Products related to energy efficiency (e.g. insulation, improved cooked stoves, etc.)</label><br>

	  				<input type="checkbox" id="environmental_friendly3" name="environmental_friendly[]" value="Environmetally friendly practices of products related to environmentally friendly practices(e.g. organic farming, recycling, waste management, agroforestry or silvopasture, clean water, etc.)" <?php if(in_array('Environmetally friendly practices of products related to environmentally friendly practices(e.g. organic farming, recycling, waste management, agroforestry or silvopasture, clean water, etc.)',$environmental_friendly)){ echo 'checked="checked"';}?>>
	  				<label for="environmental_friendly3">Environmetally friendly practices of products related to environmentally friendly practices(e.g. organic farming, recycling, waste management, agroforestry or silvopasture, clean water, etc.)</label><br>  				
	  				<input type="checkbox" id="environmental_friendly4" name="environmental_friendly[]" value="None of the above" <?php if(in_array('None of the above',$environmental_friendly)){ echo 'checked="checked"';}?>>
	  				<label for="environmental_friendly4">None of the above</label><br> 				  				
			</div>			
			
		</div>
	</div>
</div>