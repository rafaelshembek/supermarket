$(function(){
    var modal_search = $("#result_search");
    $("#search").keyup(function (e) {
        $(modal_search).show();
    });
    $(document).on('click', function(){
        $(modal_search).hide();
    })
})