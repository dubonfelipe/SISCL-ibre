<?php 
/* 
	Author: Luis Felipe Dubon Obando
	Email: dubonfelipe95@gmail.com
	Description: Project of the course, Systemes Analysis and Design I.
 */
	require('Conn.inc.php');

	if ( !isset($_POST['cui']) OR !isset($_POST['sele']) OR !isset($_POST['user0'])) {	
		header("HTTP/1.0 404 Not Found", true, 404); 
		exit;
	}
	

	$sqlGetNoBoleta = "SELECT * FROM `boleta_asignacion` ORDER BY `boleta_asignacion`.`CODIGO` ASC";

	$queryGetNoBoleta = $database->query($sqlGetNoBoleta) or mysql_error("fallo seleccion de boleta");;

	/*echo "DPI = ".$dpi;
	echo "<br>";*/
	if (mysqli_num_rows($queryGetNoBoleta)==0) {
		# code...
		$codbol = 1;
		//echo "Ingreso aqui por alguna razon con 0 reguistros";
	}else{
		while ($regCod = $queryGetNoBoleta->fetch_array( MYSQLI_BOTH)) {
			# code...
			$codbol =	$regCod['CODIGO'];
		}
		/*echo "Ingreso por algua razon obtiene el uno";
		echo "<br>";*/
		$codbol2 = $codbol+1;
	}
/*	echo "cod1 = ".$codbol;
	echo "<br>";
	echo "cod2 = ".$codbol2;
	echo "<br>";*/
	$select = $_POST['sele'];
	$dpi = $_POST['cui'];
	/*echo "DPI = ".$dpi;
	echo "<br>";*/
	$adminn = "admin";
	$visitor = "visitor";
	$users = $_POST['user0'];
	
	if (strcmp($users, $adminn) == 0) {
		# code...
		$sqlSetBoleta = sprintf("INSERT INTO `boleta_asignacion` (`CODIGO`,`DPI_ESTUDIANTE`, `CONFIRMADA`) VALUES (%s,%s, 1)",
		mysql_real_escape_string($codbol2),
		mysql_real_escape_string($dpi));
	}elseif (strcmp($users, $visitor) == 0) {
		# code...
		$sqlSetBoleta = sprintf("INSERT INTO `boleta_asignacion` (`CODIGO`,`DPI_ESTUDIANTE`, `CONFIRMADA`) VALUES (%s,%s, 0)",
		mysql_real_escape_string($codbol2),
		mysql_real_escape_string($dpi));
	}
	
	/*echo "DPI = ".$dpi;
	echo "<br>";*/
	$queryBoleta = $database->query($sqlSetBoleta) or mysql_error();

	//$cantidad = count($select);

	foreach ($select as $key => $k) {
	# code...
		$sqlSetCourse = sprintf("INSERT INTO `curso_boleta` (`IDCURSO`, `CODIGO`) VALUES ('%s', '%s')",
			mysql_real_escape_string($k),
			mysql_real_escape_string($codbol2));

		$queryCourse = $database->query($sqlSetCourse) or mysql_error();

		$idcourse = $k;
		require('lessLimitCourse.inc.php');
	}

	$sqlcodAsigCourse = sprintf("SELECT YEAR(`FECHANAC`) AS 'ANIO' FROM `estudiante` WHERE `DPI_ESTUDIANTE`= '%s'",
		mysql_real_escape_string($dpi));

	$queryAsigCourse = $database->query($sqlcodAsigCourse) or mysql_error("Fallo de optener fecha");

	while ($regAsig = $queryAsigCourse->fetch_array( MYSQLI_BOTH)) {
		# code...
		$dateYear =	$regAsig['ANIO'];
	}

	$CodAsig = $dateYear.$codbol2;
?>

