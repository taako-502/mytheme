<?php
get_template_part('utility/utility');
//グローバル変数
global $value;
global $error;

/**
 * テーマの最新バージョンがないか確認する
 */
require 'lib/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/taako-502/mytheme/',
	__FILE__,
	'mytheme'
);

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

/**
 * CSS、javascript読み込み
 * @return [type] [description]
 */
function main_enqueue_scripts() {
	$amp_flg = isset($_GET['amp']) && $_GET['amp'] == 1;
  if($amp_flg) {
    //AMPページ
    return;
  } else {
		//CSS
		wp_enqueue_style( 'main_style', esc_url(get_template_directory_uri() . '/css/app.css'));
		wp_enqueue_style( 'custom_style', esc_url(get_template_directory_uri() . '/css/customcss.php'));
		//JavaScript
  	wp_enqueue_script('jquery');
  	wp_enqueue_script('main',get_template_directory_uri() . '/js/main.js');
  	if ( is_singular() ) {
    	wp_enqueue_script( 'comment-reply' );
		}
  }
}
add_action( 'wp_enqueue_scripts', 'main_enqueue_scripts' );

//テスト設定
get_template_part('/inc/func','test');
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
//メールフォーム
get_template_part('/inc/func','mail');

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
?>
