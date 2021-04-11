/**
 * boxブロック
 *
 * @package mytheme
 */
import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';

import { __ } from '@wordpress/i18n';
import {
	RichText,
	InspectorControls,
} from '@wordpress/editor';
import {
  PanelBody,
  PanelRow,
  ToggleControl,
  SelectControl,
  CheckboxControl,
  RadioControl,
  ColorPicker,
  ColorPalette
} from '@wordpress/components';

/**
 * ボックスブロック追加
 * @type {String}
 */
registerBlockType('custom/box',{
  title: 'box',
  description:  'ボックスレイアウトです。',
  icon: 'admin-page',
  category: 'layout',
  keywords: ['box',],
  attributes:{
    content: {
      //type: 'string',
      source: 'html',
      selector: 'p',
    },
    //カラーピッカー用
    color: {
      type: 'string',
      default: '#FFFFFF'
    },
  },
  edit({ className , setAttributes , attributes }) {
    const blockProps = useBlockProps({
      className: `${className}`,
      //style: {{ background: attributes.color }},
    });
    const colors = [
        { name: 'red', color: '#f00' },
        { name: 'white', color: '#fff' },
        { name: 'blue', color: '#00f' },
       ];
    return (
      <React.Fragment>
        <InspectorControls>
          <PanelBody
            title="背景色"
            initialOpen={true}
          >
            <PanelRow>
              <ColorPalette
                colors={ [
                    { name: 'white', color: '#fff ' },
                    { name: 'orange', color: '#f0bc68' },
                    { name: 'green', color: '#c4d7d1 ' },
                    { name: 'blue', color: '#dde1f8 ' },
                   ] }
                value={ attributes.color }
                onChange={ ( color ) => setAttributes( { color } ) }
              />
            </PanelRow>
          </PanelBody>
        </InspectorControls>
        <div
          { ...blockProps }
          style={{ background:attributes.color }}
        >
          <InnerBlocks />
        </div>
      </React.Fragment>
    );
  },
  save({ attributes }) {
    const blockProps = useBlockProps.save();

    return (
      <div
        { ...blockProps }
        style={{ background:attributes.color }}
      >
        <InnerBlocks.Content />
      </div>
    );
  }
} );
