<?php
/**
 * The template for displaying Projects.
 * @package WordPress
 * @subpackage inusual
 * @since inusual 1.0
 */

get_header(); ?>

<div id="content" class="site-content">
	
	<div id="projects" class="block">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
		<?php //variables
			$option_a = get_field('project_structure')== 'option_a'; 
			$option_b = get_field('project_structure') == 'option_b'; 
			$option_c = get_field('project_structure') == 'option_c'; 
		?>
				
	    <?php if($option_a) { ?>
		
		 <?php $color = get_field('background_color'); ?>
		 <article class="first-module module" <?php if (get_field('background_color')) { echo 'data-background="'. $color .'" ';  } ?>>
		    
		    <div class="row">
		    
			    
			    
			     <div class="column medium-8 right">
				    <div class="text">
					    <h1><?php the_title(); ?></h1>
					    <?php if(get_field('project_type')) { ?>
						<p class="project_type"><?php the_field('project_type'); ?></p>
						<?php } ?>
						<?php if(get_field('project_website')) { ?>
						<a target="_blank" href="<?php the_field('project_website'); ?>" title="Visitar proyecto" class="project_website">visitar web</a>
						<?php } ?>
				    </div>
			    </div>
			    
			    <div class="column medium-4 project-image left">
				    <?php $attachment_id = get_field('first_image'); 
				    $imagebig = wp_get_attachment_image_src( $attachment_id, 'original' ); ?>
				    <a href="<?php echo $imagebig[0]; ?>"> 
					   <?php //350x350
						   echo wp_get_attachment_image( $attachment_id, 'medium'); ?>
				    </a>
			    </div>
	
			    <div class="column medium-3 project-image">
				    <?php $attachment_id_a2 = get_field('second_image'); 
				    $imagebig_a2 = wp_get_attachment_image_src( $attachment_id_a2, 'original' ); ?>
				    <a href="<?php echo $imagebig_a2[0]; ?>"> 
					   <?php //276x276
						   echo wp_get_attachment_image( $attachment_id_a2, 'medium'); ?>
				    </a>
			    </div>
			    
			    		   		    
			    <div class="column medium-5 project-image">
					<?php $attachment_id_a3 = get_field('third_image'); 
				    $imagebig_a3 = wp_get_attachment_image_src( $attachment_id_a3, 'original' ); ?>
				    <a href="<?php echo $imagebig_a3[0]; ?>"> 
					   <?php //440x380
						   echo wp_get_attachment_image( $attachment_id_a3, 'large'); ?>
				    </a>
			    </div>
			    
			      <div class="column medium-4 large-3 left large-push-1 negative-margin-10">
				      
				      <div class="entry-content">
					  	<?php the_content(); ?>
				      </div>
			    </div>

		    
	    	</div>
	    
	    </article>
	    
	    <?php } else if($option_b) { ?>
		
		<?php $color = get_field('background_color'); ?>    
		<article class="second-module module" <?php if (get_field('background_color')) { echo 'data-background="'. $color .'" ';  } ?>>
			
			<div class="row">

			     <div class="column medium-9 right">
				      <div class="text">
					  	<h1><?php the_title(); ?></h1>
					  	<?php if(get_field('project_type')) { ?>
						<p class="project_type"><?php the_field('project_type'); ?></p>
						<?php } ?>
						<?php if(get_field('project_website')) { ?>
						<a target="_blank" href="<?php the_field('project_website'); ?>" title="Visitar proyecto" class="project_website">visitar web</a>
						<?php } ?>
				      </div>
			    </div>
			    
			     <div class="column medium-3 project-image left">
				    <?php $attachment_id_b1 = get_field('first_image'); 
				    $imagebig_b1 = wp_get_attachment_image_src( $attachment_id_b1, 'original' ); ?>
				    <a href="<?php echo $imagebig_b1[0]; ?>"> 
					   <?php //350x350
						   echo wp_get_attachment_image( $attachment_id_b1, 'medium'); ?>
				    </a>
			    </div>
	
			    <div class="column medium-7 project-image">
				    <?php $attachment_id_b2 = get_field('third_image'); 
				    $imagebig_b2 = wp_get_attachment_image_src( $attachment_id_b2, 'original' ); ?>
				    <a href="<?php echo $imagebig_b2[0]; ?>"> 
					   <?php //614x320
					       echo wp_get_attachment_image( $attachment_id_b2, 'large'); ?>
				    </a>
			    </div>
			    
			    		   		    
			    <div class="column medium-2 project-image">
				    <?php $attachment_id_b3 = get_field('second_image'); 
				    $imagebig_b3 = wp_get_attachment_image_src( $attachment_id_b3, 'original' ); ?>
				    <a href="<?php echo $imagebig_b3[0]; ?>"> 
					   <?php //174x200
						   echo wp_get_attachment_image( $attachment_id_b3, 'medium'); ?>
				    </a>

			    </div>
			    
			      <div class="column medium-5 large-4 left medium-push-5 large-push-7">
				    <div class="entry-content">
					   <?php the_content(); ?>
				    </div>
			    </div>
	
			    
		    </div>

	    </article>
	    
	    <?php } else if($option_c) { ?>

	    <?php $color = get_field('background_color'); ?>
	    <article class="third-module module" <?php if (get_field('background_color')) { echo 'data-background="'. $color .'" ';  } ?>>
		    
			<div class="row">
			    
			    <div class="column medium-5">
				     <div class="text">
					 	<h1><?php the_title(); ?></h1>
					 	<?php if(get_field('project_type')) { ?>
						<p class="project_type"><?php the_field('project_type'); ?></p>
						<?php } ?>
						<?php if(get_field('project_website')) { ?>
						<a target="_blank" href="<?php the_field('project_website'); ?>" title="Visitar proyecto" class="project_website">visitar web</a>
						<?php } ?>	
					</div>
			    </div>
	
			    <div class="column medium-5 large-4 project-image">
				    <?php $attachment_id_c1 = get_field('first_image'); 
				    $imagebig_c1 = wp_get_attachment_image_src( $attachment_id_c1, 'original' ); ?>
				    <a href="<?php echo $imagebig_c1[0]; ?>"> 
					   <?php //353x353
						   echo wp_get_attachment_image( $attachment_id_c1, 'medium'); ?>
				    </a>
			    </div>
			    
			    		   		    
			    <div class="column medium-5 negative-margin-5 project-image">
				    <?php $attachment_id_c2 = get_field('third_image'); 
				    $imagebig_c2 = wp_get_attachment_image_src( $attachment_id_c2, 'original' ); ?>
				    <a href="<?php echo $imagebig_c2[0]; ?>"> 
					   <?php //434x306
					       echo wp_get_attachment_image( $attachment_id_c2, 'large'); ?>
				    </a>
			    </div>
			    
			     
			    <div class="column medium-3 right negative-margin-5 project-image">
				    <?php $attachment_id_c3 = get_field('second_image'); 
				    $imagebig_c3 = wp_get_attachment_image_src( $attachment_id_c3, 'original' ); ?>
				    <a href="<?php echo $imagebig_c3[0]; ?>"> 
					   <?php //260x240
						   echo wp_get_attachment_image( $attachment_id_c3, 'medium'); ?>
				    </a>

			    </div>
			    
			     <div class="column medium-5 large-3 clear">
				    <div class="entry-content">
				    <?php the_content(); ?>
				    </div>
			    </div>
    
		    </div>

	    </article>
	    
	    <?php } ?>
	    			
	<?php endwhile; endif; ?>
	
	</div>
	
</div>

<?php get_footer(); ?>