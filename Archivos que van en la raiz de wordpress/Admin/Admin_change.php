<?php 
	/* 
  Author: Luis Felipe Dubon Obando
  Email: dubonfelipe95@gmail.com
  Description: Project of the course, Systemes Analysis and Design I.
 */

	if ( !isset($_GET['vcod']) OR !isset($_GET['jnasdbbiiaf49489ubssw']) OR !isset($_GET['afiosoiifoi8329yjaisodhfuu7yasd8fhukbusidy7f8iuas'])) {
		
		header("HTTP/1.0 404 Not Found", true, 404); 
		exit;
	}
	$AsCod = $_GET['vcod'];
	$dpi =	$_GET['jnasdbbiiaf49489ubssw'];
	$conf = $_GET['afiosoiifoi8329yjaisodhfuu7yasd8fhukbusidy7f8iuas'];

	if ($conf == 0) {
		# code...
		$str = "Asignación no se encuentra confirmada";
		$info = 'container alert alert-danger';
		
	}elseif ($conf == 1) {
		# code...
		$str = "Asignación confirmada";
		$info = 'container alert alert-success';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirmar Asignación</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		
</head>
<body>
<?php 
$AsigCod = $AsCod;
	  	require('../include/listBolCourseChange.inc.php');
?>
<script type="text/javascript">
	function botonDesasignar(e){
		e.preventDefault();
		var CurBol = document.getElementById('desas').value;
		console.log(CurBol);
		var jsoncubo = {
				"curbol" : CurBol,
			};
		$.ajax({
				data: 	jsoncubo,
				url: 	'../include/reasignar.inc.php',
				type: 	'post',
				success: function(data){
					console.log(data);
					location.reload();
				},
				error	: function(){
					console.log('error');
				}
			});

	}

	
</script>
<header>
    	<div class="alert alert-info text-center">
    		<h2>INFORMACIÓN DE ASIGNACIÓN</h2>
    	</div>
  	</header>
  	<div id="dbid" class="<?php echo $info ?>"><center><h3><p id="is"><?php echo $str ?></p></h3></center></div>
<div class="alert alert-info container">
	<center><h4>Información Personal del Alumno</h4></center>
	<?php
	$dpiStudent = $dpi; 
	require('../include/dataStudent.inc.php');

		echo '
		<table class="table table-striped" style="width:100%">
  			<tr>
    			<td>Primer Nombre: '.$fname.'</td>
    			<td>Segundo Nombre: '.$sname.'</td>
    			<td colspan="3">Otros:</td>
  			</tr>
  			<tr>
    			<td>Primer Apellido: '.$flastname.'</td>
    			<td>Segundo Apellido: '.$sflastname.'</td>
    			<td>Sexo</td>
    			<td>M: '.$markM.'</td>
    			<td>F: '.$markF.'</td>
	  		</tr>
	  		<tr>
	    		<td>Telefono: '.$phonenum.'</td>
	    		<td>Correo: '.$iemail.'</td>
	    		<td colspan="3">DPI: '.$dpi.'</td>
	  		</tr>
		</table>';
	?>
	<br/>
	<center><h4>Información de cursos asociados a la boleta</h4></center>
	<table class="table table-striped" style="width:100%">
	  <tr>
	    <th>DÍA</th>
	    <th>HORA</th>
	    <th>NOMBRE DEL CURSO</th>
	    <th>OPCION</th>
	  </tr>
	  <?php 
	  	
	  	echo $dataCourse;
	  ?>
	</table>
	<center>
	<div style="float: left;">
	<form method="post" action="Admin_frm_asig_change.php" class="form-horizontal">
		<input type="hidden" name="Asc" id="Asc" value="<?php echo $AsCod ?>"> 
		<input type="hidden" name="cui" id="cui" value="<?php echo $dpi ?>">
		<input type="submit" id="btnConfirme" name="btnConfirme" class="btn btn-primary" value="Asignar Curso">
		</form></div>
		<div style="float: right;">
	<form method="post" action="../boletaAsignacion.php" class="form-horizontal">
		<?php 
			require('../include/GetIDprograma.inc.php');
			echo '<input type="hidden" name="codProy" value="'.$codProy.'"> 
			<input type="hidden" name="cui" value="'.$dpi.'">
			<input type="hidden" name="AsigCod" value="'.$AsigCod.'"> ';
		?>
		<input type="submit" id="btnAsignar" name="btnAsignar" class="btn btn-primary" value="Imprimir Boleta">
	</form>
	</div>
	</center>
</div>
<?php echo $scrp; ?>
<footer>
	&copy; Copyright 2017 por Luis Felipe Dubon
</footer>
</body>
</html>