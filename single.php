<?php get_header(); ?>

<main class="main">
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
                    <h1 class="article__title">タイトル：<?php the_title(); ?></h1>
                    <div class="article__meta">
                        <?php the_category(); ?>
                        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日'); ?></time>
                    </div>

                    <?php if (get_field('main_img')) : ?>
                        <img class="article__img" src="<?php the_field('main_img'); ?>">
                    <?php endif; ?>

                    <?php if (get_field('summary')) : ?>
                        <p class="article__summary"><?php the_field('summary'); ?></p>
                    <?php endif; ?>

                    <div class="article__content">
                        <?php the_content(); ?>
                    </div>
                </article>

                <?php if (get_field('author_name')) : ?>
                    <div class="author">
                        <p class="author__title">この記事を書いた人</p>
                        <div class="author__cont">
                            <div class="author__img">
                                <img src=" <?php the_field('author_img'); ?>" />
                            </div>
                            <div class="author__txt">
                                <p class="author__name"><span>ライター</span><?php the_field('author_name'); ?></p>
                                <p class="author__introduce"><?php the_field('author_introduce'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (get_field('bnr_link')) : ?>
                    <div class="bnr">
                        <a href="<?php the_field('bnr_link'); ?>">
                            <?php if (get_field('bnr_img')) : ?>
                                <img src="<?php the_field('bnr_img'); ?>" alt="">
                            <?php else : ?>
                                <img src="<?= get_template_directory_uri(); ?>/img/bnr_cpa-learning.webp" alt="">
                            <?php endif; ?>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="relation">
                    <h3 class="relation__title">この記事に関連するタグ</h3>
                    <?php the_tags('<ul class="relation__tags tags"><li>', '</li><li>', '</li></ul>'); ?>

                    <?php
                    $post_objs = get_field('related_article');
                    if ($post_objs) : ?>
                        <div class="relationーarticle">
                            <h3 class="relation__title">関連記事</h3>
                            <?php foreach ($post_objs as $post_obj) : ?>
                                <article class="article">
                                    <div class="article__pic">
                                        <a href="<?php the_permalink($post_obj->ID) ?>">
                                            <?php if (get_the_post_thumbnail($post_obj->ID, 'large')) : ?>
                                                <?= get_the_post_thumbnail($post_obj->ID, 'large'); ?>
                                            <?php else : ?>
                                                <?php if (get_field('main_img', $post_obj->ID)) : ?>
                                                    <img src="<?php the_field('main_img', $post_obj->ID); ?>">
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="article__cont">
                                        <div class="article__meta">
                                            <ul>
                                                <?php
                                                $cats = get_the_category($post_obj->ID);
                                                foreach ($cats as $cat) {
                                                    echo '<li>' . $cat->name . '</li>';
                                                }
                                                ?>
                                            </ul>
                                            <time class="article__time" datetime="<?= $post_obj->post_date; ?>">
                                                <?php echo date('Y年m月d日', strtotime($post_obj->post_date)); ?>
                                            </time>
                                        </div>
                                        <h2 class="article__title"><a href="<?php the_permalink($post_obj->ID) ?>"><?= $post_obj->post_title ?></a></h2>
                                        <?php
                                        $tags = get_the_tags($post_obj->ID); ?>
                                        <ul class="article__tag">
                                            <?php
                                            foreach ($tags as $tag) {
                                                echo '<li>' . $tag->name . '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </article>

                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <div class="new_post">
                            <h3 class="relation__title">最新記事</h3>
                            <?php
                            $args = array(
                                'posts_per_page' => 3
                            );
                            $posts = get_posts($args);
                            foreach ($posts as $post) :
                                setup_postdata($post); // 記事データの取得
                            ?>
                                <?php get_template_part('template-parts/loop', 'article'); ?>
                            <?php
                            endforeach;
                            wp_reset_postdata();
                            ?>
                        </div>

                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="side">
        <?php get_sidebar('bnr'); ?>
        <?php get_sidebar('rank'); ?>
        <?php get_sidebar('category'); ?>
        <?php get_sidebar('tag'); ?>
    </div>

</main>

<?php get_footer(); ?>