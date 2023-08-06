<?php
list($queried_categories) = $args;
$template_path = LAYERUP_THEME_TEMPLATES_ROOT;
?>

<div class='row m-3'>
    <?php foreach($queried_categories as $queried_category): ?>
    <div class='col-12 gy-3 content'>
        <div class='d-flex justify-content-center align-itens-center'>
            <?php 
            get_template_part(
                $template_path . '/feeds/category',
                null,
                array($queried_category)
            ); 
            ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>