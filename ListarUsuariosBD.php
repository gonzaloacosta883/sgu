<?php
	require_once('CrearConexion.php');
	session_start();

if (($_SESSION['navegador']!=md5($_SERVER['HTTP_USER_AGENT'])) && (!isset($_SESSION['Tipo']))){
		header('location: logout.php');
	}
	
	session_regenerate_id();
	$_SESSION['TipoEliminacion'] = "1";

	$stmt = $dbh->prepare("SELECT * FROM usuario");
	$stmt->execute();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="EstiloListarUsuariosBD.css"/>
	<title></title>
</head>
<body>
<?php
	include_once 'header.html';
?>
<a href="logout.php">Salir</a>
<a href="Administradores.php">Menu</a>
<table class="TablaUsuarios">
	<tr>
				<th>Username</th>
				<th>Password</th>
				<th>Dni</th>
	</tr>
	<?php
	while ($unaFila = $stmt->fetchObject()) { ?>
		<tr>
				<td><?php echo $unaFila->Username; ?></td>
				<td><?php echo $unaFila->Password; ?></td>
				<td><?php echo $unaFila->Dni; ?></td>
		</tr>	
	<?php } ?>
</table>
<center><a href="Eliminar.php">Eliminar un usuario</a></center>
<center><a href="AgregarUsuario.php">Agregar un usuario</a></center>
<?php include_once 'footer.php'?>
</body>
</html>