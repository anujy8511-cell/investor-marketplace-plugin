var siteurl = themeobj.siteurl;
var ajaxurl = themeobj.ajaxurl;


jQuery(document).ready(function($){
	$('#mfp').click(function(){
		$(this).addClass('active');
		$('#msp').removeClass('active');
	});
	$('#msp').click(function(){
		$(this).addClass('active');
		$('#mfp').removeClass('active');
	});
	$('ul.sidebar-links li').click(function(){
		$(this).addClass('active');
		$(this).siblings().removeClass('active');
		var tab_btn = $(this).attr('data-btn-id');
		$('[data-tab-id="'+tab_btn+'"]').addClass('active');
		$('[data-tab-id="'+tab_btn+'"]').siblings().removeClass('active');

		if($(this).closest('ul').find('[data-btn-id]:first').hasClass('active')) {
			$(this).closest('.market-finance').find('[data-type="next_btn"]').removeClass('d-none');
			$(this).closest('.market-finance').find('[data-type="prev_btn"]').addClass('d-none');
		} else if($(this).closest('ul').find('[data-btn-id]:last').hasClass('active')) {
			$(this).closest('.market-finance').find('[data-type="next_btn"]').addClass('d-none');
			$(this).closest('.market-finance').find('[data-type="prev_btn"]').removeClass('d-none');
		} else {
			$(this).closest('.market-finance').find('[data-type="next_btn"]').removeClass('d-none');
			$(this).closest('.market-finance').find('[data-type="prev_btn"]').removeClass('d-none');
		}

	});
	$('button.tablinks').click(function(){
		$(this).addClass('active')
		$(this).siblings().removeClass('active');
		var main_tab_btn = $(this).attr('data-tab');
		$('[data-content="'+main_tab_btn+'"]').addClass('active');
		$('[data-content="'+main_tab_btn+'"]').siblings().removeClass('active');
	});

	$(document).on('click','[data-type="next_btn"], [data-type="prev_btn"]',function() {
		let el = $(this).closest('.mfp-right-form').find('[data-tab-id].active').removeClass('active');
		$('[data-btn-id="'+el.attr('data-tab-id')+'"]').removeClass('active');
		if($(this).attr('data-type') == 'next_btn') {
			el.next().addClass('active');
			$('[data-btn-id="'+el.attr('data-tab-id')+'"]').next().addClass('active');
		} else {
			el.prev().addClass('active');
			$('[data-btn-id="'+el.attr('data-tab-id')+'"]').prev().addClass('active');
		}
		if($(this).closest('.mfp-right-form').find('[data-tab-id]:first').hasClass('active')) {
			$(this).closest('[data-id]').find('[data-type="next_btn"]').removeClass('d-none');
			$(this).closest('[data-id]').find('[data-type="prev_btn"]').addClass('d-none');
		} else if($(this).closest('.mfp-right-form').find('[data-tab-id]:last').hasClass('active')) {
			$(this).closest('[data-id]').find('[data-type="next_btn"]').addClass('d-none');
			$(this).closest('[data-id]').find('[data-type="prev_btn"]').removeClass('d-none');
		} else {
			$(this).closest('[data-id]').find('[data-type="next_btn"]').removeClass('d-none');
			$(this).closest('[data-id]').find('[data-type="prev_btn"]').removeClass('d-none');
		}
		 // $.scrollTo(el, 1000);
	 	$('html, body').animate({
	        scrollTop: $('#mfp').offset().top
	    }, 2000);
	});
	//$('.row_list_user').slick();
	

// delete files function
	$('#del_msg').hide();
   $(document).on('click', 'li.list-file>span', function(){
		//alert('hello');
		$("#del_msg").show();
		setTimeout(function() { $("#del_msg").hide(); }, 1000);
		var del_file_id = $(this).data('id-file');
		//alert(del_file_id);
		$.ajax({
			url: ajaxurl,
			type: "POST",
			data: {action:'delete_file', delete_file_id: del_file_id},
			success: function(res){
			 			 
			}
		})
		$(this).parent().remove();		
	})
   
   // $(document).on('click', 'li.list-file>span', function(){
   	
   // })
   
   
});

//add to compare
jQuery(document).on('click', '.name_add_compare', function(){
	
	var thisobj 	= jQuery(this);
	var user_id 	= jQuery(this).attr('data-userid');
	var curr_action	= jQuery(this).attr('data-action');
	//alert(del_file_id);
	jQuery.ajax({
		url: ajaxurl,
		type: "POST",
		data: {action:'add_ajax_compare', comp_user_id: user_id, curaction: curr_action},
		success: function(res){
		 	var getJsonVal = jQuery.parseJSON(res);
		 	console.log(getJsonVal);
		 	if(getJsonVal.status == 'error'){
		 		alert('You can\'t add more than 2 for compare');
		 	}else if(getJsonVal.status == 'success'){

		 		if(getJsonVal.action == 'removemfi'){
		 			thisobj.text('Added To Compare');
		 			thisobj.attr('data-action','removemfi');
		 		}else if(getJsonVal.action == 'addmfi'){
		 			thisobj.text('Add To Compare');
		 			thisobj.attr('data-action','addmfi');
		 		}
		 	}
		}
	});				
});

jQuery(window).on('scroll', function(){
   	if ($(window).width() < 767) {
   		var formHeight = $('div.mfp-left-sidebar').height();
   		console.log(formHeight);
	   	if($(window).scrollTop() >= 1200) {
	   		$('div.mfp-left-sidebar').addClass('fixed');
	   		//console.log('hello');
	   	}
	   	else{
	   		$('div.mfp-left-sidebar').removeClass('fixed');
	   		
	   	}
   }
});
jQuery(document).on('click', '#mobile_toggle', function($){
	jQuery('div.mfp-left-sidebar').toggleClass('open');
})