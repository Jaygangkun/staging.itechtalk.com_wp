<?php 

/* Show welcome message and quick tips after theme activation */
if ( !function_exists( 'vce_welcome_msg' ) ):
	function vce_welcome_msg() {
		
		if ( get_option( 'vce_welcome_box_displayed' ) || get_option( 'merlin_voice_completed' ) ) {
			return false;
		}
			
		update_option( 'vce_theme_version', VOICE_THEME_VERSION );
		include_once get_parent_theme_file_path( 'core/admin/welcome-panel.php' );

	}
endif;

/* Show message box after theme update */
if ( !function_exists( 'vce_update_msg' ) ):
	function vce_update_msg() {
		
		if ( !get_option( 'vce_welcome_box_displayed' ) && !get_option( 'merlin_voice_completed' ) ) {
			return false;
		}
		
		$prev_version = get_option( 'vce_theme_version' );
		$cur_version = VOICE_THEME_VERSION;
		if ( $prev_version === false ) {$prev_version = '0.0.0';}
		
		if ( version_compare( $cur_version, $prev_version, '>' ) ) { 
			include_once get_parent_theme_file_path( 'core/admin/update-panel.php' );
		}

	}
endif;

/**
 * Display message if required plugins are not installed and activated
 *
 * @since  1.0
 */

if ( !function_exists( 'vce_required_plugins_msg' ) ):
	function vce_required_plugins_msg() {

		if ( !get_option( 'vce_welcome_box_displayed' ) && !get_option( 'merlin_voice_completed' ) ) {
			return false;
		}

		if ( !vce_is_redux_active() ) {
			$class = 'notice notice-error';
			$message = wp_kses_post( sprintf( __( 'Important: Redux Framework plugin is required to run your theme options panel. Please visit <a href="%s">recommended plugins page</a> to install it.', 'voice' ), admin_url( 'admin.php?page=install-required-plugins' ) ) );
			printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
		}

	}
endif;

/* Show admin notices */
if ( !function_exists( 'vce_check_installation' ) ):
	function vce_check_installation() {
		add_action( 'admin_notices', 'vce_welcome_msg', 1 );
		add_action( 'admin_notices', 'vce_update_msg', 1 );
		add_action( 'admin_notices', 'vce_required_plugins_msg', 1 );
	}
endif;

add_action( 'admin_init', 'vce_check_installation' );


/* Delete our custom category meta from database on category deletion */
if ( !function_exists( 'vce_delete_category_meta' ) ):
	function vce_delete_category_meta( $term_id ) {
		delete_option( '_vce_category_'.$term_id );
	}
endif;

add_action( 'delete_category', 'vce_delete_category_meta' );


/* Change customize link to lead to theme options instead of live customizer */
if ( !function_exists( 'vce_change_customize_link' ) ):
	function vce_change_customize_link( $themes ) {
		if ( array_key_exists( 'voice', $themes ) ) {
			$themes['voice']['actions']['customize'] = admin_url( 'admin.php?page=vce_options' );
		}
		return $themes;
	}
endif;

add_filter( 'wp_prepare_themes_for_js', 'vce_change_customize_link' );

/* Store registered sidebars so we can get them before wp_registered_sidebars is initialized to use them in theme options */
if ( !function_exists( 'vce_check_sidebars' ) ):
	function vce_check_sidebars() {
		global $wp_registered_sidebars;
		if ( !empty( $wp_registered_sidebars ) ) {
			update_option( 'vce_registered_sidebars', $wp_registered_sidebars );
		}
	}
endif;

add_action( 'admin_init', 'vce_check_sidebars' );


/* Change default arguments of flickr widget plugin */
if ( !function_exists( 'vce_flickr_widget_defaults' ) ):
	function vce_flickr_widget_defaults( $defaults ) {

		$defaults['t_width'] = 80;
		$defaults['t_height'] = 80;
		return $defaults;
	}
endif;

