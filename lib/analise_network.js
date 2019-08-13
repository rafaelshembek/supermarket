export { myNetWork };

function myNetWork(){
    var network;

    network = window.navigator;
    $(window).ready(function(){
        if(network.onLine){
            $('#analise_netWork').show();
            $('#showErrorNetWork').css('display', 'none');
            $('#showErrorNetWork').hide();
        }else{
            $('#analise_netWork').css({
                'display':"none"
            })
            $('#analise_netWork').hide();
            $('#showErrorNetWork').show();
        }
        // return network.onLine;        
    })

}