<?php

/* Add classes to body tag */
if ( !function_exists( 'vce_body_class' ) ):
	function vce_body_class( $classes ) {
	
		//Do not touch this, we use this global var to define current sidebar layout on all pages
		global $vce_sidebar_opts;

		$vce_sidebar_opts = vce_get_current_sidebar();
		$sidebar_class = $vce_sidebar_opts['use_sidebar'] ? 'vce-sid-'.$vce_sidebar_opts['use_sidebar'] : '';

		$classes[] = $sidebar_class;

		$classes[] = 'voice-v_' . str_replace('.', '_', VOICE_THEME_VERSION);

		if ( is_child_theme() ) {
			$classes[] = 'voice-child';
		}

		return $classes;
	}
endif;

add_filter( 'body_class', 'vce_body_class' );




/* Fix pagination issue caused by Facebook plugin */
if ( !function_exists( 'vce_fb_plugin_pagination_fix' ) ):
	function vce_fb_plugin_pagination_fix() {
		if ( class_exists( 'Facebook_Loader' ) && is_front_page() ) {
			global $wp_query;
			$page = get_query_var( 'page' );
			$paged = get_query_var( 'paged' );
			if ( $page > 1 || $paged > 1 ) {
				unset( $wp_query->queried_object );
			}
		}
	}
endif;

add_action( 'wp', 'vce_fb_plugin_pagination_fix', 99 );



/* Add media graber features */
if ( !function_exists( 'vce_add_media_graber' ) ):
	function vce_add_media_graber() {
		if ( !class_exists( 'Hybrid_Media_Grabber' ) ) {
			include_once get_parent_theme_file_path( 'inc/media-grabber/class-hybrid-media-grabber.php' );
		}
	}
endif;

add_action( 'init', 'vce_add_media_graber' );


/* Add span elements to post count number in category widget */
if ( !function_exists( 'vce_add_span_cat_count' ) ):
	function vce_add_span_cat_count( $links, $args ) {

		if ( isset( $args['taxonomy'] ) && $args['taxonomy'] != 'category' ) {
			return $links;
		}

		$links = preg_replace( '/(<a[^>]*>)/', '$1<span class="category-text">', $links );
		$links = str_replace( '</a>', '</span></a>', $links );
		$links = str_replace( '</a> (', '<span class="count"><span class="count-hidden">', $links );
		$links = str_replace( ')', '</span></span></a>', $links );

		return $links;
	}
endif;

add_filter( 'wp_list_categories', 'vce_add_span_cat_count', 10, 2 );


/* Unregister Entry Views widget */
if ( !function_exists( 'vce_unregister_widgets' ) ):
	function vce_unregister_widgets() {

		$widgets = array( 'EV_Widget_Entry_Views' );

		//Allow child themes or plugins to add/remove widgets they want to unregister
		$widgets = apply_filters( 'vce_modify_unregister_widgets', $widgets );

		if ( !empty( $widgets ) ) {
			foreach ( $widgets as $widget ) {
				unregister_widget( $widget );
			}
		}

	}
endif;

add_action( 'widgets_init', 'vce_unregister_widgets', 99 );

/* Remove entry views support for other post types, we need post support only */
if ( !function_exists( 'vce_remove_entry_views_support' ) ):
	function vce_remove_entry_views_support() {

		$types = array( 'page', 'attachment', 'literature', 'portfolio_item', 'recipe', 'restaurant_item' );

		//Allow child themes or plugins to modify entry views support
		$widgets = apply_filters( 'vce_modify_entry_views_support', $types );

		if ( !empty( $types ) ) {
			foreach ( $types as $type ) {
				remove_post_type_support( $type, 'entry-views' );
			}
		}

	}
endif;

add_action( 'init', 'vce_remove_entry_views_support', 99 );


add_action( 'init', 'vce_check_gallery' );

/* Check wheter to enable Voice gallery styling */
function vce_check_gallery() {
	if ( vce_get_option( 'use_gallery' ) ) {
		add_filter( 'shortcode_atts_gallery', 'vce_gallery_atts', 10, 3 );
		add_filter( 'post_gallery', 'vce_gallery_shortcode', 10, 4 );
	}
}

