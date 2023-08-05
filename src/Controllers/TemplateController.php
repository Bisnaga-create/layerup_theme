<?php 
namespace Layerup\Tema\Controllers;

/**
 * Class resposnsible for defining which templates should be loaded.
 */
class TemplateController{
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
        }
    }

    /**
     * Loads the website home.
     */
    private function load_home(){
        $this->load_header();
        $this->load_footer();
    }

    /**
     * Loads the website header.
     */
    private function load_header(){
        $path = self::TEMPLATE.'/common/header';
        get_template_part($path);
    }

    /**
     * Loads the website footer.
     */
    private function load_footer(){
        $path = self::TEMPLATE.'/common/footer';
        $args = array(
            date('Y'),
        );

        get_template_part($path,null,$args);
    }
} 