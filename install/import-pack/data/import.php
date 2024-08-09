<?php
/**
 * Import pack data package demo
 *
 */
$plugin_includes = array(
  array(
    'name'     => __( 'Elementor Website Builder', 'maputo' ),
    'slug'     => 'elementor',
  ),
  array(
    'name'     => __( 'Elementor Pro', 'maputo' ),
    'slug'     => 'elementor-pro',
    'source'   => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'elementor-pro.zip',
  ),
  array(
    'name'     => __( 'Smart Slider 3 Pro', 'maputo' ),
    'slug'     => 'nextend-smart-slider3-pro',
    'source'   => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'nextend-smart-slider3-pro.zip',
  ),
  array(
    'name'     => __( 'Advanced Custom Fields PRO', 'maputo' ),
    'slug'     => 'advanced-custom-fields-pro',
    'source'   => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'advanced-custom-fields-pro.zip',
  ),
  array(
    'name'     => __( 'Gravity Forms', 'maputo' ),
    'slug'     => 'gravityforms',
    'source'   => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'gravityforms.zip',
  ),
  array(
    'name'     => __( 'Newsletter', 'maputo' ),
    'slug'     => 'newsletter',
  ),
  array(
    'name'     => __( 'WooCommerce', 'maputo' ),
    'slug'     => 'woocommerce',
  ),

);

return apply_filters( 'maputo/import_pack/package_demo', [
    [
        'package_name' => 'maputo-main',
        'preview' => get_template_directory_uri() . '/screenshot.jpg',
        'url_demo' => 'https://maputo.beplusthemes.com/',
        'title' => __( 'Maputo Demo', 'maputo' ),
        'description' => __( 'Maputo main demo.', 'maputo' ),
        'plugins' => $plugin_includes,
    ],
] );
