<?php
/**
 * 引数がnullか空白か判定
 * @param  [type]  $val [description]
 * @return boolean      nullか空白ならtrueを返却
 */
function isNullOrEmpty($val){
  return is_null($val) || $val== '';
}

/**
 * wp_optionsテーブルの設定値を更新
 * @param  [type] $key       キー
 * @param  [type] $value     値
 * @return [type]            更新値
 */
function updaeteOptionPost($key,$value){
  $data = isset( $value ) && $value ? $value : '';
  update_option($key,$data);
  return $value;
}

/**
 * 引数で受け取った数値が空白でないなら、数値を返却、そうでなければデフォルト値を返却
 * @param [type] $num     数値
 * @param [type] $default デフォルト値
 */
function setNumData($num,$default){
  return 1;
  //return ( isset($num) && trim($num) !== '' ) ? (int)$num : $default ;
}

/**
 * パンくずリスト
 * @return [type] パンくずリストを返却
 */
function breadcrumb() {
  $home = '<li><a href="'.get_bloginfo('url').'" >HOME</a></li>';

  echo '<div class="breadcrumb">';
  echo '<ul>';
  if ( is_front_page() ) {
    // トップページの場合
  } else if ( is_category() ) {
    // カテゴリページの場合
    $cat = get_queried_object();
    $cat_id = $cat->parent;
    $cat_list = array();
    while ($cat_id != 0){
      $cat = get_category( $cat_id );
      $cat_link = get_category_link( $cat_id );
      array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
      $cat_id = $cat->parent;
    }
    echo $home;
    foreach($cat_list as $value){
      echo $value;
    }
    the_archive_title('<li>', '</li>');
  } else if ( is_archive() ) {
    // 月別アーカイブ・タグページの場合
    echo $home;
    the_archive_title('<li>', '</li>');
  } else if ( is_single() ) {
    // 投稿ページの場合
    $cat = get_the_category();
    if( isset($cat[0]->cat_ID) ) $cat_id = $cat[0]->cat_ID;
    $cat_list = array();
    while ($cat_id != 0){
      $cat = get_category( $cat_id );
      $cat_link = get_category_link( $cat_id );
      array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
      $cat_id = $cat->parent;
    }
    foreach($cat_list as $value){
      echo $value;
    }
    the_title('<li>', '</li>');
  } else if( is_page() ) {
    // 固定ページの場合
    echo $home;
    the_title('<li>', '</li>');
  } else if( is_search() ) {
    // 検索ページの場合
    echo $home;
    echo '<li>「'.get_search_query().'」の検索結果</li>';
  } else if( is_404() ) {
    // 404ページの場合
    echo $home;
    echo '<li>ページが見つかりません</li>';
  }
  echo "</ul>";
  echo '</div>';
}

/**
 * wp_optionsテーブルから取得した値が、空白かnullならデフォルト値を設定
 * @param  [type]  $key     [description]
 * @param  [type]  $default [description]
 * @return boolean          [description]
 */
function get_option_isBlank($key,$default){
  $value = get_option($key,$default);
  return isNullOrEmpty(trim($value)) ? $default : $value;
}

?>
