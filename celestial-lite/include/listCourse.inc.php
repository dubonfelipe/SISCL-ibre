<?php
/* 
  Author: Luis Felipe Dubon Obando
  Email: dubonfelipe95@gmail.com
  Description: Project of the course, Systemes Analysis and Design I.
 */
  require('Conn.inc.php');

  /*$dbserver = "localhost";
  $dbuser = "root";
  $password = "";
  $dbname = "cursos_libres";

  $database = new mysqli($dbserver, $dbuser, $password, $dbname);

  if($database->connect_errno) {
      die("No se pudo conectar a la base de datos");
  }*/

  $queryconsul = "SELECT IDPROGRAMA FROM programa WHERE ESTADO=1";
  $resultact = $database->query($queryconsul);


  while ($registrProy = $resultact->fetch_array( MYSQLI_BOTH)) {
		# code...
    $codProy = $registrProy['IDPROGRAMA'];
  }
 

  $queryCur = "SELECT C.IDCURSO AS 'IDCURSO', C.NOMBRE AS 'CNOMBRE', C.DIA AS 'DIA', C.HORAINICIO AS 'HORAINICIO', C.HORAFIN AS 'HORAFIN', C.NECESITAPRERREQUISITOS AS 'NEEDPRE', C.PRERREQUISITOS AS 'DESCRIPTION', A.NOMBRE AS 'AREANAME', C.CUPO_LIMITE AS 'LIMITE' FROM curso C INNER JOIN area A ON C.IDAREA = A.IDAREA WHERE C.IDPROGRAMA = ".$codProy;

  $resultCur = $database->query($queryCur);

  $id =	1;
  $data="";
  while ( $registroCur = $resultCur->fetch_array( MYSQLI_BOTH)) {
    # code...
    $idcurso   =$registroCur['IDCURSO'];
    $namecurso =$registroCur['CNOMBRE'];
    $day 	   =$registroCur['DIA'];
    $start 	   =$registroCur['HORAINICIO'];
    $end       =$registroCur['HORAFIN'];
    $needpre   =$registroCur['NEEDPRE'];
    $descrip   =$registroCur['DESCRIPTION'];
    $arename   =$registroCur['AREANAME'];
    $limite    =$registroCur['LIMITE'];

    if ($needpre == 1) {
    	# code...
    }else{
    	$descrip = "_";
    }

    if ($limite == "0") {
    	# code...
    	$limite = "Sin cupo disponible";

    }elseif (!isset($limite)) {
    	# code...
    	$limite = "∞";
    }

    $data=$data.'['.'"'.$id.'", "'.$namecurso.'", "'.$day.'", "'.$start.'-'.$end.'", "'.$arename.'", "'.$descrip.'", "'.$limite.'"],';
    $id = $id+1;
  }