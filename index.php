<?php
//-wp_optionsテーブルから設定値を取得
$recoleftimg = get_theme_mod('reco-left-img', get_template_directory_uri() ."/images/thumbnail-default.jpg");
$recolefturl = get_theme_mod('reco-left-url','#');
$recocenterimg = get_theme_mod('reco-center-img', get_template_directory_uri() ."/images/thumbnail-default.jpg");
$recocenterurl = get_theme_mod('reco-center-url','#');
$recorightimg = get_theme_mod('reco-right-img', get_template_directory_uri() ."/images/thumbnail-default.jpg");
$recorighturl = get_theme_mod('reco-right-url','#');
//画像がなかった場合にデフォルトを設定
$recoleftimg = isset($recoleftimg) ? get_template_directory_uri() ."/images/thumbnail-default.jpg" : $recoleftimg;
$recocenterimg = isset($recocenterimg) ? get_template_directory_uri() ."/images/thumbnail-default.jpg" : $recocenterimg;
$recorightimg = isset($recorightimg) ? get_template_directory_uri() ."/images/thumbnail-default.jpg" : $recorightimg;
// 読み込み
global $page_title;
$page_title = "home";
get_header();
?>
<div class="topimage"></div>
<section id="content">
  <div id="content-wrap" class="container">
    <div class="row">
      <div id="recommend" class="col-md-12">
        <h2 class="article-heading">おすすめ記事</h2>
        <div class="recommend-area row">
          <div class="reco-article recommend-left col-sm-12 col-md-4">
            <a href="<?php echo $recolefturl; ?>"><img src="<?php echo $recoleftimg; ?>" alt="hoge"></a>
          </div>
          <div class="reco-article recommend-left col-sm-12 col-md-4">
            <a href="<?php echo $recocenterurl; ?>"><img src="<?php echo $recocenterimg; ?>" alt="fuga"></a>
          </div>
          <div class="reco-article recommend-left col-sm-12 col-md-4">
            <a href="<?php echo $recorighturl; ?>"><img src="<?php echo $recorightimg; ?>" alt="fuga"></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div id="main" class="col-md-9">
        <h2 class="article-heading">新着記事</h2>
        <div class="article-list-one-column col-md-12 row">
          <?php
            /* 記事一覧 */
            if ( have_posts() ) {
              while ( have_posts() ) { the_post();
                include(get_template_directory() ."/template-parts/articlecard.php");
              }
            } else {
              echo "<p>まだ記事がありません。</p>";
            }
          ?>
        </div>
      </div>
      <div id="sidebar" class="col-md-3">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
