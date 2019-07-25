$(function(){
    var $produtos = $('#produto_loja form');
    var $butoes_tags = $('#butoes_tags');
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
        console.group("Nomes das tags dos produtos");
        console.info(tags);
        console.groupEnd();
    })
    $('<button/>', {
        text: 'Todos os produtos',
        class: 'active',
        click: function(){
            $produtos.show();
        }
    }).appendTo($butoes_tags);

    $.each(tagged, function(tagName){
        $('<button/>',{
            text: tagName,
            click: function(){
                $produtos.hide().filter(tagged[tagName])
                .show();
            }
        }).appendTo($butoes_tags);
        
    });
}());