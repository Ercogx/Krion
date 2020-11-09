<?php
/**
 * @package  %PLUGIN_NAME_CC%
 */
namespace Inc\Base;

class Activate
{
    public static function activate() {
        flush_rewrite_rules();

    }
}