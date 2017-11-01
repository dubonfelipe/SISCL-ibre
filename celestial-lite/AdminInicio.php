<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

include_once('wp-load.php');


/**
 * Template Name: Pagina de Inicio de Administrador
 *
 * @file           AdminInicio.php
 * @package        Celestial Lite
 * @version        Celestial Lite 1.0.1  
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

<?php if (get_theme_mod('blog_left') ) : // Use this layout if the blog left is selected ?>		
	<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
		<div id="secondary" class="widget-area span4" role="complementary">
			<div id="st-left" class="st-sidebar-list">
			<?php dynamic_sidebar( 'sidebar-6' ); ?>
			</div>
		</div><!-- #secondary -->
	<?php endif; ?>	
	<section id="primary" class="span8">
		<div id="content" role="main">
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( '/partials/content', get_post_format() ); ?>
				<?php endwhile; ?>	 
			<?php endif; // end have_posts() check ?> 
			<?php celestial_lite_post_nav( 'nav-below' ); ?>
		</div><!-- #content -->
	</section><!-- #primary -->	
	
<?php else : // If the left sidebar is not selected - use this layout ?>
	
	<section id="primary" class="span8">
		<div id="content" role="main">
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( '/partials/content', get_post_format() ); ?>	
				<?php endwhile; ?>	 
			<?php endif; // end have_posts() check ?> 

		</div><!-- #content -->
	</section><!-- #primary -->
	
	<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
	
	<?php endif; ?>	

<?php endif; ?>

<?php get_footer(); ?>
