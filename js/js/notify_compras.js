var painelApp = angular.module('painelApp', []);
painelApp.service('getNotifycationCompras', function($http){
    return {
        getNotification: function(){
            return $http({
                method: 'GET',
                url: '../logica/notify_Compras.php'
            })
        }
    }
})
