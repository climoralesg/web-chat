$(document).ready(function () {
    const socket = io('http://localhost:3000');
    
    $(document).on('click', '#send', (e) => {
        //$("#output").append(`<p> <strong>Usuario</strong>:${$('#message').val()}</p>`);
        socket.emit('chat:message',{
            message:$('#message').val(),
        });
    });
    socket.on('chat:message',function(data){
        $("#output").append(`<p> <strong>Usuario</strong>:${$('#message').val()}</p>`);
    })
});






