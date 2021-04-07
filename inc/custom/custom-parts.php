<?php
use \Mytheme_Theme\Customizer;

/**
 * 部品のカスタマイザー
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusParts($wp_customize) {
  //パネル
  $panel = 'parts';
  $wp_customize->add_panel(
    $panel,
    array(
      'title'    => '部品',
      'priority' => 95,
    )
  );

  //セクション
  $section_header_slider = 'parts_header_slider';
  $wp_customize->add_section(
    $section_header_slider,
    array(
      'title'    => 'ヘッダー下スライダー',
      'panel'    => $panel,
      'priority' => 1,
    )
  );

  $section_parts = 'parts_scroll';
  $wp_customize->add_section(
    $section_parts,
    array(
      'title'    => 'スクロールボタン',
      'panel'    => $panel,
      'priority' => 2,
    )
  );

  /* ヘッダー下スライダ- */
  cusPartsHeaderSlider($wp_customize,$section_header_slider);
  /* スクロールボタン */
  cusPartsScroll($wp_customize,$section_parts);
}

/**
 * スライダーの設定
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 * @param  String               $section      セクション名
 */
function cusPartsHeaderSlider($wp_customize,$section) {
  Customizer::add(
    $section,
    'parts_header_slider_type',
    array(
      'label'       => '表示形式',
      'description' => 'スライダーの表示形式を設定する。',
      'type'        => 'radio',
      'choices'     => array(
        'none'          => '非表示',
        'date'          => '新着記事',
        'rand'          => 'ランダム記事',
        'recommend'     => 'おすすめ記事',
      ),
      'partial'     => array(
        'selector'      => '.c-slider-header',
      )
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_post',
    array(
      'label'       => '表示箇所',
      'description' => 'スライダーを表示する画面の種別を設定する。',
      'type'        => 'radio',
      'choices'     => array(
        'all'           => '全ページ',
        'front-only'    => 'トップページのみ',
        'front-except'  => 'トップページ以外',
        'single-only'   => '投稿ページのみ',
        'page-only'     => '固定ページのみ',
      ),
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_responsive',
    array(
      'label'    => '表示サイズ',
      'type'     => 'multiple-check',
      'choices'  => array(
        'pc'         => 'PCサイズ（1180px以上）',
        'tab'        => 'タブレットサイズ（1180〜768px）',
        'sp'         => 'スマホサイズ（767px以下）',
      )
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_design',
    array(
      'label'    => 'スライダーのデザイン',
      'type'     => 'radio',
      'choices'  => array(
        'c-slider-design--img-always' => '画像型（常にタイトル表示）',
        'c-slider-design--img-hover'  => '画像型（ホバー時にタイトル表示）',
        'c-slider-design--article'    => '記事型',
      ),
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_auto',
    array(
      'label'    => '自動でスライドする',
      'type'     => 'checkbox',
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_auto_speed',
    array(
      'label'    => '自動スライドの速度（ms）',
      'type'     => 'range',
      'min'   => 0,
      'max'   => 10000,
      'step'  => 1000,
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_dot',
    array(
      'label'    => 'ドットの表示有無',
      'type'     => 'checkbox',
      'partial'  => array(
        'selector' => '.slick-dots',
      ),
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_centermode',
    array(
      'label'    => 'スライダーのセンタリング',
      'type'     => 'checkbox',
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_all_number',
    array(
      'label'    => 'スライドの枚数',
      'type'     => 'range',
      'min'   => 2,
      'max'   => 10,
      'step'  => 1,
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_url_1',
    array(
      'label'       => 'スライダーに表示する記事①',
      'description' => 'URLを入力',
      'type'        => 'url',
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_url_2',
    array(
      'label'       => 'スライダーに表示する記事②',
      'description' => 'URLを入力',
      'type'        => 'url',
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_url_3',
    array(
      'label'       => 'スライダーに表示する記事③',
      'description' => 'URLを入力',
      'type'        => 'url',
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_url_4',
    array(
      'label'       => 'スライダーに表示する記事④',
      'description' => 'URLを入力',
      'type'        => 'url',
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_url_5',
    array(
      'label'       => 'スライダーに表示する記事⑤',
      'description' => 'URLを入力',
      'type'        => 'url',
    )
  );


  Customizer::add(
    $section,
    'parts_header_slider_url_6',
    array(
      'label'       => 'スライダーに表示する記事⑥',
      'description' => 'URLを入力',
      'type'        => 'url',
    )
  );


  Customizer::add(
    $section,
    'parts_header_slider_url_7',
    array(
      'label'       => 'スライダーに表示する記事⑦',
      'description' => 'URLを入力',
      'type'        => 'url',
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_url_8',
    array(
      'label'       => 'スライダーに表示する記事⑧',
      'description' => 'URLを入力',
      'type'        => 'url',
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_url_9',
    array(
      'label'       => 'スライダーに表示する記事⑨',
      'description' => 'URLを入力',
      'type'        => 'url',
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_url_10',
    array(
      'label'       => 'スライダーに表示する記事⑩',
      'description' => 'URLを入力',
      'type'        => 'url',
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_disp_number',
    array(
      'label'       => 'スライドの枚数',
      'type'        => 'range',
      'min'         => 1,
      'max'         => 5,
      'step'        => 1,
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_width_maxwindow',
    array(
      'label'    => 'スライダーの幅設定',
      'type'     => 'radio',
      'choices'  => array(
        'px'       => 'pxで設定する',
        'max'      => 'ウィンドウの最大幅に合わせる',
      ),
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_width',
    array(
      'label'       => 'スライダーの幅（px）',
      'description' => '本項目の設定は、幅が1180px以上の時に有効。',
      'type'        => 'range',
      'min'         => 0,
      'max'         => 1800,
      'step'        => 20,
      'transport'   => 'postMessage',
    )
  );

  Customizer::add(
    $section,
    'parts_header_slider_article_margin_side',
    array(
      'label'       => '記事同士の余白幅（px）',
      'type'        => 'range',
      'min'         => 0,
      'max'         => 20,
      'step'        => 1,
      'transport'   => 'postMessage',
    )
  );
}

/**
 * スクロールボタン
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 * @param  String               $section      セクション名
 */
function cusPartsScroll($wp_customize,$section) {
  Customizer::add(
    $section,
    'parts_scroll_color',
    array(
      'label'       => '色',
      'description' => '右下にあるスクロールボタンの色を設定する。',
      'type'        => 'color',
      'partial'     => array(
        'selector'  => '.c-top-scroll-btn a',
      ),
    )
  );

  Customizer::add(
    $section,
    'parts_scroll_hover_color',
    array(
      'label'       => 'ホバー時の色',
      'description' => '右下にあるスクロールボタンをホバーした時の色を設定する。',
      'type'        => 'color',
    )
  );
}
