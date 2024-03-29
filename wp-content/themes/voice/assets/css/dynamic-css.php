<?php

/* Font styles */
$main_font = vce_get_font_option( 'main_font' );
$h_font = vce_get_font_option( 'h_font' );
$nav_font = vce_get_font_option( 'nav_font' );

/* Font sizes */
$font_size_p =  number_format( absint(vce_get_option( 'font_size_p' ) ) / 10, 1 );
$font_size_entry_text =  number_format( absint(vce_get_option( 'font_size_entry_text' ) ) / 10, 1);
$font_size_nav = number_format( absint(vce_get_option( 'font_size_nav') ) / 10, 1 );
$font_size_widget_title = number_format( absint(vce_get_option( 'font_size_widget_title' ) ) / 10, 1 );
$font_size_small = number_format( absint(vce_get_option( 'font_size_small' ) ) / 10, 1 );
$font_size_fa_big = number_format( absint(vce_get_option( 'font_size_fa_big' ) ) / 10, 1 );
$font_size_fa_medium = number_format( absint(vce_get_option( 'font_size_fa_medium' ) ) / 10, 1 );
$font_size_fa_small = number_format( absint(vce_get_option( 'font_size_fa_small' ) ) / 10, 1 );
$font_size_module_title = number_format( absint(vce_get_option( 'font_size_module_title' ) ) / 10, 1 );
$font_size_single_title = number_format( absint(vce_get_option( 'font_size_single_title' ) ) / 10, 1);
$font_size_meta_data_smaller = number_format( absint(vce_get_option( 'font_size_meta_data_smaller' ) ) / 10, 1 );
$font_size_meta_data_bigger = number_format( absint(vce_get_option( 'font_size_meta_data_bigger' ) ) / 10, 1 );
$font_size_h2 = number_format( absint(vce_get_option( 'font_size_h2' ) ) / 10, 1 );
$font_size_h3 = number_format( absint(vce_get_option( 'font_size_h3' ) ) / 10, 1 );
$font_size_h4 = number_format( absint(vce_get_option( 'font_size_h4' ) ) / 10, 1 );
$font_size_h5 = number_format( absint(vce_get_option( 'font_size_h5' ) ) / 10, 1 );
$font_size_h6 = number_format( absint(vce_get_option( 'font_size_h6' ) ) / 10, 1 );
$font_size_layout_a = number_format( absint(vce_get_option( 'font_size_layout_a' ) ) / 10, 1 );
$font_size_layout_b = number_format( absint(vce_get_option( 'font_size_layout_b' ) ) / 10, 1 );
$font_size_layout_c = number_format( absint(vce_get_option( 'font_size_layout_c' ) ) / 10, 1 );
$font_size_layout_d = number_format( absint(vce_get_option( 'font_size_layout_d' ) ) / 10, 1 );
$font_size_layout_e = number_format( absint(vce_get_option( 'font_size_layout_e' ) ) / 10, 1 );
$font_size_layout_f = number_format( absint(vce_get_option( 'font_size_layout_f' ) ) / 10, 1 );
$font_size_layout_g = number_format( absint(vce_get_option( 'font_size_layout_g' ) ) / 10, 1 );
$font_size_layout_h = number_format( absint(vce_get_option( 'font_size_layout_h' ) ) / 10, 1 );

/* Background */
$body_style = vce_get_bg_styles( 'body_style' );

/* Header styling */
$color_top_bar_bg = vce_get_option( 'color_top_bar_bg' );
$color_top_bar_txt = vce_get_option( 'color_top_bar_txt' );

$header_height = absint( vce_get_option( 'header_height' ) );
$logo_position = vce_get_option( 'logo_position' );
$logo_top = isset( $logo_position['padding-bottom'] ) ? absint( $logo_position['padding-bottom'] ) : 0;
$logo_left = isset( $logo_position['padding-right'] ) ? absint( $logo_position['padding-right'] ) : 0;
$color_website_title = vce_get_option( 'color_website_title' );
$color_website_desc = vce_get_option( 'color_website_desc' );
$color_header_bg = vce_get_option( 'color_header_bg' );
$color_header_nav_bg = vce_get_option( 'color_header_nav_bg' );
$color_header_txt = vce_get_option( 'color_header_txt' );
$color_header_acc = vce_get_option( 'color_header_acc' );
$color_header_submenu_bg = vce_get_option( 'color_header_submenu_bg' );

/* Single post/page width */
$single_content_width = vce_get_option( 'single_content_width' );
$single_content_width_full = vce_get_option( 'single_content_width_full' );
$page_content_width = vce_get_option( 'page_content_width' );
$page_content_width_full = vce_get_option( 'page_content_width_full' );

