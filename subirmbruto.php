<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Posteamos los datos a cargar del formulario pertinente
	$id_procedencia=3;
	$codigo=$_POST['codigo'];
	$forma=$_POST['forma'];
	$color=$_POST['color'];
	$tipo=$_POST['tipo'];
	$cantidad=$_POST['cantidad'];
	// Preparamos un array con los datos a ingresar del formulario
	$a=$cnn->prepare("INSERT INTO mbruto(id_procedencia, codigo, forma, color, tipo_plastico, cantidad) VALUES (?,?,?,?,?,?);");
	// Insertamos los datos del array en la base de datos
	$a->execute(array($id_procedencia,$codigo,$forma,$color,$tipo,$cantidad));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ingresar el material
	header('location:ingmaterial.php');
?>