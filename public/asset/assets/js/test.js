

$(document).ready(function () {

    $("#search-box").keyup(function () {
        $.ajax({
            type: "GET",
            url: "/final_project/auto" + '/' + $(this).val(),
            beforeSend: function () {
                $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function (data) {
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background", "#FFF");

            }
        });
    });
});

//To select country name
function selectCountry(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
     var result=$("#search-box").val();


    $.ajax({
        type: "GET",
        url: "/final_project/xx" + '/' + result,
        success: function (data) {
            alert(data);

        }
    });




}


