<?php
/**
 * フロントページのカスタマイズを行うメソッド
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusFront( $wp_customize ) {
  cusFrontSection($wp_customize);
  cusFrontPanel($wp_customize);

  /* 構成 */
  $wp_customize->add_setting( 'front_architect_reco_disp' , array(
    'default' => 'visible',
  ));

  $wp_customize->add_control(
    'ctl_front_architect_reco_disp',
    array(
      'label' => 'おすすめ記事の表示',
      'section' => 'front_architect',
      'settings' => 'front_architect_reco_disp',
      'type'     => 'radio',
      'choices'  => array(
        'visible' => '表示',
        'hidden' => '非表示',
      ),
    )
  );

  /* 見出し */
  $wp_customize->add_setting( 'front_heading_reco' , array(
    'default' => 'おすすめ記事',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_front_heading_reco',
    array(
      'label' => 'おすすめ記事の見出し',
      'section' => 'front_heading',
      'settings' => 'front_heading_reco',
      'type' => 'text',
    )
  );

  $wp_customize->selective_refresh->add_partial( 'front_heading_reco', array(
    'selector' => '.p-recommend--h2',
  ) );

  $wp_customize->add_setting( 'front_heading_news' , array(
    'default' => '新着記事',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_front_heading_news',
    array(
      'label' => '新着記事の見出し',
      'section' => 'front_heading',
      'settings' => 'front_heading_news',
      'type' => 'text',
    )
  );

  $wp_customize->selective_refresh->add_partial( 'front_heading_news', array(
    'selector' => '.p-news--h2',
  ) );

  $wp_customize->add_setting( 'front_heading_color' , array(
    'default'    => '#333',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_front_heading_color',
      array(
        'label'    => '見出し（H2）の文字色について',
        'section'   => 'front_heading',
        'settings'  => 'front_heading_color',
      )
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

  $wp_customize->add_setting( 'front_heading_border' , array(
    'default' => 'border-left',
  ));

  $wp_customize->add_control(
    'ctl_front_heading_border',
    array(
      'label' => '見出し（H2）のボーダーについて',
      'section' => 'front_heading',
      'settings' => 'front_heading_border',
      'type'     => 'radio',
      'choices'  => array(
        'none' => '非表示',
        'border-left' => '左に線を引く',
        'border-bottom' => '下に線を引く',
        'border-bottom-two-tone' => '下に線を引く（ツートンカラー）',
      ),
    )
  );

  $wp_customize->add_setting( 'front_heading_border_color' , array(
    'default'    => 'skyblue',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_front_heading_border_color',
      array(
        'label'    => 'ボーダーの色について',
        'section'  => 'front_heading',
        'settings' => 'front_heading_border_color',
      )
    )
  );

  $wp_customize->add_setting( 'front_heading_border_color_sub' , array(
    'default'    => '#FFC778',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_front_heading_border_color_sub',
      array(
        'label'    => 'ボーダーの色について（サブ）',
        'section'  => 'front_heading',
        'settings' => 'front_heading_border_color_sub',
      )
    )
  );

  //余白
  $wp_customize->add_setting( 'front_heading_padding_top_and_bottom' , array(
   'default'    => '0.1',
   'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    new WP_Customize_Range(
      $wp_customize,
      'ctl_front_heading_padding_top_and_bottom',
      array(
        'label'   => '見出し（H2）上下の余白（em）',
        'min' => 0,
        'max' => 3,
        'step' => 0.05,
        'section'  => 'front_heading',
        'settings' => 'front_heading_padding_top_and_bottom',
      )
    )
  );

  $wp_customize->add_setting( 'front_heading_padding_left' , array(
   'default'    => '0.1',
   'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    new WP_Customize_Range(
      $wp_customize,
      'ctl_front_heading_padding_left',
      array(
        'label'   => '見出し（H2）左側の余白（em）',
        'min' => 0,
        'max' => 3,
        'step' => 0.05,
        'section'  => 'front_heading',
        'settings' => 'front_heading_padding_left',
      )
    )
  );
}

/**
 * パネルの設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusFrontPanel($wp_customize){
  $wp_customize->add_panel(
    'front',
    array(
      'title'    => 'トップページ（フロントページ）',
      'priority' => 25,
    )
  );
}

/**
 * セクションの設定
 * @return [type] [description]
 */
function cusFrontSection($wp_customize) {
  $wp_customize->add_section(
    'front_architect',
    array(
      'title'    => '構成',
      'panel'    => 'front',
      'priority' => 1,
    )
  );

  $wp_customize->add_section(
    'front_heading',
    array(
      'title'    => '見出し',
      'panel'    => 'front',
      'priority' => 11,
    )
  );
}
