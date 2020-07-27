<?php
    class Connection{

        public $connection;

        public function __construct($server,$user,$password,$db){
            $this->connection=mysqli_connect($server,$user,$password,$db);
        }

        public function getConnection(){
            return $this->connection;
        }
    }
?>
