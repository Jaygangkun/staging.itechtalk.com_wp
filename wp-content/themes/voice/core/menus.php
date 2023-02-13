<?php

/*-----------------------------------------------------------------------------------*/
/*	Register Menus
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'vce_register_menus' ) ) :
    function vce_register_menus() {
	    register_nav_menu('vce_main_navigation_menu', esc_html__( 'Main Navigation' , 'voice'));
	    register_nav_menu('vce_top_navigation_menu', esc_html__( 'Top Menu' , 'voice'));
	   	register_nav_menu('vce_social_menu', esc_html__( 'Social menu' , 'voice'));
	    register_nav_menu('vce_footer_menu', esc_html__( 'Footer Menu' , 'voice'));
	    register_nav_menu('vce_404_menu', esc_html__( '404 Menu' , 'voice'));
    }
endif;


/* Add items dynamically to menu*/
if ( !function_exists( 'vce_extend_navigation' ) ):
	function vce_extend_navigation( $items, $args ) {
		if ( $args->theme_location == 'vce_main_navigation_menu'  ) {
			
			if ( vce_get_option( 'header_search' ) ) {
				$items .= '<li class="search-header-wrap"><a class="search_header" href="javascript:void(0)"><i class="fa fa-search"></i></a><ul class="search-header-form-ul"><li>';				
				$items.= get_search_form( false );
				$items .= '</li></ul></li>';
			}

			if ( vce_get_option( 'woocommerce_cart_icon' ) ) {

				$elements = vce_woocommerce_cart_elements();
				if(!empty($elements)){
					$items .= '<li class="vce-cart-icon"><a class="vce-custom-cart" href="'. esc_attr($elements['cart_url']) . '"><i class="fa fa-shopping-cart">';
					if( $elements['products_count'] > 0 ) { 
						$items .= '<span class="vce-cart-count"> '. $elements['products_count'] .'</span>';
					}
					$items .= '</i></a></li>';
				}
			}

		}
		
		return $items;
	}
endif;

add_action( 'wp_nav_menu_items', 'vce_extend_navigation', 10, 2 );


/* Add support for our built in mega menu system */
if ( !function_exists( 'vce_add_mega_menu_support' ) ):
	function vce_add_mega_menu_support() {

		if ( vce_get_option( 'use_mega_menu' ) ) {

			add_filter( 'wp_setup_nav_menu_item', 'vce_add_custom_nav_fields' );
			add_action( 'wp_update_nav_menu_item', 'vce_update_custom_nav_fields', 10, 3 );
			add_filter( 'wp_edit_nav_menu_walker', 'vce_edit_menu_walker', 10, 2 );
			add_filter( 'nav_menu_css_class', 'vce_add_class_to_menu', 10, 2 );
			add_filter( 'nav_menu_link_attributes', 'vce_nav_link_atts', 10, 3 );
		}
	}
endif;

add_action( 'init', 'vce_add_mega_menu_support' );

/* Add custom fields to menu */
if ( !function_exists( 'vce_add_custom_nav_fields' ) ):
	function vce_add_custom_nav_fields( $menu_item ) {
		$menu_item->mega_menu_cat = get_post_meta( $menu_item->ID, '_vce_mega_menu_cat', true ) ? 1 : 0;
		$menu_item->mega_menu = get_post_meta( $menu_item->ID, '_vce_mega_menu', true ) ? 1 : 0;
		return $menu_item;
	}
endif;


/* Save custom fiedls to menu */
if ( !function_exists( 'vce_update_custom_nav_fields' ) ):
	function vce_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {

		if ( $args['menu-item-object'] == 'category' ) {
			$value = isset( $_REQUEST['menu-item-mega-menu-cat'][$menu_item_db_id] ) ? 1 : 0;
			update_post_meta( $menu_item_db_id, '_vce_mega_menu_cat', $value );
		} else {
			$value = isset( $_REQUEST['menu-item-mega-menu'][$menu_item_db_id] ) ? 1 : 0;
			update_post_meta( $menu_item_db_id, '_vce_mega_menu', $value );
		}
	}
endif;



