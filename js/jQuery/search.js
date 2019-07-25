paginaInicial.factory('Pesquisar', function($http){
    return {
        search: function(element, $seach){
            $(element).on('submit', function(event){
                event.preventDefault();
            })
            $($seach).on('keyup', function(){
              var $items;
              var path_arquivo = 'logica/search.php';
              var search = $($seach).serialize();
                $.post(path_arquivo, search, function(i){
                    $items += '<span class="card-title">Pesquisando....</span>';
                })
                //=====================
                .done(function(result){
                    let dados = JSON.parse(result);
                    $items = resultado(dados).getItem;
                    $('.pesquisar').html($items);
                })
                .fail(function(error){
                    console.log(error);
                })
            })
        }
    }
})

paginaInicial.controller('formsearchCtrl', function($scope, Pesquisar){
    
    Pesquisar.search('#form_search',' #search');
    
});

function resultado(dados){
    
    var items = '';
        for(var i = 0; i < dados.length; i++){
            let id_loja = dados[i]['idcadastro'];
            let nome_loja = dados[i]['nome_empresa'];
            
            items += '<div class="card-body">';
            items += '<h5><a href="./interface/loja/'+id_loja+'"><i style="color: #57a60a;" class="fas fa-store"></i> ';
            items += nome_loja+'</a></h5>';
            items += '</div>';
        
        }
    return {
        getItem: items
    }

}