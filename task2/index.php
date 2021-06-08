<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{
        width:640px;
        border:2px solid black

    }
    *{

        padding:0
    }
div{
    height:80px;
    width:80px;
    background-color:black;
    display:inline-block;
}
span{
    height:80px;
    width:80px;
    background-color:white;
    display:inline-block;
}
</style>

</head>
<body>

<?php

for ($i = 0; $i < 4; $i++) {
    for ($w = 0; $w < 4; $w++) {

        echo "<span>   </span>";
        echo "<div>   </div>";
    }

    for ($v = 0; $v < 4; $v++) {

        echo "<div>   </div>";
        echo "<span>   </span>";
    }
}

?>
</body>
</html>


