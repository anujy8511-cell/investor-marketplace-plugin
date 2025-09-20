var siteurl = themeobj.siteurl;
var ajaxurl = themeobj.ajaxurl;



jQuery(document).ready(function($) {
	//alert(ajaxurl);
   $('.action_btns p').click(function(){
   	var action_result = $(this).attr('data-value');
   	//alert(action_result);
   	var action_id     = $(this).attr('data-id');
   	//alert(action_id);
   	var clicked_img = $(this);
   	console.log(action_result);
   	$.ajax({
			url: ajaxurl,
			type: "POST",
			data: {action:'change_user_status', user_status: action_result, user_id: action_id},
			success: function(res){
			 
			 var change_status = JSON.parse(res);
			 $('[data-status="'+action_id+'"]').html(change_status.status);
			 window.location.reload();
			 
			}
		})
   })
      
});
jQuery(document).ready(function($){
	$('#send_mail').click(function(){
   	var data_user_id     = $(this).attr('data-id');
   	console.log(data_user_id);
   	$.ajax({
			url: ajaxurl,
			type: "POST",
			data: {action:'send_mail_to_user', user_id: data_user_id},
			success: function(res){
			 	$('#send_mail').html('<span>Sent</span>');	
			 //window.location.reload();
			 
			}
		})
   })
})
 


// script fot tabbing section of nfi details(start)


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
		// if(el.attr('data-tab-id') == el.last('data-tab-id')) {
		// 	$(this).closest('[data-id]').find('[data-type="next_btn"]').addClass('d-none');
		// } else {
		// 	$(this).closest('[data-id]').find('[data-type="next_btn"]').removeClass('d-none');
		// 	$(this).closest('[data-id]').find('[data-type="prev_btn"]').removeClass('d-none');
		// }
		// if(el.attr('data-tab-id') == el.first().attr('data-tab-id')) {
		// 	$(this).closest('[data-id]').find('[data-type="prev_btn"]').addClass('d-none');
		// } else {
		// 	$(this).closest('[data-id]').find('[data-type="prev_btn"]').removeClass('d-none');
		// 	$(this).closest('[data-id]').find('[data-type="next_btn"]').removeClass('d-none');
		// }
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
		var file_user_id = $(this).data('user-id');
		//alert(del_file_id);
		$.ajax({
			url: ajaxurl,
			type: "POST",
			data: {
				action:'delete_file',
			 	delete_file_id: del_file_id,
			  	file_user_id: file_user_id
			},
			success: function(res){
			 			 
			}
		})
		$(this).parent().remove();		
	})
   //$('.pwd-hidden').val($('#pass1').val());


	$('button.wp-generate-pw.hide-if-no-js').on('click', function(){
		setTimeout(function() {
	    	$('.pwd-hidden').val($('[data-pw]').val());
		}, 300);
	});

   $('#pass1').keyup(function () {
	  $('.pwd-hidden').val($(this).val());
	});
   
   
});

// script fot tabbing section of nfi details(End)
