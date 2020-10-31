<section id="content">
  <div id="content-wrap" class="container">
    <div id="main" class="col-md-12" >
      <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
        ?>
        <h1><?php the_title();?></h1>
        <section>
          <?php the_content(); ?>
        </section>
        <?php
          //関連記事
          get_template_part( 'template-parts/content', 'related' );
        endwhile;
      endif;
    ?>
    </div>
  </div>
</section>
