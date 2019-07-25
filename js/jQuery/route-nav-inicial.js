var paginaInicial = angular.module('paginaInicial', ['ngRoute']);
paginaInicial.config(['$routeProvider', function($routeProvider){
    $routeProvider.when('/', {
        templateUrl: './interface/body.php'
    }).when('/login', {
        templateUrl: './interface/nav.php'
        // controller: 'loginInicialCtrl'
    })
}]);