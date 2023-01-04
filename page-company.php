<?php

/**
 * Template Name: 会社概要テンプレート
 */
?>

<?php get_header(); ?>

<main class="main">
    <h2 class="main__title">COMPANY<span>会社情報</span></h2>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>


                <?php
                $args = array(
                    'menu' => 'company', // 管理画面で作成したメニューの名前
                    'menu_class' => '', // メニューを構成するulタグのクラス名
                    'container' => false, // <ul>タグを囲んでいる<div>タグを削除
                );
                wp_nav_menu($args);
                ?>

            <div class="main-content">
                <h3 class="main-content__title"><?php echo strtoupper($post->post_name); ?><span><?php the_title(); ?></span></h3>

                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage_600x400.png" alt="">
                <?php endif; ?>

                <?php the_content(); ?>

            </div>




        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>