<?php
$texto =$_POST["texto"];
if(file_exists("phpqrcode/qrlib.php")){
    require "phpqrcode/qrlib.php";
    $ruta_qr ="img/". "imgpractqr.png";
    $tamanio=10;
    $level="Q";
    $frameSize=3;
    QRCode::png ($texto,$ruta_qr,$level,$tamanio,$frameSize);
    if(file_exists($ruta_qr)){

        $error=0;
        $mensaje="Archivo QR, generado";
    }
}else{
    $error=1;
    $mensaje="La librería no existe";

}
$resp=["error"=>$error,
    "mensaje"=>$mensaje,
    "datos"=>$datos];
echo json_decode($resp);
?>