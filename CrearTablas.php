<?php

	$dsn = 'mysql:dbname=tp_final_php;host=127.0.0.1;port=3306';
	$user = 'root';
	$password = '';

	$dbh = new PDO($dsn,$user,$password);

	if(!$dbh){
		echo "Error al conectarse a la base de datos";
	}

	$declaracionSQL = "CREATE TABLE persona(
	Dni INT NOT NULL PRIMARY KEY,
	Apellido VARCHAR(30) NOT NULL,
	Nombre VARCHAR(30) NOT NULL,
	Fecha_Nac VARCHAR(10) NOT NULL,
	Sexo VARCHAR(2) NOT NULL,
	Telefono INT NOT NULL,
	Movil INT NOT NULL,
	Email VARCHAR(150) NOT NULL,
	Domicilio VARCHAR(150) NOT NULL,
	Localidad VARCHAR(30) NOT NULL,
	Provincia VARCHAR(30) NOT NULL,
	Pais VARCHAR(30) NOT NULL,
	TipoDni VARCHAR(10));";

	$resultado = $dbh->exec($declaracionSQL);


	$declaracionSQL2 = "CREATE TABLE usuario(
	Username VARCHAR(30) NOT NULL PRIMARY KEY,
	Password VARCHAR(255) NOT NULL,
	Habilitacion VARCHAR(8) NOT NULL,
	Dni INT NOT NULL);";

	$resultado2 = $dbh->exec($declaracionSQL2);

	/*CREA UNA PERSONA*/

		$tipoDocumento = 'dni';
		$dni = '49662315';
		$apellido = 'Thompson';
		$nombre = 'Homero';
		$fechaNac = '19/10/1994';
		$sexo = 'M';
		$telefono = '4558997';
		$movil = '1667882221';
		$email = 'SrThompson@gmail.com'; //Lo convierto minusculas y elimino los espacios en blanco al inicio y al final
		$domicilio = 'calle falsa 123';
		$localidad = 'Lago Del Terror';
		$provincia = 'Shelbyville';
		$pais = 'Estados Unidos de America';

	$resultado = "INSERT INTO persona (Dni,Apellido,Nombre,Fecha_Nac,Sexo,Telefono,Movil,Email,Domicilio,Localidad,Provincia,Pais,TipoDni) VALUES ('".$dni."', '".$apellido."', '".$nombre."', '".$fechaNac."', '".$sexo."', '".$telefono."', '".$movil."', '".$email."', '".$domicilio."', '".$localidad."', '".$provincia."', '".$pais."', '".$tipoDocumento."')";

	//var_dump($resultado)
	
	$ejecutar = $dbh->prepare($resultado);
	$ejecutar->execute();

	if($ejecutar){
		echo "Datos cargados con exito";
	}else{
		echo "*ERROR AL AGREGAR PERSONA*";
	}

	/*CREA UNA USUARIO*/
	$usuario = 'admin';
	$salt = 'con_laravel_esto_no_pasa';
	$password = crypt('admin',$salt);
	$tipo = 'admin';

	$sentenciaSQLalta = "INSERT INTO usuario (Username,Password,Habilitacion,Dni) VALUES ('".$usuario."', '".$password."', '".$tipo."',".$dni.")";

	//Cuando es un dato entero solo van comillas dobles "  "

	$ejecutar2 = $dbh->exec($sentenciaSQLalta);

	if($ejecutar2){
		echo "Datos cargados con exito";
		echo "ESPERE Y SERA REDIRECCIONADO";
		header('location: index.php');
	}else{
		echo "ERROR";
	}
?>