/* Content styling */
$color_box_title_bg = vce_get_option( 'color_box_title_bg' );
$color_box_title_txt = vce_get_option( 'color_box_title_txt' );
$color_box_bg = vce_get_option( 'color_box_bg' );
$color_content_bg = vce_get_option( 'color_content_bg' );
$color_content_title_txt = vce_get_option( 'color_content_title_txt' );
$color_content_txt = vce_get_option( 'color_content_txt' );
$color_content_acc = vce_get_option( 'color_content_acc' );
$color_content_meta = vce_get_option( 'color_content_meta' );
$color_pagination_bg = vce_get_option( 'color_pagination_bg' );

/* Sidebar styling */
$color_widget_title_bg = vce_get_option( 'color_widget_title_bg' );
$color_widget_title_txt = vce_get_option( 'color_widget_title_txt' );
$color_widget_bg = vce_get_option( 'color_widget_bg' );
$color_widget_txt = vce_get_option( 'color_widget_txt' );
$color_widget_acc = vce_get_option( 'color_widget_acc' );
$color_widget_sub = vce_get_option( 'color_widget_sub' );

/*Footer styling */
$color_footer_bg = vce_get_option( 'color_footer_bg' );
$color_footer_title_txt = vce_get_option( 'color_footer_title_txt' );
$color_footer_txt = vce_get_option( 'color_footer_txt' );
$color_footer_acc = vce_get_option( 'color_footer_acc' );

$opacity_fa_big = vce_get_option( 'lay_fa_big_opc' );
$opacity_fa_grid = vce_get_option( 'lay_fa_grid_opc' );
$opacity_fa_grid_big = vce_get_option( 'lay_fa_grid_big_opc' );

$color_scroll_top = vce_get_option( 'scroll_to_top_color' );

?>

body, button, input, select, textarea {
    font-size: <?php echo esc_attr( $font_size_p ); ?>rem;
}
.vce-single .entry-headline p{
    font-size: <?php echo esc_attr( $font_size_entry_text ); ?>rem;
}
.main-navigation a{
    font-size: <?php echo esc_attr( $font_size_nav ); ?>rem;
}
.sidebar .widget-title{
    font-size: <?php echo esc_attr( $font_size_widget_title ); ?>rem;
}
.sidebar .widget, .vce-lay-c .entry-content, .vce-lay-h .entry-content {
    font-size: <?php echo esc_attr( $font_size_small ); ?>rem;
}
.vce-featured-link-article{
    font-size: <?php echo esc_attr( $font_size_fa_big )?>rem;
}
.vce-featured-grid-big.vce-featured-grid .vce-featured-link-article{
    font-size: <?php echo esc_attr( $font_size_fa_medium )?>rem;
}
.vce-featured-grid .vce-featured-link-article{
    font-size: <?php echo esc_attr( $font_size_fa_small )?>rem;
}

h1 { font-size: <?php echo esc_attr( $font_size_single_title ); ?>rem; }
h2 { font-size: <?php echo esc_attr( $font_size_h2 ); ?>rem; }
h3 { font-size: <?php echo esc_attr( $font_size_h3 ); ?>rem; }
h4 { font-size: <?php echo esc_attr( $font_size_h4 ); ?>rem; }
h5 { font-size: <?php echo esc_attr( $font_size_h5 ); ?>rem; }
h6 { font-size: <?php echo esc_attr( $font_size_h6 ); ?>rem; }

.comment-reply-title, .main-box-title{
    font-size: <?php echo esc_attr( $font_size_module_title ); ?>rem;
}

h1.entry-title{
    font-size: <?php echo esc_attr( $font_size_single_title ); ?>rem;
}

.vce-lay-a .entry-title a{
    font-size: <?php echo esc_attr( $font_size_layout_a ); ?>rem;
}

.vce-lay-b .entry-title{
    font-size: <?php echo esc_attr( $font_size_layout_b ); ?>rem;
}

.vce-lay-c .entry-title, .vce-sid-none .vce-lay-c .entry-title{
    font-size: <?php echo esc_attr( $font_size_layout_c ); ?>rem;
}

.vce-lay-d .entry-title{
    font-size: <?php echo esc_attr( $font_size_layout_d ); ?>rem;
}

.vce-lay-e .entry-title{
    font-size: <?php echo esc_attr( $font_size_layout_e ); ?>rem;
}

.vce-lay-f .entry-title{
    font-size: <?php echo esc_attr( $font_size_layout_f ); ?>rem;
}

