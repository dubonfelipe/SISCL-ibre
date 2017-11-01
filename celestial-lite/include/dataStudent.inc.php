<?php
/* 
	Author: Luis Felipe Dubon Obando
	Email: dubonfelipe95@gmail.com
	Description: Project of the course, Systemes Analysis and Design I.
 */ 
	require('Conn.inc.php');
	$dpiStudent;

	$sqlcodAsigCourse = sprintf("SELECT * FROM `estudiante` WHERE `DPI_ESTUDIANTE`= '%s'",
		mysql_real_escape_string($dpiStudent));

	$queryAsigCourse = $database->query($sqlcodAsigCourse) or mysql_error();

	while ($regAsig = $queryAsigCourse->fetch_array( MYSQLI_BOTH)) {
		# code...
		$fname = 	$regAsig['NOMBRE'];
		$sname =	$regAsig['SEGUNDONOMBRE'];
		$flastname=	$regAsig['APELLIDO'];
		$sflastname=$regAsig['SEGUNDOAPELLIDO'];
		$phonenum=	$regAsig['TELEFONO'];
		$iemail =	$regAsig['CORREO'];
		$generox= 	$regAsig['SEXO'];
	}

	$markF="";
	$markM="";

	$F="F";
	$M="M";
	if (strcmp($generox, $F) == 0) {
		# code...
		$markF="X";
	}elseif (strcmp($generox, $M) == 0) {
		# code...
		$markM="X";
	}
?>