<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Posteamos los datos a cargar del formulario pertinente
	$codigo=$_GET['codigo'];
	$id_proveedor=$_GET['b'];
	$estado=$_GET['a'];
	$precio=$_GET['precio'];
	$tipo=$_GET['tipop'];
	$color=$_GET['colorp'];
	$cantidad=$_GET['cantidad'];
	$fecha=$_GET['fecha'];
	$id=$_GET['id'];
	// Preparamos un array con los datos a ingresar del formulario
	$dato=$cnn->prepare("update mpcomprado set codigo=?, id_proveedor=?, estado=?, tipo_plastico=?, color=?, precio=?, cantidad=?, fecha=? where id_mpcompra=?;");
	// Insertamos los datos del array en la base de datos
	$dato->execute(array($codigo, $id_proveedor, $estado, $tipo, $color, $precio, $cantidad, $fecha, $id));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ver el material plastico comprado
	header('location:vermpcomprado.php');
?>