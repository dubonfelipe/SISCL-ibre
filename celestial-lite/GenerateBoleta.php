<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template Name: Generacion de Previsulizcion de Boleta
 *
 * @file           GenerateBoleta.php
 * @package        Celestial Lite
 * @version          Celestial Lite 1.0  
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 if ( !isset($_POST['cui']) OR !isset($_POST['sele']) OR !isset($_POST['user0'])) {	
		header("HTTP/1.0 404 Not Found", true, 404); 
		exit;
	}

	$select = $_POST['sele'];
	$dpi = $_POST['cui'];
	$users = $_POST['user0'];

	require('include/asignacion.inc.php');
	$CodAsig;

get_header(); ?>


<section>
	<div id="primary" class="site-content span12">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( '/partials/content', 'page' ); ?>
								

									<style>
										table, th, td {
    										border: 1px solid black;
    										border-collapse: collapse;
										}	
									</style>


								<div class="container">
  	<?php 
  		require('include/GetIDprograma.inc.php');
  	?>
  		<div><center><img src="../images/cunori.png" style="opacity: 0.5; float: left;" /><img src="../images/cursoslibres.jpg" style="opacity: 0.5; float: right;" />
			<br><br><div>Universidad de San Carlos de Guatemala <br>
			<?php echo $codProy; ?> Programa de Cursos Libres Universitarios <br>
			<b>Centro Universitario de Chiquimula -CUNORI-</b>
			</div>
			
		</center></div>
<?php
	$dpiStudent = $dpi; 
	require('include/dataStudent.inc.php');

		echo '
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
	?>
	<br/>
	<table style="width:100%">
	  <tr>
	    <th>DÍA</th>
	    <th>HORA</th>
	    <th>NOMBRE DEL CURSO</th>
	  </tr>
	  <?php 
	  	$AsigCod = $CodAsig;
	  	require('include/listBolCourse.inc.php');
	  	echo $dataCourse;
	  ?>
	</table>
	<br>
<div>Firma de Estudiante _______________________________<div style="float: right;">
<table><tr><td>Código de Asignacion: <?php echo $AsigCod ?></td></tr>
</table></div></div>

<hr>CONSTANCIA DE ASIGNACION
<br>
<table style="width:100%">
	  <tr>
	    <th>DÍA</th>
	    <th>HORA</th>
	    <th>NOMBRE DEL CURSO</th>
	  </tr>
	  <?php 
	  	$AsigCod = $CodAsig;
	  	require('include/listBolCourse.inc.php');
	  	echo $dataCourse;
	  ?>
	</table>
<div ALIGN=right>
<table><tr><td>Código de Asignacion: <?php echo $AsigCod ?></td></tr>
</table></div>
<form method="post" action="../boletaAsignacion.php" class="form-horizontal">
<?php 
echo '<input type="hidden" name="codProy" value="'.$codProy.'"> 
<input type="hidden" name="cui" value="'.$dpiStudent.'">
<input type="hidden" name="AsigCod" value="'.$AsigCod.'"> ';
?>
<input type="submit" id="btnAsignar" name="btnAsignar" class="btn btn-primary" value="Imprimir Boleta">
</form>

      <br/>
      <br/>
	</div>
<footer>
	 Copyright &copy; 2017 por Luis Felipe Dubon
</footer>


				<?php if ( get_theme_mod('page_comments','1') ) : ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</section>
	
<?php get_footer(); ?>