<?php

require_once '../classes/Employee.php' ;
require_once '../classes/Tasks.php' ;


$taskId = $_GET['id'];

if ( isset ($_POST['edit']) ){

    // read data



    $empName =trim(htmlspecialchars(  $_POST['empName'] ));
    $employee = new Employee ;
    $empId = $employee->getId($empName) ;
    $taskName =trim(htmlspecialchars(  $_POST['task_name'] ));
    $description =trim(htmlspecialchars(  $_POST['description'] ));
    $status = trim(htmlspecialchars( $_POST['status'])) ;
    $deadline =trim(htmlspecialchars(  $_POST['deadline'])) ;

    $data = [
        'empId' => $empId['id'] ,
        'empName' => $empName ,
        'taskName' => $taskName ,
        'description' => $description ,
        'status' => $status ,
        'deadline' => $deadline 
    ] ;

        // Validation 



        // if is successful add task

    $newTask = new Tasks ;
    $result = $newTask->updateTask($data , $taskId) ;
    
    if ($result == true) {
      //  header('location:../allTasks.php') ;
      header('location:../allTasks.php') ;

    }
    else {
        header('location:../editTask.php') ;

    }










}