
function showNotify(){
    var title = 'Nome da Loja';
    var options = {
        body: 'Em poucos minutos suas compras chegarar em seu destino',
        icon: 'assets/avatar_perfil/empresa_avatar_padrao.jpg',
        dir: 'auto',
        tag: 'somthing',
        renotify: true
    }
    var permission = new Notification(title, options);
    
    console.log(permission);
    permission.data;
    permission.onclick = function(event){
        event.preventDefault();
        window.open("index.php", '_blank');
    };
}
function suportNavegador(){
    var notificationSuport;
    if(!("Notification" in window)){
        console.log("O NAVEGADOR NÃO TEM SUPORTE A NOTIFICAÇÃO");
    }else{
        notificationSuport = Notification.permission;
    }
    return notificationSuport;
}
function Permission(){
    
    if(suportNavegador() === 'granted'){
        showNotify();
    }else if(suportNavegador() === 'denied'){
        alert("Você não receberar Notificação dos Envior das compras");
    }else if(suportNavegador() === 'default'){
        alert("Você não receberar Notificação dos Envior das compras");
    }
}
// Permission();