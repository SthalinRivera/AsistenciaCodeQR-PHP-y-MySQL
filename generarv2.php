<?php

    require "phpqrcode/qrlib.php";
    $dir='temp/';

    if(!file_exists($dir))
        mkdir($dir);
    $filename=$dir.'test.png';
    $tamanio=10;
    $level='M';
    $frameSize=3;
    $Contenido='73625197';
    QRCode::png($Contenido,$filename,$level,$tamanio,$frameSize);

echo '<img src="'.$filename.'"/>';
   
?>