<?php 
 
include("function.php");
$id = $_GET['id'];
delete('studet','id',$id);
header("location:usuarios.php");

?>