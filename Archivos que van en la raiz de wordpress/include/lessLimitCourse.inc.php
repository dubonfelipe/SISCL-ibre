<?php
/* 
	Author: Luis Felipe Dubon Obando
	Email: dubonfelipe95@gmail.com
	Description: Project of the course, Systemes Analysis and Design I.
 */
	require('Conn.inc.php');

	$idcourse; 
	/*echo "ID Curso que viene ".$idcourse;
	echo "<br>";*/

	$sqlGetLimit = sprintf("SELECT `CUPO_LIMITE` FROM `curso` WHERE `CUPO_LIMITE`>0 AND `IDCURSO`=%s", 
		mysql_real_escape_string($idcourse));


	$queryGetLimit = $database->query($sqlGetLimit) or mysql_error();

	if (mysqli_num_rows($queryGetLimit)==0) {
		//echo "No posee limite aparentemente";
	}else{
		while ($regLimit = $queryGetLimit->fetch_array( MYSQLI_BOTH)) {
			$cantLimit = $regLimit['CUPO_LIMITE'];
		}

		$NewcantLimit = $cantLimit - 1;

		$sqlSetLimit = sprintf("UPDATE `curso` SET `CUPO_LIMITE`=%s WHERE `IDCURSO` = %s",
			mysql_real_escape_string($NewcantLimit),
			mysql_real_escape_string($idcourse));
		$querySetLimit = $database->query($sqlSetLimit) or mysql_error();
	}
?>