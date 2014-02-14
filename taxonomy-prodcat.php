<?php
/**
 * The template for displaying Product Category Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ligeti
 * @since Ligeti 1.0
 */

get_header(); ?>
<?php 
	//query_posts( 'posts_per_page=' );
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

	<div id="primary" class="content-area ">
		<div id="content" class="site-content clearfix productlista" role="main">

			<div class="product-filter collapse">
					<?php $furni_cats = get_terms('prodcat', array(
							 	'parent'    => $term->term_id,
							 	'hide_empty' => 1
							 ));
					?>
					<ul class="prodcat-menu clearfix">
											    <li>
					    		<a href="#filter=*"
										data-filter="*"
					    			data-cat="<?php echo $term->slug; ?>" class="muter active">
					        		Összes
					        	</a>
					    	</li>
					    	
					    <?php foreach( $furni_cats as $fcat ) : ?>
					    	<li>
					        	<a href="#filter=.<?php echo $fcat->slug; ?>"
											data-filter=".<?php echo $fcat->slug; ?>"
					        		data-cat="<?php echo $fcat->slug; ?>" class="<?php echo ($fcat->slug==$term->slug)?'active':'' ; ?>">
					        		<?php echo $fcat->name; ?>
					        	</a>
					       </li>
					    <?php endforeach ?>

			  		</ul>
				</div><!-- .product-filter -->

				<h3 class="toggle-filter"><a href="#" data-toggle="collapse" data-target=".product-filter">
					<i class="icon-align-justify"></i> <?php echo $term->name; ?>
				</a></h3>

			<div class="product-listing clearfix">


		<?php $i=1; ?>

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php // echo ((++$i%3)==1)?'<div class="row-fluid">':''; ?>
							<?php 
								$termlist=get_the_terms( $post->ID, 'prodcat' );
								$termik = array();
								foreach ( $termlist as $term ) {
										$termik[] = $term->slug;
									}
								$termes = join(" ", $termik );
							?>
							<article id="product-<?php the_ID(); ?>" <?php post_class($termes.' obj mutat'); ?>>
							<?php
								$ima = get_post_meta( $post->ID, '_cmb_photo_1_id', true );
								$imci = wp_get_attachment_image_src( $ima, 'medium43');
							?>
							<?php if ($imci[0]!='' ) :?>
								<figure class="prod-thumb">
									<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ligeti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
										<img width="<?php echo $imci[1]; ?>" height="<?php echo $imci[2]; ?>" src="<?php echo $imci[0]; ?>" alt="<?php echo the_title(); ?>" />
									</a>
								</figure>
							<?php else : ?>
								<figure class="prod-thumb">
									<?php 
										$randa=rand(0,5)*4;
										$faszameret=''.(480+$randa).'/'.(360+$randa/4*3).'';
									?>
									<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ligeti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									<img width="480" height="360" src="http://placeimg.com/<?php echo $faszameret; ?>/arch/sepia" /></a>
								</figure>

							<?php endif; ?>
								
								<h3 class="prod-title">
									<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ligeti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
										<?php the_title(); ?>
										<span class="prod-year"><?php echo '’'.substr(get_post_meta( get_the_ID(), '_cmb_date', true ),2); ?></span>
									</a>
								</h3>
							</article><!-- #furniture-## .obj-->
				<?php // echo (($i%3)==0)?'</div><!-- .row-fluid -->':''; ?>
			<?php endwhile; ?>
			

			<?php // echo ((++$i%3)!=1)?'</div><!-- .row-fluid -->':''; ?>
			</div> <!-- .product-listing-->
			<?php ligeti_content_nav( 'nav-below' ); ?>

		<?php else : ?>
			
			</div> <!-- .product-listing-->
			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<script>
		
		// jQuery(document).ready(function() {
 	// 		//alert(location.hash.substr(1));
 	// 		$('.prodcat-menu a').removeClass('active');
 	// 		$('.prodcat-menu a[data-cat="'+location.hash.substr(1)+'"]').addClass('active');
 	// 		$('article:not(.'+location.hash.substr(1)+')').removeClass('mutat');

 	// 	});

		// jQuery('.prodcat-menu a').click(function(e) {
		// 	e.preventDefault();

		// 	$('.prodcat-menu a').removeClass('active');
		// 	$(this).addClass('active');
		// 	$('article:not(.'+$(this).attr('data-cat')+')').removeClass('mutat');
		// 	$('article.'+$(this).attr('data-cat')).addClass('mutat');
		// 	location.hash=$(this).attr('data-cat');
		// 	//$('.product-filter').collapse('toggle');
			
		// });
	</script>

<?php get_footer(); ?>