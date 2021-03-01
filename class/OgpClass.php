<?php
namespace Mytheme_Theme;

/**
 * OGPに関する処理をまとめたクラス
 */
class OgpClass{

  //use \Mytheme_Theme\Utility;

  /**
   * OGPタグを返却
   * @return String OGPタグ
   */
  public function getOgpMeta($id){
    $ut = new \Mytheme_Theme\Utility();

    $post = get_post($id);
    $result = "<meta property=\"og:type\" content=\"blog\">"."\n";
    if (is_singular()){
      //記事ページと固定ページ
      $title = get_post_meta($post->ID, '_ogp_title', true); //手入力
      $title = $ut->isNullOrEmpty(trim($title)) ? get_the_title() : $title;
      $description = get_post_meta($post->ID,  '_ogp_description', true); //手入力
      $description = $ut->isNullOrEmpty($description) ? $ut->getDescription($post->ID,90) : $description;
      $url = get_the_permalink();
    } else {
      $title = get_bloginfo('name');
      $description = get_bloginfo('description');
      $url = esc_url(home_url());
    }
    $result .= "<meta property=\"og:title\" content=\"". $title ."\">"."\n";
    $result .= "<meta property=\"og:description\" content=\"". $description ."\">"."\n";
    $result .= "<meta property=\"og:url\" content=\"".$url."\">"."\n";
    //投稿にイメージがあるか調べる
    $str = $post->post_content;
    $searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
    if (is_singular()){
      //記事ページと固定ページ
      $ogp_img = get_post_meta($post->ID, '_ogp_img', true);
      if(! $ut->isNullOrEmpty(trim($ogp_img))) {
        //個別に設定したOGP画像がある場合
        $result .= '<meta property="og:image" content="'.$ogp_img.'">'."\n";
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
