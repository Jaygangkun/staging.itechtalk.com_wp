<?php

/* Load admin scripts and styles */
add_action( 'admin_enqueue_scripts', 'sdw_load_admin_scripts' );


/**
 * Load scripts and styles in admin
 *
 * It just wrapps two other separate functions for loading css and js files in admin
 *
 * @since  2.9
 */

function sdw_load_admin_scripts() {
	sdw_load_admin_css();
	sdw_load_admin_js();
}


/**
 * Load admin css files
 *
 * @since  2.9
 */

function sdw_load_admin_css() {

	global $pagenow, $typenow;

	//Load color picker for categories
	if ( in_array( $pagenow, array( 'edit-tags.php', 'term.php' ) ) && isset( $_GET['taxonomy'] ) && $_GET['taxonomy'] == 'category' ) {
		wp_enqueue_style( 'wp-color-picker' );
	}

	if ( $typenow == 'page' &&  in_array( $pagenow, array( 'post.php', 'post-new.php' ) ) ) {
		wp_enqueue_style( 'wp-jquery-ui-dialog' );
	}

	//Load small admin style tweaks
	wp_enqueue_style( 'vce-global', get_parent_theme_file_uri( 'assets/css/admin/global.css' ), false, VOICE_THEME_VERSION );

}



/**
 * Load admin js files
 *
 * @since  2.9
 */

function sdw_load_admin_js() {

	global $pagenow, $typenow;

	//Load global JS
	wp_enqueue_script( 'vce-global', get_parent_theme_file_uri( 'assets/js/admin/global.js' ), array( 'jquery' ), VOICE_THEME_VERSION );

	//Load category JS
	if ( in_array( $pagenow, array( 'edit-tags.php', 'term.php' ) ) && isset( $_GET['taxonomy'] ) && $_GET['taxonomy'] == 'category' ) {
		wp_enqueue_media();
		wp_enqueue_script( 'vce-category', get_parent_theme_file_uri( 'assets/js/admin/metaboxes-category.js' ), array( 'jquery', 'wp-color-picker' ), VOICE_THEME_VERSION );
	}

	//Load post & page metaboxes css and js
	if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {
		if ( $typenow == 'post' ) {
			wp_enqueue_script( 'vce-post-metaboxes', get_parent_theme_file_uri( 'assets/js/admin/metaboxes-post.js' ), array( 'jquery' ), VOICE_THEME_VERSION );
		} elseif ( $typenow == 'page' ) {
			wp_enqueue_script( 'vce-page-metaboxes', get_parent_theme_file_uri( 'assets/js/admin/metaboxes-page.js' ), array( 'jquery', 'jquery-ui-dialog', 'jquery-ui-sortable', 'jquery-ui-autocomplete' ), VOICE_THEME_VERSION );
			wp_localize_script( 'vce-page-metaboxes', 'vce_js_settings', vce_get_admin_js_settings() );
        }
	}

}

/**
 * Load editor styles
 *
 * @since  1.0
 */

function vce_load_editor_styles() {

	if ( $fonts_link = vce_generate_font_links() ) {
		add_editor_style( $fonts_link );
	}

	add_editor_style( get_parent_theme_file_uri( '/assets/css/admin/editor-style.css' ) );

}

/**
 * Load dynamic editor styles
 *
 * @since  2.9
 */

add_action( 'enqueue_block_editor_assets', 'vce_block_editor_styles', 99 );

function vce_block_editor_styles() {
	
	wp_register_style( 'vce-editor-styles', false, VOICE_THEME_VERSION );
	wp_enqueue_style( 'vce-editor-styles');

	wp_add_inline_style( 'vce-editor-styles', vce_generate_dynamic_editor_css() );

}
