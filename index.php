<?php get_header(); ?>
<img src="<?= get_template_directory_uri(); ?>/img/img_kv.png" alt="">

<main class="main">
    <div class="container">
        <section class="sec">
            <h2>最新記事</h2>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('template-parts/loop', 'article'); ?>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php if (function_exists('wp_pagenavi')) {
                wp_pagenavi();
            } ?>
        </section>
    </div>

</main>
<?php get_footer(); ?>