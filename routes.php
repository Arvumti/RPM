<?php
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
header('Content-Type: text/html; charset=utf-8');
include("funciones_db.php");

$res = Array();
$json = json_decode($_POST["data"]);

if(!$json) {
    $pdoArr = pdoQuery('SELECT idCarro, dirImg, nombre, tipo, modelo, killit, kilometraje, precio, activo, detalles FROM carros');
    $res = $pdoArr->fetchAll(PDO::FETCH_ASSOC);
}
else if($_FILES["upIBottom"]["size"] > 0) {
    $extAll = explode('/', $_FILES["upIBottom"]["type"]);
    $ext = $extAll[1];
    $nombre = (date('ymdHis').$milliseconds.'.'.$ext);

    $res[0] = " UPDATE carros
                SET dirimg ='".$nombre."', 
                activo = ".$json->{"activo"}."
                WHERE idCarro = ".$json->{"idCarro"};
    
    $res = pdoExec($res);
    if($res["res"] == 1) {
        move_uploaded_file($_FILES["upIBottom"]["tmp_name"], "img/db_imgs/".$nombre);
        
        $res["img"] = $nombre;
        
        $filename = "img/db_imgs/".$json->{"dirImg"};
        if(strlen($json->{"dirImg"}) > 0 && file_exists($filename))
            unlink($filename);
    }
}
else {
    $res[0] = " UPDATE carros 
                SET dirImg = '".($json->{"dirImg"})."', 
                    nombre = '".($json->{"nombre"})."', 
                    tipo = '".($json->{"tipo"})."', 
                    modelo = '".($json->{"modelo"})."',
                    killit = '".($json->{"killit"})."', 
                    kilometraje = '".($json->{"kilometraje"})."', 
                    precio = '".($json->{"precio"})."', 
                    activo = '".($json->{"activo"})."',
                    detalles = '".($json->{"detalles"})."'

                WHERE idCarro = '".($json->{"idCarro"})."'";
    
    $res = pdoExec($res);
}

echo json_encode($res);

?>