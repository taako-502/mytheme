<?php
/**
 * ナビゲーションメニュー
 *
 * @package mytheme
 */

/**
 * メニューの<li>からID除去
 * @param [type] $id [description]
 */
function setMenuId( $id ){
    return $id = array();
}
add_filter('nav_menu_item_id', 'setMenuId', 10);

//メニューの<li>からクラス除去
function setMenuClass( $classes, $item, $args) {
  $classes = array();
  if(isset($args->add_li_class)) {
      $classes[] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'setMenuClass', 1, 3 );

/**
 * ナビバー以下にあるaタグのクラスを変更
 * @param [type] $item_output [description]
 * @param [type] $item        [description]
 */
function add_class_on_link($item_output, $item){
  return preg_replace('/(<a.*?)/', '$1' . " class='nav-link'", $item_output);
}
add_filter('walker_nav_menu_start_el', 'add_class_on_link', 10, 4);
