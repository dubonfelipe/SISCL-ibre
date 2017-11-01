<?php 
	require('../include/Conn.inc.php');
	$codAsig = $_POST['codAsig'];

	$vi = substr($codAsig, 4);

	$sqlGetExistNoBoleta = sprintf("SELECT * FROM `boleta_asignacion` WHERE `CODIGO` = '%s'",
		mysql_real_escape_string($vi));

	$queryGetExistNoBoleta =  $database->query($sqlGetExistNoBoleta) or mysql_error();

	if(mysqli_num_rows($queryGetExistNoBoleta)==0){
		echo 0;
	}else{
		while ($regNoBoleta = $queryGetExistNoBoleta->fetch_array( MYSQLI_BOTH)) {
			$NoB = $regNoBoleta['DPI_ESTUDIANTE'];
			$conf = $regNoBoleta['CONFIRMADA'];
		}
		/*require('conversor.php');
		$resultado = convertir($NoB);
		$cadena = str_replace(' ', '', $resultado);*/
		echo "n4851889a4fda8sdot=7778455545sqwdasawsdatfcdsagsdfgsdfgahsfsdahsdfhsaretsertasfdgdfghsrasrtzfsdfgagsfgjaaaggghhafdsa15648e434aaadfasdddw&jnasdbbiiaf49489ubssw=".$NoB."&afiosoiifoi8329yjaisodhfuu7yasd8fhukbusidy7f8iuas=".$conf;
	}
?>