<?php
/**
 * @package Ligeti
 * @since Ligeti 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<header class="entry-header clearfix">
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ligeti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php ligeti_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php if ( 'post' == get_post_type() ) : ?>
	<figure class="entry-figure">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ligeti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
			<img src="http://lorempixel.com/150/200" alt="">
		</a>
	</figure>
	<?php endif; ?>


		<?php if (get_post_meta( get_the_ID(), '_cmb_sajto', true )!='') :?>
		<p class="entry-sajto">
			<?php echo get_post_meta( get_the_ID(), '_cmb_sajto', true); ?>
		</p>
	<?php endif; ?>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Teljes cikk', 'ligeti' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'ligeti' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'ligeti' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
