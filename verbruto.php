<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
			<article>
				<?php
					include_once "db/conexion.php";
					if($_GET) {
				    $id=$_GET['id'];
				    $sql_unico='SELECT * FROM mbruto WHERE id_materia=?';
				    $gsent_unico = $cnn->prepare($sql_unico);
				    $gsent_unico->execute(array($id));
				    $resultado_unico = $gsent_unico->fetch();
					}
				?>
				<?php if ($_GET): ?>
				<center>
					<form method="GET" action="editarmbruto.php">
						<fieldset>
							<h4>Editar material en bruto</h4>
						</fieldset>
						<fieldset>
							Codigo<input type="text" name="codigo" value="<?php echo $resultado_unico['codigo']?>">
						</fieldset>
						<fieldset>
							Forma<input type="text" name="forma" value="<?php echo $resultado_unico['forma']?>">
						</fieldset>
						<fieldset>
							Color<input type="text" name="color" value="<?php echo $resultado_unico['color']?>">
						</fieldset>
						<fieldset>
							Tipo de plastico
							<select name="tipo" value="<?php echo $resultado_unico['tipo_plastico']?>">
								<option selected hidden disabled value="<?php echo $resultado_unico['tipo_plastico']?>"><?php echo $resultado_unico['tipo_plastico']?></option>
								<option value="polietileno">Polietileno</option>
								<option value="polipropileno">Polipropileno</option>
							</select>
						</fieldset>
						<fieldset>
							Cantidad<input type="number" name="cantidad" min="0" value="<?php echo $resultado_unico['cantidad']?>">
						</fieldset>
						<fieldset>
							<input type="hidden" name="id" value="<?php echo $resultado_unico['id_materia']?>">
						</fieldset>
						<fieldset>
							<input type="submit">
						</fieldset>
					</form>
				</center>
				<?php endif ?>
				<center><h2>Material bruto</h2></center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Forma del plastico</th>
							<th>Color</th>
							<th>Tipo de plastico</th>
							<th>Cantidad</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include_once "db/conexion.php";
							$sql_leer='SELECT * FROM mbruto ';
							$gsent = $cnn->prepare($sql_leer);
							$gsent->execute();
							$resultados = $gsent->fetchAll();
						    foreach ($resultados as $dato):
						?>
					    <tr>
					    	<td><?php echo $dato['codigo']; ?></td>
						    <td><?php echo $dato['forma']; ?></td>
						    <td><?php echo $dato['color']; ?></td>
						    <td><?php echo $dato['tipo_plastico']; ?></td>
						    <td><?php echo $dato['cantidad']; ?></td>
						    <td><a href="verbruto.php?id=<?php; ?>&id=<?php echo $dato['id_materia']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarmbruto.php?id=<?php echo $dato['id_materia']; ?>" onclick="confirmar()"><i class="bi bi-trash"></i></a></td>
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