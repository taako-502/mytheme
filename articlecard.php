<div class="article-card">
  <?php
      if ( has_post_thumbnail() ) {
        the_post_thumbnail('articlelist');
      }
      else {
        echo '<img width="288" height="162" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
      }
  ?>
  <h2>
    <a href="<?php echo get_permalink(); ?>">
      <?php
      $title = the_title( '' , '' , false );
      if(mb_strlen($title) <= 38 ){
        echo $title;
      } else {
        echo mb_substr($title,0,38) . "...";
      }
      ?>
    </a>
  </h2>
</div>
