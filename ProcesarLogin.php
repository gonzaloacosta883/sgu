<?php
	
	require_once('CrearConexion.php');
	session_start();
	if (isset($_POST['bt_enviar']) && ($_POST['g-recaptcha-response']!='')){
		if(!isset($_SESSION['initiated'])){
			session_regenerate_id();
 			$_SESSION['initiated'] = true;
		}
	
	$_SESSION['navegador']=md5($_SERVER['HTTP_USER_AGENT']);
	
	$_SESSION['Usuario'] = trim($_POST['Usuario']);
	$salt = 'con_laravel_esto_no_pasa';
	$_SESSION['Clave'] = crypt(htmlentities(trim($_POST['Clave'])),$salt);

		$user = htmlentities($_SESSION['Usuario']);

	$consultaSQL = "SELECT Username, Password, Habilitacion FROM usuario WHERE Username = '".$user."'";

	$usuario = $dbh->prepare($consultaSQL);
	$usuario->execute();

	while ($unaFila = $usuario->fetchObject()) {
		if(hash_equals($unaFila->Password, $_SESSION['Clave'])){
		$_SESSION['Tipo'] = $unaFila->Habilitacion;
		$_SESSION['Dni'] = $unaFila->Dni;
		if($unaFila->Habilitacion == "admin"){
			header('location: Administradores.php');
		}else{
			header('location: MiInformacion.php');
		}
	}else{
		echo "*USUARIO O CONTRASENIA MAL INGRESADOS";echo "<br/>";
		echo "*REINTENTELO NUEVAMENTE";echo "<br/>";
		echo "*ESPERE Y SERA REDIRECCIONADO AL LOGIN";echo "<br/>";
		header("Refresh: 5; URL=index.php");
	}
}
}else{
	echo "*DEBE COMPLETAR TODOS LOS CAMPOS";echo "<br/>";
	echo "*ESPERE Y SERA REDIRECCIONADO AL LOGIN";echo "<br/>";
	header("Refresh: 5; URL=index.php");
}
?>