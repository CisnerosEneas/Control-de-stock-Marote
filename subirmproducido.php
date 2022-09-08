<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Posteamos los datos a cargar del formulario pertinente
	$molienda=$_POST['molienda'];
	$codigo=$_POST['codigo'];
	$id_procedencia=2;
	$tipo=$_POST['tipo'];
	$cantidad=$_POST['cantidad'];
	$color=$_POST['color'];
	$estado=$_POST['estado'];
	$fecha=$_POST['fecha'];
	// Preparamos un array con los datos a ingresar del formulario
	$a=$cnn->prepare("INSERT INTO mproducido(id_procedencia, tipo_molienda, codigo, tipo_plastico, cantidad, color, estado, fecha) VALUES (?,?,?,?,?,?,?,?);");
	// Insertamos los datos del array en la base de datos
	$a->execute(array($id_procedencia,$molienda,$codigo,$tipo,$cantidad,$color,$estado,$fecha));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ingresar el material
	header('location:ingmaterial.php');
?>