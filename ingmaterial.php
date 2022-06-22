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
			    if (id == "comprado")
			    {
			        $("#comprado").show();
			        $("#producido").hide();
			        $("#bruto").hide();
			    }

			    if (id == "producido")
			    {
			        $("#comprado").hide();
			        $("#producido").show();
			        $("#bruto").hide();
			    }

			    if (id == "bruto")
			    {
			        $("#comprado").hide();
			        $("#producido").hide();
			        $("#bruto").show();
			    }
			}
			
			function plasticouotro(id)
			{
				if(id == "plastico")
				{
					$("#plastico").show();
					$("#otro").hide();
				}
				if(id == "otro")
				{
					$("#plastico").hide();
					$("#otro").show();
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
				</nav>
			</header>
			<article>
				<center>
					<h2>Ingresar materiales</h2>
					Procedencia
					<select name="metodo" id="metodo" onChange="mostrar(this.value);">
						<option selected hidden disabled>Seleccione una procedencia</option>
						<option value="comprado">Comprado</option>
						<option value="producido">Producido</option>
						<option value="bruto">En bruto</option>
					</select>

					<!-- if comprado !-->
					<div id="comprado" style="display:none">
						<select name="eleccion" id="eleccion" onChange="plasticouotro(this.value);">
							<option selected hidden disabled>Seleccione tipo de mat. comprado</option>
							<option value="plastico">Plastico</option>
							<option value="otro">Otros</option>
						</select>
						<div id="plastico" style="display:none;">
							<form id="comprado" method="POST" action="subirmpcomprado.php">
								<fieldset>
									<h4>Ingresar plastico comprado</h4>
								</fieldset>
								<fieldset>
									Proveedor
									<select name="b">
									<?php
										include_once "db/conexion.php";
										$sql_leer='SELECT * FROM proveedores WHERE provee=1';
										$gsent = $cnn->prepare($sql_leer);
										$gsent->execute();
										$resultados = $gsent->fetchAll();
									    foreach ($resultados as $dato):
									?>
										<option value="<?php echo $dato['id_proveedor']; ?>"><?php echo $dato['nombre']; ?></option>
									<?php
										endforeach;
									?>
									</select>
								</fieldset>
								<fieldset>
									Estado
									<select name="a">
										<option hidden disabled selected>Estado del mat.</option>
										<option value="pellets">Pellets</option>
										<option value="molienda">Molienda</option>
										<option value="polvo">Polvo</option>
										<option value="agrumado">Agrumado</option>
									</select>
								</fieldset>
								<fieldset>
									Precio $<input type="number" name="precio" step="0.01" min="0">
								</fieldset>
								<fieldset>
									Cantidad<input type="number" name="cantidad" min="0">
								</fieldset>
								<fieldset>
									Fecha de compra<input type="date" name="fecha">
								</fieldset>
								<fieldset>
									<input type="submit">
								</fieldset>
							</form>
						</div>
						<div id="otro" style="display:none;">
							<form id="comprado" method="POST" action="subirmocomprado.php">
								<fieldset>
									<h4>Ingresar material comprado</h4>
								</fieldset>
								<fieldset>
									Proveedor
									<select name="b">
									<?php
										include_once "db/conexion.php";
										$sql_leer='SELECT * FROM proveedores WHERE provee=2';
										$gsent = $cnn->prepare($sql_leer);
										$gsent->execute();
										$resultados = $gsent->fetchAll();
									    foreach ($resultados as $dato):
									?>
										<option value="<?php echo $dato['id_proveedor']; ?>"><?php echo $dato['nombre']; ?></option>
									<?php
										endforeach;
									?>
									</select>
								</fieldset>
								<fieldset>
									Material<input type="text" name="material">
								</fieldset>
								<fieldset>
									Precio $<input type="number" name="precio" step="0.01" min="0">
								</fieldset>
								<fieldset>
									Cantidad<input type="number" name="cantidad" min="0">
								</fieldset>
								<fieldset>
									Fecha de compra<input type="date" name="fecha">
								</fieldset>
								<fieldset>
									<input type="submit">
								</fieldset>
							</form>
						</div>
					</div>

					<!-- if producido !-->
					<div id="producido" style="display:none">
						<form id="producido" method="POST" action="subirmproducido.php">
							<fieldset>
								<h4>Ingresar material producido</h4>
							</fieldset>
							<fieldset>
								Tipo de molienda
								<select name="molienda">
									<option>Tipo de molienda</option>
									<option value="fina">Fina</option>
									<option value="gruesa">Gruesa</option>
								</select>
							</fieldset>
							<fieldset>
								Tipo de plastico
								<select name="tipo">
									<option hidden disabled selected>Tipo de plastico</option>
									<option value="polietileno">Polietileno</option>
									<option value="polipropileno">Polipropileno</option>
								</select>
							</fieldset>
							<fieldset>
								Cantidad<input type="number" name="cantidad" min="0">
							</fieldset>
							<fieldset>
								Estado
								<select name="estado">
									<option hidden disabled selected>Estado del mat.</option>
									<option value="pellets">Pellets</option>
									<option value="molienda">Molienda</option>
									<option value="polvo">Polvo</option>
									<option value="agrumado">Agrumado</option>
								</select>
							</fieldset>
							<fieldset>
								Fecha de produccion<input type="date" name="fecha">
							</fieldset>
							<fieldset>
								<input type="submit">
							</fieldset>
						</form>
					</div>

					<!-- if En Bruto !-->
					<div id="bruto" style="display:none">
						<form id="bruto" method="POST" action="subirmbruto.php">
							<fieldset>
								<h4>Ingresar material en bruto</h4>
							</fieldset>
							<fieldset>
								Forma<input type="text" name="forma">
							</fieldset>
							<fieldset>
								Color<input type="text" name="color">
							</fieldset>
							<fieldset>
								Tipo de plastico
								<select name="tipo">
									<option hidden disabled selected>Tipo de plastico</option>
									<option value="polietileno">Polietileno</option>
									<option value="polipropileno">Polipropileno</option>
								</select>
							</fieldset>
							<fieldset>
								Cantidad<input type="number" name="cantidad" min="0">
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