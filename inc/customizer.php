<?php
/**
 * mytheme Theme Customizer
 *
 * @package mytheme
 */
function my_customize( $wp_customize ) {

  // ナビゲーションバー
  $wp_customize->add_panel(
    'my_panel',
    array(
      'title'    => 'ナビゲーションメニュー',
      'priority' => 21,
    )
  );

  $wp_customize->add_section(
    'my_section',
    array(
      'title'    => 'カラー',
      'panel'    => 'my_panel',
      'priority' => 1,
    )
  );

  $wp_customize->add_setting( 'my_setting_colorpicker' );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'my_control_colorpicker',
      array(
        'label'    => 'ナビバーの背景色',
        'section'  => 'my_section',
        'settings' => 'my_setting_colorpicker',
      )
    )
  );
}
add_action( 'customize_register', 'my_customize' );
