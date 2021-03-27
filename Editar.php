<?php
session_start();

	if (!isset($_SESSION['Tipo']) && ($_SESSION['navegador']!=md5($_SERVER['HTTP_USER_AGENT']))){
		header('location: logout.php');
	}else{
		session_regenerate_id();
	}

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="EstiloAgregarPersona.css"/>
</head>

<body>

<?php include_once 'header.html' ?>

<div class="MenuNavegacion">
	<nav><!--<MENU DE NAVEGACION>-->
		<a href="logout.php">Salir</a>
		<a href="index.php">Inicio</a>
	</nav>
</div>

<div class="EstiloFormularioAgregarPersona">

	<div class="EstiloCabeceraAgregarP">
		<h2>EDITAR DATOS PERSONALES</h2>
	</div>
	<!--<link rel="stylesheet" href="EstiloAgregarPersona.css">-->

<form action="ProcesarEditarPersona.php" method="POST">
	<input type="text" name="apellido" value="" placeholder="Apellido" required><br/>
	<input type="text" name="nombre" value="" placeholder="Nombre" required><br/>
	<input type="text" name="fechaNacimiento" value="" placeholder="Fecha de nacimiento (AAAA-MM-DD)" required><br/>
	<input type="text" name="sexo" value="" placeholder="Sexo (M o F)" required><br/>
	<input type="text" name="telefono" value="" placeholder="Telefono" required><br/>
	<input type="text" name="movil" value="" placeholder="Telefono Movil" required><br/>
	<input type="text" name="correoElectronico" value="" placeholder="Correo Electronico" required><br/>
	<input type="text" name="domicilio" value="" placeholder="Domicilio" required><br/>
	<input type="text" name="localidad" value="" placeholder="Localidad" required><br/>
	<input type="text" name="provincia" value="" placeholder="Provincia" required><br/>
	<input type="text" name="pais" value="" placeholder="Pais" required><br/>
	<Input type="submit" name="bt_editar" value="Enviar" />
	<!-- id=boton le coloco un id para luego editarlo en el css con #boton -->
	<input type="reset" name="Limpiar" value="Limpiar" id="Limpiar">
</form>
</div>

<?php include_once 'footer.php' ?>

</body>
</html>