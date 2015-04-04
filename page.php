<?php
/**
 * Template Name: P&aacute;gina principal
 * @package WordPress
 * @subpackage inusual
 * @since inusual 1.0
 */

get_header(); ?>

<div id="content" class="site-content">
	
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
	
				// Include the page content template.
				get_template_part( 'content', 'page' );
	
			endwhile;
		?>

</div><!-- #content -->


<?php get_sidebar('menu'); ?>

<?php get_footer(); ?>