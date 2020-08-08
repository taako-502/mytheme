<?php

function updaeteOptionPost($key,$post_data){
  if ( isset( $post_data ) && $post_data ) {
    update_option( $key, $post_data );
  } else {
    update_option( $key, '' );
  }
  return $post_data;
}
?>
