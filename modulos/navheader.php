		<script type="text/javascript" src="script/jquery.js"></script>
		<script type="text/javascript" src="script/JS.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
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
					<div class="d-flex d-row-reverse">
						<?php
							include "db/conexion.php";
							$leer_sql='SELECT nombre,stock_disponible,color FROM productosalmacen WHERE stock_disponible=0';
							$gsent = $cnn->prepare($leer_sql);
							$gsent->execute();
							$resultadosalert = $gsent->fetchAll();
							$cfsa=0;
							foreach ($resultadosalert as $datoalert)
							{
								// alerta sin stock
								if ($datoalert['stock_disponible']==0)
								{
									$cfsa=$cfsa+1;
									$arrayss=array($datoalert['nombre'],$datoalert['color']);
								}
							}
							if ($cfsa!=0):
						?>
						<button class="navalert" id="btnnostock"><i class="text-danger navalerticon bi bi-exclamation-circle-fill"></i></button>
						<?php
							endif;
							if($cfsa==0):
						?>
						<i class="text-success navalerticon bi bi-check-circle-fill"></i>
						<?php endif; ?>
					</div>
					<div id="modalnostock" class="modal" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content bg-primary">
								<div class="modal-header">
									<h5 class="modal-title tittle">¡Falta de stock!</h5>
									<button type="button" class="d-flex d-row-reverse btn btn-secondary" data-dismiss="modal">Cerrar</button>
								</div>
								<div class="modal-body bg-dark">
									<div class="d-flex justify-content-center">
										<p>Falta de stock en:</p>
									</div>
									<div class="d-flex justify-content-center">
										<?php
											foreach ($arrayss as $arrayssleer){
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
			<script type="text/javascript">
		    	$("#btnnostock").click(function(){
			        $('#modalnostock').modal('show');
		   		});
			</script>