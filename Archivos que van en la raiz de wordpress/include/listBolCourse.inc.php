<?php
/* 
	Author: Luis Felipe Dubon Obando
	Email: dubonfelipe95@gmail.com
	Description: Project of the course, Systemes Analysis and Design I.
 */ 
	require('Conn.inc.php');
	$AsigCod;

	$vi = substr($AsigCod, 4);


	
	$sqlcodAsigCourse = sprintf("SELECT AC.DIA AS 'DIA', AC.HORAINICIO AS 'START', AC.HORAFIN AS 'END', AC.NOMBRE AS 'COURSE' FROM `curso_boleta` CU INNER JOIN curso AC ON CU.IDCURSO = AC.IDCURSO WHERE CU.CODIGO = '%s'",
		mysql_real_escape_string($vi));

	$queryAsigCourse = $database->query($sqlcodAsigCourse) or mysql_error();
	$dataCourse="";
	while ($regAsig = $queryAsigCourse->fetch_array( MYSQLI_BOTH)) {
		$day = 	$regAsig['DIA'];
		$Hstart=$regAsig['START'];
		$Hend=	$regAsig['END'];
		$coName=$regAsig['COURSE'];

		$dataCourse = $dataCourse.'<tr>
	    <td>'.$day.'</td>
	    <td>'.$Hstart.' - '.$Hend.'</td>
	    <td>'.$coName.'</td>
	  </tr>';

	}
	$dataCourse;
?>