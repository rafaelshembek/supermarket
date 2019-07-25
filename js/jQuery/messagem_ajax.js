$(function(){
    $('#form_duvidas_sugestoes').on('submit', function(e){
        e.preventDefault();
        var aviso_erro = 'Sua messagem não foi enviada';
        var msg_succeso = $('#msg_success');
        var aviso_successo = 'Sua messagem foi enviada com sucesso';
        var msg = '<span class="alert alert-success">Sua messagem foi enviada com sucesso</span>';
        var url = './interface/messagem_duvidas_sugestao.php';
        var input_1 = $('#input_1').val();
        var input_2 = $('#input_2').val();
        var input_3 = $('#input_3').val();
        var queryInput = $('#form_duvidas_sugestoes').serialize();
        $.post(url, queryInput)
        .done(function(e){
            msg_succeso.append(msg);
            setTimeout(function(){
                $('span.alert-success').hide();
            },5000);
            clearTimeout();
            $('#input_1').val('');
            $('#input_2').val('');
            $('#input_3').val('');
            // alert(aviso_successo);
        }).fail(function(){
            alert(aviso_erro);
        })
    })
})