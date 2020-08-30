<?php

require_once 'MySql.php' ;

class Employee extends MySql {

    public function attempt($empEmail , $empPassword){
        
        // var_dump($email); 
        // var_dump($password); 

        // die();

        $query = "SELECT * FROM employees 
        WHERE email = '$empEmail' AND `password` = '$empPassword' " ;

        $result = $this->connect()->query($query) ;
        $user = null ;

        // var_dump($result); 
        // die();

        if ($result->num_rows == 1){
            $user = $result->fetch_assoc() ;
        }

        return $user ;


    }

    

    public function employeesNames(){
        $query = " SELECT `name` FROM employees" ; 
        $result = $this->connect()->query($query) ;
        $names= [] ;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              array_push($names, $row);
            }
          }
        return $names;
    

    }


    public function getId($empName) {

        $query = "SELECT id FROM employees WHERE `name` = '$empName'  " ;

        // var_dump($result); 
        // die();

        $result = $this->connect()->query($query);
        $id = null ;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $id = $row ;
          }
        }
        return $id;

    }




    public function addEmployee(array $data){

      $query = " INSERT INTO employees(`name` , email , `password` , `phone` ,city , gender , birthday)
      VALUES ('{$data['empName']}','{$data['empEmail']}' , '{$data['empPassword']}' , '{$data['phone']}' , '{$data['city']}' , '{$data['gender']}', '{$data['birthday']}')" ;
  
      $result = $this->connect()->query($query);
  
      if ($result == true) {
        return true ;
      }
      else{
        return false ;
      }
  
    }


    public function deleteEmployee($id){

      $query = "DELETE FROM employees WHERE id='$id' ";

      $result = $this->connect()->query($query);
      
      if($result == true){
          return true ;
      }
      return false ;
              
      
    }

    public function updateEmployee(array $data ,$id){

      $query = " UPDATE employees 
      SET `name` = '{$data['name']}' , email = '{$data['email']}' ,`password` = '{$data['password']}' ,
      phone = '{$data['phone']}' , city = '{$data['city']}' , gender = '{$data['gender']}' , `pic`= '{$data['picture']}'
      WHERE id = '$id' "; 
  
      $result = $this->connect()->query($query);
  
      if ($result == true) {
        return true ;
      }
      else{
        return false ;
      }




    }



    public function getAllEmployees(){
      $query = " SELECT * FROM `employees` " ;


      // var_dump($result); 
      // die();

      $result = $this->connect()->query($query);
      $employees = [];

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          array_push($employees, $row);
        }
      }
      
      return $employees;

     }






     public function getEmpData($empId){
      $query = "SELECT *  FROM employees WHERE id = '$empId' " ;
    
    
      // var_dump($result); 
      // die();
    
      $result = $this->connect()->query($query);
      $data = null ;
    
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $data = $row ;
        }
      }
      
      return $data;
    
    }














    }



  






  
