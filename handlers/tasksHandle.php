<?php

session_start() ;


if (isset ($_POST['submit'])){

    var_dump($_SESSION['task_id']);
    die();
}