/* Edit nav menu walker */
if ( !function_exists( 'vce_edit_menu_walker' ) ):
	function vce_edit_menu_walker( $walker, $menu_id ) {

		class vce_Walker_Nav_Menu_Edit extends Walker_Nav_Menu_Edit {

			public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
				$temp_output = '';
				$mega_menu_html = '';

				if ( $item->object == 'category' ) {
					$mega_menu_html .= '<p class="field-custom description description-wide">
		                <label for="edit-menu-item-mega-'.esc_attr($item->db_id).'">
		        		<input type="checkbox" id="edit-menu-item-mega-'.esc_attr($item->db_id).'" class="widefat code edit-menu-item-custom" name="menu-item-mega-menu-cat['.esc_attr($item->db_id).']" value="1" '.checked( $item->mega_menu_cat, 1, false ). ' />
		                '.esc_html__( 'Mega Menu (display posts from category)', 'voice' ).'</label>
		            </p>';
				} else {
					$mega_menu_html .= '<p class="field-custom description description-wide">
		                <label for="edit-menu-item-mega-'.esc_attr($item->db_id).'">
		        		<input type="checkbox" id="edit-menu-item-mega-'.esc_attr($item->db_id).'" class="widefat code edit-menu-item-custom" name="menu-item-mega-menu['.esc_attr($item->db_id).']" value="1" '.checked( $item->mega_menu, 1, false ). ' />
		                '.esc_html__( 'Mega Menu (classic)', 'voice' ).'
		            </label></p>';
				}

				parent::start_el( $temp_output, $item, $depth, $args, $id );

				$temp_output = preg_replace( '/(?=<div.*submitbox)/', $mega_menu_html, $temp_output );

				$output .= $temp_output;
			}

		}

		return 'vce_Walker_Nav_Menu_Edit';
	}
endif;


/* Add class to menu category item when mega menu is detected */
if ( !function_exists( 'vce_add_class_to_menu' ) ):
	function vce_add_class_to_menu( $classes, $item ) {

		if ( $item->object == 'category' && !$item->menu_item_parent && isset( $item->mega_menu_cat ) && $item->mega_menu_cat ) {
			$classes[] = 'vce-mega-cat';
		}

		if ( $item->object == 'category' ) {
			$classes[] = 'vce-cat-'.$item->object_id;
		}

		if ( !$item->menu_item_parent && isset( $item->mega_menu ) && $item->mega_menu ) {
			$classes[] = 'vce-mega-menu';
		}

		return $classes;

	}
endif;


/* Add category id to category link with mega menu enabled */
if ( !function_exists( 'vce_nav_link_atts' ) ):
	function vce_nav_link_atts( $atts, $item, $args ) {

		if ( $item->object == 'category' && !$item->menu_item_parent && isset( $item->mega_menu_cat ) && $item->mega_menu_cat ) {
			$atts['data-mega_cat_id'] = $item->object_id;
		}
		return $atts;
	}
endif;

if ( !function_exists( 'vce_load_mega_menu' ) ) :

	function vce_load_mega_menu( $cat_id ) {
		$output = '';
		$show_subcats = vce_get_option( 'mega_menu_subcats' ) ? true : false;
		$use_slider   = vce_get_option( 'mega_menu_slider' ) ? true : false;
		$slider_posts = vce_get_option( 'mega_menu_slider_posts' );

		if ( $show_subcats ) {

			$args = array(
				'parent' => $cat_id,
				'hide_empty' => false,
			);
			$cats = get_categories( $args );

			if ( count( $cats ) > 0 ) {

				$output .= '<li class="vce-mega-subcats"><ul>';

				foreach ( $cats as $cat ) :

					$link = get_category_link( $cat );

				$output .=
					"<li>
						<a href=\"${link}\">{$cat->name}</a>
					</li>
					";

				endforeach;

				$output .= '</ul></li>';

			}

		}

		$has_subcats = $show_subcats && isset($cats) && !empty($cats) ? true : false;
		$ppp = $has_subcats ? 4 : 5 ;

		$args = array(
			'post_type'    => 'post',
			'post_status'	=> 'publish',
			'cat'      => $cat_id,
			'posts_per_page' => $use_slider ? $slider_posts : $ppp
		);

		$q = new WP_Query( $args );

		$subcats_class = $has_subcats ? 'vce-has-subcats' : '';
		$output .= '<li class="vce-mega-menu-posts-wrap '.esc_attr($subcats_class).'" data-numposts="'.esc_attr($ppp).'"><ul>';

		ob_start();

		if ( $q->have_posts() ) :
			while ( $q->have_posts() ) : $q->the_post();
			get_template_part( 'template-parts/loops/mega-menu' );
		endwhile;
		endif;

		wp_reset_postdata();

		$output .= ob_get_clean();


		$output .= '</ul></li>';

		return $output;
	}

endif;


class Voice_Menu_Walker extends Walker_Nav_menu
{
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$use_ajax_menu = vce_get_option( 'ajax_mega_menu' ) ? true : false;

		if ( $depth == 0 && $item->mega_menu_cat ) {
			
		
			$output .= '<ul class="vce-mega-menu-wrapper">';
			$output .= ( !$use_ajax_menu ) ? vce_load_mega_menu( $item->object_id ) : '';
			$output .= '</ul>';

		}
	}
}
?>