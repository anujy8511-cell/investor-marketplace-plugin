<?php $site_url = site_url(); ?>
<section class="profile-view">
	<div class="main-tabs">
		<div class="horizontal-tab">
			<button class="tablinks active" id="mfp" data-tab="mfp">Financial Performance</button>
			<button class="tablinks" id="msp" data-tab="msp">Social Performance</button>
			<div class="time-data">
				<?php 
				//echo $user_id;
				$date_data = get_user_meta($user_id, 'data_update_date', true);
				echo '<p>'.$date_data.'</p>';
				?>

			</div>
		</div>			
			<div class="mfi-forms active" data-content="mfp">
				<div class="market-finance">
					<div class="mfp-left-sidebar">
						<div id="mobile_toggle">
							<?php //echo $site_url; ?>
							<img src="<?php echo $site_url; ?>/wp-content/uploads/2020/12/angle-arrow-down-1.png">
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
							<li data-btn-id="portfolio-analysis"><span>Portfolio Analysis and Summary</span></li>
							<li data-btn-id="details-files"><span>Download Data Files</span></li>
							<li data-btn-id="glossary"><span>Glossary</span></li>
						</ul>
					</div>
					<div class="mfp-right-form">
							<div class="form-sec active" data-tab-id="infra">
								<?php include('includes/infrastructure-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="clients">
								<?php include('includes/clients-details.php'); ?>
							</div>						
							<div class="form-sec" data-tab-id="products">
								<?php include('includes/products-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="cre-products">
								<?php include('includes/credit-products-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="dep-products">
								<?php include('includes/deposit-products-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="delinquency">
								<?php include('includes/deliquency-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="non-finance">
								<?php include('includes/non-financial-services-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="enter-financed">
								<?php include('includes/enterprise-financed-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="job-creation">
								<?php include('includes/job-creation-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="poverty-outreach">
								<?php include('includes/poverty-outreach-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="balance-sheet">
								<?php include('includes/balance-sheet-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="income-statement">
								<?php include('includes/income-statement-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="portfolio-analysis">
								<?php include('includes/portfolio_analysis-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="details-files">
								<?php include('includes/data_files-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="glossary">
								<?php include('includes/glossary-details.php'); ?>
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
								<?php include('includes/social-goals-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="governance-hr">
								<?php include('includes/governance-hr-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="products-services">
								<?php include('includes/product-and-services-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="client-protection">
								<?php include('includes/client-protection-details.php'); ?>
							</div>
							<div class="form-sec" data-tab-id="environment">
								<?php include('includes/environment-details.php'); ?>
							</div>
					</div>
				</div>		
				
			</div>
	</div>
</section>
