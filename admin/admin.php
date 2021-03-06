<?php
//saveボタンを押したときの処理
if(isset($_POST['save'])) {
  /* 基本設定 */
  foreach (\Mytheme_Theme\Admin::get_admin_key() as $key) {
    set_theme_mod( $key, $_POST[$key]);
  }
  //wp_optionsに保存したデータをMythemeクラスに読み込み
  Mytheme::set_settings_data();
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
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","pタグ&ensp;&emsp;","pc_p_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h1タグ&ensp;&emsp;","pc_h1_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h2タグ&ensp;&emsp;","pc_h2_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h3タグ&ensp;&emsp;","pc_h3_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h4タグ&ensp;&emsp;","pc_h4_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h5タグ&ensp;&emsp;","pc_h5_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h6タグ&ensp;&emsp;","pc_h6_size"); ?> px</p>
          </div>
          <div class="setting">
            <h3>タブレット閲覧時（768px～979px）</h3>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","pタグ&ensp;&emsp;","tb_p_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h1タグ&ensp;&emsp;","tb_h1_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h2タグ&ensp;&emsp;","tb_h2_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h3タグ&ensp;&emsp;","tb_h3_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h4タグ&ensp;&emsp;","tb_h4_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h5タグ&ensp;&emsp;","tb_h5_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h6タグ&ensp;&emsp;","tb_h6_size"); ?> px</p>
          </div>
          <div class="setting">
            <h3>スマートフォン閲覧時(~768px)</h3>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","pタグ&ensp;&emsp;","sm_p_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h1タグ&ensp;&emsp;","sm_h1_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h2タグ&ensp;&emsp;","sm_h2_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h3タグ&ensp;&emsp;","sm_h3_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h4タグ&ensp;&emsp;","sm_h4_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h5タグ&ensp;&emsp;","sm_h5_size"); ?> px</p>
            <p class="fontsize"><?php echo \Mytheme_Theme\Admin::add_input("number","h6タグ&ensp;&emsp;","sm_h6_size"); ?> px</p>
          </div>
    		</li>
    		<li>
      		<h2>SEO</h2>
      		<p class="p-admin_description">SEOに関する設定</p>
          <div class="setting">
            <div class="setting">
              <h2>アナリティクス</h2><?php echo \Mytheme_Theme\Admin::add_input("text","トラッキングコード：","analytics","UA-XXXXXXXXX-X"); ?>
              <h2>タグマネージャ</h2><?php echo \Mytheme_Theme\Admin::add_input("text","Googleタグマネージャ：","gtm_id"); ?>
            </div>
          </div>
          <div class="setting">
            <h2>OGP設定</h2>
            <h3>facebook</h3>
            <p><?php echo \Mytheme_Theme\Admin::add_input("text","管理者ID：","ogp_fb_adminid"); ?></p>
            <p><?php echo \Mytheme_Theme\Admin::add_input("text","アプリID：","ogp_fb_appid"); ?></p>
            <p><?php echo \Mytheme_Theme\Admin::add_img("投稿ページ／記事ページ用デフォルトOGP画像","ogp_fb_img_article"); ?></p>
            <p><?php echo \Mytheme_Theme\Admin::add_img("投稿ページ／記事ページ以外用デフォルトOGP画像","ogp_fb_img_top"); ?></p>
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
            <p><?php echo \Mytheme_Theme\Admin::add_img("画像URL：","reco_left_img"); ?></p>
            <p><?php echo \Mytheme_Theme\Admin::add_input("url","記事URL：","reco_left_url"); ?></p>
            <p><b>中央おすすめ記事</b></p>
            <p><?php echo \Mytheme_Theme\Admin::add_img("画像URL：","reco_center_img"); ?></p>
            <p><?php echo \Mytheme_Theme\Admin::add_input("url","記事URL：","reco_center_url"); ?></p>
            <p><b>右おすすめ記事</b></p>
            <p><?php echo \Mytheme_Theme\Admin::add_img("画像URL：","reco_right_img"); ?></p>
            <p><?php echo \Mytheme_Theme\Admin::add_input("url","記事URL：","reco_right_url"); ?></p>
          </div>
          <div class="setting">
            <h2>関連記事</h2>
            <p class="p-admin_description">記事下に表示する関連記事の設定。</p>
            <p><?php echo \Mytheme_Theme\Admin::add_select("関連性：","relevance_select",array('category' => 'カテゴリ','tag' => 'タグ','url' => '記事指定（４記事）')); ?> </p>
            <!-- 関連記事に"記事指定（４記事）"を指定した場合、関連記事のURLを指定する。 -->
            <div class="setting__detail relevance__url-set <?php echo Mytheme::get_setting("relevance_select") != "url" ? "u-display__none" : ""; ?>">
              <p><?php echo \Mytheme_Theme\Admin::add_input("url","関連記事①：","relevance_url1"); ?></p>
              <p><?php echo \Mytheme_Theme\Admin::add_input("url","関連記事②：","relevance_url2"); ?></p>
              <p><?php echo \Mytheme_Theme\Admin::add_input("url","関連記事③：","relevance_url3"); ?></p>
              <p><?php echo \Mytheme_Theme\Admin::add_input("url","関連記事④：","relevance_url4"); ?></p>
            </div>
          </div>
    		</li>
        <li>
          <h2>アドセンス</h2>
          <p class="p-admin_description">アドセンスの設定</p>
          <div class="setting">
            <h2>自動広告</h2>
            <p class="p-admin_description">アドセンスの自動広告用のコードを&lt;head&gt;タグ内に挿入します。</p>
            <p><?php echo  \Mytheme_Theme\Admin::add_textarea_html("アドセンスコード（自動広告）","adsCd_auto","8","80");?></p>
            <h2>トップページ（カード型）</h2>
            <p class="p-admin_description">
              カード型記事一覧に溶け込むように、アドセンス広告を表示します。<br>
              この設定を行う場合、<a href="<?php echo get_template_directory_uri() . '/../../../wp-admin/options-reading.php'; ?>">「設定＞表示設定＞1ページに表示する最大投稿数」</a>を奇数に変更することを推奨します。
            </p>
            <p><?php echo  \Mytheme_Theme\Admin::add_textarea_html("アドセンスコード（カード型）","adsCd_top_card","8","80");?></p>
            <h2>もくじ上</h2>
            <p class="p-admin_description">もくじの上にアドセンス広告を表示します。もくじがない画面では表示されません。</p>
            <p><?php echo  \Mytheme_Theme\Admin::add_textarea_html("アドセンスコード（もくじ上）","adsCd_on_content_table","8","80");?></p>
            <h2>記事下</h2>
            <p class="p-admin_description">記事の下、コメントエリアの上にアドセンス広告を表示します。</p>
            <p><?php echo  \Mytheme_Theme\Admin::add_textarea_html("アドセンスコード（記事下）","adsCd_below_post","8","80");?></p>
          </div>
        </li>
    	</ul>
    </div>
    <p><input type="submit" name="save" value="<?php echo esc_attr( __('save','default')); ?>" class="button button-primary"></p>
  </form>
</main>
