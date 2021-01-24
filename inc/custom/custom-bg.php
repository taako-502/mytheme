<?php
/**
 * 背景の設定
 */

/**
 * 背景画像の設定
 * @var array
 */
 $custom_background_defaults = array(
         'default-color' => '#FFF',
 );
 add_theme_support( 'custom-background', $custom_background_defaults );

/**
 * 背景の設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusBg( $wp_customize ) {
  $wp_customize->add_panel(
   'bg',
   array(
     'title'    => '背景',
     'priority' => 81,
   )
  );
  cusBgColor($wp_customize);
  cusBgShadow($wp_customize);
}

/**
 * 色の設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusBgColor($wp_customize){
  $wp_customize->add_section(
   'bg-color',
   array(
     'title'    => 'カラー',
     'panel'    => 'bg',
     'priority' => 1,
   )
  );

  //背景色
  $wp_customize->add_setting(
   'bg_color' ,
   array(
     'default'    => '#FFF',
     'sanitize_callback' => 'sanitize_hex_color',
   )
  );

  $wp_customize->add_control(
   new WP_Customize_Color_Control(
     $wp_customize,
     'ctl_bg_color',
     array(
       'label'    => '背景色',
       'section'  => 'bg-color',
       'settings' => 'bg_color',
     )
   )
  );

  //セクションの色
  $wp_customize->add_setting( 'section_bg_color' , array(
   'default'    => '#FFF',
   'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
   new WP_Customize_Color_Control(
     $wp_customize,
     'ctl_section_bg_color',
     array(
       'label'    => 'セクションの背景色',
       'section'  => 'bg-color',
       'settings' => 'section_bg_color',
     )
   )
  );

  //セクションの透明度
  $wp_customize->add_setting( 'section_bg_opacity' , array(
   'default'    => '100',
   //'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Range(
      $wp_customize,
      'ctl_section_bg_opacity',
      array(
        'label'   => 'セクションの透明度',
        'min' => 0,
        'max' => 100,
        'step' => 1,
        'section'  => 'bg-color',
        'settings' => 'section_bg_opacity',
      )
    )
  );
}

/**
 * 影の設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusBgShadow($wp_customize){
  $wp_customize->add_section(
    'bg-shadow',
    array(
      'title'    => '影',
      'panel'    => 'bg',
      'priority' => 2,
    )
  );

  //影の長さ
  $wp_customize->add_setting( 'section_shadow_len' , array(
   'default'    => '2',
   //'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Range(
      $wp_customize,
      'ctl_section_shadow_len',
      array(
        'label'   => 'セクションの影の長さ（px）',
        'min' => 0,
        'max' => 10,
        'step' => 1,
        'section'  => 'bg-shadow',
        'settings' => 'section_shadow_len',
      )
    )
  );

  //影の透明度
  $wp_customize->add_setting( 'section_shadow_opacity' , array(
   'default'    => '100',
   //'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
    new WP_Customize_Range(
      $wp_customize,
      'ctl_section_shadow_opacity',
      array(
        'label'   => 'セクションの影の透明度(%)',
        'min' => 0,
        'max' => 100,
        'step' => 1,
        'section'  => 'bg-shadow',
        'settings' => 'section_shadow_opacity',
      )
    )
  );
}
?>