.vce-lay-g .entry-title a, .vce-lay-g .entry-title a:hover{
    font-size: <?php echo esc_attr( $font_size_layout_g ); ?>rem;
}

.vce-lay-h .entry-title{
    font-size: <?php echo esc_attr( $font_size_layout_h ); ?>rem;
}

.entry-meta div,
.entry-meta div a,
.vce-lay-g .meta-item,
.vce-lay-c .meta-item{
    font-size: <?php echo esc_attr( $font_size_meta_data_bigger ); ?>rem;
}

.vce-lay-d .meta-category a,
.vce-lay-d .entry-meta div,
.vce-lay-d .entry-meta div a,
.vce-lay-e .entry-meta div,
.vce-lay-e .entry-meta div a,
.vce-lay-e .fn,
.vce-lay-e .meta-item{
    font-size: <?php echo esc_attr( $font_size_meta_data_smaller ); ?>rem;
}

body {
	<?php echo wp_kses_post( $body_style ); ?>
}
body,
.mks_author_widget h3,
.site-description,
.meta-category a,
textarea {
	font-family: <?php echo wp_kses_post( $main_font['font-family'] ); ?>;
	font-weight: <?php echo esc_attr( $main_font['font-weight'] ); ?>;
	<?php if ( isset( $main_font['font-style'] ) && !empty( $main_font['font-style'] ) ):?>
	font-style: <?php echo esc_attr( $main_font['font-style'] ); ?>;
	<?php endif; ?>
}
h1,h2,h3,h4,h5,h6,
blockquote,
.vce-post-link,
.site-title,
.site-title a,
.main-box-title,
.comment-reply-title,
.entry-title a,
.vce-single .entry-headline p,
.vce-prev-next-link,
.author-title,
.mks_pullquote,
.widget_rss ul li .rsswidget,
#bbpress-forums .bbp-forum-title,
#bbpress-forums .bbp-topic-permalink {
	font-family: <?php echo wp_kses_post( $h_font['font-family'] ); ?>;
	font-weight: <?php echo esc_attr( $h_font['font-weight'] ); ?>;
	<?php if ( isset( $h_font['font-style'] ) && !empty( $h_font['font-style'] ) ):?>
	font-style: <?php echo esc_attr( $h_font['font-style'] ); ?>;
	<?php endif; ?>
}
.main-navigation a,
.sidr a{
	font-family: <?php echo wp_kses_post( $nav_font['font-family'] ); ?>;
	font-weight: <?php echo esc_attr( $nav_font['font-weight'] ); ?>;
	<?php if ( isset( $nav_font['font-style'] ) && !empty( $nav_font['font-style'] ) ):?>
		font-style: <?php echo esc_attr( $nav_font['font-style'] ); ?>;
	<?php endif; ?>
}

.vce-single .entry-content,
.vce-single .entry-headline,
.vce-single .entry-footer,
.vce-share-bar {
	width: <?php echo absint( $single_content_width ); ?>px;
}
.vce-lay-a .lay-a-content{
	width: <?php echo absint( $single_content_width ); ?>px;
	max-width: <?php echo absint( $single_content_width ); ?>px;
}

.vce-page .entry-content,
.vce-page .entry-title-page {
	width: <?php echo absint( $page_content_width ); ?>px;
}

.vce-sid-none .vce-single .entry-content,
.vce-sid-none .vce-single .entry-headline,
.vce-sid-none .vce-single .entry-footer {
	width: <?php echo absint( $single_content_width_full ); ?>px;
}

