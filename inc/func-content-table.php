<?php
/**
 * もくじの自動挿入
 * @param  [type] $the_content [description]
 * @return [type]              [description]
 */
function insert_table_of_contents($the_content){
  if (is_single()) {  //投稿ページの場合
    $tag = '/^<h[2-6].*?>(.+?)<\/h[2-6]>$/im'; //見出しタグの検索パターン
    if (preg_match_all($tag, $the_content, $tags)) { //本文中に見出しタグが含まれていれば
      $idpattern = '/id *\= *["\'](.+?)["\']/i'; //見出しタグにidが定義されているか検索するパターン
      $table_of_contents = '
      <div class="p-content-table">
        <p class="p-content-table--title">目次</p>
        <ul>';
      $idnum = 1;
      $nest = 0;
      $nestTag = array();
      for ($i = 0 ; $i < count($tags[0]) ; $i++) {
        if (! preg_match_all($idpattern, $tags[0][$i], $idstr)) {
          //見出しタグにidが定義されていない場合、「autoid_1」のようなidを自動設定
          $idstr[1][0] = 'autoid_'.$idnum++;
          $the_content = preg_replace("/".str_replace('/', '\/', $tags[0][$i])."/", preg_replace('/(^<h[2-6])/i', '${1} id="' . $idstr[1][0] . '" ', $tags[0][$i]), $the_content, 1);
        }
        //見出しへのリンクを目次に追加。<li>でリスト形式に。
        $table_of_contents .= '<li><a href="#' . $idstr[1][0] . '">' . $tags[1][$i] .'</a>';

        //見出しのネスト対応
        if ($i+1 >= count($tags[0])) {
          $table_of_contents .= '</li>';
        } else {
          preg_match_all('/^<h([2-6])/i', $tags[0][$i], $match1);
          preg_match_all('/^<h([2-6])/i', $tags[0][$i+1], $match2);
          if ($match1[1][0] < $match2[1][0]) {
            $table_of_contents .= '<ul>';
            $nestTag[] = $match1[1][0];
            $nest++;
          } elseif ($match1[1][0] == $match2[1][0]) {
            $table_of_contents .= '</li>';
          } else {
            while (count($nestTag) > 0 && $nestTag[count($nestTag)-1] >= $match2[1][0]) {
              $table_of_contents .= '</li></ul>';
              array_splice($nestTag, count($nestTag)-1, 1);
              $nest--;
            }
            $table_of_contents .= '</li>';
          }
        }
      }

      //入れ子のまま終わった時<ul>を閉じる
      for (; $nest > 0 ; $nest--) {
        $table_of_contents .= '</ul></li>';
      }

      $table_of_contents .= '</ul></div>'; //目次の各タグを閉じる

      if ($tags[0][0]) {
        //作った目次を、1番目の見出しタグの直前に追加
        $the_content = preg_replace('/(^<h[2-6].*?>.+?<\/h[2-6]>$)/im', $table_of_contents.'${1}', $the_content, 1);
      }
    }
  }
  return $the_content;
}
add_filter('the_content', 'insert_table_of_contents');
