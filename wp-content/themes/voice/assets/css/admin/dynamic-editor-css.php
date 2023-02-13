<?php

/* Font styles */
$main_font = vce_get_font_option( 'main_font' );
$h_font = vce_get_font_option( 'h_font' );


/* Font sizes */
$font_size_p =  absint(vce_get_option( 'font_size_p' ) );
$font_size_entry_text =  absint(vce_get_option( 'font_size_entry_text' ) );
$font_size_nav = absint(vce_get_option( 'font_size_nav') );

$font_size_small = absint(vce_get_option( 'font_size_small' ) );
$font_size_fa_big = absint(vce_get_option( 'font_size_fa_big' ) );
$font_size_fa_medium = absint(vce_get_option( 'font_size_fa_medium' ) );
$font_size_fa_small = absint(vce_get_option( 'font_size_fa_small' ) );

$font_size_module_title = absint(vce_get_option( 'font_size_module_title' ) );
$font_size_single_title = absint(vce_get_option( 'font_size_single_title' ) );
$font_size_meta_data_smaller = absint(vce_get_option( 'font_size_meta_data_smaller' ) );
$font_size_meta_data_bigger = absint(vce_get_option( 'font_size_meta_data_bigger' ) );
$font_size_h2 = absint(vce_get_option( 'font_size_h2' ) );
$font_size_h3 = absint(vce_get_option( 'font_size_h3' ) );
$font_size_h4 = absint(vce_get_option( 'font_size_h4' ) );
$font_size_h5 = absint(vce_get_option( 'font_size_h5' ) );
$font_size_h6 = absint(vce_get_option( 'font_size_h6' ) );



/* Background */
$body_style = vce_get_bg_styles( 'body_style' );



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


?>


body .editor-styles-wrapper,
body .editor-styles-wrapper p,
body .editor-styles-wrapper .wp-block{
	font-family: <?php echo wp_kses_post( $main_font['font-family'] ); ?>;
	font-weight: <?php echo esc_attr( $main_font['font-weight'] ); ?>;
	<?php if ( isset( $main_font['font-style'] ) && !empty( $main_font['font-style'] ) ):?>
	font-style: <?php echo esc_attr( $main_font['font-style'] ); ?>;
	<?php endif; ?>
}

body .editor-styles-wrapper h1,
body .editor-styles-wrapper.edit-post-visual-editor .editor-post-title__block .editor-post-title__input,
body .editor-post-title .editor-post-title__input { 
	font-size: <?php echo esc_attr( $font_size_single_title ); ?>px; 
}
body .editor-styles-wrapper h2 { font-size: <?php echo esc_attr( $font_size_h2 ); ?>px; }
body .editor-styles-wrapper h3 { font-size: <?php echo esc_attr( $font_size_h3 ); ?>px; }
body .editor-styles-wrapper h4 { font-size: <?php echo esc_attr( $font_size_h4 ); ?>px; }
body .editor-styles-wrapper h5 { font-size: <?php echo esc_attr( $font_size_h5 ); ?>px; }
body .editor-styles-wrapper h6 { font-size: <?php echo esc_attr( $font_size_h6 ); ?>px; }


body .editor-styles-wrapper,
body .editor-styles-wrapper .wp-block-button__link{
    font-size: <?php echo esc_attr( $font_size_p ); ?>px;
}
body .editor-styles-wrapper .wp-block[data-type="core/paragraph"] p{
	font-size: <?php echo esc_attr( $font_size_p ); ?>px;
	line-height: 1.63;	
}

body .editor-styles-wrapper h1, 
body .editor-styles-wrapper.edit-post-visual-editor .editor-post-title__block .editor-post-title__input,
body .editor-post-title .editor-post-title__input,
body .editor-styles-wrapper h2, 
body .editor-styles-wrapper h3, 
body .editor-styles-wrapper h4,
body .editor-styles-wrapper h5,
body .editor-styles-wrapper h6,
body .editor-styles-wrapper .wp-block blockquote,
body .editor-styles-wrapper .wp-block blockquote p{
	font-family: <?php echo wp_kses_post( $h_font['font-family'] ); ?>;
	font-weight: <?php echo esc_attr( $h_font['font-weight'] ); ?>;
	<?php if ( isset( $h_font['font-style'] ) && !empty( $h_font['font-style'] ) ):?>
	font-style: <?php echo esc_attr( $h_font['font-style'] ); ?>;
	<?php endif; ?>
}

