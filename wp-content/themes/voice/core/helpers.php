<?php

/**
 * Debug (log) function
 *
 * Outputs any content into log file in theme root directory
 *
 * @param mixed   $mixed Content to output
 * @since  1.0
 */

if ( !function_exists( 'vce_log' ) ):
	function vce_log( $mixed ) {

		if ( !function_exists( 'WP_Filesystem' ) || !WP_Filesystem() ) {
			return false;
		}

		if ( is_array( $mixed ) ) {
			$mixed = print_r( $mixed, 1 );
		} else if ( is_object( $mixed ) ) {
				ob_start();
				var_dump( $mixed );
				$mixed = ob_get_clean();
			}

		global $wp_filesystem;
		$existing = $wp_filesystem->get_contents(  get_parent_theme_file_path( 'log' ) );
		$wp_filesystem->put_contents( get_parent_theme_file_path( 'log' ), $existing. $mixed . PHP_EOL );
	}
endif;


/* 	Get theme option function */
if ( !function_exists( 'vce_get_option' ) ):
	function vce_get_option( $option ) {

		global $vce_settings;

		if ( empty( $vce_settings ) ) {
			$vce_settings = get_option( 'vce_settings' );
		}

		if ( !isset( $vce_settings[$option] ) ) {
			$vce_settings[$option] = vce_get_default_option( $option );
		}

		if ( isset( $vce_settings[$option] ) ) {
			return $vce_settings[$option];
		} else {
			return false;
		}

	}
endif;


/* Get Theme Translated String */
if ( !function_exists( '__vce' ) ):
	function __vce( $string_key ) {
		if ( ( $translated_string = vce_get_option( 'tr_'.$string_key ) ) && vce_get_option( 'enable_translate' ) ) {

			if ( $translated_string == '-1' ) {
				return "";
			}

			return $translated_string;

		} else {

			$translate = vce_get_translate_options();
			return $translate[$string_key]['translated'];
		}
	}
endif;

/* 	Merge multidimensional array - similar to wp_parse_args() just a bit extended :) */
if ( !function_exists( 'vce_parse_args' ) ):
	function vce_parse_args( &$a, $b ) {
		$a = (array) $a;
		$b = (array) $b;
		$r = $b;
		foreach ( $a as $k => &$v ) {
			if ( is_array( $v ) && isset( $r[ $k ] ) ) {
				$r[ $k ] = vce_parse_args( $v, $r[ $k ] );
			} else {
				$r[ $k ] = $v;
			}
		}
		return $r;
	}
endif;


/* Get list of image sizes to generate for theme use */
if ( !function_exists( 'vce_get_image_sizes' ) ):
	function vce_get_image_sizes() {
		$sizes = array(
			'vce-lay-a' => array( 'title' => 'Layout A (also layout G, single post and page)', 'w' => 810, 'h' => 9999, 'crop' => false ),
			'vce-lay-a-nosid' => array( 'title' => 'Layout A (full width - no sidebar)', 'w' => 1140, 'h' => 9999, 'crop' => false ),
			'vce-lay-b' => array( 'title' => 'Layout B (also layout C and post gallery thumbnails)', 'w' => 375, 'h' => 195, 'crop' => true ),
			'vce-lay-d' => array( 'title' => 'Layout D (also layout E and post gallery thumbnails)', 'w' => 145, 'h' => 100, 'crop' => true ),
			'vce-fa-full' => array( 'title' => 'Featured area (big - full width)', 'w' => 9999, 'h' => 500, 'crop' => true ),
			'vce-fa-grid' => array( 'title' => 'Layout H and Featured area (5 grid items)', 'w' => 380, 'h' => 260, 'crop' => true ),
			'vce-fa-big-grid' => array( 'title' => 'Featured area (3 grid items)', 'w' => 634, 'h' => 433, 'crop' => true ),
		);

		$sizes = apply_filters( 'vce_modify_image_sizes', $sizes );

		return $sizes;
	}
endif;


/**
 * Get list of font sizes for block editor
 *
 * @return array
 * @since  2.9
 */
if ( !function_exists( 'vce_get_editor_font_sizes' ) ):
	function vce_get_editor_font_sizes( ) {

		$regular = absint( vce_get_option( 'font_size_p' ) );

		$s = ceil($regular  * 0.8);
		$l = ceil($regular * 1.3);
		$xl = ceil($regular * 1.7);

		$s_mobile = ceil(14 * 0.8);
		$l_mobile = ceil(14 * 1.3);
		$xl_mobile = ceil(14 * 1.6);

		$sizes = array( array(
				'name'      => esc_html__( 'Small', 'voice' ),
				'shortName' => esc_html__( 'S', 'voice' ),
				'size'      => $s,
				'size-mobile' => $s_mobile,
				'slug'      => 'small',
			),

			array(
				'name'      => esc_html__( 'Normal', 'voice' ),
				'shortName' => esc_html__( 'M', 'voice' ),
				'size'      => $regular,
				'slug'      => 'normal',
			),

			array(
				'name'      => esc_html__( 'Large', 'voice' ),
				'shortName' => esc_html__( 'L', 'voice' ),
				'size'      => $l,
				'size-mobile' => $l_mobile,
				'slug'      => 'large',
			),
			array(
				'name'      => esc_html__( 'Huge', 'voice' ),
				'shortName' => esc_html__( 'XL', 'voice' ),
				'size'      => $xl,
				'size-mobile' => $xl_mobile,
				'slug'      => 'huge',
			)
		);

		$sizes = apply_filters( 'vce_modify_editor_font_sizes', $sizes );

		return $sizes;

	}
endif;


/**
 * Get list of colors for block editor
 *
 * @return array
 * @since  2.9
 */
if ( !function_exists( 'vce_get_editor_colors' ) ):
	function vce_get_editor_colors( ) {

		
		$colors = array(

			array(
				'name'  => esc_html__( 'Accent', 'voice' ),
				'slug' => 'vce-acc',
				'color' => vce_get_option( 'color_content_acc' ),
			),

			array(
				'name'  => esc_html__( 'Meta', 'voice' ),
				'slug' => 'vce-meta',
				'color' => vce_get_option( 'color_content_meta' ),
			),

			array(
				'name'  => esc_html__( 'Text', 'voice' ),
				'slug' => 'vce-txt',
				'color' => vce_get_option( 'color_content_txt' ),
			),


			array(
				'name'  => esc_html__( 'Background', 'voice' ),
				'slug' => 'vce-bg',
				'color' => vce_get_option( 'color_content_bg' ),
			),

		);

		$cat_colors = get_option( 'vce_cat_colors' );

		if ( !empty( $cat_colors ) ) {
			foreach ( $cat_colors as $id => $color ) {
				$colors[] = array(
					'name'  => esc_html__( 'Category color', 'voice' ),
					'slug' => 'vce-cat-'.$id,
					'color' => $color
				);
			}
		}

		$colors = apply_filters( 'vce_modify_editor_colors', $colors );

		return $colors;

	}
endif;



/* Get current archive layout  */
if ( !function_exists( 'vce_get_archive_layout' ) ):
	function vce_get_archive_layout() {

		$template = vce_detect_template();

		if ( in_array( $template, array( 'search', 'tag', 'author', 'archive', 'posts_page' ) ) ) {

			$layout = vce_get_option( $template.'_layout' );
		}

		if ( empty( $layout ) ) {
			$layout = 'b';
		}

		$layout = apply_filters( 'vce_modify_archive_layout', $layout ); //Allow child themes or plugins to modify
		return $layout;
	}
endif;


/* Get current archive layout  */
if ( !function_exists( 'vce_get_archive_pagination' ) ):
	function vce_get_archive_pagination() {

		$template = vce_detect_template();

		if ( in_array( $template, array( 'search', 'tag', 'author', 'archive', 'posts_page' ) ) ) {

			$pagination = vce_get_option( $template.'_pagination' );
		}

		if ( empty( $pagination ) ) {
			$pagination = 'numeric';
		}

		$pagination = apply_filters( 'vce_modify_archive_pagination', $pagination ); //Allow child themes or plugins to modify
		return $pagination;
	}
endif;


/* Get current archive layout  */
if ( !function_exists( 'vce_get_category_pagination' ) ):
	function vce_get_category_pagination() {

		$pagination = vce_get_option( 'category_pagination' );

		if ( empty( $pagination ) ) {
			$pagination = 'numeric';
		}

		$pagination = apply_filters( 'vce_modify_category_pagination', $pagination ); //Allow child themes or plugins to modify
		return $pagination;
	}
endif;


/* Get current category layout  */
if ( !function_exists( 'vce_get_category_layout' ) ):
	function vce_get_category_layout() {

		$args = array();
		$obj = get_queried_object();
		$meta = vce_get_category_meta( $obj->term_id );
		$args['layout'] = $meta['layout'] == 'inherit' ? vce_get_option( 'category_layout' ) : $meta['layout'];

		$paged = absint( get_query_var( 'paged' ) );

		if ( $paged <= 1 ) {
			if ( $meta['top_layout'] == 'inherit' ) {
				$args['top_layout'] = vce_get_option( 'category_use_top' ) ? vce_get_option( 'category_top_layout' ) : false;
				$args['top_limit'] = vce_get_option( 'category_use_top' ) ? vce_get_option( 'category_top_limit' ) : false;
			} else {
				$args['top_layout'] = $meta['top_layout'];
				$args['top_limit'] = $meta['top_limit'];
			}
		} else {
			$args['top_layout'] = false;
			$args['top_limit'] = false;
		}

		$args = apply_filters( 'vce_modify_category_layout', $args ); //Allow child themes or plugins to modify
		return $args;
	}
endif;



