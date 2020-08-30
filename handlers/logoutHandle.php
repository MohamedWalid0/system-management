<?php

session_start() ;

if(!isset($_SESSION['empId']) && ! isset($_SESSION['admId'])){
    header('location:../login.php');
    die();
}
session_destroy() ;
header('location:../index.php') ;

?>