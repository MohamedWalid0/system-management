<?php
require_once '../classes/Employee.php' ;
session_start() ;


if ( isset ($_POST['update']) ){

    // read data
    $empId = $_GET['id'] ;

    $firstName =trim(htmlspecialchars(  $_POST['firstName'])) ;
    $lastName =trim(htmlspecialchars(  $_POST['lastName'] ));
    $email =trim(htmlspecialchars(  $_POST['email'] ));
    $password =trim(htmlspecialchars(  $_POST['password'] ));
    $city =trim(htmlspecialchars(  $_POST['city'])) ;
    $gender =trim(htmlspecialchars(  $_POST['gender'] ));
    $phone =trim(htmlspecialchars(  $_POST['phone'])) ;
    // $picture = $_FILES['picture'] ;

    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
 //   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $img_ext = pathinfo($target_file , PATHINFO_EXTENSION);



    $img_new_name = uniqid() . "." . $img_ext ; 
    

    $is_valid = true ;

    $name = $firstName ." ". $lastName ;
  

 

        // Validation 




        // validate picture 

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["picture"]["tmp_name"]);

        if($check == false) {
            $_SESSION['picture'] = ["file is not image"] ;
            $is_valid = false ;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $_SESSION['picture'] = ["sorry , file already exist"] ;
            $is_valid = false ;

        }

       

       
        // Check file size
        if ($_FILES["picture"]["size"] > 50000000000) {
            $_SESSION['picture'] = ["sorry , file is too large size"] ;
            $is_valid = false ;

        }
      

        
        // Allow certain file formats
        if($img_ext != "jpg" && $img_ext != "png" && $img_ext != "jpeg"
        && $img_ext != "gif" ) {
            $_SESSION['picture'] = ["sorry , picture must be jpg , png , jpeg or gif"] ;
            $is_valid = false ;
        }


        if ($is_valid == true){
            $_SESSION['empPicture'] = $img_new_name ;
            move_uploaded_file($_FILES["picture"]["tmp_name"], "../images/$img_new_name") ;
        }

        
        
       


        $data = [
            'name' => $name ,
            'email' => $email ,
            'password' => $password ,
            'city' => $city ,
            'gender' => $gender ,
            'phone' => $phone ,
            'picture' => $img_new_name
        ] ;
    
        // if is successful add task

    $newTask = new Employee ;
    $result = $newTask->updateEmployee($data , $empId) ;

 
    
    if ($result == true) {
        header('location:../myTasks.php') ;
    }
    else {
        header('location:../myProfile.php') ;

    }










}