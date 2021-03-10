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

  ?>
  <style type="text/css">
    /* ==========================================================================
    // Foundation
    // ========================================================================*/
    /* ベース　*/
    .contents {
      <?php echo \Mytheme_Theme\Style::add_style('comax-width','front_architect_content_width','px'); ?>
    }

    .contents p {
      <?php echo \Mytheme_Theme\Style::add_style('color','architect_text_color'); ?>
    }

    .l-sidebar--widget a,
    .comment-body a,
    .c-breadcrumb a,
    .contents p a {
      <?php echo \Mytheme_Theme\Style::add_style('color','architect_text_link_color'); ?>
    }

    .u-color-hover:hover,
    .contents a:hover {
      <?php echo \Mytheme_Theme\Style::add_style('color','architect_text_link_hover_color'); ?>
    }

    /* ==========================================================================
    // Layout
    // ========================================================================*/
    /* ヘッダー */
    @media screen and (min-width: 767px) {
      .l-header,
      .l-header--inner  {
        <?php echo \Mytheme_Theme\Style::add_style('background-color','header_bg_color','',true); ?>
      }
      .l-header--inner a {
        <?php echo \Mytheme_Theme\Style::add_style('color','header_text_color'); ?>
      }

      .l-header--inner a:hover {
        /* 画面から設定できるようにすること */
        <?php echo \Mytheme_Theme\Style::add_style('color','header_text_hover_color'); ?>
      }
    }

    .l-header--inner {
      <?php
      $header_layout_titile_align = get_theme_mod('header_layout_titile_align','left');
      ?>
      text-align: <?php echo $header_layout_titile_align; ?>;
    }

    .l-header--logo {
      <?php echo \Mytheme_Theme\Style::add_style('font-size','header_text_logo_fontsize','px'); ?>
    }

    .l-header--description {
      <?php echo \Mytheme_Theme\Style::add_style('font-size','header_text_description_fontsize','px'); ?>
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
      <?php echo \Mytheme_Theme\Style::add_style('text-align','header_layout_nav_align','px'); ?>
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
      <?php echo \Mytheme_Theme\Style::add_style('margin-top','header_text_description_margin_top','px'); ?>
    }

    .l-header--logo {
      <?php
      echo \Mytheme_Theme\Style::add_style('margin-top','header_text_title_margin_top','px');
      echo \Mytheme_Theme\Style::add_style('margin-bottom','header_text_title_margin_bottom','px');
      ?>
    }

    /* 背景色 */
    body {
      <?php echo \Mytheme_Theme\Style::add_style('background-color:','bg_color'); ?>
    }

    .l-main, .l-sidebar , .p-recommend {
      background-color: rgba(<?php echo \Mytheme_Theme\Utility::getConversionRgba(get_theme_mod('section_bg_color','#FFF'),get_theme_mod('section_bg_opacity',$section_bg_opacity_def))['full'];?>%);
      <?php $section_shadow_len = get_theme_mod('section_shadow_len','2')."px";?>
      box-shadow: <?php echo $section_shadow_len ?> <?php echo $section_shadow_len ?> <?php echo $section_shadow_len ?> rgb(0 0 0 / <?php echo get_theme_mod('section_shadow_opacity','30') ?>%);
    }

    .l-footer {
      background-color: <?php echo get_theme_mod('footer_bg_color','#333') ?>;
    }

    .l-footer,
    .l-footer a {
      <?php echo \Mytheme_Theme\Style::add_style('color','footer_text_color'); ?>
    }

    .l-footer a:hover {
      <?php echo \Mytheme_Theme\Style::add_style('color','footer_text_hover_color'); ?>
    }

    .l-footer--widgets {
      <?php echo \Mytheme_Theme\Style::add_style('background-color:','footer_widget_bg_color'); ?>
    }

    .l-footer--widgets,
    .l-footer--widgets a {
      <?php echo \Mytheme_Theme\Style::add_style('color','footer_widget_text_color'); ?>
    }

    .l-footer--widgets a:hover {
      <?php echo \Mytheme_Theme\Style::add_style('color','footer_widget_text_hover_color'); ?>
    }

    /* ==========================================================================
    // Object
    // ========================================================================*/
    /* Component
       ----------------------------------------------------------------- */
    .c-slider-header {
      <?php
      $content_max_width = get_theme_mod('parts_header_slider_width_maxwindow','px') == "px" ? get_theme_mod('parts_header_slider_width','1180') . "px" : "100vw";
      ?>
      width: 100%;
      max-width: <?php echo $content_max_width; ?>;
    }

    .c-slider-header li {
      <?php
      echo \Mytheme_Theme\Style::add_style('color','parts_header_slider_article_margin_side','px');
      echo \Mytheme_Theme\Style::add_style('color','parts_header_slider_article_margin_side','px');
      ?>
    }

    .c-article--category:hover,
    .hover-text h3:hover,
    .hover-text p:hover {
      <?php echo \Mytheme_Theme\Style::add_style('color','footer_text_hover_color'); ?>
    }

    .c-heading--main {
      <?php
      echo \Mytheme_Theme\Style::add_style('color','front_heading_color');
      echo \Mytheme_Theme\Style::add_style('font-size','front_heading_fontsize');
      echo \Mytheme_Theme\Style::add_style('background-color','front_heading_bg_color');
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
      \Mytheme_Theme\Style::add_style('padding-top','front_heading_padding_top_and_bottom','em');
      \Mytheme_Theme\Style::add_style('padding-left','front_heading_padding_left','em');
      \Mytheme_Theme\Style::add_style('padding-bottom','front_heading_padding_top_and_bottom','em');
      ?>;
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
      <?php echo \Mytheme_Theme\Style::add_style('background-color','parts_scroll_color'); ?>;
    }

    .c-top-scroll-btn a:hover,
    .c-top-scroll-btn a:hover::after {
      <?php echo \Mytheme_Theme\Style::add_style('background-color','parts_scroll_hover_color'); ?>;
    }

    /* Project
       ----------------------------------------------------------------- */

    /* 文字サイズ（PC） TODO: コメントアウト */
    article.p-article p { <?php echo \Mytheme_Theme\Style::add_style('font-size','pc_p_size','px',true); ?> }
    article.p-article h1 { <?php echo \Mytheme_Theme\Style::add_style('font-size','pc_h1_size','px',true); ?> }
    article.p-article h2 { <?php echo \Mytheme_Theme\Style::add_style('font-size','pc_h2_size','px',true); ?> }
    article.p-article h3 { <?php echo \Mytheme_Theme\Style::add_style('font-size','pc_h3_size','px',true); ?> }
    article.p-article h4 { <?php echo \Mytheme_Theme\Style::add_style('font-size','pc_h4_size','px',true); ?> }
    article.p-article h5 { <?php echo \Mytheme_Theme\Style::add_style('font-size','pc_h5_size','px',true); ?> }
    article.p-article h6 { <?php echo \Mytheme_Theme\Style::add_style('font-size','pc_h6_size','px',true); ?> }

    /* 文字サイズ（タブレット） */
    @media screen and (max-width:980px) {
      article.p-article p { <?php echo \Mytheme_Theme\Style::add_style('font-size','tb_p_size','px',true); ?> }
      article.p-article h1 { <?php echo \Mytheme_Theme\Style::add_style('font-size','tb_h1_size','px',true); ?> }
      article.p-article h2 { <?php echo \Mytheme_Theme\Style::add_style('font-size','tb_h2_size','px',true); ?> }
      article.p-article h3 { <?php echo \Mytheme_Theme\Style::add_style('font-size','tb_h3_size','px',true); ?> }
      article.p-article h4 { <?php echo \Mytheme_Theme\Style::add_style('font-size','tb_h4_size','px',true); ?> }
      article.p-article h5 { <?php echo \Mytheme_Theme\Style::add_style('font-size','tb_h5_size','px',true); ?> }
      article.p-article h6 { <?php echo \Mytheme_Theme\Style::add_style('font-size','tb_h6_size','px',true); ?> }
    }

    /* 文字サイズ（スマートフォン） */
    @media (max-width:768px) {
      article.p-article p { <?php echo \Mytheme_Theme\Style::add_style('font-size','sm_p_size','px',true); ?> }
      article.p-article h1 { <?php echo \Mytheme_Theme\Style::add_style('font-size','sm_h1_size','px',true); ?> }
      article.p-article h2 { <?php echo \Mytheme_Theme\Style::add_style('font-size','sm_h2_size','px',true); ?> }
      article.p-article h3 { <?php echo \Mytheme_Theme\Style::add_style('font-size','sm_h3_size','px',true); ?> }
      article.p-article h4 { <?php echo \Mytheme_Theme\Style::add_style('font-size','sm_h4_size','px',true); ?> }
      article.p-article h5 { <?php echo \Mytheme_Theme\Style::add_style('font-size','sm_h5_size','px',true); ?> }
      article.p-article h6 { <?php echo \Mytheme_Theme\Style::add_style('font-size','sm_h6_size','px',true); ?> }
    }

    .p-related .p-related--item .p-related--title:hover,
    .p-news-card--content h2.p-news-card--title:hover,
    .p-news-card--content p.p-news-card--description:hover {
      <?php echo \Mytheme_Theme\Style::add_style('color','architect_text_link_hover_color'); ?>;
    }
  </style>

  <?php
}
add_action( 'wp_head', 'mytheme_customize_css');
?>
