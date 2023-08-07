<?php
namespace Layerup\Tema\Api;

use Layerup\Tema\Controllers\PostsController;

/**
 * Class responsible for registering and executing the post api routes.
 */
class Posts{
    const PREFIX = 'layerup/v1';

    /**
     * Register the post routes.
     * 
     */
    public function register_routes(){
        /**
         * Filter by category id or slug.
         */
        register_rest_route(self::PREFIX, 'get_by_category', array(
            'methods'  => 'GET',
            'callback' => array($this, 'get_by_category'),
            'args'     => array(
                'id' => array(),
                'slug' => array(),
            ),
        ));

         /**
         * Get all posts.
         */
        register_rest_route(self::PREFIX, 'get_all_posts', array(
            'methods'  => 'GET',
            'callback' => array($this, 'get_all_categories'),
        ));
    }

    /**
     * Get posts by category id or slug.
     * 
     * @param \WP_REST_Request The request info.
     * 
     * @return \WP_Error|\WP_REST_Response Error on failure and response on success.
     */
    public function get_by_category($request){
        try{
            $id = $request->get_param('id');
            $slug = $request->get_param('slug');
            $args = array(
                'numberposts' => -1,
                'post_type' => 'post'
            );
            
            if(!is_numeric($id)){
                //Id is not number, trying slug.
                if(empty($slug)){
                    //None were given, throwing error.
                    throw new \Exception('Um id ou slug válidos precisam ser fornecidos.');
                }else{
                    $cat = get_category_by_slug( $slug );
                    if(is_a($cat,'WP_Term')){
                        $id = $cat->term_id;
                    }else{
                        //Slug does not exist.
                        throw new \Exception('Um slug válido precisa ser fornecido.');
                    }
                }
            }

            $args['category'] = $id;

            return rest_ensure_response(
                PostsController::filter($args)
            );
        }catch(\Exception $e){
            return new \WP_Error('falha_ao_filtrar', __($e->getMessage()), array('status' => 400));
        }
    }

    /**
     * Get All posts.
     * 
     * @param \WP_REST_Request The request info.
     * 
     * @return \WP_Error|\WP_REST_Response Error on failure and response on success.
     */
    public function get_all_categories($request){
        try{
            return rest_ensure_response(
                PostsController::get_all()
            );
        }catch(\Exception $e){
            return new \WP_Error('falha_ao_recuperar', __($e->getMessage()), array('status' => 400));
        }
    }
}