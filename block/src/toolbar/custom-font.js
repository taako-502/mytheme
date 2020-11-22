/* リッチテキストエディタ */
const { registerFormatType } = wp.richText;

import { __ } from '@wordpress/i18n';
import { createToolbarButton, getRichTextSetting } from './../utils';


[ // メイリオ
  {  name: 'meirio', create: createToolbarButton,},
  //游ゴシック
	{	name: 'yugothic', create: createToolbarButton, },
  //游明朝
	{ name: 'yumincho', create: createToolbarButton,	},
].forEach( ( { name, create, setting = {} }, index ) =>
  registerFormatType( ...getRichTextSetting( { name, create, setting }, index ) ) );
