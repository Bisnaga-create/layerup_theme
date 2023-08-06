<?php

namespace Layerup\Tema\Models;

/**
 * Defines the model of a post.
 */
class Term{
    /**
     * Tax name.
     * 
     * @var string $name.
     */
    public $name;

    /**
     * Tax slug.
     * 
     * @var string $slug.
     */
    public $slug;

    /**
     * Tax id.
     * 
     * @var int $id.
     */
    public $id;

    /**
     * Tax archive url.
     * 
     * @var string $url.
     */
    public $url;
    
    /**
     * Constructor method.
     * 
     * @param \WP_Term $term Instance of the term to be used.
     */
    public function __construct($term){
        $this->name = $term->name;
        $this->id = $term->term_id;
        $this->slug = $term->slug;
        $this->url = get_term_link($term->term_id);
    }
}