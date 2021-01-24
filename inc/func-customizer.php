<?php
// ファイルの読み込み
get_template_part('/inc/custom', 'header');
get_template_part('/inc/custom', 'nav');

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
 */
function mytheme_customize( $wp_customize ) {
  // ナビゲーションバーのカスタマイザ
  cusNav($wp_customize);
  $wp_customize->remove_section('colors');
}
add_action( 'customize_register', 'mytheme_customize' );