/* Change atts of wp gallery shortcode to get best size depending on column selection */
if ( !function_exists( 'vce_gallery_atts' ) ):
	function vce_gallery_atts( $out, $pairs, $atts ) {


		global $vce_sidebar_opts;

		$size_split = isset($vce_sidebar_opts['use_sidebar']) && $vce_sidebar_opts['use_sidebar'] == 'none' ? 7 : 5;

		if ( !isset( $atts['columns'] ) ) {
			$atts['columns'] = 3;
		}

		if ( $atts['columns'] < $size_split ) {
			$size = 'vce-lay-b';
		} else {
			$size = 'vce-lay-d';
		}

		if( $atts['columns'] == 2 || ( $atts['columns'] == 3 && $vce_sidebar_opts['use_sidebar'] == 'none' ) ){
			$size = 'vce-lay-a';
		}

		$out['columns'] = $atts['columns'];
		$out['size'] = $size;
		$out['link'] = 'file';

		return $out;

	}
endif;


/* Slighly modify wordpress gallery shortcode */
if ( !function_exists( 'vce_gallery_shortcode' ) ):
	function vce_gallery_shortcode( $output = '', $attr, $content = false, $tag = false ) {
		$post = get_post();

		static $instance = 0;
		$instance++;

		if ( ! empty( $attr['ids'] ) ) {
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if ( empty( $attr['orderby'] ) ) {
				$attr['orderby'] = 'post__in';
			}
			$attr['include'] = $attr['ids'];
		}


		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( ! $attr['orderby'] ) {
				unset( $attr['orderby'] );
			}
		}

		$html5 = current_theme_supports( 'html5', 'gallery' );
		$atts = shortcode_atts( array(
				'order'      => 'ASC',
				'orderby'    => 'menu_order ID',
				'id'         => $post ? $post->ID : 0,
				'itemtag'    => $html5 ? 'figure'     : 'dl',
				'icontag'    => $html5 ? 'div'        : 'dt',
				'captiontag' => $html5 ? 'figcaption' : 'dd',
				'columns'    => 3,
				'size'       => 'thumbnail',
				'include'    => '',
				'exclude'    => '',
				'link'       => ''
			), $attr, 'gallery' );

		$id = intval( $atts['id'] );
		if ( 'RAND' == $atts['order'] ) {
			$atts['orderby'] = 'none';
		}

		if ( ! empty( $atts['include'] ) ) {
			$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( ! empty( $atts['exclude'] ) ) {
			$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
		} else {
			$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
		}

		if ( empty( $attachments ) ) {
			return '';
		}

		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment ) {
				$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
			}
			return $output;
		}

		$itemtag = tag_escape( $atts['itemtag'] );
		$captiontag = tag_escape( $atts['captiontag'] );
		$icontag = tag_escape( $atts['icontag'] );
		$valid_tags = wp_kses_allowed_html( 'post' );
		if ( ! isset( $valid_tags[ $itemtag ] ) ) {
			$itemtag = 'dl';
		}
		if ( ! isset( $valid_tags[ $captiontag ] ) ) {
			$captiontag = 'dd';
		}
		if ( ! isset( $valid_tags[ $icontag ] ) ) {
			$icontag = 'dt';
		}

		$columns = intval( $atts['columns'] );
		$itemwidth = $columns > 0 ? floor( 100/$columns ) : 100;
		$float = is_rtl() ? 'right' : 'left';

		$selector = "gallery-{$instance}";

		$gallery_style = '';

		if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
			$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
			/* see gallery_shortcode() in wp-includes/media.php */
		</style>\n\t\t";
		}

		$size_class = sanitize_html_class( $atts['size'] );
		$gallery_div = "<div id='$selector' class='vce-gallery gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";

		$output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );


		$output .= '<div class="vce-gallery-big">';
		global $vce_sidebar_opts;
		$big_size = $vce_sidebar_opts['use_sidebar'] == 'none' ? 'vce-lay-a-nosid' : 'vce-lay-a';
		$vce_i = 0;
		foreach ( $attachments as $id => $attachment ) {
			$image_output = wp_get_attachment_link( $id, $big_size, false, false );
			$display = ( $vce_i == 0 ) ? '' : 'style="display:none;"';
			$output .= '<div class="big-gallery-item item-'.$vce_i.'" '.$display.'>';
			$output .= "
			<{$icontag} class='gallery-icon'>
				$image_output
			</{$icontag}>";

			if ( $captiontag && trim( $attachment->post_excerpt ) ) {
				$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize( $attachment->post_excerpt ) . "
				</{$captiontag}>";
			}
			$output .= '</div>';
			$vce_i++;
		}
		$output .= '</div>';

		if ( $columns > 1 ) {
			$output .= '<div class="vce-gallery-slider" data-columns="'.$columns.'">';
			$i = 0; $vce_i = 0;
			foreach ( $attachments as $id => $attachment ) {

				if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
					$image_output = wp_get_attachment_link( $id, $atts['size'], false, false );
				} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
					$image_output = wp_get_attachment_image( $id, $atts['size'], false );
				} else {
					$image_output = wp_get_attachment_link( $id, $atts['size'], true, false );
				}
				$image_meta  = wp_get_attachment_metadata( $id );

				$orientation = '';
				if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
					$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
				}
				$output .= "<{$itemtag} class='gallery-item' data-item='".$vce_i."'>";
				$output .= "
			<{$icontag} class='gallery-icon {$orientation}'>
				$image_output
			</{$icontag}>";
				$output .= "</{$itemtag}>";
				if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
					$output .= '<br style="clear: both" />';
				}

				$vce_i++;

			}

			if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
				$output .= "
			<br style='clear: both' />";
			}

			$output .= "</div>";
		}
		$output .= "</div>\n";

		return $output;
	}
