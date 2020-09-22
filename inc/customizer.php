<?php
/**
 * mytheme Theme Customizer
 *
 * @package mytheme
 */
function my_customize( $wp_customize ) {
  // ナビゲーションバー
  // ナビゲーションバー
  $wp_customize->add_panel(
    'nav',
    array(
      'title'    => 'ナビゲーションメニュー',
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

  $wp_customize->add_setting( 'nav_setting_colorpicker' );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'nav_control_colorpicker',
      array(
        'label'    => 'ナビバーの背景色',
        'section'  => 'nav-color',
        'settings' => 'nav_setting_colorpicker',
      )
    )
  );
}
add_action( 'customize_register', 'my_customize' );

/**
 * ラッパー
 */
function getCusNavColor(){return get_theme_mod('nav_setting_colorpicker','#212529');}
