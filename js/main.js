
$(document).ready(function () {
    "use strict";


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('#validate-form').submit(e => {
        e.preventDefault(); //previene que actue a form y vaya al php
        var check = true;
        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }
        // Si fueron ingresados los valores de mail y pass correctamente
        if (check == true) {

            const postData = { //crea un objeto
                email: $('#email').val(),
                password: $('#password').val()
            };
            const url = 'includes/userSearch.php';
            $.ajax({
                url: url,
                data: postData,
                type: "POST",
                contenttype: "application/json; charset=utf-8",

                success: function (response) {
                    if (!response.error) {
                        let respuesta = JSON.parse(response);

                        switch (respuesta['code']) {
                            case 0:
                                window.location.href = './chat.php?userName='+respuesta['userName'];
                                break;
                            case 1:
                                console.log(respuesta['message']);
                                break;
                            case 2:
                                console.log(respuesta['message']);
                                break;
                            case 3:
                                console.log(respuesta['message']);
                                break;
                        }
                    }
                },
                error: function () {
                    console.log("Hubo un error en la consulta");
                }
            });
            // no fueron ingresados los valores de mail y pass
        } else {

        }
    });


    $('#register-form').submit(e => {
        e.preventDefault(); //previene que actue a form y vaya al php
        var check = true;
        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }
        // Si fueron ingresados los valores de mail y pass correctamente
        if (check == true) {

            const postData = { //crea un objeto
                email: $('#email').val(),
                password: $('#password').val(),
                userName: $('#userName').val()
            };

            const url = 'includes/userRegister.php';

            $.ajax({
                url: url,
                data: postData,
                type: "POST",
                contenttype: 'application/json; charset=utf-8',
                success: function (response) {
                    if (!response.error) {
                        let respuesta = JSON.parse(response);
                        console.log(respuesta);
                        switch (respuesta['code']) {
                            case 0:
                                location.href = "./index.html"
                                console.log("respuesta " + respuesta['message']);
                                break;
                            case 1:
                                console.log("respuesta" + respuesta['message'])
                                break;
                            case 2:
                                console.log("respuesta " + respuesta['message']);
                                break;
                            case 3:
                                console.log("respuesta " + respuesta['message']);
                                break;
                            case 4:
                                console.log("respuesta " + respuesta['message']);
                                break;
                        }

                    }
                },
                error: function () {
                    console.log("hubo un error")
                }
            })

        } else {
            // no fueron ingresados los valores de mail y pass
        }

    });


    $('.validate-form .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email' || $(input).attr('userName') == 'userName') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).removeClass('alert-validate');
    }



});