<?php
    require_once '../classes/Employee.php' ;
    session_start();

    
    
    $id = $_GET['id'];
    
 
    
    $emp = new Employee ;
    $result = $emp->deleteEmployee($id);
    
    
    if($result == true){
        header('location:../viewEmployees.php');
    }
    else{
        
    }
