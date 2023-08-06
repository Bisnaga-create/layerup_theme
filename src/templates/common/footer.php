<?php
list($year) = $args;
wp_footer(); 
?>
<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="<?php echo LAYERUP_SITE_ROOT_URI; ?>" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="https://gitlab.com/Guilherme_Desenvolvedor" class="nav-link px-2 text-muted" target='blank'>Conheça o criador</a></li>
    </ul>
    <p class="text-center text-muted">© <?php echo esc_html($year) ?> Layer Up</p>
</footer>