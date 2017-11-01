<?php 
require('../include/Conn.inc.php');

$dpi = $_POST['cui'];


$sqlStockDpi = sprintf("SELECT * FROM estudiante WHERE DPI_ESTUDIANTE=%s",
                    mysql_real_escape_string($dpi));

$queryStockDpi = $database->query($sqlStockDpi);

//
if(mysqli_num_rows($queryStockDpi)==0){
		        	echo '<script>alert("El CUI Ingresado no existe en la base de datos.");</script>';
		        	echo '
		        	<script>
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
				url:  	"funcionOfInsert/insertData.php",
				type: 	"post",
				success: function(data){
					$("#btnGoAsig").append(data);
				},
				error : function(){
					console.log("error");
				}
			});
	}
	$(document).ready(function() {
	    $("#btninsDBdata").click(botonInsert);
	});
	</script>';
		        	echo '
		        	<input class="btn btn-info"" name="btninsDBdata" id="btninsDBdata" type="submit" value="Ingresar Informacion" />';

	        	
	//echo '<input class="btn btn-info"" name="insertar" type="submit" value="Ingresar Informacion" />';
}else{
	while ($regStudent = $queryStockDpi->fetch_array( MYSQLI_BOTH)) {
		# code...
		$name  =	$regStudent['NOMBRE'];
		$sname = 	$regStudent['SEGUNDONOMBRE'];
		$lastname =	$regStudent['APELLIDO'];
		$slastname=	$regStudent['SEGUNDOAPELLIDO'];
		$cell 	=	$regStudent['TELEFONO'];
		$email	=	$regStudent['CORREO'];
		$dateborn=	$regStudent['FECHANAC'];
		$sex	=	$regStudent['SEXO'];
	}
	        	echo '<script>alert("Se ha encontrado conincidencia con el CUI ingresado.");</script>';

	        	echo '
	        	
	        	<script>
	        	$(document).ready(function() {
  				
	        		document.getElementById("nombre").value = "'.$name.'";
       					document.getElementById("snombre").value = "'.$sname.'";
       					document.getElementById("apellido").value = "'.$lastname.'";
       					document.getElementById("sapellido").value = "'.$slastname.'";
       					document.getElementById("fechNac").value = "'.$dateborn.'";
	   					document.getElementById("genero").value = "'.$sex.'";
       					document.getElementById("numero").value = "'.$cell.'";
       					document.getElementById("correo").value = "'.$email.'";
				});
					
  				</script>
  				';

  				echo '
		        	<script>
		        	function botonUpdate(e){
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
				url:  	"funcionOfInsert/updateData.php",
				type: 	"post",
				success: function(data){
					$("#btnGoAsig").append(data);
				},
				error : function(){
					console.log("error");
				}
			});
	}
	$(document).ready(function() {
	    $("#btnupdDBdata").click(botonUpdate);
	});
	</script>';
		        	echo '
		        	<input class="btn btn-info"" name="btnupdDBdata" id="btnupdDBdata" type="submit" value="Actualizar Informacion" />';
  				

}

mysqli_close($database);
?>