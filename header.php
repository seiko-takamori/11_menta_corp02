<!DOCTYPE html>
<html lang="ja">

<head>
    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Specific Metas
================================================== -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Favicons
================================================== -->
    <link rel="shortcut icon" href="images/common/favicon.ico" type="images/common/favicon.ico" sizes="16x16" />
    <link rel="icon" href="images/common/favicon.ico" type="images/common/favicon.ico" sizes="16x16" />
    <link rel="apple-touch-icon-precomposed" href="images/common/fav.png" />

    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/sass/style.css?<?php echo date('Ymd-Hi'); ?>">


    <!-- javascript
================================================== -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri(); ?>/js/common.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="header">
        <h1 class="header-logo"><a href="<?php echo home_url(); ?>"><img src="<?= get_template_directory_uri(); ?>/img/Logo.svg" alt=""></a></h1>
        <nav class="header-nav">
            <?php
            $args = array(
                'menu' => 'global', // 管理画面で作成したメニューの名前
                'menu_class' => '', // メニューを構成するulタグのクラス名
                'container' => false, // <ul>タグを囲んでいる<div>タグを削除
            );
            wp_nav_menu($args);
            ?>
        </nav>
    </header>