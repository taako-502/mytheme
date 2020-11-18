import { registerBlockType } from '@wordpress/blocks';

registerBlockType( 'wdl/test-theme-block', {
  title: 'Test Theme Sample Block',
  icon: 'smiley',
  category: 'layout',
  key: ['test'],
  edit: () => <div>Hello Theme! (Edit)</div>,
  save: () => <div>Hello Theme! (Save)</div>,
} );
