/**
 * 見出ブロックの拡張
 *
 * @package mytheme
 */
const { assign } = lodash;
const { __ } = wp.i18n;
const { Fragment } = wp.element;
const { addFilter } = wp.hooks;
const {
	PanelBody,
	RadioControl
} = wp.components;

const {
	InspectorControls,
} = window.wp.editor;

const { createHigherOrderComponent } = wp.compose;

const isValidBlockType = ( name ) => {
	const validBlockTypes = [
		'core/heading',
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
			let selectOption = props.attributes.headingBorderSetting || '';

			return (
				<Fragment>
					<BlockEdit { ...props } />
					<InspectorControls>
						<PanelBody title="ボーダーの設定" initialOpen={ false } className="p-settings-heading__border">
							<RadioControl
								selected={ selectOption }
								options={ [
									{ label: '非表示',      value: 'p-heading-border-none' },
									{ label: '左に線を引く', value: 'p-heading-border-left' },
									{ label: '下に線を引く', value: 'p-heading-border-bottom' },
									//{ label: '下に線を引く（ツートンカラー）', value: 'mb-lg' },
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
										headingBorderSetting: changeOption
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
addFilter( 'editor.BlockEdit', 'myblock/block-control', addBlockControl );

/**
 * ブロック設定をフィルタリングする
 * @see addFilter('blocks.registerBlockType',$namespace,$func)
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#blocks-registerblocktype
 */
export function addAttribute( settings ) {
	if ( isValidBlockType( settings.name ) ) {
		settings.attributes = assign( settings.attributes, {
			headingBorderSetting: {
				type: 'string',
				default: 'p-heading-border-none',
			},
		} );
	}
	return settings;
}
addFilter( 'blocks.registerBlockType', 'myblock/add-attr', addAttribute );

/**
 * save関数のルート要素にプロパティ要素（classやid、styleなど）を追加する
 * @see addFilter('blocks.getSaveContent.extraProps',$namespace,$func)
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#blocks-getsavecontent-extraprops
 */
export function addSaveProps( extraProps, blockType, attributes ) {
	if ( isValidBlockType( blockType.name ) ) {
		// なしを選択した場合はheadingBorderSetting削除
		if (attributes.headingBorderSetting === '') {
			delete attributes.headingBorderSetting;
		}
	}
	return extraProps;
}
addFilter( 'blocks.getSaveContent.extraProps', 'myblock/add-props', addSaveProps );
