import { registerBlockType } from '@wordpress/blocks';

import { __ } from '@wordpress/i18n';
import {
  RichText,
  InspectorControls,
} from '@wordpress/editor';
import {
  PanelBody,
} from '@wordpress/components';

import { MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';


/**
 * ボックスブロック追加
 * @type {String}
 */
registerBlockType('custom/speechballoon',{
  title: 'Speech Balloons',
  description:  'ふきだしです。',
  icon: 'testimonial',
  category: 'layout',
  keywords: ['speechballoon','speechbubbles','speech','balloon','bubbles'],
  attributes:{
    speech: {
      source: 'html',
      selector: 'p-balloon__speech',
    },
    name:{
      source: 'html',
      selector: 'p.p-balloon__name'
    },
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
      selector: '.p-balloon__img'
    },
    //img の alt 属性の値
    imageAlt: {
      type: 'string',
      source: 'attribute',
      attribute: 'alt',
      selector: '.p-balloon__img'
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
            className="p-balloon__img"
            alt=""
          />
        );
      } else {
        return (
          <div className="button-container">
            <Button
              onClick={ open }
              className="p-balloon__btn"
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
      <div class="p-balloon">
        <div class="p-balloon__people">
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
          <RichText
            tagName='p'
            className='p-balloon__name'
            default='name'
            onChange={ ( name ) => setAttributes( { name } ) }
            value={ attributes.name }
          />
        </div>
      <div class="p-balloon__tail">
        <span />
        <span />
        <span />
      </div>
      <RichText
        tagName='p'
        className='p-balloon__speech'
        onChange={ ( speech ) => setAttributes( { speech } ) }
        value={ attributes.speech }
      />
      </div>
    );
  },
  save({ attributes }) {
    //画像をレンダリングする関数
    const getImagesSave = (src, alt) => {
      if(!src) return null;
      if(alt) {
        return (
          <img
            className="p-balloon__img"
            src={ src }
            alt={ alt }
          />
        );
      }
      return (
        <img
          className="p-balloon__img"
          src={ src }
          alt=""
          aria-hidden="true"
        />
      );
    };

    return (
      <div class="p-balloon">
        <div class="p-balloon__people">
          { getImagesSave(attributes.imageUrl, attributes.imageAlt) }
          <RichText.Content
            tagName='p'
            className='p-balloon__name'
            value={ attributes.name }
          />
        </div>
        <div class="p-balloon__tail">
          <span />
          <span />
          <span />
        </div>
        <RichText.Content
          tagName='p'
          className='p-balloon__speech'
          value={ attributes.speech }
        />
      </div>
    );
  }
} );
