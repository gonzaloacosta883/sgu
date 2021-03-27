<?php session_start();
	require_once('CrearConexion.php');

	if (!isset($_SESSION['Tipo']) && ($_SESSION['navegador']!=md5($_SERVER['HTTP_USER_AGENT']))){
		header('location: logout.php');
	}else{
		session_regenerate_id();
	}

	$consultaSQL = "SELECT Dni FROM usuario WHERE Username = '" . $_SESSION['Usuario'] . "' AND Password = '" . $_SESSION['Clave'] ."'";

	$usuario = $dbh->prepare($consultaSQL);
	$usuario->execute();

	while ($unaFila = $usuario->fetchObject()) {
		$_SESSION['Dni'] = $unaFila->Dni;
	}

	$consultaSQL2 = "SELECT Dni, Apellido, Nombre, Fecha_Nac, Sexo, Telefono, Movil, Email, Domicilio, Localidad, Provincia, Pais, TipoDni FROM persona WHERE Dni = '".$_SESSION['Dni']."'";

	$usuario2 = $dbh->prepare($consultaSQL2);
	$usuario2->execute();


	/*REVISAR EL WHILE INNECESARIO???*/
	while ($obj = $usuario2->fetchObject()) {
		$_SESSION['Apellido'] = $obj->Apellido;
		$_SESSION['Nombre'] = $obj->Nombre;
		$_SESSION['Fecha_Nac'] = $obj->Fecha_Nac;
		$_SESSION['Sexo'] = $obj->Sexo;
		$_SESSION['Telefono'] = $obj->Telefono;
		$_SESSION['Movil'] = $obj->Movil;
		$_SESSION['Email'] = $obj->Email;
		$_SESSION['Domicilio'] = $obj->Domicilio;
		$_SESSION['Localidad'] = $obj->Localidad;
		$_SESSION['Provincia'] = $obj->Provincia;
		$_SESSION['Pais'] = $obj->Pais;
		$_SESSION['TipoDni'] = $obj->TipoDni;
	}	

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
	<link rel="stylesheet" type="text/css" href="EstiloListarMiInformacion.css"/>
			<a href="logout.php">Salir</a>
			<a href="logout.php">Inicio</a>

		<table class="TablaMiInformacion">
			<tr>
				<td>Dni</td>
				<td>Apellido</td>
				<td>Nombre</td>
				<td>Fecha_Nac</td>
				<td>Sexo</td>
				<td>Telefono</td>
				<td>Movil</td>		
				<td>Email</td>
				<td>Domicilio</td>
				<td>Localidad</td>
				<td>Provincia</td>
				<td>Pais</td>
				<td>TipoDni</td>
			</tr>

			<tr>
				<td><?php echo $_SESSION['Dni']; ?></td>
				<td><?php echo $_SESSION['Apellido']; ?></td>
				<td><?php echo $_SESSION['Nombre']; ?></td>
				<td><?php echo $_SESSION['Fecha_Nac']; ?></td>
				<td><?php echo $_SESSION['Sexo']; ?></td>
				<td><?php echo $_SESSION['Telefono']; ?></td>
				<td><?php echo $_SESSION['Movil']; ?></td>
				<td><?php echo $_SESSION['Email']; ?></td>
				<td><?php echo $_SESSION['Domicilio']; ?></td>
				<td><?php echo $_SESSION['Localidad']; ?></td>
				<td><?php echo $_SESSION['Provincia']; ?></td>
				<td><?php echo $_SESSION['Pais']; ?></td>
				<td><?php echo $_SESSION['TipoDni']; ?></td>
			</tr>
		</table>
	<center><a href="Editar.php">Editar</a></center>
	<?php include_once 'footer.php'?>
	</body>
	</html>