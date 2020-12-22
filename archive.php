<?php get_header(); ?>
<section class="contents">
  <main class="l-main">
    <h1>記事一覧</h1>
    <?php
    $category_name = get_the_category()[0]->cat_name;
    $category_link = get_category_link(get_the_category()[0]->cat_ID);
    ?>
    <div class="p-category"><a href="<?php echo $category_link ?>"><?php echo $category_name; ?></a></div>
    <div class="p-news--list">
      <?php
      /* 記事一覧 */
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          get_template_part('/template-parts/content','article');
        }
        the_posts_navigation();
      } else {
        echo "<p>まだ記事がありません。</p>";
      }
      ?>
    </div>
  </main>
  <?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>
