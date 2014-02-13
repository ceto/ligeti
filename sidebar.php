<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Ligeti
 * @since Ligeti 1.0
 */
?>
	<div class="widget-area sidebar-main row-fluid" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php dynamic_sidebar( 'sidebar-main' ); ?>
	</div><!-- .sidebar-main -->
