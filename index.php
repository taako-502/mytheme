<?php
get_header();

// 読み込み
global $page_title;
$page_title = "home";
?>
<section class="contents">
  <?php
    if(\Mytheme::get_setting_admin("front_architect_reco_disp") == "visible"){ ?>
    <div class="p-recommend">
      <h2 class="p-recommend--h2 c-heading--main"><span class="cus-border"></span><?php echo \Mytheme::get_setting_admin("front_heading_reco"); ?></h2>
      <div class="p-recommend-area">
        <!-- TODO: ここで設定値が取得できていないため、修正すること -->
        <a class="p-recommend--a c-aspect-9-16" href="<?php echo \Mytheme::get_setting_admin('reco_left_url'); ?>">
          <img class="p-recommend--img" src="<?php echo \Mytheme::get_setting_admin('reco_left_img'); ?>" alt="">
        </a>
        <a class="p-recommend--a c-aspect-9-16" href="<?php echo \Mytheme::get_setting_admin('reco_center_url'); ?>">
          <img class="p-recommend--img" src="<?php echo \Mytheme::get_setting_admin('reco_center_img'); ?>" alt="">
        </a>
        <a class="p-recommend--a c-aspect-9-16" href="<?php echo \Mytheme::get_setting_admin('reco_right_url'); ?>">
          <img class="p-recommend--img" src="<?php echo \Mytheme::get_setting_admin('reco_right_img'); ?>" alt="">
        </a>
      </div>
    </div>
  <?php
  }
  ?>
  <main class="l-main p-front u-width-col-2">
    <h2 class="p-news--h2 c-heading--main"><span class="cus-border"></span><?php echo \Mytheme::get_setting_admin("front_heading_news"); ?></h2>
    <div class="p-news--list">
      <?php
        /* 記事一覧 */
        $cnt = 0;
        if ( have_posts() ) {
          while ( have_posts() ) {
            the_post();
            get_template_part('template-parts/content','article');
            if($cnt % 10 == 2){
              //広告を挿入
              $adsTopCard = \Mytheme::get_setting_admin('adsCd_top_card');
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
  if(\Mytheme::get_setting_admin('front_architect_col') == 'two-col'){
    //管理画面で2カラムを設定した場合、サイドバーを表示
    get_sidebar();
  }
  ?>
</section>
<?php get_footer(); ?>
