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
					    $sql_unico='SELECT * FROM inyeccion WHERE id_inyeccion=?';
					    $gsent_unico = $cnn->prepare($sql_unico);
					    $gsent_unico->execute(array($id));
					    $resultado_unico = $gsent_unico->fetch();
						}
					?>
					<?php if ($_GET): ?>
						<form method="GET" action="editarinyeccion.php">
							<fieldset>
								<h4>Editar inyeccion</h4>
							</fieldset>
							<fieldset>
								Molde usado<input type="text" name="molde" value="<?php echo $resultado_unico['molde']?>">
							</fieldset>
							<fieldset>
								Duracion del proceso<input type="time" name="duracion" value="<?php echo $resultado_unico['duracion']?>">
							</fieldset>
							<fieldset>
								Cantidad creada<input type="number" name="cantidad" value="<?php echo $resultado_unico['cantidad']?>">
							</fieldset>
							<fieldset>
								Fecha de produccion<input type="date" name="fecha" value="<?php echo $resultado_unico['fecha']?>">
							</fieldset>
							<fieldset>
								Procentajes utilizados<input type="text" name="porcentajes" value="<?php echo $resultado_unico['material_utilizado']?>">
							</fieldset>
							<fieldset>
								<input type="hidden" name="id" value="<?php echo $resultado_unico['id_inyeccion']?>">
							</fieldset>
							<fieldset>
								<input type="submit">
							</fieldset>
						</form>
					<?php endif ?>
					<h2>Inyeccion</h2>
				</center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Molde usado</th>
							<th>Duracion del proceso</th>
							<th>Cantidad creada</th>
							<th>Fecha (A/M/D)</th>
							<th>Material 1</th>
							<th>Cantidad Material 1</th>
							<th>Material 2</th>
							<th>Cantidad Material 2</th>
							<th>Material 3</th>
							<th>Cantidad Material 3</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include_once "db/conexion.php";
							$sql_leer='SELECT * FROM inyeccion ';
							$gsent = $cnn->prepare($sql_leer);
							$gsent->execute();
							$resultados = $gsent->fetchAll();
						    foreach ($resultados as $dato):
						?>
					    <tr>
						    <td><?php echo $dato['molde']; ?></td>
						    <td>Hrs: <?php echo $dato['duracion']; ?></td>
						    <td><?php echo $dato['cantidad']; ?></td>
						    <td><?php echo $dato['fecha']; ?></td>
						    <td><?php echo $dato['material1']; ?></td>
						    <td><?php echo $dato['cm1']; ?></td>
						    <td><?php echo $dato['material2']; ?></td>
						    <td><?php echo $dato['cm2']; ?></td>
						    <td><?php echo $dato['material3']; ?></td>
						    <td><?php echo $dato['cm3']; ?></td>
						    <td><a href="verinyeccion.php?id=<?php; ?>&id=<?php echo $dato['id_inyeccion']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarinyeccion.php?id=<?php echo $dato['id_inyeccion']; ?>"><i class="bi bi-trash"></i></a></td>
					    </tr>
						<?php
							endforeach;
						?>
					</tbody>
				</table>
			</article>
		</main>
	</body>
</html>