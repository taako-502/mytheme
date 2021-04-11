<?php
/**
* 内部リンクカード（バナータイプ）
*/
function custom_blogcard_dynamic_render_callback( $attr, $content ) {
  $post_id = url_to_postid($attr['url_blogcard']);
  $description = \Mytheme_Theme\Utility::getDescription($post_id,50);
  $thumbnail_url = has_post_thumbnail()
                  ? get_the_post_thumbnail( $post_id , 'thumbnail' )
                  : "<img width=\"150\" height=\"150\" src=\"" . get_stylesheet_directory_uri() . "/images/thumbnail-default.jpg\" />";
  return sprintf(
    '<div class="p-blogcard">
      <a class="wp-block-my-plugin-latest-post" href="%1$s">
        %2$s
        <div class="p-blogcard__child">
          <p class="p-blogcard__title">%3$s</p>
          <p class="p-blogcard__discription">%4$s</p>
        </div>
      </a>
    </div>',
    esc_url( get_permalink( $post_id ) ),
    $thumbnail_url,
    esc_html( get_the_title( $post_id ) ),
    $description
  );
}

function custom_blogcard_dynamic() {
  // automatically load dependencies and version
  $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

  register_block_type( 'custom/blogcard', array(
      'editor_script' => 'custom-blogcard',
      'render_callback' => 'custom_blogcard_dynamic_render_callback'
  ) );

}
add_action( 'init', 'custom_blogcard_dynamic' );
