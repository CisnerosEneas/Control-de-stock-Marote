<?php
	include_once "db/conexion.php";
	$tipo_procesado=$_POST['a'];
	$categoria=$_POST['b'];
	$nombre=$_POST['nombre'];
	$ip=$cnn->prepare("INSERT INTO productos(id_tipo_procesado,id_categoria,nomproducto) VALUES (?,?,?);");
	$ip->execute(array($tipo_procesado,$categoria,$nombre));
	$cnn=null;
	header('location:ingresarproducto.php');
?>