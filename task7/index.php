<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>


<div class="container">
<div class="row">
<form class="col-3 m-5" action="<?php echo $_SERVER['PHP_SELF']; ?>"   method="POST"  enctype ="multipart/form-data" >
<div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name"  >
  </div>
  <div class="mb-3">
    <label   class="form-label">Code</label>
    <input type="text" class="form-control" name="code">
  </div>
  <div class="mb-3">
    <label   class="form-label">price</label>
    <input type="text" class="form-control"  name="price">
  </div>
  <div class="mb-3">
    <label   class="form-label">category</label>
    <input type="text" class="form-control"  name="category">
  </div>
   
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="col-8">

<?php

require('db.php');

function Clean($input)
{

    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripcslashes($input);

    return $input;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = clean($_REQUEST['name']);
    $code = Clean($_REQUEST['code']);
    $price = Clean($_REQUEST['price']);
    $category = Clean($_REQUEST['category']);
    
    $errorMessages = array();

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






    if(count($errorMessages)>0){
        foreach($errorMessages as $key => $data){
            echo("<div class='alert alert-danger col-4 my-5'> $key :  $data  <br>  </div>");
 
         
        }
    }else{
        $sql = "insert into products (name,code,price,category) values ('$name','$code',$price,'$category')";

        $op  =  mysqli_query($con,$sql);
 
 if($op){
    
   header("Location: display.php"); 
 }else{
   echo 'Error Try Again !!';
 }
  
    }
}
 

?>






</div>



</div>

</div>


</body>
</html>