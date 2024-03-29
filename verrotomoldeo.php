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
					    $sql_unico='SELECT * FROM rotomoldeo WHERE id_rotomoldeo=?';
					    $gsent_unico = $cnn->prepare($sql_unico);
					    $gsent_unico->execute(array($id));
					    $resultado_unico = $gsent_unico->fetch();
						}
					?>
					<?php if ($_GET): ?>
					<form method="GET" action="editarrotomoldeo.php">
						<fieldset>
							<h4>Editar rotomoldeo</h4>
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
							Material 1<input type="text" name="material1" value="<?php echo $resultado_unico['material1']?>">
						</fieldset>
						<fieldset>
							Material 2<input type="text" name="material2" value="<?php echo $resultado_unico['material2']?>">
						</fieldset>
						<fieldset>
							Material 3<input type="text" name="material3" value="<?php echo $resultado_unico['material3']?>">
						</fieldset>
						<fieldset>
							<input type="hidden" name="id" value="<?php echo $resultado_unico['id_rotomoldeo']?>">
						</fieldset>
						<fieldset>
							<input type="submit">
						</fieldset>
					</form>
					<?php endif ?>
					<h2>Rotomoldeo</h2><br>
				<button onclick="window.print()">Imprimir</button>
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
							$sql_leer='SELECT * FROM rotomoldeo ';
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
						    <td><a href="verrotomoldeo.php?id=<?php echo $dato['id_rotomoldeo']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarrotomoldeo.php?id=<?php echo $dato['id_rotomoldeo']; ?>"><i class="bi bi-trash"></i></a></td>
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