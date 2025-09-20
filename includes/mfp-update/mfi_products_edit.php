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
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mfp_products WHERE user_id = $userid", OBJECT );	
//print_r($result->s); die();
	if(!empty($results)){
		foreach ($results as $key => $result) {
			$product_trans       		= $result->no_trans_product;	
			$product_channel_agent      = $result->nt_agents_products;	
			$product_channel_atms       = $result->nt_atms_products;	
			$product_channel_internet   = $result->nt_internet_products;	
			$product_channel_mbank      = $result->nt_mob_bank_products;	
			$product_channel_mpos       = $result->nt_mer_pos_products;	
			$product_channel_rstaff     = $result->nt_rov_staff_products;	
			$product_channel_sbranches  = $result->nt_sub_branch_products;	
			$product_nira       		= $result->value_trans_product;	
			$product_nira_agent       	= $result->vt_agents_products;	
			$product_nira_atms       	= $result->vt_atms_products;	
			$product_nira_internet      = $result->vt_internet_products;	
			$product_nira_mbank       	= $result->vt_mob_bank_products;	
			$product_nira_mpos       	= $result->vt_mer_pos_products;	
			$product_nira_rstaff       	= $result->vt_rov_staff_products;	
			$product_nira_sbranches     = $result->vt_sub_branch_products;	
			
			
		}
	}

?>
<div class="row-col2">
	<div class="col">
		<div class="form-main-grp">
			<!-- <p class="form-title">Number of Active Borrowers clients</p> -->
			<div class="field-group">
				<label for="product_trans">Number of transactions
					<input type="text" value="<?php echo $product_trans; ?>" name="product_trans" id="product_trans">
				</label>
				<p class="field-for">Delivery channels</p>
				<label for="product_channel_agent">Agents
					<input type="text" value="<?php echo $product_channel_agent; ?>" name="product_channel_agent" id="product_channel_agent">
				</label>
				<label for="product_channel_atms">ATM's
					<input type="text" value="<?php echo $product_channel_atms; ?>" name="product_channel_atms" id="product_channel_atms">
				</label>
				<label for="product_channel_internet">Internet
					<input type="text" value="<?php echo $product_channel_internet; ?>" name="product_channel_internet" id="product_channel_internet">
				</label>
				<label for="product_channel_mbank">Mobile Banking
					<input type="text" value="<?php echo $product_channel_mbank; ?>" name="product_channel_mbank" id="product_channel_mbank">
				</label>
				<label for="product_channel_mpos">Merchant POS
					<input type="text" value="<?php echo $product_channel_mpos; ?>" name="product_channel_mpos" id="product_channel_mpos">
				</label>
				<label for="product_channel_rstaff">Roving Staff
					<input type="text" value="<?php echo $product_channel_rstaff; ?>" name="product_channel_rstaff" id="product_channel_rstaff">
				</label>
				<label for="product_channel_sbranches">Sub Branches
					<input type="text" value="<?php echo $product_channel_sbranches; ?>" name="product_channel_sbranches" id="product_channel_sbranches">
				</label>
			</div>
		</div>
	</div>
	<div class="col">									
		<div class="form-main-grp">
			<!-- <p class="form-title">Value of transactions (Nira)</p> -->
			<div class="field-group">
				<label for="product_nira">Value OF TRANSACTIONS (Naira)
					<input type="text" value="<?php echo $product_nira; ?>" name="product_nira" id="product_nira">
				</label>
				<p class="field-for">Delivery channels</p>
				<label for="product_nira_agent">Agents
					<input type="text" value="<?php echo $product_nira_agent; ?>" name="product_nira_agent" id="product_nira_agent">
				</label>
				<label for="product_nira_atms">ATM's
					<input type="text" value="<?php echo $product_nira_atms; ?>" name="product_nira_atms" id="product_nira_atms">
				</label>
				<label for="product_nira_internet">Internet
					<input type="text" value="<?php echo $product_nira_internet; ?>" name="product_nira_internet" id="product_nira_internet">
				</label>
				<label for="product_nira_mbank">Mobile Banking
					<input type="text" value="<?php echo $product_nira_mbank; ?>" name="product_nira_mbank" id="product_nira_mbank">
				</label>
				<label for="product_nira_mpos">Merchant POS
					<input type="text" value="<?php echo $product_nira_mpos; ?>" name="product_nira_mpos" id="product_nira_mpos">
				</label>
				<label for="product_nira_rstaff">Roving Staff
					<input type="text" value="<?php echo $product_nira_rstaff; ?>" name="product_nira_rstaff" id="product_nira_rstaff">
				</label>
				<label for="product_nira_sbranches">Sub Branches
					<input type="text" value="<?php echo $product_nira_sbranches; ?>" name="product_nira_sbranches" id="product_nira_sbranches">
				</label>
			</div>
		</div>
	</div>
</div>