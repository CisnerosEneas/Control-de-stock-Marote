<?php
	include_once "db/conexion.php";
	$molienda=$_POST['molienda'];
	$id_procedencia=2;
	$tipo=$_POST['tipo'];
	$cantidad=$_POST['cantidad'];
	$estado=$_POST['estado'];
	$fecha=$_POST['fecha'];
	$a=$cnn->prepare("INSERT INTO mproducido(id_procedencia,tipo_molienda,tipo_plastico,cantidad,estado,fecha) VALUES (?,?,?,?,?,?);");
	$a->execute(array($id_procedencia,$molienda,$tipo,$cantidad,$estado,$fecha));
	$cnn=null;
	header('location:ingmaterial.php');
?>