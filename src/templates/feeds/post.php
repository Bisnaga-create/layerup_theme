<?php
list($queried_post) = $args;
?>

<div class="card">
    <?php if ($queried_post->thumbnail) : ?>
        <img src="<?php echo esc_url($queried_post->thumbnail); ?>" class="card-img-top" alt="<?php esc_html($queried_post->title); ?>">
    <?php endif; ?>
    <div class="card-body">
        <h5 class="card-title"><?php echo $queried_post->title; ?></h5>
        <p class="card-text"><?php echo $queried_post->excerpt; ?></p>
        <a href="<?php echo $queried_post->url; ?>" class="btn btn-primary">Read more</a>
    </div>
</div>