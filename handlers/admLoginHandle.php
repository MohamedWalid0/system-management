<?php 
use validation\Validator ;

require_once '../classes/validation/Validator.php' ;
require_once '../classes/Admin.php' ;

session_start() ;


if (  isset($_POST['submit'] ) )  {
    //read date 
    $admEmail =trim(htmlspecialchars(  $_POST['admEmail'])) ;
    $admPassword =trim(htmlspecialchars(  $_POST['admPassword'] ));

    //validation
    $v = new Validator ;
    $v->rules('email' , $admEmail , ['required' , 'string' , 'max']) ;
    $v->rules('password' , $admPassword , ['required' , 'string']) ;
    $errors = $v->errors ;
  


    // if data is valid 
    if ($errors == []) {
        $admin = new Admin ;
        $result = $admin->attempt($admEmail , $admPassword) ;

        if ($result != null) {  // admin login is successful

            $_SESSION['admEmail'] = $result['email'] ;
            $_SESSION['adminName'] = $result['name'] ;

            $_SESSION['admId'] = $result['id'] ;

            header('location:../allTasks.php') ;

        }
        else {
            $_SESSION['errors'] = ['Your data is not valid'] ;
            header('location:../admLogin.php');

        }


    }
    else{
        
        $_SESSION['errors'] = $errors ;
        header('location:../admLogin.php');

    }




}





else{
    header('location:../admLogin.php');
}
