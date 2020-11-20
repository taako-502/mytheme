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
    speech: {
      source: 'html',
      selector: 'p',
    },
		name:{
			source: 'html',
			selector: 'p'
		}
  },
  edit({ className , setAttributes , attributes }) {
    return (
      <React.Fragment>
        <InspectorControls>
          <PanelBody
            title="背景色"
            initialOpen={true}
          >
          </PanelBody>
        </InspectorControls>
				<div class="p-balloon">
					<div class="p-balloon__people">
						<img src="#" />
						<p>text</p>
					</div>
					<div class="p-balloon__tail">
						<span />
						<span />
						<span />
					</div>
					<div class="p-balloon__speech">
		        <RichText
		          tagName='p'
		          className={ className }
		          style={{ background:attributes.color }}
		          onChange={ ( content ) => setAttributes( { content } ) }
		          value={ attributes.content }
		        />
					</div>
				</div>
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
