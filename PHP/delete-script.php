<?php

include("database.php");
if(isset($_GET['delete'])){

    $id= $_GET['delete'];
  delete_data($con, $id);

}

// delete data query
function delete_data($con, $id){
   
    $query="DELETE from students WHERE ID=$id";
    $exec= mysqli_query($con,$query);

    if($exec){
      header('location:user-table.php');
    }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($con);
      echo $msg;
    }
}
?>