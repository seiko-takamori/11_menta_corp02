<?php get_header(); ?>

<main class="main">
    <div class="container">
        <?php
        $cat_id = $_GET['cat'];
        $cat_data = get_category($cat_id);

        if (isset($_GET['tag_num'])) {
            $tag_num = $_GET['tag_num'];
            // タグslugからタグ名取得
            $tag = get_term_by('slug', $tag_num, 'post_tag');
        }
        ?>
        <section class="archive-top">
            <h2 class="archive-top__title">
                <?= $cat_data->name; ?>: <?php if (isset($tag_num)) {
                                                echo $tag->name . ' 検索結果';
                                            } ?></h2>
        </section>

        <?php
        if (isset($tag_num)) {
            $args = array(
                'post_type' => 'post',
                'cat' => $cat,
                'tag' => $tag_num,
            );
        } else {
            $args = array(
                'post_type' => 'post',
                'cat' => $cat,
            );
        }

        $wp_query = new WP_Query($args);

        if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) :
                $wp_query->the_post(); ?>

                <?php get_template_part('template-parts/loop', 'article'); ?>


        <?php
            endwhile;
        endif;
        wp_reset_postdata();

        ?>
    </div>
    <div class="side">
        <?php get_sidebar('category'); ?>
        <?php get_sidebar('tag'); ?>
        <?php get_sidebar('rank'); ?>
    </div>

</main>

<?php get_footer(); ?>