add_filter( 'mks_flickr_widget_modify_defaults', 'vce_flickr_widget_defaults' );


/* Change default arguments of author widget plugin */
if ( !function_exists( 'vce_author_widget_defaults' ) ):
	function vce_author_widget_defaults( $defaults ) {
		$defaults['avatar_size'] = 90;
		$defaults['show_social_networks'] = 0;
		return $defaults;
	}
endif;

add_filter( 'mks_author_widget_modify_defaults', 'vce_author_widget_defaults' );


/**
 * Add widget form options
 *
 * Add custom options to each widget
 *
 * @return void
 * @since  2.4
 */

add_action( 'in_widget_form', 'vce_add_widget_form_options', 10, 3 );

if ( !function_exists( 'vce_add_widget_form_options' ) ) :

	function vce_add_widget_form_options(  $widget, $return, $instance) {

		if(!isset($instance['vce-padding'])){
			$instance['vce-padding'] = 0;
		}

		$exclude =  array( 
				'pages', 
				'categories', 
				'archives',
				'recent-comments',
				'recent-posts',
				'nav_menu',
				'calendar',
				'meta',
				'rss',
				'search',
				'tag_cloud',
				'vce_video_widget',  
				'vce_posts_widget',
				'vce_adsense_widget',  
				'mks_ads_widget', 
				'mks_author_widget', 
				'mks_flickr_widget', 
				'mks_social_widget', 
				'mks_themeforest_widget',

		);

		$exclude = apply_filters('vce_modify_widgets_exclude_add_form_options', $exclude );

		if(in_array( $widget->id_base , $exclude )){
			return;
		}
		?>	
		<p class="vce-opt-padding">
			<label for="<?php echo esc_attr( $widget->get_field_id( 'vce-padding' )); ?>">
				<input type="checkbox" id="<?php echo esc_attr($widget->get_field_id( 'vce-padding' )); ?>" name="<?php echo esc_attr($widget->get_field_name( 'vce-padding' )); ?>" value="1" <?php checked($instance['vce-padding'], 1); ?> />
				<?php esc_html_e( 'Make widget content full-width', 'voice');?>
				<small class="howto"><?php esc_html_e( 'Check this option if you want to expand your widget content to 300px', 'voice');?></small>
			</label>
		</p>

	<?php
	}
endif;


/**
 * Save widget form options
 *
 * Save custom options to each widget
 *
 * @return void
 * @since  2.4
 */

add_filter( 'widget_update_callback', 'vce_save_widget_form_options', 20, 2 );

if ( !function_exists( 'vce_save_widget_form_options' ) ) :

	function vce_save_widget_form_options( $instance, $new_instance ) {
		
		$instance['vce-padding'] = isset( $new_instance['vce-padding'] ) ? 1 : 0;
		return $instance;

	}

endif;


/* Add Voice author widget social options */
if ( !function_exists( 'vce_add_author_widget_opts' ) ) :

	function vce_add_author_widget_opts( $widget, $return, $instance ) {
		if ( $widget instanceof MKS_Author_Widget ):
			$field_id = $widget->get_field_id( 'show_social_networks' );
		$field_name = $widget->get_field_name( 'show_social_networks' );
		$checked = checked( 1, $instance['show_social_networks'], false );
		$option_name = esc_html__( 'Show social networks', 'voice' );
		$option_help = esc_html__( 'Check this box to show social networks', 'voice' );
?>
			<ul>
				<li>
					<input id="<?php echo esc_attr( $widget->get_field_id( 'show_social_networks' ) ); ?>" type="checkbox" name="<?php echo esc_attr( $widget->get_field_name( 'show_social_networks' ) ); ?>" <?php echo esc_attr( $checked );?> class="widefat"/>
					<label for="<?php echo esc_attr( $widget->get_field_id( 'show_social_networks' ) ); ?>"><?php esc_html_e( 'Show social networks:', 'voice' ); ?></label>
					<small class="howto"><?php esc_html_e( 'Check this box to display social networks', 'voice' ); ?></small>
				</li>
			</ul>
		<?php
		endif;

	}


