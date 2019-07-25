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
        // console.log(result);
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
                    $items += '<div class="row m-2">';
                    $items += '<div class="col-md-12">';
                    $items += '<div class="card-body d-flex justify-content-between align-content-center flex-wrap">';
                    $items += '<h2 class="align-self-center font-weight-light text-muted m-2"><i class="user icon"></i><strong>'+data[i]['nome_completo']+'</strong></h2>';
                    $items += '<h5 class="align-self-center font-weight-light"><i class="at icon"></i>'+data[i]['email']+'</h5>';
                    $items += '<h6 class="align-self-center ui yellow large label m-0">'+dia+'</h6>';
                    $items += '<a class="align-self-center nav-link m-2" href="../interface/relatorios_compras.php?cliente='+data[i]['id_usuario']+'&data='+data[i]['data_compra']+'"><i class="eye icon"></i> Ver Compras</a>';
                    $items += '</div>';
                    $items += '</div>';
                    $items += '</div>';
                    $items += '</div>';
            }
        }else{
            $items += '<div class="row">';
                $items += '<div class="col-md-12">';
                    $items += '<div class="card-body">';
                        $items += '<h1 class="text-center font-weight-light text-muted"><strong class="ui red massive label">Sem compras no momento</strong></h1>';
                        $items += '<div class="card-body m-5 text-center text-muted" style="font-size: 55pt;"><i class="shopping cart icon"></i></div>';
                    $items += '</div>';
                $items += '</div>';
            $items += '</div>';
        }
        return $items;
    }
setInterval(() => {
    setJason();
}, 3000);