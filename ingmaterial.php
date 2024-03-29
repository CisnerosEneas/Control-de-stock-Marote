<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
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
			<article>
				<center>
					<h2>Ingresar materiales</h2>
					Procedencia:
					<br>
					<select name="metodo" id="metodo" onChange="mostrar(this.value);">
						<option selected hidden disabled>Seleccione una procedencia</option>
						<option value="comprado">Comprado</option>
						<option value="producido">Producido</option>
						<option value="bruto">En bruto</option>
					</select>
					
					<!-- if comprado -->
					<div id="comprado" style="display:none">
						<select name="eleccion" id="eleccion" onChange="plasticouotro(this.value);">
							<option selected hidden disabled>Seleccione tipo de mat. comprado</option>
							<option value="plastico">Plastico</option>
							<option value="otro">Otros</option>
						</select>
						<!-- if comprado=plastico -->
						<div id="plastico" style="display:none;">
							<form id="comprado" method="POST" action="subirmpcomprado.php" class="col" style="text-align:left;">
								<fieldset>
									<h4>Ingresar plastico comprado</h4>
									<p>Codigo: <br><input type="text" name="codigo">
									<p>Proveedor: <br><select name="b">
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
									<p>Estado: <br><select name="a">
										<option hidden disabled selected>Estado del mat.</option>
										<option value="pellets">Pellets</option>
										<option value="molienda">Molienda</option>
										<option value="polvo">Polvo</option>
										<option value="agrumado">Agrumado</option>
									</select>
									<p>Tipo de plastico: <br><select name="tipop">
										<option hidden disabled selected>Tipo de plastico</option>
										<option value="polietileno">Polietileno</option>
										<option value="polipropileno">Polipropileno</option>
									</select>
									<p>Color: <br><input type="text" name="colorp">
									<p>Precio: <br><input type="number" name="precio" step="0.01" min="0">
									<p>Cantidad: <br><input type="number" name="cantidad" min="0">
									<p>Fecha de compra: <br><input type="date" name="fecha">
									<p><input type="submit">
								</fieldset>
							</form>
						</div>
						<!-- if comprado=otros/insumos -->
						<div id="otro" style="display:none;">
							<form id="comprado" method="POST" action="subirmocomprado.php" class="col" style="text-align:left;">
								<fieldset>
									<h4>Ingresar material comprado</h4>
									<p>Codigo: <br><input type="text" name="codigo">
									<p>Proveedor: <br><select name="b">
										<option selected hidden disabled>Proveedores</option>
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
									<p>Material: <br><input type="text" name="material">

									<p>Precio: <br><input type="number" name="precio" step="0.01" min="0">

									<p>Cantidad: <br><input type="number" name="cantidad" min="0">

									<p>Fecha de compra: <br><input type="date" name="fecha">

									<p><input type="submit">
								</fieldset>
							</form>
						</div>
					</div>

					<!-- if producido -->
					<div id="producido" style="display:none">
						<form id="producido" method="POST" action="subirmproducido.php" class="col" style="text-align:left;">
							<fieldset>
								<h4>Ingresar material producido</h4>
							
								<p>Codigo:<br><input type="text" name="codigo">
							
								<p>Tipo de molienda:<br><select name="molienda">
									<option selected hidden disabled>Tipo de molienda</option>
									<option value="fina">Fina</option>
									<option value="gruesa">Gruesa</option>
								</select>
							
								<p>Tipo de plastico:<br><select name="tipo">
									<option hidden disabled selected>Tipo de plastico</option>
									<option value="polietileno">Polietileno</option>
									<option value="polipropileno">Polipropileno</option>
								</select>
							
								<p>Cantidad:<br><input type="number" name="cantidad" min="0">
							
								<p>Color:<br><input type="text" name="color">
							
								<p>Estado:<br><select name="estado">
									<option hidden disabled selected>Estado del mat.</option>
									<option value="pellets">Pellets</option>
									<option value="molienda">Molienda</option>
									<option value="polvo">Polvo</option>
									<option value="agrumado">Agrumado</option>
								</select>
							
								<p>Fecha de produccion:<br><input type="date" name="fecha">
								<p><input type="submit">
							</fieldset>
						</form>
					</div>

					<!-- if En Bruto -->
					<div id="bruto" style="display:none">
						<form id="bruto" method="POST" action="subirmbruto.php" class="col" style="text-align:left;">
							<fieldset>
								<h4>Ingresar material en bruto</h4>
								<p>Codigo:<br><input type="text" name="codigo">
								<p>Forma:<br><input type="text" name="forma">
								<p>Color:<br><input type="text" name="color">

								<p>Tipo de plastico:<br><select name="tipo">
									<option hidden disabled selected>Tipo de plastico</option>
									<option value="polietileno">Polietileno</option>
									<option value="polipropileno">Polipropileno</option>
								</select>
								<p>Cantidad:<br><input type="number" name="cantidad" min="0">
								<p><input type="submit">
							</fieldset>
						</form>
					</div>
				</center>
			</article>
		</main>
	</body>
</html>