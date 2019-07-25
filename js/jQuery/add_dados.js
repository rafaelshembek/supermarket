$(function(){
    $('.card-body').on('submit', function(e){
        // e.preventDefault();
        $.ajax({
            type: "POST",
            url: "url",
            data: "data",
            dataType: "json",
            beforeSend: function(){
                
            },
            success: function (response) {
                
            }
        });
        // alert(e.type);
    })
})