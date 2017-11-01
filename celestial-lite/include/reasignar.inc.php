<?php 
/* 
  Author: Luis Felipe Dubon Obando
  Email: dubonfelipe95@gmail.com
  Description: Project of the course, Systemes Analysis and Design I.
 */
	if ( !isset($_POST['curbol'])) {
		
		header("HTTP/1.0 404 Not Found", true, 404); 
		exit;
	}
	$cadena = $_POST['curbol'];
	$array = explode("-", $cadena);

	$codCourse = $array[0];
	$boleta = $array[1];

	require('../include/Conn.inc.php');

	$sqlDesasignar = sprintf("DELETE FROM `curso_boleta` WHERE `curso_boleta`.`IDCURSO` = %s AND `curso_boleta`.`CODIGO` = %s",
		mysql_real_escape_string($codCourse),
		mysql_real_escape_string($boleta));

	$queryDesasignar =  $database->query($sqlDesasignar) or mysql_error();


	mysqli_close($database);
	echo "Desasignar Completo";
?>