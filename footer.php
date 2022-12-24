<div class="contact">
    <div class="contact-box">
        <div class="contact-box__txt">
            <h2 class="contact-box__title">CONTACT US</h2>
            <p>お問い合わせはこちらより</p>
        </div>
        <a href="#" class="btn-more">VIEW MORE <span></span></a>
    </div>
</div>
</main>
<footer class="footer">
    <div class="footer-inner">
        <a class="footer-logo" href="<?php echo home_url(); ?>">Logo</a>
        <nav class="footer-nav">
            <?php
            $args = array(
                'menu' => 'footer01', // 管理画面で作成したメニューの名前
                'menu_class' => '', // メニューを構成するulタグのクラス名
                'container' => false, // <ul>タグを囲んでいる<div>タグを削除
            );
            wp_nav_menu($args);
            ?>

            <?php
            $args = array(
                'menu' => 'footer02', // 管理画面で作成したメニューの名前
                'menu_class' => '', // メニューを構成するulタグのクラス名
                'container' => false, // <ul>タグを囲んでいる<div>タグを削除
            );
            wp_nav_menu($args);
            ?>

            <?php
            $args = array(
                'menu' => 'footer03', // 管理画面で作成したメニューの名前
                'menu_class' => '', // メニューを構成するulタグのクラス名
                'container' => false, // <ul>タグを囲んでいる<div>タグを削除
            );
            wp_nav_menu($args);
            ?>
        </nav>
    </div>
    <div class="copyright">
        <a href="">PRIVACY POLICY</a>
        <small>&copy; 2022 MENTARING</small>
    </div>
</footer>

<script>
    const hasChild = document.querySelector('.menu-item-has-children');
    const submenu = document.querySelector('.sub-menu');
    hasChild.addEventListener('mouseover', function() {
        submenu.classList.add('down');
    });
    hasChild.addEventListener('mouseleave', function() {
        submenu.classList.remove('down');
    });
</script>

<?php wp_footer(); ?>
</body>

</html>