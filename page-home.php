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
						<h2 class="subtext side-right">Sitio Web Corporativos / Diseño Identidad Visual</h2>
						<div class="intro">
							<img id="intro1" role="img" class="entry-home entry-img" src="<?php echo get_template_directory_uri(); ?>/images/imagotipo_claro.svg">
							
							<div role="contentinfo" id="intro2" class="entry-home entry-text">
								<img id="intro1" width="80" src="<?php echo get_template_directory_uri(); ?>/images/imagotipo_claro.svg">
								<h1  class="quote">En Inusual Estudio tenemos experiencia en el diseño de sitios web corporativos e identidad de marca. Ahora trabajamos desde Puebla, México.</h1>
							</div>
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