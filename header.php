<?php
/**
 * The Header for our theme.
 * 
 * @package WordPress
 * @subpackage inusual
 * @since inusual 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> ><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
			
	    <meta name="description" content="<?php echo '' . get_bloginfo ( 'description' );  ?>">
	    <meta name="robots" content="index,follow">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<!--[if lte IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

<?php
		/* pages with no-js for commmets */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* no delete*/
		wp_head();
?>
	</head>
	<body <?php body_class(); ?>>
				
		<header id="header" role="banner" class="">

			<div class="header-main">
				
				<?php global $logo, $options, $logo_settings;
					$logo_settings = get_option('plugin_options', $options ); 
					error_reporting(E_ALL ^ E_NOTICE);
					?>
				
					<div id="site-title" class="">
						
						<?php if( $logo_settings['logo_theme_url'] ) : ?>
						<h1><a href="<?php echo bloginfo('url'); ?>" class="logo"><img src="<?php echo $logo_settings['logo_theme_url']; ?>" alt="<?php bloginfo('name'); ?>" /> </a></h1>
					<?php  else : ?>
						<h1><a href="<?php echo bloginfo('url'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
						<?php endif; ?>
	
					</div>
				
				<nav id="access" role="navigation" class="clearfix">
					<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'inusual' ); ?></a>
					<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary','menu_class' => 'menu-main' ) ); ?>
				</nav><!-- #access -->
			</div>

		</header>

		<section id="wrapper" role="main">
			