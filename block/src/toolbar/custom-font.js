/* リッチテキストエディタ */
const { registerFormatType } = wp.richText;

import { __ } from '@wordpress/i18n';
import { createToolbarButton, getRichTextSetting } from './../utils';


[ // メイリオ
  {  name: 'meirio', className:'meirio', create: createToolbarButton,},
  //游ゴシック
	{	name: 'yugothic', className:'yu-gothic', create: createToolbarButton, },
  //游明朝
	{ name: 'yumincho', className:'yu-mincho', create: createToolbarButton,	},
].forEach( ( { name, className ,create, setting = {} }, index ) =>
  registerFormatType(
    ...getRichTextSetting( { name, className, create, setting }, index )
  )
);
