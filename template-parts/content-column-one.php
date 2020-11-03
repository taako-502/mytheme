<section class="contents">
  <div class="l-main">
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
  <?php get_template_part( 'template-parts/content', 'related' ); ?>
</section>