endif;

add_action( 'in_widget_form', 'vce_add_author_widget_opts', 10, 3 );

/* Add Voice author widget options save */
if ( !function_exists( 'vce_save_author_widget_opts' ) ) :

	function vce_save_author_widget_opts( $instance, $new_instance, $old_instance ) {
		if ( $_POST['id_base'] != 'mks_author_widget' )
			return $instance;

		//print_r($_POST);die();

		if ( isset( $_POST['widget_number'] ) && ( $_POST['widget_number'] != '' ) ) :
			$widget_no = $_POST['widget_number'];
		$instance['show_social_networks'] = ( isset( $_POST['widget-mks_author_widget'][$widget_no]['show_social_networks'] ) ) ? 1 : 0;
		elseif ( isset( $_POST['multi_number'] ) && ( $_POST['multi_number'] != '' ) ) :
			$widget_no = $_POST['multi_number'];
		$instance['show_social_networks'] = ( isset( $_POST['widget-mks_author_widget'][$widget_no]['show_social_networks'] ) ) ? 1 : 0;
		else :
			$instance['show_social_networks'] = ( isset( $_POST['widget-mks_author_widget']['show_social_networks'] ) ) ? 1 : 0;
		endif;

		return $instance;

	}

endif;

add_filter( 'widget_update_callback', 'vce_save_author_widget_opts', 20, 3 );


/* White label WP Review plugin - remove banner from options */
add_filter( 'wp_review_remove_branding', '__return_true' );


/* Remove WP review for pages */

add_filter( 'wp_review_excluded_post_types', 'vce_wp_review_exclude_post_types' );

if ( !function_exists( 'vce_wp_review_exclude_post_types' ) ):
	function vce_wp_review_exclude_post_types( $excluded ) {
	  $excluded[] = 'page';
	  return $excluded;
	}
endif; 

/* Remove WP review notice */

remove_action('admin_notices', 'wp_review_admin_notice');


/* Remove WP review jQuery UI from admin pages */

add_action('admin_enqueue_scripts', 'vce_wp_review_exclude_admin_scripts', 99 );

if ( !function_exists( 'vce_wp_review_exclude_admin_scripts' ) ):
	function vce_wp_review_exclude_admin_scripts() {

		if( vce_is_wp_review_active() ) {
		 	wp_dequeue_style( 'plugin_name-admin-ui-css' );
		 	wp_dequeue_style( 'wp-review-admin-ui-css' );
		}

		wp_dequeue_style( 'jquery-ui.js' );
	  
	}
endif;

/**
 * Remove social share plugin page in admin ( Settings -> Meks Easy Social Share )
 *
 * @param array $options - Array of options 
 * @return array
 * @since  2.8.5
 */
// add_action( 'admin_init', 'vce_social_share_menu_page_remove' );

// if ( !function_exists( 'vce_social_share_menu_page_remove' ) ):
// 	function vce_social_share_menu_page_remove() {
// 		remove_submenu_page( 'options-general.php', 'meks-easy-social-share' );
// 	}
// endif;

/**
 * Remove social share plugin settings link
 *
 * @param array $options - Array of options 
 * @return array
 * @since  2.8.5
 */
// add_action( 'plugin_action_links', 'vce_social_share_remove_setting_link', 100, 1 );

// if ( !function_exists( 'vce_social_share_remove_setting_link' ) ):
// 	function vce_social_share_remove_setting_link( $actions ) {
// 		unset($actions['meks_ess_settings']);
// 		return $actions;
// 	}
// endif;


/**
 * Filter for social share option fields
 *
 * @param array $args - Array of default fields
 * @return array
 * @since  1.9
 */
add_filter( 'meks_ess_modify_options_fields', 'voice_social_share_option_fields_filter' );

