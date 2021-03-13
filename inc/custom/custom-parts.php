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
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusPartsHeaderSlider($wp_customize,$section) {
  Customizer::add(
    $section,
    'parts_header_slider_type',
    array(
      'label'    => 'スライダーの表示',
      'type'     => 'radio',
      'choices'  => array(
        'none'      => '非表示',
        'date'      => '新着記事',
        'rand'      => 'ランダム記事',
        'recommend' => 'おすすめ記事',
      ),
      'partial'  => array(
        'selector'  => '.c-slider-header',
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

  $wp_customize->add_setting('parts_header_slider_auto', array(
    'default'   => true,
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_auto',
    array(
      'label'     => '自動でスライドする',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_auto',
      'type'      => 'checkbox',
    )
  );

  $wp_customize->add_setting('parts_header_slider_auto_speed', array(
    'default' => '3000',
    //'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    new Mytheme_Theme\Customizer\Control\WP_Customize_Range(
      $wp_customize,
      'ctl_parts_header_slider_auto_speed',
      array(
        'label' => '自動スライドの速度（ms）',
        'min'   => 0,
        'max'   => 10000,
        'step'  => 1000,
        'section'  => 'parts_header_slider',
        'settings' => 'parts_header_slider_auto_speed',
      )
    )
  );

  $wp_customize->add_setting('parts_header_slider_arrows', array(
    'default'   => true,
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_arrows',
    array(
      'label'     => 'スライダー両端の矢印の表示有無',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_arrows',
      'type'      => 'checkbox',
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

  $wp_customize->add_setting('parts_header_slider_centermode', array(
    'default'   => true,
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_centermode',
    array(
      'label'     => 'スライダーのセンタリング',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_centermode',
      'type'      => 'checkbox',
    )
  );

  $wp_customize->add_setting('parts_header_slider_all_number', array(
    'default' => '8',
    //'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    new Mytheme_Theme\Customizer\Control\WP_Customize_Range(
      $wp_customize,
      'ctl_parts_header_slider_all_number',
      array(
        'label' => 'スライドの枚数',
        'min'   => 2,
        'max'   => 10,
        'step'  => 1,
        'section'  => 'parts_header_slider',
        'settings' => 'parts_header_slider_all_number',
      )
    )
  );

  $wp_customize->add_setting('parts_header_slider_url_1', array(
    'default'   => true,
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_url_1',
    array(
      'label'     => 'スライダーに表示する記事①',
      'description' => 'URLを入力',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_url_1',
      'type'      => 'url',
    )
  );

  $wp_customize->add_setting('parts_header_slider_url_2', array(
    'default'   => true,
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_url_2',
    array(
      'label'     => 'スライダーに表示する記事②',
      'description' => 'URLを入力',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_url_2',
      'type'      => 'url',
    )
  );

  $wp_customize->add_setting('parts_header_slider_url_3', array(
    'default'   => true,
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_url_3',
    array(
      'label'     => 'スライダーに表示する記事③',
      'description' => 'URLを入力',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_url_3',
      'type'      => 'url',
    )
  );

  $wp_customize->add_setting('parts_header_slider_url_4', array(
    'default'   => true,
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_url_4',
    array(
      'label'     => 'スライダーに表示する記事④',
      'description' => 'URLを入力',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_url_4',
      'type'      => 'url',
    )
  );

  $wp_customize->add_setting('parts_header_slider_url_5', array(
    'default'   => true,
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_url_5',
    array(
      'label'     => 'スライダーに表示する記事⑤',
      'description' => 'URLを入力',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_url_5',
      'type'      => 'url',
    )
  );

  $wp_customize->add_setting('parts_header_slider_url_6', array(
    'default'   => true,
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_url_6',
    array(
      'label'     => 'スライダーに表示する記事⑥',
      'description' => 'URLを入力',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_url_6',
      'type'      => 'url',
    )
  );

  $wp_customize->add_setting('parts_header_slider_url_7', array(
    'default'   => true,
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_url_7',
    array(
      'label'     => 'スライダーに表示する記事⑦',
      'description' => 'URLを入力',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_url_7',
      'type'      => 'url',
    )
  );

  $wp_customize->add_setting('parts_header_slider_url_8', array(
    'default'   => true,
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_url_8',
    array(
      'label'     => 'スライダーに表示する記事⑧',
      'description' => 'URLを入力',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_url_8',
      'type'      => 'url',
    )
  );

  $wp_customize->add_setting('parts_header_slider_url_9', array(
    'default'   => true,
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_url_9',
    array(
      'label'     => 'スライダーに表示する記事⑨',
      'description' => 'URLを入力',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_url_9',
      'type'      => 'url',
    )
  );

  $wp_customize->add_setting('parts_header_slider_url_10', array(
    'default'   => true,
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_url_10',
    array(
      'label'     => 'スライダーに表示する記事⑩',
      'description' => 'URLを入力',
      'section'   => 'parts_header_slider',
      'settings'  => 'parts_header_slider_url_10',
      'type'      => 'url',
    )
  );

  $wp_customize->add_setting('parts_header_slider_disp_number', array(
    'default' => '4',
    //'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    new Mytheme_Theme\Customizer\Control\WP_Customize_Range(
      $wp_customize,
      'ctl_parts_header_slider_disp_number',
      array(
        'label' => '画面に表示するスライダーの枚数',
        'min'   => 1,
        'max'   => 5,
        'step'  => 1,
        'section'  => 'parts_header_slider',
        'settings' => 'parts_header_slider_disp_number',
      )
    )
  );

  $wp_customize->add_setting('parts_header_slider_width_maxwindow', array(
    'default'    => 'max',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_width_maxwindow',
    array(
      'label'    => 'スライダーの幅設定',
      'section'  => 'parts_header_slider',
      'settings' => 'parts_header_slider_width_maxwindow',
      'type'     => 'radio',
      'choices'  => array(
        'px'      => 'pxで設定する',
        'max'      => 'ウィンドウの最大幅に合わせる',
      ),
    )
  );

  $wp_customize->add_setting('parts_header_slider_width', array(
    'default' => '1180',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    new Mytheme_Theme\Customizer\Control\WP_Customize_Range(
      $wp_customize,
      'ctl_parts_header_slider_width',
      array(
        'label' => 'スライダーの幅（px）',
        'description' => '本項目の設定は、幅が1180px以上の時に有効。',
        'min'   => 0,
        'max'   => 1800,
        'step'  => 20,
        'section'  => 'parts_header_slider',
        'settings' => 'parts_header_slider_width',
      )
    )
  );

  $wp_customize->add_setting('parts_header_slider_article_margin_side', array(
    'default' => '13',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    new Mytheme_Theme\Customizer\Control\WP_Customize_Range(
      $wp_customize,
      'ctl_parts_header_slider_article_margin_side',
      array(
        'label' => '記事同士の余白幅（px）',
        'min'   => 0,
        'max'   => 20,
        'step'  => 1,
        'section'  => 'parts_header_slider',
        'settings' => 'parts_header_slider_article_margin_side',
      )
    )
  );
}

/**
 *スクロールボタン
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusPartsScroll($wp_customize,$section) {
  Customizer::add(
    $section,
    'parts_scroll_color',
    array(
      'label'    => '色',
      'description' => '右下にあるスクロールボタンの色を設定する。',
      'type'     => 'color',
      'partial'  => array(
        'selector' => '.c-top-scroll-btn a',
      ),
    )
  );

  Customizer::add(
    $section,
    'parts_scroll_hover_color',
    array(
      'label'    => 'ホバー時の色',
      'description' => '右下にあるスクロールボタンをホバーした時の色を設定する。',
      'type'     => 'color',
    )
  );
}
