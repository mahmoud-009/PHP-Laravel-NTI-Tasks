<?php 

require('db.php');

 $id =  filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

 $message = '';

  if(filter_var($id,FILTER_VALIDATE_INT)){

     
    $sql = "delete from products where id =".$id;

     $op = mysqli_query($con,$sql);
     
     if($op){
         $message = "customer deleted";
     }else{
         $message = "Error in delete user";
     }


  }else{
    
     $message = "Invalid id ";
  }



    $_SESSION['message'] =  $message;

     header("Location: display.php");

?>