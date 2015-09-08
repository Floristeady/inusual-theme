<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage inusual
 * @since inusual 1.0
 */
?>
	
	<footer id="footer" class="site-footer" role="contentinfo">
		<div id="footer-content">
			
		<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
			<ul class="widget-list widget-footer">
				<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
			</ul>
		<?php endif; ?>
		
		</div>
	</footer><!-- footer -->
	
	</div><!-- #content -->
	
	</section><!-- #main -->
	
	<?php wp_footer(); ?>
	</body>
</html>