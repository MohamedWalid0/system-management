<?php

require_once 'MySql.php' ;

class Admin extends MySql {

    public function attempt($admEmail , $admPassword){
        
        // var_dump($email); 
        // var_dump($password); 

        // die();

        $query = "SELECT * FROM admins 
        WHERE email = '$admEmail' AND `password` = '$admPassword' " ;

        $result = $this->connect()->query($query) ;
        $user = null ;

        // var_dump($result); 
        // die();

        if ($result->num_rows == 1){
            $user = $result->fetch_assoc() ;
        }

        return $user ;


    }





}