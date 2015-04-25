$(document).ready(function() {
	$("li ul.items-list").slideUp();

	$(".nav li label").on("click",function() {
		$("ul ul.items-list").slideUp(200);
        if($(this).siblings("ul.items-list").is(":visible"))
            $(this).siblings("ul.items-list").slideUp(200);
        else
            $(this).siblings("ul.items-list").slideDown(200);
    });
});