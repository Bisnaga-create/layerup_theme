<?php 
namespace Layerup\Tema\Controllers;

use Layerup\Tema\Models\Post;

/**
 * Class responsible for creating the post operations.
 */
class PostsController{

    /**
     * Retuns all the posts.
     * 
     * @return Layerup\Tema\Models\Post[].
     */
    public static function get_all(){
        $args = array(
            'posts_per_page' => -1,
        );

        $posts = get_posts($args);

        //Turning the posts into models.
        $usable_posts = array();

        foreach($posts as $single_post){
            $usable_posts[] = new Post($single_post);
        }

        return $usable_posts;
    }
} 