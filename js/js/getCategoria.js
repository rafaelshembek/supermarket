var appProdutos = angular.module('addProdutos', []);
// service
appProdutos.service('getCategorias', function($http){
    return {
        get: function(){
            return $http({
                method: 'GET',
                url: '../logica/getcategoria.php'
            })
        }
    }
})
// controller
appProdutos.controller('getProdutosCtrl', function($scope, getCategorias){
    getCategorias.get().then(
        function success(data){
            // console.log(data.data);
            $scope.tags = data.data;
        },
        function error(){
            console.log('Error');
        }
    )
})