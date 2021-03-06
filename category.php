<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage inusual
 * @since inusual 1.0
 */

get_header(); ?>

<div id="content" class="site-content">

	<?php if ( have_posts() ) : ?>

	<header class="archive-header">
		<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'inusual' ), single_cat_title( '', false ) ); ?></h1>

		<?php
			// Show an optional term description.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;
		?>
	</header><!-- .archive-header -->

	<div  class="column medium-8">

		<?php 
			// Start the Loop.
			while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );

			endwhile;
			// Previous/next page navigation.
			inusual_paging_nav();

		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif;
	?>
	
	</div>
	
</div><!-- #content -->

<?php 
get_sidebar();
get_footer(); ?>