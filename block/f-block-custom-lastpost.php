<?php

/**
* 最新記事カード（バナータイプ）
*/

function custom_lastpost_dynamic_render_callback( $block_attributes, $content ) {
  $recent_posts = wp_get_recent_posts( array(
      'numberposts' => 1,
      'post_status' => 'publish',
  ) );
  if ( count( $recent_posts ) === 0 ) {
      return 'No posts';
  }
  $post = $recent_posts[ 0 ];
  $post_id = $post['ID'];
  return sprintf(
    '<div class="p-blogcard">
      <a class="wp-block-my-plugin-latest-post" href="%1$s">
        %2$s
        <div class="p-blogcard__child">
          <p class="p-blogcard__title">%3$s</p>
          <p class="p-blogcard__discription">ディスクリプション</p>
        </div>
      </a>
    </div>',
    esc_url( get_permalink( $post_id ) ),
    get_the_post_thumbnail( $post_id , 'thumbnail' ),
    esc_html( get_the_title( $post_id ) )
  );
}

function custom_lastpost_dynamic() {
  // automatically load dependencies and version
  $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

  register_block_type( 'custom/last-post', array(
      'editor_script' => 'custom-last-post',
      'render_callback' => 'custom_lastpost_dynamic_render_callback'
  ) );

}
add_action( 'init', 'custom_lastpost_dynamic' );
