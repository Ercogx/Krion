<?php
/**
 * @package  %PLUGIN_NAME_CC%
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
{
    public $settings;

    public $callbacks;

    public $callbacks_mngr;

    public $pages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => '%PLUGIN_NAME%',
                'menu_title' => '%PLUGIN_NAME%',
                'capability' => 'manage_options',
                'menu_slug' => '%PLUGIN_SLUG_UNDERSCORE%',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => '%PLUGIN_SLUG_UNDERSCORE%_settings',
                'option_name' => '%PLUGIN_SLUG_UNDERSCORE%',
                'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
            )
        );

        $this->settings->setSettings( $args );
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => '%PLUGIN_SLUG_UNDERSCORE%_admin_index',
                'title' => 'Settings Manager',
                'callback' => array( $this->callbacks_mngr, 'adminSectionManager' ),
                'page' => '%PLUGIN_SLUG_UNDERSCORE%'
            )
        );

        $this->settings->setSections( $args );
    }

    public function setFields()
    {
        $args = array();

        foreach ( $this->managers as $key => $value ) {
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
                'page' => '%PLUGIN_SLUG_UNDERSCORE%',
                'section' => '%PLUGIN_SLUG_UNDERSCORE%_admin_index',
                'args' => array(
                    'option_name' => '%PLUGIN_SLUG_UNDERSCORE%',
                    'label_for' => $key,
                )
            );
        }

        $this->settings->setFields( $args );
    }
}