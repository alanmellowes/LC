const path = require('path');
const http = require('http');
const express = require('express');
const socketio = require('socket.io');
const cors = require('cors');
const formatMessage = require('./liveChat/utils/messages');
const { userJoin, getCurrentUser, userLeave, getRoomUsers} = require('./liveChat/utils/users');

const app = express();
const server = http.createServer(app);
const io = socketio(server);

//set static folder
app.use(express.static(path.join(__dirname, './liveChat/public')));
app.use(cors());

const kBot = 'Krawla Admin';

//run when user connects
io.on('connection', socket => {
 socket.on('joinRoom',({ username, room}) => {
    const user = userJoin(socket.id, username, room);
    const room2 = userJoin(socket.id, username, room);

    socket.join(user.room);



        //when user joins it logs and pushes out message below
        socket.emit('message', formatMessage(kBot,`Welcome to ${room2.room} pub chat!`));   //emits to user who joined

        //broadcasts when a user connects
        socket.broadcast
        .to(user.room)
        .emit('message', formatMessage(kBot, `${user.username} has joined the chat`)
        );   //emits to everyone in chat (not user who connected)

        //send user and room info
        io.to(user.room).emit('roomUsers', {
            room: user.room,
            users: getRoomUsers(user.room)
        });

 });

    //listen for chatMessage
    socket.on('chatMessage', (msg) => {
        const user = getCurrentUser(socket.id);

        io.to(user.room).emit('message', formatMessage(user.username, msg));  //log to server
    });

    
    //runs when user leaves
    socket.on('disconnect', () => {
        const user = userLeave(socket.id);

        if(user){
        io.to(user.room).emit('message', formatMessage(kBot, `${user.username} has left the chat`));

        //send user and room info
          io.to(user.room).emit('roomUsers', {
            room: user.room,
            users: getRoomUsers(user.room)
                });
        }
    });
});

const PORT = process.env.PORT || 3325;

server.listen(PORT, () => console.log(`Server running on port ${PORT}`));