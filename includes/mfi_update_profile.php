
<?php
$site_url = site_url();
if ( is_user_logged_in() ) { 
	 $user = wp_get_current_user();

	 $user_status = get_user_meta($user->id, 'user_status', true);
	 

?>
	<div class="mfi_edit-profile">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="mfi-user-edit">
				<?php 
						$userid 			= get_current_user_id();
						$user 				= get_user_by('id', $userid);
						$user_email 		= esc_html($user->user_email); 
						$company_name 		= get_user_meta($userid, 'nickname', true);
						$company_location 	= get_user_meta($userid, 'company_location', true);
				        $company_director 	= get_user_meta($userid, 'company_director', true);
					    $company_website 	= get_user_meta($userid, 'website', true);
					    $description 		= get_user_meta($userid, 'description', true);
					    $company_tag 		= get_user_meta($userid, 'company_tag', true);
					    $contact_person 	= get_user_meta($userid, 'contact_person', true);
					    $contact_phone 		= get_user_meta($userid, 'contact_phone', true);
					    $legal_structure 	= get_user_meta($userid, 'legal_structure', true);
					    $data_founded 		= get_user_meta($userid, 'data_founded', true);
					    $owner_structure 	= get_user_meta($userid, 'owner_structure', true);
				 ?>
				<div class="user_reg-from">
					<div class="registartion-form">
					 	<div class="frm-row col2">
							<div class="frm-col">
								<label for="company_name">
									<input type="text" name="user_company_name" id="company_name" placeholder="Company Name" class="input-text" value="<?php echo $company_name; ?>" disabled>	
								</label>		
							</div>
							<div class="frm-col">
								<label for="company_logo">MFI/Investor Logo
									<input type="file" name="user_company_logo" id="company_logo" accept="image/x-png,image/gif,image/jpeg">
								</label>

							</div>
						</div>
						<div class="frm-row col2">
							<div class="frm-col">
								<label for="company_location">
								   <input type="text" name="user_company_location" class="input-text" id="company_location" placeholder="Company Location" value="<?php echo $company_location; ?>">
								</label>
							</div>
							<div class="frm-col">
								<label for="reg_website">
								   <input type="text" name="user_company_web" class="input-text" id="" placeholder="Website" value="<?php echo $company_website; ?>">
								</label>
							</div>
						</div>
						<div class="frm-row col2">
							<div class="frm-col">
								<label for="company_mail">
									<input type="email" name="user_company_mail" id="company_mail" class="input-text" placeholder="Email Address" value="<?php echo $user_email; ?>" disabled>
								</label>
							</div>
							<div class="frm-col">
								<label for="company_director">
								   <input type="text" name="user_company_director" class="input-text" id="company_director" placeholder="Company Director" value="<?php echo $company_director; ?>">
								</label>
							</div>
						</div>
						<div class="frm-row col2">
							<div class="frm-col">
								<label for="contact_person">
									<input type="text" name="contact_person" id="contact_person" class="input-text" placeholder="Contact person (Name and Position)" value="<?php echo $contact_person; ?>">
								</label>
							</div>
							<div class="frm-col">
								<label for="contact_phone">
								   <input type="tel" name="contact_phone" class="input-text" id="contact_phone" placeholder="Contact details (Phone Number)" value="<?php echo $contact_phone; ?>">
								</label>
							</div>
						</div>
						<div class="frm-row col2">
							<div class="frm-col">
								<label for="legal_structure">
									<input type="text" name="legal_structure" id="legal_structure" class="input-text" placeholder="Legal Structure" value="<?php echo $legal_structure; ?>">
								</label>
							</div>
							<div class="frm-col">
								<label for="data_founded">
								   <input type="text" name="data_founded" class="input-text" id="data_founded" placeholder="Data Founded" value="<?php echo $data_founded; ?>">
								</label>
							</div>
						</div>
						<div class="frm-row col2">
							<div class="frm-col">
								<label for="owner_structure">
								   <input type="text" name="owner_structure" class="input-text" id="owner_structure" placeholder="Ownership Structure" value="<?php echo $owner_structure; ?>">
								</label>
							</div>
							<div class="frm-col">
								<label for="password">
								   <input type="text" name="password" class="input-text" id="password" placeholder="Update Password" value="">
								</label>
							</div>
						</div>
						<div class="frm-row col2">
							<div class="frm-col">
								<label for="Comapny_tag">
								<textarea name="user_company_tag" id="Comapny_tag" class="input-textarea" placeholder="Company Tagline"><?php echo $company_tag; ?></textarea>
								</label>
							</div>
							<div class="frm-col">
								<label for="company_description">
								   <textarea name="user_company_description" id="company_description" class="input-textarea" placeholder="Company Description"><?php echo $description; ?>
								   </textarea>
								</label>
							</div>
						</div>
						<div class="frm-row">
							<div class="frm-col">
								<button type="submit" class="edit-info-user" name="user_update_info">Update</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<?php
		if($user_status == 'Accepted' && in_array( 'nfi', (array) $user->roles )){
		?>
		<?php 
			if(isset($_SESSION['mfi_update_msg']) && !empty($_SESSION['mfi_update_msg'])){
				echo $_SESSION['mfi_update_msg'];
			} 
			$_SESSION['mfi_update_msg'] = '';
		?>
		<div class="main-tabs">
			<div class="horizontal-tab">
				<button class="tablinks active" id="mfp" data-tab="mfp">Financial Performance</button>
				<button class="tablinks" id="msp" data-tab="msp">Social Performance</button>
			</div>
			<form action='' method="post" class="mfi-form" enctype="multipart/form-data">
				<div class="update-data-date">
					<div class="date-field">
						<?php 
						$date_data = get_user_meta($userid, 'data_update_date', true); ?>
						<label for="updatedata_date">Date of form data update
							<input type="date" name="updatedata_date" id="updatedata_date" value="<?php echo $date_data; ?>">
						</label>
					</div>
				</div>
				<div class="mfi-forms active" data-content="mfp">
					<div class="market-finance">
						<div class="mfp-left-sidebar">
							<div id="mobile_toggle">
								<img src="<?php echo $site_url ?>/wp-content/uploads/2020/12/angle-arrow-down-1.png">
							</div>
							<ul class="sidebar-links">
								<li data-btn-id="infra" class="active"><span>Staff Data</span></li>
								<li data-btn-id="clients"><span>Clients</span></li>
								<li data-btn-id="products"><span>Products</span></li>
								<li data-btn-id="cre-products"><span>Credit Products</span></li>
								<li data-btn-id="dep-products"><span>Deposit Products</span></li>
								<li data-btn-id="delinquency"><span>Delinquency</span></li>
								<li data-btn-id="non-finance"><span>Non financial services</span></li>
								<li data-btn-id="enter-financed"><span>Enterprises financed</span></li>
								<li data-btn-id="job-creation"><span>Job creation</span></li>
								<li data-btn-id="poverty-outreach"><span>Poverty outreach</span></li>
								<li data-btn-id="balance-sheet"><span>Balance sheet</span></li>
								<li data-btn-id="income-statement"><span>Income statement</span></li>
								<li data-btn-id="portfolio_summary"><span>Portfolio analysis and summary</span></li>
								<li data-btn-id="detail_files" id="detail_file_li"><span>Detail Files</span></li>
								<li data-btn-id="glossary"><span>Glossary</span></li>
							</ul>
						</div>
						<div class="mfp-right-form">
								<div class="form-sec active" data-tab-id="infra">
									<?php include('mfp-update/mfi_infra_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="clients">
									<?php include('mfp-update/mfi_clients_edit.php'); ?>
								</div>						
								<div class="form-sec" data-tab-id="products">
									<?php include('mfp-update/mfi_products_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="cre-products">
									<?php include('mfp-update/mfi_credit_products_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="dep-products">
									<?php include('mfp-update/mfi_deposit_products_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="delinquency">
									<?php include('mfp-update/mfi_delinquency_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="non-finance">
									<?php include('mfp-update/mfi_non_financial_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="enter-financed">
									<?php include('mfp-update/mfi_ent_financial_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="job-creation">
									<?php include('mfp-update/mfi_job_creation_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="poverty-outreach">
									<?php include('mfp-update/mfi_poverty_outreach_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="balance-sheet">
									<?php include('mfp-update/mfi_balance_sheet_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="income-statement">
									<?php include('mfp-update/mfi_income_statement_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="portfolio_summary">
									<?php include('mfp-update/mfi_portfolio_summary_edit.php'); ?>
								</div>

								<div class="form-sec" data-tab-id="detail_files">
									<?php 
										if(isset($_SESSION['file_upload_msg']) && !empty($_SESSION['file_upload_msg'])){
											echo $_SESSION['file_upload_msg'];
										} 
										$_SESSION['file_upload_msg'] = '';
									?>
									<?php include('mfp-update/mfi_detail_files_upload.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="glossary">
									<?php include('mfp-update/mfi_glossary_edit.php'); ?>
								</div>
								<div data-id="btn_mfp_container" class="next-prev-btn">
									<button class="d-none" type="button" data-type="prev_btn">Prev</button>
									<button type="button" data-type="next_btn">Next</button>
								</div>
							
						</div>
					</div>
				</div>
				<div class="mfi-forms" data-content="msp">		
					<div class="market-finance">
						<div class="mfp-left-sidebar">
							<ul class="sidebar-links">
								<li data-btn-id="social-goals" class="active"><span>Social Goals</span></li>
								<li data-btn-id="governance-hr"><span>Governance & HR</span></li>
								<li data-btn-id="products-services"><span>Products & Services</span></li>
								<li data-btn-id="client-protection"><span>Client Protection</span></li>
								<li data-btn-id="environment"><span>Environment</span></li>			
							</ul>
						</div>
						<div class="mfp-right-form">
								<div class="form-sec active" data-tab-id="social-goals">
									<?php include('msp-update/msp_social_goals_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="governance-hr">
									<?php include('msp-update/msp_governance_hr_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="products-services">
									<?php include('msp-update/msp_product_services_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="client-protection">
									<?php include('msp-update/msp_client_protection_edit.php'); ?>
								</div>
								<div class="form-sec" data-tab-id="environment">
									<?php include('msp-update/msp_environment_edit.php'); ?>
								</div>
								<div data-id="btn_container" class="next-prev-btn">
									<button class="d-none" type="button" data-type="prev_btn">Prev</button>
									<button type="button" data-type="next_btn">Next</button>
								</div>
						</div>
					</div>		
					
				</div>

				<div class="sbt-btn-mfp">
					<button type="submit" name="sbt_mfi_details">SUBMIT</button>
				</div>
			</form>
		</div>
		<?php 
 			}else{
				
			}
		 ?>
		
	</div>
	<?php

}
else{
	$site_url = get_site_url();
	echo "login first";
	$login_link = "$site_url/log-in/";
   	header("Location:".$login_link);
   exit();
}
