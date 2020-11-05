<?php
/**
 * 記事詳細テンプレートをAMP専用テンプレートに切り替える処理
 * @param  [type] $single_template [description]
 * @return [type]                  [description]
 */
function change_amp_template($single_template){
    $change_template = $single_template;
    if(isset($_GET['amp']) && $_GET['amp'] == 1){
        $amp_template = locate_template('amp.php');
        if(!empty($amp_template)){
            $change_template = $amp_template;
        }

        add_filter( 'the_content', 'the_content_filter', 12 );
        function the_content_filter( $content ) {
          /* AMP用の投稿記事の処理 開始 */
          //投稿記事内の<img>を<amp-img>へ書き換え
          $content = preg_replace('/<img (.*?)>/i', '<amp-img $1></amp-img>', $content);
          $content = preg_replace('/<img (.*?) \/>/i', '<amp-img $1></amp-img>', $content);
          // border属性を削除
          $content = preg_replace('#\s+?border\s*=\s*[\"|\'].*?[\"|\']#i', '', $content);
          /* AMP用の投稿記事の処理 終了*/
          return $content;
        }
    }
    return $change_template;
}
add_filter('single_template', 'change_amp_template');

/**
 * linkタグにAMP用URLを記載
 * @return [type] [description]
 */
function amp_link_tag() {
  if(is_singular('post')) {
    echo '<link rel="amphtml" href="'.esc_url(get_permalink()).'?amp=1">'."\n";
  }
}
add_action('wp_head', 'amp_link_tag');

/**
 * アイキャッチ画像の<img>を<amp-img>へ書き換え
 * @param  [type] $html [description]
 * @return [type]       [description]
 */
function otherImg( $html ){
    $html = preg_replace('/<img/', '<amp-img layout="responsive"', $html);
    $html = $html.'</amp-img>';
    return $html;
}
add_filter( 'post_thumbnail_html', 'otherImg' );

/**
 * srcset属性の削除
 * @var [type]
 */
add_filter('wp_calculate_image_srcset_meta', '__return_null');
