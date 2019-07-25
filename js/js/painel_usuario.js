var myPainel = angular.module('painelUsuario', ['ngRoute']);
   myPainel.config(['$routeProvider', function($routeProvider){
       $routeProvider.when('/', {
           templateUrl: '../views/mainPainel.php'
       }).when('/avatar', {
           templateUrl: '../views/avatarUsuario.php'
       }).when('/dadosPessoais',{
           templateUrl: '../views/dadosPessoais.php'
       }).when('/contaUsuario', {
           templateUrl: '../views/contaUsuario.php'
       }).when('/minhascompras', {
           templateUrl: '../views/minhasCompras.php'
       })
   }]);