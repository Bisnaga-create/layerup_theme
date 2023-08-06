<?php
namespace Layerup\Tema\Api;

use Layerup\Tema\Api\Posts;
use Layerup\Tema\Api\Categories;

/**
 * Class reponsible for calling all the api classes when needed.
 */
class Init{
    /**
     * Calls the methods needed for the api to work.
     */
    public static function init(){
        add_action('rest_api_init', array(self::class, 'call_api'));
    }

    /**
     * Calls the api classes.
     */
    public static function call_api(){
        (new Posts())->register_routes();
        (new Categories())->register_routes();
    }
}