<?php

include "conn_db.php";

$cod_estudiante=$_GET['id'];
if (isset($cod_estudiante)) 
{
    echo "<script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...!',
      text: 'Operación inválida, el puesto ya ha sido vendido.',  
      })
     window.location= 'index.php'
</script>";

$sql="DELETE FROM student  WHERE ID='$cod_estudiante'";
$query = $conn->query($sql);
}


    if($query){
        Header("Location: usuarios.php");
    }
?>