/* Include simple pagination */
if ( !function_exists( 'vce_pagination' ) ):
	function vce_pagination( $prev = '&lsaquo;', $next = '&rsaquo;' ) {
		global $wp_query, $wp_rewrite;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		$pagination = array(
			'base' => @add_query_arg( 'paged', '%#%' ),
			'format' => '',
			'total' => $wp_query->max_num_pages,
			'current' => $current,
			'prev_text' => $prev,
			'next_text' => $next,
			'type' => 'plain'
		);
		if ( $wp_rewrite->using_permalinks() )
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

		if ( !empty( $wp_query->query_vars['s'] ) )
			$pagination['add_args'] = array( 's' => str_replace( ' ', '+', get_query_var( 's' ) ) );

		$links = paginate_links( $pagination );

		if ( $links ) {
			return $links;
		}
	}
endif;


/* Convert hexdec color string to rgba */
if ( !function_exists( 'vce_hex2rgba' ) ):
	function vce_hex2rgba( $color, $opacity = false ) {
		$default = 'rgb(0,0,0)';

		//Return default if no color provided
		if ( empty( $color ) )
			return $default;

		//Sanitize $color if "#" is provided
		if ( $color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		//Check if color has 6 or 3 characters and get values
		if ( strlen( $color ) == 6 ) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		//Convert hexadec to rgb
		$rgb =  array_map( 'hexdec', $hex );

		//Check if opacity is set(rgba or rgb)
		if ( $opacity ) {
			if ( abs( $opacity ) > 1 ) { $opacity = 1.0; }
			$output = 'rgba('.implode( ",", $rgb ).','.$opacity.')';
		} else {
			$output = 'rgb('.implode( ",", $rgb ).')';
		}

		//Return rgb(a) color string
		return $output;
	}
endif;


/* Get array of social options  */
if ( !function_exists( 'vce_get_social' ) ) :
	function vce_get_social( $existing = false ) {
		$social = array(
			'0' => 'None',
			'apple' => 'Apple',
			'behance' => 'Behance',
			'delicious' => 'Delicious',
			'deviantart' => 'DeviantArt',
			'digg' => 'Digg',
			'dribbble' => 'Dribbble',
			'facebook' => 'Facebook',
			'flickr' => 'Flickr',
			'github' => 'Github',
			'google' => 'GooglePlus',
			'instagram' => 'Instagram',
			'linkedin' => 'LinkedIN',
			'pinterest' => 'Pinterest',
			'reddit' => 'ReddIT',
			'rss' => 'Rss',
			'skype' => 'Skype',
			'stumbleupon' => 'StumbleUpon',
			'soundcloud' => 'SoundCloud',
			'spotify' => 'Spotify',
			'tumblr' => 'Tumblr',
			'twitter' => 'Twitter',
			'vimeo' => 'Vimeo',
			'vine' => 'Vine',
			'wordpress' => 'WordPress',
			'xing' => 'Xing' ,
			'yahoo' => 'Yahoo',
			'youtube' => 'Youtube'
		);

		if ( $existing ) {
			$new_social = array();
			foreach ( $social as $key => $soc ) {
				if ( $key && vce_get_option( 'soc_'.$key.'_url' ) ) {
					$new_social[$key] = $soc;
				}
			}
			$social = $new_social;
		}

		$social = apply_filters( 'vce_modify_social', $social );
		return $social;
	}
endif;




/* Get All Translation Strings */
if ( !function_exists( 'vce_get_translate_options' ) ):
	function vce_get_translate_options() {
		global $vce_translate;
		get_template_part( 'core/translate' );
		$translate = apply_filters( 'vce_modify_translate_options', $vce_translate );
		return $translate;
	}
endif;


/* Compress CSS Code  */
if ( !function_exists( 'vce_compress_css_code' ) ) :
	function vce_compress_css_code( $code ) {

		// Remove Comments
		$code = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $code );

		// Remove tabs, spaces, newlines, etc.
		$code = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $code );

		return $code;
	}
endif;


/* Get image option url */
if ( !function_exists( 'vce_get_option_media' ) ):
	function vce_get_option_media( $option ) {
		$media = vce_get_option( $option );
		if ( isset( $media['url'] ) && !empty( $media['url'] ) ) {
			return $media['url'];
		}
		return false;
	}
endif;


/* Generate font links */
if ( !function_exists( 'vce_generate_font_links' ) ):
	function vce_generate_font_links() {
		$fonts    = array();
		$fonts[]  = vce_get_option( 'main_font' );
		$fonts[]  = vce_get_option( 'h_font' );
		$fonts[]  = vce_get_option( 'nav_font' );
		$unique   = array(); // do not add same font links
		$link     = array();
		$native   = vce_get_native_fonts();
		$protocol = is_ssl() ? 'https://' : 'http://';

		//print_r($fonts);

		foreach ( $fonts as $br => $font ) {

			if ( in_array( $font['font-family'], $native ) ) {
				continue;
			}

			if ( empty( $font['font-weight'] ) ) {
				$font['font-weight'] = '400';
			}



			$unique[ $font['font-family'] ]['instance'][$br]['wght'] = $font['font-weight'];

			if ( isset($font['font-style']) && $font['font-style'] == 'italic' ) {
				$unique[ $font['font-family'] ]['instance'][$br]['ital'] = 1;
				$unique[ $font['font-family'] ]['italic'] = true; 
			} else {
				$unique[ $font['font-family'] ]['instance'][$br]['ital'] = 0;
			}

			if( $br > 0 && count($unique[ $font['font-family'] ]['instance']) > 1 ){

				if ( $unique[ $font['font-family'] ]['instance'][$br]['ital'] == $unique[ $font['font-family'] ]['instance'][($br-1)]['ital'] && $unique[ $font['font-family'] ]['instance'][$br]['wght'] == $unique[ $font['font-family'] ]['instance'][($br-1)]['wght'] ){
					unset( $unique[ $font['font-family'] ]['instance'][$br] );
				}
			}
					
		}

		//print_r($unique);

		foreach ( $unique as $family => $data ) {

			$ital = '';
			$weights = array(); 
			$wght = 'wght@';


			if(isset($data['italic']) && $data['italic']){
				$ital.= 'ital,';
			}

			foreach ( $data['instance'] as $item ) {
				if( empty($ital) ){
					$weights[] = $item['wght'];
				} else {
					$weights[] = $item['ital'].','.$item['wght'];

				}
			}

			sort( $weights );
			
			$wght .= implode( ';', $weights );

			$link[] = 'family=' . $family . ':' . $ital . $wght; 
			
		}

		//print_r($link);

		if ( !empty( $link ) ) {

			$fonts_url = $protocol . 'fonts.googleapis.com/css2';

			foreach($link as $i => $item ){

				if($i){
					$fonts_url .= '&'.$item;
				} else {
					$fonts_url .= '?'.$item;
				}
			}

			return esc_url_raw( $fonts_url );
		}

		return '';


		
		
	}
endif;

/* Generate dynamic CSS */
if ( !function_exists( 'vce_generate_dynamic_css' ) ):
	function vce_generate_dynamic_css() {
		ob_start();
		get_template_part( 'assets/css/dynamic-css' );
		$output = ob_get_contents();
		ob_end_clean();
		return vce_compress_css_code( $output );
	}
endif;



/* Get list of native fonts */
if ( !function_exists( 'vce_get_native_fonts' ) ):
	function vce_get_native_fonts() {

		$fonts = array(
			"Arial, Helvetica, sans-serif",
			"'Arial Black', Gadget, sans-serif",
			"'Bookman Old Style', serif",
			"'Comic Sans MS', cursive",
			"Courier, monospace",
			"Garamond, serif",
			"Georgia, serif",
			"Impact, Charcoal, sans-serif",
			"'Lucida Console', Monaco, monospace",
			"'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
			"'MS Sans Serif', Geneva, sans-serif",
			"'MS Serif', 'New York', sans-serif",
			"'Palatino Linotype', 'Book Antiqua', Palatino, serif",
			"Tahoma,Geneva, sans-serif",
			"'Times New Roman', Times,serif",
			"'Trebuchet MS', Helvetica, sans-serif",
			"Verdana, Geneva, sans-serif"
		);

		return $fonts;
	}
endif;


/* Add class to category links */
if ( !function_exists( 'vce_get_category' ) ):
	function vce_get_category() {
		$output = '';
		$cats = array();

		$primary_category = vce_get_primary_category();

		if ( !empty( $primary_category ) ) {
			$cats[0] = $primary_category;
		}

		if ( empty( $cats ) ) {
			$cats = get_the_category();
		}

		if ( empty( $cats ) ) {
			return $output;
		}

		foreach ( $cats as $k => $cat ) {
			$output.= '<a href="'.get_category_link( $cat->term_id ).'" class="category-'.esc_attr( $cat->term_id ).'">'.$cat->name.'</a>';
			if ( ( $k + 1 ) != count( $cats ) ) {
				$output.= ' <span>&bull;</span> ';
			}
		}

		return $output;

	}
endif;


/* Custom function to limit post content words */
if ( !function_exists( 'vce_get_excerpt' ) ):
	function vce_get_excerpt( $layout = 'lay-a' ) {

		$map = array(
			'lay-a' => 'lay_a',
			'lay-b' => 'lay_b',
			'lay-c' => 'lay_c',
			'lay-g' => 'lay_g',
			'lay-h' => 'lay_h',
			'lay-fa-big' => 'lay_fa_big',
		);

		if ( !array_key_exists( $layout, $map ) ) {
			return '';
		}

		$manual_excerpt = false;

		if ( has_excerpt() ) {
			$content =  get_the_excerpt();
			$manual_excerpt = true;
		} else {
			//$content = apply_filters('the_content',get_the_content(''));
			$text = get_the_content( '' );
			$text = strip_shortcodes( $text );
			$text = apply_filters( 'the_content', $text );
			$content = str_replace( ']]>', ']]&gt;', $text );
		}

		//print_r($content);


		if ( !empty( $content ) ) {
			$limit = vce_get_option( $map[$layout].'_excerpt_limit' );
			if ( !empty( $limit ) || !$manual_excerpt ) {
				$more = vce_get_option( 'more_string' );
				$content = wp_strip_all_tags( $content );
				$content = preg_replace( '/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i', '', $content );
				$content = vce_trim_chars( $content, $limit, $more );
			}
			return $content;
		}

		return '';

	}
