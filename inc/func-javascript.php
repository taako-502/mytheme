<?php
namespace Mytheme_Theme;

/**
 * カスタマイザーや管理画面で設定したCSSを出力
 */

/**
 * [mytheme_customize_css description]
 */
function customize_js(){
  $parts_header_slider_disp_number =get_theme_mod('parts_header_slider_disp_number','5');
  $front_firstview_type =get_theme_mod('front_firstview_type','date');
  ?>
  <script id="mytheme_customize_js" type="text/javascript">
    /**
     * メールフォームの制御
     * @param  {[type]} $ [description]
     * @return {[type]}   [description]
     */
    jQuery(document).ready(function($) {
      (function($) {
        /**
         * ファーストビューとして表示するスライダーの設定
         * @var [type]
         */
        $('.c-slider-frontpage').slick({
          arrows: false,
          infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear',
          autoplay: true,
          autoplaySpeed: <?php echo get_theme_mod('front_firstview_auto_speed','5000'); ?>,
        });

        /**
         * ヘッダー下スライダーの設定
         */
        $('.c-slider-header').slick({
          adaptiveHeight: false,//高さ固定
          centerMode: <?php echo get_theme_mod('parts_header_slider_centermode','true') == "true" ? "true" : "false"; ?>,
          slidesToShow: <?php echo $parts_header_slider_disp_number; ?>,
          dots: <?php echo get_theme_mod('parts_header_slider_dot','true') == "true" ? "true" : "false"; ?>,
          arrows: <?php echo get_theme_mod('parts_header_slider_arrows','true') == "true" ? "true" : "false"; ?>,
          autoplay: <?php echo get_theme_mod('parts_header_slider_auto','true') == "true" ? "true" : "false"; ?>,
          autoplaySpeed: <?php echo get_theme_mod('parts_header_slider_auto_speed','5000'); ?>,
        });

      })(jQuery);
    });
  </script>

  <?php
}
add_action( 'wp_head', '\Mytheme_Theme\customize_js');
?>
