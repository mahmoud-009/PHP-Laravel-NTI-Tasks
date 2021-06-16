<?php  



session_start();



$server ="localhost";
 $dbName ="phpnti";
 $dbUser ="root";
 $dbPassword = "";

    $con =mysqli_connect($server,  $dbUser , $dbPassword,$dbName );
    if ($con){
      echo 'CONNCETION DONE';
    }else{
      die('Error:'.mysqli_connect_error());
    }
















?>