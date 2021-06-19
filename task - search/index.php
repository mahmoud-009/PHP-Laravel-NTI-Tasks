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
  <?php 
  
  session_start();

 $server ="localhost";
 $dbName ="phpnti";
 $dbUser ="root";
 $dbPassword = "";

    $con =mysqli_connect($server, $dbUser, $dbPassword,$dbName );
    if ($con){
      echo 'DONE';
    }else{ 
      die('Error:'.mysqli_connect_error());
    }


    if($_SERVER['REQUEST_METHOD'] == "GET"){
  
  $name     = $_REQUEST['name'];

    $sql = "select * from products where name LIKE '%$name%' ";
  
    $op = mysqli_query($con,$sql);
 

     $data = mysqli_fetch_assoc($op); 



   
  
      
      


      }





     ?>
 
<form class="m-5 col-5"  action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="GET"  >
  <div class="mb-3">
    <label  class="form-label">name</label>
    <input type="name" name="name" class="form-control" >
     
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   
<table class="table table-hover table-striped ">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Code</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>

    </tr>
   
  </thead>
  
  <tbody>
  <?php 
           $op = mysqli_query($con,$sql);
           
           while($data = mysqli_fetch_assoc($op))
           {
           ?>
    <tr>
          <th scope="row" ><?php echo $data['id'];?></th>
           <td><?php echo $data['name'];?></td>
           <td><?php echo $data['code'];?></td>
           <td><?php echo $data['price'];?></td>
           <td><?php echo $data['category'];?></td>

         
    </tr>
    <?php } ?>
  </tbody>
 

</table>

</body>
</html>
<?php

  


 

  
?>


