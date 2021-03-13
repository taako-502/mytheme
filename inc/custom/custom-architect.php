<?php
use \Mytheme_Theme\Customizer;

/**
 * セクション ： 全体設定
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusArchitect( $wp_customize ) {

  $section = 'architect';
  $wp_customize->add_section(
    $section,
    array(
      'title'    => '全体構成',
      'priority' => 1,
    )
  );

  Customizer::add(
    $section,
    'architect_text_color',
    array(
      'label'    => 'テキストの文字色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $section,
    'architect_text_link_color',
    array(
      'label'    => 'リンクテキストの文字色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $section,
    'architect_text_link_hover_color',
    array(
      'label'    => 'リンクテキストホバー時の文字色',
      'type'     => 'color',
    )
  );
}
