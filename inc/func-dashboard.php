<?php
/**
 * ダッシュボード
 *
 * @package mytheme
 */

/**
 * 不要なウィジェット削除
 * @return [type] [description]
 */
function remove_dashboard_widgets() {
  global $wp_meta_boxes;
  //現在の状況表示を削除
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  //最近のコメント表示を削除
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  //被リンク表示を削除
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  //プラグイン表示を削除
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  //クイック投稿表示を削除
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  //最近の下書き表示を削除
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
  //WordPressブログ表示を削除
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  //WordPressフォーラム表示を削除
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

/**
 * ダッシュボードにウィジェット追加
 */
function add_widget(){
  add_meta_box(
    'readme_widget',
    'Read Me !!',
    'add_readme_widget',
    'dashboard',
    'side',
    'high');

  // Global the $wp_meta_boxes variable (this will allow us to alter the array).
  global $wp_meta_boxes;
  // Then we make a backup of your widget.
  $my_widget = $wp_meta_boxes['dashboard']['normal']['core']['readme_widget'];
  // We then unset that part of the array.
  unset($wp_meta_boxes['dashboard']['normal']['core']['readme_widget']);
  // Now we just add your widget back in.
  $wp_meta_boxes['dashboard']['side']['core']['readme_widget'] = $my_widget;
}
add_action('wp_dashboard_setup','add_widget');

 /**
 * 追加ウィジェットの実装
 */
 function add_readme_widget(){
   //echo '<div class="readme_widget"><p>Hello World</p></div>';
   ?>
   <div class="readme_widget">
     <h2>FAQ</h2>
     よくある質問は<a href="#">こちら</a>をご覧ください。
     <h2>制作者の連絡先</h2>
     <p>下記の問い合わせフォームからご連絡ください。</p>
     <a href="https://taako-biz.com/inquiry/">問い合わせフォーム</a>
   </div>
   <?php
 }
