<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Control de Stock Marote</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" integrity="sha512-Oy+sz5W86PK0ZIkawrG0iv7XwWhYecM3exvUtMKNJMekGFJtVAhibhRPTpmyTj8+lJCkmWfnpxKgT2OopquBHA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    	<link rel="stylesheet" href="styles/styles.css" type="text/css">
	</head>
	<body class="bg-dark text-white">
		<main>
			<script type="text/javascript" src="script/jquery.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
			<header>
				<nav class="navbar navbar-expand-lg navbar-light bg-primary">
					<a class="navbar-brand">
						<img src="img/logo.jpg" width="55" height="50" class="d-inline-block align-top rounded-lg" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item active">
								<a class="tittle nav-link" href="index.php">Inicio</a>
							</li>
							<li class="nav-item active">
								<a class="tittle nav-link" href="productos.php">Productos</a>
							</li>
							<li class="nav-item active">
								<a class="tittle nav-link" href="materiales.php">Materiales</a>
							</li>
							<li class="nav-item active">
								<a class="tittle nav-link" href="produccion.php">Produccion</a>
							</li>
							<li class="nav-item active">
								<a class="tittle nav-link" href="proveedores.php">Proveedores</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<article>
				<center>
					<h2>Ingresar productos</h2>
					<form method="POST" action="subirproducto.php">
						<fieldset>
							Categoria
							<select name="b">
								<option selected hidden disabled> Seleccione una categoria</option>
								<?php
									include_once "db/conexion.php";
									$sql_leer='SELECT * FROM categoria';
									$gsent = $cnn->prepare($sql_leer);
									$gsent->execute();
									$resultados = $gsent->fetchAll();
								    foreach ($resultados as $dato): 
								?>
								<option value="<?php echo $dato['id_categoria']; ?>"><?php echo $dato['nombre_cat']; ?></option>
								<?php endforeach; ?>
							</select>
						</fieldset>
						<fieldset>
							Nombre<input type="text" name="name">
						</fieldset>
						<fieldset>
							Color<input type="text" name="color">
						</fieldset>
						<fieldset>
							Metodo de produccion
							<select name="a">
								<option selected hidden disabled> Seleccione un metodo de produccion</option>
								<option value="2">Inyeccion</option>
								<option value="1">Rotomoldeo</option>
								<option value="4">Otro</option>
							</select>
						</fieldset>
						<fieldset>
							Precio de lista<input type="number" name="price" step="0.01" min="0">
						</fieldset>
						<fieldset>
							Cantidad mayorista(opcional)<input type="number" name="cantminmayorist">
						</fieldset>
						<fieldset>
							Precio mayorista(opcional)<input type="number" name="preciominmayorist" step="0.01" min="0">
						</fieldset>
						<fieldset>
							Cantidad disp.<input type="number" name="stock">
						</fieldset>
						<fieldset>
							Descripcion(opcional)<input type="text" name="descripcion">
						</fieldset>
						<fieldset>
							<input type="submit">
						</fieldset>
					</form>
				</center>
			</article>
		</main>
	</body>
</html>