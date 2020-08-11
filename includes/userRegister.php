<?php
    
    include('connection.php');
    $email=$_POST['email'];
    $password=$_POST['password'];
    $userName=$_POST['userName'];
    //Si no hay datos vacios
    if(!empty($email) && !empty($password) && !empty($userName)){        
        $link=new Connection('localhost','root','','chat');

        $searchUser="SELECT * FROM users WHERE email LIKE '$email'";
        $insertUser="INSERT INTO users(email,password,userName) values ('$email','$password','$userName')";

        $resultSearch=query($link,$searchUser);

        if(!$resultSearch){
            die('Query Error'.mysqli_error($link->getConnection()));
            sendMessage(1,"Hubo un error en la insercion de datos");
        }else{
            if(mysqli_num_rows($resultSearch)>0){
                sendMessage(2,"Email ya se encuentra registrado");
            }else{
                $resultInsert=query($link,$insertUser);
                if(!$resultInsert){
                    die('insert Error'.mysqli_error($link->getConnection()));
                    sendMessage(1,"Hubo un error en la insercion de datos");
                }else{
                    sendMessage(0,"Usuario registrado de forma exitosa");
                }
            }
        }
    //Si existen datos vacios.    
    }else{
        sendMessage(3,"Los datos enviados son vacios");
    }

    function query($link,$query){      
        return mysqli_query($link->getConnection(),$query);
    }

    function sendMessage($code,$message){
        $json=(object)[
            "code"=>$code,"message"=>$message
        ];
        $jsonString=json_encode($json);
        echo $jsonString;
    }

?>