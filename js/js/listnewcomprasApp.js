    setJason = () => {
        $.getJSON('../logica/dados_do_clientes.php')
        .done(function(result){
            // console.log(result);
            // if(result.length > 0){

                $('.new_cliente').html(Information(result));
            // }else{
            //     console.log("ok");
            // }
        })
        .fail(function(error){
            console.log(error);
        })
    }

    var Information = (data) => {
        // console.log(data);
        var $items = '';
        var dia = '';
        var i = 0;
    
        if(data.length > 0){
            for(i = 0; i < data.length; i++){
                if(data[i]['registro'] == 0){
                    dia = 'Hoje';
                }else{
                    dia = ' Dias Antes';
                }
            $items += '<div class="row m-1" style="background: #fafafa;">';
                $items += '<div class="col-md-12">';
                
                $items += '<div class="ui  attached stackable secondary segment border-0 menu">';
                        $items += '<div class="item font-weight-bold text-muted"><strong>'+data[i]['nome_completo']+'</strong></div>';
                        $items += '<div class="item">'+data[i]['email']+'</div>';
                        $items += '<div class="item"><label class="ui yellow label">'+dia+'</label></div>';
                        $items += '<div class="right menu">';
                        $items += '<div class="item">';
                            $items += data[i]['hora_compra'] +'h : '+ data[i]['minutos_compras']+'m';
                        $items += '</div>';
                        $items += '<a class="ui blue button m-2" href="../interface/relatorios_compras.php?cliente='+data[i]['id_usuario']+'&data='+data[i]['data_compra']+'"><i class="eye icon"></i> Ver Compras</a>';
                        $items += '</div>';
                $items += '</div>';
                $items += '</div>';
            $items += '</div>';
            }
        }else{
            $items += '<div class="row">';
                $items += '<div class="col-md-12">';
                    $items += '<div class="card-body">';
                        $items += '<div class="h1 text-center font-weight-light text-muted"><strong>Ainda não foram registrado compras em sua loja</strong></div>';
                        $items += '<div class="mt-5 mb-0 text-center text-muted" style="font-size: 55pt;"><i class="shopping cart icon"></i></div>';
                        $items += '<p class="text-center font-weight-light text-muted"><strong>Problema no sistema entre em contato com nossa central de desenvolvimento </strong></p>';
                        $items += '<div class="text-center font-weight-light text-muted"><a href="#!">Solicitar um Desenvolvedor</a></div>';
                    $items += '</div>';
                $items += '</div>';
            $items += '</div>';
        }
        return $items;
    }
setInterval(() => {
    setJason();
}, 5000);