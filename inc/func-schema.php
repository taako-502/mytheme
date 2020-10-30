<?php
/**
 * 構造化マークアップ
 *
 * @package mytheme
 */

/**
 * パンくずリスト
 * @return [type] [description]
 */
function breadcrumb() {
  global $post;
  $str ='';
  $url = $http .'://'. $_SERVER["HTTP_HOST"] . htmlspecialchars($_SERVER["REQUEST_URI"], ENT_QUOTES, 'UTF-8');
  if(!is_home() && !is_admin()) {
    $str.= '<ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
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
?>
