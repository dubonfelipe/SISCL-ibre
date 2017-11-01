<?php 
	/* 
  Author: Luis Felipe Dubon Obando
  Email: dubonfelipe95@gmail.com
  Description: Project of the course, Systemes Analysis and Design I.
 */
require('../include/Conn.inc.php');

	if ( !isset($_POST['cui']) OR !isset($_POST['sele']) OR !isset($_POST['user0']) OR !isset($_POST['Asc'])) {	
		header("HTTP/1.0 404 Not Found", true, 404); 
		exit;
	}
	
	$select = $_POST['sele'];
	$codbol2 = $_POST['Asc'];
	$userw = $_POST['user0'];

	//echo " Cod <br>:".$codbol2;
	$vi = substr($codbol2, 4);
	foreach ($select as $key => $k) {
	# code...
		$sqlSetCourse = sprintf("INSERT INTO `curso_boleta` (`IDCURSO`, `CODIGO`) VALUES ('%s', '%s')",
			mysql_real_escape_string($k),
			mysql_real_escape_string($vi));
		//echo " K <br>:".$k;
		$queryCourse = $database->query($sqlSetCourse) or mysql_error();

		$idcourse = $k;
		require('../include/lessLimitCourse.inc.php');
	}

	//require('../include/Conn.inc.php');
	/*$codAsig = $codbol2;

	$vi = substr($codAsig, 4);*/

	$sqlGetExistNoBoleta = sprintf("SELECT * FROM `boleta_asignacion` WHERE `CODIGO` = '%s'",
		mysql_real_escape_string($vi));

	$queryGetExistNoBoleta =  $database->query($sqlGetExistNoBoleta) or mysql_error();

	if(mysqli_num_rows($queryGetExistNoBoleta)==0){
		echo '<script>alert("El código de asignación ingresado es invalido.");</script>';
		echo 0;
	}else{
		while ($regNoBoleta = $queryGetExistNoBoleta->fetch_array( MYSQLI_BOTH)) {
			$NoB = $regNoBoleta['DPI_ESTUDIANTE'];
			$conf = $regNoBoleta['CONFIRMADA'];
		}
		/*require('conversor.php');
		$resultado = convertir($NoB);
		$cadena = str_replace(' ', '', $resultado);*/
		$data = "n4851889a4fda8sdot=7778455545sqwdasawsdatfcdsagsdfgsdfgahsfsdahsdfhsaretsertasfdgdfghsrasrtzfsdfgagsfgjaaaggghhafdsa15648e434aaadfasdddw&jnasdbbiiaf49489ubssw=".$NoB."&afiosoiifoi8329yjaisodhfuu7yasd8fhukbusidy7f8iuas=".$conf;
		$url = "Admin_change.php?".$data."&vcod=".$codbol2;
	}
	if (strcmp($users, $adminn) == 0) { 
		header("Location:".$url."");
		exit;
	}


?>