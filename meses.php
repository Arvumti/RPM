<?php 

$precio= $_POST["txtCosto"];
$meses= $_POST["sltMeses"];
$precio= $_POST["txtCosto"];


$enganche= ($precio)*(.40);
$pagos= $precio-$enganche;

//mensualidades de 6 12 15 18 24 30 36

?>