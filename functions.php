<?php
/**
 * テーマのパス, URI
 */
define( 'MYTHEME_THEME_PATH', get_template_directory() );
define( 'MYTHEME_THEME_URI', get_template_directory_uri() );

//グローバル変数
global $value;
global $error;

/**
 * CLASSのオートロード
 */
spl_autoload_register(
  function( $classname ) {

    // 名前に Mytheme_Theme がなければオートロードしない。
    if ( strpos( $classname, 'Mytheme_Theme' ) === false && strpos( $classname, 'Mytheme_Theme' ) === false) return;

    $classname = str_replace( '\\', '/', $classname );
    $classname = str_replace( 'Mytheme_Theme/', '', $classname );
    $file      = MYTHEME_THEME_PATH . '/class/' . $classname . '.php';

    if ( file_exists( $file ) ) require $file;
  }
);

/**
 * テーマの最新バージョンの有無を確認
 */
require 'lib/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
  'https://github.com/taako-502/mytheme/',
  __FILE__,
  'mytheme'
);

/**
 * コンテンツ幅設定
 */
if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

/**
* 初期処理
* @see add_action('after_setup_theme',$func)
*/
function mytheme_setup(){
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('automatic-feed-links');
  add_theme_support('customize-selective-refresh-widgets' );
  add_theme_support('custom-logo');
  register_nav_menu('header-nav', 'Header Navigation');

  /* 国際化・地域課の設定 */
  load_theme_textdomain( 'mytheme', get_template_directory() . '/languages' );

  /* 背景画像の設定 */
  $defaults = array(
    'default-color'          => '#FFF',
    'default-image'          => '',
    'default-repeat'         => '',
    'default-position-x'     => '',
    'default-attachment'     => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
  );
  add_theme_support( 'custom-background', $defaults );
}
add_action('after_setup_theme','mytheme_setup');

/**
 * スクリプト及びスタイルシートの読み込み
 * @see add_action('wp_enqueue_scripts',$func)
 */
function main_enqueue_scripts() {
  if(isset($_GET['amp']) && $_GET['amp'] == 1) {
    //AMPページ
    return;
  }
  //CSS
  wp_enqueue_style( 'font-awesome', esc_url(MYTHEME_THEME_URI . '/lib/fontawesome/css/all.min.css'));
  wp_enqueue_style( 'slick-theme', esc_url(MYTHEME_THEME_URI . '/lib/slick/slick-theme.css'));
  wp_enqueue_style( 'slick', esc_url(MYTHEME_THEME_URI . '/lib/slick/slick.css'));
  wp_enqueue_style( 'main_style', esc_url(MYTHEME_THEME_URI . '/css/app.css'));
  get_template_part('/inc/func','style');
  //JavaScript
  wp_enqueue_script('jquery');
  wp_enqueue_script('slick',MYTHEME_THEME_URI . '/lib/slick/slick.min.js');
  wp_enqueue_script('main',MYTHEME_THEME_URI . '/js/main.js');
  get_template_part('/inc/func','javascript');
  if ( is_singular() ) {
    wp_enqueue_script( 'comment-reply' );
  }
  //アドセンスコード
  echo stripslashes(\Mytheme::get_setting_admin('adsCd_auto'));
}
add_action( 'wp_enqueue_scripts', 'main_enqueue_scripts' );

/**
 * wp_headにタグを挿入する
 * @see add_action('wp_head',$func)
 */
function wp_head_insert_tags(){
  global $post;
  if(!isset($post->ID)){
    return;
  }
  //OGP
  echo \Mytheme_Theme\OgpClass::getOgpMeta($post->ID);
  //構造化マークアップ
  \Mytheme_Theme\SchemaClass::getStructuredData($post->ID);
}
add_action('wp_head','wp_head_insert_tags');

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
get_template_part('/inc/func', 'metabox');
//AMP設定
get_template_part('/inc/func', 'amp');
//画像アップローダ設定
get_template_part('/inc/func', 'img');
//メールフォーム
get_template_part('/inc/func','mail');
//もくじ
get_template_part('/inc/func','content-table');

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
 * Mytheme_Theme
 */
class Mytheme extends \Mytheme_Theme\Data {

  public function __construct() {
    // データをセット
    self::init();
  }
}

/**
 * Mytheme start!
 */
new \Mytheme();
?>
