<?php
/**
 * ナビゲーションのカスタマイズを行うメソッド
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusFooter( $wp_customize ) {
  // ナビゲーションバーの色設定
  $wp_customize->add_panel(
    'footer',
    array(
      'title'    => 'フッター',
      'priority' => 90,
    )
  );

  $wp_customize->add_section(
    'footer-color',
    array(
      'title'    => 'カラー',
      'panel'    => 'footer',
      'priority' => 1,
    )
  );

  $wp_customize->add_setting( 'footer_widget_bg_color' , array(
    'default'    => '#333',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_footer_widget_bg_color',
      array(
        'label'    => 'フッター上ウィジェットの背景色',
        'section'  => 'footer-color',
        'settings' => 'footer_widget_bg_color',
      )
    )
  );

  $wp_customize->add_setting( 'footer_bg_color' , array(
    'default'    => '#333',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_footer_bg_color',
      array(
        'label'    => 'フッターの背景色',
        'section'  => 'footer-color',
        'settings' => 'footer_bg_color',
      )
    )
  );
}
