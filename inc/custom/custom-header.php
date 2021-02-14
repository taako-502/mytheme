<?php
/**
 * ナビゲーションのカスタマイズを行うメソッド
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusHeader( $wp_customize ) {
  // ヘッダー
  $wp_customize->add_panel(
    'header',
    array(
      'title'    => 'ヘッダー',
      'priority' => 30,
    )
  );

  $wp_customize->add_section(
    'header_layout',
    array(
      'title'    => 'レイアウト',
      'panel'    => 'header',
      'priority' => 1,
    )
  );

  $wp_customize->add_setting( 'header_layout_titile_align' , array(
    'default'    => 'left',
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

  $wp_customize->add_section(
    'header_color',
    array(
      'title'    => 'カラー',
      'panel'    => 'header',
      'priority' => 2,
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
        'section'  => 'header_color',
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
        'section'  => 'header_color',
        'settings' => 'nav_bg_color',
      )
    )
  );
}
