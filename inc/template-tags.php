<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Ligeti
 * @since Ligeti 1.0
 */

if ( ! function_exists( 'ligeti_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since Ligeti 1.0
 */
function ligeti_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'navigation-post' : 'navigation-paging';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?> navigation-post clearfix">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'ligeti' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="previous">%link</div>', '<span class="meta-nav">' . _x( '', 'Previous post link', 'ligeti' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="next">%link</div>', '%title <span class="meta-nav">' . _x( '', 'Next post link', 'ligeti' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'ligeti' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'ligeti' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // ligeti_content_nav


if ( ! function_exists( 'ligeti_product_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since Ligeti 1.0
 */
function ligeti_product_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'navigation-prod' : 'navigation-paging';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php //next_post_link( '<div class="previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous product link', 'ligeti' ) . '</span> %title'); ?>
		<?php //previous_post_link( '<div class="next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next product link', 'ligeti' ) . '</span>'); ?>
		

		<?php next_post_smart( '<div class="previous">%link</div>', '<span class="meta-nav">' . _x( '', 'Previous product link', 'ligeti' ) . '</span> %title',FALSE,TRUE); ?>
		<?php previous_post_smart( '<div class="next">%link</div>', '%title <span class="meta-nav">' . _x( '', 'Next product link', 'ligeti' ) . '</span>',FALSE,TRUE); ?>
		
			
	
	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // ligeti_product_nav

if ( ! function_exists( 'ligeti_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Ligeti 1.0
 */
function ligeti_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'ligeti' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'ligeti' ), '<span class="edit-link">', '<span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'ligeti' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'ligeti' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
					<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'ligeti' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( 'Edit', 'ligeti' ), '<span class="edit-link">', '<span>' ); ?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for ligeti_comment()

if ( ! function_exists( 'ligeti_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Ligeti 1.0
 */
function ligeti_posted_on() {
	printf( __( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>', 'ligeti' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),	
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'ligeti' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;
/**
 * Returns true if a blog has more than 1 category
 *
 * @since Ligeti 1.0
 */
function ligeti_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so ligeti_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so ligeti_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in ligeti_categorized_blog
 *
 * @since Ligeti 1.0
 */
function ligeti_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'ligeti_category_transient_flusher' );
add_action( 'save_post', 'ligeti_category_transient_flusher' );