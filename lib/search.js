
export { searchInput, showModal }
function searchInput(){
    // ==============
   return $("#search").on('keyup', function(){
      var $items;
      var path_arquivo = 'logica/search.php';
      var search = $("#search").serialize();
        $.post(path_arquivo, search, function(i){
            $items = '<span class="card-title">Pesquisando....</span>';
        })
        //=====================
        .done(function(result){
            console.log(result);
            if(result[0])
            {
                $items = '<span class="card-title">Pesquisando....</span>';
            }
            else
            {
                let dados = JSON.parse(result);
                // console.log(dados);
                $items = resultado(dados).getItem;
            }
            $('.results').html($items);
        })
        .fail(function(error){
            console.log(error);
        })
    })
    // =============
}
// $(function(){
// })
function resultado(dados){
    
    var items = '';
        for(var i = 0; i < dados.length; i++){
            let id_loja = dados[i]['idcadastro'];
            let nome_loja = dados[i]['nome_empresa'];
            
            items += '<div class="card-body">';
            items += '<h5><a class="text-muted font-weight-light" href="./interface/loja/'+id_loja+'"><i class="fas fa-store"></i> ';
            items += nome_loja+'</a></h5>';
            items += '</div>';
        
        }
    return {
        getItem: items
    }

}
function showModal(){
    var $modalShow = $("#result_search").hide();
    $("#search").keyup(function (e) {
        $($modalShow).show();
    });
    $("body").on('click', function(e){
        $($modalShow).hide();
    })
}