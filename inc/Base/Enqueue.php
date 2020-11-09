<?php
/**
 * @package  %PLUGIN_NAME_CC%
 */
namespace Inc\Base;

use Inc\Base\BaseController;

/**
 *
 */
class Enqueue extends BaseController
{
    public function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    function enqueue() {
        wp_enqueue_script('%PLUGIN_SLUG%', $this->plugin_url . 'assets/js/admin.js', array('jquery'), filemtime($this->plugin_path .'assets/js/admin.js'));
        wp_enqueue_style('%PLUGIN_SLUG%', $this->plugin_url . 'assets/css/admin.css', array(), filemtime($this->plugin_path .'assets/css/admin.css'));
    }
}