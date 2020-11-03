<?php get_header(); ?>
<section class="contents">
  <div class="l-main">
    <h1>記事一覧</h1>
      <?php
      $category_name = get_the_category()[0]->cat_name;
      $category_link = get_category_link(get_the_category()[0]->cat_ID);
      echo "<div class=\"category\"><a href=\"$category_link\">".$category_name."</a></div>";
      ?>
      <hr>
      <div class="p-news--list">
        <?php
        /* 記事一覧 */
        if ( have_posts() ) {
          while ( have_posts() ) { the_post();
            get_template_part('/template-parts/content','article');
          }
        } else {
          echo "<p>まだ記事がありません。</p>";
        }
        ?>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</section>
<?php get_footer(); ?>
