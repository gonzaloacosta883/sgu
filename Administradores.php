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
	<?php include_once 'header.html'?>
<a href="logout.php">Salir</a>
<br>
<link rel="stylesheet" type="text/css" href="EstiloAdministradores.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<div class="EstiloAdministradores">
<form>
<body>
<div class="EstiloCabeceraAdmin">
	<h2>Menu de Aplicaciones</h2>
</div>
	<i class="iconoPersonas fas fa-users"></i>
	<a href="ListarPersonasBD.php">Personas</a>
	<br>
	<i class="iconoUsuarios fas fa-user-alt"></i>
	<a href="ListarUsuariosBD.php">Usuarios</a>
</form>
</div>
</body>
	<?php include_once 'footer.php'?>
</html>