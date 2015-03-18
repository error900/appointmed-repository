$(document).ready(function() {
    $(".d-info form input").on("click",function() {
    	if($(".d-info form input:nth-child(3)").is(":visible"))
    		$(".d-info form input:nth-child(3)").addClass("hide");
        else
    		$(".d-info form input:last").removeClass("hide");
    		$(".d-info form input:nth-child(3)").removeClass("hide");
    });
});