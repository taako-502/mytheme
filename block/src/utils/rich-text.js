const { Fragment } = wp.element;

import { PLUGIN_NAME } from '../constant';
import { MyDropdown, MyDropdownControls } from '../components';

/**
 * @param {string} name name
 * @param {number} index index
 * @param {function} create create component function
 * @param {object} setting setting
 * @returns {array} setting
 */
export const getRichTextSetting = ( { name, className, create, setting = {} }, index ) => {
	const formatName = PLUGIN_NAME + '/' + className;
	const component = args => <MyDropdownControls>
		{ create( { args, name, className, formatName } ) }
	</MyDropdownControls>;

	setting.title = setting.title || name;
	setting.tagName = setting.tagName || 'span';
	setting.className = setting.className || className;
	setting.edit = args => {
		if ( ! index ) {
			return <Fragment>
				{ component( args ) }
				<MyDropdown/>
			</Fragment>;
		}
		return component( args );
	};
	return [ formatName, setting ];
};
