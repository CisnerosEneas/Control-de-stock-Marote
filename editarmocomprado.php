<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Atrapamos los cambios del formulario pertinente y el id del material a modificar
	$id_proveedor=$_GET['b'];
	$codigo=$_POST['codigo']
	$material=$_GET['material'];
	$precio=$_GET['precio'];
	$cantidad=$_GET['cantidad'];
	$fecha=$_GET['fecha'];
	$id=$_GET['id'];
	// Preparamos un array con los datos a ingresar del formulario
	$dato=$cnn->prepare("update mocomprado set id_proveedor=?, codigo=?,material=?, precio=?, cantidad=?, fecha=? where id_compra=?;");
	// Insertamos los datos del array en la base de datos
	$dato->execute(array($id_proveedor, $codigo,$material, $precio, $cantidad, $fecha, $id));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ver los insumos comprados
	header('location:vermocomprado.php');
?>