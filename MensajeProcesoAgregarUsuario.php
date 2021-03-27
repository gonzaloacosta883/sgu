<?php
	session_start();
	echo "NOMBRE DE USUARIO OCUPADO";
	echo " ELIGA OTRO";
	header("Refresh: 3; URL=AgregarUsuario.php");
?>