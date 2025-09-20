<?php 
 	$siteurl = get_site_url();
 	$current_user_id = get_current_user_id();
 	$user_meta=get_userdata($current_user_id);
	$user_roles=$user_meta->roles; 
	//echo $user_roles[0];
 ?>
<div class="mfi_search_form">
	<div class="header-txt">
		<h2 class="text-center">Compare MFIs</h2>
		<p class="text-center">“This provides you with the tools to compare the performance of financial institutions. You are also able to specify the criteria/quality of institutions that you are looking for”</p>
	</div>
	<div></div>
</div>
<div class="compare-main-sec">
	<?php

		$args = array(
		    'role'    => 'nfi',
		    'orderby' => 'title',
		    'order'   => 'ASC'
		);
		$users = get_users( $args );
		
		$first_mfi = '';
		if(isset($_POST['first_mfi'])){
			$first_mfi 		= $_POST['first_mfi'];
		}else if(isset($_SESSION['add_compare_mfi'][0])){
			$first_mfi 		= $_SESSION['add_compare_mfi'][0];
		}

		$second_mfi = '';
		if(isset($_POST['first_mfi'])){
			$second_mfi 	= $_POST['second_mfi'];
		}else if(isset($_SESSION['add_compare_mfi'][1])){
			$second_mfi 	= $_SESSION['add_compare_mfi'][1];
		}
		//print_r($_SESSION['add_compare_mfi']);
		
		
		$first_mfi_logo = get_user_meta($first_mfi, 'wp_user_avatar', true);
		$first_avatar_url = wp_get_attachment_url($first_mfi_logo);
		$second_mfi_logo = get_user_meta($second_mfi, 'wp_user_avatar', true);
		$second_avatar_url = wp_get_attachment_url($second_mfi_logo);
		// echo $first_mfi;
		// echo $second_mfi;
		global $wpdb;
		$firsttable = $wpdb->prefix.'mfp_balance_sheet';
		$secondtable = $wpdb->prefix.'mfp_credit_products';
		$firstusers = $wpdb->get_results(
			    "SELECT * " .
			    "FROM $firsttable AS ft " .
			    "LEFT JOIN $secondtable AS st ON ft.user_id = st.user_id " .
			    "WHERE ft.user_id = $first_mfi"
			); 
		foreach ($firstusers as $user) {
			$total_outstanding 	= $user->no_loan_outs_cproduct;
			$total_bal_sheet 	= $user->total_bal_sheet_bal;
			$total_portfolio 	= $user->total_portfolio_bal; 
			$growth_portfolio 	= $user->growth_portfolio_bal; 	
			$par_reschedule 	= $user->par30_resch_bal; 
			$write_off  		= $user->write_off_bal; 
			$net_income 		= $user->net_income_bal; 
			$opself_sufficiency = $user->op_self_suff_bal; 
			$debt_equity 		= $user->debt_bal; 
			$number_borrowers 	= $user->no_borrw_bal; 
			//echo $total_outstanding;
		}
		$secondusers = $wpdb->get_results(
			    "SELECT * " .
			    "FROM $firsttable AS ft " .
			    "LEFT JOIN $secondtable AS st ON ft.user_id = st.user_id " .
			    "WHERE ft.user_id = $second_mfi"
			); 
		foreach ($secondusers as $user_sec) {
			$total_outstanding_sec 	= $user_sec->no_loan_outs_cproduct;
			$total_bal_sheet_sec 	= $user_sec->total_bal_sheet_bal;
			$total_portfolio_sec 	= $user_sec->total_portfolio_bal; 
			$growth_portfolio_sec 	= $user_sec->growth_portfolio_bal; 	
			$par_reschedule_sec 	= $user_sec->par30_resch_bal; 
			$write_off_sec  		= $user_sec->write_off_bal; 
			$net_income_sec 		= $user_sec->net_income_bal; 
			$opself_sufficiency_sec = $user_sec->op_self_suff_bal; 
			$debt_equity_sec 		= $user_sec->debt_bal; 
			$number_borrowers_sec 	= $user_sec->no_borrw_bal; 
			//echo $total_outstanding;
		}
		

	?>
	<form method="post" id="compare_from" action=" " name="">
		<table class="compare-table">
			<tbody>

				<tr class="select-box-row">
					<td></td>
					<td>
						<select id="com_selct1" name="first_mfi">
							<option>Select First MFI</option>
							<?php 
	 							foreach ( $users as $user ) {
	 								$select_user_id = esc_html( $user->ID );
	 								$selected1 = '';
	 								if($first_mfi == $select_user_id)
	 									$selected1 = 'selected="selected"';

	 								echo '<option value="'.$select_user_id.'" '.$selected1.'>'. esc_html( $user->display_name ) .'</option>';
	 							}
							 ?>
						</select>
					</td>
					<td>
						<select id="com_selct2" name="second_mfi">
							<option>Select Second MFI</option>
							<?php 
	 							foreach ( $users as $user ) {
	 								$select_user_id = esc_html( $user->ID );

	 								$selected = '';
	 								if($second_mfi == $select_user_id)
	 									$selected = 'selected="selected"';

	 								echo '<option value="'. $select_user_id .'" '.$selected.'>'. esc_html( $user->display_name ) .'</option>';
	 							}
							 ?>
						</select>
					</td>
				</tr>
				<tr class="image-row">
					<td></td>
					<td><img src="<?php echo $first_avatar_url; ?>" class="user-img"></td>
					<td><img src="<?php echo $second_avatar_url; ?>" class="user-img"></td>
				</tr>
				<tr>
					<td>Total Outstanding Loan Balance</td>
					<td><?php echo $total_outstanding; ?></td>
					<td><?php echo $total_outstanding_sec; ?></td>
				</tr>
				<tr>
					<td>Total Balance Sheet</td>
					<td><?php echo $total_bal_sheet; ?></td>
					<td><?php echo $total_bal_sheet_sec; ?></td>
				</tr>
				<tr>
					<td>Total Portfolio</td>
					<td><?php echo $total_portfolio; ?></td>
					<td><?php echo $total_portfolio_sec; ?></td>
				</tr>
				<tr>
					<td>% Growth portfolio</td>
					<td><?php echo $growth_portfolio; ?></td>
					<td><?php echo $growth_portfolio_sec; ?></td>
				</tr>
				<tr>
					<td>PAR 30 + Rescheduled</td>
					<td><?php echo $par_reschedule; ?></td>
					<td><?php echo $par_reschedule_sec; ?></td>
				</tr>
				<tr>
					<td>Write off</td>
					<td><?php echo $write_off; ?></td>
					<td><?php echo $write_off_sec; ?></td>
				</tr>
				<tr>
					<td>Net Income</td>
					<td><?php echo $net_income; ?></td>
					<td><?php echo $net_income_sec; ?></td>
				</tr>
				<tr>
					<td>Operational Self Sufficiency</td>
					<td><?php echo $opself_sufficiency; ?></td>
					<td><?php echo $opself_sufficiency_sec; ?></td>
				</tr>
				<tr>
					<td>Debt/ Equity</td>
					<td><?php echo $debt_equity; ?></td>
					<td><?php echo $debt_equity_sec; ?></td>
				</tr>
				<tr>
					<td>Number of Borrowers</td>
					<td><?php echo $number_borrowers; ?></td>
					<td><?php echo $number_borrowers_sec; ?></td>
				</tr>
			</tbody>
		</table>
	</form>
</div>


<!-- <script type="text/javascript">
	var ajaxurl = "<?php //echo admin_url('admin-ajax.php'); ?>";
	$(document).ready(function(){
		var mfi_from = '';
		$(document).on('click','#com_selct1', function(){
			var mfi_from = $(this).val();
			//console.log(mfi_from);
		});
		$(document).on('click','#com_selct2', function(){
			var mfi_to = $(this).val();
			//console.log(conceptName);
		});
		$.ajax({
			url: ajaxurl,
			type: "POST",
			data: {action:'selected_mfi', mfi_from: mfi_from, mfi_to: mfi_to},
			success: function(res){
			 //$('.discover_results').html(res);
			 console.log(res);
			 
			}
				
		});
	});
</script> -->
<script type="text/javascript">
	jQuery(document).ready(function($){
		$(document).on('change','#com_selct1, #com_selct2', function(){
			$('#compare_from').submit();
		});
	});
</script>