<?php
/**
 * @package  %PLUGIN_NAME_CC%
 */
namespace Inc\Base;

class BaseController
{
    public $plugin_path;

    public $plugin_url;

    public $plugin;

    public $managers = array();

    public function __construct() {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
        $this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/%PLUGIN_SLUG%.php';

        $this->managers = array(
            'cpt_manager' => 'Some awesome checkbox',
        );
    }

    public function activated( string $key )
    {
        $option = get_option( '%PLUGIN_SLUG%' );

        return isset( $option[ $key ] ) ? $option[ $key ] : false;
    }
}
