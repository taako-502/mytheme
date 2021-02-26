<?php
/**
 * スライダー
 */
$parts_header_slider_type = get_theme_mod('parts_header_slider_type','date');
if($parts_header_slider_type != 'none') {
  ?>
  <ul class="c-slider-frontpage">
    <?php
    $parts_header_slider_all_number = get_theme_mod('parts_header_slider_all_number','8');
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
          <li>
            <a href="<?php the_permalink(); ?>">
              <?php
              if (has_post_thumbnail()){
                the_post_thumbnail('large');
              } else {
                ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt="">
                <?php
              }
              ?>
              <div class="hover-text">
                <h3><?php the_title(); ?></h3>
                <p><?php echo ut\getMetaDescription($post->ID, 120); ?></p>
              </div>
            </a>
          </li>
          <?php
          //クエリの設定をリセット
          wp_reset_postdata();
        }
        break;
      case 'recommend':
        for ($i=1; $i <= $parts_header_slider_all_number; $i++) {
          $parts_header_slider_url = get_theme_mod('parts_header_slider_url_' . $i,'#');
          $slider_posts = url_to_postid($parts_header_slider_url);
          ?>
          <li>
            <a href="<?php echo $parts_header_slider_url; ?>">
              <?php
              if (has_post_thumbnail($slider_posts)) {
                echo get_the_post_thumbnail( $slider_posts , 'large' );
              } else {
                ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt="">
                <?php
              }
              ?>
              <div class="hover-text">
                <h3><?php echo get_the_title($slider_posts); ?></h3>
                <p><?php echo ut\getMetaDescription($slider_posts, 120); ?></p>
              </div>
            </a>
          </li>
          <?php
        }
        ?>
        <?php
        break;
      case 'firstview':
        for ($i=1; $i <= 5; $i++) {
          // code...
          ?>
          <li>
            <img src="<?php echo get_theme_mod('parts_header_slider_img_'.$i,''); ?>" alt="">
          </li>
          <?php
        }
        break;
      default:
        // code...
        break;
    }
    ?>
  </ul>
  <?php
}
?>
