<?php

	require_once('CrearConexion.php');
	
	if (isset($_POST['bt_enviar'])){
		session_start();
		$tipoDocumento = htmlentities(trim($_POST['TipoDocumento']));
		$dni = htmlentities(trim($_POST['dni']));
		$apellido = htmlentities(trim(ucwords($_POST['apellido'])));
		$nombre = htmlentities(trim(ucwords($_POST['nombre'])));
		$fechaNac = htmlentities(trim($_POST['fechaNacimiento']));
		$sexo = strtoupper(htmlentities(trim($_POST['sexo'])));
		$telefono = htmlentities(trim($_POST['telefono']));
		$movil = htmlentities(trim($_POST['movil']));
		$email = htmlentities(trim(strtolower($_POST['correoElectronico']))); //Lo convierto minusculas y elimino los espacios en blanco al inicio y al final
		$domicilio = htmlentities(trim(ucwords($_POST['domicilio'])));
		$localidad = htmlentities(trim(ucwords($_POST['localidad'])));
		$provincia = htmlentities(trim(ucwords($_POST['provincia'])));
		$pais = htmlentities(trim(ucwords($_POST['pais'])));

	/*$resultado = $insertar = "INSERT INTO persona (Dni,Apellido,Nombre,Fecha_Nac,Sexo,Telefono,Movil,Email,Domicilio,Localidad,Provincia,Pais,Tipo_Dni) VALUES ("$dni","$apellido"."$nombre"."$fechaNac"."$sexo","$fechaNac","$sexo","$telefono","$movil","$email","$domicilio","$localidad","$provincia","$pais");";*/

	$resultado = "INSERT INTO persona (Dni,Apellido,Nombre,Fecha_Nac,Sexo,Telefono,Movil,Email,Domicilio,Localidad,Provincia,Pais,TipoDni) VALUES ('".$dni."', '".$apellido."', '".$nombre."', '".$fechaNac."', '".$sexo."', '".$telefono."', '".$movil."', '".$email."', '".$domicilio."', '".$localidad."', '".$provincia."', '".$pais."', '".$tipoDocumento."')";

	//var_dump($resultado);
	
	$ejecutar = $dbh->prepare($resultado);
	$ejecutar->execute();

	if($ejecutar){
		echo "Datos cargados con exito";
		header("Refresh: 5; URL=logout.php");
	}else{
		echo "*ERROR AL AGREGAR PERSONA*";
		header("Refresh: 5; URL=AgregarPersona.php");
	}
	header('AgregarPersona.php') ;
}else{
	
	header("Refresh: 5; URL=AgregarPersona.php");
}

?>