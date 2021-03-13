<?php
use \Mytheme_Theme\Customizer;

/**
 * ナビゲーションのカスタマイズを行うメソッド
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusFooter( $wp_customize ) {
  $panel = 'footer';
  $footer_content = 'footer_content';
  $footer_main = 'footer_main';
  $footer_widget = 'footer_widget';

  // ナビゲーションバーの色設定
  $wp_customize->add_panel(
    $panel,
    array(
      'title'    => 'フッター',
      'priority' => 90,
    )
  );

  $wp_customize->add_section(
    $footer_main,
    array(
      'title'    => 'フッターメイン',
      'panel'    => $panel,
      'priority' => 1,
    )
  );

  $wp_customize->add_section(
    $footer_widget,
    array(
      'title'    => 'フッター上ウィジェット',
      'panel'    => $panel,
      'priority' => 11,
    )
  );

  Customizer::add(
    $footer_main,
    'footer_content_copyright',
    array(
      'label'    => 'コピーライト',
      'description' => 'aタグを含むhtmlタグが使用可能です。[#title]を入力するとサイトタイトル、[#year]を入力すると現在の西暦年が表示されます。',
      'type'     => 'text',
    )
  );

  /* フッターメイン */
  Customizer::add(
    $footer_main,
    'footer_text_color',
    array(
      'label'    => '文ホバー時の文字色字色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $footer_main,
    'footer_text_hover_color',
    array(
      'label'    => '文字色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $footer_main,
    'footer_bg_color',
    array(
      'label'    => '背景色',
      'type'     => 'color',
    )
  );

  /* フッター上ウィジェット */
  Customizer::add(
    $footer_widget,
    'footer_widget_text_color',
    array(
      'label'    => '文字色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $footer_widget,
    'footer_widget_text_hover_color',
    array(
      'label'    => 'ホバー時の文字色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $footer_widget,
    'footer_widget_bg_color',
    array(
      'label'    => '背景色',
      'type'     => 'color',
    )
  );
}
