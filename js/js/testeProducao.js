painelApp.service('getNotifycationCompras', function($http){
    return {
        getNotification: function(){
            return $http({
                method: 'GET',
                url: '../logica/notify_Compras.php'
            })
        },
        httpGetAsync: function(url, callback){
            $http({
                method: 'GET',
                url: url
            }).then(function result(result){
                callback(result.data);
            })
        }
    }
})
painelApp.controller('notifyCtrl', function($scope, getNotifycationCompras){
    // função gerador
    let generator;

    let verify_dados = () => {
        getNotifycationCompras.httpGetAsync('../logica/notify_Compras.php', (data) => {
            generator.next(data);

        });
    }
    function fetchDadosPrimise(){
        return new Promise( resulve => {
            getNotifycationCompras.httpGetAsync('../logica/notify_Compras.php', (data) => {
                setInterval(() => {
                    resulve(data);
                }, 1000);    
            });
        } );
    }
    function sayHello(){
        return new Primise((result, reject) => fetchDadosPrimise().then( x => console.log(x)).catch( x => console.log(x)));
    }
    async function sayHello() {
        const externalFetchd = await fetchDadosPrimise();
        console.log(externalFetchd);
    }
    sayHello();
    // let sayHello = async() => {
    //     const external = await fetchDadosPrimise();
    // }
    // let resultDados = new Promise(
    //     function(on){
    //         getNotifycationCompras.httpGetAsync('../logica/notify_Compras.php', (data) => {
    //             on(data);    
    //         });
    //     }  
    // );
    // function* gen(){
    //     let dataOne = yield resultDados;
    //     console.log(dataOne);
    // }
    // generator = gen();
    // generator.next();        

    // setInterval(verify_dados(), 1000);
})