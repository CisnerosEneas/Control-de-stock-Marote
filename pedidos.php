<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
			<article class="col">
				<center>
					<h2 class="paddingh2">Pedidos</h2>
					<div class="paddingdiv">
						<div>
							<!-- Link al inicio -->
							<a href="index.php"><img id="icons" class="icons" src="img/volver.png"></a>
							<!-- Link a formulario de ingreso de pedidos -->
							<a href="ingpedidos.php"><img id="icons" class="icons" src="img/añadir.png"></a>
							<!-- Link a tabla para ver pedidos activos/no entregados -->
							<a href="verpedidosactivos.php"><img id="icons" class="icons" src="img/pedidos.png"></a>
							<!-- Link a tabla para ver pedidos inactivos/entregados -->
							<a href="verpedidosinactivos.php"><img id="icons" class="icons" src="img/pedidosentregados.png"></a>
						</div>
					</div>
				</center>
			</article>
		</main>
	</body>
</html>