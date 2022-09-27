<?php 
require "conn_db.php";
if(isset($_POST['dni'],$_POST['apellidos'],$_POST['nombres'],$_POST['edad'])){

$dni=$_POST['dni'];
$apellidos=$_POST["apellidos"];
$nombres=$_POST["nombres"];
$edad=$_POST["edad"];
$genero=$_POST["genero"];


    $sql = "INSERT INTO `student`(`ID`, `STUDENTID`, `FIRSTNAME`, `MNAME`, `LASTNAME`, `AGE`, `GENDER`) VALUES ('','$dni','$apellidos','','$apellidos','$edad','$genero')";
    $query = $conn->query($sql);
    echo "Se registro Correctamente";
}else {
    echo "No llego los datos";
}

?>