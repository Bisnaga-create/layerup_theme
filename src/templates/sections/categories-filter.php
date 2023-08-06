<?php
list($queried_categories) = $args;
$template_path = LAYERUP_THEME_TEMPLATES_ROOT;
?>

<section id='categories-filter' class='mt-5 container'>
    <h4>Filtrar por categoria:</h4>
    <?php
    get_template_part(
        $template_path . '/grids/categories',
        null,
        array($queried_categories)
    );
    ?>
</section>