<?php
/**
 * The Sidebar containing the left-bottom widget areas.
 *
 * @package Ligeti
 * @since Ligeti 1.0
 */
?>
	<div class="widget-area sidebar-leftbottom" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php dynamic_sidebar( 'sidebar-leftbottom' ); ?>
	</div><!-- .sidebar-leftbottom -->
