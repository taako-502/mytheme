<?php
namespace Mytheme_Theme;

/**
 * カスタマイザーや管理画面で設定したCSSを出力
 */

/**
 * [mytheme_customize_css description]
 */
function customize_js(){
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
         * ヘッダー下スライダーの設定
         */
        $('.c-slider-header').slick({
          adaptiveHeight: false,//高さ固定
          centerMode: <?php echo \Mytheme::get_setting_without_default('parts_header_slider_centermode') == "1" ? "true" : "false"; ?>,
          slidesToShow: <?php echo \Mytheme::get_setting_without_default('parts_header_slider_disp_number'); ?>,
          dots: <?php echo \Mytheme::get_setting_without_default('parts_header_slider_dot') == "1" ? "true" : "false"; ?>,
          arrows: <?php echo \Mytheme::get_setting_without_default('parts_header_slider_arrows') == "1" ? "true" : "false"; ?>,
          autoplay: <?php echo \Mytheme::get_setting_without_default('parts_header_slider_auto') == "1" ? "true" : "false"; ?>,
          autoplaySpeed: <?php echo \Mytheme::get_setting_without_default('parts_header_slider_auto_speed'); ?>,
        });

      })(jQuery);
    });
  </script>

  <?php
}
add_action( 'wp_head', '\Mytheme_Theme\customize_js');
?>
