<?php
namespace Layerup\Tema\Api;

use Layerup\Tema\Controllers\CategoriesController;

/**
 * Class responsible for registering and executing the categories api routes.
 */
class Categories{
    const PREFIX = 'layerup/v1';

    /**
     * Register the post routes.
     * 
     */
    public function register_routes(){
        /**
         * Get all categories.
         */
        register_rest_route(self::PREFIX, 'get_all_categories', array(
            'methods'  => 'GET',
            'callback' => array($this, 'get_all_categories'),
            'args'     => array(
                'id' => array(),
                'slug' => array(),
            ),
        ));
    }

    /**
     * Get All categories.
     * 
     * @param \WP_REST_Request The request info.
     * 
     * @return \WP_Error|\WP_REST_Response Error on failure and response on success.
     */
    public function get_all_categories($request){
        try{
            return rest_ensure_response(
                (new CategoriesController())->get_all()
            );
        }catch(\Exception $e){
            return new \WP_Error('falha_ao_recuperar', __($e->getMessage()), array('status' => 400));
        }
    }
}