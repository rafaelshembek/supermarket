
painelApp.controller('notifyCtrl', function($scope, getNotifycationCompras){
    
    var showNotificacao = () => {
        getNotifycationCompras.getNotification().then(function(result){
            if(result.data.length == 0){
                    console.log("Sem compras no Momentos");
                    // $('.aviso_compras').html('<li class="nav-link text-danger">Sem novas Compras</li>');
            }else{
                // forDados(result.data);
            }
        });
    }
    // verificar o dia hoje presente
    var notifyTime = () => {
        setInterval(showNotificacao, 1500);
    }
    // setTimeout(notifyTime, 2000);
    // verificar o mes do ano presente
    var month_today = (v) => {
        if(v === 'January'){
            
        }else if(v['mes'] === 'February'){
            // console.log(v);
            $('.aviso_compras').html('<a class="nav-link text-warning" href="./list_new_compras.php">Você tem novas Compras</a>');
            
        }else if(v === 'March'){

        }else if(v === 'April'){

        }else if(v === 'May'){

        }else if(v === 'June'){

        }else if(v === 'July'){

        }else if(v === 'August'){

        }else if(v === 'September'){

        }else if(v === 'October'){

        }else if(v === 'November'){

        }else if(v === 'December'){

        }
    }

    var forDados = (v) =>{

        for(var i = 0; i < v.length; i++){
            if(v[i].length != 0){
                switch(v[i]['nome_dia']){
                    case 'Monday':
                        month_today(v[i]);
                    break;
                    case 'Tuesday':
                        month_today(v[i]);
                        
                    break;
                    case 'Wednesday':
                        month_today(v[i]);
                    break;
                    case 'Thursday':
                        month_today(v[i]);
                    break;
                    case 'Friday':
                        month_today(v[i]);
                    break;
                    case 'Saturday':
                        month_today(v[i]);
                    break;
                    case 'Sunday':
                        month_today(v[i]);
                    break;
                }
            }
        }
    }
})
