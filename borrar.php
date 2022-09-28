<?php

include "conn_db.php";

$cod_estudiante=$_GET['id'];

$sql="DELETE FROM student  WHERE ID='$cod_estudiante'";
$query = $conn->query($sql);

    if($query){
        Header("Location: usuarios.php");
    }
?>