.vce-sid-none .vce-page .entry-content,
.vce-sid-none .vce-page .entry-title-page,
.error404 .entry-content {
	width: <?php echo absint( $page_content_width_full ); ?>px;
	max-width: <?php echo absint( $page_content_width_full ); ?>px;
}
body, button, input, select, textarea{
	color: <?php echo esc_attr( $color_content_txt ); ?>;
}
h1,
h2,
h3,
h4,
h5,
h6,
.entry-title a,
.prev-next-nav a,
#bbpress-forums .bbp-forum-title, 
#bbpress-forums .bbp-topic-permalink,
.woocommerce ul.products li.product .price .amount{
	color: <?php echo esc_attr( $color_content_title_txt ); ?>;
}
a,
.entry-title a:hover,
.vce-prev-next-link:hover,
.vce-author-links a:hover,
.required,
.error404 h4,
.prev-next-nav a:hover,
#bbpress-forums .bbp-forum-title:hover, 
#bbpress-forums .bbp-topic-permalink:hover,
.woocommerce ul.products li.product h3:hover,
.woocommerce ul.products li.product h3:hover mark,
.main-box-title a:hover{
	color: <?php echo esc_attr( $color_content_acc ); ?>;
}
.vce-square,
.vce-main-content .mejs-controls .mejs-time-rail .mejs-time-current,
button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.vce-button,
.pagination-wapper a,
#vce-pagination .next.page-numbers,
#vce-pagination .prev.page-numbers,
#vce-pagination .page-numbers,
#vce-pagination .page-numbers.current,
.vce-link-pages a,
#vce-pagination a,
.vce-load-more a,
.vce-slider-pagination .owl-nav > div,
.vce-mega-menu-posts-wrap .owl-nav > div,
.comment-reply-link:hover,
.vce-featured-section a,
.vce-lay-g .vce-featured-info .meta-category a,
.vce-404-menu a,
.vce-post.sticky .meta-image:before,
#vce-pagination .page-numbers:hover,
#bbpress-forums .bbp-pagination .current,
#bbpress-forums .bbp-pagination a:hover,
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce ul.products li.product .added_to_cart,
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce ul.products li.product .added_to_cart:hover,
.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt,
.woocommerce #respond input#submit.alt:hover, 
.woocommerce a.button.alt:hover, 
.woocommerce button.button.alt:hover, 
.woocommerce input.button.alt:hover,
.woocommerce span.onsale,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.comments-holder .navigation .page-numbers.current,
.vce-lay-a .vce-read-more:hover,
.vce-lay-c .vce-read-more:hover,
body div.wpforms-container-full .wpforms-form input[type=submit], 
body div.wpforms-container-full .wpforms-form button[type=submit], 
body div.wpforms-container-full .wpforms-form .wpforms-page-button,
body div.wpforms-container-full .wpforms-form input[type=submit]:hover, 
body div.wpforms-container-full .wpforms-form button[type=submit]:hover, 
body div.wpforms-container-full .wpforms-form .wpforms-page-button:hover {
	background-color: <?php echo esc_attr( $color_content_acc ); ?>;
}
#vce-pagination .page-numbers,
.comments-holder .navigation .page-numbers{
	background: transparent;
	color: <?php echo esc_attr( $color_content_acc ); ?>;
	border: 1px solid <?php echo esc_attr( $color_content_acc ); ?>;
}
.comments-holder .navigation .page-numbers:hover{
	background: <?php echo esc_attr( $color_content_acc ); ?>;
	border: 1px solid <?php echo esc_attr( $color_content_acc ); ?>;
}
.bbp-pagination-links a{
	background: transparent;
	color: <?php echo esc_attr( $color_content_acc ); ?>;
	border: 1px solid <?php echo esc_attr( $color_content_acc ); ?> !important;	
}
#vce-pagination .page-numbers.current,
.bbp-pagination-links span.current,
.comments-holder .navigation .page-numbers.current{
	border: 1px solid <?php echo esc_attr( $color_content_acc ); ?>;
}
.widget_categories .cat-item:before,
.widget_categories .cat-item .count{
	background: <?php echo esc_attr( $color_content_acc ); ?>;
}
.comment-reply-link,
.vce-lay-a .vce-read-more,
.vce-lay-c .vce-read-more{
	border: 1px solid <?php echo esc_attr( $color_content_acc ); ?>;
}
.entry-meta div,
.entry-meta-count,
.entry-meta div a,
.comment-metadata a,
.meta-category span,
.meta-author-wrapped,
.wp-caption .wp-caption-text,
.widget_rss .rss-date,
.sidebar cite,
.site-footer cite,
.sidebar .vce-post-list .entry-meta div,
.sidebar .vce-post-list .entry-meta div a,
.sidebar .vce-post-list .fn,
.sidebar .vce-post-list .fn a,
.site-footer .vce-post-list .entry-meta div,
.site-footer .vce-post-list .entry-meta div a,
.site-footer .vce-post-list .fn,
.site-footer .vce-post-list .fn a,
#bbpress-forums .bbp-topic-started-by,
#bbpress-forums .bbp-topic-started-in,
#bbpress-forums .bbp-forum-info .bbp-forum-content,
#bbpress-forums p.bbp-topic-meta,
span.bbp-admin-links a,
.bbp-reply-post-date,
#bbpress-forums li.bbp-header,
#bbpress-forums li.bbp-footer,
.woocommerce .woocommerce-result-count,
.woocommerce .product_meta{
	color: <?php echo esc_attr( $color_content_meta ); ?>;
}
.main-box-title, .comment-reply-title, .main-box-head{
	background: <?php echo esc_attr( $color_box_title_bg ); ?>;
	color: <?php echo esc_attr( $color_box_title_txt ); ?>;
}
.main-box-title a{
	color: <?php echo esc_attr( $color_box_title_txt ); ?>;	
}
.sidebar .widget .widget-title a{
	color: <?php echo esc_attr( $color_box_title_txt ); ?>;
}
.main-box,
.comment-respond,
.prev-next-nav{
	background: <?php echo esc_attr( $color_box_bg ); ?>;
}
.vce-post,
ul.comment-list > li.comment,
.main-box-single,
.ie8 .vce-single,
#disqus_thread,
.vce-author-card,
.vce-author-card .vce-content-outside,
.mks-bredcrumbs-container,
ul.comment-list > li.pingback{
	background: <?php echo esc_attr( $color_content_bg ); ?>;
}
.mks_tabs.horizontal .mks_tab_nav_item.active{
	border-bottom: 1px solid <?php echo esc_attr( $color_content_bg ); ?>;
}
.mks_tabs.horizontal .mks_tab_item,
.mks_tabs.vertical .mks_tab_nav_item.active,
.mks_tabs.horizontal .mks_tab_nav_item.active{
	background: <?php echo esc_attr( $color_content_bg ); ?>;
}
.mks_tabs.vertical .mks_tab_nav_item.active{
	border-right: 1px solid <?php echo esc_attr( $color_content_bg ); ?>;
}

