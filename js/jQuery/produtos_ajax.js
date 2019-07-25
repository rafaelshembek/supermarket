$(function(){
    $(document).ready(function(e){
        var id_loja = $('#id_loja').val();
        var url = '../interface/body_produto.php?loja='+id_loja;
        var $items = '';
        $.post(url, function(){
            // ...
        })
    })
}())
