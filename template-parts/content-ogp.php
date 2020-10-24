<meta property="og:type" content="blog">
<?php
if (is_single()){
  //単一記事ページの場合
  if(have_posts()): while(have_posts()): the_post();
    //抜粋を表示
    echo '<meta property="og:description" content="'.get_post_meta($post->ID, '_aioseop_description', true).'">';echo "\n";
  endwhile; endif;
  //単一記事タイトルを表示
  echo '<meta property="og:title" content="'; the_title(); echo '">';echo "\n";
  //単一記事URLを表示
  echo '<meta property="og:url" content="'; the_permalink(); echo '">';echo "\n";
} else {
  //単一記事ページページ以外の場合（アーカイブページやホームなど）
  //「一般設定」管理画面で指定したブログの説明文を表示
  echo '<meta property="og:description" content="'; bloginfo('description'); echo '">';echo "\n";
  //「一般設定」管理画面で指定したブログのタイトルを表示
  echo '<meta property="og:title" content="'; bloginfo('name'); echo '">';echo "\n";
  //「一般設定」管理画面で指定したブログのURLを表示
  echo '<meta property="og:url" content="'; bloginfo('url'); echo '">';echo "\n";
}
$str = $post->post_content;
//投稿にイメージがあるか調べる
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
if (is_single()){
  //単一記事ページの場合
  if (has_post_thumbnail()){
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
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<meta property="fb:admins" content="<?php echo $ogpFbAdminId; ?>">
<meta property="fb:app_id" content="<?php echo $ogpFbAppId; ?>">
