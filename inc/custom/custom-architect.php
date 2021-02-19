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

  $wp_customize->add_setting( 'architect_content_width' , array(
    'default' => '1180',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_architect_content_width',
    array(
      'label' => 'コンテンツ幅（px）',
      'section' => 'architect_layout',
      'settings' => 'architect_content_width',
      'type' => 'number',
      'input_attrs' => array(
        'step' => '20',
        'min'  => '400',
      ),
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

  $wp_customize->add_setting( 'architect_col_one_width' , array(
    'default' => '100',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_architect_col_one_width',
    array(
      'label' => 'メインエリアの幅（%）:ワンカラムの場合のみ',
      'section' => 'architect_layout',
      'settings' => 'architect_col_one_width',
      'type' => 'number',
    )
  );

  $wp_customize->add_section(
    'architect_text',
    array(
      'title'    => 'テキスト',
      'panel'    => 'architect',
      'priority' => 1,
    )
  );
  $wp_customize->add_setting( 'architect_text_color' , array(
    'default' => '#333',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_architect_text_color',
      array(
        'label'    => 'テキストの文字色',
        'section'  => 'architect_text',
        'settings' => 'architect_text_color',
      )
    )
  );

  $wp_customize->add_setting( 'architect_text_link_color' , array(
    'default' => '#04C',
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_architect_text_link_color',
      array(
        'label'    => 'リンクテキストの文字色',
        'section'  => 'architect_text',
        'settings' => 'architect_text_link_color',
      )
    )
  );

  $wp_customize->add_setting( 'architect_text_link_hover_color' , array(
    'default' => '#007BBB',//紺碧色（こんぺき色）
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'ctl_architect_text_link_hover_color',
      array(
        'label'    => 'リンクテキストホバー時の文字色',
        'section'  => 'architect_text',
        'settings' => 'architect_text_link_hover_color',
      )
    )
  );
}
