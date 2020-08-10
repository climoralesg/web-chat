<?php

include('connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($email) && !empty($password)) {

    $link = new Connection('localhost', 'root', '', 'chat');
    $query = "SELECT * FROM users WHERE email LIKE '$email' and password LIKE '$password'";
    $result = mysqli_query($link->getConnection(), $query);

    if (!$result) {
        die('Query Error' . mysqli_error($link->getConnection()));
        sendMessage(1, "Hubo un error en la consulta");
    } else {
        if (mysqli_num_rows($result) == 0) {
            sendMessage(2, "Usuario o contraseña no encontrados");
        } else {
            while ($row = mysqli_fetch_array($result)) {
                sendMessage(0, "Usuario encontrado");
            }
        }
    }
} else {
    sendMessage(3, "Los datos estan incompletos");
}

function sendMessage($code, $message){
    $json = (object)[
        "code" => $code, "message" => $message
    ];
    $jsonString = json_encode($json);
    echo $jsonString;
}
