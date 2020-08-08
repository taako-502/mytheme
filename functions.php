<?php
/**
* テーマのセットアップメソッド
*/
function mytheme_setup(){
  // アイキャッチ画像をON
  add_theme_support('post-thumbnails');
  // メニュー機能をON
  add_theme_support('menus');
}

/**
* 管理メニューに管理画面追加
*/
function add_admin(){
  add_menu_page(
    'mythemeの簡単設定',
    'mytheme設定',
    'manage_options',
    'mytheme-admin',
    'add_custom_admin',
    'dashicons-store',
    59);
}

/**
 * 追加管理画面の実装
 */
function add_custom_admin(){
  // mytheme専用管理画面呼び出し
  if (locate_template('/admin.php') !== '') {
    require_once locate_template('/admin.php');
  }
}

/**
* ダッシュボードにウィジェット追加
*/
function add_widget(){
  wp_add_dashboard_widget(
    'custom_widget',
    'テーマ設定',
    'add_custom_widget');
}

/**
* 追加ウィジェットの実装
*/
function add_custom_widget(){
  echo '<div class="custom_widget"><p>Hello World</p></div>';
}

// フック処理
add_action('after_setup_theme','mytheme_setup');
add_action('wp_dashboard_setup','add_widget');
add_action('admin_menu','add_admin');
// 記事の冒頭に表示するアイキャッチ画像
add_image_size('single',800,450,false);

?>
