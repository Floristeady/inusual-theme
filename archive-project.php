<?php
/**
 * The template for displaying Projects.
 * @package WordPress
 * @subpackage inusual
 * @since inusual 1.0
 */

get_header(); ?>

<div id="content" class="site-content">
	
	<div id="projects">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
		<?php //variables
			$option_a = get_field('project_structure')== 'option_a'; 
			$option_b = get_field('project_structure') == 'option_b'; 
			$option_c = get_field('project_structure') == 'option_c'; 
		?>
				
	    <?php if($option_a) { ?>
		
		 <article class="first-module module">
		    
		    <div class="row">
		    
			    <div class="column medium-4 project-image">
				   <?php $attachment_id = get_field('first_image'); 
				    $imagebig = wp_get_attachment_image_src( $attachment_id, 'original' ); ?>
				    <a href="<?php echo $imagebig[0]; ?>"> 
					   <?php echo wp_get_attachment_image( $attachment_id, 'medium'); 
					 	?>
				    </a>
				    <img class="hide" src="http://placehold.it/350x350">
			    </div>
			    
			     <div class="column medium-8">
				    <div class="text">
					    <h1><?php the_title(); ?></h1>
					    <p>tipo proyecto</p>
					    <a href="#">visitar web</a>
				    </div>
			    </div>
	
			    <div class="column medium-3 project-image">
				    <?php $attachment_id = get_field('second_image'); 
				    $imagebig = wp_get_attachment_image_src( $attachment_id, 'original' ); ?>
				    <a href="<?php echo $imagebig[0]; ?>"> 
					   <?php echo wp_get_attachment_image( $attachment_id, 'medium'); 
					 	?>
				    </a>
				    <img class="hide" src="http://placehold.it/276x276">
			    </div>
			    
			    		   		    
			    <div class="column medium-5 project-image">
					 <?php $attachment_id = get_field('third_image'); 
				    $imagebig = wp_get_attachment_image_src( $attachment_id, 'original' ); ?>
				    <a href="<?php echo $imagebig[0]; ?>"> 
					   <?php echo wp_get_attachment_image( $attachment_id, 'large'); 
					 	?>
				    </a>
				    <img class="hide" src="http://placehold.it/440x380">
			    </div>
			    
			      <div class="column medium-3 left medium-push-1 up">
				      
				      <div class="entry-content">
					  	<?php the_content(); ?>
				      </div>
			    </div>

		    
	    	</div>
	    
	    </article>
	    
	    <?php } else if($option_b) { ?>
		    
		<article class="second-module module">
			
			<div class="row">
			    
			    <div class="column medium-3">
				    <img src="http://placehold.it/350x350">
			    </div>
			    
			     <div class="column medium-8">
				      <div class="text">
					  	<h1><?php the_title(); ?></h1>
					  	<p>tipo proyecto</p>
					  	<a href="#">visitar web</a>
				      </div>
			    </div>
	
			    <div class="column medium-7">
				    <img src="http://placehold.it/614x320">
			    </div>
			    
			    		   		    
			    <div class="column medium-2">
				    <img src="http://placehold.it/174x200">
			    </div>
			    
			      <div class="column medium-4 left medium-push-6 up">
				    <div class="entry-content">
					   <?php the_content(); ?>
				    </div>
			    </div>
	
			    
		    </div>

	    </article>
	    
	    <?php } else if($option_c) { ?>

	    
	    <article class="third-module module">
			
			<div class="row">
			    
			    <div class="column medium-offset-1 medium-4">
				     <div class="text">
					 	<h1><?php the_title(); ?></h1>
					 	<p>tipo proyecto</p>
					 	<a href="#">visitar web</a>
				     </div>
			    </div>
	
			    <div class="column medium-4">
				    <img src="http://placehold.it/353x353">
			    </div>
			    
			    		   		    
			    <div class="column medium-5 up">
				    <img src="http://placehold.it/434x306">
			    </div>
			    
			     
			    <div class="column medium-3">
				    <img src="http://placehold.it/260x240">
			    </div>
			    
			     <div class="column medium-3 medium-offset-6 clear">
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