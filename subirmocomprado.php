<?php
	include_once "db/conexion.php";
	$id_procedencia=1;
	$id_proveedor=$_POST['b'];
	$material=$_POST['material'];
	$precio=$_POST['precio'];
	$cantidad=$_POST['cantidad'];
	$fecha=$_POST['fecha'];
	$a=$cnn->prepare("INSERT INTO mocomprado(id_procedencia,id_proveedor,material,precio,cantidad,fecha) VALUES (?,?,?,?,?,?);");
	$a->execute(array($id_procedencia,$id_proveedor,$material,$precio,$cantidad,$fecha));
	$cnn=null;
	header('location:ingmaterial.php');
?>