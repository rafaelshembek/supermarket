var mySignup = angular.module('signup', []);
    mySignup.controller('formSignupCtrl', function($scope){
        $scope.nome_empresa = 'Nome de sua empresa';
    })

$(function(){
    var modal_empresa = $('.modal_empresa').hide();
    var modal_usuario = $('.modal_usuario').hide();
    var input_1 = document.getElementById('nome_fantasia').value;
    var check1 = document.getElementById('empresa');
    var check2 = document.getElementById('usuario');

    $('input:checkbox').on('change', function(event){
        
        if(check1.checked){
            console.log('Evento do Click: ' + event.type);
            // check_1(check1);
            console.log('conta Empresa');
            
        }else if(check2.checked){
            console.log('Evento do Click: ' + event.type);
            // check_2(check2);
            console.log('Conta Usuario');
           console.log(input_1.innerText);
        }else{
            return false;
        }
    })

    function check_1(params){
        if(params.checked == true){
            console.log('conta Empresa');
            return true;
        }else{
            return false;
        }
    }
    function check_2(params){
        if(params.checked == true){
            console.log('Conta Usuario');
            return true;
        }else{
            return false;
        }
    }
})