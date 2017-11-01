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
 
	$sql = "SELECT c.IDCURSO AS 'IDC', C.NOMBRE AS 'CNOMBRE', A.NOMBRE AS 'ANOMBRE' FROM curso C INNER JOIN area A ON C.IDAREA = A.IDAREA WHERE C.IDPROGRAMA = ".$codProy."  AND (c.CUPO_LIMITE > 0 OR c.CUPO_LIMITE IS NULL) ORDER BY A.NOMBRE";

	$resultCur = $database->query($sql);
	$ANT ='';
	$i = 1;
	$JO="";
  while ( $registroCur = $resultCur->fetch_array( MYSQLI_BOTH)) { 
  	$curso 	= 	$registroCur['CNOMBRE'];
  	$area 	=	$registroCur['ANOMBRE'];
  	$id 	=	$registroCur['IDC'];

  	if ($i==1) {
  		# code...
  		$i=2;
  		$JO= '<optgroup label="'.$area.'">';
  		$JO= $JO.'<option value="'.$id.'">'.$curso.'</option>';
  		$ANT = $area;
  	}else{
  		if ($area == $ANT ) {
  			# code...
  		$JO= $JO.'<option value="'.$id.'">'.$curso.'</option>';
  		$ANT = $area;
  		}else {
  			# code...
  		$JO= $JO.'</optgroup>';
  		$JO= $JO.'<optgroup label="'.$area.'">';
  		$JO= $JO.'<option value="'.$id.'">'.$curso.'</option>';
  		$ANT = $area;
  		}
  	}

  }
  $JO= $JO.'</optgroup>';
 /* echo "Lista:";
  echo "<br/>";
  echo $JO;*/
?>