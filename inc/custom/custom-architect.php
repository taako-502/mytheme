<?php
/**
 * ナビゲーションのカスタマイズを行うメソッド
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusArchitect( $wp_customize ) {
  // ヘッダー
  $wp_customize->add_panel(
    'architect',
    array(
      'title'    => '全体構成',
      'priority' => 22,
    )
  );

  $wp_customize->add_section(
    'architect_layout',
    array(
      'title'    => 'レイアウト',
      'panel'    => 'architect',
      'priority' => 1,
    )
  );

  $wp_customize->add_setting( 'architect_layout_col' , array(
    'default' => 'two-col',
  ));

  $wp_customize->add_control(
    'ctl_architect_layout_col',
    array(
      'label' => 'フロントページのレイアウト',
      'section' => 'architect_layout',
      'settings' => 'architect_layout_col',
      'type'     => 'radio',
      'choices'  => array(
        'one-col' => '1カラム（サイドバーなし）',
        'two-col' => '2カラム',
      ),
    )
  );
}