#vce-pagination,
.vce-slider-pagination .owl-controls,
.vce-content-outside,
.comments-holder .navigation{
	background: <?php echo esc_attr( $color_pagination_bg ); ?>;
}
.sidebar .widget-title{
	background: <?php echo esc_attr( $color_widget_title_bg ); ?>;
	color: <?php echo esc_attr( $color_widget_title_txt ); ?>;
}
.sidebar .widget{
	background: <?php echo esc_attr( $color_widget_bg ); ?>;
}
.sidebar .widget,
.sidebar .widget li a,
.sidebar .mks_author_widget h3 a,
.sidebar .mks_author_widget h3,
.sidebar .vce-search-form .vce-search-input,
.sidebar .vce-search-form .vce-search-input:focus{
	color: <?php echo esc_attr( $color_widget_txt ); ?>;
}
.sidebar .widget li a:hover,
.sidebar .widget a,
.widget_nav_menu li.menu-item-has-children:hover:after,
.widget_pages li.page_item_has_children:hover:after{
	color: <?php echo esc_attr( $color_widget_acc ); ?>;
}
.sidebar .tagcloud a {
	border: 1px solid <?php echo esc_attr( $color_widget_acc ); ?>;
}
.sidebar .mks_author_link,
.sidebar .tagcloud a:hover,
.sidebar .mks_themeforest_widget .more,
.sidebar button,
.sidebar input[type="button"],
.sidebar input[type="reset"],
.sidebar input[type="submit"],
.sidebar .vce-button,
.sidebar .bbp_widget_login .button{
	background-color: <?php echo esc_attr( $color_widget_acc ); ?>;
}
.sidebar .mks_author_widget .mks_autor_link_wrap,
.sidebar .mks_themeforest_widget .mks_read_more,
.widget .meks-instagram-follow-link {
	background: <?php echo esc_attr( $color_widget_sub ); ?>;
}
.sidebar #wp-calendar caption,
.sidebar .recentcomments,
.sidebar .post-date,
.sidebar #wp-calendar tbody{
	color: <?php echo vce_hex2rgba( $color_widget_txt, 0.7 ); ?>;
}
.site-footer{
	background: <?php echo esc_attr( $color_footer_bg ); ?>;
}
.site-footer .widget-title{
	color: <?php echo esc_attr( $color_footer_title_txt ); ?>;
}
.site-footer,
.site-footer .widget,
.site-footer .widget li a,
.site-footer .mks_author_widget h3 a,
.site-footer .mks_author_widget h3,
.site-footer .vce-search-form .vce-search-input,
.site-footer .vce-search-form .vce-search-input:focus{
	color: <?php echo esc_attr( $color_footer_txt ); ?>;
}
.site-footer .widget li a:hover,
.site-footer .widget a,
.site-info a{
	color: <?php echo esc_attr( $color_footer_acc ); ?>;
}
.site-footer .tagcloud a {
	border: 1px solid <?php echo esc_attr( $color_footer_acc ); ?>;
}
.site-footer .mks_author_link,
.site-footer .mks_themeforest_widget .more,
.site-footer button,
.site-footer input[type="button"],
.site-footer input[type="reset"],
.site-footer input[type="submit"],
.site-footer .vce-button,
.site-footer .tagcloud a:hover
{
	background-color: <?php echo esc_attr( $color_footer_acc ); ?>;
}
.site-footer #wp-calendar caption,
.site-footer .recentcomments,
.site-footer .post-date,
.site-footer #wp-calendar tbody,
.site-footer .site-info{
	color: <?php echo vce_hex2rgba( $color_footer_txt, 0.7 ); ?>;
}

