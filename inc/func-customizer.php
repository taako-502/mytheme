<?php
require_once( plugin_dir_path(__FILE__) . "../class/WP_Customize_Range.php");
// ファイルの読み込み
get_template_part('/inc/custom/custom', 'architect');
get_template_part('/inc/custom/custom', 'header');
get_template_part('/inc/custom/custom', 'header-img');
get_template_part('/inc/custom/custom', 'front-page');
get_template_part('/inc/custom/custom', 'bg');
get_template_part('/inc/custom/custom', 'footer');

/**
 * カスタマイザープレビュー画面 JavaScriptのエンキュー
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
 * カスタマイザーコントロール画面 JavaScriptのエンキュー
 * @var [type]
 */
 function enqueue_customizer_scripts() {
 	// 設定項目の表示・非表示を切り替える処理
  wp_enqueue_script(
    'mytheme-themecustomizer',  //このスクリプトの ID 名
    get_template_directory_uri().'/js/customizer-controls.js', // このファイルの URL
    array( 'jquery','customize-preview' ),  //　必須の依存ファイル
    true // フッターに出力する場合 true にします
  );
 }
add_action( 'customize_controls_enqueue_scripts', 'enqueue_customizer_scripts' );

/**
 * カスタマイザー
 * サイト基本情報・・・20
 * 全体構成・・・22
 * フロントページ・・・25
 * ヘッダー・・・30
 * ヘッダー画像・・・60
 * 背景画像・・・80
 * 背景・・・81
 * フッター・・・90
 * メニュー・・・100
 * ウィジェット・・・110
 * ホームページ設定・・・120
 * 追加CSS・・・200
 */
function mytheme_customize( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
  $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
  //全体構成
  cusArchitect($wp_customize);
  //フロントページ
  cusFront($wp_customize);
  // ヘッダー
  cusHeader($wp_customize);
  // 背景
  cusBg($wp_customize);
  // フッター
  cusFooter($wp_customize);
  $wp_customize->remove_section('colors');
}
add_action( 'customize_register', 'mytheme_customize' );
