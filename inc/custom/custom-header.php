<?php
use \Mytheme_Theme\Customizer;

/**
* セクション ： ヘッダー
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusHeader( $wp_customize ) {
  $panel = 'header';
  $section_layout = 'header_layout';
  $section_text = 'header_text';
  $section_bg = 'header_bg';

  $wp_customize->add_panel(
    $panel,
    array(
      'title'    => 'ヘッダー',
      'priority' => 30,
    )
  );

  $wp_customize->add_section(
    $section_layout,
    array(
      'title'    => 'レイアウト',
      'panel'    => $panel,
      'priority' => 1,
    )
  );
  $wp_customize->add_section(
    $section_text,
    array(
      'title'    => 'テキスト',
      'panel'    => $panel,
      'priority' => 2,
    )
  );
  $wp_customize->add_section(
    $section_bg,
    array(
      'title'    => '背景',
      'panel'    => $panel,
      'priority' => 3,
    )
  );

  /* レイアウト */
  Customizer::add(
    $section_layout,
    'header_layout_titile_align',
    array(
      'label'    => 'サイトタイトルの位置',
      'type'     => 'radio',
      'choices'  => array(
        'left' => '左寄せ',
        'center' => '中央',
        'right' => '右寄せ',
      ),
    )
  );

  Customizer::add(
    $section_layout,
    'header_layout_nav_align',
    array(
      'label'    => 'ナビゲーションメニューの位置',
      'type'     => 'radio',
      'choices'  => array(
        'left' => '左寄せ',
        'center' => '中央',
        'right' => '右寄せ',
      ),
    )
  );

  /* テキスト */
  Customizer::add(
    $section_text,
    'header_text_description_fontsize',
    array(
      'label'    => 'キャッチフレーズのフォントサイズ（px）',
      'type'     => 'number',
      'input_attrs' => array(
        'step' => '1',
      ),
    )
  );

  Customizer::add(
    $section_text,
    'header_text_logo_fontsize',
    array(
      'label'    => 'ロゴのフォントサイズ（px）',
      'type'     => 'range',
      'min'      => '9',
      'max'      => '50',
      'step'     => '1',
    )
  );

  Customizer::add(
    $section_text,
    'header_text_color',
    array(
      'label'    => '文字色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $section_text,
    'header_text_hover_color',
    array(
      'label'    => 'ホバー時の文字色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $section_text,
    'header_text_description_margin_top',
    array(
      'label'    => 'キャッチフレーズ上のマージン（px）',
      'type'     => 'range',
      'min'      => '0',
      'max'      => '50',
      'step'     => '1',
    )
  );

  Customizer::add(
    $section_text,
    'header_text_title_margin_top',
    array(
      'label'    => 'サイトタイトル上のマージン（px）',
      'type'     => 'range',
      'min'      => '0',
      'max'      => '50',
      'step'     => '1',
    )
  );

  Customizer::add(
    $section_text,
    'header_text_title_margin_bottom',
    array(
      'label'    => 'サイトタイトル下のマージン（px）',
      'type'     => 'range',
      'min'      => '0',
      'max'      => '50',
      'step'     => '1',
    )
  );

  /* 背景 */
  Customizer::add(
    $section_bg,
    'header_bg_color',
    array(
      'label'    => 'ヘッダーの背景色',
      'type'     => 'color',
    )
  );
}
