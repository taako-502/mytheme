<?php
/**
 * 背景の設定
 */

/**
 * 背景画像の設定
 * @var array
 */
 $custom_background_defaults = array(
         'default-color' => 'eef5ee',
         'default-image' => get_bloginfo('template_url') . '/img/wall-pic.png',
 );
 add_theme_support( 'custom-background', $custom_background_defaults );

/**
 * [cusBg description]
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
 function cusBg( $wp_customize ) {
   // ナビゲーションバーの色設定
   $wp_customize->add_panel(
     'bg',
     array(
       'title'    => '背景',
       'priority' => 81,
     )
   );

   $wp_customize->add_section(
     'bg-color',
     array(
       'title'    => 'カラー',
       'panel'    => 'bg',
       'priority' => 1,
     )
   );

   $wp_customize->add_setting( 'bg_color' , array(
     'default'    => '#FFF',
     'sanitize_callback' => 'sanitize_hex_color',
   ));

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
 }
?>
