<?php
    class Connection{

        public $server;
        public $user;
        public $password;
        public $db;

        public function __construct($server,$user,$password,$db){
            $this->server=$server;
            $this->user=$user;
            $this->password=$password;
            $this->db=$db;
        }

        function connect(){
            return mysqli_connect($this->server,$this->user,$this->password,$this->db);
        }
    }
?>