endif;


/* Custom function to limit post title chars for specific layout */
if ( !function_exists( 'vce_get_title' ) ):
	function vce_get_title( $layout = 'lay-a' ) {

		$map = array(
			'lay-a' => 'lay_a',
			'lay-b' => 'lay_b',
			'lay-c' => 'lay_c',
			'lay-d' => 'lay_d',
			'lay-e' => 'lay_e',
			'lay-f' => 'lay_f',
			'lay-h' => 'lay_h',
			'lay-fa-grid' => 'lay_fa_grid',
			'lay-fa-grid-big' => 'lay_fa_grid_big',
		);

		if ( !array_key_exists( $layout, $map ) ) {
			return get_the_title();
		}


		$title_limit = vce_get_option( $map[$layout].'_title_limit' );


		if ( !empty( $title_limit ) ) {
			$output = vce_trim_chars( strip_tags( get_the_title() ), $title_limit, vce_get_option( 'more_string' ) );
		} else {
			$output = get_the_title();
		}


		return $output;

	}
endif;


/* Trim chars of string */
if ( !function_exists( 'vce_trim_chars' ) ):
	function vce_trim_chars( $string, $limit, $more = '...' ) {

		if ( !empty( $limit ) ) {
			$text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $string ), ' ' );
			preg_match_all( '/./u', $text, $chars );
			$chars = $chars[0];
			$count = count( $chars );
			if ( $count > $limit ) {

				$chars = array_slice( $chars, 0, $limit );

				for ( $i = ( $limit -1 ); $i >= 0; $i-- ) {
					if ( in_array( $chars[$i], array( '.', ' ', '-', '?', '!' ) ) ) {
						break;
					}
				}

				$chars =  array_slice( $chars, 0, $i );
				$string = implode( '', $chars );
				$string = rtrim( $string, ".,-?!" );
				$string.= $more;
			}
		}

		return $string;
	}
endif;


/* Custom function to get meta data for specific layout */
if ( !function_exists( 'vce_get_meta_data' ) ):
	function vce_get_meta_data( $layout = 'lay-a', $force_meta = false ) {
		
		if ( !$force_meta ) {
			$map = array(
				'lay-a' => 'lay_a',
				'lay-b' => 'lay_b',
				'lay-c' => 'lay_c',
				'lay-d' => 'lay_d',
				'lay-e' => 'lay_e',
				'lay-g' => 'lay_g',
				'lay-h' => 'lay_h',
				'lay-fa-grid' => 'lay_fa_grid',
				'lay-fa-grid-big' => 'lay_fa_grid_big',
				'lay-fa-big' => 'lay_fa_big',
				'single' => 'single',
			);
			//Layouts theme options
			$layout_metas = array_filter( vce_get_option( $map[$layout].'_meta' ) );

		} else {
			//From widget or anywhere you want
			$layout_metas = array( $force_meta => '1' );
		}

		$output = '';

		if ( !empty( $layout_metas ) ) {

			foreach ( $layout_metas as $mkey => $active ) {


				$meta = '';

				switch ( $mkey ) {

				case 'date':
					$meta = '<span class="updated">'.vce_get_date().'</span>';
					break;

				case 'modified_date':
					$meta = '<span class="updated">'.vce_get_modified_date().'</span>';
					break;

				case 'author':
					if ( voice_is_co_authors_active() && $coauthors_meta = get_coauthors() ) {
						$temp = '';
						foreach ( $coauthors_meta as $i => $key ) {
							$separator = $i != ( count( $coauthors_meta ) - 1 ) ? ', ' : '';
							$temp .= '<span class="vcard author">
										<span class="fn">
											<a href="'.get_author_posts_url(  $key->ID, $key->user_nicename ).'">'.$key->display_name.'</a>'. $separator .'
										</span>
									</span>';
						}
						$meta = '<span>' . __vce( 'by_author' ) . '' .  $temp . '</span>';

					} else {
						$post_author_id = get_post_field( 'post_author', get_the_ID() );
						$meta = '<span class="vcard author"><span class="fn">'.__vce( 'by_author' ).' <a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) ) ).'">'.get_the_author_meta( 'display_name', $post_author_id ).'</a></span></span>';
					}
					break;

				case 'comments':
					if ( comments_open() || get_comments_number() ) {
						ob_start();
						comments_popup_link( __vce( 'no_comments' ), __vce( 'one_comment' ), __vce( 'multiple_comments' ) );
						$meta = ob_get_contents();
						ob_end_clean();
					} else {
						$meta = '';
					}
					break;

				case 'views':
					global $wp_locale;
					$thousands_sep = isset( $wp_locale->number_format['thousands_sep'] ) ? $wp_locale->number_format['thousands_sep'] : ',';
					if ( strlen( $thousands_sep ) > 1 ) {
						$thousands_sep = trim( $thousands_sep );
					}
					$meta = function_exists( 'ev_get_post_view_count' ) ?  number_format_i18n( absint( str_replace( $thousands_sep, '', ev_get_post_view_count( get_the_ID() ) ) + absint( vce_get_option( 'views_forgery' ) ) ) )  . ' '.__vce( 'views' ) : '';
					break;

				case 'rtime':
					$meta = vce_read_time( get_the_content() );
					if ( !empty( $meta ) ) {
						$meta .= ' '.__vce( 'min_read' );
					}
					break;

				case 'reviews':
					$meta = '';
					if ( vce_is_wp_review_active() ) {
						$meta = function_exists( 'wp_review_show_total' ) ? wp_review_show_total( false, '' ) : '';
					}
					break;

				default:
					break;
				}

				if ( !empty( $meta ) ) {
					$output .= '<div class="meta-item '.$mkey.'">'.$meta.'</div>';
				}
			}
		}


		return $output;

	}
endif;


/* Display featured image, and more :) */
if ( !function_exists( 'vce_featured_image' ) ):
	function vce_featured_image( $size = 'large', $post_id = false ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		if ( has_post_thumbnail( $post_id ) ) {
			return get_the_post_thumbnail( $post_id, $size );

		} else if ( $placeholder = vce_get_option_media( 'default_fimg' ) ) {

				global $placeholder_img, $placeholder_imgs;

				if ( empty( $placeholder_img ) ) {
					$img_id = vce_get_image_id_by_url( $placeholder );
				} else {
					$img_id = $placeholder_img;
				}

				if ( !empty( $img_id ) ) {
					if ( !isset( $placeholder_imgs[$size] ) ) {
						$def_img = wp_get_attachment_image( $img_id, $size );
					} else {
						$def_img = $placeholder_imgs[$size];
					}

					if ( !empty( $def_img ) ) {
						$placeholder_imgs[$size] = $def_img;
						return $def_img;
					}
				}

				return '<img src="'.$placeholder.'" />';
			}

		return false;
	}
endif;


/* Get image id by url */
if ( !function_exists( 'vce_get_image_id_by_url' ) ):
	function vce_get_image_id_by_url( $image_url ) {
		global $wpdb;

		$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) );

		if ( isset( $attachment[0] ) ) {
			return $attachment[0];
		}

		return false;
	}
endif;


/* Check wheter to display date in standard or "time ago" format */
if ( !function_exists( 'vce_get_date' ) ):
	function vce_get_date() {

		if ( vce_get_option( 'time_ago' ) ) {

			$limits = array(
				'hour' => 3600,
				'day' => 86400,
				'week' => 604800,
				'month' => 2592000,
				'three_months' => 7776000,
				'six_months' => 15552000,
				'year' => 31104000,
				'0' => 0
			);

			$ago_limit = vce_get_option( 'time_ago_limit' );

			if ( array_key_exists( $ago_limit, $limits ) ) {

				if ( ( current_time( 'timestamp' ) - get_the_time( 'U' ) <= $limits[$ago_limit] ) || empty( $ago_limit ) ) {
					if ( vce_get_option( 'ago_before' ) ) {
						return __vce( 'ago' ).' '.human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
					} else {
						return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__vce( 'ago' );
					}
				} else {
					return get_the_date();
				}
			} else {
				return get_the_date();
			}
		} else {
			return get_the_date();
		}
	}
endif;


/* Check wheter to display modified date in standard or "time ago" format */
if ( !function_exists( 'vce_get_modified_date' ) ):
	function vce_get_modified_date() {

		if ( vce_get_option( 'time_ago' ) ) {

			$limits = array(
				'hour' => 3600,
				'day' => 86400,
				'week' => 604800,
				'month' => 2592000,
				'three_months' => 7776000,
				'six_months' => 15552000,
				'year' => 31104000,
				'0' => 0
			);

			$ago_limit = vce_get_option( 'time_ago_limit' );

			if ( array_key_exists( $ago_limit, $limits ) ) {

				if ( ( current_time( 'timestamp' ) - get_the_modified_time( 'U' ) <= $limits[$ago_limit] ) || empty( $ago_limit ) ) {
					if ( vce_get_option( 'ago_before' ) ) {
						return __vce( 'ago' ).' '.human_time_diff( get_the_modified_time( 'U' ), current_time( 'timestamp' ) );
					} else {
						return human_time_diff( get_the_modified_time( 'U' ), current_time( 'timestamp' ) ).' '.__vce( 'ago' );
					}
				} else {
					return get_the_modified_date();
				}
			} else {
				return get_the_modified_date();
			}
		} else {
			return get_the_modified_date();
		}
	}
endif;


