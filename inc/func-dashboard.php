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
  wp_add_dashboard_widget(
    'readme_widget',
    'Read Me !!',
    'add_readme_widget');

  /* 追加したウィジェットを一番上に持ってくる処理 */
  //メタボックス配列をグローバライズする。これには wp-admin のすべてのウィジェットが含まれる。
  global $wp_meta_boxes;
  //通常のダッシュボードウィジェット配列を取得
  //(最後に新しいウィジェットが追加されている)
  $normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
  //バックアップして新しいダッシュボードウィジェットを配列の最後から削除
  $readme_widget_backup = array( 'readme_widget' => $normal_dashboard['readme_widget'] );
  unset( $normal_dashboard['readme_widget'] );
  //2つの配列を統合して新しいウィジェットが最初にくるようにする
  $sorted_dashboard = array_merge( $readme_widget_backup, $normal_dashboard );
  //並べ替えた配列を元のメタボックスに保存し直す
  $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action('wp_dashboard_setup','add_widget');

 /**
 * 追加ウィジェットの実装
 */
 function add_readme_widget(){
   echo '<div class="custom_widget"><p>Hello World</p></div>';
 }
