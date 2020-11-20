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
registerBlockType('custom/speechballoon',{
  title: 'Speech Balloons',
  description:  'ふきだしです。',
  icon: 'testimonial',
  category: 'layout',
  keywords: ['speechballoon','speechbubbles','speech','balloon','bubbles'],
  attributes:{
    content: {
      source: 'html',
      selector: 'p',
    },
  },
  edit({ className , setAttributes , attributes }) {
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