/* Get post meta with default values */
if ( !function_exists( 'vce_get_post_meta' ) ):
	function vce_get_post_meta( $post_id, $field = false ) {

		$defaults = array(
			'layout' => 'inherit',
			'use_sidebar' => 'inherit',
			'sidebar' => 'inherit',
			'sticky_sidebar' => 'inherit',
			'display' => array(
				'show_cat' => 'inherit',
				'show_fimg' => 'inherit',
				'show_author_img' => 'inherit',
				'show_headline' => 'inherit',
				'show_tags' => 'inherit',
				'show_prev_next' => 'inherit',
				'show_author_box' => 'inherit',
				'show_related' => 'inherit',
			)
		);

		$meta = get_post_meta( $post_id, '_vce_meta', true );
		$meta = vce_parse_args( $meta, $defaults );


		if ( $field ) {
			if ( isset( $meta[$field] ) ) {
				return $meta[$field];
			} else {
				return false;
			}
		}

		return $meta;
	}
endif;

/* Get display options for single post */
if ( !function_exists( 'vce_get_post_display' ) ):
	function vce_get_post_display( $field ) {
		$post_id = get_the_ID();
		$meta = vce_get_post_meta( $post_id, 'display' );
		if ( $meta[$field] == 'inherit' ) {
			return vce_get_option( $field );
		} else {
			return $meta[$field] == 'on' ? true: false;
		}
	}
endif;


/* Check if we're using Cover Featured image */
if ( !function_exists( 'vce_use_cover_fimg' ) ) :

	function vce_use_cover_fimg() {

		$post_id = get_the_ID();
		$meta = is_single() ? vce_get_post_meta( $post_id, 'layout' ) : vce_get_page_meta( $post_id, 'layout' );

		if ( $meta == 'inherit' ) {
			$layout = is_single() ? vce_get_option( 'single_layout' ) :  vce_get_option( 'page_layout' );
			return ( $layout == 'classic' ) ? false : true;
		} else {
			return ( $meta == 'classic' ) ? false : true;
		}
	}

endif;



/* Get page meta with default values */
if ( !function_exists( 'vce_get_page_meta' ) ):
	function vce_get_page_meta( $post_id, $field = false ) {

		$defaults = array(
			'use_sidebar' => 'inherit',
			'sidebar' => 'inherit',
			'sticky_sidebar' => 'inherit',
			'layout' => 'inherit',
			'fa_post_type' => 'post',
			'fa_layout' => 0,
			'fa_limit' => 8,
			'fa_time' => 0,
			'fa_order' => 'date',
			'fa_sort' => 'DESC',
			'fa_manual' => array(),
			'fa_exclude' => 0,
			'fa_author' => array(),
			'fa_author_inc_exc' => 'in',
			'fa_exclude_by_id' => array(),
			'modules' => array(),
			'authors' => array( 'orderby' => 'post_count', 'order' => 'DESC', 'exclude' => '' ),
			'display_content' => array( 'position' => 0, 'style' => 'wrap', 'width' => 'container' ),
		);

		$meta = get_post_meta( $post_id, '_vce_meta', true );
		$meta = vce_parse_args( $meta, $defaults );

		if ( $field ) {
			if ( isset( $meta[$field] ) ) {
				return $meta[$field];
			} else {
				return false;
			}
		}

		return $meta;
	}
endif;


/* Get category meta with default values */
if ( !function_exists( 'vce_get_category_meta' ) ):
	function vce_get_category_meta( $cat_id = false, $field = false ) {
		$defaults = array(
			'layout' => 'inherit',
			'top_layout' => 'inherit',
			'top_limit' => vce_get_option( 'category_top_limit' ),
			'fa_layout' => 'inherit',
			'fa_limit' => vce_get_option( 'category_fa_limit' ),
			'use_sidebar' => 'inherit',
			'sidebar' => 'inherit',
			'sticky_sidebar' => 'inherit',
			'color_type' => 'inherit',
			'color' => '#000000',
			'ppp' => '',
			'image' => ''
		);

		if ( $cat_id ) {
			$meta = get_option( '_vce_category_'.$cat_id );
			$meta = wp_parse_args( (array) $meta, $defaults );
		} else {
			$meta = $defaults;
		}

		if ( $field ) {
			if ( isset( $meta[$field] ) ) {
				return $meta[$field];
			} else {
				return false;
			}
		}

		return $meta;
	}
endif;

/* Detect WordPress template */
if ( !function_exists( 'vce_detect_template' ) ):
	function vce_detect_template() {
		$template = '';
		if ( is_single() ) {

			$type = get_post_type( get_the_ID() );

			if ( $type == 'product' ) {
				$template = 'product';
			} else if ( $type == 'forum' ) {
					$template = 'forum';
				} else if ( $type == 'topic' ) {
					$template = 'topic';
				} else {
				$template = 'single';
			}

		} else if ( is_page_template( 'template-modules.php' ) && is_page() ) {
				$template = 'home_page';
			} else if ( is_page() ) {
				$template = 'page';
			} else if ( is_category() ) {
				$template = 'category';
			} else if ( is_tag() ) {
				$template = 'tag';
			} else if ( is_search() ) {
				$template = 'search';
			} else if ( is_author() ) {
				$template = 'author';
			} else if ( is_home() && ( $posts_page = get_option( 'page_for_posts' ) ) && !is_page_template( 'template-modules.php' ) ) {
				$template = 'posts_page';
			} else if ( is_tax( 'product_cat' ) || is_post_type_archive( 'product' ) ) {
				$template = 'product_cat';
			} else {
			$template = 'archive';
		}


		return $template;
	}
endif;


/* Get current sidebar options */
if ( !function_exists( 'vce_get_current_sidebar' ) ):
	function vce_get_current_sidebar() {

		/* Default */
		$use_sidebar = 'none';
		$sidebar = 'vce_default_sidebar';
		$sticky_sidebar = 'vce_default_sticky_sidebar';

		$vce_template = vce_detect_template();

		if ( in_array( $vce_template, array( 'search', 'tag', 'author', 'archive', 'product', 'product_cat', 'forum', 'topic' ) ) ) {

			$use_sidebar = vce_get_option( $vce_template.'_use_sidebar' );


			if ( $use_sidebar != 'none' ) {
				$sidebar = vce_get_option( $vce_template.'_sidebar' );
				$sticky_sidebar = vce_get_option( $vce_template.'_sticky_sidebar' );
			}

		} else if ( $vce_template == 'category' ) {
				$obj = get_queried_object();
				if ( isset( $obj->term_id ) ) {
					$meta = vce_get_category_meta( $obj->term_id );
				}

				if ( $meta['use_sidebar'] != 'none' ) {
					$use_sidebar = ( $meta['use_sidebar'] == 'inherit' ) ? vce_get_option( $vce_template.'_use_sidebar' ) : $meta['use_sidebar'];
					if ( $use_sidebar ) {
						$sidebar = ( $meta['sidebar'] == 'inherit' ) ?  vce_get_option( $vce_template.'_sidebar' ) : $meta['sidebar'];
						$sticky_sidebar = ( $meta['sticky_sidebar'] == 'inherit' ) ?  vce_get_option( $vce_template.'_sticky_sidebar' ) : $meta['sticky_sidebar'];
					}
				}

			} else if ( $vce_template == 'single' ) {

				$meta = vce_get_post_meta( get_the_ID() );
				$use_sidebar = ( $meta['use_sidebar'] == 'inherit' ) ? vce_get_option( $vce_template.'_use_sidebar' ) : $meta['use_sidebar'];
				if ( $use_sidebar != 'none' ) {
					$sidebar = ( $meta['sidebar'] == 'inherit' ) ?  vce_get_option( $vce_template.'_sidebar' ) : $meta['sidebar'];
					$sticky_sidebar = ( $meta['sticky_sidebar'] == 'inherit' ) ?  vce_get_option( $vce_template.'_sticky_sidebar' ) : $meta['sticky_sidebar'];
				}

			} else if ( in_array( $vce_template, array( 'home_page', 'page', 'posts_page' ) ) ) {
				if ( $vce_template == 'posts_page' ) {
					$meta = vce_get_page_meta( get_option( 'page_for_posts' ) );
				} else {
					$meta = vce_get_page_meta( get_the_ID() );
				}


				$use_sidebar = ( $meta['use_sidebar'] == 'inherit' ) ? vce_get_option( 'page_use_sidebar' ) : $meta['use_sidebar'];
				if ( $use_sidebar != 'none' ) {
					$sidebar = ( $meta['sidebar'] == 'inherit' ) ?  vce_get_option( 'page_sidebar' ) : $meta['sidebar'];
					$sticky_sidebar = ( $meta['sticky_sidebar'] == 'inherit' ) ?  vce_get_option( 'page_sticky_sidebar' ) : $meta['sticky_sidebar'];
				}

			}

		$args = array(
			'use_sidebar' => $use_sidebar,
			'sidebar' => $sidebar,
			'sticky_sidebar' => $sticky_sidebar
		);


		return $args;
	}
endif;


/* Get post format icon */
if ( !function_exists( 'vce_post_format_icon' ) ):
	function vce_post_format_icon( $layout = '' ) {

		if ( vce_get_option( $layout.'_icon' ) ) {
			$format = get_post_format();

			$icons = array(
				'video' => 'fa-play',
				'audio' => 'fa-music',
				'image' => 'fa-camera',
				'gallery' => 'fa-picture-o'
			);

			//Allow plugins or child themes to modify icons
			$icons = apply_filters( 'vce_post_format_icons', $icons );

			if ( $format && array_key_exists( $format, $icons ) ) {
				return $icons[$format];
			}
		}

		return false;
	}
endif;


