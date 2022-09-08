<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
			<article class="col">
				<center>
					<?php
						include_once "db/conexion.php";
						if($_GET) {
					    $id=$_GET['id'];
					    $sql_unico='SELECT * FROM mproducido WHERE id_producido=?';
					    $gsent_unico = $cnn->prepare($sql_unico);
					    $gsent_unico->execute(array($id));
					    $resultado_unico = $gsent_unico->fetch();
						}
					?>
					<?php if ($_GET): ?>
					<form method="GET" action="editarmproducido.php">
						<fieldset>
							<h4>Editar material producido</h4>
						</fieldset>
						<fieldset>
								Codigo<input type="text" name="codigo" value="<?php echo $resultado_unico['codigo'] ?>">
							</fieldset>
						<fieldset>
							Tipo de molienda
							<select name="molienda" value="<?php echo $resultado_unico['tipo_molienda'] ?>">
								<option value="<?php echo $resultado_unico['tipo_molienda'] ?>" selected disabled hidden><?php echo $resultado_unico['tipo_molienda'] ?></option>
								<option value="fina">Fina</option>
								<option value="gruesa">Gruesa</option>
							</select>
						</fieldset>
						<fieldset>
							Tipo de plastico
							<select name="tipo" value="<?php echo $resultado_unico['tipo_plastico'] ?>">
								<option value="<?php echo $resultado_unico['tipo_plastico'] ?>" selected disabled hidden><?php echo $resultado_unico['tipo_plastico'] ?></option>
								<option value="polietileno">Polietileno</option>
								<option value="polipropileno">Polipropileno</option>
							</select>
						</fieldset>
						<fieldset>
							Cantidad<input type="number" name="cantidad" min="0" value="<?php echo $resultado_unico['cantidad'] ?>">
						</fieldset>
						<fieldset>
							Estado
							<select name="estado" value="<?php echo $resultado_unico['estado'] ?>">
								<option value="pellets">Pellets</option>
								<option value="molienda">Molienda</option>
								<option value="polvo">Polvo</option>
								<option value="agrumado">Agrumado</option>
							</select>
						</fieldset>
						<fieldset>
							Fecha de produccion<input type="date" name="fecha" value="<?php echo $resultado_unico['fecha'] ?>">
						</fieldset>
						<fieldset>
							<input type="hidden" name="id" value="<?php echo $resultado_unico['id_producido'] ?>">
						</fieldset>
						<fieldset>
							<input type="submit">
						</fieldset>
					</form>
					<?php endif ?>
					<h2>Material producido</h2>
				</center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Tipo de molienda</th>
							<th>Codigo</th>
							<th>Tipo de plastico</th>
							<th>Cantidad (KG)</th>
							<th>Estado</th>
							<th>Color</th>
							<th>Fecha de produccion (A/M/D)</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include_once "db/conexion.php";
							$sql_leer='SELECT * FROM mproducido ';
							$gsent = $cnn->prepare($sql_leer);
							$gsent->execute();
							$resultados = $gsent->fetchAll();
						    foreach ($resultados as $dato):
						?>
					    <tr>
						    <td><?php echo $dato['tipo_molienda']; ?></td>
						    <td><?php echo $dato['codigo']; ?></td>
						    <td><?php echo $dato['tipo_plastico']; ?></td>
						    <td><?php echo $dato['cantidad']; ?></td>
						    <td><?php echo $dato['estado']; ?></td>
						    <td><?php echo $dato['color']; ?></td>
						    <td>
						    	<?php
						    		if($dato['fecha']!=null)
						    		{
						    			echo $dato['fecha'];
						    		}
						    		else
						    		{
						    			echo 'Sin especificar';
						    		}
								?>
							</td>
						    <td><a href="verproducido.php?id=<?php; ?>&id=<?php echo $dato['id_producido']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarmproducido.php?id=<?php echo $dato['id_producido']; ?>" onclick="confirmar()"><i class="bi bi-trash"></i></a></td>
					    </tr>
						<?php
							endforeach
						?>
					</tbody>
				</table>
			</article>
		</main>
	</body>
</html>