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
?>
<section class="contents">
  <?php
  if(get_theme_mod("front_architect_reco_disp","visible") == "visible"){ ?>
  <div class="p-recommend">
    <h2 class="p-recommend--h2 c-heading--main"><?php echo get_theme_mod("front_text_reco","おすすめ記事"); ?></h2>
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
  <main class="l-main p-front">
    <h2 class="p-news--h2 c-heading--main"><?php echo get_theme_mod("front_text_news","新着記事"); ?></h2>
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
  if(get_theme_mod('architect_layout_col','two-col') == 'two-col'){
    //管理画面で2カラムを設定した場合、サイドバーを表示
    get_sidebar();
  }
  ?>
</section>
<?php get_footer(); ?>
