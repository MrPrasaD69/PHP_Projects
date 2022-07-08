<?php

include('database.php');

if(isset($_POST['create'])){
   
      $msg=insert_data($con);
      
}

// insert query
function insert_data($con){
   
      $full_name= legal_input($_POST['name']);
      $query="INSERT INTO students (Name) VALUES ('$full_name')";
      $exec= mysqli_query($con,$query);
      if($exec){

        $msg="Data was inserted sucessfully";
        return $msg;
      
      }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($con);
      }
}

// convert illegal input to legal input
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>