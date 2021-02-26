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
    /* ==========================================================================
    // Foundation
    // ========================================================================*/
    /* ベース　*/
    .contents {
      max-width: <?php echo get_theme_mod('front_architect_content_width','1180'); ?>px;
    }

    .contents p {
      color: <?php echo get_theme_mod('architect_text_color','#333'); ?>
    }

    .l-sidebar--widget a,
    .comment-body a,
    .c-breadcrumb a,
    .contents p a {
      color: <?php echo get_theme_mod('architect_text_link_color','#04C'); ?>
    }

    .u-color-hover:hover,
    .contents a:hover {
      color: <?php echo get_theme_mod('architect_text_link_hover_color','#007bbb'); ?>
    }

    /* ==========================================================================
    // Layout
    // ========================================================================*/
    /* ヘッダー */
    @media screen and (min-width: 767px) {
      .l-header,
      .l-header--inner  {
        background-color: <?php echo get_theme_mod( 'header_bg_color', $header_bg_color_def ); ?>!important;
      }
      .l-header--inner a {
        color: <?php echo get_theme_mod( 'header_text_color', $nav_txt_color_def); ?>;
      }

      .l-header--inner a:hover {
        /* 画面から設定できるようにすること */
        color: <?php echo get_theme_mod('header_text_hover_color','#3E9FD2'); ?>;
      }
    }

    .l-header--inner {
      <?php
      $header_layout_titile_align = get_theme_mod('header_layout_titile_align','left');
      ?>
      text-align: <?php echo $header_layout_titile_align; ?>;
    }

    .l-header--logo {
      font-size: <?php echo get_theme_mod('header_text_logo_fontsize','28'); ?>px;
    }

    .l-header--description {
      font-size: <?php echo get_theme_mod('header_text_description_fontsize','13'); ?>px;
    }

    .l-header--logo ,
    .l-header--description {
      <?php
      switch ($header_layout_titile_align) {
        case 'left':
          echo 'margin-left: 28px;';
          break;
        case 'right':
          echo 'margin-right: 28px;';
          break;
        default:
          break;
      }
      ?>
    }

    .l-nav {
      text-align: <?php echo get_theme_mod('header_layout_nav_align','right'); ?>;
    }

    /* メイン */
    .l-main.p-front {
      <?php if(get_theme_mod('front_architect_col','two-col') == "one-col"){ ?>
        margin-left: auto;
        margin-right: auto;
        max-width: <?php echo get_theme_mod('architect_col_one_width','67'); ?>%;
      <?php } ?>
    }

    @media screen and (max-width: 1179px) {
      .l-main.p-front {
        max-width: 100%;
      }
    }

    .l-header--description {
      margin-top: <?php echo get_theme_mod('header_text_description_margin_top','28'); ?>px;
    }

    .l-header--logo {
      margin-top: <?php echo get_theme_mod('header_text_title_margin_top','25'); ?>px;
      margin-bottom: <?php echo get_theme_mod('header_text_title_margin_bottom','25'); ?>px;
    }

    /* 背景色 */
    body {
      background-color: <?php echo get_theme_mod('bg_color',$bg_color_def) ?>;
    }

    .l-main, .l-sidebar , .p-recommend {
      background-color: rgba(<?php echo ut\getConversionRgba(get_theme_mod('section_bg_color','#FFF'),get_theme_mod('section_bg_opacity',$section_bg_opacity_def))['full'];?>%);
      <?php $section_shadow_len = get_theme_mod('section_shadow_len','2')."px";?>
      box-shadow: <?php echo $section_shadow_len ?> <?php echo $section_shadow_len ?> <?php echo $section_shadow_len ?> rgb(0 0 0 / <?php echo get_theme_mod('section_shadow_opacity','30') ?>%);
    }

    .l-footer {
      background-color: <?php echo get_theme_mod('footer_bg_color','#333') ?>;
    }

    .l-footer,
    .l-footer a {
      color: <?php echo get_theme_mod('footer_text_color','#FFF') ?>;
    }

    .l-footer a:hover {
      color: <?php echo get_theme_mod('footer_text_hover_color','#3E9FD2') ?>;
    }

    .l-footer--widgets {
      background-color: <?php echo get_theme_mod('footer_widget_bg_color','#333') ?>;
    }

    .l-footer--widgets,
    .l-footer--widgets a {
      color: <?php echo get_theme_mod('footer_widget_text_color','#FFF') ?>;
    }

    .l-footer--widgets a:hover {
      color: <?php echo get_theme_mod('footer_widget_text_hover_color','#3E9FD2') ?>;
    }

    /* ==========================================================================
    // Object
    // ========================================================================*/
    /* Component
       ----------------------------------------------------------------- */
    .c-heading--main {
      color: <?php echo get_theme_mod('front_heading_color','#333'); ?>;
      font-size: <?php echo get_theme_mod('front_heading_fontsize','25'); ?>px;
      background-color: <?php echo get_theme_mod('front_heading_bg_color','transparent'); ?>;
      <?php
      $front_heading_border = get_theme_mod('front_heading_border','border-bottom');
      $front_heading_border_color = get_theme_mod('front_heading_border_color','skyblue');
      switch ($front_heading_border) {
        case 'border-left':
          ?>border-left: solid 3px <?php echo $front_heading_border_color;?>;<?php
          break;

        case 'border-bottom':
        case 'border-bottom-two-tone':
          ?>border-bottom: solid 3px <?php echo $front_heading_border_color;?>;<?php
          break;
      }
      ?>
      padding-top: <?php echo get_theme_mod('front_heading_padding_top_and_bottom','0.1') ?>em;
      padding-left: <?php echo get_theme_mod('front_heading_padding_left','0.1') ?>em;
      padding-bottom: <?php echo get_theme_mod('front_heading_padding_top_and_bottom','0.1') ?>em;
    }

    <?php
    if($front_heading_border == "border-bottom-two-tone"){
      ?>
      .c-heading--main span.cus-border {
        background-color: <?php echo get_theme_mod('front_heading_border_color_sub','#FFC778');?>;
        margin-left: -<?php echo get_theme_mod('front_heading_padding_left','0.1') ?>em;
      }
      <?php
    } else {
      ?>
      .c-heading--main::after {
        border: none;
      }
      <?php
    }
    ?>

    .c-top-scroll-btn a,
    .c-top-scroll-btn a::after {
      background-color: <?php echo get_theme_mod('parts_scroll_color','#006EB0'); ?>;
    }

    .c-top-scroll-btn a:hover,
    .c-top-scroll-btn a:hover::after {
      background-color: <?php echo get_theme_mod('parts_scroll_hover_color','#3E9FD2'); ?>;
    }

    .c-slider-header {
      max-width: <?php echo get_theme_mod('front_firstview_width','1180'); ?>px;
    }

    .c-slider-header li {
      margin-left: <?php echo get_theme_mod('front_firstview_article_margin_side','13'); ?>px;
      margin-right: <?php echo get_theme_mod('front_firstview_article_margin_side','13'); ?>px;
    }

    /* 文字サイズ（PC） */
    article.p-article p { font-size: <?php echo ut\getValOrDef($pc_psize,$pc_psize_def); ?>px!important; }
    article.p-article h1 { font-size: <?php echo ut\getValOrDef($pc_h1size,$pc_h1size_def); ?>px!important; }
    article.p-article h2 { font-size: <?php echo ut\getValOrDef($pc_h2size,$pc_h2size_def); ?>px!important; }
    article.p-article h3 { font-size: <?php echo ut\getValOrDef($pc_h3size,$pc_h3size_def); ?>px!important; }
    article.p-article h4 { font-size: <?php echo ut\getValOrDef($pc_h4size,$pc_h4size_def); ?>px!important; }
    article.p-article h5 { font-size: <?php echo ut\getValOrDef($pc_h5size,$pc_h5size_def); ?>px!important; }
    article.p-article h6 { font-size: <?php echo ut\getValOrDef($pc_h6size,$pc_h6size_def); ?>px!important; }

    /* 文字サイズ（タブレット） */
    @media screen and (max-width:980px) {
      article.p-article p { font-size: <?php echo ut\getValOrDef($tb_psize,$tb_psize_def); ?>px!important; }
      article.p-article h1 { font-size: <?php echo ut\getValOrDef($tb_h1size,$tb_h1size_def); ?>px!important; }
      article.p-article h2 { font-size: <?php echo ut\getValOrDef($tb_h2size,$tb_h2size_def); ?>px!important; }
      article.p-article h3 { font-size: <?php echo ut\getValOrDef($tb_h3size,$tb_h3size_def); ?>px!important; }
      article.p-article h4 { font-size: <?php echo ut\getValOrDef($tb_h4size,$tb_h4size_def); ?>px!important; }
      article.p-article h5 { font-size: <?php echo ut\getValOrDef($tb_h5size,$tb_h5size_def); ?>px!important; }
      article.p-article h6 { font-size: <?php echo ut\getValOrDef($tb_h6size,$tb_h6size_def); ?>px!important; }
    }

    /* 文字サイズ（スマートフォン） */
    @media (max-width:768px) {
      article.p-article p { font-size: <?php echo ut\getValOrDef($sm_psize,$sm_psize_def); ?>px!important; }
      article.p-article h1 { font-size: <?php echo ut\getValOrDef($sm_h1size,$sm_h1size_def); ?>px!important; }
      article.p-article h2 { font-size: <?php echo ut\getValOrDef($sm_h2size,$sm_h2size_def); ?>px!important; }
      article.p-article h3 { font-size: <?php echo ut\getValOrDef($sm_h3size,$sm_h3size_def); ?>px!important; }
      article.p-article h4 { font-size: <?php echo ut\getValOrDef($sm_h4size,$sm_h4size_def); ?>px!important; }
      article.p-article h5 { font-size: <?php echo ut\getValOrDef($sm_h5size,$sm_h5size_def); ?>px!important; }
      article.p-article h6 { font-size: <?php echo ut\getValOrDef($sm_h6size,$sm_h6size_def); ?>px!important; }
    }

    .p-related .p-related--item .p-related--title:hover,
    .p-news-card--content h2.p-news-card--title:hover,
    .p-news-card--content p.p-news-card--description:hover {
      color: <?php echo get_theme_mod('architect_text_link_hover_color','#007bbb'); ?>;
    }
  </style>

  <?php
}
add_action( 'wp_head', 'mytheme_customize_css');
?>
