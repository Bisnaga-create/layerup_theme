<?php
namespace Layerup\Tema\Setup;

/**
 * Class reponsible for calling the css and js when needed.
 */
class Enqueue{
    /**
     * Calls the enqueue functions when it's due.
     */
    public static function init(){
        add_action( 'wp_enqueue_scripts', array(self::class,'load_css') );
        add_action( 'wp_enqueue_scripts', array(self::class,'load_js') );
    }

    /**
     * Loads the theme css.
     */
    public static function load_css(){
        wp_enqueue_style(
            'bootstrap5-css',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',   
        );
    }

    /**
     * Loads the theme js.
     */
    public static function load_js(){
        wp_enqueue_script(
            'bootstrap5-js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',   
        );
    }
}