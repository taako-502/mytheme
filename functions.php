<?php
/**
 *  開発用
 *  リリースするときは、コメントアウトすること
 */
// WP-SCSS：ページをロードするたびにscssファイルを強制的にコンパイル
define( 'WP_SCSS_ALWAYS_RECOMPILE', true );
get_template_part('utility/utility');

/**
 * コンテンツ幅設定
 * @var [type]
 */
if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

/**
* 初期処理
*/
function mytheme_setup(){
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('automatic-feed-links');
  register_nav_menu('header-nav', 'Header Navigation');
}
add_action('after_setup_theme','mytheme_setup');

//ウィジェット
get_template_part('/inc/func','widgets');
//ダッシュボード
get_template_part('/inc/func','dashboard');
//カスタマイザー
get_template_part('/inc/func','customizer');
//ナビゲーションメニュー設定
get_template_part('/inc/func','menu');
//管理画面設定
get_template_part('/inc/func','admin');
//ブロックエディタ
get_template_part('/inc/func','block');
//OGP設定
get_template_part('/inc/func', 'ogp');
//構造化マークアップ
get_template_part('/inc/func', 'schema');
//AMP設定
get_template_part('/inc/func', 'amp');
//画像アップローダ設定
get_template_part('/inc/func', 'img');

// アーカイブの余計なタイトルを削除
add_filter( 'get_the_archive_title', function ($title) {
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  } elseif ( is_month() ) {
    $title = single_month_title( '', false );
  }
  return $title;
});

/**
 * javascript読み込み
 * @return [type] [description]
 */
function main_enqueue_scripts() {
  if(isset($_GET['amp']) && $_GET['amp'] == 1){
    //AMPはJavaScriptが使えない
    return;
  }
  wp_enqueue_script('jquery');
  wp_enqueue_script('main',get_template_directory_uri() . '/js/main.js');
  if ( is_singular() ) {
    wp_enqueue_script( 'comment-reply' );
  }
  //wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'main_enqueue_scripts' );
?>
