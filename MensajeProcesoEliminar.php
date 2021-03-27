<?php
	session_start();
	echo "REGISTROS ELIMINADOS CON EXITO";
	if ($_SESSION['TipoEliminacion']=='1') {
		header("Refresh: 3; URL=ListarUsuariosBD.php");
	}
	else {
		header("Refresh: 3; URL=ListarPersonasBD.php");
	}
?>