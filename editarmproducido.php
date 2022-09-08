<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Atrapamos los cambios del formulario pertinente y el id del material producido a modificar
	$molienda=$_GET['molienda'];
	$codigo=$_GET['codigo'];
	$tipo=$_GET['tipo'];
	$cantidad=$_GET['cantidad'];
	$color=$_GET['color'];
	$estado=$_GET['estado'];
	$fecha=$_GET['fecha'];
	$id=$_GET['id'];
	// Preparamos un array con los cambios del formulario
	$dato=$cnn->prepare("update mproducido set tipo_molienda=?, codigo=?, tipo_plastico=?, cantidad=?, color=?, estado=?, fecha=? where id_producido=?;");
	// Insertamos los datos del array en la base de datos
	$dato->execute(array($molienda, $codigo, $tipo, $cantidad, $color, $estado, $fecha, $id));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ver el material producido
	header('location:verproducido.php');
?>