endif;


/* Pre get posts */
if ( !function_exists( 'vce_pre_get_posts' ) ):
	function vce_pre_get_posts( $query ) {

		if ( !is_admin() && $query->is_main_query() && !$query->is_feed() ) {

			/* Check whether to change number of posts per page for specific archive template if specifed in theme options */
			$template = vce_detect_template();
			$ppp = vce_get_option( $template.'_ppp' );

			if ( $ppp == 'custom' ) {

				$ppp = absint( vce_get_option( $template.'_ppp_num' ) );
				$query->set( 'posts_per_page', $ppp );

			}

			if ( $template == 'category' ) {
					$obj = get_queried_object();
					$cat_meta = vce_get_category_meta( $obj->term_id );
					if ( $cat_meta['layout'] != 'inherit' && !empty( $cat_meta['ppp'] ) ) {
						$ppp = $cat_meta['ppp'];
						$query->set( 'posts_per_page', $ppp );
					}
			}

			/*Check for featured area on category page and exclude those posts from main post listing */
			if ( $template == 'category' ) {

				global $vce_cat_fa_args;
				$vce_cat_fa_args = vce_get_fa_cat_args();

				if ( vce_get_option( 'category_fa_not_duplicate' ) ) {
					if ( isset( $vce_cat_fa_args['fa_posts'] ) && !empty( $vce_cat_fa_args['fa_posts'] ) ) {
						$exclude_ids = array();
						foreach ( $vce_cat_fa_args['fa_posts']->posts as $p ) {
							$exclude_ids[] = $p->ID;
						}
						$query->set( 'post__not_in', $exclude_ids );
					}
				}
			}


		}

	}
endif;

add_action( 'pre_get_posts', 'vce_pre_get_posts' );



/* Rrevent redirect issue that may brake home page pagination caused by some plugins */
function vce_disable_redirect_canonical( $redirect_url ) {
	if ( is_page_template( 'template-modules.php' ) && is_paged() ) {
		$redirect_url = false;
	}
	return $redirect_url;
}

add_filter( 'redirect_canonical', 'vce_disable_redirect_canonical' );


/* Modify WooCommerce wrappers */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', 'vce_woocommerce_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'vce_woocommerce_wrapper_end', 10 );

if ( !function_exists( 'vce_woocommerce_wrapper_start' ) ):
	function vce_woocommerce_wrapper_start() {
		echo '<div id="content" class="container site-content"><div id="primary" class="vce-main-content"><main id="main" class="main-box main-box-single">';
	}
endif;

if ( !function_exists( 'vce_woocommerce_wrapper_end' ) ):
	function vce_woocommerce_wrapper_end() {
		echo '</main></div>';
	}
endif;


/**
 * Woocommerce  Cart Elements
 *
 * @return bool
 * @since  2.6
 */
if ( !function_exists( 'vce_woocommerce_cart_elements' ) ):
	function vce_woocommerce_cart_elements() {
		if( !vce_is_woocommerce_active() ){ return; }
		$elements = array();
		$elements['cart_url'] = wc_get_cart_url(); 
		$elements['products_count'] = WC()->cart->get_cart_contents_count();
		return $elements;
	}
