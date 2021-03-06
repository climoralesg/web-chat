<?php
session_start();
if (empty($_SESSION['login_user'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">

                <span class="login100-form-title" type="text">
                    Bienvenido
                </span>

                <span class="login100-form-title p-b-33" id="userName" name="userName" userName="<?php echo $_SESSION['login_user'] ?>" type="text">
                    <?php echo $_SESSION['login_user'] ?>
                </span>
                
                <div id="chat-container">
                    <div id="chat-window">
                        <div id="output">

                        </div>
                    </div>
                </div>

                <div id="actions">

                </div>
                <div class="wrap-input100 rs1 validate-input" data-validate="Mensaje es validado">
                    <input class="input100" type="message" id="message" name="message" placeholder="Mensaje">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                

                <div class="container-login100-form-btn m-t-20">
                    <button class="login100-form-btn" id="send" name="send">
                        Enviar
                    </button>
                </div>
                
                <div class="container-login100-form-btn m-t-10">
                    <a class="login100-form-btn" id="exit" name="exit" href="includes/logout.php">
                        Salir
                    </a>
                </div>
                
            </div>
        </div>
    </div>



    <!--===============================================================================================-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.1/socket.io.js"></script>
    <!--===============================================================================================-->
    <script src="js/socketio.js"></script>
    <!--===============================================================================================-->
    <script src="js/chat.js"></script>
</body>

</html>