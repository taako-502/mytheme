<?php
get_header();
//-wp_optionsテーブルから設定値を取得
$recoleftimg = get_theme_mod('reco-left-img', get_template_directory_uri() ."/images/thumbnail-default.jpg");
$recolefturl = get_theme_mod('reco-left-url','#');
$recocenterimg = get_theme_mod('reco-center-img', get_template_directory_uri() ."/images/thumbnail-default.jpg");
$recocenterurl = get_theme_mod('reco-center-url','#');
$recorightimg = get_theme_mod('reco-right-img', get_template_directory_uri() ."/images/thumbnail-default.jpg");
$recorighturl = get_theme_mod('reco-right-url','#');
//画像がなかった場合にデフォルトを設定
$recoleftimg = ut\isNullOrEmpty($recoleftimg) ? get_template_directory_uri() ."/images/thumbnail-default.jpg" : $recoleftimg;
$recocenterimg = ut\isNullOrEmpty($recocenterimg) ? get_template_directory_uri() ."/images/thumbnail-default.jpg" : $recocenterimg;
$recorightimg = ut\isNullOrEmpty($recorightimg) ? get_template_directory_uri() ."/images/thumbnail-default.jpg" : $recorightimg;
// 読み込み
global $page_title;
$page_title = "home";
$front_slider_type = get_theme_mod('front_slider_type','news');
if($front_slider_type != 'none') {
  ?>
  <ul class="c-slider-frontpage">
    <?php
    switch (get_theme_mod('front_slider_type','news')) {
      case 'news':
        // 表示件数の指定
        $args = array(
          'posts_per_page' => get_theme_mod('front_slider_all_number','8')
        );
        $posts = get_posts( $args );
        foreach ( $posts as $post ){
          setup_postdata( $post );
          ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <?php
              if (has_post_thumbnail()){
                the_post_thumbnail('large');
              } else {
                ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt="">
                <?php
              }
              ?>
              <div class="hover-text">
                <h3><?php the_title(); ?></p>
                <p><?php echo ut\getMetaDescription($post->ID, 120); ?></p>
              </div>
            </a>
          </li>
          <?php
        }
        wp_reset_postdata();
        break;
      case 'recommend':
        ?>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt=""></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt=""></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt=""></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt=""></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt=""></li>
        <?php
        break;
      case 'firstview':
        // code...
        break;
      default:
        // code...
        break;
    }
    ?>
  </ul>
<?php
}
?>
<section class="contents">
  <?php
  if(get_theme_mod("front_architect_reco_disp","visible") == "visible"){ ?>
  <div class="p-recommend">
    <h2 class="p-recommend--h2 c-heading--main"><span class="cus-border"></span><?php echo get_theme_mod("front_heading_reco","おすすめ記事"); ?></h2>
    <div class="p-recommend-area">
      <a class="p-recommend--a c-aspect-9-16" href="<?php echo $recolefturl; ?>">
        <img class="p-recommend--img" src="<?php echo $recoleftimg; ?>" alt="hoge">
      </a>
      <a class="p-recommend--a c-aspect-9-16" href="<?php echo $recocenterurl; ?>">
        <img class="p-recommend--img" src="<?php echo $recocenterimg; ?>" alt="fuga">
      </a>
      <a class="p-recommend--a c-aspect-9-16" href="<?php echo $recorighturl; ?>">
        <img class="p-recommend--img" src="<?php echo $recorightimg; ?>" alt="fuga">
      </a>
    </div>
  </div>
  <?php
  } ?>
  <main class="l-main p-front u-width-col-2">
    <h2 class="p-news--h2 c-heading--main"><span class="cus-border"></span><?php echo get_theme_mod("front_heading_news","新着記事"); ?></h2>
    <div class="p-news--list">
      <?php
        /* 記事一覧 */
        $cnt = 0;
        if ( have_posts() ) {
          while ( have_posts() ) {
            the_post();
            get_template_part('/template-parts/content','article');
            if($cnt % 10 == 2){
              //広告を挿入
              $adsTopCard = get_theme_mod('adsCd-top-card','');;
              ?>
              <div class="p-news-card">
                <?php echo stripslashes($adsTopCard); ?>
              </div>
              <?php
            }
            $cnt++;
          }
          the_posts_pagination();
        } else {
          echo "<p>まだ記事がありません。</p>";
        }
      ?>
    </div>
  </main>
  <?php
  if(get_theme_mod('front_architect_col','two-col') == 'two-col'){
    //管理画面で2カラムを設定した場合、サイドバーを表示
    get_sidebar();
  }
  ?>
</section>
<?php get_footer(); ?>