/* Get related posts for particular post */
if ( !function_exists( 'vce_get_related_posts' ) ):
	function vce_get_related_posts( $post_id = false ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_id();
		}

		$args['post_type'] = 'post';

		//Exclude current post form query
		$args['post__not_in'] = array( $post_id );

		//If previuos next posts active exclude them too
		if ( vce_get_option( 'show_prev_next' ) ) {
			$in_same_cat = vce_get_option( 'prev_next_cat' ) ? true : false;
			$prev = get_previous_post( $in_same_cat );

			if ( !empty( $prev ) ) {
				$args['post__not_in'][] = $prev->ID;
			}
			$next = get_next_post( $in_same_cat );
			if ( !empty( $next ) ) {
				$args['post__not_in'][] = $next->ID;
			}
		}

		$num_posts = absint( vce_get_option( 'related_limit' ) );
		if ( $num_posts > 100 ) {
			$num_posts = 100;
		}
		$args['posts_per_page'] = $num_posts;
		$args['orderby'] = vce_get_option( 'related_order' );

		if ( $args['orderby'] == 'views' && function_exists( 'ev_get_meta_key' ) ) {

			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = ev_get_meta_key();

		} else if ( strpos( $args['orderby'], 'reviews' ) !== false && vce_is_wp_review_active() ) {

				if ( strpos( $args['orderby'], 'user' ) !== false ) {

					$review_type = substr( $args['orderby'], 13, strlen( $args['orderby'] ) );

					$args['orderby'] = 'meta_value_num';
					$args['meta_key'] = 'wp_review_user_reviews';

					$args['meta_query'] = array(
						array(
							'key'     => 'wp_review_user_review_type',
							'value'   => $review_type,
						)
					);

				} else {

					$review_type = substr( $args['orderby'], 8, strlen( $args['orderby'] ) );

					$args['orderby'] = 'meta_value_num';
					$args['meta_key'] = 'wp_review_total';

					$args['meta_query'] = array(
						array(
							'key'     => 'wp_review_type',
							'value'   => $review_type,
						)
					);
				}

			}

		if ( $args['orderby'] == 'comments_number' ) {
			$args['orderby'] = 'comment_count';
		}

		if ( $args['orderby'] == 'title' ) {
			$args['order'] = 'ASC';
		}

		if ( $time_diff = vce_get_option( 'related_time' ) ) {
			$args['date_query'] = array( 'after' => date( 'Y-m-d', vce_calculate_time_diff( $time_diff ) ) );
		}

		if ( $type = vce_get_option( 'related_type' ) ) {
			switch ( $type ) {

			case 'cat':
				$cats = get_the_category( $post_id );
				$cat_args = array();
				if ( !empty( $cats ) ) {
					foreach ( $cats as $k => $cat ) {
						$cat_args[] = $cat->term_id;
					}
				}
				$args['category__in'] = $cat_args;
				break;

			case 'tag':
				$tags = get_the_tags( $post_id );
				$tag_args = array();
				if ( !empty( $tags ) ) {
					foreach ( $tags as $tag ) {
						$tag_args[] = $tag->term_id;
					}
				}
				$args['tag__in'] = $tag_args;
				break;

			case 'cat_and_tag':
				$cats = get_the_category( $post_id );
				$cat_args = array();
				if ( !empty( $cats ) ) {
					foreach ( $cats as $k => $cat ) {
						$cat_args[] = $cat->term_id;
					}
				}
				$tags = get_the_tags( $post_id );
				$tag_args = array();
				if ( !empty( $tags ) ) {
					foreach ( $tags as $tag ) {
						$tag_args[] = $tag->term_id;
					}
				}
				$args['tax_query'] = array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'category',
						'field'    => 'id',
						'terms'    => $cat_args,
					),
					array(
						'taxonomy' => 'post_tag',
						'field'    => 'id',
						'terms'    => $tag_args,
					)
				);
				break;

			case 'cat_or_tag':
				$cats = get_the_category( $post_id );
				$cat_args = array();
				if ( !empty( $cats ) ) {
					foreach ( $cats as $k => $cat ) {
						$cat_args[] = $cat->term_id;
					}
				}
				$tags = get_the_tags( $post_id );
				$tag_args = array();
				if ( !empty( $tags ) ) {
					foreach ( $tags as $tag ) {
						$tag_args[] = $tag->term_id;
					}
				}
				$args['tax_query'] = array(
					'relation' => 'OR',
					array(
						'taxonomy' => 'category',
						'field'    => 'id',
						'terms'    => $cat_args,
					),
					array(
						'taxonomy' => 'post_tag',
						'field'    => 'id',
						'terms'    => $tag_args,
					)
				);
				break;

			case 'author':
				global $post;
				$author_id = isset( $post->post_author ) ? $post->post_author : 0;
				$args['author'] = $author_id;
				break;

			case 'default':
				break;
			}
		}

		$args = apply_filters( 'vce_modify_related_posts_query_args', $args );

		$related_query = new WP_Query( $args );

		return $related_query;
	}
endif;


/* Get featured area posts and arguments */
if ( !function_exists( 'vce_get_fa_args' ) ) :
	function vce_get_fa_args() {

		if ( is_category() ) {

			global $vce_cat_fa_args;
			return $vce_cat_fa_args;

		} else if ( is_page_template( 'template-modules.php' ) ) {

				return vce_get_fa_home_args();
			}
	}
endif;

/* Get featured area posts and arguments for modules page */
if ( !function_exists( 'vce_get_fa_home_args' ) ) :
	function vce_get_fa_home_args() {

		$args = array( 'use_fa' => false );

		//Check home page featured area options
		$obj = get_queried_object();
		$meta = vce_get_page_meta( $obj->ID );
		$fa_layout = $meta['fa_layout'];

		if ( $fa_layout ) {

			$q_args['post_type'] = $meta['fa_post_type'];
			$post_type_with_taxonomies = vce_get_post_type_with_taxonomies( $meta['fa_post_type'] );
			$q_args['ignore_sticky_posts'] = 1;

			if ( !empty( $meta['fa_manual'] ) ) {
				$q_args['posts_per_page'] = absint( count( $meta['fa_manual'] ) );
				$q_args['orderby'] =  'post__in';
				$q_args['post__in'] =  $meta['fa_manual'];
				$q_args['post_type'] = array_keys( get_post_types( array( 'public' => true ) ) ); //support all existing public post types

			} else {
				$num_posts = absint( $meta['fa_limit'] );
				$q_args['posts_per_page'] = $num_posts;
				$q_args['orderby'] = $meta['fa_order'];

				if ( !empty( $meta['fa_exclude_by_id'] ) ) {
					$q_args['post__not_in'] = $meta['fa_exclude_by_id'];
				}

				if ( $q_args['orderby'] == 'views' && function_exists( 'ev_get_meta_key' ) ) {

					$q_args['orderby'] = 'meta_value_num';
					$q_args['meta_key'] = ev_get_meta_key();

				} else if ( strpos( $q_args['orderby'], 'reviews' ) !== false && vce_is_wp_review_active() ) {

						if ( strpos( $q_args['orderby'], 'user' ) !== false ) {

							$review_type = substr( $q_args['orderby'], 13, strlen( $q_args['orderby'] ) );

							$q_args['orderby'] = 'meta_value_num';
							$q_args['meta_key'] = 'wp_review_user_reviews';

							$q_args['meta_query'] = array(
								array(
									'key'     => 'wp_review_user_review_type',
									'value'   => $review_type,
								)
							);

						} else {

							$review_type = substr( $q_args['orderby'], 8, strlen( $q_args['orderby'] ) );

							$q_args['orderby'] = 'meta_value_num';
							$q_args['meta_key'] = 'wp_review_total';

							$q_args['meta_query'] = array(
								array(
									'key'     => 'wp_review_type',
									'value'   => $review_type,
								)
							);
						}

					}

				if ( $q_args['orderby'] == 'comments_number' ) {
					$q_args['orderby'] = 'comment_count';
				}

				$q_args['order'] = $meta['fa_sort'];

				if ( $meta['fa_time'] ) {
					$q_args['date_query'] = array( 'after' => date( 'Y-m-d', vce_calculate_time_diff( $meta['fa_time'] ) ) );
				}

				if ( !empty( $post_type_with_taxonomies->taxonomies ) ) {
					foreach ( $post_type_with_taxonomies->taxonomies as $taxonomy ) {
						$taxonomy_id = vce_patch_taxonomy_id( $taxonomy['id'] );

						if ( empty( $meta['fa_'. $taxonomy_id . '_inc_exc'] ) || empty( $meta['fa_'. $taxonomy_id] ) ) {
							continue;
						}

						$operator = $meta['fa_'. $taxonomy_id . '_inc_exc'] === 'not_in' ? 'NOT IN' : 'IN';

						if ( $taxonomy['hierarchical'] ) {

							$q_args['tax_query'][] = array(
								'taxonomy' => $taxonomy['id'],
								'field'    => 'id',
								'terms'    => $meta['fa_' . $taxonomy_id],
								'operator' => $operator,
								'include_children' => boolval( $meta['fa_' . $taxonomy_id . '_child'] )
							);
						}else {
							$q_args['tax_query'][] = array(
								'taxonomy' => $taxonomy['id'],
								'field'    => 'id',
								'terms'    => vce_get_tax_term_id_by_slug( explode( ',', $meta['fa_'. $taxonomy_id] ), $taxonomy['id'] ),
								'operator' => $operator
							);
						}
					}
				}

				if ( !empty( $meta['fa_author'] ) ) {
					$q_args['author__'.$meta['fa_author_inc_exc']] = $meta['fa_author'];
				}

			}

			$q_args = apply_filters( 'vce_modify_fa_query_args', $q_args );

			$args['fa_posts'] = new WP_Query( $q_args );

			if ( !is_wp_error( $args['fa_posts'] ) && !empty( $args['fa_posts'] ) ) {

				$num_posts = count( $args['fa_posts']->posts );
				$fa_layout = explode( "_", $fa_layout );
				$args['both'] = count( $fa_layout ) == 2 ? true: false;
				$args['full'] = $fa_layout[0] == 'full' ? true: false;
				$args['full_slider'] = ( $num_posts > 1 && !isset( $fa_layout[1] ) && $fa_layout[0] == 'full' ) ? true : false;
				$args['grid'] = in_array( 'grid', $fa_layout ) ? true: false;
				$args['big_grid'] = in_array( 'big-grid', $fa_layout ) ? true: false;
				$args['use_fa'] = true;

				if ( $meta['fa_exclude'] ) {
					global $vce_fa_home_posts;
					$vce_fa_home_posts = array();
					foreach ( $args['fa_posts']->posts as $p ) {
						$vce_fa_home_posts[] = $p->ID;
					}
				}

			}

			wp_reset_postdata();
		}

		//print_r($q_args);

		return $args;
	}
