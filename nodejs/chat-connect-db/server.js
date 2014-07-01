var mysql= require('mysql');
var mysqlConnection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'nodedb',
  debug : true,
});
//mysqlConnection.connect(function(err) {
//    if ( !err ) 
//});
//var query = mysqlConnection.query('select * from account', function(err, result) {
//		console.log(result);
//});


    
var app = require('express')()
  , server = require('http').createServer(app)
  , io = require('socket.io').listen(server);

server.listen(3000);

app.get('/', function (req, res) {
  res.sendfile(__dirname + '/index.html');
});

io.sockets.on('connection', function (socket) {
  socket.on('send-msg', function(data) {
       // var query = mysqlConnection.query('select * from account where acc_username = "'+data+'"', function(err, result) {
//             io.sockets.emit('new-msg', result);
//        });
       io.sockets.emit('new-msg', data);
  });
  
});










