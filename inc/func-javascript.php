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
  $front_firstview_disp_number =get_theme_mod('front_firstview_disp_number','5');
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
         * スライダーの設定
         */
        $('.c-slider-header').slick({
          <?php
          if($front_firstview_type == "firstview") {
            ?>
            arrows: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            <?php
          } else {
            ?>
            slidesToShow: <?php echo $front_firstview_disp_number; ?>,
            dots:true,
            <?php
          }
          ?>
          autoplay: <?php echo get_theme_mod('front_firstview_auto','true') == "true" ? "true" : "false"; ?>,
          autoplaySpeed: <?php echo get_theme_mod('front_firstview_auto_speed','5000'); ?>,
        });

      })(jQuery);
    });
  </script>

  <?php
}
add_action( 'wp_head', '\mytheme\customize_js');
?>
