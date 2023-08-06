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

        return self::sanitize_posts($posts);
    }

    /**
     * Retuns all the items of the posts that match the given filter.
     * 
     * @param array $filter Filter with the arguments to search for.
     * 
     * @return WP_Post[].
     */
    public static function filter($filters){
        return self::sanitize_posts(get_posts($filters));
    }

    /**
     * Sanitizes the posts to make them models.
     * 
     * @param WP_Post[] $terms Terms to be sanitized.
     * 
     * @return Layerup\Tema\Models\Post[].
     */
    protected static function sanitize_posts($posts){
        $usable_posts = array();
        foreach($posts as $post){
            $usable_posts[] = new Post($post);
        }

        return $usable_posts;
    }
} 