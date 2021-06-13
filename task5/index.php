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
<!-- Task 
Create a from with following fields 
1-name
2-email
3-jobTitle
4-Cv (Upload Cv   **pdf file Only**).
& Validate It . -->


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
    <label   class="form-label">job Title</label>
    <input type="text" class="form-control"  name="jobtitle">
  </div>
  <div class="mb-3">
    <label   class="form-label">C.V</label>
    <input type="file" class="form-control"  name="uploadedFiles">
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
    $jobtitle = Clean($_REQUEST['jobtitle']);
    
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
    if (empty($jobtitle)) {
        $errorMessages['jobtitle'] = "jobtitle Field Required";
    } else {

        if (strlen($jobtitle) < 6) {
            $errorMessages['jobtitle'] = "jobtitle Must Be >= 6 ";
        }

    }
    

    if(count($errorMessages)>0){
        foreach($errorMessages as $key => $data){
            echo("<div class='alert alert-danger col-4 my-5'> $key :  $data  <br>  </div>");
 
         
        }
    }
// upload a pdf 
    if(!empty($_FILES['uploadedFiles']['name'])){

        $fileTempPath  = $_FILES['uploadedFiles']['tmp_name'];
        $fileName      = $_FILES['uploadedFiles']['name'];
        $fileSize      = $_FILES['uploadedFiles']['size'];
        $filetype      = $_FILES['uploadedFiles']['type'];



        $fileExtension =   explode(".",$fileName);

        $newName = rand().time().'.'.$fileExtension[1];

         $allowedExtensions = array('pdf');

         if(in_array($fileExtension[1],$allowedExtensions)){

          // code ....
          
          $uploaded_folder = "./uploads/";

          $desPath = $uploaded_folder.$newName;

         if(move_uploaded_file($fileTempPath,$desPath)){
           echo  "<div class='alert alert-success col-4 my-5'> File Uploaded  </div>";
         }else{
           echo "<div class='alert alert-danger col-4 my-5'> Error in Uplading file  </div>";
         }


         }else{

          echo  "<div class='alert alert-danger col-4 my-5'> Not Allowed Extension  </div>";
         }
        }else{

          echo  "<div class='alert alert-danger col-4 my-5'> please upload File  </div>";

        }


}
 

?>






</div>



</div>

</div>


</body>
</html>