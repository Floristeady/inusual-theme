<?php
/**
 * Template Name: P&aacute;gina Inicio
 * @package WordPress
 * @subpackage inusual
 * @since inusual 1.0
 */

get_header(); ?>

<div id="content" class="site-content">
	
    <div class="fullscreen-cover">
	    <div class="cover"></div>
	    <div id="container">
			<div class="row">
				<div class="column small-12 small-centered">
					<div id="main">
						<h2 class="subtext side-right">Proyectos en Colaboración</h2>
						<div class="intro">
							<img id="intro1" class="entry-home entry-img" src="<?php echo get_template_directory_uri(); ?>/images/imagotipo_claro.svg">

							<h1 id="intro2" class="entry-home">Varios años de experiencia en el mundo digital. Ahora contamos con colaboradores que nos ayudan en otras áreas para hacer proyectos integrales. </h1>
							<h1 id="intro3" class="entry-home">Queremos crear la identidad de tu marca y diseñar una experiencia única para tus clientes, pero primero identificar que necesitas comunicar.</h1>
							<h1 id="intro4" class="entry-home">Tu proyecto es único para nosotros, la solución también. Nuestro proceso: Identificar + planificar + diseñar + desarrollar.</h1>
						</div>
						
						<span class="show-for-small-only intro-button">
						<a class="button button-intro" href="#">Saber más <span>+</span></a></span>
						
						<?php if(get_field('link_button')) { ?>
						<span class="show-for-medium-up intro-button">
							<a class="button button-intro" href="<?php the_field('link_button'); ?>"><?php the_field('text_button'); ?></a>
						</span>
						<?php } ?>

						<h2 class="subtext side-left show-for-medium-up">Estudio Independiente</h2>
						
						<div class="cd-background-wrapper hide">
							<figure class="cd-floating-background">
								<img class="img" src="<?php echo get_template_directory_uri(); ?>/images/assets/border.png">
							</figure>
						</div>
					</div>
	
				</div>
				
			</div>
	    </div>
    </div>


	<?php // contenido págines destacados	
		$args = array(
			'post_type'	=> array('page'),
			'posts_per_page' => 3,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'meta_query' => array(
				array( 'key' => 'featured_content', 'value' => '1')
			) );
			
		$featured_page = new WP_Query( $args ); ?>

	<?php if ( $featured_page->have_posts() ) { while ( $featured_page->have_posts() ) : $featured_page->the_post(); ?>		
	<?php $theid = get_field('id_content'); ?>
	
	<div id="<?php echo $theid; ?>" class="block">
		
		<?php the_content(); ?>	 
				
	</div>

    <?php endwhile; } ?> 
	<?php wp_reset_query(); ?>
        
<?php get_footer(); ?>