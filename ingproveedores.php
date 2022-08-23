<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
			<article>
                <center>
                    <h2>Ingresar proveedores</h2>
                    <form method="post" action="subirproveedor.php">
                        <fieldset>
                            Nombre:
                            <input type="text" name="name" required>
                        </fieldset>
                        <fieldset>
                            Nº Telefono:
                            <input type="number" name="phone" required>
                        </fieldset>
                        <fieldset>
                            E-Mail:
                            <input type="email" name="mail" required>
                        </fieldset>
                        <fieldset>
                            Pagina WEB:
                            <input type="url" name="web">
                        </fieldset>
                        <fieldset>
                            Contacto:
                            <input type="text" name="contact" required>
                        </fieldset>
                        <fieldset>
                            Direccion:
                            <input type="text" name="direccion" required>
                        </fieldset>
                        <fieldset>
                        	Seleccione que provee
                        	<select name="a">
                        		<option disabled hidden selected>Seleccion</option>
                        		<option value="1">Plasticos</option>
                        		<option value="2">Otros</option>
                        	</select>
                        </fieldset>
                        <fieldset>
                            <input type="submit">
                        </fieldset>
                    </form>
                </center>
			</article>
		</main>
	</body>
</html>