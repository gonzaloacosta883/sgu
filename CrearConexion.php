<?php

	$dsn = 'mysql:dbname=tp_final_php;host=127.0.0.1;port=3306';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);

	if(!$dbh){
		echo "Error Al Conectarse a la Base de Datos";
	}

?>