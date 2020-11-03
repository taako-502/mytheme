<aside class="p-related">
  <h4>関連記事</h4>
  <ul>
    <?php
    if(has_category() ) {
      $cats =get_the_category();
      $catkwds = array();
      foreach($cats as $cat){
        $catkwds[] = $cat->term_id;
      }
    }
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => '4',
      'post__not_in' =>array( $post->ID ),
      'category__in' => $catkwds,
      'orderby' => 'rand'
    );
    $my_query = new WP_Query( $args );
    while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
      <li>
        <a href="<?php the_permalink(); ?>">
          <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('medium');
          } else {
            echo '<img width="300" height="300" src="' . get_template_directory_uri() . '/images/thumbnail-default.jpg" class="attachment-medium size-medium wp-post-image" alt="デフォルトのサムネイル">';
          } ?>
          <div class="text">
          <?php the_title(); ?>
          </div>
        </a>
      </li>
    <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
  </ul>
</aside>