endif;

/* Get featured area posts and arguments for category */
if ( !function_exists( 'vce_get_fa_cat_args' ) ) :
	function vce_get_fa_cat_args() {

		$args = array( 'use_fa' => false );

		//Check category featured area options

		$obj = get_queried_object();
		$meta = vce_get_category_meta( $obj->term_id );

		if ( $meta['fa_layout'] == 'inherit' ) {
			$fa_layout = vce_get_option( 'category_fa' ) ? vce_get_option( 'category_fa_layout' ) : false;
			$num_posts = vce_get_option( 'category_fa' ) ? vce_get_option( 'category_fa_limit' ) : false;
		} else {
			$fa_layout = $meta['fa_layout'];
			$num_posts = $meta['fa_limit'];
		}


		if ( $fa_layout ) {

			$q_args['post_type'] = 'post';
			$q_args['posts_per_page'] = $num_posts;
			$q_args['orderby'] = vce_get_option( 'category_fa_order' );

			if ( $q_args['orderby'] == 'views' && function_exists( 'ev_get_meta_key' ) ) {
				$q_args['orderby'] = 'meta_value_num';
				$q_args['meta_key'] = ev_get_meta_key();
			}

			if ( $q_args['orderby'] == 'comments_number' ) {
				$q_args['orderby'] = 'comment_count';
			}

			if ( $q_args['orderby'] == 'title' ) {
				$q_args['order'] = 'ASC';
			}

			if ( $time_diff = vce_get_option( 'category_fa_time' ) ) {
				$q_args['date_query'] = array( 'after' => date( 'Y-m-d', vce_calculate_time_diff( $time_diff ) ) );
			}

			$q_args['cat'] = $obj->term_id;

			$q_args = apply_filters( 'vce_modify_fa_cat_query_args', $q_args );

			$args['fa_posts'] = new WP_Query( $q_args );

			if ( !is_wp_error( $args['fa_posts'] ) && !empty( $args['fa_posts'] ) ) {

				$num_posts = count( $args['fa_posts']->posts );

				$fa_layout = explode( "_", $fa_layout );
				$args['both'] = count( $fa_layout ) == 2 ? true: false;
				$args['full'] = $fa_layout[0] == 'full' ? true: false;
				$args['full_slider'] = ( $num_posts > 1 && !isset( $fa_layout[1] ) && $fa_layout[0] == 'full' ) ? true : false;
				$args['grid'] = in_array( 'grid', $fa_layout ) ? true: false;
				$args['big_grid'] = in_array( 'big-grid', $fa_layout ) ? true: false;

				$args['use_fa'] = true;
			}

			if ( vce_get_option( 'category_fa_hide_on_pages' ) && absint( get_query_var( 'paged' ) > 1 ) ) {
				$args['use_fa'] = false;
				//Show only on first page
			}
		}

		//print_r($q_args);

		return $args;
	}
endif;



/**
 * Get branding
 *
 * Returns HTML of logo or website title based on theme options
 *
 * @return string HTML
 * @since  1.0
 */

if ( !function_exists( 'vce_get_branding' ) ):
    function vce_get_branding() {
    	global $vce_logo_used;

        //Get all logos
        $logo = vce_get_option_media( 'logo' );
        $logo_retina = vce_get_option_media( 'logo_retina' );
        $logo_mini = vce_get_option_media( 'logo_mobile' );;
        $logo_mini_retina = vce_get_option_media( 'logo_mobile_retina' );
        $logo_sticky = vce_get_option_media( 'sticky_header_logo' );

        $logo_class = ''; //if there is a logo image we use special class

        if ( empty( $logo_mini ) ) {
            $logo_mini = $logo;
        }

       if ( $vce_logo_used && !empty( $logo_sticky ) ) {
            $logo = $logo_sticky;
            $logo_mini = $logo_sticky;
            $logo_retina = '';
            $logo_mini_retina = '';
        }

        if ( empty( $logo ) ) {

            $brand =  get_bloginfo( 'name' );
            
        } else {
            $brand = '<picture class="vce-logo">';
            $brand .= '<source media="(min-width: 1024px)" srcset="'.esc_attr( $logo );

            if ( !empty( $logo_retina ) ) {
                $brand .= ', '.esc_attr( $logo_retina ).' 2x';
            }

            $brand .= '">';
            $brand .= '<source srcset="'.esc_attr( $logo_mini );

            if ( !empty( $logo_mini_retina ) ) {
                $brand .= ', '.esc_attr( $logo_mini_retina ).' 2x';
            }

            $brand .= '">';
            $brand .= '<img src="'.esc_attr( $logo ).'" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
            $brand .= '</picture>';

            $logo_class = 'has-logo';
        }
 

        $element = is_front_page() && !$vce_logo_used ? 'h1' : 'span';
        $url = vce_get_option( 'logo_custom_url' ) ? vce_get_option( 'logo_custom_url' ) : home_url( '/' );
        $site_desc = !$vce_logo_used && vce_get_option('header_description') ? '<span class="site-description">' . get_bloginfo( 'description' ) . '</span>' : '';

        $output = '<' . esc_attr( $element ) . ' class="site-title"><a href="' . esc_url( $url ) . '" rel="home" class="'.esc_attr( $logo_class ).'">' . $brand . '</a></' . esc_attr( $element ) . '>' . $site_desc;

        $vce_logo_used = true;

        return apply_filters( 'vce_modify_branding', $output );

    }
endif;



/* Compares two values and sanitazes 0 */
if ( !function_exists( 'vce_compare' ) ):
	function vce_compare( $a, $b ) {
		return (string) $a === (string) $b;
	}
endif;




/* Check is post is paginated */
if ( !function_exists( 'vce_is_paginated_post' ) ):
	function vce_is_paginated_post() {

		global $multipage;
		return 0 !== $multipage;

	}
endif;

/* Get settings to pass to main JS file */
if ( !function_exists( 'vce_get_js_settings' ) ):
	function vce_get_js_settings() {
		
		$js_settings = array();
		$js_settings['sticky_header'] = vce_get_option( 'sticky_header' ) ? true : false;
		$js_settings['sticky_header_offset'] = absint( vce_get_option( 'sticky_header_offset' ) );
		$js_settings['sticky_header_logo'] = vce_get_option_media( 'sticky_header_logo' );
		$js_settings['logo'] = vce_get_option_media( 'logo' );
		$js_settings['logo_retina'] = vce_get_option_media( 'logo_retina' );
		$js_settings['logo_mobile'] = vce_get_option_media( 'logo_mobile' );
		$js_settings['logo_mobile_retina'] = vce_get_option_media( 'logo_mobile_retina' );
		$js_settings['rtl_mode'] = vce_is_rtl() ? 1: 0;
		$protocol = is_ssl() ? 'https://' : 'http://';
		$js_settings['ajax_url'] = admin_url( 'admin-ajax.php', $protocol );
		$js_settings['ajax_wpml_current_lang'] = apply_filters( 'wpml_current_language', NULL );
		$js_settings['ajax_mega_menu'] = vce_get_option( 'ajax_mega_menu' ) ? true : false;
		$js_settings['mega_menu_slider'] = vce_get_option( 'mega_menu_slider' ) ? true : false;
		$js_settings['mega_menu_subcats'] = vce_get_option( 'mega_menu_subcats' ) ? true : false;
		$js_settings['lay_fa_grid_center'] = vce_get_option( 'lay_fa_grid_center' ) ? true : false;
		$js_settings['full_slider_autoplay'] = vce_get_option( 'lay_fa_big_autoplay' ) ? absint( vce_get_option( 'lay_fa_big_autoplay' ) ) * 1000 : false;
		$js_settings['grid_slider_autoplay'] = vce_get_option( 'lay_fa_grid_autoplay' ) ? absint( vce_get_option( 'lay_fa_grid_autoplay' ) ) * 1000 : false;
		$js_settings['grid_big_slider_autoplay'] = vce_get_option( 'lay_fa_grid_big_autoplay' ) ? absint( vce_get_option( 'lay_fa_grid_big_autoplay' ) ) * 1000 : false;
		$js_settings['fa_big_opacity'] = vce_get_option( 'lay_fa_big_opc' );
		$js_settings['top_bar_mobile'] = vce_get_option( 'top_bar_mobile' );
		$js_settings['top_bar_mobile_group'] = vce_get_option( 'top_bar_mobile_group' );
		$js_settings['top_bar_more_link'] = __vce( 'more' );

		return $js_settings;
	}
endif;

/* Parse font option */
if ( !function_exists( 'vce_get_font_option' ) ):
	function vce_get_font_option( $option = false ) {

		$font = vce_get_option( $option );
		$native_fonts = vce_get_native_fonts();
		if ( !in_array( $font['font-family'], $native_fonts ) ) {
			$font['font-family'] = "'".$font['font-family']."'";
		}

		return $font;
	}
endif;


