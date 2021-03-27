<html>
<head>
	<!-- Aplico el estilo al login --> 
	<!-- Aplico fondo al login -->
	<link rel="stylesheet" type="text/css" href="estiloprincipal.css">
	<?php
	include_once 'header.html';
	?>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

<div class="EstiloFormularioLogin">
	<div class="EstiloCabecera">
		<h2>LOGIN</h2>
	</div>
	<form action ="ProcesarLogin.php" method ="POST">
	<!-- Usuario --> 
	<!-- placeholder es para poner texto dentro de la caja de texto -->
	<input type="text" value="" name="Usuario" placeholder="usuario" /><br/>
	<!-- Clave -->
	<input type="password" value="" name="Clave" placeholder="clave" /><br/>
	<input type="submit" name="bt_enviar" value="Ingresar"/> 
	<!-- id=boton le coloco un id para luego editarlo en el css con #boton -->
	<center><div class="g-recaptcha" data-sitekey="6LcMMr4UAAAAAJMM48_pg3Lzlm9SI_1B6DxmKIW_" data-theme="dark"></div></center>
	<a href="AgregarPersona.php">Registrarse</a>
	</form>
</div>
</body>
	<?php include_once 'footer.php'?>
</html>