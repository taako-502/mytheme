<meta property="og:type" content="blog">
<?php
if (is_single()){
  $title = get_post_meta($post->ID, '_individual_title', true);
  $description = get_post_meta($post->ID,  '_individual_description', true);
  $description = isNullOrEmpty($description) ? get_post_meta($post->ID, '_aioseop_description', true) : $description;
  //単一記事ページの場合
  if(have_posts()): while(have_posts()): the_post();
    echo '<meta property="og:description" content="'. $description .'">';echo "\n";
  endwhile; endif;
  ?>
  <meta property="og:title" content="<?php if(isNullOrEmpty(trim($title))){ the_title(); } else { echo $title; } ?>">
  <meta property="og:url" content="<?php the_permalink(); ?>">
  <?php
} else {
  //単一記事ページページ以外の場合（アーカイブページやホームなど）
  ?>
  <meta property="og:description" content="<?php echo bloginfo('description'); ?>">
  <meta property="og:title" content="<?php echo bloginfo('name'); ?>">
  <meta property="og:url" content="<?php echo bloginfo('url'); ?>">
  <?php
}
$str = $post->post_content;
//投稿にイメージがあるか調べる
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
if (is_single()){
  //単一記事ページの場合
  $individual_img = get_post_meta($post->ID, '_individual_img', true);
  if(! isNullOrEmpty(trim($individual_img))){
    //個別に設定したOGP画像がある場合
    echo '<meta property="og:image" content="'.$individual_img.'">';echo "\n";
  } else if (has_post_thumbnail()){
    //投稿にサムネイルがある場合の処理
    $image_id = get_post_thumbnail_id();
    $image = wp_get_attachment_image_src( $image_id, 'full');
    echo '<meta property="og:image" content="'.$image[0].'">';echo "\n";
  } else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {
    //投稿にサムネイルは無いが画像がある場合の処理
    echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
  } else {
    //投稿にサムネイルも画像も無い場合の処理
    echo '<meta property="og:image" content="'. $ogpFbImgArticle .'">';echo "\n";
  }
} else {
  //単一記事ページページ以外の場合（アーカイブページやホームなど）
  echo '<meta property="og:image" content="'. $ogpFbImgTop .'">';echo "\n";
}
?>
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>"><?php
if( !isNullOrEmpty(trim($ogpFbAdminId))){
  ?><meta property="fb:admins" content="<?php echo $ogpFbAdminId; ?>"><?php
}
if( !isNullOrEmpty(trim($ogpFbAppId))){
  ?><meta property="fb:app_id" content="<?php echo $ogpFbAppId; ?>"><?php
}
