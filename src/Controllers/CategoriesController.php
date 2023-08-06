<?php 
namespace Layerup\Tema\Controllers;

use Layerup\Tema\Controllers\TaxonomiesController;

/**
 * Class responsible for creating the category operations.
 */
class CategoriesController extends TaxonomiesController{

    /**
     * Constructor Method.
     */
    public function __construct(){
        $this->name = 'category';
    }

    /**
     * Get all categories from post.
     * 
     * @param int $id The post id.
     * 
     * @return Layerup\Tema\Models\Term[].
     */
    public function get_by_post($id){
        return $this->sanitize_terms(get_the_category($id, $this->name));
    }
} 