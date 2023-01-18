<?php get_header(); ?>

<main class="main company profile">
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

                <div class="main-content-top">
                    <h3 class="main-content__title"><?php echo strtoupper($post->post_name); ?><span><?php the_field('title_ja'); ?></span></h3>
                    <table class="main-content-top__table">
                        <tr>
                            <th>会社名</th>
                            <td>株式会社 Tea</td>
                        </tr>
                        <tr>
                            <th>代表者</th>
                            <td>代表取締役社長　平尾誠</td>
                        </tr>
                        <tr>
                            <th>役員</th>
                            <td>なし</td>
                        </tr>
                        <tr>
                            <th>本社</th>
                            <td>〒150-6027
                                東京都渋谷区恵比寿4丁目20番3号
                                恵比寿ガーデンプレイスタワー27階</td>
                        </tr>

                    </table>
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