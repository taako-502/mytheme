/**
 * 見出ブロックの拡張
 *
 * @package mytheme
 */
import {
	PanelBody,
	RadioControl,
	RangeControl
} from '@wordpress/components';

const { assign } = lodash;
const { __ } = wp.i18n;
const { Fragment } = wp.element;
const { addFilter } = wp.hooks;

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
						<RangeControl
							label="ボーダーと見出しの距離（em）"
							value={ props.attributes.headingBorderPaddingSetting }
							min={ 0 }
							max={ 3 }
							step={ 0.05 }
							initialPosition={ 0.1 }
							allowReset={ true }
							onChange={ ( distance ) => {
								props.setAttributes({
									headingBorderPaddingSetting: distance
								});
							} }
						/>
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
			headingBorderPaddingSetting: {
				type: 'integer',
				default: '0.1',
			},
		} );
	}
	return settings;
}
addFilter( 'blocks.registerBlockType', 'myblock/add-attr', addAttribute );

/**
 * save関数のルート要素にプロパティ要素（classやid、styleなど）を追加する
 * @param object   props      プロパティ
 * @param object   blockType  ブロックのタイプ
 * @param object   attributes 属性
 * @see addFilter('blocks.getSaveContent.extraProps',$namespace,$func)
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#blocks-getsavecontent-extraprops
 */
export function addSaveProps( props, blockType, attributes ) {
	const headingBorderSetting = attributes.headingBorderSetting;
	if ( isValidBlockType( blockType.name ) ) {
		// なしを選択した場合はheadingBorderSetting削除
		if (headingBorderSetting === '') {
			delete attributes.headingBorderSetting;
		}
	}
	//スタイルシートの設定
	const headingBorderPaddingSetting = attributes.headingBorderPaddingSetting;
	if('p-heading-border-left' === headingBorderSetting){
		props = lodash.assign( props, { style: { paddingLeft: headingBorderPaddingSetting + "em" } });
	} else if('p-heading-border-bottom' === headingBorderSetting) {
		props = lodash.assign( props, { style: { paddingBottom: headingBorderPaddingSetting + "em" } });
	}
	return props;
}
addFilter( 'blocks.getSaveContent.extraProps', 'myblock/add-props', addSaveProps );
