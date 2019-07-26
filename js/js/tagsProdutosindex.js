$(function(){
    $(document).ready(function(){
        // LOGICA DAS TAGS
        var $produtos = $('.card_produtos');
        var $butoes_tags = $('#butoes_tags');//local onde irão aparecer as tags
        var tagged = {};
        $produtos.each(function(){
            var produto = this;
            var tags = $(this).data('tags');
            if(tags){
                tags.split(',').forEach(function(tagName){
                    if(tagged[tagName] == null){
                        tagged[tagName] = [];
                    }
                    tagged[tagName].push(produto);
                });
            }
        })
        // botão todos os produtos
        $('<h5/>', {
            text: 'Todos os produtos',
            class: 'item text-white font-weight-bold',
            click: function(e){
                e.preventDefault();
                $produtos.show();
            }
        }).appendTo($butoes_tags);
        // botão de cada tegs dos produto
        $.each(tagged, function(tagName){
            $('<a/>',{
                text: tagName,
                class: 'item text-white font-weight-light',
                click: function(e){
                    // e.preventDefault();
                    $produtos.hide().filter(tagged[tagName]).show();
                }
            }).appendTo($butoes_tags);
            
        });
    })
}());
// button bars show categoria asidebar index
$('#btnbars button').on('click', function(e){
    $('.ui.sidebar')
    .sidebar('toggle');
})