<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task 11</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<?php 

session_start();

$server = "localhost";
$dbName = "phpnti";
$dbUser = "root";
$dbPassword = "";


    $con =  mysqli_connect($server,$dbUser,$dbPassword,$dbName);

    if(!$con){

        die('Error:'.mysqli_connect_error());

    }
     
    $sql= "SELECT users.* , natinoalid.* , department.* from users JOIN natinoalid on users.nat_id = natinoalid.id JOIN department on users.dep_id =department.id";
    $op =  mysqli_query($con,$sql);

?>

<div class="container">
    
<table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>national id</th>
                <th>Depatment</th>
            </tr>


           <?php 
            $op =  mysqli_query($con,$sql);
           while($data = mysqli_fetch_assoc($op))
           {
           ?>

           <tr>
           <td><?php echo $data['id'];?></td>
           <td><?php echo $data['name'];?></td>
           <td><?php echo $data['email'];?></td>
           <td><?php echo $data['age'];?></td>
           <td><?php echo $data['nat_id'];?></td>
           <td><?php echo $data['depart_name'];?></td>
           </tr>

        <?php } ?>
</div>


</body>
</html>