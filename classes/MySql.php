<?php


class MySql{

    private $servername , $db_username ,$db_password , $db_name ;
    
    public function connect(){

        $this->servername ='localhost' ;
        $this->db_username = 'root' ;
        $this->db_password = '' ;
        $this->db_name = 'management system' ;
        
        $conn = new mysqli($this->servername ,$this->db_username , $this->db_password ,$this->db_name);

       // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn ;
        
    }

}