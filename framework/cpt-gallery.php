<?php
/*
 * Gallery CPT
 */

function maputo_gallery_register()
{

	$cpt_slug = get_theme_mod('maputo_gallery_slug');

	if (isset($cpt_slug) && $cpt_slug != '') {
		$cpt_slug = $cpt_slug;
	} else {
		$cpt_slug = 'gallery';
	}

	$labels = array(
		'name'               => esc_html__('Gallery', 'maputo'),
		'singular_name'      => esc_html__('Gallery', 'maputo'),
		'add_new'            => esc_html__('Add New', 'maputo'),
		'add_new_item'       => esc_html__('Add New Gallery', 'maputo'),
		'all_items'          => esc_html__('All Gallery', 'maputo'),
		'edit_item'          => esc_html__('Edit Gallery', 'maputo'),
		'new_item'           => esc_html__('Add New Gallery', 'maputo'),
		'view_item'          => esc_html__('View Item', 'maputo'),
		'search_items'       => esc_html__('Search Gallery', 'maputo'),
		'not_found'          => esc_html__('No gallery(s) found', 'maputo'),
		'not_found_in_trash' => esc_html__('No gallery(s) found in trash', 'maputo')
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

	add_filter('enter_title_here',  'maputo_gallery_change_default_title');

	register_post_type('gallery', $args);
}
add_action('init', 'maputo_gallery_register', 1);


function maputo_gallery_taxonomy()
{

	register_taxonomy(
		"gallery_categories",
		array("gallery"),
		array(
			"hierarchical"   => true,
			"label"          => "Categories",
			"singular_label" => "Category",
			"rewrite"        => true
		)
	);

	register_taxonomy(
		'gallery_tag',
		'gallery',
		array(
			'hierarchical'  => false,
			'label'         => __('Tags', 'maputo'),
			'singular_name' => __('Tag', 'maputo'),
			'rewrite'       => true,
			'query_var'     => true
		)
	);
}
add_action('init', 'maputo_gallery_taxonomy', 1);


function maputo_gallery_change_default_title($title)
{
	$screen = get_current_screen();

	if ('gallery' == $screen->post_type)
		$title = esc_html__("Enter the gallery's name here", 'maputo');

	return $title;
}


function maputo_gallery_edit_columns($gallery_columns)
{
	$gallery_columns = array(
		"cb"                     => "<input type=\"checkbox\" />",
		"title"                  => esc_html__('Title', 'maputo'),
		"thumbnail"              => esc_html__('Thumbnail', 'maputo'),
		"gallery_categories" 			 => esc_html__('Categories', 'maputo'),
		"date"                   => esc_html__('Date', 'maputo'),
	);
	return $gallery_columns;
}
add_filter('manage_edit-gallery_columns', 'maputo_gallery_edit_columns');

function maputo_gallery_column_display($gallery_columns, $post_id)
{

	switch ($gallery_columns) {

			// Display the thumbnail in the column view
		case "thumbnail":
			$width = (int) 64;
			$height = (int) 64;
			$thumbnail_id = get_post_meta($post_id, '_thumbnail_id', true);

			// Display the featured image in the column view if possible
			if ($thumbnail_id) {
				$thumb = wp_get_attachment_image($thumbnail_id, array($width, $height), true);
			}
			if (isset($thumb)) {
				echo wp_kses_post( $thumb ); 
			} else {
				echo esc_html__('None', 'maputo');
			}
			break;

			// Display the gallery tags in the column view
		case "gallery_categories":

			if ($category_list = get_the_term_list($post_id, 'gallery_categories', '', ', ', '')) {
				echo wp_kses_post( $category_list );
			} else {
				echo esc_html__('None', 'maputo');
			}
			break;
	}
}
add_action('manage_gallery_posts_custom_column', 'maputo_gallery_column_display', 10, 2);
