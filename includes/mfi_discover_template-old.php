<?php 
	add_action('wp_head', 'ingrate_slider_css');
	function ingrate_slider_css(){
		?>
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.0/nouislider.css'>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.0/nouislider.js'></script>
		<?php
	}
	add_action('wp_footer', 'ingrate_slider_script');
	function ingrate_slider_script(){
		?>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.0/nouislider.js'></script>
		<script type="text/javascript">
		 	const slider = document.getElementById('sliderPrice');
			const rangeMin = parseInt(slider.dataset.min);
			const rangeMax = parseInt(slider.dataset.max);
			const step = parseInt(slider.dataset.step);
			const filterInputs = document.querySelectorAll('input.filter__input');

			noUiSlider.create(slider, {
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

			// bind inputs with noUiSlider 
			slider.noUiSlider.on('update', (values, handle) => { 
			  filterInputs[handle].value = values[handle]; 
			});

			filterInputs.forEach((input, indexInput) => { 
			  input.addEventListener('change', () => {
			    slider.noUiSlider.setHandle(indexInput, input.value);
			  })
			});
 		</script>
		<?php
	}

 ?>
 
<div class="mfi_search_form">
	<div class="header-txt">
		<h2 class="text-center">Discover MFIs</h2>
		<p class="text-center">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius</p>
	</div>
	<div></div>
</div>
</div>
</div>
<div class="search-section">
	<div class="section_wrapper">
		<div class="the_content_wrapper">
			<p>dm,fvnvnvnfkdjvk</p>
			<div class="search-row">
				<aside class="left-side-col">
					<div class="discover_options">
						<div class="d-option">
							<p>Operational self Sufficiency</p>
						</div>
						<!-- <div class="filter">
							<span class="filter__input"></span>
							<span class="filter__input"></span>
						  <label class="filter__label">
						    <input type="text" class="filter__input">
						  </label>  

						  <label class="filter__label">
						    <input type="text" class="filter__input">
						  </label>

						  <div id="sliderPrice" class="filter__slider-price" data-min="0" data-max="100" data-step="5"></div>
						</div> -->
					</div>
				</aside>
				<aside class="right-side-col">
					<div class="discover_results">
						<div class="company-dtl">
							<div class="company-logo" style="background-image: url(http://vortexlab.website/nix_marketplace/wp-content/uploads/2020/10/dummy_logo.jpg);">
								
							</div>
							<div class="company-dtl-txt">
								<p class="com-location">San Franscisco CA, USA</p>
								<p class="com-title">Lorem Ipsum dolor</p>
								<p class="com-desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
							</div>
						</div>
						<div class="company-dtl">
							<div class="company-logo" style="background-image: url(http://vortexlab.website/nix_marketplace/wp-content/uploads/2020/10/dummy_logo.jpg);">
								
							</div>
							<div class="company-dtl-txt">
								<p class="com-location">San Franscisco CA, USA</p>
								<p class="com-title">Lorem Ipsum dolor</p>
								<p class="com-desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>


