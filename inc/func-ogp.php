<?php

/**
 * メタボックス設定
 * @return [type] [description]
 */
function ogp_meta_box() {
	add_meta_box(
		'ogp_meta_box', // ID of meta box
		'OGPの個別設定', // label
		'ogp_meta_box_callback', // callback function
		array( 'post', 'page' ), // post type
		'side', // context
		'default' // priority
	);
}
add_action( 'add_meta_boxes', 'ogp_meta_box' );

/**
 * OGP設定のhtml部分
 * @param  [type] $post [description]
 * @return [type]       [description]
 */
function ogp_meta_box_callback( $post ) {
  $ogpTitle = get_post_meta( $post->ID, '_ogp_title', true );
  $ogpDescription = get_post_meta( $post->ID, '_ogp_description', true );
  ?>
  <p>OGPタイトル</p>
  <input type="text" name="ogp_title" value='<?php echo $ogpTitle; ?>'>
  <p>OGPディスクリプション</p>
  <textarea name="ogp_description" rows="40" columns="4"><?php echo $ogpDescription; ?></textarea>
  <?php
}

/**
 * 投稿画面で更新を推したときに、画面で入力したOGP情報をwp_postmetaテーブルに更新する処理
 *
 * @param int $post_id
 */
function save_global_ogp_title_meta_box_data( $post_id ) {
  // 権限チェック
  if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
    if ( ! current_user_can( 'edit_page', $post_id ) ) { return; }
  } else {
    if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }
  }
  // 自動保存の時は、なにもしない
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
  // 更新処理
  if(isset($_POST['ogp_title'])){
    update_post_meta( $post_id , '_ogp_title', $_POST['ogp_title'] );
  }
  if(isset($_POST['ogp_description'])){
    update_post_meta( $post_id , '_ogp_description', $_POST['ogp_description'] );
  }
}

add_action( 'save_post', 'save_global_ogp_title_meta_box_data' );
?>
