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
        add_action( 'wp_head', array(self::class,'load_metas') );
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
        wp_enqueue_script("jquery");

        wp_enqueue_script(
            'bootstrap5-js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',   
        );

        //Recovering our own scripts. 
        wp_enqueue_script(
            'layerup-theme-js',
            LAYERUP_THEME_URI . '/src/assets/js/main.js',   
        );
    }

    /**
     * Loads metas.
     */
    public static function load_metas(){
        //Loading viewport meta so the css works correctly on mobile screens.
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
        
        //Loading a link with the website default url so it can be recovered on the front end.
        echo "<link rel='default_url' href=" . LAYERUP_SITE_ROOT_URI . ">";
    }
}