/* Parse background option */
if ( !function_exists( 'vce_get_bg_styles' ) ):
	function vce_get_bg_styles( $option = false ) {

		$style = vce_get_option( $option );
		$css = '';

		if ( ! empty( $style ) && is_array( $style ) ) {
			foreach ( $style as $key => $value ) {
				if ( ! empty( $value ) && $key != "media" ) {
					if ( $key == "background-image" ) {
						$css .= $key . ":url('" . $value . "');";
					} else {
						$css .= $key . ":" . $value . ";";
					}
				}
			}
		}


		return $css;
	}
endif;



/* 	Update theme option function */
if ( !function_exists( 'vce_read_time' ) ):
	function vce_read_time( $text ) {

		if ( !vce_get_option( 'multibyte_rtime' ) ) {
			//$words = str_word_count( wp_strip_all_tags( $text ) );
			$words = count( preg_split( "/[\n\r\t ]+/", wp_strip_all_tags( $text ) ) );

		} else {
			//$words = count( explode( ' ', html_entity_decode( mb_convert_encoding( $text, 'HTML-ENTITIES', 'UTF-8' ), ENT_QUOTES, 'UTF-8' ) ) );
			$text = trim( preg_replace( "/[\n\r\t ]+/", ' ', wp_strip_all_tags( $text ) ), ' ' );
			preg_match_all( '/./u', $text, $words_array );
			$words = count( $words_array[0] );
		}

		$number_words_per_minute = vce_get_option( 'words_read_per_minute' );
		$number_words_per_minute = !empty( $number_words_per_minute ) ? absint( $number_words_per_minute ) : 200;

		if ( !empty( $words ) ) {
			$time_in_minutes = ceil( $words / $number_words_per_minute );
			return $time_in_minutes;
		}
		return false;
	}
endif;



/* Calculate time difference based on timestring */
if ( !function_exists( 'vce_calculate_time_diff' ) ) :
	function vce_calculate_time_diff( $timestring ) {

		$now = current_time( 'timestamp' );

		switch ( $timestring ) {
		case '-1 day' : $time = $now - DAY_IN_SECONDS; break;
		case '-3 days' : $time = $now - ( 3 * DAY_IN_SECONDS ); break;
		case '-1 week' : $time = $now - WEEK_IN_SECONDS; break;
		case '-1 month' : $time = $now - ( YEAR_IN_SECONDS / 12 ); break;
		case '-3 months' : $time = $now - ( 3 * YEAR_IN_SECONDS / 12 ); break;
		case '-6 months' : $time = $now - ( 6 * YEAR_IN_SECONDS / 12 ); break;
		case '-1 year' : $time = $now - ( YEAR_IN_SECONDS ); break;
		default : $time = $now;
		}

		return $time;
	}
endif;

/**
 * Get term IDs by term slugs for specific taxonomy
 *
 * @param array   $slugs List of tag slugs
 * @param string  $tax   Taxonomy name
 * @return array List IDs
 * @since  2.2
 */

if ( !function_exists( 'vce_get_tax_term_id_by_slug' ) ):
	function vce_get_tax_term_id_by_slug( $slugs, $tax = 'post_tag' ) {

		if ( empty( $slugs ) ) {
			return '';
		}

		$ids = array();

		foreach ( $slugs as $slug ) {
			$tag = get_term_by( 'slug', trim( $slug ), $tax );
			if ( !empty( $tag ) && isset( $tag->term_id ) ) {
				$ids[] = $tag->term_id;
			}
		}

		return $ids;

	}
endif;


/**
 * Get authors IDs by author username
 *
 * @param array   $slugs List of term slugs
 * @return array List of author IDs
 * @since  2.3  ( R.J. )
 */

if ( !function_exists( 'vce_get_authors_id_by_username' ) ):
	function vce_get_authors_id_by_username( $names ) {

		if ( empty( $names ) ) {
			return '';
		}
		$names = explode( ",", $names );
		$ids = array();
		foreach ( $names as $name ) {

			$meta = get_user_by( 'login', $name );
			if ( !empty( $meta ) ) {
				$ids[] = $meta->ID;
			}
		}

		return $ids;

	}
endif;


/**
 * Get authors username by author ID
 *
 * @param array   $slugs List of term slugs
 * @return array List of author IDs
 * @since  2.3 ( R.J. )
 */

if ( !function_exists( 'vce_get_authors_username_by_id' ) ):
	function vce_get_authors_username_by_id( $ids ) {

		if ( empty( $ids ) ) {
			return '';
		}

		$names = array();

		foreach ( $ids as $id ) {

			$meta = get_user_by( 'ID', $id );
			if ( !empty( $meta ) ) {
				$names[] = $meta->user_login;
			}
		}

		$names = implode( ",", $names );
		return $names;

	}
endif;


/**
 * Sort option items
 *
 * Use this function to properly order sortable options like in categories and series module
 *
 * @param array $items    Array of items
 * @param array $selected Array of IDs of currently selected items
 * @return array ordered items
 * @since  1.0
 */

if ( !function_exists( 'vce_sort_option_items' ) ):
	function vce_sort_option_items( $items, $selected, $field = 'term_id' ) {

		if ( empty( $selected ) ) {
			return $items;
		}

		$new_items = array();
		$temp_items = array();
		$temp_items_ids = array();

		foreach ( $selected as $selected_item_id ) {

			foreach ( $items as $item ) {
				if ( $selected_item_id == $item->$field ) {
					$new_items[] = $item;
				} else {
					if ( !in_array( $item->$field, $selected ) && !in_array( $item->$field, $temp_items_ids ) ) {
						$temp_items[] = $item;
						$temp_items_ids[] = $item->$field;
					}
				}
			}

		}

		$new_items = array_merge( $new_items, $temp_items );

		return $new_items;
	}
endif;


/**
 * Get all public custom post types
 *
 * @return array List of slugs
 * @since  2.3.1
 */

if ( !function_exists( 'vce_get_custom_post_types' ) ):
	function vce_get_custom_post_types( $raw = false ) {

		$custom_post_types =  get_post_types( array( 'public' => true, '_builtin' => false ), 'object' );

		if ( !empty( $custom_post_types ) ) {

			$exclude = array( 'topic', 'forum', 'guest-author', 'reply' );

			foreach ( $custom_post_types as $i => $obj ) {
				if ( in_array( $obj->name, $exclude ) ) {
					unset( $custom_post_types[$i] );
				}
			}

			if ( !$raw ) {
				$custom_post_types = array_keys( $custom_post_types );
			}
		}
		$custom_post_types =  apply_filters( 'vce_modify_custom_post_types_list', $custom_post_types );

		return $custom_post_types;
	}
endif;


/**
 * Get all taxonomies for custom post type
 *
 * @param unknown $cpt Custom post type ID
 * @return array List of custom post types and taxonomies
 * @since  2.3.1
 */
if ( !function_exists( 'vce_get_taxonomies' ) ) :
	function vce_get_taxonomies( $cpt ) {

		$taxonomies = get_taxonomies( array(
				'object_type' => array( $cpt ),
				'public' => true,
				'show_ui' => true
			),
			'object' );

		$output = array();

		foreach ( $taxonomies as $taxonomy ) {

			$tax = array();
			$tax['id'] = $taxonomy->name;
			$tax['name'] = $taxonomy->label;
			$tax['hierarchical'] = $taxonomy->hierarchical;
			if ( $tax['hierarchical'] ) {
				$tax['terms'] = get_terms( $taxonomy->name, array( 'hide_empty' => false ) ); //false for testing - change to true
			}

			$output[] = $tax;
		}

		return $output;
	}
endif;

/**
 * Get term IDs by term names for specific taxonomy
 *
 * @param array   $names List of term names
 * @param string  $tax   Taxonomy name
 * @return array List of term IDs
 * @since  2.3.1
 */

if ( !function_exists( 'vce_get_tax_term_id_by_name' ) ):
	function vce_get_tax_term_id_by_name( $names, $tax = 'post_tag' ) {

		if ( empty( $names ) ) {
			return '';
		}

		if ( !is_array( $names ) ) {
			$names = explode( ",", $names );
		}

		$ids = array();

		foreach ( $names as $name ) {
			$tag = get_term_by( 'name', trim( $name ), $tax );
			if ( !empty( $tag ) && isset( $tag->term_id ) ) {
				$ids[] = $tag->term_id;
			}
		}
		return $ids;

	}
endif;

/**
 * Get term names by term id for specific taxonomy
 *
 * @param array   $names List of term ids
 * @param string  $tax   Taxonomy name
 * @return array List of term names
 * @since  2.3.1
 */

if ( !function_exists( 'vce_get_tax_term_name_by_id' ) ):
	function vce_get_tax_term_name_by_id( $ids, $tax = 'post_tag' ) {

		if ( empty( $ids ) ) {
			return '';
		}

		$names = array();

		foreach ( $ids as $id ) {
			$tag = get_term_by( 'id', trim( $id ), $tax );
			if ( !empty( $tag ) && isset( $tag->name ) ) {
				$names[] = $tag->name;
			}
		}

		$names = implode( ',', $names );

		return $names;

	}
endif;

/**
 * Return category image or if is not set category image return last post feature image
 *
 * @since  1.7
 *
 * @return mixed html
 */

if ( !function_exists( 'vce_get_category_featured_image' ) ) :
	function vce_get_category_featured_image( $size, $cat_id ) {

		if ( empty( $cat_id ) ) {
			$cat_id = get_queried_object_id();
		}

		$img_url = vce_get_category_meta( $cat_id, 'image' );

		$img_html = '';

		if ( !empty( $img_url ) ) {
			$img_id = vce_get_image_id_by_url( $img_url );
			$img_html = wp_get_attachment_image( $img_id, $size );
			if ( empty( $img_html ) ) {
				$img_html = '<img src="'.esc_url( $img_url ).'"/>';
			}
		}

		if ( empty( $img_html )  ) {
			$first_post = vce_get_first_post_in_category( $cat_id );
			$post_id = false;
			if ( !empty( $first_post ) && isset( $first_post->ID ) ) {
				$post_id = $first_post->ID;
			}
			$img_html = vce_featured_image( $size, $post_id );
		}

		return wp_kses_post( $img_html );
	}
