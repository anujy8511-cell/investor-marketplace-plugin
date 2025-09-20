<?php 
 


	
	add_action('wp_footer', 'ingrate_slider_script');
	function ingrate_slider_script(){
		?>
		
		<script type="text/javascript">
			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
			//var siteurl = themeobj.siteurl;
			//var ajaxurl = themeobj.ajaxurl;
			var myarray = new Object;
			$.fn.commaSeprate = function(min_max) {
				// console.log(min_max);
				min_max = min_max+'';
				// console.log(min_max);
				let comma_value = min_max.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				// console.log(comma_value);
				return comma_value;
			}
			$.fn.my_ajax = function(e,handle, event){
				let min = parseInt($(e).parent().find('.filter__input:first-child').text().replace(/,/g, ''));
				let max = parseInt($(e).parent().find('.filter__input:nth-child(2)').text().replace(/,/g, ''));
				
				
				var slidername 		= $(e).attr('data-slider_id');
				var combine_val 	= min+'_'+max;
				// console.log(combine_val);
				$(e).parent().find('.filter__input:first-child').text($.fn.commaSeprate(min));
				$(e).parent().find('.filter__input:nth-child(2)').text($.fn.commaSeprate(max));

        		myarray[slidername] = combine_val;
        		
				// console.log(min+'-------'+max);
			// console.log(myarray);
			// console.log(myarray.length);
			console.log(Object.keys(myarray).length);
				if(Object.keys(myarray).length == 9) {
					$.ajax({
						url: ajaxurl,
						type: "POST",
						data: {action:'filter_amount_search', filter_amount_data: myarray},
						success: function(res1){
							console.log(res1);
							console.log(e);
						 $('.discover_results').html(res1);
						 
						}
							
					});
				}
				
			}
			console.log("out"+myarray);
			var slider = $('[data-slider_id]');
		 	//const slider = document.getElementById('sliderPrice');
			
			// const filterInputs = document.querySelectorAll('input.filter__input');
			// const filterInputs = document.querySelectorAll('.filter__input');
			//const filterInputs = $('.filter__input');
			// console.log(filterInputs);
			slider.each(function(i,e) {
				let rangeMin = parseInt($(e).attr('data-min'));
				let rangeMax = parseInt($(e).attr('data-max'));
				let step = parseInt($(e).attr('data-step'));
				noUiSlider.create(e, {
				    start: [rangeMin, rangeMax],
				    connect: true,
				    step: step,
				    range: {
				        'min': rangeMin,
				        'max': rangeMax
				    },
				  
				    // make numbers whole
				    format: {
				      to: value => value,
				      from: value => value
				    }
				});
				var ttt = '';

				e.noUiSlider.on('update', (values, handle) => {
					// console.log(values);
					// console.log(handle);
				  	$($(e).parent().find('.filter__input')[handle]).html(values[handle]);
				  		if(ttt == '') {
				  			ttt = 'ttt';
				  		} else {
				  			//console.log('ok');
				  			$.fn.my_ajax(e,handle);
					  	}
				});

			});
			// $.fn.my_ajax(e,handle, 'onload');

			// bind inputs with noUiSlider 
			

			// filterInputs.forEach((input, indexInput) => { 
			//   input.addEventListener('change', () => {
			//     slider.noUiSlider.setHandle(indexInput, input.value);
			//   })
			// });


 		</script>
		<?php
	}
	$site_url = get_site_url();

 ?>
 
<div class="mfi_search_form">
	<div class="header-txt">
		<h2 class="text-center">Discover MFIs</h2>
		<p class="text-center">“This provides you with the tools to compare the performance of financial institutions. You are also able to specify the criteria/quality of institutions that you are looking for”</p>
	</div>
	<div></div>