endif;

/**
 * Woocommerce Ajaxify Cart
 *
 * @return bool
 * @since  2.6
 */

add_filter( 'woocommerce_add_to_cart_fragments', 'vce_woocommerce_ajax_fragments' );

if ( !function_exists( 'vce_woocommerce_ajax_fragments' ) ):
	
	function vce_woocommerce_ajax_fragments( $fragments ) {
		
		ob_start();	
		$elements = vce_woocommerce_cart_elements();
		if (!empty($elements)) :
		?>
			<a class="vce-custom-cart" href="<?php echo esc_attr($elements['cart_url']); ?>">
				<i class="fa fa-shopping-cart" aria-hidden="true">
					<?php if( $elements['products_count'] > 0 ) : ?>
						<span class="vce-cart-count"><?php echo absint( $elements['products_count'] ); ?></span>
					<?php endif; ?>
				</i>
			</a>
		<?php
		endif;
		$fragments['a.vce-custom-cart'] = ob_get_clean();
		return $fragments;
	}
endif;



	/**
 * Widget display callback
 *
 * Check if padding option is selected and add no-padding class to widget
 *
 * @return void
 * @since  2.4
 */

add_filter( 'dynamic_sidebar_params', 'vce_modify_widget_display' );

if ( !function_exists( 'vce_modify_widget_display' ) ) :

	function vce_modify_widget_display( $params ) {

		if( !isset( $params[0]['id']) ){
			return $params;
		}

		if ( strpos( $params[0]['id'], 'vce_footer_sidebar' ) !== false ) {
			return $params; //do not apply styling for footer widgets
		}

		global $wp_registered_widgets;

		$widget_id              = $params[0]['widget_id'];
		$widget_obj             = $wp_registered_widgets[$widget_id];
		$widget_num             = $widget_obj['params'][0]['number'];
		$widget_opt = get_option( $widget_obj['callback'][0]->option_name );

		if ( isset( $widget_opt[$widget_num]['vce-padding'] ) && $widget_opt[$widget_num]['vce-padding'] == 1 ) {
			$params[0]['before_widget'] = preg_replace( '/class="/', "class=\"vce-no-padding ", $params[0]['before_widget'], 1 );
		}

		return $params;

	}

endif;


/**
 * Add comment form default fields args filter 
 * to replace comment fields labels
 */

add_filter('comment_form_default_fields', 'vce_comment_fields_labels');

if(!function_exists('vce_comment_fields_labels')):
function vce_comment_fields_labels($fields){

	$replace = array(
		'author' => array(
			'old' => esc_html__( 'Name', 'voice' ),
			'new' =>__vce( 'comment_name' )
		),
		'email' => array(
			'old' => esc_html__( 'Email', 'voice' ),
			'new' =>__vce( 'comment_email' )
		),
		'url' => array(
			'old' => esc_html__( 'Website', 'voice' ),
			'new' =>__vce( 'comment_website' )
		),

		'cookies' => array(
			'old' => esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'voice' ),
			'new' =>__vce( 'comment_cookie_gdpr' )
		)
	);

	foreach($fields as $key => $field){

		if(array_key_exists($key, $replace)){
			$fields[$key] = str_replace($replace[$key]['old'], $replace[$key]['new'], $fields[$key]);
		}

	}
	
	return $fields;

}

endif;






/**
 * Filter for social share options on frontend in the_content filter
 *
 * @param array $options - Array of options 
 * @return array
 * @since  2.8.5
 */
add_filter( 'meks_ess_modify_options', 'vce_social_share_modify_options' );

if ( !function_exists( 'vce_social_share_modify_options' ) ):
	function vce_social_share_modify_options( $options ) {

		$options['location'] = 'custom';
		$options['post_type'] = array('post', 'page');
		$options['label_share']['active'] = '0';

		return $options;
	}
endif;

/**
 * Filter for social share default options
 *
 * @param array $options - Array of options 
 * @return array
 * @since  1.2
 */
add_filter( 'meks_ess_modify_defaults', 'voice_social_share_modify_defaults' );

if ( !function_exists( 'voice_social_share_modify_defaults' ) ):
	function voice_social_share_modify_defaults( $defaults ) {

		$defaults['style'] = '2';

		return $defaults;
	}
endif;
