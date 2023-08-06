<?php 
namespace Layerup\Tema\Controllers;

use Layerup\Tema\Controllers\CategoriesController;

/**
 * Class responsible for defining which templates should be loaded.
 */
class TemplatesController{
    /**
     * The template folder name. Created so there is no
     * need to use the long name.
     */
    private const TEMPLATE = LAYERUP_THEME_TEMPLATES_ROOT;

    /**
     * Constructor method. Decides which template to load.
     */
    public function __construct(){
        //Testing for home.
        if(is_front_page() || is_home()){
            $this->load_home();
        }else{
            //Showing message that other pages were not created.
            $this->load_not_done();
        }
    }

    /**
     * Loads the website home.
     */
    private function load_home(){
        $usable_posts = PostsController::get_all();

        $usable_categories = (new CategoriesController())->get_all();

        $this->load_navbar();

        get_template_part(
            self::TEMPLATE . '/sections/categories-filter',
            null,
            array($usable_categories)
        );

        get_template_part(
            self::TEMPLATE . '/grids/posts',
            null,
            array($usable_posts)
        );

        $this->load_footer();
    }

    /**
     * Loads the website navbar.
     */
    private function load_navbar(){
        $path = self::TEMPLATE . '/common/navbar';
        get_template_part($path);
    }

    /**
     * Loads the website footer.
     */
    private function load_footer(){
        $path = self::TEMPLATE . '/common/footer';
        $args = array(
            date('Y'),
        );

        get_template_part($path,null,$args);
    }

    /**
     * Loads the not done template.
     */
    private function load_not_done(){
        $this->load_navbar();

        $path = self::TEMPLATE . '/sections/not-done';

        get_template_part($path);

        $this->load_footer();
    }
} 