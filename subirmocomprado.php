<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Posteamos los datos a cargar del formulario pertinente
	$id_procedencia=1;
	$id_proveedor=$_POST['b'];
	$codigo=$_POST['codigo'];
	$material=$_POST['material'];
	$precio=$_POST['precio'];
	$cantidad=$_POST['cantidad'];
	$fecha=$_POST['fecha'];
	// Preparamos un array con los datos a ingresar del formulario
	$a=$cnn->prepare("INSERT INTO mocomprado(id_procedencia, id_proveedor, codigo, material, precio, cantidad, fecha) VALUES (?,?,?,?,?,?,?);");
	// Insertamos los datos del array en la base de datos
	$a->execute(array($id_procedencia, $id_proveedor, $codigo, $material, $precio, $cantidad, $fecha));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ingresar el material
	header('location:ingmaterial.php');
?>