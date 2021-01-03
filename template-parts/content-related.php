<?php
require_once( plugin_dir_path(__FILE__) . "../admin/admin-init.php");
$args = array();
switch($relevanceSelect){
  case "category":
    //カテゴリをキーに関連記事を取得する処理
    $catkwds = array();
    if(has_category() ) {
      $cats =get_the_category();
      foreach($cats as $cat){
        $catkwds[] = $cat->term_id;
      }
    }
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => '4',
      'post__not_in' =>array( $post->ID ),
      'category__in' => isset($catkwds) ? $catkwds : "",
      'orderby' => 'rand'
    );
    break;
  case "tag":
    //タグをキーに関連記事を取得する処理
    $tagkwds = array();
    if(has_tag()) {
      $tags = get_the_tags();
      foreach($tags as $tag){
        $tagkwds[] = $tag->term_id;
      }
    }
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => '4',
      'post__not_in' =>array( $post->ID ),
      'tag__in' => isset($tagkwds) ? $tagkwds : "",
      'orderby' => 'rand'
    );
    break;
  case "url":
    // あとで処理追加
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
      <li>
        <a href="<?php the_permalink(); ?>">
          <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('medium');
          } else {
            echo '<img width="300" height="300" src="' . get_template_directory_uri() . '/images/thumbnail-default.jpg" class="attachment-medium size-medium wp-post-image" alt="デフォルトのサムネイル">';
          } ?>
          <div class="text">
          <?php the_title(); ?>
          </div>
        </a>
      </li>
    <?php
    endwhile;
    wp_reset_postdata(); ?>
  </ul>
</aside>
