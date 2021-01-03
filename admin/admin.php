<?php
include 'admin-init.php';
?>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/css/admin.css'); ?>">
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri() . '/js/admin.js'); ?>"></script>
<main>
  <h1>mythemeカスタマイズ画面</h1>
  <h2>画面説明</h2>
  <p>この画面は、簡単にmythemeのデザインを設定できる画面です。</p>
  <form method="post">
    <div class="cp_tab">
    	<input type="radio" name="cp_tab" id="tab2_1" aria-controls="first_tab02" checked>
    	<label for="tab2_1">文字</label>
    	<input type="radio" name="cp_tab" id="tab2_2" aria-controls="second_tab02">
    	<label for="tab2_2">SEO</label>
    	<input type="radio" name="cp_tab" id="tab2_3" aria-controls="third_tab02">
    	<label for="tab2_3">サイト回遊</label>
    	<input type="radio" name="cp_tab" id="tab2_4" aria-controls="force_tab02">
    	<label for="tab2_4">Force Tab</label>
    	<div class="cp_tabpanels">
    		<div class="cp_tabpanel">
      		<h2>基本設定</h2>
      		<p>文字の設定</p>
          <div class="setting">
            <h3>PC閲覧時（980px～）</h3>
            <p class="fontsize"><b>pタグ&ensp;&emsp;</b><input type="number" name="pc-p-size" value="<?php echo $pc_psize; ?>" placeholder="<?php echo $pc_psize_def; ?>"> px</p>
            <p class="fontsize"><b>h1タグ&emsp;</b><input type="number" name="pc-h1-size" value="<?php echo $pc_h1size; ?>" placeholder="<?php echo $pc_h1size_def; ?>"> px</p>
            <p class="fontsize"><b>h2タグ&emsp;</b><input type="number" name="pc-h2-size" value="<?php echo $pc_h2size; ?>" placeholder="<?php echo $pc_h2size_def; ?>"> px</p>
            <p class="fontsize"><b>h3タグ&emsp;</b><input type="number" name="pc-h3-size" value="<?php echo $pc_h3size; ?>" placeholder="<?php echo $pc_h3size_def; ?>"> px</p>
            <p class="fontsize"><b>h4タグ&emsp;</b><input type="number" name="pc-h4-size" value="<?php echo $pc_h4size; ?>" placeholder="<?php echo $pc_h4size_def; ?>"> px</p>
            <p class="fontsize"><b>h5タグ&emsp;</b><input type="number" name="pc-h5-size" value="<?php echo $pc_h5size; ?>" placeholder="<?php echo $pc_h5size_def; ?>"> px</p>
            <p class="fontsize"><b>h6タグ&emsp;</b><input type="number" name="pc-h6-size" value="<?php echo $pc_h6size; ?>" placeholder="<?php echo $pc_h6size_def; ?>"> px</p>
          </div>
          <div class="setting">
            <h3>タブレット閲覧時（768px～979px）</h3>
            <p class="fontsize"><b>pタグ&ensp;&emsp;</b><input type="number" name="tb-p-size" value="<?php echo $tb_psize; ?>" placeholder="<?php echo $tb_psize_def; ?>"> px</p>
            <p class="fontsize"><b>h1タグ&emsp;</b><input type="number" name="tb-h1-size" value="<?php echo $tb_h1size; ?>" placeholder="<?php echo $tb_h1size_def; ?>"> px</p>
            <p class="fontsize"><b>h2タグ&emsp;</b><input type="number" name="tb-h2-size" value="<?php echo $tb_h2size; ?>" placeholder="<?php echo $tb_h2size_def; ?>"> px</p>
            <p class="fontsize"><b>h3タグ&emsp;</b><input type="number" name="tb-h3-size" value="<?php echo $tb_h3size; ?>" placeholder="<?php echo $tb_h3size_def; ?>"> px</p>
            <p class="fontsize"><b>h4タグ&emsp;</b><input type="number" name="tb-h4-size" value="<?php echo $tb_h4size; ?>" placeholder="<?php echo $tb_h4size_def; ?>"> px</p>
            <p class="fontsize"><b>h5タグ&emsp;</b><input type="number" name="tb-h5-size" value="<?php echo $tb_h5size; ?>" placeholder="<?php echo $tb_h5size_def; ?>"> px</p>
            <p class="fontsize"><b>h6タグ&emsp;</b><input type="number" name="tb-h6-size" value="<?php echo $tb_h6size; ?>" placeholder="<?php echo $tb_h6size_def; ?>"> px</p>
          </div>
          <div class="setting">
            <h3>スマートフォン閲覧時(~768px)</h3>
            <p class="fontsize"><b>pタグ&ensp;&emsp;</b><input type="number" name="sm-p-size" value="<?php echo $sm_psize; ?>" placeholder="<?php echo $sm_psize_def; ?>"> px</p>
            <p class="fontsize"><b>h1タグ&emsp;</b><input type="number" name="sm-h1-size" value="<?php echo $sm_h1size; ?>" placeholder="<?php echo $sm_h1size_def; ?>"> px</p>
            <p class="fontsize"><b>h2タグ&emsp;</b><input type="number" name="sm-h2-size" value="<?php echo $sm_h2size; ?>" placeholder="<?php echo $sm_h2size_def; ?>"> px</p>
            <p class="fontsize"><b>h3タグ&emsp;</b><input type="number" name="sm-h3-size" value="<?php echo $sm_h3size; ?>" placeholder="<?php echo $sm_h3size_def; ?>"> px</p>
            <p class="fontsize"><b>h4タグ&emsp;</b><input type="number" name="sm-h4-size" value="<?php echo $sm_h4size; ?>" placeholder="<?php echo $sm_h4size_def; ?>"> px</p>
            <p class="fontsize"><b>h5タグ&emsp;</b><input type="number" name="sm-h5-size" value="<?php echo $sm_h5size; ?>" placeholder="<?php echo $sm_h5size_def; ?>"> px</p>
            <p class="fontsize"><b>h6タグ&emsp;</b><input type="number" name="sm-h6-size" value="<?php echo $sm_h6size; ?>" placeholder="<?php echo $sm_h6size_def; ?>"> px</p>
          </div>
          <div class="setting">
            <h2>トップ</h2>
            <div>
              <h3>トップページのおすすめ記事に設定する画像</h3>
              <p><b>左おすすめ記事</b></p>
              <p><label for="reco-left-img">画像URL：</label><?php generate_upload_image_tag('reco-left-img', $recoleftimg); ?></p>
              <p><label for="reco-left-url">記事URL：</label><input type="text" name="reco-left-url" value="<?php echo $recolefturl; ?>"></p>
              <p><b>中央おすすめ記事</b></p>
              <p><label for="reco-center-img">画像URL：</label><?php generate_upload_image_tag('reco-center-img', $recocenterimg); ?></p>
              <p><label for="reco-center-url">記事URL：</label><input type="text" name="reco-center-url" value="<?php echo $recocenterurl; ?>"></p>
              <p><b>右おすすめ記事</b></p>
              <p><label for="reco-right-img">画像URL：</label><?php generate_upload_image_tag('reco-right-img', $recorightimg); ?></p>
              <p><label for="reco-right-url">記事URL：</label><input type="text" name="reco-right-url" value="<?php echo $recorighturl; ?>"></p>
            </div>
          </div>
    		</div>
    		<div class="cp_tabpanel">
      		<h2>SEO</h2>
      		<p>Second Tab text</p>
          <div class="setting">
            <h2>フッター</h2>
            <div>
              <p><label for="copyright">Copyright<br>
              </label><textarea id="copyright" name="copyright" cols="40"><?php echo $copyright; ?></textarea>
            </P>
            </div>
            <div class="setting">
              <h2>アナリティクス</h2>
              <label for="analytics">トラッキングコード：</label><input id="analytics" type="text" name="analytics" value="<?php echo $analytics ?>">
              <h2>タグマネージャ</h2>
              <label for="gtm-id">Googleタグマネージャ：</label><input id="gtm-id" type="text" name="gtm-id" value="<?php echo $gtmId ?>">
            </div>
          </div>
          <div class="setting">
            <h2>OGP設定</h2>
            <h3>facebook</h3>
            <p><label for="ogp-fb-adminid">管理者ID</label><input id="ogp-fb-adminid" type="text" name="ogp-fb-adminid" value="<?php echo $ogpFbAdminId; ?>"></p>
            <p><label for="ogp-fb-appid">アプリID</label><input id="ogp-fb-appid" type="text" name="ogp-fb-appid" value="<?php echo $ogpFbAppId; ?>"></p>
            <p><label for="ogp-fb-img-article">投稿ページ／記事ページ用デフォルトOGP画像</label><?php generate_upload_image_tag('ogp-fb-img-article', $ogpFbImgArticle); ?></p>
            <p><label for="ogp-fb-img-top">投稿ページ／記事ページ以外用デフォルトOGP画像</label><?php generate_upload_image_tag('ogp-fb-img-top', $ogpFbImgTop); ?></p>
          </div>
    		</div>
    		<div class="cp_tabpanel">
      		<h2>サイト回遊</h2>
      		<p>サイトの回遊率を向上させる設定。</p>
          <div class="setting">
            <h2>関連記事</h2>
            <p>
              <lavel for="relevance--select">関連性</lavel>
              <select id="relevance--select" class="relevance--select" name="relevance">
                <option value="category">カテゴリ</option>
                <option value="tag">タグ</option>
                <option value="url">記事指定（４記事）</option>
              </select>
            </p>
            <div class="setting__detail relevance__url">
              <p><lavel for="relevance--url1">関連記事①</lavel><input id="relevance--url1" type="text" name="relevance-url1"></p>
              <p><lavel for="relevance--url2">関連記事②</lavel><input id="relevance--url2" type="text" name="relevance-url2"></p>
              <p><lavel for="relevance--url3">関連記事③</lavel><input id="relevance--url3" type="text" name="relevance-url3"></p>
              <p><lavel for="relevance--url4">関連記事④</lavel><input id="relevance--url4" type="text" name="relevance-url4"></p>
            </div>
          </div>
    		</div>
    		<div class="cp_tabpanel">
      		<h2>Force Tab</h2>
      		<p>Force Tab text</p>
    		</div>
    	</div>
    </div>
    <p><input type="submit" name="save" value="<?php echo esc_attr( __('save','default')); ?>" class="button button-primary"></p>
  </form>
</main>
