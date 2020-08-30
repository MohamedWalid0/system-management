<?php
use validation\Validator ;

require_once '../classes/validation/Validator.php' ;
require_once '../classes/Employee.php' ;
require_once '../classes/Tasks.php' ;




if ( isset ($_POST['submit']) ){

    // read data

    $empName = trim(htmlspecialchars(  $_POST['empName'] ));
    $employee = new Employee ;
    $empId = $employee->getId($empName) ;
    $taskName =trim(htmlspecialchars(  $_POST['task_name'])) ;
    $description =trim(htmlspecialchars(  $_POST['description'])) ;
    $status =trim(htmlspecialchars(  $_POST['status'] ));
    $deadline =trim(htmlspecialchars(  $_POST['deadline'])) ;

    $data = [
        'empId' => $empId['id'] ,
        'taskName' => $taskName ,
        'description' => $description ,
        'status' => $status ,
        'deadline' => $deadline 
    ] ;

    // Validation 

    $v = new Validator ;

    $v->rules('TaskName' , $data['taskName'] , ['required' , 'string']) ;
    $v->rules('Description' , $data['description'] , ['required']) ;
    $v->rules('status' , $data['status'] , ['required']) ;
    $v->rules('deadline' , $data['deadline'] , ['required']) ;

    $errors = $v->errors ;




    // if is successful add task
    if ($errors == []){

        $newTask = new Tasks ;
        $result = $newTask->addTask($data) ;
        
        if ($result == true) {
            header('location:../allTasks.php') ;
        }
        else {
            $_SESSION['errors'] = ['somthing error , please try again'] ;
            header('location:../addTask.php') ;
        }

    }

    else{
        
        $_SESSION['errors'] = $errors ;
        header('location:../addTask.php');

    }









}