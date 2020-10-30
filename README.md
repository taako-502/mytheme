![MY THEME](https://user-images.githubusercontent.com/36348377/90158553-185b7280-ddca-11ea-827a-1b8d4d2f20dc.jpg)

# mytheme
アフィ○ガーJET風のトップページです。

## デモサイト
https://www.mytheme.taako-biz.com/

## twitter
https://twitter.com/taakobiz

## TAAKOのブログ
https://taako-biz.com/

## 本テーマを作成するにあたって、参考にしたサイト
### WordPressテーマ開発の基礎
基礎的な部分は以下を参考にしました。

WORDPRESS Codex日本語版<br>
https://wpdocs.osdn.jp/Main_Page

【テーマ自作】WordPress オリジナルテーマの作り方と基本<br>
https://webst8.com/blog/wordpress-theme-howto-make/

functions.phpファイルを分割する<br>
https://wpqw.jp/wordpress/themes/functions-split/

アナリティクストラッキングコード.phpの設置方法<br>
https://ykgraph.com/happytrails/archives/17

画像のアップローダの実装<br>
http://crea.tokyo/install_wp_media_into_front/

検索フォームの変更<br>
https://plusers.net/wordpress_search

### ヘッダーの実装
ナビゲーションバーはliタグやaタグに適切なクラスを設定する必要があるのですが、ナビゲーションバーを表示するWordPressの標準メソッドにはその機能がないので詰まりました。以下の記事を見て何とか解決したので、参考になったらと思います。

ナビバーの実装<br>
https://getbootstrap.jp/docs/4.2/components/navbar/

liやidの無駄なクラスを削除<br>
https://hacknote.jp/archives/36137/

liタグにクラスを追加<br>
https://nldot.info/add-class-to-the-li-element-of-the-wp_nav_menu/

aタグにクラスを追加<br>
https://webutubutu.com/webdesign/3692

### ダッシュボードについて
ダッシュボードウィジェット API<br>
https://wpdocs.osdn.jp/%E3%83%80%E3%83%83%E3%82%B7%E3%83%A5%E3%83%9C%E3%83%BC%E3%83%89%E3%82%A6%E3%82%A3%E3%82%B8%E3%82%A7%E3%83%83%E3%83%88_API

### SEOについて
#### 構造化マークアップ
- 記事の情報を構造化
  [WordPress 構造化データを動的に出力する方法](https://hirashimatakumi.com/blog/3192.html)
- パンくずリストの参考にした記事<br>
  ⇒[WordPressで構造化データ用のパンくずを生成する](https://gimmicklog.com/wordpress/810/)

## エディタについて
エディタのサイドバーなどに、フォームを追加<br>
[「使いやすい」と言われたい！WordPressの編集画面にメタボックスを追加する方法](https://www.webprofessional.jp/adding-meta-boxes-post-types-wordpress/)

### CSSデザインについて
#### 見出し
https://saruwakakun.com/html-css/reference/h-design

#### リスト
https://saruwakakun.com/html-css/reference/ul-ol-li-design

#### 引用
https://saruwakakun.com/html-css/reference/blockquote

### コメントルール
[【PhpDoc】コメントの書き方のまとめ](https://blog.flavacube.com/2010/04/%E3%80%90phpdoc%E3%80%91%E3%82%B3%E3%83%A1%E3%83%B3%E3%83%88%E3%81%AE%E6%9B%B8%E3%81%8D%E6%96%B9%E3%81%AE%E3%81%BE%E3%81%A8%E3%82%81/)

## テストについて
### 構造化マークアップのテスト
- [リッチリザルトテスト](https://search.google.com/test/rich-results)
- [構造化データのテスト](https://search.google.com/structured-data/testing-tool/u/0/)

### OGP
- twitter<br>
  [Twitterカードの確認](https://cards-dev.twitter.com/validator)
- facebook<br>
  [FACEBOOK DEVELOPERS シェアデバッガー](https://developers.facebook.com/tools/debug/)

### リリース方法
テーマのアップデート方法<br>
https://nobuntu.jp/wordpress-add-theme-update-checker/
