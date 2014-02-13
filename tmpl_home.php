<?php
/**
 * The Home template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * Template Name: Home	 
 * @package Ligeti
 * @since Ligeti 1.0
 */

get_header(); ?>
	<div class="splash">
		<p>Ritka szerencse, ha a tervező, az építészeti-, belsőépítészi munkákat együtt gondolja át,
			és saját bútoraival rendezi be a teret
		</p>
		<a href="#tartalom" class="ugrogomb homejump">Tovább</a>
	</div>
	<a name="tartalom"></a>	
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
	

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				

				<?php
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php ligeti_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>