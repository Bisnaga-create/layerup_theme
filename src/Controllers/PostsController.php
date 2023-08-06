<?php 
namespace Layerup\Tema\Controllers;

/**
 * Class responsible for creating the post operations.
 */
class PostsController{

    /**
     * Retuns all the posts.
     * 
     * @return WP_Post[].
     */
    public static function get_all(){
        $args = array(
            'posts_per_page' => -1,
        );

        return get_posts($args);
    }
} 