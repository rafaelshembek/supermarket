var loja = angular.module('lojaApp', []);

$('#btnbarsLoja button').on('click', function(){
    $('.ui.sidebar').sidebar('toggle');
})