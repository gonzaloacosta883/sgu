<?php 

require_once('CrearConexion.php');

if($_SESSION['navegador']!=md5($_SERVER['HTTP_USER_AGENT'])){
	header('location: logout.php');
}
session_regenerate_id();
if ((isset($_POST['bt_eliminar'])and(ctype_digit($_POST['Dni'])))) {
//verifico que los datos en el formulario de eliminar
//sean numericos
session_start();	
	if($_SESSION['TipoEliminacion']=="2"){
	$solicitudSQL = "DELETE FROM usuario WHERE Dni = '" . $_POST['Dni'] . "'";
	$solicitudSQL2 = "DELETE FROM persona WHERE Dni = '" . $_POST['Dni'] . "'";
	

	$stmt = $dbh->prepare($solicitudSQL);
	$stmt->execute();
	$stmt2 = $dbh->prepare($solicitudSQL2);
	$stmt2->execute();

	header('location: MensajeProcesoEliminar.php');
}else{
	$solicitudSQL = "DELETE FROM usuario WHERE Dni = '" . $_POST['Dni'] . "'";

	$stmt = $dbh->prepare($solicitudSQL);
	$stmt->execute();

	header('location: MensajeProcesoEliminar.php');
}
}else{
	echo "*DEBE COMPLETAR LOS CAMPOS*";
	header("Refresh: 5; URL=Eliminar.php");
}
?>