$(function(){
    $(document).ready(function(){
        // LOGICA DAS TAGS
        var $produtos = $('form');
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
        $('<a/>', {
            text: 'Todos os produtos',
            style: 'background: #4AC767; color: #fff; font-family: Century Gothic',
            class: 'item shadow font-weight-bold',
            click: function(e){
                e.preventDefault();
                $produtos.show();
            }
        }).appendTo($butoes_tags);
        // botão de cada tegs dos produto
        $.each(tagged, function(tagName){
            $('<a/>',{
                text: tagName,
                style: 'font-family: Century Gothic; background: transparent;',
                class: 'ui button m-1 text-white font-weight-light',
                click: function(e){
                    // e.preventDefault();
                    $produtos.hide().filter(tagged[tagName]).show();
                }
            }).appendTo($butoes_tags);
            
        });
    })
}());