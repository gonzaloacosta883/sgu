<?php

	require_once('CrearConexion.php');

	$stmtPersona = $dbh->prepare("SELECT *FROM persona");
	$stmtPersona->execute();
	$arregloPersonas;

	while ($obj = $stmtPersona->fetch()) {
		$arregloPersonas[] = $obj['Dni'];
	}

	$stmtUsuario = $dbh->prepare("SELECT *FROM usuario");
	$stmtUsuario->execute();
	$arregloUsuarios;
	
	while ($obj = $stmtUsuario->fetch()) {
		$arregloUsuarios[] = $obj['Dni'];
	}

	$resultado = array_diff($arregloPersonas,$arregloUsuarios);
?>

	<select name="IdentificacionDePersona">
	<?php
	foreach ($resultado as $unValor) { ?>
	 	<option value: <?php $unValor ?>><?php echo $unValor ?></option>
	 <?php } ?>
	</select>
	<br/>

<?php

$stmtPersona = null;

?>