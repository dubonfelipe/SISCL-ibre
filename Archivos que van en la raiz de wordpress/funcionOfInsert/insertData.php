<?php 
require('../include/Conn.inc.php');

$dpi 	= 	$_POST['cui'];
$name 	= 	$_POST['name'];
$sname 	= 	$_POST['sname'];
$lastname= 	$_POST['lastname'];
$slastname=	$_POST['slastname'];
$dateborn=	$_POST['dateborn'];
$sex 	=	$_POST['sex'];
$cell	=	$_POST['cell'];
$email	=	$_POST['email'];


$sqlDataPersonal = sprintf("INSERT INTO `estudiante`(`DPI_ESTUDIANTE`, `NOMBRE`, `SEGUNDONOMBRE`, `APELLIDO`, `SEGUNDOAPELLIDO`, `TELEFONO`, `CORREO`, `FECHANAC`, `SEXO`) VALUES(%s,'%s','%s','%s','%s', %s,'%s','%s','%s' )",
	mysql_real_escape_string($dpi),
	mysql_real_escape_string($name),
	mysql_real_escape_string($sname),
	mysql_real_escape_string($lastname),
	mysql_real_escape_string($slastname),
	mysql_real_escape_string($cell),
	mysql_real_escape_string($email),
	mysql_real_escape_string($dateborn),
	mysql_real_escape_string($sex));

//$sqlDataPersonal = "INSERT INTO `estudiante`(`DPI_ESTUDIANTE`, `NOMBRE`, `SEGUNDONOMBRE`, `APELLIDO`, `SEGUNDOAPELLIDO`, `TELEFONO`, `CORREO`, `FECHANAC`, `SEXO`) VALUES(".$dpi.",'".$name."','".$sname."','".$lastname."','".$slastname."',".$cell.",'".$email."','".$dateborn."','".$sex."' )";

$queryDataPersonal = $database->query($sqlDataPersonal) or mysql_error();

echo '<script>alert("Inserción Completa.");</script>';

echo '<br/><form method="post" action="http://localhost/wordpress/formulario-de-asignaciones/" class="form-horizontal"><div style="text-align:center"> <input type="hidden" name="cui" value="'.$dpi.'"><input type="submit" id="btnAsignar" name="btnAsignar" class="btn btn-primary" value="Ir Asignarse Curso"></div></div></form>';
//


mysqli_close($database);
?>