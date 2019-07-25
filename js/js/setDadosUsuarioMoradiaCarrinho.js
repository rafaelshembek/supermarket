export var setDadosUsuarioMoradia = function(){

            this.dadosMoradia = function(params){
                $(params).on('submit', function(e){
                    e.preventDefault();
                    var fieldInput = $(params).serialize();
                    
                   $.ajax({
                        method: "POST",
                        url: "../../logica/logica_dados_usuario.php",
                        data: fieldInput
                    })
                    .done((data) => { 
                        console.log('OK!!!');
                        $('.modalCarrinho.ui.modal').modal({
                            centered: true
                        }).modal('hide');
                        // atualizar a pagina de carrinho
                        atualizar();
                    })
                    .fail((err) => { 
                        console.log('Erro');
                    });
                });
            }
            function atualizar(){
                console.log('pagina atualizada...');
                window.location.reload();

            }        
}