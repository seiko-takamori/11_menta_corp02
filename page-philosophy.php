<?php get_header(); ?>

<main class="main company philosophy">
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
                <h3 class="main-content__title"><?php echo strtoupper($post->post_name); ?><span><?php the_field('title_ja'); ?></span></h3>

                <div class="main-content__title-under">
                    <p class="main-content__title-under__title">お茶の未来を<br>変えていく</p>
                    <p class="main-content__title-under__txt">お茶の文化と価値を大切にし、今までの知識や飲み方だけにこだわらない一人一人のライフスタイルに合った​新しい楽しみ方を発信し続けます</p>
                </div>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="main-content__img">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                <?php endif; ?>

                <div class="main-content__detail">
                    <?php the_content(); ?>
                </div>

            </div>

            <ul class="company-pager">
                <?php
                // // 取得するナビを指定 例：company
                if ($menu_items = wp_get_nav_menu_items('company')) {

                    foreach ($menu_items as $menu_item) {

                        //スラッグ名をIDから取得
                        $slug = get_post($menu_item->object_id)->post_name;

                        // ナビオブジェクトのIDと現在のページIDを比較　（同じならcurrentクラス付与）
                        $current = ($menu_item->object_id == get_queried_object_id()) ? 'current' : '';

                        echo '<li class="' . $current . '"><a class="btn-more" href="' . $menu_item->url . '"><p class="company-pager__title">' . strtoupper($slug)  . '<span>' . $menu_item->title  . '</span></p><span></span></a></li>';
                    }
                }
                ?>
            </ul>

        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>