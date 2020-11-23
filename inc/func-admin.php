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
    59);
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