body .editor-styles-wrapper{
	background: <?php echo esc_attr( $color_content_bg ); ?>;
	color: <?php echo esc_attr( $color_content_txt ); ?>;
}


body .editor-styles-wrapper h1, 
body .editor-styles-wrapper.edit-post-visual-editor .editor-post-title__block .editor-post-title__input,
body .editor-post-title .editor-post-title__input,
body .editor-styles-wrapper h2, 
body .editor-styles-wrapper h3, 
body .editor-styles-wrapper h4,
body .editor-styles-wrapper h5,
body .editor-styles-wrapper h6{
	color: <?php echo esc_attr( $color_content_title_txt ); ?>;
}

body .editor-styles-wrapper a{
	color: <?php echo esc_attr( $color_content_acc ); ?>;
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
	font-size: <?php echo esc_attr( $font_size_h4 ); ?>px;	
}

.wp-block-button__link{
	background: <?php echo esc_attr( $color_content_acc ); ?>	
}

.wp-block-search .wp-block-search__button {
	background: <?php echo esc_attr( $color_content_acc ); ?>;
    color: <?php echo esc_attr( $color_content_bg); ?>	;
}


/* Table */

body .editor-styles-wrapper .wp-block-table:not(.is-style-stripes) td, 
body .editor-styles-wrapper .wp-block-table:not(.is-style-stripes) th{
	border: 1px solid <?php echo vce_hex2rgba($color_content_txt, 0.07); ?>;
}


/* Content width - page*/

.post-type-page .edit-post-visual-editor .wp-block{
	max-width: <?php echo absint( $page_content_width + 30 ); ?>px;
}
.post-type-page .post-type-page .edit-post-visual-editor .wp-block{
    max-width: <?php echo absint( $page_content_width + 30 ); ?>px;
}
.post-type-page .edit-post-visual-editor .wp-block[data-align="wide"],
.post-type-page .edit-post-visual-editor .wp-block[data-align="wide"]{
	max-width: 840px;
}
.post-type-page .edit-post-visual-editor .wp-block[data-align="full"],
.post-type-page .edit-post-visual-editor .wp-block[data-align="full"]{
	max-width: none;
}
/* Content width - single*/
.post-type-post .edit-post-visual-editor .wp-block{
	max-width: <?php echo absint( $single_content_width + 30 ); ?>px;
}
.post-type-post .post-type-page .edit-post-visual-editor .wp-block{
    max-width: <?php echo absint( $single_content_width + 30 ); ?>px;
}
.post-type-post .edit-post-visual-editor .wp-block[data-align="wide"],
.post-type-post .edit-post-visual-editor .wp-block[data-align="wide"]{
	max-width: 840px;
}
.post-type-post .edit-post-visual-editor .wp-block[data-align="full"],
.post-type-post .edit-post-visual-editor .wp-block[data-align="full"]{
	max-width: none;
}
.edit-post-visual-editor .wp-block[data-align="wide"] .wp-block-pullquote blockquote,
.edit-post-visual-editor .wp-block[data-align="full"] .wp-block-pullquote blockquote {
    max-width: <?php echo absint( $single_content_width + 30 ); ?>px;
    margin-left: auto;
    margin-right: auto;
}

/* Code and preformated*/

.wp-block-code{
	background: #f6f6f6;
	color: <?php echo esc_attr( $color_content_txt ); ?>;
}
.wp-block-code .editor-plain-text{
  background: transparent;
}
.wp-block-separator{
	border-color: <?php echo vce_hex2rgba($color_content_txt, 0.3); ?>;
	border-bottom-width: 1px;	
}

body .editor-styles-wrapper .wp-block-search__input{
	border: 1px solid <?php echo vce_hex2rgba($color_content_txt, 0.1); ?>;
}



<?php

/* Apply uppercase options */
$text_upper = vce_get_option( 'text_upper' );
if ( !empty( $text_upper ) ) {
	foreach ( $text_upper as $text_class => $val ) {
		if ( $val )
            echo 'body .editor-styles-wrapper '. str_replace(', ',', body .editor-styles-wrapper ', $text_class .'{text-transform: uppercase;}' );
	}
}
?>
