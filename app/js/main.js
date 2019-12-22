$(document).ready(function(){
	// custom select old
	var customSelect = $('.present');
	// jcf.setOptions('Select', {

	// });
	jcf.replace(customSelect);
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
			return false;
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
});
