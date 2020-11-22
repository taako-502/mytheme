/* リッチテキストエディタ */
const { registerFormatType } = wp.richText;

import { __ } from '@wordpress/i18n';
import { createToolbarButton, getRichTextSetting } from './../utils';


[ {  name: 'メイリオ', className:'meirio', create: createToolbarButton,},
	{	name: '游ゴシック', className:'yu-gothic', create: createToolbarButton, },
	{ name: '游明朝', className:'yu-mincho', create: createToolbarButton,	},
].forEach( ( { name, className ,create, setting = {} }, index ) =>
  registerFormatType(
    ...getRichTextSetting( { name, className, create, setting }, index )
  )
);
