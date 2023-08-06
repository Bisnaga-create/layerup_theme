<?php
defined('ABSPATH') or die();

/**
 * Including the autoload script.
 */
if(!@include_once __DIR__.'/vendor/autoload.php'){
    exit;
}

if(class_exists('Layerup\Tema\Setup\Init')){
    add_action('init', array('Layerup\Tema\Setup\Init','init'));
}
 



