<?php
/* 
	Author: Luis Felipe Dubon Obando
	Email: dubonfelipe95@gmail.com
	Description: Project of the course, Systemes Analysis and Design I.
 */
	require('Conn.inc.php');

	$queryconsul = "SELECT IDPROGRAMA FROM programa WHERE ESTADO=1";
  	$resultact = $database->query($queryconsul);


  	while ($registrProy = $resultact->fetch_array( MYSQLI_BOTH)) {
		# code...
    	$codProy = $registrProy['IDPROGRAMA'];
  	}
?>