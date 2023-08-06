<?php
namespace Layerup\Tema\Setup;

use Layerup\Tema\Controllers\TemplatesController;
use Layerup\Tema\Api\Init as ApiInit;

/**
 * Class reponsible for calling all the classes when needed.
 */
class Init{
    /**
     * Calls the methods needed for the system to work.
     */
    public static function init(){
        add_action('template_redirect', array(self::class,'load_classes'));   
        self::load_api();
        self::gutenberg_options();
    }

    /**
     * Loads the classes needed for the pages to show.
     */
    public static function load_classes(){
        self::define_constants();

        //Calling scripts and styles.
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
        define('LAYERUP_THEME_PATH', get_stylesheet_directory());
        define('LAYERUP_THEME_URI', get_stylesheet_directory_uri());
        define('LAYERUP_THEME_TEMPLATES_ROOT','src/templates');
    }

    /**
     * Initializes the api classes.
     */
    public static function load_api(){
        //Initiating api.
        ApiInit::init();
    }

    /**
     * Sets the gutenberg options.
     */
    public static function gutenberg_options(){
        //Adding support to inserting thumbnails in posts.
        add_theme_support( 'post-thumbnails' ); 
    }
}