</div>
</div>
</div>
<div class="search-section">
	<div class="section_wrapper">
		<div class="the_content_wrapper">
			<div class="discover-btn">
				<a href="<?php echo $site_url; ?>/compare-mfi/" class="mfi_comp-btn">Compare MFI</a>
			</div>
			<p></p>
			<div class="search-row">
				<aside class="left-side-col">
					<div class="discover_options">
						<div class="d-option">
							<p>Total Outstanding Loan Balance</p>
						</div>
						<div class="filter">
						  <span class="filter__input"></span>-<span class="filter__input"></span>

						  <div data-slider_id="sliderPrice1" class="filter__slider-price" data-min="100000" data-max="900000000" data-step="5"></div>
						</div>
					</div>
					<div class="discover_options">
						<div class="d-option">
							<p>Total Balance Sheet</p>
						</div>
						<div class="filter">
						  <span class="filter__input"></span>-<span class="filter__input"></span>

						  <div data-slider_id="sliderPrice2" class="filter__slider-price" data-min="100000" data-max="980000000" data-step="5"></div>
						</div>
					</div>
					<!-- <div class="discover_options">
						<div class="d-option">
							<p>Total Portfolio</p>
						</div>
						<div class="filter">
						  <span class="filter__input"></span>-<span class="filter__input"></span>

						  <div data-slider_id="sliderPrice3" class="filter__slider-price" data-min="0" data-max="100" data-step="5"></div>
						</div>
					</div> -->
					<div class="discover_options">
						<div class="d-option">
							<p>Growth Portfolio (%)</p>
						</div>
						<div class="filter">
						  <span class="filter__input"></span>-<span class="filter__input"></span>

						  <div data-slider_id="sliderPrice4" class="filter__slider-price" data-min="0" data-max="100" data-step="1"></div>
						</div>
					</div>
					<div class="discover_options">
						<div class="d-option">
							<p>PAR30+Rescheduled</p>
						</div>
						<div class="filter">
						  <span class="filter__input"></span>-<span class="filter__input"></span>

						  <div data-slider_id="sliderPrice5" class="filter__slider-price" data-min="100000" data-max="900000000" data-step="5"></div>
						</div>
					</div>
					<div class="discover_options">
						<div class="d-option">
							<p>Write Off</p>
						</div>
						<div class="filter">
						  <span class="filter__input"></span>-<span class="filter__input"></span>

						  <div data-slider_id="sliderPrice6" class="filter__slider-price" data-min="100000" data-max="500000" data-step="5"></div>
						</div>
					</div>
					<div class="discover_options">
						<div class="d-option">
							<p>Net Income</p>
						</div>
						<div class="filter">
						  <span class="filter__input"></span>-<span class="filter__input"></span>

						  <div data-slider_id="sliderPrice7" class="filter__slider-price" data-min="100000" data-max="980000000 " data-step="5"></div>
						</div>
					</div>
					<div class="discover_options">
						<div class="d-option">
							<p>Operational Self Sufficiency (%)</p>
						</div>
						<div class="filter">
						  <span class="filter__input"></span>-<span class="filter__input"></span>

						  <div data-slider_id="sliderPrice8" class="filter__slider-price" data-min="0" data-max="100" data-step="5"></div>
						</div>
					</div>
					<div class="discover_options">
						<div class="d-option">
							<p>Debt/ Equity (%)</p>
						</div>
						<div class="filter">
						  <span class="filter__input"></span>-<span class="filter__input"></span>

						  <div data-slider_id="sliderPrice9" class="filter__slider-price" data-min="0" data-max="100" data-step="5"></div>
						</div>
					</div>
					<div class="discover_options">
						<div class="d-option">
							<p>Number of Borrowers (Numbers)</p>
						</div>
						<div class="filter">
						  <span class="filter__input"></span>-<span class="filter__input"></span>

						  <div data-slider_id="sliderPrice10" class="filter__slider-price" data-min="0" data-max="500000" data-step="5"></div>
						</div>
					</div>
				</aside>
				<aside class="right-side-col">
					<div class="discover_results">
							<?php
							//print_r($results);
								
							$company_users = get_users( [ 'role__in' => [ 'nfi', 'investor' ] ] );
							// Array of WP_User objects.
							foreach ( $company_users as $user ) {
							    // echo '<span>' . esc_html( $user->display_name ) . '</span>'; 
							    $userid 			= $user->ID; 
							    $company_name 		= esc_html( $user->display_name );
							    //$company_logo 		= esc_url( get_avatar_url( $user->ID ) );
							    $company_logo 		= get_user_meta($userid, 'wp_user_avatar', true);
							    $company_location 	= get_user_meta($userid, 'company_location', true);
							    $company_description 	= get_user_meta($userid, 'description', true);
							    $site_url = get_site_url();

							    $count_total 		=	isset($_SESSION['add_compare_mfi']) ? count($_SESSION['add_compare_mfi']) : 0; 

							    $actionmfi 	= 'addmfi';
							    $text 		= 'Add to Compare';	 
							    if( $count_total > 0 && in_array($userid,$_SESSION['add_compare_mfi'])){
							    	$actionmfi 	= 'removemfi';
							    	$text 		= 'Added to Compare';	
							    }
							    //echo $site_url;
							    ?>
							    <div class="loop_discover">
								    <div class="company-dtl">
										<div class="company-logo" style="background-image: url(<?php echo wp_get_attachment_url($company_logo); ?>">
											
										</div>
										<div class="company-dtl-txt">
											<p class="com-location"><?php echo $company_location; ?></p>
											<p class="com-title"><a href="<?php echo $site_url;?>//user-profile/?user_name=<?=$company_name; ?>"><?php echo $company_name; ?></a> </p>
											<p class="com-desc"><?php echo $company_description; ?></p>
											<p class="add_cmp"><span class="name_add_compare" data-userid="<?php echo $userid;?>" data-action="<?php echo $actionmfi;?>"><?php echo $text;?></span></p>
										</div>
									</div>
								</div>
							    <?php
							}
							?>
						
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>


