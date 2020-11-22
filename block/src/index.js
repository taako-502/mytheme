/**
 * Gutenberg Blocks
 *
 * All blocks related JavaScript files should be imported here.
 * You can create a new block folder in this dir and include code
 * for that block here as well.
 *
 * All blocks should be included here since this is the file that
 * Webpack is compiling as the input file.
 */

import './block/custom-lastpost.js';
import './block/custom-blogcard.js';
import './block/custom-speechballoon.js';
import './block/custom-box.js';
import './block/test.js';



/* リッチテキストエディタ */
const { registerFormatType } = wp.richText;

import { createToolbarButton, getRichTextSetting } from './utils';

[
	{
		name: 'test1',
		create: createToolbarButton,
	},
	{
		name: 'test2',
		create: createToolbarButton,
	},
	{
		name: 'test3',
		create: createToolbarButton,
	},
].forEach( ( { name, create, setting = {} }, index ) => registerFormatType( ...getRichTextSetting( { name, create, setting }, index ) ) );
