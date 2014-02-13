<?php
/**
 * @package Ligeti
 * @since Ligeti 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<figure class="entry-figure">
		<img src="http://lorempixel.com/300/400" alt="">
	</figure>
	
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php ligeti_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->



		
		<?php if (get_post_meta( get_the_ID(), '_cmb_sajto', true )!='') :?>
		<p class="entry-sajto">
			<?php echo get_post_meta( get_the_ID(), '_cmb_sajto', true); ?>
		</p>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'ligeti' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->


	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'ligeti' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
