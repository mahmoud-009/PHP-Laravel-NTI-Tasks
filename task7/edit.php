<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
    <?php  require 'db.php'; 
    
  if($_SERVER['REQUEST_METHOD'] == "GET"){

    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $message = '';

    if(filter_var($id,FILTER_VALIDATE_INT)){
        // CODE 
     
        $sql = "select * from products where id=".$id;
        $op  = mysqli_query($con,$sql);

         if(mysqli_num_rows($op) == 0){
             $message = "Id not found";
         }else{
             $data = mysqli_fetch_assoc($op);
         }

    
    }else{
           $message = "Invalid id";
    }
  


    if(strlen($message) > 0){

        $_SESSION['message'] = $message;
        header("Location: display.php");
    }
  } 




  


  
?>


















<div class="container">
<div class="row">
<form   class="col-3 m-5"   action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="POST"  enctype ="multipart/form-data">
<div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text"  value="<?php echo $data['name'];?>" class="form-control" name="name"  >
  </div>
  <div class="mb-3">
    <label   class="form-label">code</label>
    <input type="text" value="<?php echo $data['code'];?>"  class="form-control" name="code">
  </div>

  <input type="hidden" name="id"  value="<?php echo $data['id'];?>">

  <div class="mb-3">
    <label   class="form-label">price</label>
    <input type="text"  value="<?php echo $data['price'];?>" class="form-control"  name="price">
  </div>
  <div class="mb-3">
    <label   class="form-label">category</label>
    <input type="text" value="<?php echo $data['category'];?>"  class="form-control"  name="category">
  </div>
   
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="col-8">

<?php



function Clean($input)
{

    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripcslashes($input);

    return $input;
}

$errorMessages = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = clean($_REQUEST['name']);
    $code = Clean($_REQUEST['code']);
    $price = Clean($_REQUEST['price']);
    $category = Clean($_REQUEST['category']);
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $message  = ''; 

   

    if (empty($name)) {

        $errorMessages['name'] = "Name Feild Required";
    } else {
        if (strlen($name) < 6) {
            $errorMessages['name'] = "Name must be >= 6";
        } elseif (!preg_match("/^[a-zA-Z-']*$/", $name)) {

            $errorMessages['name'] = "Only chars allowed";

        }
    }
    if (empty($code)) {
        $errorMessages['code'] = "code Field Required";
    } else {

       
        if (strlen($price) < 6) {
            $errorMessages['code'] = "price Must Be >= 6 ";
        }

    }
    if (empty($price)) {
        $errorMessages['price'] = "price Field Required";
    } else {

        if (strlen($price) < 6) {
            $errorMessages['price'] = "price Must Be >= 6 ";
        }

    }
    if (empty($category)) {
        $errorMessages['category'] = "category Field Required";
    } else {

        if (strlen($price) < 6) {
            $errorMessages['category'] = "category Must Be >= 6 ";
        }

    }
    if(!filter_var($id,FILTER_VALIDATE_INT)){

        $errorMessages['id'] = "Invalid ID";
       }






if(count($errorMessages) == 0){
  
    
  $sql = "update products set name = '$name' , code = '$code' , price=$price , category='$category'  where id = ".$id;
  $op  =  mysqli_query($con,$sql);
  
  if($op){ 
     $message =  'Data updated';
   }else{
     $message =  'Error Try Again !!';
    }

    $_SESSION['message'] = $message;
    header("Location: display.php");

  }
  
  else{
    $_SESSION['errorMessage'] = $errorMessages;   
    header("Location: edit.php?id=".$id); 
   }

}



?>


<?php 

 

  if(isset( $_SESSION['errorMessage'])){

   // print_r( $_SESSION['errorMessage']);
       foreach($_SESSION['errorMessage'] as $key => $data){

      echo '*'.$key.' >>> '.$data.'<br>';

    }

  }

?>



</body>
</html>