<?php
	include_once "db/conexion.php";
	$id_tipo_procesado=3;
	$cantidad=$_POST['cantidad'];
	$tipo_de_plastico=$_POST['a'];
	$color=$_POST['color'];
	$fecha=$_POST['fecha'];
	$a=$cnn->prepare("INSERT INTO triturado(id_tipo_procesado,cantidad,tipo_de_plastico,color,fecha) VALUES (?,?,?,?,?);");
	$a->execute(array($id_tipo_procesado,$cantidad,$tipo_de_plastico,$color,$fecha));
	$cnn=null;
	header('location:ingproduccion.php');
?>