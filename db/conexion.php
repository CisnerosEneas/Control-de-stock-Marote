<?php
	try{
		$cnn=new PDO("mysql:host=localhost;dbname=marote","root","");
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>