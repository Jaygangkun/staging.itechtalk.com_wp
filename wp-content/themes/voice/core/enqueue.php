<?php

/* Load frontend scripts and styles */
add_action( 'wp_enqueue_scripts', 'vce_load_scripts' );

/**
 * Load scripts and styles on frontend
 *
 * It just wraps two other separate functions for loading css and js files
 *
 * @since  2.9
 */

function vce_load_scripts() {
	vce_load_css();
	vce_load_js();
}

/**
 * Load frontend css files
 *
 * @since  2.9
 */

function vce_load_css() {


	//Load fonts
	if ( $fonts_link = vce_generate_font_links() ) {
		wp_enqueue_style( 'vce-fonts', $fonts_link, array(), null );
	}

	if ( !vce_get_option( 'min_css' ) ) {

		//Load main css file
		wp_register_style( 'vce-style', get_parent_theme_file_uri( 'assets/css/main.css' ), false, VOICE_THEME_VERSION );
		wp_enqueue_style( 'vce-style' );

		//Enqueue font awsm icons
		wp_register_style( 'vce-font-awesome', get_parent_theme_file_uri( 'assets/css/font-awesome.min.css' ), false, VOICE_THEME_VERSION );
		wp_enqueue_style( 'vce-font-awesome' );

		//Enqueue responsive css
		wp_register_style( 'vce-responsive', get_parent_theme_file_uri( 'assets/css/responsive.css' ), array( 'vce-style' ), VOICE_THEME_VERSION );
		wp_enqueue_style( 'vce-responsive' );

	} else {
		wp_register_style( 'vce-style', get_parent_theme_file_uri( 'assets/css/min.css' ), false, VOICE_THEME_VERSION );
		wp_enqueue_style( 'vce-style' );
	}

	//Append dynamic css
	$vce_dynamic_css = vce_generate_dynamic_css();
	wp_add_inline_style( 'vce-style', $vce_dynamic_css );

	//WooCommerce style
	if ( vce_is_woocommerce_active() ) {
		wp_register_style( 'vce-woocommerce', get_parent_theme_file_uri( 'assets/css/vce-woocommerce.css' ), array( 'vce-style' ), VOICE_THEME_VERSION );
		wp_enqueue_style( 'vce-woocommerce' );
	}

	//bbPress style
	if ( vce_is_bbpress_active() ) {
		wp_register_style( 'vce-bbpress', get_parent_theme_file_uri( 'assets/css/vce-bbpress.css' ), array( 'vce-style' ), VOICE_THEME_VERSION );
		wp_enqueue_style( 'vce-bbpress' );
	}


	if ( vce_is_rtl() ) {
		wp_register_style( 'vce-rtl', get_parent_theme_file_uri( 'assets/css/rtl.css' ), array( 'vce-style' ), VOICE_THEME_VERSION );
		wp_enqueue_style( 'vce-rtl' );
	}


	//Do not load font awesome from our shortcodes plugin
	wp_dequeue_style( 'mks_shortcodes_fntawsm_css' );
}


/**
 * Load frontend js files
 *
 * @since  2.9
 */

function vce_load_js() {

	if ( !vce_get_option( 'min_js' ) ) {
		
		wp_enqueue_script( 'vce-picturefill', get_parent_theme_file_uri( 'assets/js/picturefill.js'), array( 'jquery' ), VOICE_THEME_VERSION, true );
		wp_enqueue_script( 'vce-owl-slider', get_parent_theme_file_uri( 'assets/js/owl.carousel.min.js' ), array( 'jquery' ), VOICE_THEME_VERSION, true );
		wp_enqueue_script( 'vce-sticky-kit', get_parent_theme_file_uri( 'assets/js/jquery.sticky-kit.js' ), array( 'jquery' ), VOICE_THEME_VERSION, true );
		wp_enqueue_script( 'vce-match-height', get_parent_theme_file_uri( 'assets/js/jquery.matchHeight.js' ), array( 'jquery' ), VOICE_THEME_VERSION, true );
		wp_enqueue_script( 'vce-fitvid', get_parent_theme_file_uri( 'assets/js/jquery.fitvids.js' ), array( 'jquery' ), VOICE_THEME_VERSION, true );
		wp_enqueue_script( 'vce-responsivenav', get_parent_theme_file_uri( 'assets/js/jquery.sidr.min.js' ), array( 'jquery' ), VOICE_THEME_VERSION, true );
		wp_enqueue_script( 'vce-magnific-popup', get_parent_theme_file_uri( 'assets/js/jquery.magnific-popup.min.js' ), array( 'jquery' ), VOICE_THEME_VERSION, true );
		wp_enqueue_script( 'vce-main', get_parent_theme_file_uri( 'assets/js/main.js' ), array( 'jquery', 'imagesloaded' ), VOICE_THEME_VERSION, true );

	} else {

		wp_enqueue_script( 'vce-main', get_parent_theme_file_uri( 'assets/js/min.js' ), array( 'jquery', 'imagesloaded' ), VOICE_THEME_VERSION, true );
	}

	$vce_js_settings = vce_get_js_settings();
	wp_localize_script( 'vce-main', 'vce_js_settings', $vce_js_settings );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

?>