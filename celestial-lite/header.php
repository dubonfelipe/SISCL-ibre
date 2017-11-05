<?php

/**
 * Template for displaying the main header
 *
 * @file           header.php
 * @package        Celestial Lite
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
 include_once('wp-load.php');
?>
<!DOCTYPE html>
	<!--[if IE 7]>
	<html class="ie ie7" <?php language_attributes(); ?>>
	<![endif]-->
	<!--[if IE 8]>
	<html class="ie ie8" <?php language_attributes(); ?>>
	<![endif]-->
	<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
	<!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- Loading Bootstrap -->
    <link href="../dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

   <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
    
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
    <![endif]-->

	 

		<!--- -->
		 <!-- Bootstrap -->
    	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    	<link href="../css/select2.min.css" rel="stylesheet">
    	<link href="../css/select2-bootstrap.min.css" rel="stylesheet">
		

		<!--datatable-->
		<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


		   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/select2.min.js"></script>
 
    <script src="../js/menu.js" type="text/javascript"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- add move to top feture -->
<?php do_action( 'lr_move_to_top', 'encounters-lite'); ?>
		<div id="st-wrapper" style="border-color: <?php echo get_theme_mod( 'page_top_bar', '#3c3f41' ); ?>;">
			<header id="branding" role="banner" style="background-color:<?php echo get_theme_mod( 'header_submenu_bg', '#f6f6f6' ); ?>; border-color:<?php echo get_theme_mod( 'header_topline', '#ffffff' ); ?>; ">
				<div class="container">
					<div class="row-fluid">
					
		<div class="span4">					
			<?php 
			$logostyle = get_theme_mod( 'logo_style', 'default' );
			 switch ($logostyle) {
				case "default" : // default theme logo ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<div id="logo"><img src="<?php echo get_template_directory_uri() ; ?>/images/demo/demo-logo.png" alt="<?php bloginfo( 'name' ); ?>" /></div>
					</a>
				<?php break;
				case "custom" : // your own logo ?>
					<?php if ( get_option('my_logo') ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<div id="logo"><img src="<?php echo esc_url ( get_option( 'my_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></div>
						</a>
					<?php endif; ?>			 
				<?php break;
				case "text" : // text based title and site description ?>
					<hgroup id="st-site-title">
						<h1 id="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<span><?php bloginfo( 'name' ); ?></span>
							</a>
						</h1>
						<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
					</hgroup>			
				<?php break;
				} 
			?>				
		</div>	
								
						
						
					</div>
				</div>
			</header>
		
<div id="st-socialbar-wrapper" style="background-color:<?php echo get_theme_mod( 'social_bg', '#393c3f' ); ?>; <?php if( get_theme_mod( 'hide_sociallines' ) == '') { ?>background-image: url('<?php echo get_template_directory_uri(); ?>/images/socialbar-bg.png');<?php } ?>">    
    <?php

    if (current_user_can('manage_course') or current_user_can('administrator')) {
	# code...
	$usererror_msg = '
	
	
			<nav>
    <ul class="menu">
   <li><a href="#"><i class="icon-home"></i>PRINCIPAL</a>
   <ul class="sub-menu">
   <li><a href="http://localhost/wordpress/administrador/">MENU PRINCIPAL</a></li>
   </ul>
   </li>
   <li><a  href="#"><i class="icon-user"></i>ASIGNACIONES</a>
   <ul class="sub-menu">
  <li><a  href="http://localhost/wordpress/confirmar-boleta"><i class="icon-li icon-ok"></i> CONFIRMAR ASIGNACION</a>
  </li>
  <li><a  href="http://localhost/wordpress/realizar-cambios-de-curso/"><i class="icon-fixed-width icon-pencil"></i> CAMBIOS DE ASIGNACION</a></li>
  <li><a  href="http://localhost/wordpress/formulario-de-inscripciones-administrador"><i class="icon-fixed-width icon-book"></i> ASIGNAR</a></li>
  </ul>
  </li>
  <li><a  href="#"><i class="icon-user"></i>ADMINITRAR</a>
   <ul class="sub-menu">
  <li><a  href="#"><i class="icon-li icon-ok"></i> PROGRAMA</a>
  </li>
  <li><a  href="#"><i class="icon-fixed-width icon-pencil"></i> CURSO</a></li>
  <li><a  href="#"><i class="icon-fixed-width icon-book"></i> CATEDRÁTICO</a></li>
  </ul>
  </li>
  <li><a  href="#"><i class="icon-user"></i>GENERAR LISTAS</a></li>
  <li><a  href="http://localhost/wordpress/informacion_sistema"><i class="icon-user"></i>INFORMACION SISTEMA</a></li>
  </ul>
  </nav>
	';
		echo ''.$usererror_msg.'';
	
} ?>
    


		<div class="container">
			<div id="st-socialbar">
            	<?php if( get_theme_mod( 'twitter_on' ) == '1') { ?>				
					<a id="st-twitter" title="" href="<?php echo esc_url ( get_theme_mod( 'twitter_link', '#' ) ); ?>" target="_blank"></a>
				<?php } ?>
				<?php if( get_theme_mod( 'facebook_on' ) == '1') { ?>
					<a id="st-facebook" title="" href="<?php echo esc_url ( get_theme_mod( 'facebook_link', '#' ) ); ?>" target="_blank"></a>
				<?php } ?>
				<?php if( get_theme_mod( 'google_on' ) == '1') { ?>
					<a id="st-google" title="" href="<?php echo esc_url ( get_theme_mod( 'google_link', '#' ) ); ?>" target="_blank"></a>
				<?php } ?>				
				<?php if( get_theme_mod( 'linkedin_on' ) == '1') { ?>
					<a id="st-linkedin" title="" href="<?php echo esc_url ( get_theme_mod( 'linkedin_link', '#' ) ); ?>" target="_blank"></a>
				<?php } ?>
				<?php if( get_theme_mod( 'pinterest_on' ) == '1') { ?>
					<a id="st-pinterest" title="" href="<?php echo esc_url ( get_theme_mod( 'pinterest_link', '#' ) ) ; ?>" target="_blank"></a>
				<?php } ?>
			</div>
		</div>
	</div>	
	
	<?php if ( is_front_page() ) : // show the front page or pages with the header image or widget image with the curve graphic ?>
	
		<div id="st-banner0-wrapper" style="background-color:<?php echo get_theme_mod( 'banner_background', '#050d24' ); ?>; border-color:<?php echo get_theme_mod( 'banner_top_line', '#525458' ); ?>; padding:<?php echo get_theme_mod( 'banner_fp_bg_padding', '0px' ); ?> ;">

			<?php if ( ! dynamic_sidebar( 'sidebar-0' ) ) : ?>
				
                
			<?php endif; // end sidebar widget area ?>

		<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
				<div id="st-header-image" >				
					<img src="<?php esc_url ( header_image() ) ; ?>" class="header-image center" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>" />				
				</div>
		<?php endif; ?>
		
			
            <?php if( get_theme_mod( 'hide_curve' ) == '') { ?>
				<div id="st-banner0-curve"><img src="<?php echo get_template_directory_uri() ; ?>/images/showcase-curve.png" alt="banner curve" /></div>
			<?php } ?>
		</div>	
	
	<?php else : // otherwise show the header or image without the curved bottom ?>
	
		<div id="st-banner1-wrapper" style="background-color:<?php echo get_theme_mod( 'banner_background', '#446b9a' ); ?>; border-color:<?php echo get_theme_mod( 'banner_top_line', '#525458' ); ?>; padding:<?php echo get_theme_mod( 'banner_bg_padding', '0px' ); ?> ;">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="widget-banner1">	
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div><!-- .widget-banner2 -->
			<?php endif; ?>
		<?php if ( get_theme_mod('header_all','1') ) : ?>	
			<?php $header_image = get_header_image();
				if ( ! empty( $header_image ) ) : ?>
					<div id="st-header-image" >
						<img src="<?php echo esc_url( $header_image ); ?>" class="header-image center" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ); ?>" />
					</div>
			<?php endif; ?>
		<?php endif; ?>	
		</div>		
		
	<?php endif; ?>
	

		
	<div id="st-content-wrapper" style="background-color:<?php echo get_theme_mod( 'content_bg', '#ffffff' ); ?>; color:<?php echo get_theme_mod( 'content_text', '#848484' ); ?>">
		<div class="container">
			<div class="row">
					<?php if ( !is_front_page() ) : ?>
                    <div class="span12">
			<div id="breadcrumbs">
            
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
			</div>
            </div>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-21' ) ) : ?>
				<div id="st-cta-wrapper">								
					<div id="st-cta" class="span12">						
							<?php dynamic_sidebar( 'sidebar-21' ); ?>						
					</div>										
				</div>
		<?php endif; ?>
			</div>
		<div class="row">