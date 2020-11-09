<?php
/**
 * @package  %PLUGIN_NAME_CC%
 */
namespace Inc\Base;

class Deactivate
{
    public static function deactivate() {
        flush_rewrite_rules();
    }
}