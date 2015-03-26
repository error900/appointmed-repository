$(document).ready(function() {
	$("li ul.sidebar-items-list").slideUp();

	$(".nav li label").on("click",function() {
		$("ul ul.sidebar-items-list").slideUp(200);
        if($(this).siblings("ul.sidebar-items-list").is(":visible"))
            $(this).siblings("ul.sidebar-items-list").slideUp(200);
        else
            $(this).siblings("ul.sidebar-items-list").slideDown(200);
    });
});