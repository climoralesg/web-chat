<?php
    include('connection.php');

    
    $email=$_POST['email'];
    $passwoord=$_POST['password'];
    
    if(!empty($email) && !empty($pass)){
        $link = new Connection('','','','');

        $query="SELECT * FROM users WHERE email LIKE '$email' and password LIKE 'password' ";
        $result=mysqli_query($link->getConnection(),$query);

        if(!$result){
            die('Query Error'.mysqli_error($link->getConnection()));
        }else{
            $json=array();
            while($row = mysqli_fetch_array($result)){
                $json[]=array(
                    'code'=>0,
                    'message'=>"Se ha encontrado usuario"
                );
            }
        }
        $jsonString=json_encode($json);
        echo $jsonString;
    }else{

    }
?>