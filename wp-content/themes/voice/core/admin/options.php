<?php

/* Load the embedded Redux Framework */

if ( ! class_exists( 'Redux' ) ) {
    return;
}

/**
 * Redux params
 */

$opt_name = 'vce_settings';

$args = array(
    'opt_name'             => $opt_name,
    'display_name'         => wp_kses_post( sprintf( __( 'Voice Options%sTheme Documentation%s', 'voice' ), '<a href="https://mekshq.com/documentation/voice" target="_blank">', '</a>' ) ),
    'display_version'      => vce_get_update_notification(),
    'menu_type'            => 'menu',
    'allow_sub_menu'       => true,
    'menu_title'           => esc_html__( 'Theme Options', 'voice' ),
    'page_title'           => esc_html__( 'Voice Options', 'voice' ),
    'google_api_key'       => '',
    'google_update_weekly' => false,
    'async_typography'     => true,
    'admin_bar'            => true,
    'admin_bar_icon'       => 'dashicons-admin-generic',
    'admin_bar_priority'   => '100',
    'global_variable'      => '',
    'dev_mode'             => false,
    'update_notice'        => false,
    'customizer'           => false,
    'allow_tracking' => false,
    'ajax_save' => true,
    'page_priority'        => '27.11',
    'page_parent'          => 'themes.php',
    'page_permissions'     => 'manage_options',
    'menu_icon'            => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSIyNTZweCIgaGVpZ2h0PSIyNTZweCIgdmlld0JveD0iMCAwIDI1NiAyNTYiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+ICAgIDx0aXRsZT52b2ljZV9sb2dvPC90aXRsZT4gICAgPGcgaWQ9InZvaWNlX2xvZ28iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPiAgICAgICAgPHBhdGggZD0iTTIyMiwzMiBMMTUzLjYyNDc2NSwyMjQgTDExNSwyMjQgTDEyOC42OTI2ODMsMTgzLjg5NiBMMTI4LjczNjE3OSwxODQuMDIyNjYzIEwxODAuNzAxMzU4LDMyIEwyMjIsMzIgWiBNNzcuMTY1NjM3NSwzMiBMMTIzLDE2Ny43MTE0NzIgTDEwMy45MDc1NTEsMjI0IEwzNiwzMiBMNzcuMTY1NjM3NSwzMiBaIiBpZD0iU2hhcGUiIGZpbGw9IiNBMEE1QUEiIGZpbGwtcnVsZT0ibm9uemVybyI+PC9wYXRoPiAgICA8L2c+PC9zdmc+',
    'last_tab'             => '',
    'page_icon'            => 'icon-themes',
    'page_slug'            => 'vce_options',
    'save_defaults'        => true,
    'default_show'         => false,
    'default_mark'         => '',
    'show_import_export'   => true,
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => false,
    'output_tag'           => true,
    'database'             => '',
    'system_info'          => false,
);

$GLOBALS['redux_notice_check'] = 1;



$args['intro_text'] = '';
$args['footer_text'] = '';

Redux::setArgs( $opt_name, $args );


include_once get_parent_theme_file_path( 'core/admin/options-fields.php' );


/* Append custom css to redux framework */
if ( !function_exists( 'vce_redux_custom_css' ) ):
    function vce_redux_custom_css() {
        wp_register_style( 'vce-redux-custom-css', get_parent_theme_file_uri( 'assets/css/admin/options.css' ), array( 'redux-admin-css' ), VOICE_THEME_VERSION );
        wp_enqueue_style( 'vce-redux-custom-css' );
    }
endif;

add_action( 'redux/page/vce_settings/enqueue', 'vce_redux_custom_css' );


/* Remove redux framework admin page to avoid confusion of our users and unnecesarry support questions */
if ( !function_exists( 'vce_remove_redux_page' ) ):
    function vce_remove_redux_page() {
        remove_submenu_page( 'tools.php', 'redux-about' );
        remove_submenu_page( 'tools.php', 'redux-framework' );
    }
endif;

add_action( 'admin_menu', 'vce_remove_redux_page', 99 );


/* Prevent redux auto redirect */
update_option( 'redux_version_upgraded_from', 100 );
update_user_meta( get_current_user_id(), '_redux_welcome_guide', '1' );


/* More redux cleanup, blah... */

add_action( 'init', 'vce_redux_cleanup' );

if ( !function_exists( 'vce_redux_cleanup' ) ):
    function vce_redux_cleanup() {

        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
        }
    }
endif;

/* Remove new redux banner bypassing class_exists */
class Redux_Connection_Banner {
    public static function init() {
        return false;
    }
    public static function tos_blurb() {
        return false;
    }
}


/**
 * Add our section custom field to redux
 *
 * @since  1.0
 */

if ( !function_exists( 'vce_section_field_path' ) ):
    function vce_section_field_path( $field ) {
        return get_parent_theme_file_path( 'core/admin/options-custom-fields/section/section.php' );
    }
endif;

add_filter( "redux/vce_settings/field/class/vce_section", "vce_section_field_path" );
