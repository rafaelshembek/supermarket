var configuracoes = angular.module('PaginaConfiguracoes', [])
.run(function($rootScope){
    $rootScope.title_pagina = 'Pagina de configurações';
});

function previwesAvatar(){
    var imgFiled = document.querySelector('input[name=imagem_avatar]').files[0];
    var imgPreviews = document.getElementById('avatarConfiguracoes');

    var reader = new FileReader();

        reader.onloadend = function(){
            imgPreviews.src = reader.result;
        }
        if(imgFiled){
            reader.readAsDataURL(imgFiled);
        }else{
            imgPreviews.src = "";
        }
}

// $(function(){
//     $('form#formAvatar').on('submit', function(e){
//         e.preventDefault();
//     })
// })