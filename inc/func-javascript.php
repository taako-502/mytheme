<?php
namespace mytheme;

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
         * スライダーの設定
         */
        $('.c-slider-frontpage').slick({
          //autoplay:true,
          //autoplaySpeed:5000,
          slidesToShow: <?php echo get_theme_mod('front_slider_disp_number','5'); ?>,
          dots:true,
        });

      })(jQuery);
    });
  </script>

  <?php
}
add_action( 'wp_head', '\mytheme\customize_js');
?>
