<?php
/*
 * Plugin Name: %PLUGIN_NAME%
 * Plugin URI: %PLUGIN_URI%
 * Description: Some description.
 * Author: %AUTHOR_NAME%
 * Author URI: %AUTHOR_URI%
 * Version: 1.0.0
 */


// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );
// Require once the Composer Autoload

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_%PLUGIN_SLUG_UNDERSCORE%() {
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_%PLUGIN_SLUG_UNDERSCORE%' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_%PLUGIN_SLUG_UNDERSCORE%() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_%PLUGIN_SLUG_UNDERSCORE%' );


/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	new Inc\Init();
}