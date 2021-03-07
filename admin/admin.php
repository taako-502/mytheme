<?php
$admin_key_list = Array();

//saveボタンを押したときの処理
if(isset($_POST['save'])) {
  //admin.php画面からpostされたデータで、データベースと画面設定値を更新
  /* 基本設定　*/
  $pc_psize = $_POST['pc_p_size'];
  set_theme_mod('pc_p_size',$pc_psize);
  $pc_h1size = $_POST['pc_h1_size'];
  set_theme_mod('pc_h1_size',$pc_h1size);
  $pc_h2size = $_POST['pc_h2_size'];
  set_theme_mod('pc_h2_size',$pc_h2size);
  $pc_h3size = $_POST['pc_h3_size'];
  set_theme_mod('pc_h3_size',$pc_h3size);
  $pc_h4size = $_POST['pc_h4_size'];
  set_theme_mod('pc_h4_size',$pc_h4size);
  $pc_h5size = $_POST['pc_h5_size'];
  set_theme_mod('pc_h5_size',$pc_h5size);
  $pc_h6size = $_POST['pc_h6_size'];
  set_theme_mod('pc_h6_size',$pc_h6size);
  $tb_psize = $_POST['tb_p_size'];
  set_theme_mod('tb_p_size',$tb_psize);
  $tb_h1size = $_POST['tb_h1_size'];
  set_theme_mod('tb_h1_size',$tb_h1size);
  $tb_h2size = $_POST['tb_h2_size'];
  set_theme_mod('tb_h2_size',$tb_h2size);
  $tb_h3size = $_POST['tb_h3_size'];
  set_theme_mod('tb_h3_size',$tb_h3size);
  $tb_h4size = $_POST['tb_h4_size'];
  set_theme_mod('tb_h4_size',$tb_h4size);
  $tb_h5size = $_POST['tb_h5_size'];
  set_theme_mod('tb_h5_size',$tb_h5size);
  $tb_h6size = $_POST['tb_h6_size'];
  set_theme_mod('tb_h6_size',$tb_h6size);
  $sm_psize = $_POST['sm_p_size'];
  set_theme_mod('sm_p_size',$sm_psize);
  $sm_h1size = $_POST['sm_h1_size'];
  set_theme_mod('sm_h1_size',$sm_h1size);
  $sm_h2size = $_POST['sm_h2_size'];
  set_theme_mod('sm_h2_size',$sm_h2size);
  $sm_h3size = $_POST['sm_h3_size'];
  set_theme_mod('sm_h3_size',$sm_h3size);
  $sm_h4size = $_POST['sm_h4_size'];
  set_theme_mod('sm_h4_size',$sm_h4size);
  $sm_h5size = $_POST['sm_h5_size'];
  set_theme_mod('sm_h5_size',$sm_h5size);
  $sm_h6size = $_POST['sm_h6_size'];
  set_theme_mod('sm_h6_size',$sm_h6size);
  $analytics = trim($_POST['analytics']);
  set_theme_mod('analytics',$analytics);
  $gtmId = trim($_POST['gtm_id']);
  set_theme_mod('gtm_id', $gtmId);
  $ogpFbAdminId = $_POST['ogp_fb_adminid'];
  set_theme_mod('ogp_fb_adminid',$ogpFbAdminId);
  $ogpFbAppId = $_POST['ogp_fb_appid'];
  set_theme_mod('ogp_fb_appid',$ogpFbAppId);
  $ogpFbImgArticle = $_POST['ogp_fb_img_article'];
  set_theme_mod('ogp_fb_img_article',$ogpFbImgArticle);
  $ogpFbImgTop = $_POST['ogp_fb_img_top'];
  set_theme_mod('ogp_fb_img_top',$ogpFbImgTop);
  /* サイト回遊 */
  $recoleftimg = $_POST['reco_left_img'];
  set_theme_mod('reco_left_img',$recoleftimg);
  $recolefturl = $_POST['reco_left_url'];
  set_theme_mod('reco_left_url',$recolefturl);
  $recocenterimg = $_POST['reco_center_img'];
  set_theme_mod('reco_center_img',$recocenterimg);
  $recocenterurl = $_POST['reco_center_url'];
  set_theme_mod('reco_center_url',$recocenterurl);
  $recorightimg = $_POST['reco_right_img'];
  set_theme_mod('reco_right_img',$recorightimg);
  $recorighturl = $_POST['reco_right_url'];
  set_theme_mod('reco_right_url',$recorighturl);
  $relevanceSelect = $_POST['relevance_select'];
  set_theme_mod('relevance_select',$relevanceSelect);
  $relevanceUrl1 = $_POST['relevance_url1'];
  set_theme_mod('relevance_url1',$relevanceUrl1);
  $relevanceUrl2 = $_POST['relevance_url2'];
  set_theme_mod('relevance_url2',$relevanceUrl2);
  $relevanceUrl3 = $_POST['relevance_url3'];
  set_theme_mod('relevance_url3',$relevanceUrl3);
  $relevanceUrl4 = $_POST['relevance_url4'];
  set_theme_mod('relevance_url4',$relevanceUrl4);
  /* アドセンス */
  $adsCdAuto = $_POST['adsCd_auto'];
  set_theme_mod('adsCd_auto',$adsCdAuto);
  $adsTopCard = $_POST['adsCd_top_card'];
  set_theme_mod('adsCd_top_card',$adsTopCard);
  $adsCdOnContentTable = $_POST['adsCd_on_content_table'];
  set_theme_mod('adsCd_on_content_table',$adsCdOnContentTable);
  $adsBelowPost = $_POST['adsCd_below_post'];
  set_theme_mod('adsCd_below_post',$adsBelowPost);
  echo "データを更新しました。";
}
?>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/css/admin.css'); ?>">
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri() . '/js/admin.js'); ?>"></script>
<main class="main">
  <h1>mythemeカスタマイズ画面</h1>
  <h2>画面説明</h2>
  <p>この画面は、簡単にmythemeのデザインを設定できる画面です。</p>
  <form method="post">
    <div class="p-tab">
      <!-- タブの設定 -->
      <ul class="p-tab--headline">
        <li class="current">基本設定</li>
        <li>SEO</li>
        <li>サイト回遊</li>
        <li>アドセンス</li>
      </ul>
      <!-- コンテンツ -->
    	<ul class="p-tab--content">
        <li class="current">
      		<h2>基本設定</h2>
      		<p class="p-admin_description">文字の設定</p>
          <div class="setting">
            <h3>PC閲覧時（980px～）</h3>
            <p class="fontsize"><b>pタグ&ensp;&emsp;</b><input type="number" name="pc_p_size" value="<?php echo Mytheme::get_setting("pc_p_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("pc_p_size"); ?>"> px</p>
            <p class="fontsize"><b>h1タグ&emsp;</b><input type="number" name="pc_h1_size" value="<?php echo Mytheme::get_setting("pc_h1_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("pc_h1_size"); ?>"> px</p>
            <p class="fontsize"><b>h2タグ&emsp;</b><input type="number" name="pc_h2_size" value="<?php echo Mytheme::get_setting("pc_h2_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("pc_h2_size"); ?>"> px</p>
            <p class="fontsize"><b>h3タグ&emsp;</b><input type="number" name="pc_h3_size" value="<?php echo Mytheme::get_setting("pc_h3_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("pc_h3_size"); ?>"> px</p>
            <p class="fontsize"><b>h4タグ&emsp;</b><input type="number" name="pc_h4_size" value="<?php echo Mytheme::get_setting("pc_h4_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("pc_h4_size"); ?>"> px</p>
            <p class="fontsize"><b>h5タグ&emsp;</b><input type="number" name="pc_h5_size" value="<?php echo Mytheme::get_setting("pc_h5_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("pc_h5_size"); ?>"> px</p>
            <p class="fontsize"><b>h6タグ&emsp;</b><input type="number" name="pc_h6_size" value="<?php echo Mytheme::get_setting("pc_h6_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("pc_h6_size"); ?>"> px</p>
          </div>
          <div class="setting">
            <h3>タブレット閲覧時（768px～979px）</h3>
            <p class="fontsize"><b>pタグ&ensp;&emsp;</b><input type="number" name="tb_p_size" value="<?php echo Mytheme::get_setting("tb_p_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("tb_p_size"); ?>"> px</p>
            <p class="fontsize"><b>h1タグ&emsp;</b><input type="number" name="tb_h1_size" value="<?php echo Mytheme::get_setting("tb_h1_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("tb_h1_size"); ?>"> px</p>
            <p class="fontsize"><b>h2タグ&emsp;</b><input type="number" name="tb_h2_size" value="<?php echo Mytheme::get_setting("tb_h2_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("tb_h2_size"); ?>"> px</p>
            <p class="fontsize"><b>h3タグ&emsp;</b><input type="number" name="tb_h3_size" value="<?php echo Mytheme::get_setting("tb_h3_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("tb_h3_size"); ?>"> px</p>
            <p class="fontsize"><b>h4タグ&emsp;</b><input type="number" name="tb_h4_size" value="<?php echo Mytheme::get_setting("tb_h4_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("tb_h4_size"); ?>"> px</p>
            <p class="fontsize"><b>h5タグ&emsp;</b><input type="number" name="tb_h5_size" value="<?php echo Mytheme::get_setting("tb_h5_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("tb_h5_size"); ?>"> px</p>
            <p class="fontsize"><b>h6タグ&emsp;</b><input type="number" name="tb_h6_size" value="<?php echo Mytheme::get_setting("tb_h6_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("tb_h6_size"); ?>"> px</p>
          </div>
          <div class="setting">
            <h3>スマートフォン閲覧時(~768px)</h3>
            <p class="fontsize"><b>pタグ&ensp;&emsp;</b><input type="number" name="sm_p_size" value="<?php echo Mytheme::get_setting("sm_p_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("sm_p_size"); ?>"> px</p>
            <p class="fontsize"><b>h1タグ&emsp;</b><input type="number" name="sm_h1_size" value="<?php echo Mytheme::get_setting("sm_h1_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("sm_h1_size"); ?>"> px</p>
            <p class="fontsize"><b>h2タグ&emsp;</b><input type="number" name="sm_h2_size" value="<?php echo Mytheme::get_setting("sm_h2_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("sm_h2_size"); ?>"> px</p>
            <p class="fontsize"><b>h3タグ&emsp;</b><input type="number" name="sm_h3_size" value="<?php echo Mytheme::get_setting("sm_h3_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("sm_h3_size"); ?>"> px</p>
            <p class="fontsize"><b>h4タグ&emsp;</b><input type="number" name="sm_h4_size" value="<?php echo Mytheme::get_setting("sm_h4_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("sm_h4_size"); ?>"> px</p>
            <p class="fontsize"><b>h5タグ&emsp;</b><input type="number" name="sm_h5_size" value="<?php echo Mytheme::get_setting("sm_h5_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("sm_h5_size"); ?>"> px</p>
            <p class="fontsize"><b>h6タグ&emsp;</b><input type="number" name="sm_h6_size" value="<?php echo Mytheme::get_setting("sm_h6_size"); ?>" placeholder="<?php echo Mytheme::get_default_setting("sm_h6_size"); ?>"> px</p>
          </div>
    		</li>
    		<li>
      		<h2>SEO</h2>
      		<p class="p-admin_description">SEOに関する設定</p>
          <div class="setting">
            <div class="setting">
              <h2>アナリティクス</h2>
              <label for="analytics">トラッキングコード：</label><input id="analytics" type="text" name="analytics" value="<?php echo Mytheme::get_default_setting("analytics"); ?>">
              <h2>タグマネージャ</h2>
              <label for="gtm_id">Googleタグマネージャ：</label><input id="gtm_id" type="text" name="gtm_id" value="<?php echo Mytheme::get_default_setting("gtm_id"); ?>">
            </div>
          </div>
          <div class="setting">
            <h2>OGP設定</h2>
            <h3>facebook</h3>
            <p><label for="ogp_fb_adminid">管理者ID</label><input id="ogp_fb_adminid" type="text" name="ogp_fb_adminid" value="<?php echo Mytheme::get_default_setting("ogp_fb_adminid"); ?>"></p>
            <p><label for="ogp_fb_appid">アプリID</label><input id="ogp_fb_appid" type="text" name="ogp_fb_appid" value="<?php echo Mytheme::get_default_setting("ogp_fb_appid"); ?>"></p>
            <p><label for="ogp_fb_img_article">投稿ページ／記事ページ用デフォルトOGP画像</label><?php generate_upload_image_tag('ogp_fb_img_article', Mytheme::get_default_setting("ogp_fb_img_article")); ?></p>
            <p><label for="ogp_fb_img_top">投稿ページ／記事ページ以外用デフォルトOGP画像</label><?php generate_upload_image_tag('ogp_fb_img_top', Mytheme::get_default_setting("ogp_fb_img_top")); ?></p>
          </div>
    		</li>
        <li>
      		<h2>サイト回遊</h2>
      		<p class="p-admin_description">サイトの回遊率を向上させる設定。</p>
          <div class="setting">
            <h2>トップページ</h2>
            <p class="p-admin_description">トップページの設定。</p>
            <h3>トップページのおすすめ記事に設定する画像</h3>
            <p><b>左おすすめ記事</b></p>
            <p><label for="reco_left_img">画像URL：</label><?php generate_upload_image_tag('reco_left_img', Mytheme::get_default_setting("reco_left_img")); ?></p>
            <p><label for="reco_left_url">記事URL：</label><input type="url" name="reco_left_url" value="<?php echo Mytheme::get_default_setting("reco_left_url"); ?>"></p>
            <p><b>中央おすすめ記事</b></p>
            <p><label for="reco_center_img">画像URL：</label><?php generate_upload_image_tag('reco_center_img', Mytheme::get_default_setting("reco_center_img")); ?></p>
            <p><label for="reco_center_url">記事URL：</label><input type="url" name="reco_center_url" value="<?php echo Mytheme::get_default_setting("reco_center_url"); ?>"></p>
            <p><b>右おすすめ記事</b></p>
            <p><label for="reco_right_img">画像URL：</label><?php generate_upload_image_tag('reco_right_img', Mytheme::get_default_setting("reco_right_img")); ?></p>
            <p><label for="reco_right_url">記事URL：</label><input type="url" name="reco_right_url" value="<?php echo Mytheme::get_default_setting("reco_right_url"); ?>"></p>
          </div>
          <div class="setting">
            <h2>関連記事</h2>
            <p class="p-admin_description">記事下に表示する関連記事の設定。</p>
            <p>
              <label for="relevance_select">関連性：</label>
              <select id="relevance_select" class="relevance_select" name="relevance_select">
                <option <?php echo Mytheme::get_default_setting("relevance_select") == "category" ? "selected " : ""; ?>value="category">カテゴリ</option>
                <option <?php echo Mytheme::get_default_setting("relevance_select") == "tag" ? "selected " : ""; ?>value="tag">タグ</option>
                <option <?php echo Mytheme::get_default_setting("relevance_select") == "url" ? "selected " : ""; ?>value="url">記事指定（４記事）</option>
              </select>
            </p>
            <!-- 関連記事に"記事指定（４記事）"を指定した場合、関連記事のURLを指定する。 -->
            <div class="setting__detail relevance__url-set <?php echo Mytheme::get_default_setting("relevance_select") != "url" ? "u-display__none" : ""; ?>">
              <p><label for="relevance_url1">関連記事①：</label><input id="relevance_url1" type="url" name="relevance_url1" value="<?php echo Mytheme::get_default_setting("relevance_url1");?>"></p>
              <p><label for="relevance_url2">関連記事②：</label><input id="relevance_url2" type="url" name="relevance_url2" value="<?php echo Mytheme::get_default_setting("relevance_url2");?>"></p>
              <p><label for="relevance_url3">関連記事③：</label><input id="relevance_url3" type="url" name="relevance_url3" value="<?php echo Mytheme::get_default_setting("relevance_url3");?>"></p>
              <p><label for="relevance_url4">関連記事④：</label><input id="relevance_url4" type="url" name="relevance_url4" value="<?php echo Mytheme::get_default_setting("relevance_url4");?>"></p>
            </div>
          </div>
    		</li>
        <li>
          <h2>アドセンス</h2>
          <p class="p-admin_description">アドセンスの設定</p>
          <div class="setting">
            <h2>自動広告</h2>
            <p class="p-admin_description">アドセンスの自動広告用のコードを&lt;head&gt;タグ内に挿入します。</p>
            <p>
              <label for="adsCd_auto">アドセンスコード（自動広告）</label><br>
              <textarea id="adsCd_auto" name="adsCd_auto" rows="8" cols="80"><?php echo stripslashes(Mytheme::get_default_setting("adsCd_auto")); ?></textarea>
            </p>
            <h2>トップページ（カード型）</h2>
            <p class="p-admin_description">
              カード型記事一覧に溶け込むように、アドセンス広告を表示します。<br>
              この設定を行う場合、<a href="<?php echo get_template_directory_uri() . '/../../../wp-admin/options-reading.php'; ?>">「設定＞表示設定＞1ページに表示する最大投稿数」</a>を奇数に変更することを推奨します。
            </p>
            <p>
              <label for="adsCd_top_card">アドセンスコード（カード型）</label><br>
              <textarea id="adsCd_top_card" name="adsCd_top_card" rows="8" cols="80"><?php echo stripslashes(Mytheme::get_default_setting("adsCd_top_card")); ?></textarea>
            </p>
            <h2>もくじ上</h2>
            <p class="p-admin_description">もくじの上にアドセンス広告を表示します。もくじがない画面では表示されません。</p>
            <p>
              <label for="adsCd_on_content_table">アドセンスコード（もくじ上）</label><br>
              <textarea id="adsCd_on_content_table" name="adsCd_on_content_table" rows="8" cols="80"><?php echo stripslashes(Mytheme::get_default_setting("adsCd_on_content_table")); ?></textarea>
            </p>
            <h2>記事下</h2>
            <p class="p-admin_description">記事の下、コメントエリアの上にアドセンス広告を表示します。</p>
            <p>
              <label for="adsCd_below_post">アドセンスコード（記事下）</label><br>
              <textarea id="adsCd_below_post" name="adsCd_below_post" rows="8" cols="80"><?php echo stripslashes(Mytheme::get_default_setting("adsCd_below_post")); ?></textarea>
            </p>
          </div>
        </li>
    	</ul>
    </div>
    <p><input type="submit" name="save" value="<?php echo esc_attr( __('save','default')); ?>" class="button button-primary"></p>
  </form>
</main>
