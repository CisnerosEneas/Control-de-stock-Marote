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
			<header>
				<nav class="navbar navbar-expand-lg navbar-light bg-primary">
					<a class="navbar-brand">
						<img src="img/logo.jpg" width="55" height="50" class="d-inline-block align-top rounded-lg" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar
					Nav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
					<!-- <div class="d-flex d-row-reverse"> !-->
						<!-- if todo bien !-->
						<!-- <i class="bi bi-check-circle-fill"></i> !-->
						<!-- else hay un problema ej. falta de stock !-->
						<!-- <i class="bi bi-exclamation-circle-fill"></i> !-->
					<!-- </div> !-->
				</nav>
			</header>
			<article class="col">
				<center>
					<h2 class="paddingh2">Stock de materiales y productos</h2>
					<div class="paddingdiv">
						<a href="https://www.marote.com.ar/"><img id="icons" class="icons" src="img/web.png"></a>
						<a href="productos.php"><img id="icons" class="icons" src="img/productos.png"></a>
						<a href="materiales.php"><img id="icons" class="icons" src="img/materiales.png"></a>
						<a href="produccion.php"><img id="icons" class="icons" src="img/produccion.png"></a>
						<a href="proveedores.php"><img id="icons" class="icons" src="img/proveedores.png"></a>
					</div>
				</center>
			</article>
		</main>
	</body>
</html>