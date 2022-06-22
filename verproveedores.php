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
					    $sql_unico='SELECT * FROM proveedores WHERE id_proveedor=?';
					    $gsent_unico = $cnn->prepare($sql_unico);
					    $gsent_unico->execute(array($id));
					    $resultado_unico = $gsent_unico->fetch();
						}
					?>
					<?php if ($_GET): ?>
					<h2>Editar proveedores</h2>
	                <form method="GET" action="editarproveedor.php">
	                    <fieldset>
	                        Nombre:
	                        <input type="text" name="name" value="<?php echo $resultado_unico['nombre']?>">
	                    </fieldset>
	                    <fieldset>
	                        Nº Telefono:
	                        <input type="number" name="phone" value="<?php echo $resultado_unico['telefono']?>">
	                    </fieldset>
	                    <fieldset>
	                        E-Mail:
	                        <input type="email" name="mail" value="<?php echo $resultado_unico['mail']?>">
	                    </fieldset>
	                    <fieldset>
	                        Pagina WEB:
	                        <input type="url" name="web" value="<?php echo $resultado_unico['web']?>">
	                    </fieldset>
	                    <fieldset>
	                        Contacto:
	                        <input type="text" name="contact" value="<?php echo $resultado_unico['contacto']?>">
	                    </fieldset>
	                    <fieldset>
	                    	Seleccione que provee
	                    	<select name="a" value="<?php echo $resultado_unico['provee']?>">
	                    		<option disabled hidden selected>Seleccion</option>
	                    		<option value="1">Plasticos</option>
	                    		<option value="2">Otros</option>
	                    	</select>
	                    </fieldset>
	                    <fieldset>
							<input type="hidden" name="id" value="<?php echo $resultado_unico['id_proveedor']?>">
						</fieldset>
	                    <fieldset>
	                        <input type="submit">
	                    </fieldset>
	                </form>
	            	<?php endif ?>
					<h2>Proveedores</h2>
				</center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Telefono</th>
							<th>Mail</th>
							<th>Web</th>
							<th>Contacto</th>
							<th>Provee</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include_once "db/conexion.php";
							$sql_leer='SELECT * FROM proveedores ';
							$gsent = $cnn->prepare($sql_leer);
							$gsent->execute();
							$resultados = $gsent->fetchAll();
						    foreach ($resultados as $dato):
						?>
					    <tr>
						    <td><?php echo $dato['nombre']; ?></td>
						    <td><?php echo $dato['telefono']; ?></td>
						    <td><?php echo $dato['mail']; ?></td>
						    <td><a href="<?php echo $dato['web']; ?>"><?php echo $dato['web']; ?></a></td>
						    <td><?php echo $dato['contacto']; ?></td>
						    <td>
						    	<?php
						    		if ($dato['provee']==1)
						    		{
						    			echo "Plasticos";
						    		}
						    		else
						    		{
						    			echo "Otros";
						    		}
						    	?>
						    </td>
						    <td><a href="verproveedores.php?id=<?php echo $dato['id_proveedor']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarproveedor.php?id=<?php echo $dato['id_proveedor']; ?>" onclick="confirmar()"><i class="bi bi-trash"></i></a></td>
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