<?php

/* Add Theme Options Page */
function maputo_add_theme_options_page() {
    if( function_exists('acf_add_options_page') ) {
        $option_page = acf_add_options_page(array(
            'page_title'    => esc_html__('Theme Options', 'maputo'),
            'menu_title'    => esc_html__('Theme Options', 'maputo'),
            'menu_slug'     => 'theme-options-page',
            'capability'    => 'edit_posts',
            'redirect'      => false
      ));
    }
}
add_action('acf/init', 'maputo_add_theme_options_page');

function maputo_acf_json_save_point( $path ) {
	// update path
	$path = get_template_directory() . '/framework/acf-options';

	// return
	return $path;
}
add_filter( 'acf/settings/save_json', 'maputo_acf_json_save_point' );

function maputo_acf_json_load_point( $paths ) {
	// remaputove original path (optional)
	unset( $paths[0] );
	// append path
	$paths[] = get_template_directory() . '/framework/acf-options';

	// return
	return $paths;
}
add_filter( 'acf/settings/load_json', 'maputo_acf_json_load_point' );
