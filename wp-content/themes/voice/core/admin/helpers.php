<?php


/* Get sidebar layouts */
if ( !function_exists( 'vce_get_sidebar_layouts' ) ):
	function vce_get_sidebar_layouts( $inherit = false ) {

		$layouts = array();

		if ( $inherit ) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/inherit.png' ));
		}

		$layouts['none'] = array( 'title' => esc_html__( 'No sidebar (full width)', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/content_no_sid.png' ));
		$layouts['left'] = array( 'title' => esc_html__( 'Left sidebar', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/content_sid_left.png' ));
		$layouts['right'] = array( 'title' => esc_html__( 'Right sidebar', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/content_sid_right.png' ));

		$layouts = apply_filters( 'vce_modify_sidebar_elements', $layouts ); //Allow child themes or plugins to modify
		return $layouts;
	}
endif;

/* Get single post layout options */
if ( !function_exists( 'vce_get_single_layout_opts' ) ) :

	function vce_get_single_layout_opts( $inherit = false ) {

		$layouts = array();

		if ( $inherit ) :
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/inherit.png' ));
		endif;

		$layouts['classic'] = array(
			'title' => esc_html__( 'Standard', 'voice' ),
			'img' => get_parent_theme_file_uri( 'assets/img/admin/single_classic.jpg')
		);

		$layouts['cover'] = array(
			'title' => esc_html__( 'Cover', 'voice' ),
			'img' => get_parent_theme_file_uri( 'assets/img/admin/single_cover.jpg')
		);

		$layouts = apply_filters( 'vce_modify_single_layout_opts', $layouts ); //Allow child themes or plugins to modify
		return $layouts;

	}

endif;


/* Get all sidebars */
if ( !function_exists( 'vce_get_sidebars_list' ) ):
	function vce_get_sidebars_list( $inherit = false ) {

		$sidebars = array();

		if ( $inherit ) {
			$sidebars['inherit'] = esc_html__( 'Inherit', 'voice' );
		}

		$sidebars['0'] = esc_html__( 'None', 'voice' );

		global $wp_registered_sidebars;

		if ( !empty( $wp_registered_sidebars ) ) {

			foreach ( $wp_registered_sidebars as $sidebar ) {
				$sidebars[$sidebar['id']] = $sidebar['name'];
			}

		}


		//Get sidebars from wp_options if global var is not loaded yet
		$fallback_sidebars = get_option( 'vce_registered_sidebars' );
		if ( !empty( $fallback_sidebars ) ) {
			foreach ( $fallback_sidebars as $sidebar ) {
				if ( !array_key_exists( $sidebar['id'], $sidebars ) ) {
					$sidebars[$sidebar['id']] = $sidebar['name'];
				}
			}
		}

		//Check for theme additional sidebars
		$custom_sidebars = vce_get_option( 'add_sidebars' );

		if ( $custom_sidebars ) {
			for ( $i = 1; $i <= $custom_sidebars; $i++ ) {
				if ( !array_key_exists( 'vce_sidebar_'.$i, $sidebars ) ) {
					$sidebars['vce_sidebar_'.$i] = esc_html__( 'Sidebar', 'voice' ).' '.$i;
				}
			}
		}


		//Do not display footer sidebars for selection
		unset( $sidebars['vce_footer_sidebar_1'] );
		unset( $sidebars['vce_footer_sidebar_2'] );
		unset( $sidebars['vce_footer_sidebar_3'] );

		$sidebars = apply_filters( 'vce_modify_sidebars_list', $sidebars ); //Allow child themes or plugins to modify
		return $sidebars;
	}
endif;



/* Get featured area layouts */
if ( !function_exists( 'vce_get_featured_area_layouts' ) ):
	function vce_get_featured_area_layouts( $inherit = false, $none = false ) {

		if ( $inherit ) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/inherit.png' ));
		}

		if ( $none ) {
			$layouts['0'] = array( 'title' => esc_html__( 'None', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/none.png' ));
		}

		$layouts['full_grid'] = array( 'title' => esc_html__( 'Big post + slider below', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/featured_both.png' ));
		$layouts['full'] = array( 'title' => esc_html__( 'Big post(s) only', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/featured_big.png' ));
		$layouts['grid'] = array( 'title' => esc_html__( 'Slider only', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/featured_grid.png' ));
		$layouts['big-grid'] = array( 'title' => esc_html__( 'Big Slider only', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/featured_big_grid.png' ));

		$layouts = apply_filters( 'vce_modify_featured_area_layouts', $layouts ); //Allow child themes or plugins to modify
		return $layouts;
	}
endif;


/* Get main post layouts layouts */
if ( !function_exists( 'vce_get_main_layouts' ) ):
	function vce_get_main_layouts( $inherit = false, $none = false ) {

		if ( $inherit ) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/inherit.png' ));
		}

		if ( $none ) {
			$layouts['0'] = array( 'title' => esc_html__( 'None', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/none.png' ));
		}

		$layouts['a'] = array( 'title' => esc_html__( 'Layout A', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/layout_a.png' ));
		$layouts['b'] = array( 'title' => esc_html__( 'Layout B', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/layout_b.png' ));
		$layouts['c'] = array( 'title' => esc_html__( 'Layout C', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/layout_c.png' ));
		$layouts['d'] = array( 'title' => esc_html__( 'Layout D', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/layout_d.png' ));
		$layouts['e'] = array( 'title' => esc_html__( 'Layout E', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/layout_e.png' ));
		$layouts['f'] = array( 'title' => esc_html__( 'Layout F', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/layout_f.png' ));
		$layouts['g'] = array( 'title' => esc_html__( 'Layout G', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/layout_g.png' ));
		$layouts['h'] = array( 'title' => esc_html__( 'Layout H', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/layout_h.png' ));

		$layouts = apply_filters( 'vce_modify_main_layouts', $layouts ); //Allow child themes or plugins to modify
		return $layouts;
	}
endif;


/* Get category module  layouts */
if ( !function_exists( 'vce_get_category_layouts' ) ):
	function vce_get_category_layouts() {

		$layouts['g'] = array( 'title' => esc_html__( 'One Column', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/category_one.png' ));
		$layouts['c'] = array( 'title' => esc_html__( 'Two Columns', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/category_two.png' ));
		$layouts['e'] = array( 'title' => esc_html__( 'Five Columns', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/category_five.png' ));

		$layouts = apply_filters( 'vce_modify_category_layouts', $layouts ); //Allow child themes or plugins to modify
		return $layouts;
	}
endif;


/* Get main post layouts layouts */
if ( !function_exists( 'vce_get_pagination_layouts' ) ):
	function vce_get_pagination_layouts() {
		$layouts = array(
			'prev-next' => array( 'title' => esc_html__( 'Prev/Next page links', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/pag_prev_next.png' )),
			'numeric' => array( 'title' => esc_html__( 'Numeric pagination links', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/pag_numeric.png' )),
			'load-more' => array( 'title' => esc_html__( 'Load more button', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/pag_load_more.png' )),
			'infinite-scroll' => array( 'title' => esc_html__( 'Infinite scroll', 'voice' ), 'img' => get_parent_theme_file_uri( 'assets/img/admin/pag_infinite.png' )),
		);

		$layouts = apply_filters( 'vce_modify_pagination_layouts', $layouts ); //Allow child themes or plugins to modify
		return $layouts;
	}
endif;

/* Get meta data options */

if ( !function_exists( 'vce_get_meta_opts' ) ):
	function vce_get_meta_opts( $default = array() ) {

		$options = array();

		$options['date'] = esc_html__( 'Date', 'voice' );
		$options['comments'] = esc_html__( 'Comments', 'voice' );
		$options['author'] = esc_html__( 'Author', 'voice' );
		$options['views'] = esc_html__( 'Views', 'voice' );
		$options['rtime'] = esc_html__( 'Reading time', 'voice' );
		$options['modified_date'] = esc_html__( 'Modified date', 'voice' );

		if ( vce_is_wp_review_active() ) {
			$options['reviews'] = esc_html__( 'Reviews', 'voice' );
		}

		if ( !empty( $default ) ) {
			foreach ( $options as $key => $option ) {
				if ( in_array( $key, $default ) ) {
					$options[$key] = 1;
				} else {
					$options[$key] = 0;
				}
			}
		}

		$options = apply_filters( 'vce_modify_meta_opts', $options );
		return $options;
	}
endif;


/**
 * Generate dynamic editor css
 *
 * Function parses theme options and generates css code dynamically
 *
 * @return string Generated css code
 * @since  2.9
 */
if ( !function_exists( 'vce_generate_dynamic_editor_css' ) ):
	function vce_generate_dynamic_editor_css() {
		ob_start();
		get_template_part( 'assets/css/admin/dynamic-editor-css' );
		$output = ob_get_contents();
		ob_end_clean();
		$output = vce_compress_css_code( $output );

		return $output;
	}
endif;


/* Cache recently used category colors */
if ( !function_exists( 'vce_update_recent_cat_colors' ) ):
	function vce_update_recent_cat_colors( $color, $num_col = 10 ) {
		if ( empty( $color ) )
			return false;

		$current = get_option( 'vce_recent_cat_colors' );
		if ( empty( $current ) ) {
			$current = array();
		}

		$update = false;

		if ( !in_array( $color, $current ) ) {
			$current[] = $color;
			if ( count( $current ) > $num_col ) {
				$current = array_slice( $current, ( count( $current ) - $num_col ), ( count( $current ) - 1 ) );
			}
			$update = true;
		}

		if ( $update ) {
			update_option( 'vce_recent_cat_colors', $current );
		}

	}
endif;

/* Store color per each category */
if ( !function_exists( 'vce_update_cat_colors' ) ):
	function vce_update_cat_colors( $cat_id, $color, $type ) {

		$colors = (array)get_option( 'vce_cat_colors' );

		if ( array_key_exists( $cat_id, $colors ) ) {

			if ( $type == 'inherit' ) {
				unset( $colors[$cat_id] );
			} elseif ( $colors[$cat_id] != $color ) {
				$colors[$cat_id] = $color;
			}

		} else {

			if ( $type != 'inherit' ) {
				$colors[$cat_id] = $color;
			}
		}

		update_option( 'vce_cat_colors', $colors );

	}
endif;

/* Get options for selection of time dependent posts */
if ( !function_exists( 'vce_get_time_diff_opts' ) ) :
	function vce_get_time_diff_opts( $range = false ) {

		$options = array();

		$options['to'] = array(
			'0' => esc_html__( 'This moment', 'voice' ),
			'-1 day' => esc_html__( '1 Day', 'voice' ),
			'-3 days' => esc_html__( '3 Days', 'voice' ),
			'-1 week' => esc_html__( '1 Week', 'voice' ),
			'-1 month' => esc_html__( '1 Month', 'voice' ),
			'-3 months' => esc_html__( '3 Months', 'voice' ),
			'-6 months' => esc_html__( '6 Months', 'voice' ),
			'-1 year' => esc_html__( '1 Year', 'voice' )

		);

		$options['from'] = array(
			'-1 day' => esc_html__( '1 Day', 'voice' ),
			'-3 days' => esc_html__( '3 Days', 'voice' ),
			'-1 week' => esc_html__( '1 Week', 'voice' ),
			'-1 month' => esc_html__( '1 Month', 'voice' ),
			'-3 months' => esc_html__( '3 Months', 'voice' ),
			'-6 months' => esc_html__( '6 Months', 'voice' ),
			'-1 year' => esc_html__( '1 Year', 'voice' ),
			'0' => esc_html__( 'All time', 'voice' )
		);

		//Allow child themes or plugins to change these options
		$options = apply_filters( 'vce_modify_time_diff_opts', $options );

		if ( empty( $range ) ) {
			return $options;
		} else if ( array_key_exists( $range, $options ) ) {
				return $options[$range];
			} else {
			return array();
		}

	}
endif;

/* Get options for selection of post ordering */
if ( !function_exists( 'vce_get_post_order_opts' ) ) :
	function vce_get_post_order_opts() {

		$options = array(
			'date' => esc_html__( 'Date', 'voice' ),
			'comment_count' => esc_html__( 'Number of comments', 'voice' ),
			'views' => esc_html__( 'Number of views', 'voice' ),
			'title' => esc_html__( 'Title (alphabetically)', 'voice' ),
			'modified' => esc_html__( 'Modified date', 'voice' ),
			'rand' => esc_html__( 'Random', 'voice' )

		);

		if ( vce_is_wp_review_active() ) {
			$options['reviews_star'] = esc_html__( 'Author Reviews (stars)', 'voice' );
			$options['reviews_point'] = esc_html__( 'Author Reviews (points)', 'voice' );
			$options['reviews_percentage'] = esc_html__( 'Author Reviews (percentage)', 'voice' );

			$options['user_reviews_star'] = esc_html__( 'User Reviews (stars)', 'voice' );
			$options['user_reviews_point'] = esc_html__( 'User Reviews (points)', 'voice' );
			$options['user_reviews_percentage'] = esc_html__( 'User Reviews (percentage)', 'voice' );
		}

		//Allow child themes or plugins to change these options
		$options = apply_filters( 'vce_modify_post_order_opts', $options );

		return $options;
	}
endif;

/* Get topbar items */
if ( !function_exists( 'vce_get_topbar_items' ) ):
	function vce_get_topbar_items() {
		$items = array(
			'0' => esc_html__( 'None', 'voice' ),
			'top-navigation' => esc_html__( 'Top navigation menu', 'voice' ),
			'social-menu' => esc_html__( 'Social menu', 'voice' ),
			'search-bar' => esc_html__( 'Search form', 'voice' ),
		);

		$items = apply_filters( 'vce_modify_topbar_items', $items );
		return $items;
	}
endif;

/* Get copyright bar items */
if ( !function_exists( 'vce_get_copybar_items' ) ):
	function vce_get_copybar_items() {
		$items = array(
			'0' => esc_html__( 'None', 'voice' ),
			'footer-menu' => esc_html__( 'Footer menu' , 'voice' ),
			'social-menu' => esc_html__( 'Social menu', 'voice' ),
			'copyright-text' =>  esc_html__( 'Copyright text', 'voice' )
		);

		$items = apply_filters( 'vce_modify_copybar_items', $items );
		return $items;
	}
endif;

/* Get update notification */
if ( !function_exists( 'vce_get_update_notification' ) ):
	function vce_get_update_notification() {
		$current = get_site_transient( 'update_themes' );
		$message_html = '';
		if ( isset( $current->response['voice'] ) ) {
			$message_html = '<span class="update-message">New update available!</span>
				<span class="update-actions">Version '.$current->response['voice']['new_version'].': <a href="http://mekshq.com/docs/voice-change-log" target="blank">See what\'s new</a><a href="'.admin_url( 'update-core.php' ).'">Update</a></span>';
		} else {
			$message_html = '<a class="theme-version-label" href="https://mekshq.com/docs/voice-change-log" target="blank">Version '. VOICE_THEME_VERSION .'</a>';
		}

		return $message_html;
	}
endif;

/**
 * Create Display Options Metabox
 *
 */
if ( !function_exists( 'vce_post_display_option' ) ) :
	function vce_post_display_option( $option_name, $selected = 'inherit' ) {
		$options = array( 'inherit' => esc_html__( 'Inherit', 'voice' ), 'on' => esc_html__( 'On', 'voice' ), 'off' => esc_html__( 'Off', 'voice' ) );
?>
		<select name="vce[display][<?php echo esc_attr( $option_name ); ?>]" class="vce-single-display-opt">
            <?php foreach ( $options as $val => $label ): ?>
				<option value="<?php echo esc_attr( $val ); ?>" <?php selected( $selected, $val, true ); ?>><?php echo esc_html( $label ); ?></option>
            <?php endforeach; ?>
		</select>
        <?php
	}
endif;


/**
 * Get Admin JS localized variables
 *
 * Function creates list of variables from theme to pass
 * them to global JS variable so we can use it in JS files
 *
 * @since  2.7
 *
 * @return array List of JS settings
 */
if ( !function_exists( 'vce_get_admin_js_settings' ) ):
	function vce_get_admin_js_settings() {

		$js_settings = array();
		$js_settings['ajax_url'] = admin_url( 'admin-ajax.php' );
		$js_settings['is_gutenberg'] = vce_is_gutenberg_page();
		return $js_settings;
	}
endif;

/* Check if Gutenberg plugin is active and we are on its page */
if ( !function_exists( 'vce_is_gutenberg_page' ) ):
	function vce_is_gutenberg_page() {

		if ( function_exists( 'is_gutenberg_page' ) ) {
			return is_gutenberg_page();
		}
		
		global $wp_version;

		if( version_compare( $wp_version, '5', '<' ) ){
			return false;
		}

		global $current_screen;

		if ( ( $current_screen instanceof WP_Screen ) && !$current_screen->is_block_editor() ) {
			return false;
		}
		
		return true;
	}
endif;
?>