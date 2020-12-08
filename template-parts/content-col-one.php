<section class="contents">
  <main class="l-main__col-1">
    <?php
    if(is_single()) {
      // カテゴリー表示
      $category_name = get_the_category()[0]->cat_name;
      $category_link = get_category_link(get_the_category()[0]->cat_ID);
      echo "<div class=\"p-category\"><a href=\"$category_link\">".$category_name."</a></div><br>";
    }
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
      ?>
      <h1><?php the_title();?></h1>
      <?php the_post_thumbnail(); ?>
      <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
        the_content();
        wp_link_pages('before=<div class="pagination">&after=</div>');
        if( is_singular('post') ) {
          comments_template();
        }
        ?>
      </section>
      <?php
      endwhile;
    endif;
  ?>
  </main>
</section>
