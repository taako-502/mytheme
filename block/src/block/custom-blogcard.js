import { registerBlockType } from '@wordpress/blocks';
import { RichText } from '@wordpress/editor';

/**
 * 最新の投稿のリンクを表示するブロック
 * @param  {[type]} gutenberg [description]
 * @param  {[type]} title     [description]
 * @param  {[type]} icon      [description]
 * @param  {[type]} category  [description]
 * @param  {[type]} edit      [description]
 * @param  {[type]} posts     [description]
 * @return {[type]}           [description]
 */
registerBlockType( 'custom/blogcard', {
  title: 'Blog Card',
  icon: 'megaphone',
  category: 'widgets',
  keywords: ['blogcard','link','card'],
  attributes: {
    url_custom_blogcard: {
      source: 'html',
      selector: 'div',
    }
  },

  edit({ className , setAttributes , attributes }) {
    //const { attributes: { url_blogcard }, setAttributes } = props;
    return (
      <div class='p-blogcard__editor'>
        <p>内部リンクのURLを入力してください</p>
        <RichText
          tagName='div'
          onChange={ ( val ) => setAttributes( { url_blogcard: val } ) }
          value={ attributes.url_blogcard }
        />
      </div>
    );
  },
});
