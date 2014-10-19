<?php
/**
 * The Template for displaying all single product posts.
 *
 * @package Ligeti
 * @since Ligeti 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<?php $imci = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large21' ); ?>
				<figure class="prod-figure" style="background-image:url('<?php echo $imci[0];?>'); max-width: <?php echo $imci[1];?>;max-height: <?php echo $imci[2];?>;">
						<!--div class="prod-nav clearfix">
							<?php ligeti_product_nav(); ?>
						</div-->
				</figure>


				<header class="prod-header">
					
					<!--div class="prod-bread clearfix">
						<ul class="breadcrumb">
							<?php
								
								$osanya=has_term('butorok', 'prodcat')?'butorok':(has_term('epuletek','prodcat')?'epuletek':'belso-terek');
							
								//$term_list = get_the_term_list( $post->ID, 'prodcat', '<li>', '</li><li>', '</li>' );
								//echo str_replace('?prodcat=','?prodcat='.$osanya.'#',$term_list);
							
								$product_terms = wp_get_object_terms($post->ID, 'prodcat', array('orderby'=>'count','order'=>'DESC'));
								if(!empty($product_terms)){
								  if(!is_wp_error( $product_terms )){
								    foreach($product_terms as $term){
								    	echo '<li><a href="?prodcat='.$osanya.'#'.$term->slug.'">'.$term->name.'</a></li>';
								    }	
								  }
								}
							?>



						</ul>
					</div-->
					
					
					<h1 class="prod-title"><?php the_title(); ?></h1>
				</header><!-- .prod-header -->

				<div class="prod-content clearfix">
					<?php if (get_post_meta( get_the_ID(), '_cmb_quote', true )!='') :?>
						<blockquote class="quote" cite="<?php echo get_post_meta( get_the_ID(), '_cmb_quote_link', true ); ?>">
							<p><?php echo get_post_meta( get_the_ID(), '_cmb_quote', true ); ?></p>
							<footer>
								— <a href="<?php echo get_post_meta( get_the_ID(), '_cmb_quote_link', true ); ?>">
								<?php echo get_post_meta( get_the_ID(), '_cmb_quote_src', true ); ?>
								</a>
							</footer>
						</blockquote>
					<?php endif; ?>
					<div class="data clearfix">
						<!--div class="prod-date">
							<span><?php echo '’'.substr(get_post_meta( get_the_ID(), '_cmb_date', true ),2); ?></span>
						</div-->
						<?php the_content(); ?>
					</div>
				
						<div class="row-fluid prod-lenyeg">
							<div class="span7 prod-params">
								<?php if (get_post_meta( get_the_ID(), '_cmb_alap', true )!='') :?>
									<p>
										<span class="name">Alapterület:</span>
										<span class="value"><?php echo get_post_meta( get_the_ID(), '_cmb_alap', true); ?></span>
									</p>
								<?php endif; ?>
								<?php if (get_post_meta( get_the_ID(), '_cmb_hely', true )!='') :?>
									<p>
										<span class="name">Helyszín:</span>
										<span class="value"><?php echo get_post_meta( get_the_ID(), '_cmb_hely', true); ?></span>
									</p>
								<?php endif; ?>

								<?php if (get_post_meta( get_the_ID(), '_cmb_width', true )!='') :?>
									<p>
										<span class="name">Méret:</span>
										<span class="value">
											<?php echo get_post_meta( get_the_ID(), '_cmb_width', true); ?> &times;
											<?php echo get_post_meta( get_the_ID(), '_cmb_height', true); ?> &times;
											<?php echo get_post_meta( get_the_ID(), '_cmb_depth', true); ?>
										</span>
									</p>
								<?php endif; ?>
								
								<?php if (get_post_meta( get_the_ID(), '_cmb_anyag', true )!='') :?>
									<p>
										<span class="name">Anyaga:</span>
										<span class="value"><?php echo get_post_meta( get_the_ID(), '_cmb_anyag', true); ?></span>
									</p>
								<?php endif; ?>

								<?php if (get_post_meta( get_the_ID(), '_cmb_keszulhet', true )!='') :?>
									<p>
										<span class="name">Készülhet még:</span>
										<span class="value"><?php echo get_post_meta( get_the_ID(), '_cmb_keszulhet', true); ?></span>
									</p>
								<?php endif; ?>

								<?php if (get_post_meta( get_the_ID(), '_cmb_egyeb', true )!='') :?>
									<p>
										<span class="name">Egyéb:</span>
										<span class="value"><?php echo get_post_meta( get_the_ID(), '_cmb_egyeb', true); ?></span>
									</p>
								<?php endif; ?>
							</div>
							<div class="span5">
							<?php if ( get_post_meta( get_the_ID(), '_cmb_price', true )!='') : ?>
							<div class="prod-priceblock">
									<span class="ar">~Ár:</span>
									<span class="prod-price"><?php echo get_post_meta( get_the_ID(), '_cmb_price', true ); ?></span>
									<span class="penz">,- Ft</span> 
									<a class="ib" href="#" data-trigger="hover" title="Miért nincs pontos ár?" data-toggle="popover"  data-content="Ide jön a magyarázkodás a hozzávetőleges árról.">
										<i class="icon-info-sign"></i>
									</a>
							

							</div>	
							<?php endif; ?>
							<!--div class="prod-actionblock">
								<button class="btn btn-inverse">Kapcsolatfelvétel</button>
								<span class="telcsi">Tel: +36 70 7705653 </span>
							</div-->
							</div><!-- /.span4 -->
						</div>




					
				</div><!-- .prod-content -->

				<?php if(get_post_meta( get_the_ID(), '_cmb_photo_1', true ) !='')  : ?>
				<div class="prod-gallery clearfix">
					<h3>További fotók a bútorról</h3>
					<ul class="gallery clearfix">
					<?php $k=0; while ( ($k<13) && (get_post_meta( get_the_ID(), '_cmb_photo_'.++$k, true ) !='')  ): ?>
					 <li class="">
					 	<?php 
					 		$tsrc = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_cmb_photo_'.$k.'_id', true ), 'medium43', false ) ; 
					 		$tlnk = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_cmb_photo_'.$k.'_id', true ), 'large43', false ) ; 
					 	?>
					 	<figure class="prod-thumb">
						 	<a href="<?php echo $tlnk[0] ; ?>">
						 		<img src="<?php echo $tsrc[0] ; ?>" />
							</a>
						</figure>
					</li>
					<?php endwhile;	?>
					</ul><!-- .gallery -->
				</div>
				<?php endif; ?>

				

					<?php 
					$the_related=new WP_Query( array(
											'post_type' => 'product', 
											'taxonomy' => 'prodcat', 
											'post__not_in' => array( $post->ID ),
											'term' => $term->slug 

											) );
					?>
					<?php if ( $the_related->have_posts() ) :?>
					<div class="prod-related clearfix">
						<h3>További találatok a(z) <?php echo $term->name; ?> kategóriából</h3>
						<ul class="related-menu">
							<?php foreach( $the_related->posts as $posta ) : ?>
					            <li>
					              <a href="<?php echo get_permalink( $posta->ID ); ?>">
					              	<?php echo $posta->post_title; ?></a>
					            </li>
					        <?php endforeach ?>
<!-- 					        <li>
					            <a href="?prodcat=<?php echo $osanya; ?>#<?php echo $term->slug; ?>">
					                 <?php echo $term->name; ?> kategória összes találata
					            </a>
					        </li> -->
						</ul>
					</div>
				<?php endif; ?>


				<footer class="prod-meta">

				</footer><!-- .prod-meta -->
			</article><!-- #product-## -->


		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>
<script>
	

	$('.prod-gallery').magnificPopup({
  		delegate: 'a', 
 		type: 'image',
 		gallery:{enabled:true},
	});
</script>