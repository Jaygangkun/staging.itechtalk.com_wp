<?php

require_once get_parent_theme_file_path( 'inc/merlin/vendor/autoload.php' );
require_once get_parent_theme_file_path( 'inc/merlin/class-merlin.php' );

/**
 * Merlin WP configuration file.
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

$strings = array(
	'admin-menu'               => esc_html__( 'Voice Setup Wizard', 'voice' ),
	'title%s%s%s%s'            => esc_html__( '%s%s Themes &lsaquo; Theme Setup: %s%s', 'voice' ),
	'return-to-dashboard' 	   => esc_html__( 'Return to the dashboard', 'voice' ),
	'ignore'                   => esc_html__( 'Disable this wizard', 'voice' ),
	
	'btn-skip'                  => esc_html__( 'Skip', 'voice' ),
	'btn-next'                  => esc_html__( 'Next', 'voice' ),
	'btn-start'                 => esc_html__( 'Start', 'voice' ),
	'btn-no'                    => esc_html__( 'Cancel', 'voice' ),
	'btn-plugins-install'       => esc_html__( 'Install', 'voice' ),

	'btn-child-install'         => esc_html__( 'Install', 'voice' ),
	'btn-content-install'       => esc_html__( 'Install', 'voice' ),
	'btn-import'                => esc_html__( 'Import', 'voice' ),
	'btn-license-activate'     => esc_html__( 'Activate', 'voice' ),
	'btn-license-skip'         => esc_html__( 'Later', 'voice' ),
	
	'welcome-header%s'         => esc_html__( 'Welcome to %s', 'voice' ),
	'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'voice' ),
	'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'voice' ),
	'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'voice' ),
	
	'license-header%s'         => esc_html__( 'Activate %s', 'voice' ),
	'license-header-success%s' => esc_html__( '%s is Activated', 'voice' ),
	'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'voice' ),
	'license-label'            => esc_html__( 'License key', 'voice' ),
	'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'voice' ),
	'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'voice' ),
	'license-tooltip'          => esc_html__( 'Need help?', 'voice' ),
	
	'child-header'         => esc_html__( 'Install Child Theme', 'voice' ),
	'child-header-success' => esc_html__( 'You\'re good to go!', 'voice' ),
	'child'                => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'voice' ),
	'child-success%s'      => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'voice' ),
	'child-action-link'    => esc_html__( 'Learn about child themes', 'voice' ),
	'child-json-success%s' => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'voice' ),
	'child-json-already%s' => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'voice' ),
	
	'plugins-header'         => esc_html__( 'Install Plugins', 'voice' ),
	'plugins-header-success' => esc_html__( 'You\'re up to speed!', 'voice' ),
	'plugins'                => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'voice' ),
	'plugins-success%s'      => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'voice' ),
	'plugins-action-link'    => esc_html__( 'Plugins', 'voice' ),
	
	'import-header'      => esc_html__( 'Import Content', 'voice' ),
	'import'             => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'voice' ),
	'import-action-link' => esc_html__( 'Details', 'voice' ),
	
	'ready-header'      => esc_html__( 'All done. Have fun!', 'voice' ),
	'ready%s'           => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'voice' ),
	'ready-action-link' => esc_html__( 'Extras', 'voice' ),
	'ready-big-button'  => esc_html__( 'View your website', 'voice' ),
	
	'ready-link-3' => '',
	'ready-link-2' => wp_kses( sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://mekshq.com/documentation/voice/', esc_html__( 'Theme Documentation', 'voice' ) ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
);

if(vce_is_redux_active()){
	$strings['ready-link-1'] = wp_kses( sprintf( '<a href="'.admin_url( 'admin.php?page=voice_options' ).'" target="_blank">%s</a>', esc_html__( 'Start Customizing', 'voice' ) ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) );
}

/**
 * Set directory locations, text strings, and other settings for Merlin WP.
 *
 * @since 1.0
 */
$voice_wizard = new Merlin(

	// Configure Merlin with custom settings.
	$config = array(
		'directory'            => 'inc/merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'voice-importer', // The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'themes.php', // The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options', // The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode'             => false, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => get_home_url(), // Link for the big button on the ready step.
	),

	// Text strings.
	$strings

);



/**
 * Prepare files to import
 *
 * @since 1.0
 */
add_filter( 'merlin_import_files', 'vce_demo_import_files' );

