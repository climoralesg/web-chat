$(document).ready(function () {
    const socket = io('http://localhost:4040');
    
    $(document).on('click', '#send', (e) => {
        //$("#output").append(`<p> <strong>Usuario</strong>:${$('#message').val()}</p>`);
        socket.emit('chat:message',{
            message:$('#message').val(),
        });
    });

    $('#message').keyup(function(){
        socket.emit('chat:typing',"el usuario");
        //socket.emit('chat:typing',userName.value);
    })

    socket.on('chat:message',function(data){
        $("#output").append(`<p> <strong>Usuario:</strong>:${data.message}</p>`);
    });

    socket.on('chat:typing',function(data){
        $("#actions").html(`<p><em>${data} Esta Escribiendo</em></p>`);
    })
});






