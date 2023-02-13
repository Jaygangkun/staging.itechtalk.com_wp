<?php
/*-----------------------------------------------------------------------------------*/
/*	Register Theme Sidebars
/*-----------------------------------------------------------------------------------*/

function vce_register_sidebars() {
	/* Default Sidebar */

	register_sidebar(
		array(
			'id' => 'vce_default_sidebar',
			'name' => esc_html__( 'Default Sidebar', 'voice' ),
			'description' => esc_html__( 'This is default sidebar.', 'voice' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<p class="widget-title">',
			'after_title' => '</p>'
		)
	);

	/* Default Sticky Sidebar */
	register_sidebar(
		array(
			'id' => 'vce_default_sticky_sidebar',
			'name' => esc_html__( 'Default Sticky Sidebar', 'voice' ),
			'description' => esc_html__( 'This is default sticky sidebar. Sticky means that it will be always pinned to top while you are scrolling through your website content.', 'voice' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<p class="widget-title">',
			'after_title' => '</p>'
		)
	);

	/* Add sidebars from theme options */

	$custom_sidebars = vce_get_option( 'add_sidebars' );

	if ( $custom_sidebars ) {
		for ( $i = 1; $i <= $custom_sidebars; $i++ ) {
			register_sidebar(
				array(
					'id' => 'vce_sidebar_'.$i,
					'name' => esc_html__( 'Sidebar', 'voice' ).' '.$i,
					'description' => '',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<p class="widget-title"><span>',
					'after_title' => '</span></p>'
				)
			);
		}
	}



	/* Footer Sidebar Area 1*/
	register_sidebar(
		array(
			'id' => 'vce_footer_sidebar_1',
			'name' => esc_html__( 'Footer Column 1', 'voice' ),
			'description' => esc_html__( 'This is sidebar to use in footer area column 1.', 'voice' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);

	/* Footer Sidebar Area 2*/
	register_sidebar(
		array(
			'id' => 'vce_footer_sidebar_2',
			'name' => esc_html__( 'Footer Column 2', 'voice' ),
			'description' => esc_html__( 'This is sidebar to use in footer area column 2.', 'voice' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);


	/* Footer Sidebar Area 1*/
	register_sidebar(
		array(
			'id' => 'vce_footer_sidebar_3',
			'name' => esc_html__( 'Footer Column 3', 'voice' ),
			'description' => esc_html__( 'This is sidebar to use in footer area column 3.', 'voice' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);

}



?>
