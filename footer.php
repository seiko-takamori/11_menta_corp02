<section class="sec contact">
    <div class="sec-box">
        <h2 class="sec__title">CONTACT US</h2>
        <p>お問い合わせはこちらより</p>
    </div>
    <a href="#" class="sec__btn">VIEW MORE</a>
</section>
</main>
<footer class="footer">
    <a href="<?php echo home_url(); ?>">Logo</a>
    <nav class="footer-nav">
        <?php
        $args = array(
            'menu' => 'footer', // 管理画面で作成したメニューの名前
            'menu_class' => '', // メニューを構成するulタグのクラス名
            'container' => false, // <ul>タグを囲んでいる<div>タグを削除
        );
        wp_nav_menu($args);
        ?>
    </nav>
</footer>
<?php wp_footer(); ?>
</body>

</html>