
// factory
configuracoes.factory('AtivarConta', function($http){
        // var btnDesativar;
        return {
            btnDesativar: function(){
                $('<button/>', {
                    text: 'Desativar',
                    class: 'negative ui button',
                    click: function(e){
                        alert(e.target.textContent);
                    }
                }).appendTo('.newBtn');
            },
            getDados: function(){
                return $http({
                    method: 'GET',
                    url: '../logica/logica_ativar_conta.php?'
                });
            },
            setDados: function(){
                return $http({
                    method: 'POST',
                    url: '../logica/activer_contar.php?'
                });
            }
        }
})
// controller
configuracoes.controller('AtivarContarCtrl', function($scope, AtivarConta){
    $scope.act_conta = 'Ativar sua Conta';
    $scope.aviso = 'para ativar sua conta click em Ativar Conta';
    // AtivarConta.btnDesativar();
    var url = window.location.href.split('?')[1];
        AtivarConta.getDados().then(function success(result){
            if(result.data.length !== 0){
                $scope.act_conta = 'Conta Ativadar';
                $scope.aviso = 'Sua Conta esta Ativadar';
                $scope.colore = 'green';
                // console.log('Sua array: ', result.data);
                // console.table(result.data);
            }else{
                console.group("==========> AVISO <========");
                console.info('SUA CONTA NÃO ESTA ATIVADAR');
                console.groupEnd();
                $scope.ativar_conta = function(){
                    AtivarConta.setDados().then(function(resultado){
                        if(resultado.xhrStatus === "complete"){
                            if(confirm("Sua conta foi ativadar")){//alert do window
                                $scope.act_conta = 'Conta Ativadar'; //nome para o botão
                                $scope.aviso = 'Sua Conta esta Ativadar'; // aviso de conta ativada
                                $scope.colore = 'green';//mudar a cor do botão para ver quando a conta estiver ativa
                                // console.table(resultado);
                            }
                        }
                    }, function error(error){
                        console.log(error);
                        alert('Error sua conta não foi possivel ser ativadar, consulte um programador');
                    });;
                }
            }
        }, function error(error){
            console.group("==========> ERROR <========");
            console.info(error);
            console.groupEnd();
        });
})