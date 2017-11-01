<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

include_once('wp-load.php');
/**
 * Template Name: Formulario para Confirmar Boleta
 *
 * @file           AdminConfirmar.php
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

?>


<section>
	<div id="primary" class="site-content span12">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php //get_template_part( '/partials/content', 'page' ); ?>
							
              <script type="text/javascript">
    function botonComplete(e){
      e.preventDefault(); //evita el submit del form
      var codAsig = document.getElementById("CodAsig").value;
      var jsonasig = {
        "codAsig" : codAsig,
      };
      $.ajax({
        data:   jsonasig,
        url: "../include/validateAsignar.inc.php",
        type:   'post',
            success: function (data) {
                if (data == 0) {
                  alert("El código de asignación ingresado es invalido.");
                  //console.log('Ingreso a 0');
                }else if(isNaN(data)){
                  window.location.replace("http://localhost/wordpress/administracion-validar-boleta/?"
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