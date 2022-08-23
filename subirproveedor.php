<?php
	include_once "db/conexion.php";
	$nombre=$_POST['name'];
	$telefono=$_POST['phone'];
	$mail=$_POST['mail'];
	$web=$_POST['web'];
	$contacto=$_POST['contact'];
	$direccion=$_POST['direccion'];
	$provee=$_POST['a'];
	$a=$cnn->prepare("INSERT INTO proveedores(nombre,telefono,mail,web,contacto,direccion,provee) VALUES (?,?,?,?,?,?);");
	$a->execute(array($nombre,$telefono,$mail,$web,$contacto,$direccion,$provee));
	$cnn=null;
	header('location:ingproveedores.php');
?>