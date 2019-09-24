export class systemNotification{
    constructor(title, object){
        this._title = title,
        this._object = object
    };
    
    systemPermission(){
        Notification.requestPermission().then( result => {

            if(result === 'denied'){
                alert("As notificações são importante para informar o envior de suas compras");
                return;
            }
            if(result === 'default'){
                alert("As notificações são importante para informar o envior de suas compras");
                return;
            }
        } )
    }
    getSystemNotification(){
        var n = new Notification(this._title, this._object);
        // return notifications;
        // console.log(n);
    }

}