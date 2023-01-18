<?php

/**
 * <title>タグを出力する
 */
add_theme_support('title-tag');
/**
 * タイトルタグの区切り文字をエン・ダッシュから縦線に変更する
 */
add_filter('document_title_separator', 'my_document_title_separator');
function my_document_title_separator($separator)
{
    $separator = '|';
    return $separator;
}
/**
 * アイキャッチ画像を使用可能にする
 */
add_theme_support('post-thumbnails');
/**
 * カスタムメニュー機能を使用可能にする
 */
add_theme_support('menus');

/**
 * 投稿のタグをチェックボックスで選択できるように
 */
function change_post_tag_to_checkbox()
{
    $args = get_taxonomy('post_tag');
    $args->hierarchical = true; //Gutenberg用
    $args->meta_box_cb = 'post_categories_meta_box'; //Classicエディタ用
    register_taxonomy('post_tag', 'post', $args);
}
add_action('init', 'change_post_tag_to_checkbox', 1);
/**
 * デフォルトjQuery削除
 */
function delete_jquery()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
    }
}
add_action('init', 'delete_jquery');
/**
 * Breadcrumb NavXTで特定ページをリンクなしにする
 */
add_filter('bcn_breadcrumb_url', 'my_breadcrumb_url_stripper', 10, 3);
function my_breadcrumb_url_stripper($url, $type, $id)
{
    if (in_array('post-page', $type) && (int) $id === 5) {
        $url = '';
    }
    return $url;
}

/**
 * 子ページのテンプレート名を階層化（page-親スラッグ__子スラッグ.php）
 */
add_filter('page_template_hierarchy', 'my_page_templates');
function my_page_templates($templates)
{
    global $wp_query;

    $template = get_page_template_slug();
    $pagename = $wp_query->query['pagename'];

    if ($pagename && !$template) {
        $pagename = str_replace('/', '__', $pagename);
        $decoded = urldecode($pagename);

        if ($decoded == $pagename) {
            array_unshift($templates, "page-{$pagename}.php");
        }
    }

    return $templates;
}
