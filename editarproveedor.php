<?php
	include_once "db/conexion.php";
	$nombre=$_GET['name'];
	$telefono=$_GET['phone'];
	$mail=$_GET['mail'];
	$web=$_GET['web'];
	$contacto=$_GET['contact'];
	$provee=$_GET['a'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update proveedores set nombre=?, telefono=?, mail=?, web=?, contacto=?, provee=? where id_proveedor=?;");
	$dato->execute(array($nombre, $telefono, $mail, $web, $contacto, $provee, $id));
	header('location:verproveedores.php');
?>