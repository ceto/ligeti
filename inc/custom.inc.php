<?php

add_action( 'init', 'create_product_type' );

function create_product_type() {
	register_post_type( 'product',
		array(
			'labels' => array(
				'name' => __( 'Products' ),
				'singular_name' => __( 'product' ),
				'add_new_item'  => __( 'Add New Product' ),
				'edit_item'		=> __( 'Edit Product' ),
				'all_items'		=> __( 'All Products' )

			),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'referencia'),
		'supports' => array('title', 'thumbnail', 'editor')
		)
	);
}




//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_pcategory_taxonomies', 0 );

//create two taxonomies, genres and writers for the post type "book"
function create_pcategory_taxonomies()
{

 $labels = array(
    'name'                => _x( 'Product Category', 'taxonomy general name' ),
    'singular_name'       => _x( 'Product Category', 'taxonomy singular name' ),
    'search_items'        => __( 'Search Product Categorys' ),
    'all_items'           => __( 'All Product Categorys' ),
    'parent_item'         => __( 'Parent Product Category' ),
    'parent_item_colon'   => __( 'Parent Product Category:' ),
    'edit_item'           => __( 'Edit Product Category' ),
    'update_item'         => __( 'Update Product Category' ),
    'add_new_item'        => __( 'Add New Product Category' ),
    'new_item_name'       => __( 'New Product Category Name' ),
    'menu_name'           => __( 'Product Category' )
  );

  $args = array(
    'hierarchical'        => true,
    'sort'				  => true,
    'labels'              => $labels,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'query_var'           => true,
    'rewrite'             => array( 'slug' => 'referenciacsoport' )
  );

  register_taxonomy( 'prodcat', array( 'product' ), $args );


}


add_filter( 'cmb_meta_boxes', 'single_metaboxes' );
function single_metaboxes( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'single_metabox',
		'title' => __('Sajtó'),
		'pages' => array('post'), // post Type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(

			array(
				'name' => __('Sajtó cikk, és forrás'),
				'id' => $prefix . 'sajto',
				'type' => 'textarea_small'
			),
		)
		);
	return $meta_boxes;
}


add_filter( 'cmb_meta_boxes', 'product_metaboxes' );
function product_metaboxes( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'product_metabox',
		'title' => __('Product details'),
		'pages' => array('product'), // post Type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(

			array(
				'name' => __('Date'),
				'id' => $prefix . 'date',
				'type' => 'text_small'
			),

			array(
				'name' => __('Price'),
				'id' => $prefix . 'price',
				'type' => 'text_small'
			),

			array(
				'name' => __('Anyag'),
				'id' => $prefix . 'anyag',
				'type' => 'text_medium'
			),

			array(
				'name' => __('Szélessség'),
				'id' => $prefix . 'width',
				'type' => 'text_small'
			),
			array(
				'name' => __('Magasság'),
				'id' => $prefix . 'height',
				'type' => 'text_small'
			),
			array(
				'name' => __('Mélység'),
				'id' => $prefix . 'depth',
				'type' => 'text_small'
			),


			array(
				'name' => __('Felületkezelés'),
				'id' => $prefix . 'felület',
				'type' => 'text_medium'
			),
			array(
				'name' => __('Készülhet még'),
				'id' => $prefix . 'keszulhet',
				'type' => 'text_medium'
			),
			array(
				'name' => __('Alapterület'),
				'id' => $prefix . 'alap',
				'type' => 'text_small'
			),
			array(
				'name' => __('Helyszín'),
				'id' => $prefix . 'hely',
				'type' => 'text_medium'
			),
			array(
				'name' => __('Egyéb'),
				'id' => $prefix . 'egyeb',
				'type' => 'textarea_small'
			),
			array(
				'name' => 'Méretrajz',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'meretrajz',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Alaprajz',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'alaprajz',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),







/********** Quote Part *************/


			array(
				'name' => __('Idézet'),
				'id' => $prefix . 'quote',
				'type' => 'textarea_small',
			),

			array(
				'name' => __('Idézet forrása'),
				'id' => $prefix . 'quote_src',
				'type' => 'textarea_small',
			),

			array(
				'name' => __('Idézet linkje'),
				'id' => $prefix . 'quote_link',
				'type' => 'text_small',
			),


			array(
				'name' => 'Photo I.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_1',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo II.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_2',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo III.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_3',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo IV.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_4',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo V.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_5',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo VI.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_6',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),



			array(
				'name' => 'Photo VII.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_7',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo VIII.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_8',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo IX.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_9',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo X.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_10',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo XI.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_11',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo XII.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_12',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),

		),
	);


	return $meta_boxes;
}




add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'cmb/init.php' );
	}
}