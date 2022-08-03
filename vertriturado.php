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
					    $sql_unico='SELECT * FROM triturado WHERE id_triturado=?';
					    $gsent_unico = $cnn->prepare($sql_unico);
					    $gsent_unico->execute(array($id));
					    $resultado_unico = $gsent_unico->fetch();
						}
					?>
					<?php if ($_GET): ?>
					<form method="GET" action="editartriturado.php">
						<fieldset>
							<h4>Editar triturado</h4>
						</fieldset>
						<fieldset>
							Cantidad<input type="number" name="cantidad" step="0.001" min="0.01" value="<?php echo $resultado_unico['cantidad']?>">
						</fieldset>
						<fieldset>
							Tipo de plastico
							<select name="a" value="<?php echo $resultado_unico['tipo_de_plastico']?>">
								<option hidden disabled selected>Tipo de plastico</option>
								<option value="polietileno">Polietileno</option>
								<option value="polipropileno">Polipropileno</option>
							</select>
						</fieldset>
						<fieldset>
							Color<input type="text" name="color" value="<?php echo $resultado_unico['color']?>">
						<fieldset>
							Fecha de molienda<input type="date" name="fecha" value="<?php echo $resultado_unico['fecha']?>">
						</fieldset>
						<fieldset>
							<input type="hidden" name="id" value="<?php echo $resultado_unico['id_triturado']?>">
						</fieldset>
						<fieldset>
							<input type="submit">
						</fieldset>
					</form>
					<?php endif ?>
					<h2>Triturado</h2>
				</center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Cantidad</th>
							<th>Tipo de plastico</th>
							<th>Color</th>
							<th>Fecha de molienda (A/M/D)</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include_once "db/conexion.php";
							$sql_leer='SELECT * FROM triturado ';
							$gsent = $cnn->prepare($sql_leer);
							$gsent->execute();
							$resultados = $gsent->fetchAll();
						    foreach ($resultados as $dato):
						?>
					    <tr>
						    <td><?php echo $dato['cantidad']; ?></td>
						    <td><?php echo $dato['tipo_de_plastico']; ?></td>
						    <td><?php echo $dato['color']; ?></td>
						    <td><?php echo $dato['fecha']; ?></td>
						    <td><a href="vertriturado.php?id=<?php echo $dato['id_triturado']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminartriturado.php?id=<?php echo $dato['id_triturado']; ?>" onclick="confirmar()"><i class="bi bi-trash"></i></a></td>
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