const { toggleFormat } = wp.richText;
const { ToolbarButton } = wp.components;

/**
 * @param {object} args args
 * @param {string} name name
 * @param {string} formatName format name
 * @returns {{onClick: onClick, icon: *, title: *, isActive: boolean}} toolbar button properties
 */
const getToolbarButtonProps = ( { args, name, formatName } ) => {
	return {
		icon: 'admin-customizer',
		title: <div className={ name }>
			{ name }
		</div>,
		onClick: () => {
			args.onChange( toggleFormat( args.value, {
				type: formatName,
			} ) );
		},
		isActive: args.isActive,
	};
};

/**
 * @param {object} args args
 * @param {string} name name
 * @param {string} formatName format name
 * @returns {*} toolbar button
 */
export const createToolbarButton = ( { args, name, formatName } ) => <ToolbarButton { ...getToolbarButtonProps( { args, name, formatName } ) } />;
