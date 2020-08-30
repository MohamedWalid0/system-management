<?php
require_once '../classes/Employee.php' ;



if ( isset ($_POST['submit']) ){

    // read data

    $empName =trim(htmlspecialchars(  $_POST['name'] )) ;
    $empEmail =trim(htmlspecialchars( $_POST['email'] ));
    $empPassword = trim(htmlspecialchars($_POST['password'])) ;
    $city =trim(htmlspecialchars( $_POST['city'])) ;
    $gender =trim(htmlspecialchars( $_POST['gender'] ));
    $phone =trim(htmlspecialchars( $_POST['phone'] ));
    $birthday =trim(htmlspecialchars( $_POST['birthday'])) ;

    $data = [
        'empName' => $empName ,
        'empEmail' => $empEmail ,
        'empPassword' => $empPassword ,
        'city' => $city ,
        'gender' => $gender ,
        'phone' => $phone ,
        'birthday' => $birthday 
    ] ;

 
        // Validation 



        // if is successful add task

    $newTask = new Employee ;
    $result = $newTask->addEmployee($data) ;

 
    
    if ($result == true) {
        header('location:../viewEmployees.php') ;
    }
    else {
        header('location:../addEmployee.php') ;

    }










}