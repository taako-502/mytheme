<?php
require_once( plugin_dir_path(__FILE__) . "../class/WP_Customize_Range.php");
// ファイルの読み込み
get_template_part('/inc/custom/custom', 'header');
get_template_part('/inc/custom/custom', 'nav');
get_template_part('/inc/custom/custom', 'bg');

/**
 * JavaScript のエンキュー
 * @see add_action('customize_preview_init',$func)
 */
function mytheme_customizer_live_preview(){
  wp_enqueue_script(
    'mytheme-themecustomizer',  //このスクリプトの ID 名
    get_template_directory_uri().'/js/mytheme-customizer.js', // このファイルの URL
    array( 'jquery','customize-preview' ),  //　必須の依存ファイル
    true // フッターに出力する場合 true にします
  );
}
add_action( 'customize_preview_init', 'mytheme_customizer_live_preview' );

/**
 * カスタマイザー
 * サイト基本情報・・・20
 * ナビゲーション・・・21
 * 色・・・40
 * ヘッダー画像・・・60
 * 背景画像・・・80
 * 背景・・・81
 * メニュー・・・100
 * ウィジェット・・・110
 * ホームページ設定・・・120
 * 追加CSS・・・200
 */
function mytheme_customize( $wp_customize ) {
  // ナビゲーションバーのカスタマイザ
  cusNav($wp_customize);
  // 背景の設定
  cusBg($wp_customize);
  $wp_customize->remove_section('colors');
}
add_action( 'customize_register', 'mytheme_customize' );
