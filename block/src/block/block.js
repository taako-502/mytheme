/**
 * BLOCK: mytheme-block
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

import { registerBlockType } from '@wordpress/blocks';

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
    //const { content, checkboxField, radioField, textField, toggleField, selectField } = attributes;
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
                    { name: 'red', color: '#f00' },
                    { name: 'white', color: '#fff' },
                    { name: 'blue', color: '#00f' },
                   ] }
                value={ attributes.color }
                onChange={ ( color ) => setAttributes( { color } ) }
              />
            </PanelRow>
          </PanelBody>
        </InspectorControls>
        <RichText
          tagName='p'
          className={ className }
          style={{ background:attributes.color }}
          onChange={ ( content ) => setAttributes( { content } ) }
          value={ attributes.content }
        />
      </React.Fragment>
    );
  },
  save({ attributes }) {
    return (
      <RichText.Content
        tagName='p'
        style={{ background:attributes.color }}
        value={ attributes.content }
      />
    );
  }
} );
