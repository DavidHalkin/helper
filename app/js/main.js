$(document).ready(function(){
	// custom select old
	var customSelect = $('.present');
	// jcf.setOptions('Select', {

	// });
	jcf.replace(customSelect);

	// mask tell
	$(".tell_mask").inputmask({ mask: "+7-99-999-99"});
	// tooltips
	$('[data-toggle="tooltip"]').tooltip();
	// sidebar menu
		$(".active .link_drop_js").parent().find(".drop_js").slideDown("fast");
		$(".link_drop_js").click(function(){
			if($(this).parent().hasClass("active")){

			$(this).parent().find(".drop_js").slideUp("fast");
			$(this).parent().removeClass("active");
			}
			else{
			$(this).parent().find(".drop_js").slideDown("fast");
			$(this).parent().addClass("active");
			}
			//return false;
		});
		// responsive tabs
		$('#responsiveTabsDemo').responsiveTabs({
			startCollapsed: 'accordion'
		});
	// favorite
		$(".go_favorite_js a").click(function(){
			$(this).parents(".item_task").toggleClass("in_favorite");
			return false;
		});
		$(".favorite_js a").click(function(){
			$(this).parent().toggleClass("active");
			return false;
		});
	// 
	// toggle chat
		$(".chat_toogle_js").click(function(){
			$(this).toggleClass("active");
			$(".chat_main_holder").toggleClass("active");
		});
		// switch_panel_chat
		$(".switch_panel_chat_js").click(function(){
			$(".chat_main_holder").toggleClass("active");
		});

	// stars js
	$('#star_rating').barrating('show', {
        theme: 'bootstrap-stars',
    });
    $('#star_rating').barrating('set', '3');
    // add form comment
    $(".add_review_js").click(function(){
		$(this).toggleClass("active").parents(".tabe_panel_js").toggleClass("add_comment_active").find(".add_form").slideToggle("fast");
		$(this).parents(".tabe_panel_js").toggleClass("add_comment_active").find(".hidden_at_active").slideToggle("fast");
		var $link_bnt = $(".add_review_js");
			if ($link_bnt.hasClass("active")) {
		        $link_bnt.html(" Убрать форму");
		    } else {
		        $link_bnt.html(" Оставить отзыв");
		    }
		return false;
	});
	
    // add comment 
    $(".answer_js").click(function(){
		$(this).parents(".comment_content").find(".comment_form_js").slideDown("fast");
		return false;
	});
	$(".form_close_js").click(function(){
		$(this).parents(".comment_content").find(".comment_form_js").slideUp("fast");
		return false;
	});
	// sidebar menu 2
	$(".sidebar_toggle_js").click(function(){
		$(".sidebar_js").slideToggle("fast");
		return false;
	});
	// funcs of search
	$(".input_overlay_js").focus(function(){
		$(".input_overlay_parent_js").addClass("opened");
		$(".holder_overlay_js").addClass("active");

		$(".search_bar").toggleClass("active");
	});
	$(".input_overlay_parent_js").click(function(){
		$(this).removeClass("opened");
		$(".mobile_filter_js").removeClass("active");
		$(".holder_overlay_js").removeClass("active");
		$("body").removeClass("body_overflow");

		$(".search_bar").toggleClass("active");
	});
	
	$(".back_toggler_js").click(function(){
		$(".input_overlay_parent_js").removeClass("opened");
		$(".holder_overlay_js").removeClass("active");

		$(".search_bar").toggleClass("active");
	});
	$(".btn_settings_js").click(function(){
		$(".mobile_filter_js").toggleClass("active");
		$(".input_overlay_parent_js").toggleClass("opened");
		$("body").toggleClass("body_overflow");

		$(".search_bar").toggleClass("active");
		return false;
	});
	
	$(".close_filter_js").click(function(){
		$(".mobile_filter_js").toggleClass("active");
		$(".input_overlay_parent_js").toggleClass("opened");
		$("body").toggleClass("body_overflow");

		$(".search_bar").toggleClass("active");
		return false;
	});
});
// custom input file
$(function(){  
  $('.inputfile_js').change(function(){
    var label = $(this).parent().find('span'); 
    if(typeof(this.files) !='undefined'){ // fucking IE      
      if(this.files.length == 0){
        label.removeClass('withFile').text(label.data('default'));
      }
      else{
        var file = this.files[0]; 
        var name = file.name;
        var size = (file.size / 1048576).toFixed(3); //size in mb 
        label.addClass('withFile').text(name + ' (' + size + 'mb)');
      }
    }
    else{
      var name = this.value.split("\\");
	      label.addClass('withFile').text(name[name.length-1]);
    }
    return false;
  });  
});