endif;

/**
 * Get first post in category
 *
 * @since  1.7
 * @param unknown $category_id
 * @return object WP Query Object
 */

if ( !function_exists( 'vce_get_first_post_in_category' ) ) :
	function vce_get_first_post_in_category( $category_id ) {

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 1,
			'category__in' => array( $category_id ),
		);

		$query = new WP_Query( $args );

		if ( !$query->have_posts() ) {
			return false;
		}

		while ( $query->have_posts() ) {
			$query->the_post();
			$post_obj = $query->post;
		}

		wp_reset_postdata();
		return $post_obj;
	}
endif;



/**
 * Get primary category if Yoast is enabled and primary category is set
 *
 * @since  2.8
 *
 * @return mixed|html
 */

if ( !function_exists( 'vce_get_primary_category' ) ) :
	function vce_get_primary_category() {

		if ( !vce_is_yoast_active() ) {
			return false;
		}

		global $post;

		$primary_category = vce_get_option( 'primary_category' ) ? vce_get_option( 'primary_category' ) : false;
		$primary_term_id = $primary_category ? get_post_meta( $post->ID, '_yoast_wpseo_primary_category', true ) : false;
		$allow_on_single = is_single() && get_queried_object_id() == $post->ID;

		if ( $primary_category && isset($primary_term_id) && !empty($primary_term_id) && $allow_on_single ) {
			return false;
		}

		$term = get_term( $primary_term_id );

		if ( is_wp_error( $term ) || empty( $term ) ) {
			return false;
		}

		return $term;
	}
endif;


/* Check if SEO by Yoast plugin is active */
if ( !function_exists( 'vce_is_yoast_active' ) ):
	function vce_is_yoast_active() {
		return class_exists('WPSEO_Frontend') || class_exists('WPSEO_Admin');
	}
endif;


/**
 * Display ads
 *
 * @since  2.7.1
 *
 * @return boolean
 */
if ( !function_exists( 'vce_can_display_ads' ) ):
	function vce_can_display_ads() {
		if ( is_404() && vce_get_option( 'ad_exclude_404' ) ) {
			return false;
		}

		$exclude_ids_option = vce_get_option( 'ad_exclude_from_pages' );
		$exclude_ids = !empty( $exclude_ids_option ) ? $exclude_ids_option : array();

		if ( is_page() && in_array( get_queried_object_id(), $exclude_ids ) ) {
			return false;
		}

		return true;
	}
endif;


/**
 * Used for getting post type with all its taxonomies
 *
 * @return array
 * @since    2.7.1
 */
if ( !function_exists( 'vce_get_post_type_with_taxonomies' ) ):
	function vce_get_post_type_with_taxonomies( $post_type ) {

		$post_type = get_post_type_object( $post_type );

		if ( empty( $post_type ) )
			return null;


		$post_taxonomies = array();
		$taxonomies = get_taxonomies( array(
				'object_type' => array( $post_type->name ),
				'public'      => true,
				'show_ui'     => true,
			), 'object' );

		if ( !empty( $taxonomies ) ) {
			foreach ( $taxonomies as $taxonomy ) {

				$tax = array();
				$tax['id'] = $taxonomy->name;
				$tax['name'] = $taxonomy->label;
				$tax['hierarchical'] = $taxonomy->hierarchical;
				if ( $tax['hierarchical'] ) {
					$tax['terms'] = get_terms( $taxonomy->name, array( 'hide_empty' => false ) );
				}

				$post_taxonomies[] = $tax;
			}
		}

		if ( !empty( $post_taxonomies ) ) {
			$post_type->taxonomies = $post_taxonomies;
		}


		return apply_filters( 'vce_modify_post_type_with_taxonomies', $post_type );
	}
endif;


if ( !function_exists( 'vce_meks_author_social_networks' ) ) :
	function vce_meks_author_social_networks( $user_id ) {

		$output = '';

		if ($author_url = get_the_author_meta('url', $user_id )) {
			$output .= '<a href="'.esc_url($author_url).'" target="_blank" class="fa fa-link"></a>';
		} 

		$user_social = vce_get_social();

		foreach ( $user_social as $soc_id => $soc_name ){
			if ( $social_meta = get_the_author_meta($soc_id, $user_id) ) {
				if ($soc_id == 'twitter') {
					$social_meta = (strpos($social_meta, 'http') === false) ? 'https://twitter.com/' . $social_meta : $social_meta; 
				}
				$output .= '<a href="'.$social_meta.'" target="_blank" class="fa fa-'.$soc_id.'"></a>';
			}
		}

		if(!empty($output)){
			$output = '<div class="vce-author-links">'.$output.'</div>';
		}

		return $output;
	}

endif;





/**
 * Check if RTL mode is enabled
 *
 * @return bool
 * @since  2.9
 */

if ( !function_exists( 'vce_is_rtl' ) ):
	function vce_is_rtl() {

		$rtl = false;

		if ( vce_get_option( 'rtl_mode' ) ) {
			$rtl = true;
			//Check if current language is excluded from RTL
			$rtl_lang_skip = explode( ",", vce_get_option( 'rtl_lang_skip' ) );
			if ( !empty( $rtl_lang_skip ) ) {
				$locale = get_locale();
				if ( in_array( $locale, $rtl_lang_skip ) ) {
					$rtl = false;
				}
			}
		}

		return $rtl;
	}
endif;

/**
 * Social Platforms
 *
 * @return array
 * @since  2.9
 */
if ( !function_exists( 'vce_get_social_platforms' ) ) :
	function vce_get_social_platforms() {

		if ( function_exists('meks_ess_get_platforms') ) {
			return meks_ess_get_platforms();
		}

		return array(
			'facebook' => esc_html__( 'Facebook', 'voice' ),
			'twitter' => esc_html__( 'Twitter', 'voice' ),
			'googleplus' => esc_html__( 'Google+', 'voice' ),
			'pinterest' => esc_html__( 'Pinterest', 'voice' ),
			'linkedin' => esc_html__( 'LinkedIN', 'voice' ),
			'whatsapp' => esc_html__( 'WhatsApp', 'voice' ),
			'vk' => esc_html__( 'vKontakte', 'voice' ),
			'reddit' => esc_html__( 'Reddit', 'voice' ),
			'stumbleupon' => esc_html__( 'StumbleUpon', 'voice' ),
			'email' => esc_html__( 'Email', 'voice' )
		);

	}
endif;

/* Check if WooCommerce is activated */
if ( !function_exists( 'vce_is_woocommerce_active' ) ):
	function vce_is_woocommerce_active() {
		return function_exists('WC');
	}
endif;

/* Check if bbPress is activated */
if ( !function_exists( 'vce_is_bbpress_active' ) ):
	function vce_is_bbpress_active() {
		return class_exists( 'bbPress' );
	}
endif;


/* Check if WP Review plugin is active */
if ( !function_exists( 'vce_is_wp_review_active' ) ):
	function vce_is_wp_review_active() {
		return function_exists('wp_review_constants');
	}
endif;


/**
 * Support for Co-Authors Plus Plugin
 * Check if plugin is activated
 *
 * @since  2.3
 */

if ( !function_exists( 'voice_is_co_authors_active' ) ):
	function voice_is_co_authors_active() {
		return class_exists('CoAuthors_Plus');
	}
endif;

/* Check if Envato Market plugin is active */
if ( !function_exists( 'vce_is_envato_market_active' ) ):
	function vce_is_envato_market_active() {
		return function_exists('envato_market');
	}
endif;

/**
 * Check if Redux Options framework is active
 *
 * @return bool
 * @since  1.0
 */
if ( !function_exists( 'vce_is_redux_active' ) ):
	function vce_is_redux_active() {
		return class_exists( 'ReduxFramework' );
	}
endif;


/**
 * Function for escaping through WordPress's KSES API
 * wp_kses() and wp_kses_allowed_html()
 *
 * @param string $content
 * @param bool $echo 
 * @return string 
 * @since  1.2
 */
if ( !function_exists( 'vce_wp_kses' ) ):
	function vce_wp_kses( $content, $echo = false ) {

		$allowed_tags = wp_kses_allowed_html('post');
		$allowed_tags['img']['srcset'] = array();
		$allowed_tags['img']['sizes'] = array();

		$tags = apply_filters('vce_wp_kses_allowed_html', $allowed_tags);

		if ( !$echo ) {
			return wp_kses( $content, $tags );
		}

		echo wp_kses( $content, $tags );

	}
endif;

/**
 * Share bottom bar styles
 * Function to switch share bottom bar styles base on stale and variant plugin options
 *
 * @param array $params
 * @return string 
 * @since  1.2.3
 */
if ( !function_exists( 'voice_share_bar_classes' ) ):
	function voice_share_bar_classes( $params ) {
		
		$classes = '';

		if ( empty( $params ) ) {
			return 'rounded no-labels solid';
		}

		switch ( $params['style'] ) {
			case '1':
				$classes = 'rectangle no-labels ';
				break;
			
			case '2':
				$classes = 'rounded no-labels ';
				break;
			
			case '3':
				$classes = 'circle no-labels ';
				break;
			
			case '4':
				$classes = 'square no-labels ';
				break;
			
			case '5':
				$classes = 'transparent no-labels ';
				break;
			
			case '6':
				$classes = 'rectangle ';
				break;
			
			case '7':
				$classes = 'rounded ';
				break;
			
			case '8':
				$classes = 'transparent ';
				break;
			
			default:
				$classes = 'rounded no-labels solid';
				break;
		}


        $variant = array(
            '1' => 'solid',
            '2' => 'outline'
		);

		if( !empty( $params['variant'] ) ) {
			$classes .= $variant[$params['variant']];
		}


		return $classes;
	}
endif;
