<?php
use \Mytheme_Theme\Customizer;

/**
 * ナビゲーションのカスタマイズを行うメソッド
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusFooter( $wp_customize ) {
  $section = 'footer';

  $wp_customize->add_section(
    $section,
    array(
      'title'    => 'フッター',
      'priority' => 1,
    )
  );

  /* フッター上ウィジェット */
  Customizer::add(
    $section,
    'footer_widget_text_color',
    array(
      'label'    => 'フッター上ウィジェットの文字色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $section,
    'footer_widget_text_hover_color',
    array(
      'label'    => 'フッター上ウィジェットのホバー時の文字色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $section,
    'footer_widget_bg_color',
    array(
      'label'    => 'フッター上ウィジェットの背景色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $section,
    'footer_content_copyright',
    array(
      'label'    => 'フッターのコピーライト',
      'description' => 'aタグを含むhtmlタグが使用可能です。[#title]を入力するとサイトタイトル、[#year]を入力すると現在の西暦年が表示されます。',
      'type'     => 'text',
    )
  );

  /* フッターメイン */
  Customizer::add(
    $section,
    'footer_text_color',
    array(
      'label'    => 'フッターのホバー時の文字色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $section,
    'footer_text_hover_color',
    array(
      'label'    => 'フッターの文字色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $section,
    'footer_bg_color',
    array(
      'label'    => 'フッターの背景色',
      'type'     => 'color',
    )
  );
}
