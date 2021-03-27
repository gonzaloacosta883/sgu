<?php session_start();

	if (($_SESSION['navegador']!=md5($_SERVER['HTTP_USER_AGENT'])) && (!isset($_SESSION['Tipo']))){
		header('location: login.php');
	}
	session_regenerate_id();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="EstiloEliminar.css"/>
</head>
<body>
<?php
	include_once 'header.html';
?>
	<a href="logout.php">Salir</a>
	<a href="Administradores.php">Menu</a>
	<?php	if($_SESSION['TipoEliminacion']=="1"){ ?>
			<a href="ListarUsuariosBD.php">Retroceder</a>
			<?php }else{ ?>
			<a href="ListarPersonasBD.php">Retroceder</a>	
			<?php } ?>
	<form action ="ProcesarEliminar.php" method ="POST">
	<center><input type="number" value="" name="Dni" placeholder="Dni" required><br/></center>
	<center><input type="submit" name="bt_eliminar" value="Eliminar"/></center>
	</form>
<?php include_once 'footer.php'?>
</body>
</html>