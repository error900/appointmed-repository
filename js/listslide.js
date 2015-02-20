$(document).ready(function() {
	$("li ul.d-list").slideUp();

	$(".nav li label").on("click",function() {
		$("ul ul.d-list").slideUp(200);
        if($(this).siblings("ul.d-list").is(":visible"))
            $(this).siblings("ul.d-list").slideUp(200);
        else
            $(this).siblings("ul.d-list").slideDown(200);
    });
});