.top-header,
.top-nav-menu li .sub-menu{
	background: <?php echo esc_attr( $color_top_bar_bg ); ?>;
}
.top-header,
.top-header a{
	color: <?php echo esc_attr( $color_top_bar_txt ); ?>;
}
.top-header .vce-search-form .vce-search-input,
.top-header .vce-search-input:focus,
.top-header .vce-search-submit{
	color: <?php echo esc_attr( $color_top_bar_txt ); ?>;
}
.top-header .vce-search-form .vce-search-input::-webkit-input-placeholder { /* WebKit browsers */
    color: <?php echo esc_attr( $color_top_bar_txt ); ?>;
}
.top-header .vce-search-form .vce-search-input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
	color: <?php echo esc_attr( $color_top_bar_txt ); ?>;
}
.top-header .vce-search-form .vce-search-input::-moz-placeholder { /* Mozilla Firefox 19+ */
	color: <?php echo esc_attr( $color_top_bar_txt ); ?>;
}
.top-header .vce-search-form .vce-search-input:-ms-input-placeholder { /* Internet Explorer 10+ */
	color: <?php echo esc_attr( $color_top_bar_txt ); ?>;
}

.header-1-wrapper{
	height: <?php echo absint( $header_height ); ?>px;
	padding-top: <?php echo absint( $logo_top ); ?>px;
}
.header-2-wrapper,
.header-3-wrapper{
	height: <?php echo absint( $header_height ); ?>px;
}
.header-2-wrapper .site-branding,
.header-3-wrapper .site-branding{
	top: <?php echo absint( $logo_top ); ?>px;
	<?php if ( vce_get_option( 'rtl_mode' ) ): ?>
	right: <?php echo absint( $logo_left ); ?>px;
	<?php else: ?>
	left: <?php echo absint( $logo_left ); ?>px;
	<?php endif;?>
}

.site-title a, .site-title a:hover{
	color: <?php echo esc_attr( $color_website_title );?>;
}

.site-description{
	color: <?php echo esc_attr( $color_website_desc );?>;
}
.main-header{
	background-color: <?php echo esc_attr( $color_header_bg ); ?>;
}
.header-bottom-wrapper{
	background: <?php echo esc_attr( $color_header_nav_bg ); ?>;
}
.vce-header-ads{
	margin: <?php echo absint( ( $header_height-90 )/2 ); ?>px 0;
}
.header-3-wrapper .nav-menu > li > a{
	padding: <?php echo absint( ( $header_height-20 )/2 ); ?>px 15px;
}

.header-sticky,
.sidr{
<?php if ( vce_get_option( 'header_layout' ) == 3 ):?>
	background: <?php echo vce_hex2rgba( $color_header_bg, 0.95 ); ?>;
<?php else: ?>
	background: <?php echo vce_hex2rgba( $color_header_nav_bg, 0.95 ); ?>;
<?php endif; ?>
}
.ie8 .header-sticky{
	background: <?php echo esc_attr( $color_header_bg ); ?>;
}

.main-navigation a,
.nav-menu .vce-mega-menu > .sub-menu > li > a,
.sidr li a,
.vce-menu-parent{
	color: <?php echo esc_attr( $color_header_txt ); ?>;
}
.nav-menu > li:hover > a,
.nav-menu > .current_page_item > a,
.nav-menu > .current-menu-item > a,
.nav-menu > .current-menu-ancestor > a,
.main-navigation a.vce-item-selected,
.main-navigation ul ul li:hover > a,
.nav-menu ul .current-menu-item a,
.nav-menu ul .current_page_item a,
.vce-menu-parent:hover,
.sidr li a:hover,
.sidr li.sidr-class-current_page_item > a,
.main-navigation li.current-menu-item.fa:before,
.vce-responsive-nav{
	color: <?php echo esc_attr( $color_header_acc ); ?>;
}
#sidr-id-vce_main_navigation_menu .soc-nav-menu li a:hover {
	color: <?php echo esc_attr( $color_top_bar_txt ); ?>;
}

