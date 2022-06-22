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
		<script type="text/javascript" src="script/jquery.js"></script>
		<script type="text/javascript" src="script/jquery.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
		<script type="text/javascript">
			function mostrar(id)
			{
			    if (id == "rotomoldeo")
			    {
			        $("#rotomoldeo").show();
			        $("#inyeccion").hide();
			        $("#triturado").hide();
			    }

			    if (id == "inyeccion")
			    {
			        $("#rotomoldeo").hide();
			        $("#inyeccion").show();
			        $("#triturado").hide();
			    }

			    if (id == "triturado")
			    {
			        $("#rotomoldeo").hide();
			        $("#inyeccion").hide();
			        $("#triturado").show();
			    }
			}
		</script>
		<main>
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
					<div class="d-flex d-row-reverse">
						<!-- if todo bien !-->
						<!-- <i class="bi bi-check-circle-fill"></i> !-->
						<!-- else hay un problema ej. falta de stock !-->
						<!-- <i class="bi bi-exclamation-circle-fill"></i> !-->
					</div>
				</nav>
			</header>
			<article class="col">
				<center>
					<form action="ingproduccion.php" method="post">
						<h2>Ingresar produccion</h2>
						Seleccione metodo de produccion
						<select name="metodo" id="metodo" onChange="mostrar(this.value);">
							<option selected hidden disabled>Seleccione un metodo</option>
							<option value="rotomoldeo">Rotomoldeo</option>
							<option value="inyeccion">Inyeccion</option>
							<option value="triturado">Triturado</option>
						</select>
					</form>

					<!-- if Triturado !-->
					<div id="triturado" style="display:none">
						<form id="triturado" method="POST" action="subirtriturado.php">
							<fieldset>
								<h4>Ingresar triturado</h4>
							</fieldset>
							<fieldset>
								Cantidad<input type="number" name="cantidad" step="0.001" min="0.01">
							</fieldset>
							<fieldset>
								Tipo de plastico
								<select name="a">
									<option hidden disabled selected>Tipo de plastico</option>
									<option value="polietileno">Polietileno</option>
									<option value="polipropileno">Polipropileno</option>
								</select>
							</fieldset>
							<fieldset>
								Color<input type="text" name="color">
							<fieldset>
								Fecha de molienda<input type="date" name="fecha">
							</fieldset>
							<fieldset>
								<input type="submit">
							</fieldset>
						</form>
					</div>

					<!-- if Inyeccion !-->
					<div id="inyeccion" style="display:none;">
						<form id="inyeccion" method="POST" action="subirinyeccion.php">
							<fieldset>
								<h4>Ingresar inyeccion</h4>
							</fieldset>
							<fieldset>
								Molde usado<input type="text" name="molde">
							</fieldset>
							<fieldset>
								Duracion del proceso<input type="time" name="duracion">
							</fieldset>
							<fieldset>
								Cantidad creada<input type="number" name="cantidad">
							</fieldset>
							<fieldset>
								Fecha de produccion<input type="date" name="fecha">
							</fieldset>
							<fieldset>
								Procentajes utilizados<input type="text" name="porcentajes">
							</fieldset>
							<fieldset>
								<input type="submit">
							</fieldset>
						</form>
					</div>

					<!-- if En Rotomoldeo !-->
					<div id="rotomoldeo" style="display:none;">
						<form id="rotomoldeo" method="POST" action="subirrotomoldeo.php">
							<fieldset>
								<h4>Ingresar rotomoldeo</h4>
							</fieldset>
							<fieldset>
								Molde usado<input type="text" name="molde">
							</fieldset>
							<fieldset>
								Duracion del proceso<input type="time" name="duracion">
							</fieldset>
							<fieldset>
								Cantidad creada<input type="number" name="cantidad">
							</fieldset>
							<fieldset>
								Fecha de produccion<input type="date" name="fecha">
							</fieldset>
							<fieldset>
								Procentajes utilizados<input type="text" name="porcentajes">
							</fieldset>
							<fieldset>
								<input type="submit">
							</fieldset>
						</form>
					</div>
				</center>
			</article>
		</main>
	</body>
</html>