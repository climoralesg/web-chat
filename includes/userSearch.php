<?php
    include('connection.php');
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    if(!empty($email) && !empty($password)){

        $link = new Connection('localhost','root','','chat');
        $query="SELECT * FROM users WHERE email LIKE '$email' and password LIKE '$password'";
        $result=mysqli_query($link->getConnection(),$query);

        if(!$result){
            die('Query Error'.mysqli_error($link->getConnection()));
            $json=(object)[
                "code"=>1,"message"=>"Hubo un error en la consulta"
            ];
        }else{

            if(mysqli_num_rows($result)==0){
                $json=(object)[
                    "code"=>2,"message"=>"Usuario o contraseña no encontrada"
                ];

            }else{
                    //$json=array();
                while($row = mysqli_fetch_array($result)){
                    /*
                    $json[]=array(
                        'code'=>0,
                        'message'=>"Usuario encontrado"
                    );
                    */
                    //Objeto sin invocar
                    $json=(object)[
                        "code"=>0,"message"=>"Usuario encontrado","userName"=>$row['userName']
                    ];
                }

            }
            $jsonString=json_encode($json);
            echo $jsonString;
        }
    }else{
        $json=(object)[
            "code"=>4,"message"=>"Los datos estan incompletos"
        ];
    }
?>