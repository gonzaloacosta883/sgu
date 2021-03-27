<?php 
	require_once('CrearConexion.php');
	session_start();

		if (($_SESSION['navegador']!=md5($_SERVER['HTTP_USER_AGENT'])) or !isset($_SESSION['Tipo'])){
		header('location: logout.php');
	}
	session_regenerate_id();
?>

<!DOCTYPE html>
<html>
<head>
	<?php include_once 'header.html' ?>

<!--Botones con link para inicio y salir-->
<a href="logout.php">Salir</a> 
<a href="ListarUsuariosBD.php">Retroceder</a>
<a href="Administradores.php">Menu</a>
<br>
<!--Agrego el Estilo css-->
<link rel="stylesheet" type="text/css" href="EstiloAgregarUsuario.css"/>
</head>
<body>

<div class="EstiloFormularioAgregarUsuario">
<form action="ProcesarRegistrarUsuario.php"method = "POST">
	<div class="EstiloCabeceraAgregarU">
		<h2>AGREGAR USUARIO</h2>
	</div>

	<?php require_once('ListarPersonas.php') ?>
	
	<select name="TipoDeUsuario">
		Tipo de Usuario
		<option value:"admin">admin</option>
		<option value:"normal">normal</option>
	</select><br/>
	<input type="text" name="NombreUsuario" value="" placeholder="Nombre de Usuario" required><br/>
	<input type="password" name="Clave" value="" placeholder="Clave de Usuario" required><br/>
	<Input type="submit" name="bt_enviar" value="Enviar" />
	<!-- id=boton le coloco un id para luego editarlo en el css con #boton -->
	<input type="reset" name="Limpiar" value="Limpiar" id="Limpiar">
</form>
</div>
</body>
	<?php include_once 'footer.php'?>
</html>