<?php
/**
 * 管理メニュー
 *
 * @package mytheme
 */

 /**
 * 追加管理画面の実装
 */
 function add_custom_admin(){
   // mytheme専用管理画面呼び出し
   if (locate_template('admin/admin.php') !== '') {
     require_once locate_template('admin/admin.php');
   }
 }

/**
 * 管理メニューに追加
 */
function add_admin(){
  add_menu_page(
    'mythemeの簡単設定',
    'mytheme設定',
    'manage_options',
    'mytheme-admin',
    'add_custom_admin',
    //get_template_directory_uri() . '/images/logo-mini.png',
    get_template_directory_uri() . '/images/logo-mini.svg',
    58);
}
add_action('admin_menu','add_admin');

/**
 * 管理画面共通のCSS読み込み
 * @return [type] [description]
 */
function admin_enqure_style() {
  ?><style>
    .wp-menu-image.dashicons-before img {
      width: 20px;
      height: 20px;
    }
	</style><?php
}
add_action('admin_head','admin_enqure_style');

/**
 * 管理メニューの名称変更
 */
/*
 function Change_menulabel() {
 	global $menu;
 	global $submenu;
 	$name = '１.投稿';
 	$menu[5][0] = $name;
 	$submenu['edit.php'][5][0] = $name.'一覧';
 	$submenu['edit.php'][10][0] = '新しい'.$name;
 }
 function Change_objectlabel() {
 	global $wp_post_types;
 	$name = 'お知らせ';
 	$labels = &$wp_post_types['post']->labels;
 	$labels->name = $name;
 	$labels->singular_name = $name;
 	$labels->add_new = _x('追加', $name);
 	$labels->add_new_item = $name.'の新規追加';
 	$labels->edit_item = $name.'の編集';
 	$labels->new_item = '新規'.$name;
 	$labels->view_item = $name.'を表示';
 	$labels->search_items = $name.'を検索';
 	$labels->not_found = $name.'が見つかりませんでした';
 	$labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
 }
 add_action( 'init', 'Change_objectlabel' );
 add_action( 'admin_menu', 'Change_menulabel' );
*/
