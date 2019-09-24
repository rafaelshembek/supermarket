import * as io from "../node_modules/socket.io-client/dist/socket.io";

export class ClientSide{

    constructor(url_host){
        this._io = url_host
    }

    IO(){
        this._socket = io(this._io);
    }
    showMessageClientType(object){
      
        this._socket.emit('eventclient', object);
        this._socket.on('eventclient', function(data){
            console.log(data);
        });
    }
}
