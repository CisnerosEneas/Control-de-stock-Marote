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
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
		<script src="script/JS.js"></script>
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
			<article class="col">
				<center>
					<?php
						include_once "db/conexion.php";
						if($_GET) {
					    $id=$_GET['id'];
					    $sql_unico='SELECT * FROM productos WHERE id_producto=?';
					    $gsent_unico = $cnn->prepare($sql_unico);
					    $gsent_unico->execute(array($id));
					    $resultado_unico = $gsent_unico->fetch();
						}
					?>
					<?php if ($_GET): ?>
					<h2>Editar productos</h2>
					<form method="GET" action="editarproducto.php">
						<fieldset>
							Nombre<input type="text" name="name" value="<?php echo $resultado_unico['nombre']?>">
						</fieldset>
						<fieldset>
							Color<input type="text" name="color" value="<?php echo $resultado_unico['color']?>">
						</fieldset>
						<fieldset>
							Metodo de produccion
							<select name="a" value="<?php echo $resultado_unico['id_tipo_procesado']?>">
								<option selected hidden disabled> Seleccione un metodo de produccion</option>
								<option value="2">Inyeccion</option>
								<option value="1">Rotomoldeo</option>
							</select>
						</fieldset>
						<fieldset>
							Precio<input type="number" name="price" step="0.01" min="0" value="<?php echo $resultado_unico['precio']?>">
						</fieldset>
						<fieldset>
							Cantidad disp.<input type="number" name="stock" value="<?php echo $resultado_unico['stock_disponible']?>">
						</fieldset>
						<fieldset>
							<input type="hidden" name="id" value="<?php echo $resultado_unico['id_producto']?>">
						</fieldset>
						<fieldset>
							<input type="submit">
						</fieldset>
					</form>
					<?php endif ?>
					<h2>Productos</h2>
				</center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Color</th>
							<th>Metodo de produccion</th>
							<th>Precio</th>
							<th>Cantidad disp.</th>
							<th>Descrip.</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include_once "db/conexion.php";
							$sql_leer='SELECT * FROM productos';
							$gsent = $cnn->prepare($sql_leer);
							$gsent->execute();
							$resultados = $gsent->fetchAll();
						    foreach ($resultados as $dato):
						?>
					    <tr>
						    <td><?php echo $dato['nombre']; ?></td>
						    <td><?php echo $dato['color']; ?></td>
						    <td>
							    <?php
								    if($dato['id_tipo_procesado']==1)
								    	{echo 'Rotomoldeo';}
								    else
							    		{
							    			if($dato['id_tipo_procesado']==4)
							    				{echo 'Otro';}
							    			else
							    				{echo 'Inyeccion';}
							    		}
								?>
							</td>
						    <td>$<?php echo $dato['precio']; ?></td>
						    <td><?php echo $dato['stock_disponible']; ?></td>
						    <td>
						    	<?php
							    	if($dato['descripcion']==null)
							    		{echo 'Sin descripcion';}
								    else
								    	{echo $dato['descripcion'];}
								?>
								</td>
						    <td><a href="verproducto.php?id=<?php; ?>&id=<?php echo $dato['id_producto']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarproducto.php?id=<?php echo $dato['id_producto']; ?>" onclick="return confirmar()"><i class="bi bi-trash"></i></a></td>
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