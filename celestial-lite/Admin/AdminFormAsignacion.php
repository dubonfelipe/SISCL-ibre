<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

include_once('wp-load.php');
/**
 * Template Name: Formulario para Administrador de Asignacion
 *
 * @file           AdminFormAsignacion.php
 * @package        Celestial Lite
 * @version          Celestial Lite 1.0  
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
get_header(); 

if (!current_user_can('manage_course') and !current_user_can('administrator')) {
	# code...
	$usererror_msg = 'No posee los permisos para ver este contenido. <br>';
	$usererror_msg .= ' Si piensa que esto es un error póngase en contacto con el Administrador del sistema.';
	echo '<div id="erroruser" class="form_entry ui-state-error ui-corner-all">'.$usererror_msg.'</div>';
	exit;
}

	require('include/Admin_option.inc.php');	
	require('include/listCourse.inc.php');

	if ( !isset($_POST['cui'])) {
		
		header("HTTP/1.0 404 Not Found", true, 404); 
		exit;
	}

	$dpi = $_POST['cui'];
?>


<section>
	<div id="primary" class="site-content span12">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php //get_template_part( '/partials/content', 'page' ); ?>
							

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
		<form method="post" action="http://localhost/wordpress/generacion-de-previsualizacion-de-boleta/" class="form-horizontal">
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