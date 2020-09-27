<?php get_header(); ?>
<section id="content">
  <div id="content-wrap" class="container">
    <div class="row">
      <div id="main" class="col-md-9" >
        <h1>記事一覧</h1>
        <?php
          $category_name = get_the_category()[0]->cat_name;
          $category_link = get_category_link(get_the_category()[0]->cat_ID);
          echo "<div class=\"category\"><a href=\"$category_link\">".$category_name."</a></div>";
        ?>
        <hr>
        <div class="article-list">
          <?php
            /* 記事一覧 */
            if ( have_posts() ) {
              while ( have_posts() ) { the_post();
                include(get_template_directory() ."/template-parts/articlecard.php");
              }
            } else {
              echo "<p>まだ記事がありません。</p>";
            }
          ?>
        </div>
      </div>
      <div id="sidebar" class="col-md-3">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
