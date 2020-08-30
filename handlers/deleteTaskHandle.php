<?php
    require_once '../classes/Tasks.php' ;
    session_start();

    
    
    $id = $_GET['id'];
    
 
    
    $emp = new Tasks ;
    $result = $emp->deleteTask($id);
    
    
    if($result == true){
        header('location:../allTasks.php');
    }
    else{
        header('location:../allTasks.php');

    }
