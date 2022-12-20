<?php get_header(); ?>

<main class="main">
    <div class="container">
        <section class="sec">
            <h2>すべての記事</h2>
            <?php
            $categories = get_categories();
            foreach ($categories as $category) : ?>
                <?php
                $name = $category->name;
                $args = array(
                    'posts_per_page' => 3,
                    'category' => $category->term_id,
                );
                $posts = get_posts($args);

                echo '<h2>' . $category->name . '</h2>';

                foreach ($posts as $post) :
                    setup_postdata($post); // 記事データの取得
                ?>

                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                        <?php endif; ?>
                        <?php the_title(); ?>
                    </a>

                <?php
                endforeach;
                wp_reset_postdata();
                ?>
            <?php endforeach; ?>
        </section>
    </div>
    <div class="side">
        <?php get_sidebar('category'); ?>
        <?php get_sidebar('tag'); ?>
        <?php get_sidebar('rank'); ?>
    </div>

</main>

<?php get_footer(); ?>