.nav-menu > li:hover > a,
.nav-menu > .current_page_item > a,
.nav-menu > .current-menu-item > a,
.nav-menu > .current-menu-ancestor > a,
.main-navigation a.vce-item-selected,
.main-navigation ul ul,
.header-sticky .nav-menu > .current_page_item:hover > a,
.header-sticky .nav-menu > .current-menu-item:hover > a,
.header-sticky .nav-menu > .current-menu-ancestor:hover > a,
.header-sticky .main-navigation a.vce-item-selected:hover{
	background-color: <?php echo esc_attr( $color_header_submenu_bg ); ?>;
}
.search-header-wrap ul {
	border-top: 2px solid <?php echo esc_attr( $color_header_acc ); ?>;
}
.vce-cart-icon a.vce-custom-cart span,
.sidr-class-vce-custom-cart .sidr-class-vce-cart-count {
	background: <?php echo esc_attr( $color_header_acc ); ?>;
	font-family: <?php echo wp_kses_post( $main_font['font-family'] ); ?>;
}
.vce-border-top .main-box-title{
	border-top: 2px solid <?php echo esc_attr( $color_content_acc ); ?>;
}

.tagcloud a:hover,
.sidebar .widget .mks_author_link,
.sidebar .widget.mks_themeforest_widget .more,
.site-footer .widget .mks_author_link,
.site-footer .widget.mks_themeforest_widget .more,
.vce-lay-g .entry-meta div,
.vce-lay-g .fn,
.vce-lay-g .fn a{
	color: #FFF;
}
.vce-featured-header .vce-featured-header-background{
	opacity: <?php echo esc_attr( $opacity_fa_big[1] ); ?>
}

.vce-featured-grid .vce-featured-header-background,
.vce-post-big .vce-post-img:after,
.vce-post-slider .vce-post-img:after{
	opacity: <?php echo esc_attr( $opacity_fa_grid[1] ); ?>
}

.vce-featured-grid .owl-item:hover .vce-grid-text .vce-featured-header-background,
.vce-post-big li:hover .vce-post-img:after,
.vce-post-slider li:hover .vce-post-img:after {
	opacity: <?php echo esc_attr( $opacity_fa_grid[2] ); ?>
}

.vce-featured-grid.vce-featured-grid-big .vce-featured-header-background,
.vce-post-big .vce-post-img:after,
.vce-post-slider .vce-post-img:after{
	opacity: <?php echo esc_attr( $opacity_fa_grid_big[1] ); ?>
}

.vce-featured-grid.vce-featured-grid-big .owl-item:hover .vce-grid-text .vce-featured-header-background,
.vce-post-big li:hover .vce-post-img:after,
.vce-post-slider li:hover .vce-post-img:after {
	opacity: <?php echo esc_attr( $opacity_fa_grid_big[2] ); ?>
}
#back-top {
	background: <?php echo esc_attr( $color_scroll_top ); ?>
}
.sidr input[type=text]{
	background: <?php echo vce_hex2rgba( $color_header_txt, 0.1 ); ?>;
	color: <?php echo vce_hex2rgba( $color_header_txt, 0.5 ); ?>;
}

.is-style-solid-color{
	background-color: <?php echo esc_attr( $color_content_acc ); ?>;	
	color: <?php echo esc_attr( $color_content_bg ); ?>;	
}
.wp-block-image figcaption{
	color: <?php echo esc_attr( $color_content_meta ); ?>;	
}
.wp-block-cover .wp-block-cover-image-text, .wp-block-cover .wp-block-cover-text, 
.wp-block-cover h2, .wp-block-cover-image .wp-block-cover-image-text, 
.wp-block-cover-image .wp-block-cover-text, .wp-block-cover-image h2,
p.has-drop-cap:not(:focus)::first-letter,
p.wp-block-subhead{
	font-family: <?php echo wp_kses_post( $h_font['font-family'] ); ?>;
	font-weight: <?php echo esc_attr( $h_font['font-weight'] ); ?>;
	<?php if ( isset( $h_font['font-style'] ) && !empty( $h_font['font-style'] ) ):?>
	font-style: <?php echo esc_attr( $h_font['font-style'] ); ?>;
	<?php endif; ?>
}
.wp-block-cover .wp-block-cover-image-text, .wp-block-cover .wp-block-cover-text, 
.wp-block-cover h2, .wp-block-cover-image .wp-block-cover-image-text, 
.wp-block-cover-image .wp-block-cover-text, .wp-block-cover-image h2{
	font-size: <?php echo esc_attr( $font_size_h4 ); ?>rem;	
}

p.wp-block-subhead{
    font-size: <?php echo esc_attr( $font_size_entry_text ); ?>rem;
}
.wp-block-button__link{
	background: <?php echo esc_attr( $color_content_acc ); ?>	
}
.wp-block-search .wp-block-search__button{
	color: <?php echo esc_attr( $color_content_bg ); ?>	
}


