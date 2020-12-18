<?php
/**
 * OGPに関する処理をまとめたクラス
 */
class OgpClass{
  /**
   * OGPタグを返却
   * @return String OGPタグ
   */
  public function getOgpMeta(){
    global $post;
    $url = "";
    $result = "<meta property=\"og:type\" content=\"blog\">"."\n";
    if (is_single()){
      $description = get_post_meta($post->ID,  '_individual_description', true);
      $description = ut\isNullOrEmpty($description) ? get_post_meta($post->ID, '_aioseop_description', true) : $description;
      //単一記事ページの場合
      if(have_posts()): while(have_posts()): the_post();
        $result .= "<meta property=\"og:description\" content=\"". $description ."\">"."\n";
      endwhile; endif;
      $title = get_post_meta($post->ID, '_individual_title', true);
      $title = ut\isNullOrEmpty(trim($title)) ? get_the_title() : $title;
      $url = get_the_permalink();
    } else {
      //単一記事ページページ以外の場合（アーカイブページやホームなど）
      $result .= "<meta property=\"og:description\" content=\"". get_bloginfo('description') ."\">"."\n";
      $title = get_bloginfo('name');
      $url = esc_url(home_url());
    }
    $result .= "<meta property=\"og:title\" content=\"". $title ."\">"."\n";
    $result .= "<meta property=\"og:url\" content=\"".$url."\">"."\n";
    //投稿にイメージがあるか調べる
    $str = $post->post_content;
    $searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
    if (is_single()){
      //単一記事ページの場合
      $individual_img = get_post_meta($post->ID, '_individual_img', true);
      if(! ut\isNullOrEmpty(trim($individual_img))) {
        //個別に設定したOGP画像がある場合
        $result .= '<meta property="og:image" content="'.$individual_img.'">'."\n";
      } else if (has_post_thumbnail()) {
        //投稿にサムネイルがある場合の処理
        $image_id = get_post_thumbnail_id();
        $image = wp_get_attachment_image_src( $image_id, 'full');
        $result .= '<meta property="og:image" content="'.$image[0].'">'."\n";
      } else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {
        //投稿にサムネイルは無いが画像がある場合の処理
        $result .= '<meta property="og:image" content="'.$imgurl[2].'">'."\n";
      } else {
        //投稿にサムネイルも画像も無い場合の処理
        if(isset($ogpFbImgArticle)) {
          $result .= '<meta property="og:image" content="'. $ogpFbImgArticle .'">'."\n";
        }
      }
    } else {
      //単一記事ページページ以外の場合（アーカイブページやホームなど）
      if(isset($ogpFbImgTop)) {
        $result .= "<meta property=\"og:image\" content=\"". $ogpFbImgTop ."\">"."\n";
      }
    }
    $result .= "<meta property=\"og:site_name\" content=\"". get_bloginfo('name') ."\">";
    if(isset($ogpFbAdminId)) {
      $result .= "<meta property=\"fb:admins\" content=\"". $ogpFbAdminId .">"."\n";
    }
    if(isset($ogpFbAppId)) {
      $result .= "<meta property=\"fb:app_id\" content=\"". $ogpFbAppId .">"."\n";
    }
    return $result;
  }
}
?>
