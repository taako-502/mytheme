<?php
/**
 * ナビゲーションのカスタマイズを行うメソッド
 * @param  WP_Customize_Manager $wp_customize カスタマイズの設定
 */
function cusFront( $wp_customize ) {
  // ヘッダー
  $wp_customize->add_panel(
    'front',
    array(
      'title'    => 'トップページ（フロントページ）',
      'priority' => 25,
    )
  );

  $wp_customize->add_section(
    'front_architect',
    array(
      'title'    => '構成',
      'panel'    => 'front',
      'priority' => 1,
    )
  );

  $wp_customize->add_setting( 'front_architect_reco_disp' , array(
    'default' => 'visible',
  ));

  $wp_customize->add_control(
    'ctl_front_architect_reco_disp',
    array(
      'label' => 'おすすめ記事の表示',
      'section' => 'front_architect',
      'settings' => 'front_architect_reco_disp',
      'type' => 'radio',
      'label' => 'コントロールの見出し',
      'type'     => 'radio',
      'choices'  => array(
        'visible' => '表示',
        'hidden' => '非表示',
      ),
    )
  );

  $wp_customize->add_section(
    'front_text',
    array(
      'title'    => 'テキスト',
      'panel'    => 'front',
      'priority' => 2,
    )
  );

  $wp_customize->add_setting( 'front_text_reco' , array(
    'default' => 'おすすめ記事',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_front_text_reco',
    array(
      'label' => 'おすすめ記事の見出し',
      'section' => 'front_text',
      'settings' => 'front_text_reco',
      'type' => 'text',
    )
  );

  $wp_customize->selective_refresh->add_partial( 'front_text_reco', array(
    'selector' => '.p-recommend--h2',
  ) );

  $wp_customize->add_setting( 'front_text_news' , array(
    'default' => '新着記事',
    'transport' => 'postMessage',
  ));

  $wp_customize->add_control(
    'ctl_front_text_news',
    array(
      'label' => '新着記事の見出し',
      'section' => 'front_text',
      'settings' => 'front_text_news',
      'type' => 'text',
    )
  );

  $wp_customize->selective_refresh->add_partial( 'front_text_news', array(
    'selector' => '.p-news--h2',
  ) );
}
