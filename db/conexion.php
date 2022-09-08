<?php
	// Probamos la instancia de conexion
	try{
		$cnn=new PDO("mysql:host=localhost;dbname=marote","root","");
	}
	// En caso de haber un error se atrapa y se envia un mensaje de este
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>