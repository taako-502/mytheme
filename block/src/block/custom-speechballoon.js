import { registerBlockType } from '@wordpress/blocks';

import { __ } from '@wordpress/i18n';
import {
	RichText,
	InspectorControls,
} from '@wordpress/editor';
import {
  PanelBody,
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
      selector: 'p-balloon__speech',
    },
		name:{
			source: 'html',
			selector: 'p.p-balloon__name'
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
      </React.Fragment>
    );
  },
  save({ attributes }) {
    return (
			<div class="p-balloon">
				<div class="p-balloon__people">
					<img src="#" />
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
