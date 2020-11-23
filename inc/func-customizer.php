<?php
/**
 * カスタマイザー
 *
 * @package mytheme
 */
function mytheme_customize( $wp_customize ) {
  // ナビゲーションバーのカスタマイザ
  cusNav($wp_customize);
}
add_action( 'customize_register', 'mytheme_customize' );

/**
 * ラッパー
 */
function getCusNavTextColor(){ return get_theme_mod('nav_text_color','#FFF'); }
function getCusNavBackColor(){ return get_theme_mod('nav_background_color','#212529'); }

/**
 * ナビゲーションのカスタマイズを行うメソッド
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusNav( $wp_customize ) {
  // ナビゲーションバーの色設定
  $wp_customize->add_panel(
    'nav',
    array(
      'title'    => 'ナビゲーション',
      'priority' => 21,
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

  $wp_customize->add_setting( 'nav_background_color' , array(
    'default'    => '#333',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_nav_background_color',
      array(
        'label'    => 'ナビバーの背景色',
        'section'  => 'nav-color',
        'settings' => 'nav_background_color',
      )
    )
  );
}
