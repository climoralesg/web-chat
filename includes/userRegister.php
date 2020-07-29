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

            $json=(object)[
                "code"=>1,"message"=>"Hubo un error en la insercion de datos"
            ];
        }else{

            if(mysqli_num_rows($resultSearch)>0){
                $json=(object)[
                    "code"=>2,"message"=>"Email ya se encuentra registrado"
                ];
            }else{
                $resultInsert=query($link,$insertUser);
                
                if(!$resultInsert){
                    die('insert Error'.mysqli_error($link->getConnection()));
                    
                    $json=(object)[
                        "code"=>1,"message"=>"Hubo un error en la insercion de datos"
                    ];

                }else{
                    $json=(object)[
                        "code"=>0,"message"=>"Usuario insertado de forma exitosa"
                    ];
                }
            }
        }

        $jsonString=json_encode($json);
        echo $jsonString;
    //Si existen datos vacios.    
    }else{
        $json=(object)[
            "code"=>4,"message"=>"Los datos enviados son vacios"
        ];
            $jsonString=json_encode($json);
        echo $jsonString;
    }

    function query($link,$query){      
        
        return mysqli_query($link->getConnection(),$query);

    }

?>