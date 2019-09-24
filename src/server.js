var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http);


io.on('connection', function(socket){
   console.log('use Online');
   socket.on('eventclient', function(data){
      console.log(data);
      socket.emit('eventclient', data);
   });
});

http.listen(3001, () => {
   console.log('listening port 3001');
})