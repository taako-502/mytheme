<?php
class MailClass {
  // プロパティの宣言
  //require_once ( dirname(__FILE__) . "/wp-load.php");
  //global $wpdb;

  /**
   * wp_mailboxからメッセージの一覧を取得する
   */

  /**
   * wp_mailboxを全件取得
   * @return OBJECT 結果をインデックス配列として出力。要素は行オブジェクト。
   */
  public function selectMailboxAll(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'mailbox';
    $query = "SELECT * FROM " . $table_name;
    return $results = $wpdb->get_results($query);
  }
}
?>
