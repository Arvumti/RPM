<?php
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
header('Content-Type: text/html; charset=utf-8');
include("funciones_db.php");

$res = Array();
$json = json_decode($_POST["data"]);
$getJson = $_GET["datas"];

if($getJson['request'] == 1) {
    $id = $getJson['idCarro'];
    $res = select("SELECT idCarro, idGaleria, direccion FROM galerias WHERE idCarro = {$id}");
}
else if($getJson['request'] == 2) {
    $id = $getJson['id'];
    $res = execQuery("DELETE FROM galerias WHERE idGaleria = {$id}");

    unlink($getJson['direccion']);
}
else if($getJson['request'] == 3) {
    $id = $getJson['id'];
    $res = select("SELECT idCarro, idGaleria, direccion FROM galerias WHERE idCarro = {$id}");
    for ($i=0; $i < count($res); $i++) { 
        unlink($res[$i]['direccion']);
    }
    $res = select("SELECT dirImg FROM carros WHERE idCarro = {$id}");
    for ($i=0; $i < count($res); $i++) { 
        unlink("img/db_imgs/".$res[$i]['dirImg']);
    }

    $res = execQuery("DELETE FROM galerias WHERE idCarro = {$id}");
    $res = execQuery("DELETE FROM carros WHERE idCarro = {$id}");
}
else if($getJson['request'] == 4) {
    $res = execQuery("INSERT INTO carros (activo) VALUES(1);");
}
else if(!$json) {
    $res = select('SELECT idCarro, dirImg, nombre, tipo, modelo, killit, kilometraje, precio, activo, detalles FROM carros');
}
else if($json->{"request"} == 5) {//$_FILES["upIBottom"]["size"] > 0) {
    $extAll = explode('/', $_FILES["upIBottom"]["type"]);
    $ext = $extAll[1];
    $nombre = (date('ymdHis').$milliseconds.'.'.$ext);

    $res = " UPDATE carros
                SET dirimg ='".$nombre."', 
                activo = ".$json->{"activo"}."
                WHERE idCarro = ".$json->{"idCarro"};
    
    $res = execQuery($res);
    if($res["res"] == 1) {
        move_uploaded_file($_FILES["upIBottom"]["tmp_name"], "img/db_imgs/".$nombre);
        
        $res["img"] = $nombre;
        
        $filename = "img/db_imgs/".$json->{"dirImg"};
        if(strlen($json->{"dirImg"}) > 0 && file_exists($filename))
            unlink($filename);
    }
}
else if($json->{"request"} == 6) {//count($_FILES["files_galeria"]["size"]) > 0) {
    $files = $_FILES["files_galeria"];
    $id = $json->{"idCarro"};
    $arrFiles = Array();

    for ($i=0; $i < count($files["size"]); $i++) { 
        $extAll = explode('.', $files["type"][$i]);
        $ext = $extAll[1];
        if(strlen($ext) == 0)
            $ext = 'jpg';

        $nombre = "img/db_imgs/".(date('ymdHis').$milliseconds.$i.'.'.$ext);

        $res = "    INSERT INTO galerias (direccion, idCarro)
                    VALUES ('{$nombre}', {$id});";
        
        if(strlen($files["tmp_name"][$i]) == 0)
            continue;

        $res = execQuery($res);
        if($res["res"] == 1) {
            move_uploaded_file($files["tmp_name"][$i], $nombre);
            $file = Array('tmp' => $files["tmp_name"][$i], 'direccion' => $nombre, 'idGaleria' => $res['idkey']);
            array_push($arrFiles, $file);
        }
    }

    $res['files'] = $arrFiles;
}
else if($json->{"request"} == 7) {
    $res = " UPDATE carros 
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
    
    $res = execQuery($res);
    $res['files'] = $_FILES["files[]"];
}

echo json_encode($res);

?>