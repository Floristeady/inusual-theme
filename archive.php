<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage inusual
 * @since inusual 1.0
 */

get_header(); ?>

<div id="content" class="site-content">

	<?php if ( have_posts() ) : ?>

	<header class="page-header">
		<h1 class="page-title">
			<?php
				if ( is_day() ) :
					printf( __( 'Daily Archives: %s', 'inusual' ), get_the_date() );

				elseif ( is_month() ) :
					printf( __( 'Monthly Archives: %s', 'inusual' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'inusual' ) ) );

				elseif ( is_year() ) :
					printf( __( 'Yearly Archives: %s', 'inusual' ), get_the_date( _x( 'Y', 'yearly archives date format', 'inusual' ) ) );

				else :
					_e( 'Archives', 'inusual' );

				endif;
			?>
		</h1>
	</header><!-- .page-header -->

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
<div id="content" class="site-content">

<?php 
get_sidebar();
get_footer(); 
?>