<?php

class DBconnection{

    private $host="localhost";
    private $username= "root";
    private $password="1234";
    private $port=3306;
    private $database="udarabatterysales";

    private $connection;

    public function __construct()
    {
        $this->connection=new mysqli($this->host,$this->username,$this->password,$this->database,$this->port);
        if($this->connection->connect_errno){
            echo $this->connection->connect_error;
            die;
        }
    }

    public function getConnection(){
        return $this->connection;
    }


}