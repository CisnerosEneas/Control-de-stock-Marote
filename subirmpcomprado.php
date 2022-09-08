<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Posteamos los datos a cargar del formulario pertinente
	$codigo=$_POST['codigo'];
	$id_procedencia=1;
	$id_proveedor=$_POST['b'];
	$estado=$_POST['a'];
	$tipo=$_POST['tipop'];
	$color=$_POST['colorp'];
	$precio=$_POST['precio'];
	$cantidad=$_POST['cantidad'];
	$fecha=$_POST['fecha'];
	// Preparamos un array con los datos a ingresar del formulario
	$a=$cnn->prepare("INSERT INTO mpcomprado(codigo, id_procedencia, id_proveedor, estado, tipo_plastico, color, precio, cantidad, fecha) VALUES (?,?,?,?,?,?,?,?,?);");
	// Insertamos los datos del array en la base de datos
	$a->execute(array($codigo, $id_procedencia, $id_proveedor, $estado, $tipo, $color, $precio, $cantidad, $fecha));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ingresar el material
	header('location:ingmaterial.php');
?>