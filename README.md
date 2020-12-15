![MY THEME](https://user-images.githubusercontent.com/36348377/90158553-185b7280-ddca-11ea-827a-1b8d4d2f20dc.jpg)

# mytheme
本テーマのコンセプトです。
- SEO対策済
- モバイルフレンドリー

## デモサイト
https://www.mytheme.taako-biz.com/

## リポジトリ
テーマとブロックエディタのリポジトリについて。
- [テーマ本体](https://github.com/taako-502/mytheme)
- [ブロックエディタ（Gutenberg）](https://github.com/taako-502/mytheme-block)

## アーキテクチャ
- SCSS
  - BEM
  - FROCSS

<hr>

## 本テーマを作成するにあたって、参考にしたサイト
### WordPressテーマ開発の基礎
基礎的な部分は以下を参考にしました。

- [WORDPRESS Codex日本語版](https://wpdocs.osdn.jp/Main_Page)
- [【テーマ自作】WordPress オリジナルテーマの作り方と基本](https://webst8.com/blog/wordpress-theme-howto-make/)
- functions.phpファイルを分割する<br>
  https://wpqw.jp/wordpress/themes/functions-split/
- アナリティクストラッキングコード.phpの設置方法<br>
  https://ykgraph.com/happytrails/archives/17
- 画像のアップローダの実装<br>
  http://crea.tokyo/install_wp_media_into_front/
- 検索フォームの変更<br>
  https://plusers.net/wordpress_search
- [WordPressにメールフォームを自力で実装する](http://wordpress.ad5.jp/column/develop-mailform-for-wordpress/)

### ヘッダーの実装
ナビゲーションバーはliタグやaタグに適切なクラスを設定する必要があるのですが、ナビゲーションバーを表示するWordPressの標準メソッドにはその機能がないので詰まりました。以下の記事を見て何とか解決したので、参考になったらと思います。

- ナビバーの実装<br>
  [Navbar](https://getbootstrap.jp/docs/4.2/components/navbar/)
- liやidの無駄なクラスを削除<br>
  [WordPress : カスタムメニューの\<li\>タグのムダなid/classを除去する](https://hacknote.jp/archives/36137/)
- liタグにクラスを追加<br>
  [wp_nav_menuのli要素にclassを追加する](https://nldot.info/add-class-to-the-li-element-of-the-wp_nav_menu/)
- aタグにクラスを追加<br>
  [WordPressのカスタムメニューのaタグに任意のクラスを付ける:メモ](https://webutubutu.com/webdesign/3692)

## フック関連
### エディタのサイドバーなどに、フォームを追加<br>
- [「使いやすい」と言われたい！WordPressの編集画面にメタボックスを追加する方法](https://www.webprofessional.jp/adding-meta-boxes-post-types-wordpress/)

### ダッシュボードについて
- [ダッシュボードウィジェット API](https://wpdocs.osdn.jp/%E3%83%80%E3%83%83%E3%82%B7%E3%83%A5%E3%83%9C%E3%83%BC%E3%83%89%E3%82%A6%E3%82%A3%E3%82%B8%E3%82%A7%E3%83%83%E3%83%88_API)

## マークアップについて
- [SEOに重要な全HTMLタグと構造化マークアップテンプレート](https://www.cloudeffects.com/seo/html-structured-markup)

## スタイルシートについて
- CSSアーキテクチャについて
  - [FLOCSS](https://github.com/hiloki/flocss)
  - [BEM(MindBEMding)によるCSS設計](https://github.com/manabuyasuda/styleguide/blob/master/how-to-bem.md)
- デザインについて
  - [CSSのコピペだけ！おしゃれな見出しのデザイン例まとめ68選](https://saruwakakun.com/html-css/reference/h-design)
  - [コピペで使えるリストデザイン34選：CSSで箇条書きをおしゃれに](https://saruwakakun.com/html-css/reference/ul-ol-li-design)
  - [CSSで作る！魅力的な引用デザインのサンプル30（blockquote）](https://saruwakakun.com/html-css/reference/blockquote)
  - [コピペでできる！CSSとhtmlだけのシンプルなタブ切り替え2種](https://copypet.jp/1027/)
- SCSSについて
  - [https://qiita.com/one-a/items/2758511326c09200fded](https://qiita.com/one-a/items/2758511326c09200fded)

### コメントルール
[【PhpDoc】コメントの書き方のまとめ](https://blog.flavacube.com/2010/04/%E3%80%90phpdoc%E3%80%91%E3%82%B3%E3%83%A1%E3%83%B3%E3%83%88%E3%81%AE%E6%9B%B8%E3%81%8D%E6%96%B9%E3%81%AE%E3%81%BE%E3%81%A8%E3%82%81/)

## テーマのリリースについて
PUC([plugin-update-checker](https://github.com/YahnisElsts/plugin-update-checker))を使用して、プラグインの自動更新を行う。

<hr>

## twitter
https://twitter.com/taakobiz

## TAAKOのブログ
https://taako-biz.com/