if(!function_exists('vce_demo_import_files')):
	function vce_demo_import_files() {
			return array(
				array(
					'import_file_name'         => 'Voice new',
					'local_import_file'        => get_parent_theme_file_path( 'inc/demo/demo-new/content.xml' ), 
					'local_import_widget_file' => get_parent_theme_file_path( 'inc/demo/demo-new/widgets.json' ),
					'local_import_redux' => array(
						array(
							'file_path'    => get_parent_theme_file_path( 'inc/demo/demo-new/options.json' ),
							'option_name' => 'vce_settings',
						)
					),
					'import_preview_image_url' => get_parent_theme_file_uri( '/screenshot.png' ),
					'import_notice'            => '',
					'preview_url'              => 'https://demo.mekshq.com/voice/',
                ),
				array(
					'import_file_name'         => 'Voice classics',
					'local_import_file'        => get_parent_theme_file_path( 'inc/demo/demo-classic/content.xml' ), 
					'local_import_widget_file' => get_parent_theme_file_path( 'inc/demo/demo-classic/widgets.json' ),
					'local_import_redux' => array(
						array(
							'file_path'    => get_parent_theme_file_path( 'inc/demo/demo-classic/options.json' ),
							'option_name' => 'vce_settings',
						)
					),
					'import_preview_image_url' => get_parent_theme_file_uri( '/screenshot.png' ),
					'import_notice'            => '',
					'preview_url'              => 'https://demo.mekshq.com/voice/v3',
                ),
                array(
					'import_file_name'         => 'Voice minimal',
					'local_import_file'        => get_parent_theme_file_path( 'inc/demo/demo-2/content.xml' ),
					'local_import_widget_file' => get_parent_theme_file_path( 'inc/demo/demo-2/widgets.json' ),
					'local_import_redux' => array(
						array(
							'file_path'    => get_parent_theme_file_path( 'inc/demo/demo-2/options.json' ),
							'option_name' => 'vce_settings',
						)
					),
					'import_preview_image_url' => get_parent_theme_file_uri( '/screenshot.png' ),
					'import_notice'            => '',
					'preview_url'              => 'https://demo.mekshq.com/voice/v1',
                ),
                array(
					'import_file_name'         => 'Voice bold',
					'local_import_file'        => get_parent_theme_file_path( 'inc/demo/demo-3/content.xml' ),
					'local_import_widget_file' => get_parent_theme_file_path( 'inc/demo/demo-3/widgets.json' ),
					'local_import_redux' => array(
						array(
							'file_path'    => get_parent_theme_file_path( 'inc/demo/demo-3/options.json' ),
							'option_name' => 'vce_settings',
						)
					),
					'import_preview_image_url' => get_parent_theme_file_uri( '/screenshot.png' ),
					'import_notice'            => '',
					'preview_url'              => 'https://demo.mekshq.com/voice/v2',
                )

			);
	}
endif;

/**
 * Execute custom code after the whole import has finished.
 *
 * @since 1.0
 */
add_action( 'merlin_after_all_import', 'vce_merlin_after_import_setup' );

if( !function_exists('vce_merlin_after_import_setup') ):
	function vce_merlin_after_import_setup( ) {
		
         /* Set Menus */

		 $top_menu = get_term_by( 'name', 'Top Bar Menu', 'nav_menu' );
		 $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
		 $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
		 $social_menu = get_term_by( 'name', 'Social Menu', 'nav_menu' );
		 $fourofour_menu = get_term_by( 'name', '404 Menu', 'nav_menu' );
		 $menus = array();
 
		 if ( isset( $top_menu->term_id ) ) {
			 $menus['vce_top_navigation_menu'] = $top_menu->term_id;
		 }
 
		 if ( isset( $main_menu->term_id ) ) {
			 $menus['vce_main_navigation_menu'] = $main_menu->term_id;
		 }
 
		 if ( isset( $footer_menu->term_id ) ) {
			 $menus['vce_footer_menu'] = $footer_menu->term_id;
		 }
 
		 if ( isset( $social_menu->term_id ) ) {
			 $menus['vce_social_menu'] = $social_menu->term_id;
		 }
 
		 if ( isset( $fourofour_menu->term_id ) ) {
			 $menus['vce_404_menu'] = $fourofour_menu->term_id;
		 }
 
		 if ( !empty( $menus ) ) {
			 set_theme_mod( 'nav_menu_locations', $menus );
		 }
 
 
		 /* Home Page */
 
		 $home_page_title = 'Home';
 
		 $page = get_page_by_title( $home_page_title );
 
		 if ( isset( $page->ID ) ) {
			 update_option( 'page_on_front', $page->ID );
			 update_option( 'show_on_front', 'page' );
		 }

		/* Import contact form */
		voice_import_contact_form();

	}

endif;


/**
 * Insert WPForms contact form
 *
 * @return void
 * @since 1.3.4
 */

if ( !function_exists( 'voice_import_contact_form' ) ):
	function voice_import_contact_form( ) {
		
		if ( !function_exists( 'WP_Filesystem' ) || !WP_Filesystem() ) {
			return false;
		}

		global $wp_filesystem;
		$forms = json_decode( $wp_filesystem->get_contents(  get_parent_theme_file_path( '/inc/demo/demo-new/wpforms.json' ) ), true );

		if ( ! empty( $forms ) ) {

			foreach ( $forms as $form ) {

				$title  = ! empty( $form['settings']['form_title'] ) ? $form['settings']['form_title'] : '';
				$desc   = ! empty( $form['settings']['form_desc'] ) ? $form['settings']['form_desc'] : '';
				$new_id = wp_insert_post( array(
					'post_title'   => $title,
					'post_status'  => 'publish',
					'post_type'    => 'wpforms',
					'post_excerpt' => $desc,
				) );
				if ( $new_id ) {
					$form['id'] = $new_id;
					wp_update_post(
						array(
							'ID'           => $new_id,
							'post_content' =>  wp_slash( wp_json_encode( $form ) ),
						)
					);
				}
			}
		}

	}
endif;


/**
 * Unset the default widgets
 *
 * @return array
 * @since 1.0
 */

add_action('merlin_widget_importer_before_widgets_import', 'vce_remove_widgets_before_import');

if(!function_exists('vce_remove_widgets_before_import')):
	function vce_remove_widgets_before_import() {
		delete_option( 'sidebars_widgets' );	
	}
endif;

/**
 * Unset the child theme generator step in merlin welcome panel
 *
 * @param $steps
 * @return mixed
 * @since 1.0
 */

add_filter('voice_merlin_steps', 'vce_remove_child_theme_generator_from_merlin');

if(!function_exists('vce_remove_child_theme_generator_from_merlin')):
    function vce_remove_child_theme_generator_from_merlin($steps){
        unset($steps['child']);
        return $steps;
    }
endif;


/**
 * Stop initial redirect after theme is activated
 *
 * @since 1.0
 */

remove_action( 'after_switch_theme', array( $voice_wizard, 'switch_theme' ) );
