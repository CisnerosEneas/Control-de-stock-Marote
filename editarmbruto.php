<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Posteamos los datos a cargar del formulario pertinente
	$codigo=$_GET['codigo'];
	$forma=$_GET['forma'];
	$color=$_GET['color'];
	$tipo_plastico=$_GET['tipo'];
	$cantidad=$_GET['cantidad'];
	$id=$_GET['id'];
	// Preparamos un array con los datos a ingresar del formulario
	$dato=$cnn->prepare("update mbruto set codigo=?, forma=?, color=?, tipo_plastico=?, cantidad=? where id_materia=?;");
	// Insertamos los datos del array en la base de datos
	$dato->execute(array($codigo, $forma, $color, $tipo_plastico, $cantidad, $id));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ver el material plastico comprado
	header('location:verbruto.php');
?>