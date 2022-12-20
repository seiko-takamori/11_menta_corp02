<?php get_header(); ?>

<main class="main">
    <div class="container">
        <section class="archive-top">
            <h2 class="archive-top__title"><?php wp_title(''); ?></h2>

            <?php
            // 現在のカテゴリのID
            $cat_id = get_query_var('cat');
            // 現在のカテゴリのデータ取得
            $cat_data = get_category($cat_id);
            // 現在のカテゴリの説明
            echo category_description($cat_id);
            ?>

            <?php if (is_category()) : ?>
                <div class="archive-top-serch">
                    <p class="archive-top-serch__title"><?php wp_title(''); ?>の関連キーワードから探す</p>
                </div>

                <form method="get" action="<?php bloginfo('url'); ?>" class="archive-top-serch__form">
                    <input name=" s" id="s" type="hidden" value="<?= $cat_data->name ?> ">

                    <?php wp_dropdown_categories('show_option_none=カテゴリを選択'); ?>

                    <?php
                    // カテゴリに付随するタグID
                    $post_ids = get_objects_in_term($cat_id, 'category');
                    $tags_object = wp_get_object_terms($post_ids, 'post_tag');
                    if ($tags_object) {
                        foreach ($tags_object as $tag) {
                            echo '<input type="submit" name="tag_num" value="' . esc_html($tag->slug) . '" onclick="tagClick(this)">';
                        }
                    }
                    ?>
                </form>
            <?php endif; ?>
        </section>
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
    <div class="side">
        <?php get_sidebar('category'); ?>
        <?php get_sidebar('tag'); ?>
        <?php get_sidebar('rank'); ?>
    </div>

</main>

<?php get_footer(); ?>