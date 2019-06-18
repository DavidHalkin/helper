$(document).ready(function(){
	jcf.replaceAll();
	 $(".link_drop_js").click(function(){
        $(this).parent().toggleClass("active");
        $(this).parent().find(".drop_js").slideToggle("fast");
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
});
