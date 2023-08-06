<?php
list($queried_category) = $args;
?>

<a href="<?php echo esc_url($queried_category->url); ?>" class='bg-light rounded p-2 border border-secondary border-1' target='blank'>
    <?php echo esc_html($queried_category->name) ?>
</a>