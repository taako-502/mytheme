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
<div class="p-top--img"></div>
<section class="contents">
  <div class="p-recommend">
    <h2 class="c-aritcle--h2">おすすめ記事</h2>
    <div class="p-recommend-area">
      <a class="p-recommend--a" href="<?php echo $recolefturl; ?>">
        <img class="p-recommend--img" src="<?php echo $recoleftimg; ?>" alt="hoge">
      </a>
      <a class="p-recommend--a" href="<?php echo $recocenterurl; ?>">
        <img class="p-recommend--img" src="<?php echo $recocenterimg; ?>" alt="fuga">
      </a>
      <a class="p-recommend--a" href="<?php echo $recorighturl; ?>">
        <img class="p-recommend--img" src="<?php echo $recorightimg; ?>" alt="fuga">
      </a>
    </div>
  </div>
  <main class="l-main">
    <h2 class="c-aritcle--h2">新着記事</h2>
    <div class="p-news--list">
      <?php
        /* 記事一覧 */
        if ( have_posts() ) {
          while ( have_posts() ) {
            the_post();
            get_template_part('/template-parts/content','article');
          }
          the_posts_pagination();
        } else {
          echo "<p>まだ記事がありません。</p>";
        }
      ?>
    </div>
  </main>
  <?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>
