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
					<div id="triturado" style="display:none" align="left">
						<form id="triturado" method="POST" action="subirtriturado.php">
							<fieldset>
								<legend>Ingresar triturado</legend>
								<p>Cantidad:<br><input type="number" name="cantidad" step="0.001" min="0.01">

								<p>Tipo de plastico:<br><select name="a">
									<option hidden disabled selected>Tipo de plastico</option>
									<option value="polietileno">Polietileno</option>
									<option value="polipropileno">Polipropileno</option>
								</select>

								<p>Color:<br><input type="text" name="color">
								
								<p>Fecha de molienda:<br><input type="date" name="fecha">

								<p><input type="submit">
							</fieldset>
						</form>
					</div>

					<!-- if Inyeccion !-->
					<div id="inyeccion" style="display:none;" align="left">
						<form id="inyeccion" method="POST" action="subirinyeccion.php">
							<fieldset>
								<p><legend>Ingresar inyeccion</legend>
			
								<p>Molde usado:<br><input type="text" name="molde">
							
								<p>Duracion del proceso:<br><input type="time" name="duracion">
							
								<p>Cantidad creada:<br><input type="number" name="cantidad">
							
								<p>Fecha de produccion:<br><input type="date" name="fecha">
							
								<p>Material 1:<br><select name="material1">
											<option selected hidden disabled>Material</option>
											<?php
												include "db/conexion.php";
												$sql_leer='SELECT codigo FROM mpcomprado
												UNION
												SELECT codigo FROM mocomprado
												UNION
												SELECT codigo FROM mproducido
												UNION
												SELECT codigo FROM mbruto;';

												$gsent = $cnn->prepare($sql_leer);
												$gsent->execute();
												$resultados = $gsent->fetchAll();
											    foreach ($resultados as $dato): 

											?>
											<option value="<?php echo $dato['codigo']; ?>"><?php echo $dato['codigo']; ?></option>
											<?php endforeach; ?>
										</select>
									
									<p>Cantidad Material 1:<br><input type="number" min="0" name="cm1"> gr.
									
									<p>Material 2:<br><select name="material2">
											<option value="-" selected>-</option>
											<?php
												include "db/conexion.php";
												$sql_leer='SELECT codigo FROM mpcomprado
												UNION
												SELECT codigo FROM mocomprado
												UNION
												SELECT codigo FROM mproducido
												UNION
												SELECT codigo FROM mbruto;';

												$gsent = $cnn->prepare($sql_leer);
												$gsent->execute();
												$resultados = $gsent->fetchAll();
											    foreach ($resultados as $dato): 

											?>
											<option value="<?php echo $dato['codigo']; ?>"><?php echo $dato['codigo']; ?></option>
											<?php endforeach; ?>
										</select>
									<p>Cantidad Material 2:<br><input type="number" min="0" name="cm2"> gr.
										<br>

										<p>Material 3:<br><select name="material3">
											<option value="-" selected>-</option>
											<?php
												include "db/conexion.php";
												$sql_leer='SELECT codigo FROM mpcomprado
												UNION
												SELECT codigo FROM mocomprado
												UNION
												SELECT codigo FROM mproducido
												UNION
												SELECT codigo FROM mbruto;';

												$gsent = $cnn->prepare($sql_leer);
												$gsent->execute();
												$resultados = $gsent->fetchAll();
											    foreach ($resultados as $dato): 

											?>
											<option value="<?php echo $dato['codigo']; ?>"><?php echo $dato['codigo']; ?></option>
											<?php endforeach; ?>
										</select>
									<p>Cantidad Material 3:<br><input type="number" min="0" name="cm3"> gr.

							
								<p><input type="submit">
							</fieldset>
						</form>
					</div>

					<!-- if En Rotomoldeo !-->
					<div id="rotomoldeo" style="display:none;" align="left">
							<form id="rotomoldeo" method="POST" action="subirrotomoldeo.php">
								<fieldset>
									
									<p><legend>Ingresar rotomoldeo</legend>
									
									<p>Molde usado:<br><input type="text" name="molde">
									
									<p>Duracion del proceso:<br><input type="time" name="duracion">
									
									<p>Cantidad creada:<br><input type="number" name="cantidad">
									
									<p>Fecha de produccion:<br><input type="date" name="fecha">
									
									<p>Material 1:<br><select name="material1">
											<option selected hidden disabled>Material</option>
											<?php
												include "db/conexion.php";
												$sql_leer='SELECT codigo FROM mpcomprado
												UNION
												SELECT codigo FROM mocomprado
												UNION
												SELECT codigo FROM mproducido
												UNION
												SELECT codigo FROM mbruto;';

												$gsent = $cnn->prepare($sql_leer);
												$gsent->execute();
												$resultados = $gsent->fetchAll();
											    foreach ($resultados as $dato): 

											?>
											<option value="<?php echo $dato['codigo']; ?>"><?php echo $dato['codigo']; ?></option>
											<?php endforeach; ?>
										</select>
									
									<p>Cantidad Material 1:<br><input type="number" min="0" name="cm1"> gr.
									
									<p>Material 2:<br><select name="material2">
											<option value="-" selected>-</option>
											<?php
												include "db/conexion.php";
												$sql_leer='SELECT codigo FROM mpcomprado
												UNION
												SELECT codigo FROM mocomprado
												UNION
												SELECT codigo FROM mproducido
												UNION
												SELECT codigo FROM mbruto;';
												$gsent = $cnn->prepare($sql_leer);
												$gsent->execute();
												$resultados = $gsent->fetchAll();
											    foreach ($resultados as $dato): 

											?>
											<option value="<?php echo $dato['codigo']; ?>"><?php echo $dato['codigo']; ?></option>
											<?php endforeach; ?>
										</select>
									<p>Cantidad Material 2:<br><input type="number" min="0" name="cm2"> gr.
										<br>

										<p>Material 3:<br><select name="material3">
											<option value="-" selected>-</option>
											<?php
												include "db/conexion.php";
												$sql_leer='SELECT codigo FROM mpcomprado
												UNION
												SELECT codigo FROM mocomprado
												UNION
												SELECT codigo FROM mproducido
												UNION
												SELECT codigo FROM mbruto;';
												$gsent = $cnn->prepare($sql_leer);
												$gsent->execute();
												$resultados = $gsent->fetchAll();
											    foreach ($resultados as $dato): 

											?>
											<option value="<?php echo $dato['codigo']; ?>"><?php echo $dato['codigo']; ?></option>
											<?php endforeach; ?>
										</select>
									<p>Cantidad Material 3:<br><input type="number" min="0" name="cm3"> gr.


								<p><input type="submit">
								</fieldset>
							</form>
					</div>
				</center>
			</article>
		</main>
	</body>
</html>
