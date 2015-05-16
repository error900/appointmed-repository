$(function(){
    $("#inputSearch").keyup(function(){ 
    var inputSearch = $(this).val();
    var dataString = 'searchword='+ inputSearch;
    if(inputSearch!='') {
        $.ajax({
            type: "POST",
            url: "searchdoctor.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                 $(".divResult").html(html).show();
            }
        });
     }else if(inputSearch == ''){
        $(".divResult").empty();
        jQuery(".divResult").fadeOut(100);
     } return false;
    });

    // $('#inputSearch').click(function(){
    //     jQuery(".divResult").fadeIn(100);

    // });
});
