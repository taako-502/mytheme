<div class="article-card">
  <a href="<?php echo get_permalink(); ?>">
    <?php
        if ( has_post_thumbnail() ) {
          the_post_thumbnail('articlelist');
        } else {
          // アイキャッチが設定されていない場合、デフォルトのアイキャッチを使用
          echo '<img width="288" height="162" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
        }
    ?>
</a>
  <h2>
    <a class="apermalink" href="<?php echo get_permalink(); ?>">
      <?php
        $title = the_title( '' , '' , false );
        // タイトルが長い場合、省略
        echo mb_strlen($title) <= 38 ? $title : mb_substr($title,0,38) . "...";
      ?>
    </a>
  </h2>
</div>
