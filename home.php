<?php
require get_template_directory() . '/utility.php';
//-wp_optionsテーブルから設定値を取得
$recoleftimg = get_option_isBlank('reco-left-img', get_template_directory_uri() ."/images/thumbnail-default.jpg");
$recolefturl = get_option_isBlank('reco-left-url','#');
$recocenterimg = get_option_isBlank('reco-center-img', get_template_directory_uri() ."/images/thumbnail-default.jpg");
$recocenterurl = get_option_isBlank('reco-center-url','#');
$recorightimg = get_option_isBlank('reco-right-img', get_template_directory_uri() ."/images/thumbnail-default.jpg");
$recorighturl = get_option_isBlank('reco-right-url','#');
get_header('top');
?>
<div class="topimage"></div>
<section id="content">
  <div id="content-wrap" class="container">
    <div class="col-md-12">
      <h2>おすすめ記事</h2>
      <div class="recommend-article col-md-12">
        <div class="recommend-left">
          <a href="<?php echo $recolefturl; ?>"><img src="<?php echo $recoleftimg; ?>" alt="hoge"></a>
        </div>
        <div class="recommend-center">
          <a href="<?php echo $recocenterurl; ?>"><img src="<?php echo $recocenterimg; ?>" alt="fuga"></a>
        </div>
        <div class="recommend-right">
          <a href="<?php echo $recorighturl; ?>"><img src="<?php echo $recorightimg; ?>" alt="fuga"></a>
        </div>
      </div>
    </div>
    <div id="main" class="col-md-9">
      <h2>新着記事</h2>
      <div class="article-list-one-column col-md-12">
        <?php
          /* 記事一覧 */
          if ( have_posts() ) {
            while ( have_posts() ) { the_post();
              include(get_template_directory() ."/articlecard.php");
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
</section>
<?php get_footer(); ?>
