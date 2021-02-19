<?php
/**
 * ナビゲーションのカスタマイズを行うメソッド
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusFooter( $wp_customize ) {
  cusFooterPanel($wp_customize);
  cusFooterSection($wp_customize);

  $wp_customize->add_setting( 'footer_content_copyright',array(
    'default' => 'Copyright © [#year] [#title] Powered by MY THEME.',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_footer_content_copyright',
    array(
      'label' => 'コピーライト',
      'description' => 'aタグを含むhtmlタグが使用可能です。[#title]を入力するとサイトタイトル、[#year]を入力すると現在の西暦年が表示されます。',
      'section' => 'footer_content',
      'settings' => 'footer_content_copyright',
      'type' => 'text',
    )
  );

  $wp_customize->selective_refresh->add_partial( 'footer_content_copyright', array(
  	'selector' => '.l-footer--center',
  ) );

  /* （フッター上ウィジェット）テキスト */
  $wp_customize->add_setting( 'footer_widget_text_color' , array(
    'default'    => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_footer_widget_text_color',
      array(
        'label'    => '文字色',
        'section'  => 'footer_widget_text',
        'settings' => 'footer_widget_text_color',
      )
    )
  );

  $wp_customize->add_setting( 'footer_widget_text_hover_color' , array(
    'default'    => '#007BBB',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_footer_widget_text_hover_color',
      array(
        'label'    => 'ホバー時の文字色',
        'section'  => 'footer_widget_text',
        'settings' => 'footer_widget_text_hover_color',
      )
    )
  );

  /* （フッター上ウィジェット）背景 */
  $wp_customize->add_setting( 'footer_widget_bg_color' , array(
    'default'    => '#333',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_footer_widget_bg_color',
      array(
        'label'    => '背景色',
        'section'  => 'footer_widget_bg',
        'settings' => 'footer_widget_bg_color',
      )
    )
  );

  /* （フッター）テキスト */
  $wp_customize->add_setting( 'footer_text_color' , array(
    'default'    => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_footer_text_color',
      array(
        'label'    => '文字色',
        'section'  => 'footer_text',
        'settings' => 'footer_text_color',
      )
    )
  );

  $wp_customize->add_setting( 'footer_text_hover_color' , array(
    'default'    => '#007BBB',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_footer_text_hover_color',
      array(
        'label'    => 'ホバー時の文字色',
        'section'  => 'footer_text',
        'settings' => 'footer_text_hover_color',
      )
    )
  );

  /* （フッター）背景 */
  $wp_customize->add_setting( 'footer_bg_color' , array(
    'default'    => '#333',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_footer_bg_color',
      array(
        'label'    => '背景色',
        'section'  => 'footer_bg',
        'settings' => 'footer_bg_color',
      )
    )
  );
}

/**
 * パネル設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusFooterPanel( $wp_customize ) {
  // ナビゲーションバーの色設定
  $wp_customize->add_panel(
    'footer',
    array(
      'title'    => 'フッター',
      'priority' => 90,
    )
  );
}

/**
 * セクション設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusFooterSection( $wp_customize ) {
  $wp_customize->add_section(
    'footer_content',
    array(
      'title'    => 'コンテンツ',
      'panel'    => 'footer',
      'priority' => 1,
    )
  );
  $wp_customize->add_section(
    'footer_widget_text',
    array(
      'title'    => '（フッター上ウィジェット）テキスト',
      'panel'    => 'footer',
      'priority' => 12,
    )
  );
  $wp_customize->add_section(
    'footer_widget_bg',
    array(
      'title'    => '（フッター上ウィジェット）背景',
      'panel'    => 'footer',
      'priority' => 13,
    )
  );
  $wp_customize->add_section(
    'footer_text',
    array(
      'title'    => '（フッター）テキスト',
      'panel'    => 'footer',
      'priority' => 22,
    )
  );
  $wp_customize->add_section(
    'footer_bg',
    array(
      'title'    => '（フッター）背景',
      'panel'    => 'footer',
      'priority' => 23,
    )
  );
}
