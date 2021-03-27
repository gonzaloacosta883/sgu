<?php
	require_once('CrearConexion.php');

	if(isset($_POST['bt_editar'])){
		session_start();
		//$tipoDocumento = htmlentities(trim($_POST['TipoDocumento']));
		$dni = htmlentities(trim($_SESSION['Dni']));
		$apellido = htmlentities(trim(ucwords($_POST['apellido'])));
		$nombre = htmlentities(trim(ucwords($_POST['nombre'])));
		$fechaNac = htmlentities(trim($_POST['fechaNacimiento']));
		$sexo = htmlentities(trim($_POST['sexo']));
		$telefono = htmlentities(trim($_POST['telefono']));
		$movil = htmlentities(trim($_POST['movil']));
		$email = htmlentities(trim(strtolower($_POST['correoElectronico']))); //Lo convierto minusculas y elimino los espacios en blanco al inicio y al final
		$domicilio = htmlentities(trim(ucwords($_POST['domicilio'])));
		$localidad = htmlentities(trim(ucwords($_POST['localidad'])));
		$provincia = htmlentities(trim(ucwords($_POST['provincia'])));
		$pais = htmlentities(trim(ucwords($_POST['pais'])));

	$sentenciaSQL = "UPDATE persona SET Dni = '".$dni."',Apellido = '".$apellido."', Nombre = '".$nombre."', Fecha_Nac = '".$fechaNac."', Sexo = '".$sexo."', Telefono = '".$telefono."', Movil = '".$movil."', Email = '".$email."', Domicilio = '".$domicilio."', Localidad = '".$localidad."', Provincia = '".$provincia."', Pais = '".$pais."' WHERE Dni= '".$_SESSION['Dni']."'";

	$ejecutar = $dbh->prepare($sentenciaSQL);
	$ejecutar->execute();

	if($ejecutar){
		echo "Datos cargados con exito";
		header("Refresh: 5; URL=MiInformacion.php");
	}else{
		echo "ERROR";
		header("Refresh: 5; URL=Editar.php");
	}

	}
?>