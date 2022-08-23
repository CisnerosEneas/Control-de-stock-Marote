<?php
	include_once "db/conexion.php";
	$nombre=$_GET['name'];
	$telefono=$_GET['phone'];
	$mail=$_GET['mail'];
	$web=$_GET['web'];
	$contacto=$_GET['contact'];
	$direccion=$_GET['direccion'];
	$provee=$_GET['a'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update proveedores set nombre=?, telefono=?, mail=?, web=?, contacto=?, direccion=?, provee=? where id_proveedor=?;");
	$dato->execute(array($nombre, $telefono, $mail, $web, $contacto, $direccion, $provee, $id));
	header('location:verproveedores.php');
?>