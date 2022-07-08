<?php

include('database.php');


if(isset($_GET['edit'])){

    $id= $_GET['edit'];
  $editData= edit_data($con, $id);
}

if(isset($_POST['update']) && isset($_GET['edit'])){

  $id= $_GET['edit'];
    update_data($con,$id);
    
    
} 
function edit_data($con, $id)
{
 $query= "SELECT * FROM students WHERE ID= $id";
 $exec = mysqli_query($con, $query);
 $row= mysqli_fetch_assoc($exec);
 return $row;
}

// update data query
function update_data($con, $id){

    $full_name= legal_input($_POST['name']);
      
      $query="UPDATE students 
            SET Name='$full_name' WHERE ID=$id";

      $exec= mysqli_query($con,$query);
  
      if($exec){
         header('location:user-table.php');
      
      }else{
         $msg= "Error: " . $query . "<br>" . mysqli_error($con);
         echo $msg;  
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