/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { __ } from '@wordpress/i18n'
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor'
/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function Save(props) {
	console.log(props.attributes.url);
	const blockProps = useBlockProps.save();
	var attributes = props.attributes;
	const blockContainer = `wp-block-mytheme-card ${props.attributes.theme}`;
	return (
		<>
			<div className={blockContainer}>
				{
					attributes.url ? (
						<a href={attributes.url}><InnerBlocks.Content /></a>
					) : (
						<InnerBlocks.Content />
					)
				}
			</div>

		</>
	);
}