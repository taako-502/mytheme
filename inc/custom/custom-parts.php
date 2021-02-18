<?php
/**
 * 部品のカスタマイザー
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusParts( $wp_customize ) {
  cusPartsPanel($wp_customize);
  cusPartsSection($wp_customize);

  $wp_customize->add_setting( 'parts_scroll_color' , array(
   'default'    => '#006EB0',//ブルーアシード
   'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
   new WP_Customize_Color_Control(
     $wp_customize,
     'ctl_parts_scroll_color',
     array(
       'label' => '色',
       'description' => '右下にあるスクロールボタンの色を設定する。',
       'section'  => 'parts_scroll',
       'settings' => 'parts_scroll_color',
     )
   )
  );

  $wp_customize->add_setting( 'parts_scroll_hover_color' , array(
   'default'    => '#3E9FD2',//ブルーアゲート
   'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(
   new WP_Customize_Color_Control(
     $wp_customize,
     'ctl_parts_scroll_hover_color',
     array(
       'label' => 'ホバー時の色',
       'description' => '右下にあるスクロールボタンをホバーした時の色を設定する。',
       'section'  => 'parts_scroll',
       'settings' => 'parts_scroll_hover_color',
     )
   )
  );
}

/**
 * パネル設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusPartsPanel( $wp_customize ) {
  // ナビゲーションバーの色設定
  $wp_customize->add_panel(
    'parts',
    array(
      'title'    => '部品',
      'priority' => 95,
    )
  );
}

/**
 * セクション設定
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function cusPartsSection( $wp_customize ) {
  $wp_customize->add_section(
    'parts_scroll',
    array(
      'title'    => 'スクロールボタン',
      'panel'    => 'parts',
      'priority' => 1,
    )
  );
}
