<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
    <div class="article__pic">
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full'); ?>
            <?php else : ?>
                <img src="<?= get_template_directory_uri(); ?>/img/no_thumbnail.png" alt="">
            <?php endif; ?>
        </a>
    </div>
    <div class="article__cont">
        <div class="article__meta">
            <?php the_category(); ?>
            <time class="article__time" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日'); ?></time>
        </div>
        <h2 class="article__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_tags('<ul class="article__tag"><li>', '</li><li>', '</li></ul>'); ?>

    </div>
</article>