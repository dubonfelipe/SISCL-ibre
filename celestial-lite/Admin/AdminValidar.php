<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

include_once('wp-load.php');
/**
 * Template Name: Formulario de Validacion de boleta
 *
 * @file           AdminValidar.php
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

if ( !isset($_GET['vcod']) OR !isset($_GET['jnasdbbiiaf49489ubssw']) OR !isset($_GET['afiosoiifoi8329yjaisodhfuu7yasd8fhukbusidy7f8iuas'])) {
    
    header("HTTP/1.0 404 Not Found", true, 404); 
    exit;
  }
  $AsCod = $_GET['vcod'];
  $dpi =  $_GET['jnasdbbiiaf49489ubssw'];
  $conf = $_GET['afiosoiifoi8329yjaisodhfuu7yasd8fhukbusidy7f8iuas'];

  if ($conf == 0) {
    # code...
    $str = "Asignación no se encuentra confirmada";
    $info = 'container alert alert-danger';
    $vae = '';
  }elseif ($conf == 1) {
    # code...
    $str = "Asignación confirmada";
    $info = 'container alert alert-success';
    $vae = 'disabled';
  }
?>


<section>
	<div id="primary" class="site-content span12">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php //get_template_part( '/partials/content', 'page' ); ?>
						

        <script type="text/javascript">
  function botonComplete(e){
      e.preventDefault(); //evita el submit del form
      var boleta = document.getElementById("boleta").value;
      var jsonasig = {
        "boleta" : boleta,
      };
      $.ajax({
        data:   jsonasig,
        url: "../include/confirmarAsig.inc.php",
        type:   'post',
            success: function (data) {
                document.getElementById("btnConfirme").disabled = true;
              document.getElementById("is").innerText = "Asignación confirmada";
              document.getElementById("dbid").className = "container alert alert-success";
                
            }
      });
    }

  $(document).ready(function() {
        $('#btnConfirme').click(botonComplete);
    });
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
  require('include/dataStudent.inc.php');

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
    </tr>
    <?php 
      $AsigCod = $AsCod;
      require('include/listBolCourse.inc.php');
      echo $dataCourse;
    ?>
  </table>
  <center>
    <input type="hidden" name="boleta" id="boleta" value="<?php echo $vi ?>">
    <input type="submit" id="btnConfirme" name="btnConfirme" class="btn btn-primary" <?php echo $vae ?> value="Confirmar Asignación">
  </center>
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