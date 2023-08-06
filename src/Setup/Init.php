<?php
namespace Layerup\Tema\Setup;

use Layerup\Tema\Controllers\TemplatesController;

/**
 * Class reponsible for calling all the classes when needed.
 */
class Init{
    /**
     * Calls the methods needed for the system to work.
     */
    public static function init(){
        self::define_constants();
        Enqueue::init();

        //calling wp head to load styles and scripts.
        do_action( 'wp_head' );

        new TemplatesController();
    }

    /**
     * Defines the system constants for the theme.
     */
    private static function define_constants(){
        define('LAYERUP_THEME_VERSION','0.0.1');
        define('LAYERUP_THEME_TEMPLATES_ROOT','src/templates');
    }
}