if ( !function_exists( 'voice_social_share_option_fields_filter' ) ):
	function voice_social_share_option_fields_filter( $args ) {
		
		unset( $args['platforms'] );
		unset( $args['location'] );
		unset( $args['post_type'] );
		unset( $args['label_share'] );

		return $args;
	}
endif;

/**
 * Check for Additional CSS in Theme Options and transfer it to Customize -> Additional CSS
 *
 * @return void
 * @since  2.9
 */

if ( !function_exists( 'vce_patch_additional_css' ) ) :
	function vce_patch_additional_css() {

		$additional_css = vce_get_option( 'additional_css' );

		if ( empty( $additional_css ) ) {
			return false;
		}
		
		global $vce_settings;

		$vce_settings = get_option( 'vce_settings' ); 

		$vce_settings['additional_css'] = '';

		update_option( 'vce_settings', $vce_settings ) ;

		$customize_css = wp_get_custom_css_post();
		
		if ( !empty( $customize_css ) && !is_wp_error( $customize_css ) ) {
			$additional_css .= $customize_css->post_content;
		}

		wp_update_custom_css_post($additional_css);
	}
endif;

add_action('admin_init','vce_patch_additional_css');


/**
 * Check for Favicon Option Theme Options and transfer it to Customize -> Favicon
 *
 * @return void
 * @since  2.9
 */

if ( !function_exists( 'vce_patch_favicon' ) ) :
	function vce_patch_favicon() {

		$favicon = vce_get_option( 'favicon' );

		if ( empty( $favicon ) ) {
			return false;
		}

		global $vce_options;

		$vce_options = get_option( 'vce_settings' );
		$vce_options['favicon'] = '';
		update_option( 'vce_settings', $vce_options ) ;

		$image_id = vce_get_image_id_by_url( $favicon );

		if ( empty( $image_id ) ) {
			return false;
		}

		update_option( 'site_icon', $image_id ) ;

	}
endif;

add_action( 'admin_init', 'vce_patch_favicon' );

/**
 * Add Meks dashboard widget
 *
 * @since  1.0
 */

add_action( 'wp_dashboard_setup', 'vce_add_dashboard_widgets' );

if ( !function_exists( 'vce_add_dashboard_widgets' ) ):
	function vce_add_dashboard_widgets() {
		add_meta_box( 'vce_dashboard_widget', 'Meks - WordPress Themes & Plugins', 'vce_dashboard_widget_cb', 'dashboard', 'side', 'high' );
	}
endif;


/**
 * Meks dashboard widget
 *
 * @since  1.0
 */
if ( !function_exists( 'vce_dashboard_widget_cb' ) ):
	function vce_dashboard_widget_cb() {

		$transient = 'vce_mksaw';
		$hide = '<style>#vce_dashboard_widget{display:none;}</style>';

		$data = get_transient( $transient );
	
		if ( $data == 'error' ) {
			echo $hide;
			return;
		}

		if ( !empty( $data ) ) {
			echo $data;
			return;
		}

		$url = 'https://demo.mekshq.com/mksaw.php';
		$args = array( 'body' => array( 'key' => md5( 'meks' ), 'theme' => 'voice' ) );
		$response = wp_remote_post( $url, $args );

		if ( is_wp_error( $response ) ) {
			set_transient( $transient, 'error', DAY_IN_SECONDS );
			echo $hide;
			return;
		}

		$json = wp_remote_retrieve_body( $response );

		if ( empty( $json ) ) {
			set_transient( $transient, 'error', DAY_IN_SECONDS );
			echo $hide;
			return;
		}

		$json = json_decode( $json );

		if ( !isset( $json->data ) ) {
			set_transient( $transient, 'error', DAY_IN_SECONDS );
			echo $hide;
			return;
		} 

		set_transient( $transient, $json->data, DAY_IN_SECONDS );
		echo $json->data;
		
	}
endif;
?>