/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss';

/**
 * Internal dependencies
 */
import Edit from './edit';
import save from './save';
import metadata from './block.json';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType(metadata.name, {
	icon: {
		src: <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
			<rect x="3.5" y="3.5" width="33" height="33" rx="3.5" fill="white" stroke="#005E87" stroke-width="3" />
			<rect x="11" y="1" width="17" height="38" rx="2" fill="white" stroke="black" stroke-width="1.5" />
			<path d="M14 22H25" stroke="black" stroke-width="1.5" stroke-linecap="round" />
			<path d="M14 25H20" stroke="black" stroke-width="1.5" stroke-linecap="round" />
			<path d="M14 28H22" stroke="black" stroke-width="1.5" stroke-linecap="round" />
			<rect x="11" y="1" width="17" height="16" rx="2" fill="white" stroke="black" stroke-width="1.5" />
			<path d="M11 12L18.9688 8.72727L22.1562 12L28 6" stroke="black" stroke-width="1.5" />
			<circle cx="22.5" cy="5.5" r="1.5" fill="black" />
			<rect x="13" y="33" width="8" height="3" rx="1" fill="black" />
		</svg>
	},
	/**
	 * @see ./edit.js
	 */
	edit: Edit,

	/**
	 * @see ./save.js
	 */
	save,
});