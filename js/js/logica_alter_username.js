$(function(){
    var input_hide = $('#input_alter_username').hide();
    $('#btn_editar').on('click', function(e){
        e.preventDefault();
        input_hide.fadeIn(200, function () {
            $(this).show();
            
        });
    })
    $('#input_alter_username').on('submit', function(e){
        e.preventDefault();
        // var id_user_online = $('#id_user_online').val();
        // var new_username = $('#alter_username').val();
        var url = '../logica/alter_username.php';
        var queryInput = $('#input_alter_username').serialize();
        // console.log('Novo username: ' + new_username + ' id usuario online: ' + id_user_online);
        $.ajax({
            type: "POST",
            url: url,
            data: queryInput,
            dataType: "json",
            complete: function (response) {
                // console.log(response);
                $('#input_alter_username').hide().animate({
                    display: 'none'
                },1000);
            }
        });
    });
    $('<i/>',{
        class: 'times icon',
        click: function(e){
            $('#input_alter_username').hide().animate({
                display: 'none'
            },1000);
        }
    }).appendTo('.btnCloseInput');
})