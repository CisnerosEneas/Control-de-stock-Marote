<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Posteamos los datos a cargar del formulario pertinente
	$codigo=$_POST['codigo'];
	$tipo_procesado=$_POST['a'];
	$categoria=$_POST['b'];
	$nombre=$_POST['nombre'];
	// Preparamos un array con los datos a ingresar del formulario
	$ip=$cnn->prepare("INSERT INTO productos(codigo, id_tipo_procesado, id_categoria, nomproducto) VALUES (?,?,?,?);");
	// Insertamos los datos del array en la base de datos
	$ip->execute(array($codigo, $tipo_procesado, $categoria, $nombre));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ingresar el producto
	header('location:ingresarproducto.php');
?>