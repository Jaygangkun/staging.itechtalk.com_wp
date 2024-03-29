<?php
/**
 * Get default option by passing option id
 *
 * @param string  $option
 * @return array|mixed|false
 * @param since   2.9
 */

if ( !function_exists( 'vce_get_default_option' ) ):
	function vce_get_default_option( $option ) {


		if ( empty( $option ) ) {
			return false;
		}

		$defaults = array(
			
			'header_layout' => 1,
			'header_height' => 150,
			'header_ad' => '',
			'logo' => array( 'url' => esc_url( get_parent_theme_file_uri( 'assets/img/voice_logo.png' ) ) ),
			'logo_retina' => array(),
			'logo_mobile' => array(),
			'logo_mobile_retina' => array(),
			'logo_position' => array(
				'padding-bottom' => '15',
				'padding-right' => '0',
			),
			'logo_custom_url' => '',
			'color_website_title' => '#232323',
			'header_description' => true,
			'color_website_desc' => '#aaaaaa',
			'header_search' => true,
			'color_header_bg' => '#ffffff',
			'sticky_header' => true,
			'sticky_header_offset' => '700',
			'sticky_header_logo' => array(),
			'sticky_header_menu' => 'vce_main_navigation_menu',
			'top_bar' => true,
			'top_bar_mobile' => true,
			'top_bar_mobile_group' => false,
			'top_bar_left' => 'top-navigation',
			'top_bar_center' => 0,
			'top_bar_right' => 'social-menu',
			'color_top_bar_bg' => '#3a3a3a',
			'color_top_bar_txt' => '#ffffff',
			'color_header_nav_bg' => '#fcfcfc',
			'color_header_txt' => '#4a4a4a',
			'color_header_acc' => '#cf4d35',
			'color_navigation_cat' => false,
			'color_header_submenu_bg' => '#ffffff',
			'use_mega_menu' => true,
			'ajax_mega_menu' => true,
			'mega_menu_subcats' => false,
			'mega_menu_slider' => false,
			'mega_menu_slider_posts' => 8,
			'body_style' => array(
				'background-color' => '#f0f0f0',
			),
			'color_box_title_bg' => '#ffffff',
			'color_box_title_txt' => '#232323',
			'color_box_bg' => '#f9f9f9',
			'color_content_bg' => '#ffffff',
			'color_content_title_txt' => '#232323',
			'color_content_txt' => '#444444',
			'color_content_acc' => '#cf4d35',
			'color_content_meta' => '#9b9b9b',
			'color_pagination_bg' => '#f3f3f3',
			'add_sidebars' => 5,
			'color_widget_title_bg' => '#ffffff',
			'color_widget_title_txt' => '#232323',
			'color_widget_bg' => '#f9f9f9',
			'color_widget_txt' => '#444444',
			'color_widget_acc' => '#cf4d35',
			'color_widget_sub' => '#f3f3f3',
			'footer_display' => true,
			'footer_layout' => '3_3_3',
			'color_footer_bg' => '#373941',
			'color_footer_title_txt' => '#ffffff',
			'color_footer_txt' => '#f9f9f9',
			'color_footer_acc' => '#cf4d35',
			'enable_copyright' => true,
			'footer_copyright' => wp_kses_post( sprintf( __( 'Copyright &copy; {current_year}. Created by %s. Powered by %s.', 'voice' ), '<a href="https://mekshq.com" target="_blank">Meks</a>', '<a href="https://www.wordpress.org" target="_blank">WordPress</a>' ) ),
			'footer_bar_left' => 'copyright-text',
			'footer_bar_center' => 0,
			'footer_bar_right' => 'footer-menu',
			'lay_fa_big_cat' => true,
			'lay_fa_big_title_limit' => '',
			'lay_fa_big_meta' =>
			array(
				'date' => 1,
				'comments' => 0,
				'author' => 1,
				'views' => 0,
				'rtime' => 0,
				'modified_date' => 0,
			),
			'lay_fa_big_autoplay' => '',
			'lay_fa_big_opc' => array(
				1 => 0.5,
				2 => 0.7,
			),
			'lay_fa_grid_cat' => true,
			'lay_fa_grid_title_limit' => '',
			'lay_fa_grid_meta' => array(
				'date' => 1,
				'comments' => 0,
				'author' => 0,
				'views' => 0,
				'rtime' => 0,
				'modified_date' => 0,
			),
			'lay_fa_grid_center' => false,
			'lay_fa_grid_autoplay' => '',
			'lay_fa_grid_opc' => array(
				1 => 0.5,
				2 => 0.8,
			),
			'lay_fa_grid_big_cat' => true,
			'lay_fa_grid_big_title_limit' => '',
			'lay_fa_grid_big_meta' =>
			array(
				'date' => 1,
				'comments' => 0,
				'author' => 0,
				'views' => 0,
				'rtime' => 0,
				'modified_date' => 0,
			),
			'lay_fa_grid_big_autoplay' => '',
			'lay_fa_grid_big_opc' => array(
				1 => 0.5,
				2 => 0.8,
			),
			'lay_a_cat' => true,
			'lay_a_title_limit' => '',
			'lay_a_meta' => array(
				'date' => 1,
				'comments' => 1,
				'author' => 1,
				'views' => 0,
				'rtime' => 0,
				'modified_date' => 0,
			),
			'lay_a_content_type' => 'excerpt',
			'lay_a_excerpt' => true,
			'lay_a_excerpt_limit' => '230',
			'lay_a_readmore' => false,
			'lay_a_icon' => true,
			'lay_b_cat' => true,
			'lay_b_title_limit' => '',
			'lay_b_meta' => array(
				'date' => 1,
				'comments' => 1,
				'author' => 0,
				'views' => 0,
				'rtime' => 0,
				'modified_date' => 0,
			),
			'lay_b_excerpt' => false,
			'lay_b_excerpt_limit' => '100',
			'lay_b_icon' => true,
			'lay_c_cat' => true,
			'lay_c_title_limit' => '65',
			'lay_c_meta' => array(
				'date' => 1,
				'comments' => 0,
				'author' => 0,
				'views' => 0,
				'rtime' => 0,
				'modified_date' => 0,
			),
			'lay_c_excerpt' => true,
			'lay_c_readmore' => false,
			'lay_c_excerpt_limit' => '100',
			'lay_c_icon' => true,
			'lay_d_cat' => true,
			'lay_d_title_limit' => '55',
			'lay_d_meta' => array(
				'date' => 0,
				'comments' => 0,
				'author' => 0,
				'views' => 0,
				'rtime' => 0,
				'modified_date' => 0,
			),
			'lay_d_icon' => true,
			'lay_e_title' => true,
			'lay_e_title_limit' => '',
			'lay_e_meta' => array(
				'date' => 0,
				'comments' => 0,
				'author' => 0,
				'views' => 0,
				'rtime' => 0,
				'modified_date' => 0,
			),
			'lay_e_icon' => true,
			'lay_f_title_limit' => '',
			'lay_g_cat' => true,
			'lay_g_title_limit' => '',
			'lay_g_meta' => array(
				'date' => 1,
				'comments' => 1,
				'author' => 1,
				'views' => 0,
				'rtime' => 0,
				'modified_date' => 0,
			),
			'lay_g_excerpt' => false,
			'lay_g_excerpt_limit' => '',
			'lay_g_icon' => true,
			'lay_h_cat' => true,
			'lay_h_title_limit' => '65',
			'lay_h_meta' => array(
				'date' => 1,
				'comments' => 0,
				'author' => 0,
				'views' => 0,
				'rtime' => 0,
				'modified_date' => 0,
			),
			'lay_h_excerpt' => false,
			'lay_h_excerpt_limit' => '100',
			'single_layout' => 'classic',
			'single_content_width' => 600,
			'single_content_width_full' => 600,
			'single_use_sidebar' => 'right',
			'single_sidebar' => 'vce_default_sidebar',
			'single_sticky_sidebar' => 'vce_default_sticky_sidebar',
			'single_meta' => array(
				'date' => 1,
				'comments' => 1,
				'author' => 1,
				'views' => 1,
				'rtime' => 0,
				'modified_date' => 0,
			),
			'show_cat' => true,
			'show_fimg' => true,
			'show_fimg_cap' => false,
			'show_author_img' => true,
			'show_headline' => true,
			'show_tags' => true,
			'show_share' => true,
			'social_share' => array(
				'facebook' => 1,
				'twitter' => 1,
				'googleplus' => 1,
				'pinterest' => 1,
				'linkedin' => 1,
				'reddit' => 0,
				'stumbleupon' => 0,
				'vk' => 0,
				'email' => 0,
				'whatsapp' => 0,
			),
			'show_prev_next' => true,
			'prev_next_cat' => false,
			'show_author_box' => true,
			'author_box_position' => 'down',
			'comments_position' => false,
			'single_infinite_scroll' => false,
			'show_related' => true,
			'related_layout' => 'd',
			'related_limit' => '6',
			'related_type' => 'cat',
			'related_order' => 'date',
			'related_time' => '0',
			'show_paginated' => 'above',
			'show_paginated_fimg' => false,
			'show_paginated_headline' => false,
			'page_layout' => 'classic',
			'page_content_width' => 600,
			'page_content_width_full' => 600,
			'page_use_sidebar' => 'right',
			'page_sidebar' => 'vce_default_sidebar',
			'page_sticky_sidebar' => 'vce_default_sticky_sidebar',
			'page_show_fimg' => true,
			'page_show_fimg_cap' => false,
			'page_show_comments' => true,
			'page_show_share' => false,
			'page_social_share' => array(
				'facebook' => 1,
				'twitter' => 1,
				'googleplus' => 1,
				'pinterest' => 1,
				'linkedin' => 1,
				'whatsapp' => 0,
				'reddit' => 0,
				'stumbleupon' => 0,
				'vk' => 0,
				'email' => 0,
			),
			'category_fa' => false,
			'category_fa_layout' => 'full_grid',
			'category_fa_limit' => 8,
			'category_fa_order' => 'date',
			'category_fa_time' => '0',
			'category_fa_not_duplicate' => true,
			'category_fa_hide_on_pages' => true,
			'category_layout' => 'b',
			'category_use_top' => false,
			'category_top_layout' => 'a',
			'category_top_limit' => 1,
			'category_use_sidebar' => 'right',
			'category_sidebar' => 'vce_default_sidebar',
			'category_sticky_sidebar' => 'vce_default_sticky_sidebar',
			'category_pagination' => 'load-more',
			'category_ppp' => 'inherit',
			'category_ppp_num' => '10',
			'tag_layout' => 'd',
			'tag_use_sidebar' => 'right',
			'tag_sidebar' => 'vce_default_sidebar',
			'tag_sticky_sidebar' => 'vce_default_sticky_sidebar',
			'tag_pagination' => 'load-more',
			'tag_ppp' => 'inherit',
			'tag_ppp_num' => '10',
			'author_layout' => 'c',
			'author_use_sidebar' => 'right',
			'author_sidebar' => 'vce_default_sidebar',
			'author_sticky_sidebar' => 'vce_default_sticky_sidebar',
			'author_pagination' => 'load-more',
			'author_ppp' => 'inherit',
			'author_ppp_num' => '10',
			'search_layout' => 'd',
			'search_use_sidebar' => 'right',
			'search_sidebar' => 'vce_default_sidebar',
			'search_sticky_sidebar' => 'vce_default_sticky_sidebar',
			'search_pagination' => 'load-more',
			'search_ppp' => 'inherit',
			'search_ppp_num' => '10',
			'posts_page_layout' => 'b',
			'posts_page_pagination' => 'load-more',
			'posts_page_ppp' => 'inherit',
			'posts_page_ppp_num' => '10',
			'archive_layout' => 'b',
			'archive_use_sidebar' => 'right',
			'archive_sidebar' => 'vce_default_sidebar',
			'archive_sticky_sidebar' => 'vce_default_sticky_sidebar',
			'archive_pagination' => 'load-more',
			'archive_ppp' => 'inherit',
			'archive_ppp_num' => '10',
			'main_font' => array(
				'google' => true,
				'font-weight' => '400',
				'font-family' => 'Open Sans',
				'subsets' => 'latin-ext',
			),
			'h_font' => array(
				'google' => true,
				'font-weight' => '400',
				'font-family' => 'Roboto Slab',
				'subsets' => 'latin-ext',
			),
			'nav_font' => array(
				'font-weight' => '400',
				'font-family' => 'Roboto Slab',
				'subsets' => 'latin-ext',
			),
			'font_size_p' => '16',
			'font_size_nav' => '16',
			'font_size_module_title' => '22',
			'font_size_single_title' => '45',
			'font_size_entry_text' => '22',
			'font_size_widget_title' => '18',
			'font_size_small' => '14',
			'font_size_fa_big' => '52',
			'font_size_fa_medium' => '34',
			'font_size_fa_small' => '22',
			'font_size_layout_a' => '34',
			'font_size_layout_b' => '24',
			'font_size_layout_c' => '22',
			'font_size_layout_d' => '15',
			'font_size_layout_e' => '14',
			'font_size_layout_f' => '14',
			'font_size_layout_g' => '30',
			'font_size_layout_h' => '24',
			'font_size_h1' => '45',
			'font_size_h2' => '40',
			'font_size_h3' => '35',
			'font_size_h4' => '25',
			'font_size_h5' => '20',
			'font_size_h6' => '18',
			'font_size_meta_data_smaller' => '13',
			'font_size_meta_data_bigger' => '14',
			'text_upper' => array(
				'site-title a' => 0,
				'site-description' => 0,
				'nav-menu li a' => 0,
				'entry-title' => 0,
				'main-box-title' => 0,
				'sidebar .widget-title' => 0,
				'site-footer .widget-title' => 0,
				'vce-featured-link-article' => 0,
			),
			'ad_below_header' => '',
			'ad_above_footer' => '',
			'ad_below_single_header' => '',
			'ad_above_single' => '',
			'ad_below_single' => '',
			'ad_between_posts' => '',
			'ad_between_posts_position' => 4,
			'ad_exclude_404' => false,
			'ad_exclude_from_pages' => array(),
			'rtl_mode' => false,
			'rtl_lang_skip' => '',
			'default_fimg' => array( 'url' => esc_url( get_parent_theme_file_uri( 'assets/img/voice_default.jpg' ) ) ),
			'more_string' => '...',
			'time_ago' => true,
			'time_ago_limit' => '0',
			'ago_before' => false,
			'views_forgery' => '',
			'scroll_to_top' => true,
			'scroll_to_top_color' => '#323232',
			'use_gallery' => true,
			'img_zoom' => true,
			'404_img' =>array(),
			'multibyte_excerpts' => false,
			'multibyte_rtime' => false,
			'words_read_per_minute' => 200,
			'primary_category' => false,
			'product_use_sidebar' => 'right',
			'product_sidebar' => 'vce_default_sidebar',
			'product_sticky_sidebar' => 'vce_default_sticky_sidebar',
			'product_cat_use_sidebar' => 'right',
			'product_cat_sidebar' => 'vce_default_sidebar',
			'product_cat_sticky_sidebar' => 'vce_default_sticky_sidebar',
			'woocommerce_cart_icon' => false,
			'forum_use_sidebar' => 'right',
			'forum_sidebar' => 'vce_default_sidebar',
			'forum_sticky_sidebar' => 'vce_default_sticky_sidebar',
			'topic_use_sidebar' => 'right',
			'topic_sidebar' => 'vce_default_sidebar',
			'topic_sticky_sidebar' => 'vce_default_sticky_sidebar',
			'enable_translate' => '1',
			'min_css' => true,
			'min_js' => true,
			'image_sizes' => array(
				'vce-lay-a' => true,
				'vce-lay-a-nosid' => true,
				'vce-lay-b' => true,
				'vce-lay-d' => true,
				'vce-fa-full' => true,
				'vce-fa-grid' => true,
				'vce-fa-big-grid' => true,
			)
		);

		$defaults = apply_filters( 'vce_modify_default_options', $defaults );

		if ( isset( $defaults[$option] ) ) {
			return $defaults[$option];
		}

		return false;
	}
endif;
