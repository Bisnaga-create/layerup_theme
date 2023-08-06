<?php

namespace Layerup\Tema\Models;

use Layerup\Tema\Controllers\CategoriesController;

/**
 * Defines the model of a post.
 */
class Post{
    /**
     * Post title.
     * 
     * @var string $title.
     */
    public $title;

    /**
     * Post id.
     * 
     * @var int $id.
     */
    public $id;

    /**
     * Post url.
     * 
     * @var string $url.
     */
    public $url;

    /**
     * Post excerpt.
     * 
     * @var string $excerpt.
     */
    public $excerpt;

    /**
     * Post content.
     * 
     * @var string $content.
     */
    public $content;

    /**
     * Post thumbnail.
     * 
     * @var string $thumbnail.
     */
    public $thumbnail;

    /**
     * Post categories.
     * 
     * @var string $categories.
     */
    public $categories;
    
    /**
     * Constructor method.
     * 
     * @param \WP_Post $post Instance of the post to be used.
     */
    public function __construct($post){
        $this->title = $post->post_title;
        $this->id = $post->ID;
        $this->url = $post->guid;
        $this->content = $post->post_content;
        $this->excerpt = $this->sanitize_excerpt($post->post_excerpt);
        $this->thumbnail = $this->get_thumbnail();
        $this->categories = (new CategoriesController())->get_by_post($this->id);
    }

    /**
     * Verifies if the excerpt is valid. If
     * it isn't makes it valid.
     * 
     * @param string $excerpt The post excerpt.
     * 
     * @return string The sanitized excerpt.
     */
    private function sanitize_excerpt($excerpt){
        //In case the excerpt is empty bring the fist thirty letters.
        if(0 === strlen($excerpt)){
            $excerpt = substr($this->content,0,30) . '...';
        }

        return $excerpt;
    }

    /**
     * Returns the post thumbnail if it exists or false.
     * 
     * @return false|string False on failure, thumbnail url on success.
     */
    private function get_thumbnail(){
        if (has_post_thumbnail( $this->id )){
            return get_the_post_thumbnail_url($this->id);
        }

        return false;
    }
}