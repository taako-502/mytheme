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
* 追加ウィジェットの実装
*/
function add_custom_widget(){
  echo '<div class="custom_widget"><p>Hello World</p></div>';
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

// フック処理
add_action('after_setup_theme','mytheme_setup');
add_action('wp_dashboard_setup','add_widget');
// 記事の冒頭に表示するアイキャッチ画像
add_image_size('single',800,450,false);
?>
