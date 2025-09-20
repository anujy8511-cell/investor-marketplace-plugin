<?php 
      $siteurl = site_url();

      $args = array(
	        'role__in'      =>  array('nfi'),
	        'orderby'       =>  'id',
	        'order'         => 'DESC',
	        'meta_query' => array(
	                array(
	                    'key'     => 'user_status',
	                    'value'   => 'Accepted',
	                    'compare' => '='
	                )
	        )
	    );
	    $blogusers = get_users( $args );
	    // $args['role__in'] = array('nfi');
	    $args['meta_query'][0]['value'] = 'Pending';
	    $blogusers1 = get_users( $args );
	    // $args['role__in'] = array('nfi');
	    $args['meta_query'][0]['value'] = 'Rejected';
	    $blogusers2 = get_users( $args );
	    $args['role__in'] = array('investor');
	    $args['meta_query'][0]['value'] = 'Rejected';
	    $blogusers3 = get_users( $args );
	    // $args['role__in'] = array('investor');
	    $args['meta_query'][0]['value'] = 'Accepted';
	    $blogusers4 = get_users( $args );
	      $args['meta_query'][0]['value'] = 'Pending';
	    $blogusers5 = get_users( $args );

	    //print_r(expression)

	    // Array of WP_User objects.
	    $approved_mfi 		= count($blogusers);
	    $pending_mfi 		= count($blogusers1);
	    $rejected_mfi 		= count($blogusers2);
	    $rejected_investor 	= count($blogusers3);
	    $approved_investor 	= count($blogusers4);
	    $pending_investor 	= count($blogusers5);
	    $pending_img_imf = esc_url( plugins_url( 'User-Investor/images/pen-mfi.png', dirname(FILE) ) );
	    $approve_img_imf = esc_url( plugins_url( 'User-Investor/images/app-mfi.png', dirname(FILE) ) );
	    $reject_img_imf = esc_url( plugins_url( 'User-Investor/images/reject-mfi.png', dirname(FILE) ) );
	    $pending_img_investor = esc_url( plugins_url( 'User-Investor/images/pen-inv.png', dirname(FILE) ) );
	    $approve_img_investor = esc_url( plugins_url( 'User-Investor/images/accept-inv.png', dirname(FILE) ) );
	    $reject_img_investor = esc_url( plugins_url( 'User-Investor/images/reject-imv.png', dirname(FILE) ) );
	   //if(!empty($blogusers)){}
 ?>
<div class="welcome_admin_dash">
	<h1>Welcome to the Admin Dashboard</h1>
	<!-- <a href="<?php echo $siteurl; ?>/mfi-edit-profile" target="_blank">Go to Edit Your Profile</a> -->
	<div class="dashboard-block">
		<div class="blocks-row-mfi">
			<div class="blocks-col pending-mfi" style="background-image: url('<?php echo $pending_img_imf; ?>')">
				<p class="user-status-name">
					Total Pending MFIs Applicants
				</p>
				<p class="total-count"><?php echo $pending_mfi; ?></p>
				<div class="explore-more-btn">
					<a href="<?php echo $siteurl; ?>/wp-admin/admin.php?page=pending_mfi">MORE >></a>
				</div>

			</div>
			<div class="blocks-col approve-mfi" style="background-image: url('<?php echo $approve_img_imf; ?>')">
				<p class="user-status-name">
					Total Approved MFIs
				</p>
				<p class="total-count"><?php echo $approved_mfi; ?></p>
				<div class="explore-more-btn">
					<a href="<?php echo $siteurl; ?>/wp-admin/admin.php?page=approved_mfi">MORE >></a>
				</div>
			</div>
			<div class="blocks-col reject-mfi" style="background-image: url('<?php echo $reject_img_imf; ?>')">
				<p class="user-status-name">
					Total Rejected MFIs Applicants
				</p>
				<p class="total-count"><?php echo $rejected_mfi; ?></p>
				<div class="explore-more-btn">
					<a href="<?php echo $siteurl; ?>/wp-admin/admin.php?page=rejected_mfi">MORE >></a>
				</div>
			</div>
		</div>
		<div class="blocks-row-investor">
			<div class="blocks-col pending-investor" style="background-image: url('<?php echo $pending_img_investor; ?>')">
				<p class="user-status-name">
					Total Pending Investors Applicants
				</p>
				<p class="total-count"><?php echo $pending_investor; ?></p>
				<div class="explore-more-btn">
					<a href="<?php echo $siteurl; ?>/wp-admin/admin.php?page=pending_investors">MORE >></a>
				</div>

			</div>
			<div class="blocks-col approve-investor" style="background-image: url('<?php echo $approve_img_investor; ?>')">
				<p class="user-status-name">
					Total Approved Investors
				</p>
				<p class="total-count"><?php echo $approved_investor; ?></p>
				<div class="explore-more-btn">
					<a href="<?php echo $siteurl; ?>/wp-admin/admin.php?page=approved_investors">MORE >></a>
				</div>
			</div>
			<div class="blocks-col reject-investor" style="background-image: url('<?php echo $reject_img_investor; ?>')">
				<p class="user-status-name">
					Total Rejected Investors Applicants
				</p>
				<p class="total-count"><?php echo $rejected_investor; ?></p>
				<div class="explore-more-btn">
					<a href="<?php echo $siteurl; ?>/wp-admin/admin.php?page=rejected_investors">MORE >></a>
				</div>
			</div>
		</div>
	</div>
</div>