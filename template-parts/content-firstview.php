<?php
/**
 * ファーストビュー
 */
$ut = new \Mytheme_Theme\Utility;
$front_firstview_type = get_theme_mod('front_firstview_type','none');
if($front_firstview_type == "none"){
  ?><div></div><?php
  return;
}
if($front_firstview_type == "slider") {
  ?>
  <ul class="c-firstview">
    <?php
    for ($i=1; $i <= 5; $i++) {
      $front_firstview_img = get_theme_mod('front_firstview_img_'.$i,'');
      if($ut->isNullOrWhitespace($front_firstview_img)){
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
