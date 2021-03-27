<?php
	require_once('CrearConexion.php');
	session_start();
		
	if (($_SESSION['navegador']!=md5($_SERVER['HTTP_USER_AGENT'])) && (!isset($_SESSION['Tipo']))){
		header('location: logout.php');
	}
	session_regenerate_id();
	$_SESSION['TipoEliminacion'] = "2";

	$stmt = $dbh->prepare("SELECT * FROM persona");
	$stmt->execute();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include_once 'header.html';
?>
<link rel="stylesheet" type="text/css" href="EstiloListarPersonasBD.css"/>
<a href="logout.php">Salir</a>
<a href="Administradores.php">Menu</a>
<table class="TablaPersonas">
	<tr>
				<th>Dni</th>
				<th>Apellido</th>
				<th>Nombre</th>
				<th>Fecha_Nac</th>
				<th>Sexo</th>
				<th>Telefono</th>
				<th>Movil</th>		
				<th>Email</th>
				<th>Domicilio</th>
				<th>Localidad</th>
				<th>Provincia</th>
				<th>Pais</th>
				<th>TipoDni</th>
			</tr>
	<?php
	while ($unaFila = $stmt->fetchObject()) { ?>
		<tr>
				<td><?php echo $unaFila->Dni; ?></td>
				<td><?php echo $unaFila->Apellido; ?></td>
				<td><?php echo $unaFila->Nombre; ?></td>
				<td><?php echo $unaFila->Fecha_Nac; ?></td>
				<td><?php echo $unaFila->Sexo; ?></td>
				<td><?php echo $unaFila->Telefono; ?></td>
				<td><?php echo $unaFila->Movil; ?></td>
				<td><?php echo $unaFila->Email; ?></td>
				<td><?php echo $unaFila->Domicilio; ?></td>
				<td><?php echo $unaFila->Localidad; ?></td>
				<td><?php echo $unaFila->Provincia; ?></td>
				<td><?php echo $unaFila->Pais; ?></td>
				<td><?php echo $unaFila->TipoDni; ?></td>
			</tr>	
	<?php } ?>
</table>
<center><a href="Eliminar.php">Eliminar una persona</a></center>
<?php include_once 'footer.php'?>
</body>
</html>