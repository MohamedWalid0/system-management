<?php 
require_once '../classes/Tasks.php' ;
session_start();
$id = $_GET['id'] ;

$action = new Tasks ;

$result = $action->updateActionToDone($id) ;

if ($result == true) {

    header('location:../myTasks.php') ;

}



