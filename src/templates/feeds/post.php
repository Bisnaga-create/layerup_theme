<?php
list($queried_post) = $args;
$template_path = LAYERUP_THEME_TEMPLATES_ROOT;
?>

<div class="card">
    <?php if ($queried_post->thumbnail) : ?>
        <img src="<?php echo esc_url($queried_post->thumbnail); ?>" class="card-img-top" alt="<?php esc_html($queried_post->title); ?>">
    <?php endif; ?>
    <div class="card-body">
        <h5 class="card-title"><?php echo $queried_post->title; ?></h5>
        <p class="card-text">
            <?php echo wp_strip_all_tags($queried_post->excerpt); ?>
        </p>

        <?php 
            get_template_part(
                $template_path . '/grids/categories',
                null,
                array($queried_post->categories)
            );
        ?>
        
        <a href="<?php echo $queried_post->url; ?>" class="btn btn-primary" target='blank'>Leia mais</a>
    </div>
</div>