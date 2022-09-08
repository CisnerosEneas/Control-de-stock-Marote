<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
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