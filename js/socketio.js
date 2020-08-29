$(document).ready(function () {
    const socket = io('http://localhost:4040');
    
    //usuario/mensaje : emite
    $(document).on('click', '#send', (e) => {
        socket.emit('chat:message',{
            message:$('#message').val(),
            userName:$('#userName').attr('userName')
        });
    });

    $("#message").keyup(function(e){ 
        let code = e.key; // recommended to use e.key, it's normalized across devices and languages       
    });

    //Usuario se encuentra escribiendo : emite
    $('#message').keyup(function(e){
        let code=e.key;
        if(code==="Enter"){
            socket.emit('chat:message',{
                message:$('#message').val(),
                userName:$('#userName').attr('userName')
            });
            $('#message').val('');
        }else{
            socket.emit('chat:typing',$('#userName').attr('userName'));
        }
    })

    //usuario/mensaje : Recibe
    socket.on('chat:message',function(data){
        $("#output").append(`<p> <strong>${data.userName}</strong>:${data.message}</p>`);
        $("#actions").html(`<p><em></em></p>`);
    });

    //usuario/mensaje : emite
    socket.on('chat:typing',function(data){
        $("#actions").html(`<p><em>${data} esta escribiendo</em></p>`);
    })
});






