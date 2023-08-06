<?php 
namespace Layerup\Tema\Controllers;

use Layerup\Tema\Models\Term;

/**
 * Class responsible for creating the term operations.
 * Has the common methods for all terms.
 */
abstract class TermsController{
    /**
     * The taxonomy name.
     * 
     * @var string $name.
     */
    protected $name;

    /**
     * The filters for retriving new terms.
     * 
     * @var string $name.
     */
    public $filters;

    /**
     * Retuns all the items of the taxonomy.
     * 
     * @param string $name The name of the taxonomy to be searched.
     * 
     * @return WP_Post[].
     */
    public function get_all(){
        $args = array(
            'taxonomy' => $this->name,
            'hide_empty' => false
        );

        return $this->sanitize_terms(get_terms($args));
    }

    /**
     * Retuns all the items of the taxonomy that match the given filter.
     *     
     * @return WP_Post[].
     */
    public function filter(){
        return $this->sanitize_terms(get_terms($this->filters));
    }

    /**
     * Sanitizes the terms to make them models.
     * 
     * @param WP_Term[] $terms Terms to be sanitized.
     * 
     * @return Layerup\Tema\Models\Term[].
     */
    protected function sanitize_terms($terms){
        $usable_terms = array();
        foreach($terms as $term){
            $usable_terms[] = new Term($term);
        }

        return $usable_terms;
    }
} 