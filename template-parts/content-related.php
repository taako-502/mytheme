<?php
//require_once( plugin_dir_path(__FILE__) . "../admin/admin-init.php");
$args = array();
$relevanceSelect = get_theme_mod('relevance-select','category');
$relevanceUrl1 = get_theme_mod('relevance-url1','');
$relevanceUrl2 = get_theme_mod('relevance-url2','');
$relevanceUrl3 = get_theme_mod('relevance-url3','');
$relevanceUrl4 = get_theme_mod('relevance-url4','');
switch($relevanceSelect){
  case "category":
  case "tag":
    $kwds = array(); $key_param = ""; $taxonomies = array();
    if($relevanceSelect == "category") {
      $key_param = 'category__in';
      if(has_category() ) {
        $taxonomies =get_the_category();
      }
    } else {
      $key_param = 'tag__in';
      if(has_tag()) {
        $taxonomies = get_the_tags();
      }
    }
    foreach($taxonomies as $taxonomy){
      $kwds[] = $taxonomy->term_id;
    }
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => '4',
      'post__not_in' =>array( $post->ID ),
      $key_param => isset($kwds) ? $kwds : "",
      'orderby' => 'rand'
    );
    break;
  case "url":
    $kwds[0] = isset($relevanceUrl1) ? url_to_postid($relevanceUrl1) : "";
    $kwds[1] = isset($relevanceUrl2) ? url_to_postid($relevanceUrl2) : "";
    $kwds[2] = isset($relevanceUrl3) ? url_to_postid($relevanceUrl3) : "";
    $kwds[3] = isset($relevanceUrl4) ? url_to_postid($relevanceUrl4) : "";
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => '4',
      'post__not_in' =>array( $post->ID ),
      'post__in' => isset($kwds) ? $kwds : "",
      'orderby' => 'post_name__in' //配列の順番通り
    );
    break;
  default:
    //設定がない場合、処理終了
    return;
}
$my_query = new WP_Query( $args );
//関連記事が存在しない場合、関連記事を表示しない
if(! $my_query->have_posts()){
  return;
}
?>
<aside class="p-related">
  <h4>関連記事</h4>
  <ul>
    <?php
    while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
      <li class="p-related--item">
        <a class="c-aspect-9-16" href="<?php the_permalink(); ?>">
          <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('medium');
          } else {
            echo '<img width="300" height="300" src="' . get_template_directory_uri() . '/images/thumbnail-default.jpg" class="attachment-medium size-medium wp-post-image" alt="デフォルトのサムネイル">';
          } ?>
        </a>
        <a href="<?php the_permalink(); ?>">
          <p class="p-related--title"><?php the_title(); ?></p>
        </a>
      </li>
    <?php
    endwhile;
    wp_reset_postdata(); ?>
  </ul>
</aside>
