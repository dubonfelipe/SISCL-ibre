<?php
/* 
	Author: Luis Felipe Dubon Obando
	Email: dubonfelipe95@gmail.com
	Description: Project of the course, Systemes Analysis and Design I.
 */
	require('../include/Conn.inc.php');
	
	$sqlDate = "SELECT INICIOINSCRIPCIONES AS STARTINS, CIERREINSCRIPCIONES AS ENDINS FROM programa WHERE ESTADO = 1";

	$queryDate = $database->query($sqlDate);

	while ($regDate = $queryDate->fetch_array( MYSQLI_BOTH)) {
		# code...
		$firtsday = strtotime( $regDate['STARTINS'] );
		$lastday = strtotime( $regDate['ENDINS'] );
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario De inscripcion</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<script>
	function botonComplete(e){
				e.preventDefault(); //evita el submit del form
			var cui = document.getElementById("dpi").value;
			console.log(cui);
			var jsoncui = {
				"cui" : cui,
			};
			$.ajax({
				data: 	jsoncui,
				url: 	'../funcionOfInsert/AdminfullinForm.php',
				type: 	'post',
				success: function(data){
					$('#btnAcce').append(data);
				},
				error	: function(){
					console.log('error');
				}
			});
	}

	function botonInsert(e){
				e.preventDefault();
			var cui 	= 	document.getElementById("dpi").value;
			var name 	= 	document.getElementById("nombre").value;
			var sname 	= 	document.getElementById("snombre").value;
			var lastname=	document.getElementById("apellido").value;
			var slastname=	document.getElementById("sapellido").value;
			var dateborn =	document.getElementById("fechNac").value;
			var Sexo	=	$("#genero").val();
			var	cell 	= 	document.getElementById("numero").value;
			var email 	= 	document.getElementById("correo").value;
			var jsondata = {
				"cui" 	: 	cui,
				"name"  : 	name,
				"sname" : 	sname,
				"lastname": lastname,
				"slastname":slastname,
				"dateborn": dateborn,
				"sex"	:	Sexo,
				"cell"	: 	cell,
				"email" : 	email,
			};
			$.ajax({
				data: 	jsondata,
				url:  	'../funcionOfInsert/AdmininsertData.php',
				type: 	'post',
				success: function(data){
					$('#btnGoAsig').append(data);
				},
				error : function(){
					console.log('error');
				}
			});
	}
	$(document).ready(function() {
	    $('#btnAutoComplete').click(botonComplete);
	    $('#btninsDBdata').click(botonInsert);
	});
</script>
	<header>
    	<div class="alert alert-info text-center">
    		<h2>FORMULARIO DE INSCRIPCION DE ALUMNO AREA DE ADMINISTRADOR</h2>
    	</div>
  	</header>
	<?php
		$today = strtotime(date('d-m-Y'));
	/*	$tii = strtotime('05-12-2017');
		$today = $tii;*/
	if($today >= $firtsday && $today <= $lastday){ 
		$maxDate = date("Y-m-d");
		echo '
	<center>
	<form  method="post" class="form-horizontal" id="frmcui">
		<div style="overflow-x:auto;" class="container center_div">
			<table class="table bg-info"  id="tabla" id="tbcui" >
				<tbody>
				<!--Primera Fila -->
					<tr>
						<td>
							<label> DPI* </label></br>
							<input name="dpi" id="dpi" SIZE="tamaño" MAXLENGTH="13>longitud máxima" required="" type="number" width="50" placeholder="0000 00000 0000" />
						</td>
						<td>
							<input  name="insertar" id="btnAutoComplete" type="submit" value="Autocompletar" class="btn btn-info"/>
						</td>
					</tr>
				</tbody>
			</table>
	</form>
	<form   class="form-horizontal" id="frmdata" >
			<table class="table bg-info"  id="tabla" id="tbdata" >
				<!--Segunda Fila -->
					<tr id="a">
						<td id="b">
							<label> Nombre* </label></br>
							<input name="nombre" id="nombre"  required="" type="text"  width="50" placeholder="Nombre" />
						</td>
						<td>
							<label> Segundo Nombre </label></br>
							<input name="snombre" id="snombre" type="text"  width="50" placeholder="Segundo Nombre" />
						</td>
					</tr>
				<!-- Tercera Fila-->
					<tr>
						<td>
							<label> Apellido* </label></br>
							<input name="apellido" id="apellido" type="text"  width="50" placeholder="Apellido" />
						</td>
						<td>
							<label> Segundo Apellido* </label></br>
							<input name="sapellido" id="sapellido" type="text"  width="50" placeholder="Segundo Apellido" />
						</td>
					</tr>
				<!--Cuarta fila-->
					<tr>
						<td>
							<label> Fecha de Nacimiento <span class="fui-calendar"></span> </label> </br>
							<input required type="date" name="fechNac" id="fechNac" step="1" min="1900-01-01" max="'.$maxDate.'"
							>
						</td>
						<td>
							<label> Sexo </label></br>
							<select name="genero" id="genero" required="">
								<option value="M">M</option>
								<option value="F">F</option>
							</select>
						</td>
					</tr>
				<!-- Quinta fila -->
					<tr>
						<td>
							<label> Telefono </label></br>
							<input name="numero" id="numero" SIZE="tamaño" MAXLENGTH="8>longitud máxima" required="" type="number" width="50" placeholder="0000 0000" />
						</td>
						<td colspan="2">
							<label> Correo Electronico <span class="fui-google-plus"></span></label></br>
							<input type="email" name="correo" id="correo" placeholder="john@example.com"/>
						</td>
					</tr>
				<!--Sexta fila-->
					<!--<tr>
						<td colspan="2">
						<input class="btn btn-info"" name="insertar" type="submit" value="Ingresar Informacion" />
						</td>
					</tr>-->
				</tbody>
			</table>
		<div id="btnAcce"></div>
	</form>
		<div id="btnGoAsig"></div>
	</center>';
	}else{
		echo '
		<div class="alert alert-info text-center">
    		<h2>PERIODO DE INSCRIPCION CERRADO</h2>
    	</div>
		';
		}?>
	
</br>
</br>
<footer>
	&copy; Copyright 2017 por Luis Felipe Dubon
</footer>
</body>
</html>