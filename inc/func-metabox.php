<?php
/**
 * メタボックスの設定
 */

 /**
  * メタディスクリプション設定用メタボックスを追加
  * @return [type] [description]
  */
 function metainfo_meta_box() {
 	add_meta_box(
 		'metainfo_meta_box', // ID of meta box
 		'メタディスクリプション', // label
 		'metainfo_callback', // callback function
 		array( 'post', 'page' ), // post type
 		'normal', // context
 		'default' // priority
 	);
 }
 add_action( 'add_meta_boxes', 'metainfo_meta_box' );

/**
 * [metainfo_callback description]
 * @param  [type] $post [description]
 * @return [type]       [description]
 */
 function metainfo_callback( $post ){
   $metaDescription = get_post_meta( $post->ID, '_meta_description', true );
	 echo '
   <p>
    メタディスクリプション<br>
    文字数：<span id="meta-description-len">0</span>文字（90〜120文字推奨）
   </p>
   <textarea id="meta-description-textarea" name="meta_description" rows="4">'.$metaDescription.'</textarea>';
 }

/**
 * OGP設定用メタボックスに追加
 * @return [type] [description]
 */
function ogp_meta_box() {
	add_meta_box(
		'ogp_meta_box', // ID of meta box
		'OGPの個別設定', // label
		'ogp_callback', // callback function
		array( 'post', 'page' ), // post type
		'normal', // context
		'default' // priority
	);
}
add_action( 'add_meta_boxes', 'ogp_meta_box' );

/**
 * OGP設定のhtml部分
 * @param  [type] $post [description]
 * @return [type]       [description]
 */
function ogp_callback( $post ) {
  $ogpTitle = get_post_meta( $post->ID, '_ogp_title', true );
  $ogpDescription = get_post_meta( $post->ID, '_ogp_description', true );
  $ogpImg = get_post_meta( $post->ID, '_ogp_img', true );
  echo '<p>OGPタイトル</p>
  <input type="text" name="ogp_title" value="'.$ogpTitle.'">
  <p>
   OGPディスクリプション<br>
   文字数：<span id="ogp-description-len">0</span>文字（90〜120文字推奨）
  </p>
  <textarea id="ogp-description-textarea" name="ogp_description" rows="4">'.$ogpDescription.'</textarea>
	<p>画像URL</p>';
	generate_upload_image_tag('ogp_img', $ogpImg);
}

/**
 * 投稿画面で更新を推したときに、画面で入力したメタ情報をwp_postmetaテーブルに更新する処理
 *
 * @param int $post_id
 */
function save_meta_box_data( $post_id ) {
  // 権限チェック
  if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
    if ( ! current_user_can( 'edit_page', $post_id ) ) { return; }
  } else {
    if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }
  }
  // 自動保存の時は、なにもしない
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
  // 更新処理
  if(isset($_POST['meta_description'])){ update_post_meta( $post_id , '_meta_description', $_POST['meta_description'] ); }
  if(isset($_POST['ogp_title'])){ update_post_meta( $post_id , '_ogp_title', $_POST['ogp_title'] ); }
  if(isset($_POST['ogp_description'])){ update_post_meta( $post_id , '_ogp_description', $_POST['ogp_description'] ); }
	if(isset($_POST['ogp_img'])){ update_post_meta( $post_id , '_ogp_img', $_POST['ogp_img'] ); }
}
add_action( 'save_post', 'save_meta_box_data' );
?>
