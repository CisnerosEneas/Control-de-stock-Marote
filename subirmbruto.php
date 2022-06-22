<?php
	include_once "db/conexion.php";
	$id_procedencia=3;
	$forma=$_POST['forma'];
	$color=$_POST['color'];
	$tipo=$_POST['tipo'];
	$cantidad=$_POST['cantidad'];
	$a=$cnn->prepare("INSERT INTO mbruto(id_procedencia,forma,color,tipo_plastico,cantidad) VALUES (?,?,?,?,?);");
	$a->execute(array($id_procedencia,$forma,$color,$tipo,$cantidad));
	$cnn=null;
	header('location:ingmaterial.php');
?>