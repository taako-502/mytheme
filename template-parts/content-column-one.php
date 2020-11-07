<section class="contents">
  <div class="l-main__col-1">
    <?php
    if(is_single()) {
      // カテゴリー表示
      $category_name = get_the_category()[0]->cat_name;
      $category_link = get_category_link(get_the_category()[0]->cat_ID);
      echo "<div class=\"category\"><a href=\"$category_link\">".$category_name."</a></div><br>";
    }
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
      ?>
      <h1><?php the_title();?></h1>
      <section>
        <?php the_content(); ?>
      </section>
      <?php
      endwhile;
    endif;
  ?>
  </div>
</section>
