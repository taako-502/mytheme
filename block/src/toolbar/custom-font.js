/* リッチテキストエディタ */
const { registerFormatType } = wp.richText;

import { createToolbarButton, getRichTextSetting } from './../utils';

[ { name: 'a', create: createToolbarButton,},
	{	name: 'b', create: createToolbarButton, },
	{ name: 'c', create: createToolbarButton,	},
].forEach( ( { name, create, setting = {} }, index ) =>
  registerFormatType( ...getRichTextSetting( { name, create, setting }, index ) ) );
