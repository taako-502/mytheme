<?php
/**
 * mytheme Theme Customizer
 *
 * @package mytheme
 */
function my_customize( $wp_customize ) {
  // ナビゲーションバー
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

  $wp_customize->add_setting( 'nav_logo_color' );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_nav_logo_color',
      array(
        'label'    => 'ロゴの色',
        'section'  => 'nav-color',
        'settings' => 'nav_logo_color',
      )
    )
  );

  $wp_customize->add_setting( 'nav_background_color' );
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

  $wp_customize->add_setting( 'nav_menu_color' );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_nav_menu_color',
      array(
        'label'    => 'メニューの文字色',
        'section'  => 'nav-color',
        'settings' => 'nav_menu_color',
      )
    )
  );
}
add_action( 'customize_register', 'my_customize' );

/**
 * ラッパー
 */
function getCusNavLogoColor(){return get_theme_mod('nav_logo_color','#333');}
function getCusNavMenuColor(){return get_theme_mod('nav_menu_color','#333');}
function getCusNavBackColor(){return get_theme_mod('nav_background_color','#212529');}
