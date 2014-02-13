<?php
/**
 * The template for displaying product listing pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 * Template Name: product listing
 * @package Ligeti
 * @since Ligeti 1.0
 */

get_header(); ?>
<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

	<div id="primary" class="content-area clearfix">
		<div id="content" class="site-content" role="main">

			<?php
				$farg = array(
								'nopaging' => true,
								'post_type' => 'product',
								//'meta_key'=> '_cmb_snr',
								//'orderby' => 'meta_value_num',
								//'order' => 'ASC',
								//'prodcat' => 'bygg-c'
						 	  );	
				$the_products = new WP_Query($farg);
			?>			
			<div class="row-fluid">
				<div class="span4 product-filter">
					<p>A találatok szűkítéséhez válasszon a kategóriákból!</p>
					<?php $prod_cats = get_terms('prodcat', 'hide_empty=1&parent=0'); ?>
					<ul class="prodcat-menu">
							<li>
					    		<a href="<?php echo get_term_link( $term->slug, 'prodcat' ); ?>" class="">
					        		<?php echo $term->name; ?>
					        	</a>
					    	</li>
					    <?php foreach( $prod_cats as $fcat ) : ?>
					      <li>
					        <a href="<?php echo get_term_link( $fcat->slug, 'prodcat' ); ?>" class="<?php echo ($fcat->slug==$term->slug)?'active':'' ; ?>">
					          <?php echo $fcat->name; ?>
					        </a>
					       </li>
					    <?php endforeach ?>
			  		</ul>
				</div><!-- .span4 -->						
			<?php $i=1; ?>
			<?php while ( $the_products->have_posts() ) : $the_products->the_post(); ?>
						<?php echo ((++$i%3)==1)?'<div class="row-fluid">':''; ?>
							<?php 
								$termlist=get_the_terms( $post->ID, 'prodcat' );
								$termik = array();
								foreach ( $termlist as $term ) {
										$termik[] = $term->slug;
									}
								$termes = join(" ", $termik );
							?>
							<article id="product-<?php the_ID(); ?>" <?php post_class($termes.' span4'); ?>>
								<header class="entry-header">
									<figure class="enrtry-figure">
										<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ligeti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
											<img src="http://placeimg.com/768/480/arch" />
										</a>
									</figure>
									<h3 class="entry-title">
										<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ligeti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
											<?php the_title(); ?>
										</a>
									</h3>
								</header><!-- .entry-header -->
								<?php edit_post_link( __( 'Edit', 'ustedalen' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
							</article><!-- #product-## .span4-->

						<?php echo (($i%3)==0)?'</div><!-- .row-fluid -->':''; ?>
			<?php endwhile; // end of the loop. */ ?>
			<?php echo ((++$i%3)!=1)?'</div><!-- .row-fluid -->':''; ?>


			<?php wp_reset_query();	wp_reset_postdata();?>
		
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
