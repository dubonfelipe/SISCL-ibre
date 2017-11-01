<?php
/* 
  Author: Luis Felipe Dubon Obando
  Email: dubonfelipe95@gmail.com
  Description: Project of the course, Systemes Analysis and Design I.
 */
	require('../include/Admin_option.inc.php');	
	require('../include/listCourse.inc.php');

	if ( !isset($_POST['cui'])) {
		
		header("HTTP/1.0 404 Not Found", true, 404); 
		exit;
	}

	$dpi = $_POST['cui'];
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
		 <!-- Bootstrap -->
    	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    	<link href="../css/select2.min.css" rel="stylesheet">
    	<link href="../css/select2-bootstrap.min.css" rel="stylesheet">
		

		<!--datatable-->
		<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<script>
	
</script>
	<header>
    	<div class="alert alert-info text-center">
    		<h2>ASIGNACION DE CURSO(S) DE ADMINISTRADOR</h2>
    	</div>
  	</header>
		<script type="text/javascript">

			var dataSet = [<?php echo $data; ?>];
			$(document).ready(function() {
    			$('#tbCurso').DataTable( {
        			data: dataSet,
        			columns: [
            				{ title: "#" },
            				{ title: "Nombre del Curso" },
            				{ title: "Dia de Inicio" },
            				{ title: "Horario" },
            				{ title: "Area" },
            				{ title: "Prerrequisito" },
            				{ title: "Cupo disponible" }
        					 ]
    			} 
    		);
		});
		</script>
		<div class="alert alert-info text-center container">
		<table id="tbCurso" class="display" width="100%"></table>
		</div>
		<form method="post" action="../genera_boleta.php" class="form-horizontal">
    <div class="container">
     <?php 
      echo '<input type="hidden" name="cui" value="'.$dpi.'" />'; 
      ?>
      <select name="sele[]" class="form-control select2-multiple" multiple="multiple">
  		<?php 
        	echo $JO;
       	?>
      </select>
      <br/>
      <input type="hidden" name="user0" value="admin">
      <input type="submit" id="btnAsignar" name="btnAsignar" class="btn btn-primary" value="Asignarse curso(s)">
    </div>

    </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/select2.min.js"></script>
    <script type="text/javascript">
      $('select').select2({
        theme: 'bootstrap'
      });
    </script>
	
<footer>
  &copy; Copyright 2017 por Luis Felipe Dubon
</footer>
</body>
</html>