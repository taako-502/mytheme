<section class="contents">
  <div class="l-main__col-1">
    <?php
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
