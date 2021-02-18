<?php
/**
 * ナビゲーションのカスタマイズを行うメソッド
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusHeader( $wp_customize ) {
  cusHeaderPanel($wp_customize);
  cusHeaderSection($wp_customize);

  /* レイアウト */
  $wp_customize->add_setting( 'header_layout_titile_align' , array(
    'default'    => 'left',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_header_layout_titile_align',
    array(
      'label'    => 'サイトタイトルの位置',
      'section'  => 'header_layout',
      'settings' => 'header_layout_titile_align',
      'type'     => 'radio',
      'choices'  => array(
        'left' => '左寄せ',
        'center' => '中央',
        'right' => '右寄せ',
      ),
    )
  );

  $wp_customize->add_setting( 'header_layout_nav_align' , array(
    'default'    => 'right',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_header_layout_nav_align',
    array(
      'label'    => 'ナビゲーションメニューの位置',
      'section'  => 'header_layout',
      'settings' => 'header_layout_nav_align',
      'type'     => 'radio',
      'choices'  => array(
        'left' => '左寄せ',
        'center' => '中央',
        'right' => '右寄せ',
      ),
    )
  );

  /* テキスト */
  $wp_customize->add_setting( 'header_text_description_fontsize' , array(
    'default' => '13',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_header_text_description_fontsize',
    array(
      'label' => 'キャッチフレーズのフォントサイズ（px）',
      'section' => 'header_text',
      'settings' => 'header_text_description_fontsize',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '1',
      ),
    )
  );
  
  $wp_customize->add_setting( 'header_text_logo_fontsize' , array(
    'default' => '28',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_header_text_logo_fontsize',
    array(
      'label' => 'ロゴのフォントサイズ（px）',
      'section' => 'header_text',
      'settings' => 'header_text_logo_fontsize',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '1',
      ),
    )
  );

  $wp_customize->add_setting( 'header_text_color' , array(
    'default'    => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_header_text_color',
      array(
        'label'    => '文字色',
        'section'  => 'header_text',
        'settings' => 'header_text_color',
      )
    )
  );

  $wp_customize->add_setting( 'header_text_hover_color' , array(
    'default'    => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_header_text_hover_color',
      array(
        'label'    => 'ホバー時の文字色',
        'section'  => 'header_text',
        'settings' => 'header_text_hover_color',
      )
    )
  );

  $wp_customize->add_setting( 'header_text_description_margin_top' , array(
    'default' => '28',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_header_text_description_margin_top',
    array(
      'label' => 'キャッチフレーズ上のマージン（px）',
      'section' => 'header_text',
      'settings' => 'header_text_description_margin_top',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '1',
      ),
    )
  );

  $wp_customize->add_setting( 'header_text_title_margin_top' , array(
    'default' => '25',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_header_text_title_margin_top',
    array(
      'label' => 'サイトタイトル上のマージン（px）',
      'section' => 'header_text',
      'settings' => 'header_text_title_margin_top',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '1',
      ),
    )
  );

  $wp_customize->add_setting( 'header_text_title_margin_bottom' , array(
    'default' => '25',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_header_text_title_margin_bottom',
    array(
      'label' => 'サイトタイトル下のマージン（px）',
      'section' => 'header_text',
      'settings' => 'header_text_title_margin_bottom',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '1',
      ),
    )
  );

  /* 背景 */
  $wp_customize->add_setting( 'header_bg_color' , array(
    'default'    => '#333',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_header_bg_color',
      array(
        'label'    => 'ヘッダーの背景色',
        'section'  => 'header_bg',
        'settings' => 'header_bg_color',
      )
    )
  );
}

/**
 * パネル設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusHeaderPanel( $wp_customize ) {
  // ヘッダー
  $wp_customize->add_panel(
    'header',
    array(
      'title'    => 'ヘッダー',
      'priority' => 30,
    )
  );
}

/**
 * セクション設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusHeaderSection( $wp_customize ) {

    $wp_customize->add_section(
      'header_layout',
      array(
        'title'    => 'レイアウト',
        'panel'    => 'header',
        'priority' => 1,
      )
    );
    $wp_customize->add_section(
      'header_text',
      array(
        'title'    => 'テキスト',
        'panel'    => 'header',
        'priority' => 2,
      )
    );
    $wp_customize->add_section(
      'header_bg',
      array(
        'title'    => '背景',
        'panel'    => 'header',
        'priority' => 3,
      )
    );
}
