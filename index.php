<?php get_header(); ?>
<div class="kv">
    <!-- Slider main container -->
    <div class="kv-swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img class="kv__img" src="<?= get_template_directory_uri(); ?>/img/kv01.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img class="kv__img" src="<?= get_template_directory_uri(); ?>/img/kv02.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img class="kv__img" src="<?= get_template_directory_uri(); ?>/img/kv03.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img class="kv__img" src="<?= get_template_directory_uri(); ?>/img/kv04.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="kv__text">
        <img class="kv__title" src=" <?= get_template_directory_uri(); ?>/img/kv_text.svg" alt="">
        <p class="kv__subtitle">お茶の未来を変えていく</p>
    </div>
    <div class="scroll">
        <img src="<?= get_template_directory_uri(); ?>/img/scroll-bar.svg" alt="scroll">
    </div>
</div>

<main class="main">
    <div class="news-wrap">
        <section class="sec news">
            <h2 class="sec__title">NEWS</h2>

            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="swiper-slide">
                                <?php get_template_part('template-parts/loop', 'article'); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <a href="#" class="btn-more">VIEW MORE <span></span></a>
        </section>
    </div>
    <section class="imgTxt who-we-are">
        <div class="imgTxt-txt">
            <h2 class="imgTxt-txt__title"><span>WHO WE ARE</span>新しいお茶の<br>楽しみ方を発信</h2>
            <div class="imgTxt-txt__txt">価値観が、そして生き方が変わりはじめる中、今までの知識や飲み方だけにこだわらない、一人一人のライフスタイルに合ったお茶の新しい楽しみ方をご提案しています。</div>
        </div>
        <img class="imgTxt-img" src="<?= get_template_directory_uri(); ?>/img/top_01.jpg" alt="">
    </section>
    <section class="imgTxt company">
        <img class="imgTxt-img" src="<?= get_template_directory_uri(); ?>/img/top_02.jpg" alt="">
        <div class="imgTxt-txt">
            <h2 class="imgTxt-txt__title"><span>COMPANY</span>新鮮茶葉をお客様のもとへ</h2>
            <div class="imgTxt-txt__txt">
                <p>お茶は野菜と同じ農作物です。新鮮な野菜がおいしいように（と同じように）、新鮮な茶葉はそうでないものと比べて、味も香りも全く異なります。</p>
                <p>本場で飲むお茶と同じ香りを味わっていただきたいという思いから、お客様のご自宅にお届けできるようにしています。</p>
            </div>
            <a href="#" class="btn-more">VIEW MORE <span></span></a>
        </div>
    </section>
    <div class="imgTxt-wrap">
        <section class="imgTxt brand">
            <div class="imgTxt-txt">
                <h2 class="imgTxt-txt__title"><span>BRAND</span>お茶の未来を<br>変えていく</h2>
                <div class="imgTxt-txt__txt">
                    <p>お茶は紀元前2700年代の中国で発見され、薬用や客人のもてなしといった長い歴史を経て、日常的に飲まれるようになりました。
                        昔から人々がお茶に魅了されてきたのは、自然の恵みを味わうだけでなく、お茶を飲む時間そのものを愛してきたから。
                        世界中にお茶の魅力を伝え、心温まる瞬間をお届けする、それが私たちの使命です。</p>
                </div>
            </div>
            <img class="imgTxt-img" src="<?= get_template_directory_uri(); ?>/img/top_03.jpg" alt="">
        </section>
    </div>
    <script>
        const swiper_kv = new Swiper(".kv-swiper", {
            slidesPerView: 1,
            centeredSlides: true,
            initialSlide: 1,
            autoplay: {
                delay: 4000,
            },
            loop: true,
        });
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            loop: true,
            slidesPerView: 3.8,
            spaceBetween: 30,

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <?php get_footer(); ?>