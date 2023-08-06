<?php 
namespace Layerup\Tema\Controllers;

use Layerup\Tema\Models\Term;

/**
 * Class responsible for creating the taxonomy and term operations.
 * Has the common methods for all taxonomies and terms.
 */
abstract class TaxonomiesController{
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
    protected function get_all_terms(){
        $args = array(
            'taxonomy' => $this->name,
            'hide_empty' => false
        );

        return $this->sanitize_terms(get_terms($args));
    }

    /**
     * Retuns all the items of the taxonomy that match the given filter.
     * 
     * @param array $filter Filter with the arguments to search for.
     * 
     * @return WP_Post[].
     */
    protected function filter_terms(){
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