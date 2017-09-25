<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template Name: inscripcion
 *
 * @file           inscripcion.php
 * @package        Celestial Lite
 * @version          Celestial Lite 1.0  
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
get_header(); ?>


<section>
	<div id="primary" class="site-content span12">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( '/partials/content', 'page' ); ?>
				<?php
$today = date('d-m-Y');
$firtsday = '10-09-2017';
$lastday = '30-09-2017';
if($today >= $firtsday && $today <= $lastday){
//echo 'Se encuentra entre las fechas disponibles inicial: '.$firtsday.' Ultimo dia: '.$lastday.' siendo el dia de hoy: '.$today;

echo '
<div class="row">
<form class="form-horizontal" action="../sout.php" method="post" >
<center>
<table class="table table-responsive">
	<tbody>
	<!--Primera Fila -->
		<tr>
			<td>
				<label> DPI* </label></br>
				<input name="dpi" SIZE="tamaño" MAXLENGTH="13>longitud máxima" required="" type="number" width="50" placeholder="0000 00000 0000" />
			</td>
			<td></br></br>
				<input class="btn btn-block btn-lg btn-inverse" name="insertar" type="submit" value="Autocompletar" />
			</td>
		</tr>
	<!--Segunda Fila -->
		<tr>
			<td>
				<label> Nombre* </label></br>
				<input name="nombre" required="" type="text"  width="50" placeholder="Nombre" />
			</td>
			<td>
				<label> Segundo Nombre </label></br>
				<input name="snombre" type="text"  width="50" placeholder="Segundo Nombre" />
			</td>
		</tr>
	<!-- Tercera Fila-->
		<tr>
			<td>
				<label> Apellido* </label></br>
				<input name="apellido" type="text"  width="50" placeholder="Apellido" />
			</td>
			<td>
				<label> Segundo Apellido </label></br>
				<input name="sapellido" type="text"  width="50" placeholder="Segundo Apellido" />
			</td>
		</tr>
	<!--Cuarta fila-->
		<tr>
			<td>
				<label> Fecha de Nacimiento <span class="fui-calendar"></span> </label> </br>
				<input required max="<?php echo date(" min="1900-01-01"") name="fechNac" required="" step="1" type="date" width="50" />
			</td>
			<td>
				<label> Sexo </label></br>
				<select name="genero" required="">
					<option value="M">M</option>
					<option value="F">F</option>
				</select>
			</td>
		</tr>
	<!-- Quinta fila -->
		<tr>
			<td>
				<label> Telefono </label></br>
				<input name="numero" SIZE="tamaño" MAXLENGTH="8>longitud máxima" required="" type="number" width="50" placeholder="0000 0000" />
			</td>
			<td colspan="2">
				<label> Correo Electronico <span class="fui-google-plus"></span></label></br>
				<input type="email" name="correo" placeholder="john@example.com"/>
			</td>
		</tr>
	<!--Sexta fila-->
		<tr>
			<td colspan="2">
				<input class="btn btn-block btn-lg btn-inverse" name="insertar" type="submit" value="Ingresar Informacion" />
			</td>
		</tr>
	</tbody>
	</table>
	</center>
</form>
</div>
';
/*echo '
<form class="form-horizontal" action="../sout.php" method="post" >
<table class="table table-responsive">
	<tbody>
	<!--Primera Fila -->
		<tr>
			<td>
				<label> Nombre* </label></br>
				<input name="nombre" required="" type="text"  width="50" placeholder="Nombre" />
			</td>
			<td>
				<label> Segundo Nombre </label></br>
				<input name="snombre" type="text"  width="50" placeholder="Segundo Nombre" />
			</td>
			<td>
				<label> Apellido* </label></br>
				<input name="apellido" type="text"  width="50" placeholder="Apellido" />
			</td>
			<td>
				<label> Segundo Apellido </label></br>
				<input name="sapellido" type="text"  width="50" placeholder="Segundo Apellido" />
			</td>
		</tr>
	<!--Segunda fila-->
		<tr>
			<td>
				<label> Telefono </label></br>
				<input name="numero" SIZE="tamaño" MAXLENGTH="8>longitud máxima" required="" type="number" width="50" placeholder="0000 0000" />
			</td>
			<td>
				
				<label> DPI* </label></br>
				<input name="dpi" SIZE="tamaño" MAXLENGTH="13>longitud máxima" required="" type="number" width="50" placeholder="0000 00000 0000" />
			</td>
			<td>
				<label> Sexo </label></br>
				<select name="genero" required="">
					<option value="M">M</option>
					<option value="F">F</option>
				</select>
			</td>
		</tr>
	<!--Tercera fila -->
		<tr>
			<td colspan="1">
				<label> Fecha de Nacimiento <span class="fui-calendar"></span> </label> </br>
				<input required max="<?php echo date(" min="1900-01-01"") name="fechNac" required="" step="1" type="date" width="50" />
			</td>
			<td colspan="2">
				<label> Correo Electronico <span class="fui-google-plus"></span></label></br>
				<input type="email" name="correo" placeholder="john@example.com"/>
			</td>
			<td></br></br>
				<input class="btn btn-block btn-lg btn-inverse" name="insertar" type="submit" value="Ingresar Informacion" />
			</td>
		</tr>
	</tbody>
	</table>
</form>
';*/


}else{
echo 'Se encuentra fuera de las fechas disponibles inicial: '.$firtsday.' Ultimo dia: '.$lastday.' siendo el dia de hoy: '.$today;
//header("location: localhost/wordpress/primera-edicion/");
}
?>  

    <script src="../dist/js/vendor/jquery.min.js"></script>
    <script src="../dist/js/vendor/video.js"></script>
    <script src="../dist/js/flat-ui.min.js"></script>
    <script src="../docs/assets/js/application.js"></script>

    <script>
      videojs.options.flash.swf = "dist/js/vendors/video-js.swf"
    </script>

				<?php if ( get_theme_mod('page_comments','1') ) : ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</section>
	
<?php get_footer(); ?>