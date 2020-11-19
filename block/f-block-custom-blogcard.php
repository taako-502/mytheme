
<?php

/**
* Plugin Name: Gutenberg examples dynamic
*/

function custom_blogcard_dynamic_render_callback( $attr, $content ) {
  $post_id = url_to_postid($attr['url_blogcard']);
  //$post_id = $attr['url_blogcard'];
  //return $post_id;
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

function custom_blogcard_dynamic() {
  // automatically load dependencies and version
  $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

  wp_register_script(
      'custom-blogcard',
      plugins_url( 'build/block.js', __FILE__ ),
      $asset_file['dependencies'],
      $asset_file['version']
  );

  register_block_type( 'custom/blogcard', array(
      'editor_script' => 'custom-blogcard',
      'render_callback' => 'custom_blogcard_dynamic_render_callback'
  ) );

}
add_action( 'init', 'custom_blogcard_dynamic' );
