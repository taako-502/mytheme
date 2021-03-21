<?php
namespace Mytheme_Theme;

/**
 * 構造化マークアップに関する処理をまとめたクラス
 */
class SchemaClass {
  /**
   * 構造家データを返却
   */
  public static function getStructuredData($id){
    $post = get_post($id);
    // image（画像）の指定のためにアイキャッチ画像の情報を取得します
    $thumbnail_id = get_post_thumbnail_id($post->ID); // アタッチメントIDの取得
    $image = wp_get_attachment_image_src( $thumbnail_id, 'full' ); // アイキャッチの情報を取得
    $src = isset($image) ? get_stylesheet_directory_uri() . '/images/thumbnail-default.jpg' : $image[0];    // URL
    $width = isset($image) ? 900 : $image[1];  // 横幅
    $height = isset($image) ? 450 : $image[2]; // 高さ
    return printf("
      <script type=\"application/ld+json\">
      {
        \"@context\": \"http://schema.org\",
        \"@type\": \"NewsArticle\",
        \"mainEntityOfPage\":{
          \"@type\":\"WebPage\",
          \"@id\":\"%s\"
        },
        \"headline\": \"%s\",
        \"image\": {
          \"@type\": \"ImageObject\",
          \"url\": \"%s\",
          \"height\":%d,
          \"width\":%d
        },
        \"datePublished\": \"%s\",
        \"dateModified\": \"%s\",
        \"author\": {
          \"@type\": \"Person\",
          \"name\": \"%s\"
        },
        \"publisher\": {
          \"@type\": \"Organization\",
          \"name\": \"%s\",
          \"logo\": {
            \"@type\": \"ImageObject\",
            \"url\": \"%s\",
            \"width\": 600,
            \"height\": 60
          }
        },
        \"description\": \"". get_the_excerpt() ."\"
      }
      </script>"
      ,get_permalink()
      ,get_the_title()
      ,$src
      ,$height
      ,$width
      ,get_the_date(DATE_ISO8601)
      ,get_the_date() != get_the_modified_time() ? get_the_modified_date(DATE_ISO8601) : get_the_date(DATE_ISO8601)
      ,get_the_author_meta('nickname')
      ,get_bloginfo('name')
      ,esc_url(get_template_directory_uri() . '/img/publisher-logo.png')
    );
  }

  /**
   * パンくずリストを返却
   * @return [type] [description]
   */
  public function getBreadcrumb() {
    global $post;
    $str ='';
    $http = is_ssl() ? 'https' : 'http' . '://';
    $url = $http . $_SERVER["HTTP_HOST"] . htmlspecialchars($_SERVER["REQUEST_URI"], ENT_QUOTES, 'UTF-8');
    if(!is_home() && !is_admin()) {
      $str.= '<ul class="c-breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
      $str.= '<a href="'.home_url().'" itemprop="item"><span itemprop="name">'.'TOP'.'</span></a><meta itemprop="position" content="1" /></li>';
      if( is_post_type_archive() ){
        $str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.$url.'" itemprop="item"><span itemprop="name">'.esc_html(get_post_type_object(get_post_type())->label ).'</span></a><meta itemprop="position" content="2" /></li>';
      } elseif(is_tax()){
        $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.get_post_type_archive_link( get_post_type() ).'" itemprop="item"><span itemprop="name">'.esc_html(get_post_type_object(get_post_type())->label ).'</span></a><meta itemprop="position" content="2" /></li>';
        $str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.$url.'" itemprop="item"><span itemprop="name">'.single_term_title( '' , false ).'</span></a><meta itemprop="position" content="3" /></li>';
      } elseif(is_tag()) {
        $str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.$url.'" itemprop="item"><span itemprop="name">'.single_tag_title( '' , false ).'</span></a><meta itemprop="position" content="2" /></li>';
      } elseif(is_category()) {
        $cat = get_queried_object();
        if($cat -> parent != 0){
          $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
          foreach($ancestors as $ancestor){
            $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.get_category_link($ancestor).'" itemprop="item"><span itemprop="name">'.get_cat_name($ancestor).'</span></a><meta itemprop="position" content="2" /></li>';
          }
        }
        $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.$url.'" itemprop="item"><span itemprop="name">'.$cat-> cat_name.'</span></a><meta itemprop="position" content="3" /></li>';
      } elseif(is_page()){
        if($post -> post_parent != 0 ){
          $ancestors = array_reverse(get_post_ancestors( $post->ID ));
          foreach($ancestors as $ancestor){
            $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'. get_permalink($ancestor).'" itemprop="item"><span itemprop="name">'.get_the_title($ancestor).'</span></a><meta itemprop="position" content="2" /></li>';
            $str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.get_the_permalink().'" itemprop="item"><span itemprop="name">'.get_the_title().'</span></a><meta itemprop="position" content="3" /></li>';
          }
        } else {
          $str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.get_the_permalink().'" itemprop="item"><span itemprop="name">'.get_the_title().'</span></a><meta itemprop="position" content="2" /></li>';
        }
      } elseif(is_single()){
        $categories = get_the_category($post->ID);
        $cat = $categories[0];
        if($cat -> parent != 0){
          $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
          foreach($ancestors as $ancestor){
            $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.get_category_link($ancestor).'" itemprop="item"><span itemprop="name">'.get_cat_name($ancestor).'</span></a><meta itemprop="position" content="2" /></li>';
          }
          $str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.get_category_link($cat -> term_id).'" itemprop="item"><span itemprop="name">'.$categories[0]->cat_name.'</span></a><meta itemprop="position" content="3" /></li>';
          $str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.get_the_permalink().'" itemprop="item"><span itemprop="name">'.get_the_title().'</span></a><meta itemprop="position" content="4" /></li>';
        } else {
          $str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.get_category_link($cat -> term_id).'" itemprop="item"><span itemprop="name">'.$cat-> cat_name.'</span></a><meta itemprop="position" content="2" /></li>';
          $str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.get_the_permalink().'" itemprop="item"><span itemprop="name">'.get_the_title().'</span></a><meta itemprop="position" content="3" /></li>';
        }
      }
      $str.= '</ul>'."\n";
    }
    return $str;
  }
}
