import { getGeolocation } from "../../lib/geolocation.js";

configuracoes.controller('configuracoesCtrl', function($scope){

    var options = {
        enableHigthAccuracy: true,
        timout: 2000,
        maximumAge: 0
    }
    
    getGeolocation().getCurrentPosition( success => {
        // console.log(success);

        $('#latitude').val(success.coords.latitude);
        $('#longitude').val(success.coords.longitude);

    }, error => {
        console.log(error);
    }, options);
    
    $("form#formAddDadosPessoais").on('submit', function(e){
        e.preventDefault();
    
        var fieldsInputs = $('form#formAddDadosPessoais').serialize();
    
        // console.log(fieldsInputs);
        if($("#rua_moradia").val() == "" || $("#numero_moradia").val() == "" || $("#bairro_moradia").val() == "" || $("#cidade_moradia").val() == "" || $("#estado_moradia").val() == "" || $("#referencia_moradia").val() == ""){

                alert("campos sem dados");

                $("#rua_moradia").val("");
                $("#numero_moradia").val("");
                $("#bairro_moradia").val("");
                $("#cidade_moradia").val("");
                $("#estado_moradia").val("");
                $("#referencia_moradia").val("");

        }else{

            $.ajax({
                method: "POST",
                url: "../logica/logica_dados_usuario.php",
                data: fieldsInputs
            })
            .done( success => {
                // console.log(success);
                alert("Dados Cadastrador com success");
                $("#rua_moradia").val("");
                $("#numero_moradia").val("");
                $("#bairro_moradia").val("");
                $("#cidade_moradia").val("");
                $("#estado_moradia").val("");
                $("#referencia_moradia").val("");
            })
            .fail( error => {
                console.log(error);
            });
            
        }

    
    })

})