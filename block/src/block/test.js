import { registerBlockType } from '@wordpress/blocks';
import { MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';
//import './editor.scss';
//import './style.scss';

registerBlockType( 'wdl/my-images', {
  title: 'My Images',
  description: 'Example block written with ESNext',
  category: 'widgets',
  icon: 'smiley',
  keywords: ['test'],
  //属性を設定
  attributes: {
    //MediaUpload の value の値
    mediaID: {
      type: 'number',
      default: 0
    },
    //img の src に指定する URL
    imageUrl: {
      type: 'string',
      source: 'attribute',
      attribute: 'src',
      selector: '.card_image'
    },
    //img の alt 属性の値
    imageAlt: {
      type: 'string',
      source: 'attribute',
      attribute: 'alt',
      selector: '.card_image'
    },
  },

  edit: ( props ) => {
    //分割代入を使って props 経由でプロパティを変数に代入
    const { className, attributes, setAttributes} = props;

    //選択された画像の情報（alt 属性、URL、ID）を更新する関数
    const onSelectImage = ( media ) => {
      setAttributes( {
        imageAlt: media.alt,
        imageUrl: media.url,
        mediaID: media.id
      } );
    };

    //メディアライブラリを開くボタンをレンダリングする関数
    const getImageButton = ( open ) => {
      if(attributes.imageUrl) {
        return (
          <img
            src={ attributes.imageUrl }
            onClick={ open }
            className="image"
            alt=""
          />
        );
      }
      else {
        return (
          <div className="button-container">
            <Button
              onClick={ open }
              className="button button-large"
            >
              画像をアップロード
            </Button>
          </div>
        );
      }
    };

    //画像を削除する（メディアをリセットする）関数
    const removeMedia = () => {
      setAttributes({
        mediaID: 0,
        imageUrl: '',
        imageAlt: ''
      });
    }

    return (
      <div className={ className }>
        <MediaUploadCheck>
          <MediaUpload
            onSelect={ onSelectImage }
            allowedTypes={ ['image'] }
            value={ attributes.mediaID }
            render={ ({ open }) => getImageButton( open ) }
          />
        </MediaUploadCheck>
        { attributes.mediaID != 0  &&
          <MediaUploadCheck>
            <Button
              onClick={removeMedia}
              isLink
              isDestructive
              className="removeImage">画像を削除
            </Button>
          </MediaUploadCheck>
        }
      </div>
    );
  },
  save: ( { attributes } ) => {
    //画像をレンダリングする関数
    const getImagesSave = (src, alt) => {
      if(!src) return null;
      if(alt) {
        return (
          <img
            className="card_image"
            src={ src }
            alt={ alt }
          />
        );
      }
      return (
        <img
          className="card_image"
          src={ src }
          alt=""
          aria-hidden="true"
        />
      );
    };

    return (
      <div className="card">
        { getImagesSave(attributes.imageUrl, attributes.imageAlt) }
      </div>
    );
  },
} );
