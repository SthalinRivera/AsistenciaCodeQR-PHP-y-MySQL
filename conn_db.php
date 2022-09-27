<?php 
 session_start();
 $server = "localhost";
 $username="root";
 $password="";
 $dbname="qrcodedb";

 $conn = new mysqli($server,$username,$password,$dbname);

 if($conn->connect_error){
     die("La conexión falló" .$conn->connect_error);
     echo "la conEXCION FALLO";
 }else {
    echo "SE CONECTO";
 }

?>