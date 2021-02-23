<?php
/**
 * スライダー
 */
$front_slider_type = get_theme_mod('front_slider_type','date');
if($front_slider_type != 'none') {
  ?>
  <ul class="c-slider-frontpage">
    <?php
    switch (get_theme_mod($front_slider_type,'date')) {
      case 'date':
      case 'rand':
        // 表示件数の指定
        $args = array(
          'posts_per_page' => get_theme_mod('front_slider_all_number','8'),
          'orderby' => $front_slider_type,
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
        ?>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt=""></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt=""></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt=""></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt=""></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt=""></li>
        <?php
        break;
      case 'firstview':
        // code...
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
