		<!--
			ADVERTENCIA
			Al modificar este archivo se modificara en todos los que lo usen
		-->
		<!-- Link a archivo de JQuery -->
		<script type="text/javascript" src="script/jquery.js"></script>
		<!-- Link a hoja de scripts de Javascript -->
		<script type="text/javascript" src="script/JS.js"></script>
		<!-- Links de Bootstrap Javascript -->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
		<main>
			<header>
				<!-- Navbar -->
				<nav class="navbar navbar-expand-lg navbar-light bg-primary">
					<!-- Logo mas link a index -->
					<a href="index.php" class="navbar-brand">
						<img src="img/logo.jpg" width="55" height="50" class="d-inline-block align-top rounded-lg" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<!-- Navbar collapse (agregar boton de alerta) -->
					<div class="collapse navbar-collapse" id="navbarNav">
						<div class="d-flex">
							<div>
								<ul class="navbar-nav">
									<!-- Link a la pagina principal -->
									<li class="nav-item active">
										<a class="tittle nav-link" href="index.php">Inicio</a>
									</li>
									<!-- Link a la pagina de pedidos -->
									<li class="nav-item active">
										<a class="tittle nav-link" href="pedidos.php">Pedidos</a>
									</li>
									<!-- Link a la pagina de productos -->
									<li class="nav-item active">
										<a class="tittle nav-link" href="productos.php">Productos</a>
									</li>
									<!-- Link a la pagina de  -->
									<li class="nav-item active">
										<a class="tittle nav-link" href="materiales.php">Materiales</a>
									</li>
									<!-- Link a la pagina de produccion -->
									<li class="nav-item active">
										<a class="tittle nav-link" href="produccion.php">Produccion</a>
									</li>
									<!-- Link a la pagina de proveedores -->
									<li class="nav-item active">
										<a class="tittle nav-link" href="proveedores.php">Proveedores</a>
									</li>
								</ul>
							</div>
							<!-- Boton de alerta -->
							<div class="d-flex d-row-reverse">
								<?php
									// Incluimos la conexion a la base de datos
									include "db/conexion.php";
									// Seleccionamos los campos a leer en la base de datos, mediante una consulta SQL
									$leer_sql='SELECT nombre,stock_disponible,color FROM productosalmacen WHERE stock_disponible=0';
									// Preparamos la secuencia a ejecutar y la almacenamos en una variable
									$gsent = $cnn->prepare($leer_sql);
									// ejecutamos la variable
									$gsent->execute();
									// Leemos el array traido por la consulta, almacenandolo en una variable
									$resultadosalert = $gsent->fetchAll();
									// Establecemos el contador a cero
									$cfsa=0;
									// Recorremos el array traido
									foreach ($resultadosalert as $datoalert)
									{
										// Alerta sin stock
										if ($datoalert['stock_disponible']==0)
										{
											// Sumamos 1 al contador
											$cfsa=$cfsa+1;
											// Cargamos el producto sin stock en un array
											$arrayss=array($datoalert['nombre'],$datoalert['color']);
										}
									}
									// Si no hay stock
									if ($cfsa!=0):
								?>
								<button class="navalert" id="btnnostock"><i class="text-danger navalerticon bi bi-exclamation-circle-fill"></i></button>
								<?php
									endif;
									// Si hay stock
									if($cfsa==0):
								?>
								<i class="text-success navalerticon bi bi-check-circle-fill"></i>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<!-- Ventana modal -->
					<div id="modalnostock" class="modal" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<!-- cabeza de la ventana modal -->
							<div class="modal-content bg-primary">
								<!-- Titulo y boton de cerrar -->
								<div class="modal-header">
									<h5 class="modal-title tittle">¡Falta de stock!</h5>
									<button type="button" class="d-flex d-row-reverse btn btn-secondary" data-dismiss="modal">Cerrar</button>
								</div>
								<!-- Cuerpo de la ventana modal -->
								<div class="modal-body bg-dark">
									<!-- Titulo -->
									<div class="d-flex justify-content-center">
										<p>Falta de stock en:</p>
									</div>
									<!-- Texto de producto con falta de stock -->
									<div class="d-flex justify-content-center">
										<?php
											// Recorremos el array para saber el producto sin stock
											foreach ($arrayss as $arrayssleer){
												// Display de producto sin stock
												echo $arrayssleer." ";
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</nav>
			</header>
			<!-- Funciones de la ventana modal -->
			<script type="text/javascript">
				// Definimos la funcion de btnnostock (Mostrar la ventana modal al clickear)
		    	$("#btnnostock").click(function(){
			        $('#modalnostock').modal('show');
		   		});
			</script>