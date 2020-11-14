<section class="contents">
  <div class="l-main">
    <?php
    // パンくずリスト
    echo breadcrumb();
    if(is_single()) {
      // カテゴリー表示
      $category_name = get_the_category()[0]->cat_name;
      $category_link = get_category_link(get_the_category()[0]->cat_ID);
      echo "<div class=\"p-category\"><a href=\"$category_link\">".$category_name."</a></div><br>";
    }
    ?>
    <article class="p-article">
      <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          ?>
          <h1><?php the_title();?></h1>
          <?php the_post_thumbnail(); ?>
          <section>
            <?php
            the_content();
            get_template_part('content');
            if( is_singular('post') ) {
              comments_template();
            }
            ?>
          </section>
          <?php
        endwhile;
      endif;
    ?>
    </article>
    <?php
    //関連記事
    get_template_part( 'template-parts/content', 'related' );
    ?>
  </div>
  <?php get_sidebar(); ?>
</section>
