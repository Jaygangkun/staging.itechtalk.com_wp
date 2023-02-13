<?php

/* Define theme version */
define( 'VOICE_THEME_VERSION', '3.0.1' );


/* Helpers and utility functions */
include_once get_parent_theme_file_path( 'core/helpers.php' );

/* Default options */
include_once get_parent_theme_file_path( 'core/default-options.php' );

/* Load frontend scripts */
include_once get_parent_theme_file_path( 'core/enqueue.php' );

/* Menus */
include_once get_parent_theme_file_path( 'core/menus.php' );

/* Sidebars */
include_once get_parent_theme_file_path('/core/sidebars.php');

/* Extensions (hooks and filters to add/modify specific features ) */
include_once get_parent_theme_file_path( 'core/extensions.php' );

/* Modules functions */
include_once get_parent_theme_file_path( 'core/modules.php' );

/* Main theme setup hook and init functions */
include_once get_parent_theme_file_path( 'core/setup.php' );

if ( is_admin() ) {

	/* Admin helpers and utility functions  */
	include_once get_parent_theme_file_path( 'core/admin/helpers.php' );

	/* Load admin scripts */
	include_once get_parent_theme_file_path( 'core/admin/enqueue.php' );

	/* Theme Options */
	include_once get_parent_theme_file_path( 'core/admin/options.php');

	/* Include plugins - TGM */
	include_once get_parent_theme_file_path( 'core/admin/plugins.php' );

	/* Include AJAX action handlers */
	include_once get_parent_theme_file_path( 'core/admin/ajax.php');

	/* Extensions ( hooks and filters to add/modify specific features ) */
	include_once get_parent_theme_file_path( 'core/admin/extensions.php' );

	/* Custom metaboxes */
	include_once get_parent_theme_file_path( 'core/admin/metaboxes.php');

	/* Demo importer panel */
	include_once get_parent_theme_file_path( 'core/admin/demo-importer.php' );

}


?>