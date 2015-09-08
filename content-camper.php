<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage allcampers
 * @since allcampers 1.0
 */
?>

<?php if ( is_single() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('content-inner'); ?>>
	
	<nav id="submenu-campers" role="navigation" class="show-for-large-up">
		<?php if ( has_nav_menu( 'submenu' ) ) {		
			wp_nav_menu( array( 'container_class' => 'submenu-campers', 'theme_location' => 'submenu' ) );
		} ?>
	</nav>
	
	<div class="<?php if(get_field('gallery_camper')){ echo 'thum'; } ?>">

		<header class="entry-header row">
			
			<?php the_title( '<div class="column small-12 small-centered"><h1 class="entry-title-camper">', '</h1></div>' ); ?>
	
		</header><!-- .entry-header -->
		
		<?php  $images = get_field('gallery_camper'); ?>
		<?php if($images) { ?>
		<div id="gallery-camper" class="flexslider loading">
			<ul class="slides">
				<div class="loading-effect"><div class="out"><div class="inner"></div></div></div>
				<?php foreach($images as $image) { ?>
				<li>
					<a class="imagelight" href="<?php echo $image['sizes']['large-image']; ?>"  data-imagelightbox="a">
						<img src="<?php echo $image['sizes']['large-image']; ?>" alt="<?php echo $image['title']; ?>" />
					</a>
				</li>
				<?php } ?>
				
				<?php if(get_field('gallery_video')) { ?>
				<li class="flex-video youtube play3"><p><?php the_field('gallery_video'); ?></p></li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
		
		<div class="row">
			
			<div class="outside-content column medium-7 right">
				
				<div class="entry-content">
					
					<?php if(has_excerpt()) {
						$excerpt = get_the_excerpt(); 
						echo '<h2 class="entry-excerpt">'. $excerpt .'</h2>';
					 } ?>
					
					<?php the_content(); ?>
					
					<?php  $rows = get_field('price_camper');  ?>
					<?php if($rows) { ?>
					<div id="prices-camper">
						<h1><?php _e('Prices', 'allcampers'); ?></h1>
						<?php foreach($rows as $row) { ?>
						<div class="medium-7 column no-padding">
							<?php echo $row['text_dates']; ?> 
						</div>
						
						<div class="medium-5 column no-padding-small">
							<p class="camper-price"><?php echo $row['text_price']; ?> </p>
						</div>
						<?php } ?>
					</div>
					<?php }  ?>

				</div><!-- .entry-content -->
				
				<?php $content = get_the_content(); 
					if($content != ''){ ?>
					<div class="diagonal"></div>
				<?php } ?>
			</div>
			
			<div class="left-content column medium-5">

				<div class="btn-book show-for-small-only">
					<a class="box" href="javascript:void(0)"><?php _e('Pre-book this camper', 'allcampers'); ?></a>
				</div>

				<?php if(get_field('booking_calendar_form')) { ?>
					<div class="widget-booking">
						<?php the_field('booking_calendar_form'); ?>
					</div>
				<?php } ?>
				
				<?php if(get_field('contact_info_camper')) { ?>
				<div class="general-info">
					<?php the_field('contact_info_camper'); ?>
				</div>
				<?php } ?>
				
				<?php $attachment = get_field('documents_camper');  ?>
				<?php if($attachment) { ?>	
				<div id="docs-camper">	
					<ul class="docs-list">
						<?php while(has_sub_field('documents_camper')): 
						$extra_text = get_sub_field('file_extra_camper');
						$attachment_id = get_sub_field('file_doc_camper');
						$url = wp_get_attachment_url( $attachment_id );
						$title = get_the_title( $attachment_id ); ?>
						
						<li><a target="_blank" href="<?php echo $url; ?>"><?php echo $title; ?> </a><span><?php echo $extra_text; ?></span></li>
						<?php endwhile; ?>
						
						
					</ul>	
				</div>
				<?php } ?>
				
			</div>
		
		</div>
	</div>
	
	<nav id="submenu-campers" role="navigation" class="hidden-for-large-up bottom">
		<?php if ( has_nav_menu( 'submenu' ) ) {		
			wp_nav_menu( array( 'container_class' => 'submenu-campers', 'theme_location' => 'submenu' ) );
		} ?>
	</nav>

</article><!-- #post-## -->

<?php else :?>


<li>	
	<div class="inner">
	<article class="inner">
			
		<?php if(has_post_thumbnail()) : ?>
		<a class="img" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'allcampers' ), the_title_attribute( 'echo=0' ) ); ?>">
			<?php the_post_thumbnail('featured-camper'); ?>
		</a>
		<?php endif; ?>
		
		<div class="text">

			<h3 class="product-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'allcampers' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			
			<a class="more" href="<?php the_permalink(); ?>"><span>+</span></a>
			 
		</div>
	</article>
	</div>
</li>


<?php endif; ?>