<?php if(vce_get_option('img_zoom')): ?>

.meta-image:hover a img,
.vce-lay-h .img-wrap:hover .meta-image > img,
.img-wrp:hover img,
.vce-gallery-big:hover img,
.vce-gallery .gallery-item:hover img,
.wp-block-gallery .blocks-gallery-item:hover img,
.vce_posts_widget .vce-post-big li:hover img,
.vce-featured-grid .owl-item:hover img,
.vce-post-img:hover img,
.mega-menu-img:hover img{
	-webkit-transform: scale(1.1);
	-moz-transform: scale(1.1);
	-o-transform: scale(1.1);
	-ms-transform: scale(1.1);
	transform: scale(1.1);
}

<?php endif; ?>

<?php if(!vce_get_option('use_gallery')): ?>

.gallery-item {
	display: inline-block;
	text-align: center;
	vertical-align: top;
	width: 100%;
	padding: 0.79104477%;
}

.gallery-columns-2 .gallery-item {
	max-width: 50%;
}

.gallery-columns-3 .gallery-item {
	max-width: 33.33%;
}

.gallery-columns-4 .gallery-item {
	max-width: 25%;
}

.gallery-columns-5 .gallery-item {
	max-width: 20%;
}

.gallery-columns-6 .gallery-item {
	max-width: 16.66%;
}

.gallery-columns-7 .gallery-item {
	max-width: 14.28%;
}

.gallery-columns-8 .gallery-item {
	max-width: 12.5%;
}

.gallery-columns-9 .gallery-item {
	max-width: 11.11%;
}
<?php endif; ?>


<?php

/* Editor font sizes */
$font_sizes = vce_get_editor_font_sizes();

if ( !empty( $font_sizes ) ) {

  foreach ( $font_sizes as $id => $item ) {
    if ( isset( $item['size-mobile'] ) ) {
      echo '.has-'. $item['slug'] .'-font-size{ font-size: '.number_format( $item['size-mobile'] / 10,  1 ) .'rem;}';
    }
  }

  echo '@media(min-width: 671px){'; 
    foreach ( $font_sizes as $id => $item ) {  
          echo '.has-'. $item['slug'] .'-font-size{ font-size: '.number_format( $item['size'] / 10,  1 ) .'rem;}';
    }
  echo '}';
}

/* Editor colors */
$colors = vce_get_editor_colors();

if ( !empty( $colors ) ) {
    foreach ( $colors as $id => $item ) {  
          echo '.has-'. $item['slug'] .'-background-color{ background-color: ' . esc_attr( $item['color'] ) .';}';
          echo '.has-'. $item['slug'] .'-color{ color: ' . esc_attr( $item['color'] ) .';}';
    }
}

/* Generate css for category colors */
$cat_colors = get_option( 'vce_cat_colors' );

if ( !empty( $cat_colors ) ) {
	foreach ( $cat_colors as $cat => $color ) {
		if( $cat != 0) {
			echo 'a.category-'.$cat.', .sidebar .widget .vce-post-list a.category-'.$cat.'{ color: '.$color.';}';
			echo 'body.category-'.$cat.' .main-box-title, .main-box-title.cat-'.$cat.' { border-top: 2px solid '.$color.';}';
			echo '.widget_categories li.cat-item-'.$cat.' .count { background: '.$color.';}';
			echo '.widget_categories li.cat-item-'.$cat.':before { background:'.$color.';}';
			echo '.vce-featured-section .category-'.$cat.', .vce-post-big .meta-category a.category-'.$cat.', .vce-post-slider .meta-category a.category-'.$cat.'{ background-color: '.$color.';}';
			echo '.vce-lay-g .vce-featured-info .meta-category a.category-'.$cat.'{ background-color: '.$color.';}';
			echo '.vce-lay-h header .meta-category a.category-'.$cat.'{ background-color: '.$color.';}';
			if ( vce_get_option( 'color_navigation_cat' ) ) {
				echo '.main-navigation li.vce-cat-'.$cat.':hover > a { color: '.$color.';}';
				echo '.main-navigation li.vce-cat-'.$cat.'.current-menu-item > a { color: '.$color.';}';
				
			}
		}

	}
}

/* Apply uppercase options */
$text_upper = vce_get_option( 'text_upper' );
if ( !empty( $text_upper ) ) {
	foreach ( $text_upper as $text_class => $val ) {
		if ( $val )
			echo '.'.$text_class.'{text-transform: uppercase;}';
	}
}
?>