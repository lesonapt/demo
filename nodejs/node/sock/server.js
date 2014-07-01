/**
* Created by mR.Rikky™
* Date: 6/15/13
* Time: 1:23 AM
*/

var   http        = require('http')
    , fs          = require('fs')
    , socketIO    = require('socket.io')
    , port        = process.env.PORT || 3000
    , ip          = process.env.IP || '127.0.0.1';


var serving     = function(req, res){
    console.log(req.url);
    if(req.url == '/'){
        fs.readFile('./public/index.html',function(error,data){
            if(error) {
                throw error;
            } else {
                res.writeHead(200,{'Content-Type':'text/html'});
                res.end(data);
            }
        })
    }
    if(req.url == '/Chat.js'){
        fs.readFile('./public/Chat.js',function(error,data){
            if(error){
                throw error;
            } else {
                res.writeHead(200,{'Content-Type':'text/javscript'});
                res.end(data);
            }
        })
    }
}
var server      = http.createServer(serving).listen(port, ip, function(){console.log('Server running at %s:%s', ip, port)})
var io          = socketIO.listen(server);


var run = function(socket){
    // Main socket process here!
    console.log('new client connected');
    socket.emit('greeting', 'Welcome to Socket.IO');

    socket.on('send', function(data){
        io.sockets.emit('new_message', data);
        console.log('Forward message');
    })

}



io.set('match origin protocol', true);
io.set('origins', '*:*');
//io.set('log level', 1);

io.sockets.on('connection', run);

