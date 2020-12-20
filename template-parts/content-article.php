<div class="p-news-card">
  <?php
  $category = get_the_category();
  $cat_name = $category[0]->cat_name;
  $cat_link = get_category_link($category[0]->term_id);
  ?>
  <a class="p-news-card--category" href="<?php echo $cat_link; ?>"><span><?php echo $cat_name; ?></span></a>
  <a href="<?php echo get_permalink(); ?>">
    <?php
        if ( has_post_thumbnail() ) {
          the_post_thumbnail('articlelist');
        } else {
          // アイキャッチが設定されていない場合、デフォルトのアイキャッチを使用
          echo '<img width="288" height="162" src="' . get_stylesheet_directory_uri() . '/images/thumbnail-default.jpg" />';
        }
    ?>
  </a>
  <h2>
    <a class="p-news-card--a" href="<?php echo get_permalink(); ?>">
      <?php
        $title = get_the_title();
        // タイトルが長い場合、省略
        echo mb_strlen($title) <= 38 ? $title : mb_substr($title,0,38) . "...";
      ?>
    </a>
  </h2>
</div>
