<?php 
	/* 
	Author: Luis Felipe Dubon Obando
	Email: dubonfelipe95@gmail.com
	Description: Project of the course, Systemes Analysis and Design I.
 	*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirmación de Asignación</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
		 <!-- Bootstrap -->
    	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">		

		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<script type="text/javascript">
		function botonComplete(e){
			e.preventDefault(); //evita el submit del form
			var codAsig = document.getElementById("CodAsig").value;
			var jsonasig = {
				"codAsig" : codAsig,
			};
			$.ajax({
				data: 	jsonasig,
				url: "../include/validateAsignar.inc.php",
				type: 	'post',
        		success: function (data) {
          			if (data == 0) {
          				//console.log('Ingreso a 0');
          			}else if(isNaN(data)){
            			window.location.replace("Admin_validar.php?"
            				+data+"&vcod="+codAsig);
            			//console.log('Ingreso a isNaN'+data);
          			}
          			
		      	}
			});
		}
		


		$(document).ready(function() {
	    	$('#btnConfirme').click(botonComplete);
		});
	</script>
	<header>
    	<div class="alert alert-info text-center">
    		<h2>Confirmación de Asignación</h2>
    	</div>
  	</header>
  	<div class="container center_div"><img src="../images/cunori.png" style="opacity: 0.5; float: left;" /><img src="../images/cursoslibres.jpg" style="opacity: 0.5; float: right;" />
  	<center>
  		<form  method="post" class="form-horizontal" id="frmboleta">
  			<label> Código de Asignación* </label></br>
			<input name="CodAsig" id="CodAsig" required="" type="number" placeholder="Código Asignación" /></br></br>
  			<input  name="btnConfirme" id="btnConfirme" type="submit" value="Confirmar" class="btn btn-info"/>
  		</form>
  	</center>
  	</div>
	<footer>
  		&copy; Copyright 2017 por Luis Felipe Dubon
	</footer>
</body>
</html>