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
<!-- -Task
Create 2 php files one of them has a form with the following inputs
(name, email, password, address, gender, linkedin url)
Validate inputs then store data into session, when user open the second file can show stored data. -->
<nav class="navbar navbar-expand-lg     navbar-dark bg-primary">

  <div class="container-fluid">
  <a class="navbar-brand" href="#">Task 4</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/nti/task4/show.php">Show the Data</a>
        </li>

      </form>
    </div>
  </div>
</nav>

<div class="container">
<div class="row">
<form class="col-3 m-5" action="<?php echo $_SERVER['PHP_SELF']; ?>"   method="POST"  enctype ="multipart/form-data" >
<div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name"  >
  </div>
  <div class="mb-3">
    <label   class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label   class="form-label">Password</label>
    <input type="password" class="form-control"  name="password">
  </div>
  <div class="mb-3">
    <label  class="form-label">Address</label>
    <input type="text" class="form-control" name="address" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="col-8">

<?php
 session_start();

function Clean($input)
{

    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripcslashes($input);

    return $input;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = clean($_REQUEST['name']);
    $email = Clean($_REQUEST['email']);
    $password = Clean($_REQUEST['password']);
    $address = Clean($_REQUEST['address']);

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
    if (empty($email)) {
        $errorMessages['email'] = "Email Field Required";
    } else {

        if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $errorMessages['email'] = "Invalid Email";
        }

    }
    if (empty($password)) {
        $errorMessages['password'] = "Password Field Required";
    } else {

        if (strlen($password) < 6) {
            $errorMessages['password'] = "Password Must Be >= 6 ";
        }

    }
    if (empty($address)) {
        $errorMessages['address'] = "address Field Required";
    } else {

        if (strlen($password) < 6) {
            $errorMessages['address'] = "address Must Be >= 6 ";
        }

    }

    if(count($errorMessages)>0){
        foreach($errorMessages as $key => $data){
            echo("<div class='alert alert-danger col-4 my-5'> $key :  $data  <br>  </div>");
 
         
        }
    }else{
        $userData = array($name,$email,$password,$address);
   
    $_SESSION['userData']  = $userData;
    
    $_SESSION['name']  = $name;
    header("Location: http://localhost/nti/task4/show.php", true, 301);
 exit();
    }




}

?>






</div>



</div>

</div>


</body>
</html>