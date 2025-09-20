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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}msp_social_goals WHERE user_id = $userid", OBJECT );	
//print_r($results); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$target_market    		= json_decode($result->sg_target_market);
			$dev_goal    			= json_decode($result->sg_inst_pursue);
			$poverty_level    		= json_decode($result->sg_pov_level);
			$measure_poverty    	= $result->sg_does_meas_plevel;
			$poverty_tool    		= json_decode($result->sg_tool_meas_plevel);
			
		}
		
		
	}
	//print_r($poverty_tool);

?>

<div class="row-col2">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="field-group">
				<p class="field-for">Which of the following clients represent your target market? Please select a maximum of three.</p>
					<input type="checkbox" id="social_goal_women" name="target_market[]" value="Women" <?php if(in_array('Women',$target_market)){ echo 'checked="checked"';}?> >
	  				<label for="social_goal_women">Women</label><br>

	  				<input type="checkbox" id="social_goal_adolescents" name="target_market[]" value="Adolescents and Youth(below 18)" <?php if(in_array('Adolescents and Youth(below 18)',$target_market)){ echo 'checked="checked"';}?> >
	  				<label for="social_goal_adolescents">Adolescents and Youth(below 18)</label><br>

	  				<input type="checkbox" id="social_goal_clients" name="target_market[]" value="Clients living in urban areas"<?php if(in_array('Clients living in urban areas',$target_market)){ echo 'checked="checked"';}?>>
	  				<label for="social_goal_clients">Clients living in urban areas</label><br>

	  				<input type="checkbox" id="social_goal_clients_rural" name="target_market[]" value="Clients living in rural areas" <?php if(in_array('Clients living in rural areas',$target_market)){ echo 'checked="checked"';}?>>
	  				<label for="social_goal_clients_rural">Clients living in rural areas</label><br>

	  				<input type="checkbox" id="social_goal_none" name="target_market[]" value="None of the above"<?php if(in_array('None of the above',$target_market)){ echo 'checked="checked"';}?>>
	  				<label for="social_goal_none">None of the above</label><br>
	  			</div>
	  			<div class="field-group">
  				<p class="field-for">Which development goals does your institution specifically pursue through its provision of financial and non-financial products and services? Please select a maximum of five.</p>
  					<input type="checkbox" id="dev_goal_finance_access" name="dev_goal[]" value="Incraesed access to financial access"<?php if(in_array('Incraesed access to financial access',$dev_goal)){ echo 'checked="checked"';}?> >
	  				<label for="dev_goal_finance_access">Incraesed access to financial access</label><br>

	  				<input type="checkbox" id="dev_goal_poverty_reduction" name="dev_goal[]" value="Poverty Reduction" <?php if(in_array('Poverty Reduction',$dev_goal)){ echo 'checked="checked"';}?>>
	  				<label for="dev_goal_poverty_reduction">Poverty Reduction</label><br>

	  				<input type="checkbox" id="dev_goal_employment_generation" name="dev_goal[]" value="Employment generation" <?php if(in_array('Employment generation',$dev_goal)){ echo 'checked="checked"';}?>>
	  				<label for="dev_goal_employment_generation">Employment generation</label><br>

	  				<input type="checkbox" id="dev_goal_start_enterprises" name="dev_goal[]" value="Development of start-up enterprises" <?php if(in_array('Development of start-up enterprises',$dev_goal)){ echo 'checked="checked"';}?>>
	  				<label for="dev_goal_start_enterprises">Development of start-up enterprises</label><br>

	  				<input type="checkbox" id="dev_goal_existing_business" name="dev_goal[]" value="Growth of existing Businesses" <?php if(in_array('Growth of existing Businesses',$dev_goal)){ echo 'checked="checked"';}?>>
	  				<label for="dev_goal_existing_business">Growth of existing Businesses</label><br>

	  				<input type="checkbox" id="dev_goal_adult_education" name="dev_goal[]" value="Improvement of adult education" <?php if(in_array('Improvement of adult education',$dev_goal)){ echo 'checked="checked"';}?>>
	  				<label for="dev_goal_adult_education">Improvement of adult education</label><br>

	  				<input type="checkbox" id="dev_goal_youth_opportunities" name="dev_goal[]" value="Youth Opportunities" <?php if(in_array('Youth Opportunities',$dev_goal)){ echo 'checked="checked"';}?>>
	  				<label for="dev_goal_youth_opportunities">Youth Opportunities</label><br>

	  				<input type="checkbox" id="dev_goal_child_schooling" name="dev_goal[]" value="Childrens Schooling" <?php if(in_array('Childrens Schooling',$dev_goal)){ echo 'checked="checked"';}?>>
	  				<label for="dev_goal_child_schooling">Children's Schooling</label><br>

	  				<input type="checkbox" id="dev_goal_health_improve" name="dev_goal[]" value="Health Improvement" <?php if(in_array('Health Improvement',$dev_goal)){ echo 'checked="checked"';}?>>
	  				<label for="dev_goal_health_improve">Health Improvement</label><br>

	  				<input type="checkbox" id="dev_goal_gender_equality" name="dev_goal[]" value="Gender Equality and Women Empowerment" <?php if(in_array('Gender Equality and Women Empowerment',$dev_goal)){ echo 'checked="checked"';}?>>
	  				<label for="dev_goal_gender_equality">Gender Equality and Women Empowerment</label><br>

	  				<input type="checkbox" id="dev_goal_water_sanitation" name="dev_goal[]" value="Water and sanitation"  <?php if(in_array('Water and sanitation',$dev_goal)){ echo 'checked="checked"';}?>>
	  				<label for="dev_goal_water_sanitation">Water and sanitation</label><br>

	  				<input type="checkbox" id="dev_goal_housing" name="dev_goal[]" value="Housing"  <?php if(in_array('Housing',$dev_goal)){ echo 'checked="checked"';}?>>
	  				<label for="dev_goal_housing">Housing</label><br>

	  				<input type="checkbox" id="dev_goal_none_above" name="dev_goal[]" value="None of the Above" <?php if(in_array('None of the Above',$dev_goal)){ echo 'checked="checked"';}?>>
	  				<label for="dev_goal_none_above">None of the Above</label><br>
	  			</div>
	  			<div class="field-group">
	  			<p class="field-for">What is the poverty level of the clients that your institution aims to reach? Please check all that apply:</p>
	  				<input type="checkbox" id="poverty_very_poor" name="poverty_level[]" value="Very poor clients" <?php if(in_array('Very poor clients',$poverty_level)){ echo 'checked="checked"';}?>>
	  				<label for="poverty_very_poor">Very poor clients</label><br>

	  				<input type="checkbox" id="poverty_poor" name="poverty_level[]" value="Poor clients" <?php if(in_array('Poor clients',$poverty_level)){ echo 'checked="checked"';}?>>
	  				<label for="poverty_poor">Poor clients</label><br>

	  				<input type="checkbox" id="poverty_low_income" name="poverty_level[]" value="Low Income clients" <?php if(in_array('Low Income clients',$poverty_level)){ echo 'checked="checked"';}?>>
	  				<label for="poverty_low_income">Low Income clients</label><br>

	  				<input type="checkbox" id="poverty_no_specific" name="poverty_level[]" value="No specific poverty target" <?php if(in_array('No specific poverty target',$poverty_level)){ echo 'checked="checked"';}?>>
	  				<label for="poverty_no_specific">No specific poverty target</label><br>	
	  			</div>

			</div>
			</div>
	<div class="col">
		<div class="form-main-grp">
			<div class="field-group">
				<p class="field-for">Does your institution measure the poverty level of its clients?
				</p>
				<input type="radio" id="measure_poverty" name="measure_poverty" value="yes" <?php if($measure_poverty == 'yes'){ echo 'checked="checked"';}?>>
				<label for="measure_poverty">Yes</label>

				<input type="radio" id="measure_poverty_no" name="measure_poverty" value="no" <?php if($measure_poverty == 'no'){ echo 'checked="checked"';}?>>
				<label for="measure_poverty_no">No</label>

				<input type="radio" id="measure_poverty_unknown" name="measure_poverty" value="unknown"<?php if($measure_poverty == 'unknown'){ echo 'checked="checked"';}?>>
				<label for="measure_poverty_unknown">Unknown</label>
			</div>
			<div class="field-group">
				<p class="field-for">Please indicate which tool(s) your institution uses to measure client poverty:</p>
				<input type="checkbox" id="poverty_tool_ppi" name="poverty_tool[]" value="Grameen progress out of poverty index(PPI)" <?php if(in_array('Grameen progress out of poverty index(PPI)',$poverty_tool)){ echo 'checked="checked"';}?>>
  				<label for="poverty_tool_ppi">Grameen progress out of poverty index(PPI)</label><br>

  				<input type="checkbox" id="poverty_tool_pat" name="poverty_tool[]" value="IRIS/ USAID Poverty Assessment Tool(PAT)" <?php if(in_array('IRIS/ USAID Poverty Assessment Tool(PAT)',$poverty_tool)){ echo 'checked="checked"';}?>>
  				<label for="poverty_tool_pat">IRIS/ USAID Poverty Assessment Tool(PAT)</label><br>

  				<input type="checkbox" id="poverty_tool_household_income" name="poverty_tool[]" value="Per Capita household Income" <?php if(in_array('Per Capita household Income',$poverty_tool)){ echo 'checked="checked"';}?>>
  				<label for="poverty_tool_household_income">Per Capita household Income</label><br>

  				<input type="checkbox" id="poverty_tool_household_expenditure" name="poverty_tool[]" value="Per Capita household expenditure" <?php if(in_array('Per Capita household expenditure',$poverty_tool)){ echo 'checked="checked"';}?>>
  				<label for="poverty_tool_household_expenditure">Per Capita household expenditure</label><br>

  				<input type="checkbox" id="poverty_tool_household_pwr" name="poverty_tool[]" value="Participatry wealth ranking(PWR)" <?php if(in_array('Participatry wealth ranking(PWR)',$poverty_tool)){ echo 'checked="checked"';}?>>
  				<label for="poverty_tool_household_pwr">Participatry wealth ranking(PWR)</label><br>

  				<input type="checkbox" id="poverty_tool_household_index" name="poverty_tool[]" value="Housing Index" <?php if(in_array('Housing Index',$poverty_tool)){ echo 'checked="checked"';}?>>
  				<label for="poverty_tool_household_index">Housing Index</label><br>

  				<input type="checkbox" id="poverty_tool_food_index" name="poverty_tool[]" value="Food Security Index" <?php if(in_array('Food Security Index',$poverty_tool)){ echo 'checked="checked"';}?>>
  				<label for="poverty_tool_food_index">Food Security Index</label><br>

  				<input type="checkbox" id="poverty_tool_means_test" name="poverty_tool[]" value="Means test" <?php if(in_array('Means test',$poverty_tool)){ echo 'checked="checked"';}?>>
  				<label for="poverty_tool_means_test">Means test</label><br>

  				<input type="checkbox" id="poverty_tool_proxy" name="poverty_tool[]" value="Own proxy poverty index" <?php if(in_array('Own proxy poverty index',$poverty_tool)){ echo 'checked="checked"';}?>>
  				<label for="poverty_tool_proxy">Own proxy poverty index</label><br>	

  				<input type="checkbox" id="poverty_tool_none_above" name="poverty_tool[]" value="None of the above" <?php if(in_array('None of the above',$poverty_tool)){ echo 'checked="checked"';}?>>
  				<label for="poverty_tool_none_above">None of the above</label><br>	
  			</div>
		</div>
	</div>
</div>
