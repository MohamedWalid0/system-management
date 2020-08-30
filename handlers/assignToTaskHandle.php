<?php
require_once '../classes/Tasks.php' ;

session_start();


$id = $_GET['id'] ;

if (isset($_POST['assign'])){
    
    $eid = trim(htmlspecialchars( $_POST['eid'])) ;
    $pname = trim(htmlspecialchars( $_POST['pname'] ));
    $duedate = trim(htmlspecialchars( $_POST['duedate'] ));

    $dd = new Tasks ;
    $row = $dd->getTask($id) ;

    $description = $row['description'] ;
    $status = $row['status'] ;




    $data = [
        'eid' => $eid ,
        'pname' => $pname ,
        'duedate' => $duedate ,
        'description' => $description ,
        'status' => $status 
    ] ;




    $result = $dd->assignTask($data) ; 

    if ($result == true){
        header('location:../allTasks.php') ;
    }


}