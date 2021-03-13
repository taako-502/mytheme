<?php
namespace Mytheme_Theme;

/**
 * 背景の設定
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusBg( $wp_customize ) {
  $section = 'bg';

  $wp_customize->add_section(
    $section,
    array(
      'title'    => 'コンテナー（メインエリア、サイドバー）',
      'priority' => 28,
    )
  );

  Customizer::add(
    $section,
    'bg_color_all',
    array(
      'label'    => '背景色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $section,
    'bg_color_section',
    array(
      'label'    => 'セクションの背景色',
      'type'     => 'color',
    )
  );

  Customizer::add(
    $section,
    'section_shadow_len',
    array(
      'label'    => 'セクションの影の長さ（px）',
      'min'      => 0,
      'max'      => 10,
      'step'     => 1,
      'type'     => 'range',
    )
  );

  Customizer::add(
    $section,
    'section_shadow_opacity',
    array(
      'label'   => 'セクションの影の透明度(%)',
      'min'     => 0,
      'max'     => 100,
      'step'    => 5,
      'type'    => 'range',
    )
  );
}
?>
