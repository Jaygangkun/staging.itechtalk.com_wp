<?php 
/**
 * After Theme Setup
 *
 * Callback for after_theme_setup hook
 *
 * @since  2.9
 */

add_action( 'after_setup_theme', 'vce_theme_setup' );

function vce_theme_setup() {

	/* Define content width */
    $GLOBALS['content_width'] = 810;

	/* Localization */
    load_theme_textdomain( 'voice', get_parent_theme_file_path( 'languages' ) );

	/* Register sidebars */
	add_action( 'widgets_init', 'vce_register_sidebars' );

	/* Register menus */
	add_action( 'init', 'vce_register_menus' );

	/* Add thumbnails support */
	add_theme_support( 'post-thumbnails' );


	/* Add image sizes */
	$image_sizes = vce_get_image_sizes();
	$image_sizes_opt = vce_get_option( 'image_sizes' );
	foreach ( $image_sizes as $id => $size ) {
		if ( isset( $image_sizes_opt[$id] ) && $image_sizes_opt[$id] ) {
			add_image_size( $id, $size['w'], $size['h'], $size['crop'] );
		}
	}

	/* Add post formats support */
	add_theme_support( 'post-formats', array(
			'audio', 'gallery', 'image', 'video'
		) );

	/* Support for HTML5 */
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery' ) );

	/* Automatic Feed Links */
	add_theme_support( 'automatic-feed-links' );

	/* Declare WooCpommerce support */
	add_theme_support( 'woocommerce' );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	/* Add theme support for title tag (since wp 4.1) */
	add_theme_support( 'title-tag' );

	/* Support for editor styles */
    add_theme_support( 'editor-styles' );

    /* Support for alignwide elements */
    add_theme_support( 'align-wide' );

    /* Support for responsive embeds */
    add_theme_support( 'responsive-embeds' );

    /* Support for predefined colors in editor */
    add_theme_support( 'editor-color-palette', vce_get_editor_colors() );

    /* Support for predefined font-sizes in editor */
    add_theme_support( 'editor-font-sizes', vce_get_editor_font_sizes() );

	// load admin styles
	if ( is_admin() ) {
		vce_load_editor_styles();
	}

	// Remove 5.8 widget block editor
	remove_theme_support( 'widgets-block-editor' );

}