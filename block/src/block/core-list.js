/**
 * core/listの拡張
 *
 * @package mytheme
 */
const { assign } = lodash;
const { __ } = wp.i18n;
const { Fragment } = wp.element;
const { addFilter } = wp.hooks;
const {
	PanelRow,
	PanelBody,
	RadioControl,
	ColorPalette
} = wp.components;

const {
	InspectorControls,
} = window.wp.editor;

const { createHigherOrderComponent } = wp.compose;

const isValidBlockType = ( name ) => {
	const validBlockTypes = [
		'core/list',
	];
	return validBlockTypes.includes( name );
};

/**
 * editコンポーネントを変更する
 * @see addFilter('editor.BlockEdit',$namespace,$func)
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#editor-blockedit
 */
export const addBlockControl = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		// isValidBlockType で指定したブロックが選択されたら表示
		if ( isValidBlockType( props.name ) && props.isSelected ) {
			// すでにオプション選択されていたら
			let selectOption = props.attributes.marginSetting || '';

			return (
				<Fragment>
					<BlockEdit { ...props } />
					<InspectorControls>
						<PanelBody
							title="背景色"
							initialOpen={true}
						>
							<PanelRow>
								<ColorPalette
									colors={ [
											{ name: 'white',  color: '#fff ' },
											{ name: 'orange', color: '#f0bc68' },
											{ name: 'green',  color: '#c4d7d1 ' },
											{ name: 'blue',   color: '#dde1f8 ' },
										 ] }
									//value={ attributes.color }
									//onChange={ ( color ) => setAttributes( { color } ) }
								/>
							</PanelRow>
						</PanelBody>
						<PanelBody title="マージン設定" initialOpen={ false } className="margin-controle">
							<RadioControl
								selected={ selectOption }
								options={ [
									{ label: 'なし', value: '' },
									{ label: '小', value: 'mb-sm' },
									{ label: '中', value: 'mb-md' },
									{ label: '大', value: 'mb-lg' },
								] }
								onChange={ ( changeOption ) => {
									let newClassName = changeOption;
									// 高度な設定で入力している場合は追加する
									if (props.attributes.className) {
										// 付与されているclassを取り出す
										let inputClassName = props.attributes.className;
										// スペース区切りを配列に
										inputClassName = inputClassName.split(' ');
										// 選択されていたオプションの値を削除
										let filterClassName = inputClassName.filter(function(name) {
											return name !== selectOption;
										});
										// 新しく選択したオプションを追加
										filterClassName.push(changeOption);
										// 配列を文字列に
										newClassName = filterClassName.join(' ');
									}

									selectOption = changeOption;
									props.setAttributes({
										className: newClassName,
										marginSetting: changeOption
									});
								} }
							/>
						</PanelBody>
					</InspectorControls>
				</Fragment>
			);
		}
		return <BlockEdit { ...props } />;
	};
}, 'addMyCustomBlockControls' );
addFilter( 'editor.BlockEdit', 'mytheme/block-control', addBlockControl );

/**
 * ブロック設定をフィルタリングする
 * @see addFilter('blocks.registerBlockType',$namespace,$func)
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#blocks-registerblocktype
 */
export function addAttribute( settings ) {
	if ( isValidBlockType( settings.name ) ) {
		return settings;
	}
	settings.attributes = assign( settings.attributes, {
		marginSetting: {
			type: 'string',
		},
		color: {
			type: 'string',
			default: '#FFFFFF'
		},
	});
	return settings;
}
addFilter( 'blocks.registerBlockType', 'mytheme/add-attr', addAttribute );

/**
 * save関数のルート要素にプロパティ要素（classやid、styleなど）を追加する
 * @see addFilter('blocks.getSaveContent.extraProps',$namespace,$func)
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#blocks-getsavecontent-extraprops
 */
export function addSaveProps( extraProps, blockType, attributes ) {
	if ( isValidBlockType( blockType.name ) ) {
		// なしを選択した場合はmarginSetting削除
		if (attributes.marginSetting === '') {
			delete attributes.marginSetting;
		}
		if (attributes.color === '') {
			delete attributes.color;
		}
	}
	return extraProps;
}
addFilter( 'blocks.getSaveContent.extraProps', 'mytheme/add-props', addSaveProps );
