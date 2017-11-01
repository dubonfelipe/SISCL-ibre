<?php 
/* 
	Author: Luis Felipe Dubon Obando
	Email: dubonfelipe95@gmail.com
	Description: Project of the course, Systemes Analysis and Design I.
 */
	if ( !isset($_POST['cui']) OR !isset($_POST['codProy']) OR !isset($_POST['AsigCod'])) {	
		header("HTTP/1.0 404 Not Found", true, 404); 
		exit;
	}


	$dpi = $_POST['cui'];
	$CodAsig = $_POST['AsigCod'];
	$codProy = $_POST['codProy'];

	$cabecera = '<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	';
	
	$Head = '
		<div><center><img src="images/cunori.png" style="opacity: 0.5; float: left;" /><img src="images/cursoslibres.jpg" style="opacity: 0.5; float: right;" />
			<br><br><div id="Tint">Universidad de San Carlos de Guatemala <br>
			'.$codProy.' Programa de Cursos Libres Universitarios <br>
			<b>Centro Universitario de Chiquimula -CUNORI-</b>
			</div>
		</center></div>
	';

	$dpiStudent = $dpi; 
	require('include/dataStudent.inc.php');

	$DataAlumnos = '
		<table style="width:100%">
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

	$courseNo1 = '
		<br/>
	<table style="width:100%">
	  <tr>
	    <th>DÍA</th>
	    <th>HORA</th>
	    <th>NOMBRE DEL CURSO</th>
	  </tr>
	';

	$AsigCod = $CodAsig;
	require('include/listBolCourse.inc.php');
	$courseNo2 = $dataCourse;

	$courseNo3 = '
		</table>
	<br>
<div >Firma de Estudiante ___________________________<div>
<table align="right" class="right"><tr><td>Código de Asignacion: '.$AsigCod.'</td></tr>
</table></div></div>

<hr>CONSTANCIA DE ASIGNACION
<br>
<table style="width:100%">
	  <tr>
	    <th>DÍA</th>
	    <th>HORA</th>
	    <th>NOMBRE DEL CURSO</th>
	  </tr>
	';
	//nuevamente courseNo2
	$courseNo4 = '
		</table>
<div><br>
<table align="right" ><tr><td>Código de Asignacion: '.$AsigCod.'</td></tr>
</table></div> <br/>
      <br/>
	</div>
	';

	$html = $Head."".$DataAlumnos."".$courseNo1."".$courseNo2."".$courseNo3."".$courseNo2."".$courseNo4;
	
	include('mpdf60/mpdf.php');
	$mpdf=new mPDF(); 
	$mpdf->AddPage('L'); 	

	$mpdf->SetDisplayMode('fullpage');
	$mpdf->SetHTMLHeader($css,1);
	$mpdf->SetHTMLHeader($cabecera);
	$css = file_get_contents("css/estilo.css");
	$mpdf->WriteHTML($css,1);
	$mpdf->WriteHTML($html);
	$mpdf->Output();

?>