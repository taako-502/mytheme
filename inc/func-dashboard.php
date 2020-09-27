<?php
/**
 * ダッシュボード
 *
 * @package mytheme
 */

 /**
 * ダッシュボードにウィジェット追加
 */
 function add_widget(){
   wp_add_dashboard_widget(
     'custom_widget',
     'テーマ設定',
     'add_custom_widget');
 }
 add_action('wp_dashboard_setup','add_widget');

 /**
 * 追加ウィジェットの実装
 */
 function add_custom_widget(){
   echo '<div class="custom_widget"><p>Hello World</p></div>';
 }
