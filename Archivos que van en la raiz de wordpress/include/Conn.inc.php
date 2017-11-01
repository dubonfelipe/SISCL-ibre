<?php 
/* 
	Author: Luis Felipe Dubon Obando
	Email: dubonfelipe95@gmail.com
	Description: Project of the course, Systemes Analysis and Design I.
 */
	$dbserver = "localhost";
	$dbuser = "root";
	$password = "";
	$dbname = "cursos_libres";

	$database = new mysqli($dbserver, $dbuser, $password, $dbname);

	if($database->connect_errno) {
  		die("No se pudo conectar a la base de datos");
	}
	
?>