<?php
/**
 * ファーストビュー
 */
$parts_header_slider_type = get_theme_mod('parts_header_slider_type','date');
if($parts_header_slider_type != 'slider') {
  ?>
  <ul class="c-slider-frontpage">
    <?php
    for ($i=1; $i <= 5; $i++) {
      $front_firstview_img = get_theme_mod('front_firstview_img_'.$i,'');
      if(ut\isNullOrWhitespace($front_firstview_img)){
        continue;
      }
      ?>
      <li>
        <img src="<?php echo $front_firstview_img; ?>" alt="">
      </li>
      <?php
    }
    ?>
  </ul>
  <?php
}
?>
