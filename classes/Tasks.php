<?php

require_once 'MySql.php' ;

class Tasks extends MySql {

    public function getTasks($empId){

        $query = "SELECT * FROM tasks WHERE emp_id = $empId " ;

        // var_dump($result); 
        // die();

        $result = $this->connect()->query($query);
        $task = [];
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            array_push($task, $row);
          }
        }
        return $task;

    }


    public function updateTask(array $data, $taskId ){

        $query = " UPDATE tasks 
        SET `task_name` = '{$data['taskName']}' , `description` = '{$data['description']}' ,`status` = '{$data['status']}' ,
        deadline = '{$data['deadline']}' 
        WHERE task_id = '$taskId' "; 
  

        // var_dump($result); 
        // die();

        $result = $this->connect()->query($query);
  
        if ($result == true) {
          return true ;
        }
        else{
          return false ;
        }
  
  
    }


    public function getAllTasks(){
      $query = "SELECT tasks.task_id , tasks.emp_id ,tasks.task_name ,tasks.description ,tasks.status ,tasks.deadline ,employees.name
                FROM tasks JOIN employees
                ON tasks.emp_id = employees.id  " ;


      // var_dump($result); 
      // die();

      $result = $this->connect()->query($query);
      $task = [];
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          array_push($task, $row);
        }
      }
      return $task;

  }


  public function addTask(array $data){
    $data['taskName'] = mysqli_real_escape_string($this->connect() , $data['taskName']) ;
    $data['description'] = mysqli_real_escape_string($this->connect() , $data['description']) ;


    $query = " INSERT INTO tasks(emp_id , task_name , `description` , `status` ,deadline)
    VALUES ('{$data['empId']}','{$data['taskName']}' , '{$data['description']}' , '{$data['status']}' , '{$data['deadline']}' )" ;

    $result = $this->connect()->query($query);
    
    if ($result == true) {
      return true ;
    }
    else{
      return false ;
    }




  }


  public function deleteTask($id) {
  
    $query = "DELETE FROM tasks WHERE task_id='$id' ";

    $result = $this->connect()->query($query);
    
    if($result == true){
        return true ;
    }
    return false ;
            

  }

  public function assignTask(array $data){

    $data['pname'] = mysqli_real_escape_string($this->connect() , $data['pname']) ;
    $data['description'] = mysqli_real_escape_string($this->connect() , $data['description']) ;


    $query = " INSERT INTO tasks(emp_id , task_name , `description` , `status` ,deadline)
    VALUES ('{$data['eid']}','{$data['pname']}' , '{$data['description']}' , '{$data['status']}' , '{$data['duedate']}' )" ;

    $result = $this->connect()->query($query);


    if ($result == true) {
      return true ;
    }
    else{
      return false ;
    }




  }

  public function getTask($taskId){

    $query = "SELECT * FROM tasks WHERE task_id = $taskId" ;

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



public function getTaskData($taskId){
  $query = "SELECT tasks.task_id , tasks.emp_id ,tasks.task_name ,tasks.description ,tasks.status ,tasks.deadline ,employees.name
            FROM tasks JOIN employees
            ON tasks.task_id = '$taskId' " ;


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

public function getTaskId($taskName) {

  $query = "SELECT task_id  FROM tasks WHERE task_name = '$taskName' " ;

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



public function updateActionToDone($id){

  $query = "UPDATE tasks SET `status` =  'completed' WHERE task_id = '$id'  " ;

  $result = $this->connect()->query($query);
  
  if ($result == true) {
    return true ;
  }
  else{
    return false ;
  }


}



public function updateActionToProcess($id){

  $query = "UPDATE tasks SET `status` =  'in process' WHERE task_id = '$id'  " ;

  $result = $this->connect()->query($query);
  
  if ($result == true) {
    return true ;
  }
  else{
    return false ;
  }


}







}