<?php
/*
 * Brand CPT
 */

function maputo_brand_register() {

	$cpt_slug = get_theme_mod('maputo_brand_slug');

	if(isset($cpt_slug) && $cpt_slug != ''){
		$cpt_slug = $cpt_slug;
	} else {
		$cpt_slug = 'brand';
	}

	$labels = array(
		'name'               => esc_html__( 'Brands', 'maputo' ),
		'singular_name'      => esc_html__( 'Brand', 'maputo' ),
		'add_new'            => esc_html__( 'Add New', 'maputo' ),
		'add_new_item'       => esc_html__( 'Add New Brand', 'maputo' ),
		'all_items'          => esc_html__( 'All Brands', 'maputo' ),
		'edit_item'          => esc_html__( 'Edit Brand', 'maputo' ),
		'new_item'           => esc_html__( 'Add New Brand', 'maputo' ),
		'view_item'          => esc_html__( 'View Item', 'maputo' ),
		'search_items'       => esc_html__( 'Search Brands', 'maputo' ),
		'not_found'          => esc_html__( 'No brand(s) found', 'maputo' ),
		'not_found_in_trash' => esc_html__( 'No brand(s) found in trash', 'maputo' )
	);

  $args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'capability_type' => 'post',
		'publicly_queryable' => false,
		'hierarchical'    => false,
		'menu_icon'       => 'dashicons-admin-post',
		'rewrite'         => array('slug' => $cpt_slug), // Permalinks format
		'supports'        => array('title', 'thumbnail')
  );

  add_filter( 'enter_title_here',  'maputo_brand_change_default_title');

  register_post_type( 'brand' , $args );
}
add_action('init', 'maputo_brand_register', 1);


function maputo_brand_taxonomy() {

	register_taxonomy(
		"brand_categories",
		array("brand"),
		array(
			"hierarchical"   => true,
			"label"          => "Categories",
			"singular_label" => "Category",
			"rewrite"        => true
		)
	);

	register_taxonomy(
        'brand_tag',
        'brand',
        array(
            'hierarchical'  => false,
            'label'         => __( 'Tags', 'maputo' ),
            'singular_name' => __( 'Tag', 'maputo' ),
            'rewrite'       => true,
            'query_var'     => true
        )
    );

}
add_action('init', 'maputo_brand_taxonomy', 1);


function maputo_brand_change_default_title( $title ) {
	$screen = get_current_screen();

	if ( 'brand' == $screen->post_type )
		$title = esc_html__( "Enter the brand's name here", 'maputo' );

	return $title;
}


function maputo_brand_edit_columns( $brand_columns ) {
	$brand_columns = array(
		"cb"                     => "<input type=\"checkbox\" />",
		"title"                  => esc_html__('Title', 'maputo'),
		"thumbnail"              => esc_html__('Thumbnail', 'maputo'),
		"brand_categories" 			 => esc_html__('Categories', 'maputo'),
		"date"                   => esc_html__('Date', 'maputo'),
	);
	return $brand_columns;
}
add_filter( 'manage_edit-brand_columns', 'maputo_brand_edit_columns' );

function maputo_brand_column_display( $brand_columns, $post_id ) {

	switch ( $brand_columns ) {

		// Display the thumbnail in the column view
		case "thumbnail":
			$width = (int) 64;
			$height = (int) 64;
			$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );

			// Display the featured image in the column view if possible
			if ( $thumbnail_id ) {
				$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
			}
			if ( isset( $thumb ) ) {
				echo wp_kses_post( $thumb ); 
			} else {
				echo esc_html__('None', 'maputo');
			}
			break;

		// Display the brand tags in the column view
		case "brand_categories":

		if ( $category_list = get_the_term_list( $post_id, 'brand_categories', '', ', ', '' ) ) {
			echo wp_kses_post( $category_list );
		} else {
			echo esc_html__('None', 'maputo');
		}
		break;
	}
}
add_action( 'manage_brand_posts_custom_column', 'maputo_brand_column_display', 10, 2 );
