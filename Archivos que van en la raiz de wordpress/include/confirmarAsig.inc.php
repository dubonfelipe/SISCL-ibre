<?php
	require('Conn.inc.php');
	$cod = $_POST['boleta'];

	$sqlConfirmar = sprintf("UPDATE `boleta_asignacion` SET `CONFIRMADA`= 1 WHERE `CODIGO`='%s'",
		mysql_real_escape_string($cod));
	$queryConfirmar = $database->query($sqlConfirmar) or mysql_error();

	echo "Exito";
?>