<?php
/**
 * スライダー
 */
//表示制御
switch (\Mytheme::get_setting_without_default('parts_header_slider_post')) {
  case 'front-only':
    if (!is_front_page()) { return; }
    break;
  case 'front-except':
    if (is_front_page()) { return; }
    break;
  case 'single-only':
    if (!is_single()) { return; }
    break;
  case 'page-only':
    if (!is_page()) { return; }
    break;
}

$parts_header_slider_type = \Mytheme::get_setting_without_default('parts_header_slider_type');
if($parts_header_slider_type != 'none') {
  ?>
  <ul class="c-slider-header">
    <?php
    $parts_header_slider_all_number = \Mytheme::get_setting_without_default('parts_header_slider_all_number');
    $parts_header_slider_design = \Mytheme::get_setting_without_default('parts_header_slider_design');
    switch ($parts_header_slider_type) {
      case 'date':
      case 'rand':
        // 表示件数の指定
        $args = array(
          'posts_per_page' => $parts_header_slider_all_number,
          'orderby' => $parts_header_slider_type,
        );
        $slider_posts = get_posts( $args );
        foreach ( $slider_posts as $post ){
          setup_postdata( $post );
          ?>
          <li class="<?php echo $parts_header_slider_design; ?>">
            <?php
            $category = get_the_category();
            if(isset($category[0])){
              $cat_name = $category[0]->cat_name;
              $cat_link = get_category_link($category[0]->term_id);
              ?>
              <a class="c-article--category" href="<?php echo $cat_link; ?>"><span><?php echo $cat_name; ?></span></a>
            <?php
            }
            ?>
            <a class="hover-img c-aspect-9-16" href="<?php the_permalink(); ?>">
              <?php
              if (has_post_thumbnail()){
                the_post_thumbnail('large');
              } else {
                ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt="">
                <?php
              }
              ?>
            </a>
            <a class="hover-text" href="<?php the_permalink(); ?>">
              <h3><?php the_title(); ?></h3>
              <p><?php echo \Mytheme_Theme\Utility::getMetaDescription($post->ID, 120); ?></p>
            </a>
          </li>
          <?php
          //クエリの設定をリセット
          wp_reset_postdata();
        }
        break;
      case 'recommend':
        for ($i=1; $i <= $parts_header_slider_all_number; $i++) {
          $parts_header_slider_url = \Mytheme::get_setting_without_default('parts_header_slider_url_' . $i);
          $slider_posts = url_to_postid($parts_header_slider_url);
          ?>
          <li class="<?php echo $parts_header_slider_design; ?>">
            <?php
            $category = get_the_category();
            if(isset($category[0])){
              $cat_name = $category[0]->cat_name;
              $cat_link = get_category_link($category[0]->term_id);
              ?>
              <a class="c-article--category" href="<?php echo $cat_link; ?>"><span><?php echo $cat_name; ?></span></a>
            <?php
            }
            ?>
            <a class="c-aspect-9-16" href="<?php echo $parts_header_slider_url; ?>">
              <?php
              if (has_post_thumbnail($slider_posts)) {
                echo get_the_post_thumbnail( $slider_posts , 'large');
              } else {
                ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt="">
                <?php
              }
              ?>
            </a>
            <a href="<?php echo $parts_header_slider_url; ?>">
              <div class="hover-text">
                <h3><?php echo get_the_title($slider_posts); ?></h3>
                <p><?php echo \Mytheme_Theme\Utility::getMetaDescription($slider_posts, 120); ?></p>
              </div>
            </a>
          </li>
          <?php
        }
        ?>
        <?php
        break;
    }
    ?>
  </ul>
  <?php
}
?>
