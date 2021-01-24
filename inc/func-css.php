<?php
/**
 * カスタマイザーや管理画面で設定したCSSを出力
 *
 * @link https://github.com/taako-502/mytheme
 *
 * @package mytheme
 */

/**
 * [mytheme_customize_css description]
 * @return [type] [description]
 */
function mytheme_customize_css(){
  //変数読み込み
  require_once( plugin_dir_path(__FILE__) . "../admin/admin-init.php");
  require_once( plugin_dir_path(__FILE__) . "../utility/variable.php");
  ?>
  <style type="text/css">
    /* ヘッダー */
    header {
      background-color: <?php echo get_theme_mod( 'nav_bg_color', $header_bg_color_def ); ?>!important;
    }
    header a {
      color: <?php echo get_theme_mod( 'nav_text_color', $nav_txt_color_def); ?>!important;
    }

    /* 背景色 */
    body {
      background-color: <?php echo get_theme_mod('bg_color',$bg_color_def) ?>;
    }

    /* 文字サイズ（PC） */
    section p { font-size: <?php echo ut\getValOrDef($pc_psize,$pc_psize_def); ?>px!important; }
    section h1 { font-size: <?php echo ut\getValOrDef($pc_h1size,$pc_h1size_def); ?>px!important; }
    section h2 { font-size: <?php echo ut\getValOrDef($pc_h2size,$pc_h2size_def); ?>px!important; }
    section h3 { font-size: <?php echo ut\getValOrDef($pc_h3size,$pc_h3size_def); ?>px!important; }
    section h4 { font-size: <?php echo ut\getValOrDef($pc_h4size,$pc_h4size_def); ?>px!important; }
    section h5 { font-size: <?php echo ut\getValOrDef($pc_h5size,$pc_h5size_def); ?>px!important; }
    section h6 { font-size: <?php echo ut\getValOrDef($pc_h6size,$pc_h6size_def); ?>px!important; }

    /* 文字サイズ（タブレット） */
    @media screen and (max-width:980px) {
      section p { font-size: <?php echo ut\getValOrDef($tb_psize,$tb_psize_def); ?>px!important; }
      section h1 { font-size: <?php echo ut\getValOrDef($tb_h1size,$tb_h1size_def); ?>px!important; }
      section h2 { font-size: <?php echo ut\getValOrDef($tb_h2size,$tb_h2size_def); ?>px!important; }
      section h3 { font-size: <?php echo ut\getValOrDef($tb_h3size,$tb_h3size_def); ?>px!important; }
      section h4 { font-size: <?php echo ut\getValOrDef($tb_h4size,$tb_h4size_def); ?>px!important; }
      section h5 { font-size: <?php echo ut\getValOrDef($tb_h5size,$tb_h5size_def); ?>px!important; }
      section h6 { font-size: <?php echo ut\getValOrDef($tb_h6size,$tb_h6size_def); ?>px!important; }
    }

    /* 文字サイズ（スマートフォン） */
    @media (max-width:768px) {
      section p { font-size: <?php echo ut\getValOrDef($sm_psize,$sm_psize_def); ?>px!important; }
      section h1 { font-size: <?php echo ut\getValOrDef($sm_h1size,$sm_h1size_def); ?>px!important; }
      section h2 { font-size: <?php echo ut\getValOrDef($sm_h2size,$sm_h2size_def); ?>px!important; }
      section h3 { font-size: <?php echo ut\getValOrDef($sm_h3size,$sm_h3size_def); ?>px!important; }
      section h4 { font-size: <?php echo ut\getValOrDef($sm_h4size,$sm_h4size_def); ?>px!important; }
      section h5 { font-size: <?php echo ut\getValOrDef($sm_h5size,$sm_h5size_def); ?>px!important; }
      section h6 { font-size: <?php echo ut\getValOrDef($sm_h6size,$sm_h6size_def); ?>px!important; }
    }
  </style>

  <?php
}
add_action( 'wp_head', 'mytheme_customize_css');
?>
