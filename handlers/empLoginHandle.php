<?php 
use validation\Validator ;

require_once '../classes/validation/Validator.php' ;
require_once '../classes/Employee.php' ;

session_start() ;


if (  isset($_POST['submit']) )  {
    //read date 
    $empEmail = trim(htmlspecialchars( $_POST['empEmail'] ));
    $empPassword = trim(htmlspecialchars( $_POST['empPassword'] ));

    //validation
    $v = new Validator ;
    $v->rules('email' , $empEmail , ['required' , 'string' , 'max']) ;
    $v->rules('password' , $empPassword , ['required' , 'string']) ;
    $errors = $v->errors ;

    // var_dump($errors) ;
    // die();

    // is data is valid 
    if ($errors == []){

        $employee = new employee ;
        $result = $employee->attempt($empEmail , $empPassword) ;

        if ($result != null) {  // employee login is successful

            $_SESSION['empEmail'] = $result['email'] ;

            $_SESSION['empName'] = $result['name'] ;
            $_SESSION['empPic'] = $result['pic'] ;

            $_SESSION['empId'] = $result['id'] ;


            header('location:../myTasks.php') ;

        }
        else {
            $_SESSION['errors'] = ['Your email or password is not valid , please try again '] ;
            header('location:../empLogin.php');

        }


    }
    else{
        
        $_SESSION['errors'] = $errors ;
        header('location:../empLogin.php');

    }


}



else{
    header('location:../empLogin.php');
}
