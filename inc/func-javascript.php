<?php
namespace Mytheme_Theme;

/**
 * カスタマイザーや管理画面で設定したCSSを出力
 */

/**
 * [mytheme_customize_css description]
 */
function customize_js(){
  $parts_header_slider_disp_number = \Mytheme::get_setting_without_default('parts_header_slider_disp_number');
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
          arrows: false,
          centerMode: <?php echo \Mytheme::get_setting_without_default('parts_header_slider_centermode') == "1" ? "true" : "false"; ?>,
          slidesToShow: <?php echo \Mytheme::get_setting_without_default('parts_header_slider_disp_number'); ?>,
          dots: <?php echo \Mytheme::get_setting_without_default('parts_header_slider_dot') == "1" ? "true" : "false"; ?>,
          autoplay: <?php echo \Mytheme::get_setting_without_default('parts_header_slider_auto') == "1" ? "true" : "false"; ?>,
          autoplaySpeed: <?php echo \Mytheme::get_setting_without_default('parts_header_slider_auto_speed'); ?>,
          slidesToShow: <?php echo $parts_header_slider_disp_number; ?>,
          responsive: [{
            breakpoint: 1180,
            settings: {
              slidesToShow: <?php echo $parts_header_slider_disp_number <= 4 ? $parts_header_slider_disp_number : "4"; ?>,
            }
          }, {
            breakpoint: 767,
            settings: {
              slidesToShow: <?php echo $parts_header_slider_disp_number <= 2 ? $parts_header_slider_disp_number : "2"; ?>,
            }
          }]
        });

      })(jQuery);
    });
  </script>

  <?php
}
add_action( 'wp_head', '\Mytheme_Theme\customize_js');
?>
