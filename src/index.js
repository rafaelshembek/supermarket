
import { Pessoas } from "../scripts/getSistemHour";
import { ClientSide } from "../scripts/client";
import { systemNotification } from "../scripts/Notifications";
// import { Server } from "../scripts/server";

var socket = new ClientSide('http://localhost:3001');
// object notifications
var options = {
   body: 'Suas compras estão sendo organizada para a entregar'
}

var notif = new systemNotification('Compras a caminho', options);
notif.systemPermission();

socket.IO();
var url = location.search;
$('#btnConfir').on('click', function(e){
   e.preventDefault();
   var objectInformations = {
      mensagen: 'Ola tudo bem?'
   }

   socket.showMessageClientType(objectInformations);
   notif.getSystemNotification();
})