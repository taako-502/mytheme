<?php
/**
 * 部品のカスタマイザー
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusParts($wp_customize) {
  cusPartsPanel($wp_customize);
  cusPartsSection($wp_customize);
  /* ヘッダー下スライダ- */
  cusPartsHeaderSlider($wp_customize);
  /* スクロールボタン */
  cusPartsScroll($wp_customize);
}

/**
 * パネル設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusPartsPanel($wp_customize) {
  // ナビゲーションバーの色設定
  $wp_customize->add_panel(
    'parts',
    array(
      'title'    => '部品',
      'priority' => 95,
    )
  );
}

/**
 * セクション設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusPartsSection($wp_customize) {
  $wp_customize->add_section(
    'parts_header_slider',
    array(
      'title'    => 'ヘッダー下スライダー',
      'panel'    => 'parts',
      'priority' => 2,
    )
  );

  $wp_customize->add_section(
    'parts_scroll',
    array(
      'title'    => 'スクロールボタン',
      'panel'    => 'parts',
      'priority' => 2,
    )
  );
}

/**
 * スライダーの設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusPartsHeaderSlider($wp_customize) {
  $wp_customize->selective_refresh->add_partial('parts_header_slider_type', array(
    'selector' => '.c-slider-header',
  ));

  $wp_customize->selective_refresh->add_partial('parts_header_slider_type', array(
    'selector' => '.c-slider-header',
  ));

  $wp_customize->add_setting('parts_header_slider_type', array(
    'default'    => 'news',
  ));

  $wp_customize->add_control(
    'ctl_parts_header_slider_type',
    array(
      'label'    => 'スライダーの表示',
      'section'  => 'parts_header_slider',
      'settings' => 'parts_header_slider_type',
      'type'     => 'radio',
      'choices'  => array(
        'none'      => '非表示',
        'date'      => '新着記事',
        'rand'      => 'ランダム記事',
        'recommend' => 'おすすめ記事',
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
    new WP_Customize_Range(
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

  $wp_customize->add_setting('parts_header_slider_all_number', array(
    'default' => '8',
    //'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    new WP_Customize_Range(
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
    new WP_Customize_Range(
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

  $wp_customize->add_setting('parts_header_slider_width', array(
    'default' => '1180',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    new WP_Customize_Range(
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
    new WP_Customize_Range(
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

function cusPartsScroll($wp_customize) {
  $wp_customize->add_setting('parts_scroll_color', array(
   'default'    => '#006EB0',//ブルーアシード
   'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
     $wp_customize,
     'ctl_parts_scroll_color',
     array(
       'label' => '色',
       'description' => '右下にあるスクロールボタンの色を設定する。',
       'section'  => 'parts_scroll',
       'settings' => 'parts_scroll_color',
     )
   )
  );

  $wp_customize->selective_refresh->add_partial('parts_scroll_color', array(
    'selector' => '.c-top-scroll-btn a',
  ));

  $wp_customize->add_setting('parts_scroll_hover_color', array(
    'default'    => '#3E9FD2',//ブルーアゲート
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_parts_scroll_hover_color',
      array(
        'label' => 'ホバー時の色',
        'description' => '右下にあるスクロールボタンをホバーした時の色を設定する。',
        'section'  => 'parts_scroll',
        'settings' => 'parts_scroll_hover_color',
      )
    )
  );
}
