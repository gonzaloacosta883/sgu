<?php
	require_once('CrearConexion.php');
	session_start();
	
	if(isset($_POST['bt_enviar']) && ($_SESSION['navegador']!=md5($_SERVER['HTTP_USER_AGENT']))){
		session_regenerate_id();
		$dniPersona = $_POST['IdentificacionDePersona'];//dni de la persona que quiere darse de alta como usuario;
		$usuario = htmlentities(trim($_POST['NombreUsuario']));
		$password = htmlentities(trim($_POST['Clave']));
		$tipo=$_POST['TipoDeUsuario'];

	////////
	$consulta = "SELECT Username FROM usuario WHERE Username = '".$usuario."'";

	$res = $dbh->prepare($consulta);
	$res->execute();

	while ($obj = $res->fetchObject()) {
		if($obj){
			header('Location: MensajeProcesoAgregarUsuario.php');
	}
}
	////////

	$sentenciaSQLalta = "INSERT INTO usuario (Username,Password,Habilitacion,Dni) VALUES ('".$usuario."', '".$password."', '".$tipo."',".$dniPersona.")";

	//Cuando es un dato entero solo van comillas dobles "  "

	$ejecutar = $dbh->exec($sentenciaSQLalta);

	if($ejecutar){
		echo "Datos cargados con exito";
		header('location: listarUsuariosBD.php');
	}else{
		echo "ERROR";
		header("Refresh: 5; URL=Eliminar.php");
	}

}

?>