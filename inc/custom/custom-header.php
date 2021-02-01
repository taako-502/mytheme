<?php
/**
 * ナビゲーションのカスタマイズを行うメソッド
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusHeader( $wp_customize ) {
  // ヘッダー
  $wp_customize->add_panel(
    'nav',
    array(
      'title'    => 'ヘッダー',
      'priority' => 30,
    )
  );

  $wp_customize->add_section(
    'nav-color',
    array(
      'title'    => 'カラー',
      'panel'    => 'nav',
      'priority' => 1,
    )
  );

  $wp_customize->add_setting( 'nav_text_color' , array(
    'default'    => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_nav_text_color',
      array(
        'label'    => 'ナビの文字色',
        'section'  => 'nav-color',
        'settings' => 'nav_text_color',
      )
    )
  );

  $wp_customize->add_setting( 'nav_bg_color' , array(
    'default'    => '#333',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_nav_bg_color',
      array(
        'label'    => 'ナビバーの背景色',
        'section'  => 'nav-color',
        'settings' => 'nav_bg_color',
      )
    )
  );
}
