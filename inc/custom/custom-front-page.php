<?php
use \Mytheme_Theme\Customizer;

/**
 * フロントページのカスタマイザー
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusFront( $wp_customize ) {
  $panel = 'front';
  $section_architect = 'front_architect';
  $section_heading = 'front_heading';
  $wp_customize->add_panel(
    $panel,
    array(
      'title'    => 'トップページ（フロントページ）',
      'priority' => 25,
    )
  );

  $wp_customize->add_section(
    $section_architect,
    array(
      'title'    => '構成',
      'panel'    => $panel,
      'priority' => 1,
    )
  );

  $wp_customize->add_section(
    $section_heading,
    array(
      'title'    => '見出し',
      'panel'    => $panel,
      'priority' => 11,
    )
  );

  /* 全体構成 */
  cusFrontArchitect($wp_customize,$section_architect);
  /* 見出し */
  cusFrontHeading($wp_customize,$section_heading);
}

/**
 * 全体構成の設定
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 * @param  String               $section      セクション名
 */
function cusFrontArchitect($wp_customize,$section) {
  Customizer::add(
    $section,
    'front_architect_content_width',
    array(
      'label'    => 'コンテンツ幅（px）',
      'type'     => 'range',
      'min'       => '2',
      'max'       => '10',
      'step'      => '1',
      'transport' => 'postMessage',
    )
  );

  Customizer::add(
    $section,
    'front_architect_col',
    array(
      'label'    => 'フロントページのレイアウト',
      'type'     => 'radio',
      'choices'  => array(
        'one-col' => '1カラム（サイドバーなし）',
        'two-col' => '2カラム',
      ),
    )
  );

  Customizer::add(
    $section,
    'front_architect_col_one_width',
    array(
      'label'    => 'メインエリアの幅（%）:ワンカラムの場合のみ',
      'type'     => 'range',
      'min'       => '0',
      'max'       => '100',
      'step'      => '1',
      'transport' => 'postMessage',
    )
  );

  Customizer::add(
    $section,
    'front_architect_reco_disp',
    array(
      'label'     => 'おすすめ記事の表示',
      'type'      => 'radio',
      'choices'   => array(
        'visible' => '表示',
        'hidden'  => '非表示',
      ),
    )
  );
}

/**
 * 見出しの設定
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 * @param  String               $section      セクション名
 */
function cusFrontHeading($wp_customize,$section){
  Customizer::add(
    $section,
    'front_heading_reco',
    array(
      'label'     => 'おすすめ記事の見出し',
      'type'      => 'text',
      'transport' => 'postMessage',
      'partial'   => array(
        'selector' => '.p-recommend--h2',
      )
    )
  );

  Customizer::add(
    $section,
    'front_heading_news',
    array(
      'label'     => '新着記事の見出し',
      'type'      => 'text',
      'transport' => 'postMessage',
      'partial'   => array(
        'selector' => '.p-news--h2',
      )
    )
  );

  Customizer::add(
    $section,
    'front_heading_fontsize',
    array(
      'label'     => '見出し（H2）のサイズ（px）',
      'type'      => 'range',
      'min' => 10,
      'max' => 40,
      'step' => 1,
    )
  );

  Customizer::add(
    $section,
    'front_heading_color',
    array(
      'label'     => '見出し（H2）の文字色について',
      'type'      => 'color',
      'min' => 10,
      'max' => 40,
      'step' => 1,
    )
  );

  $wp_customize->add_setting( 'front_heading_bg_color' , array(
    'default'    => '#333',
  ));

  $wp_customize->add_control(
    new Customize_Alpha_Color_Control(
      $wp_customize,
      'ctl_front_heading_bg_color',
      array(
        'label'    => '見出し（H2）の背景色について',
        'section'  => 'front_heading',
        'settings' => 'front_heading_bg_color',
      )
    )
  );

  Customizer::add(
    $section,
    'front_heading_border',
    array(
      'label'     => '見出し（H2）のボーダーについて',
      'type'      => 'radio',
      'choices'   => array(
        'none'                   => '非表示',
        'border-left'            => '左に線を引く',
        'border-bottom'          => '下に線を引く',
        'border-bottom-two-tone' => '下に線を引く（ツートンカラー）',
      ),
    )
  );

  Customizer::add(
    $section,
    'front_heading_border_color',
    array(
      'label'     => 'ボーダーの色について',
      'type'      => 'color',
    )
  );

  Customizer::add(
    $section,
    'front_heading_border_color_sub',
    array(
      'label'     => 'ボーダーの色について（サブ）',
      'type'      => 'color',
    )
  );

  Customizer::add(
    $section,
    'front_heading_padding_top_and_bottom',
    array(
      'label'     => '見出し（H2）上下の余白（em）',
      'type'      => 'range',
      'min'       => 0,
      'max'       => 3,
      'step'      => 0.05,
      'transport' => 'postMessage',
    )
  );

  Customizer::add(
    $section,
    'front_heading_padding_left',
    array(
      'label'     => '見出し（H2）左側の余白（em）',
      'type'      => 'range',
      'min'       => 0,
      'max'       => 3,
      'step'      => 0.05,
      'transport' => 'postMessage',
    )
  );
}
