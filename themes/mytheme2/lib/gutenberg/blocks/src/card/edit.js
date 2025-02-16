import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks, InspectorControls, URLInput } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import {
	PanelRow,
	MenuGroup, MenuItemsChoice,
	ColorIndicator
} from '@wordpress/components';

// import { useState } from '@wordpress/element';
// import './editor.scss';

export default function Edit(props) {
	const blockProps = useBlockProps();

	// const [url, setLinkUrl] = useState('');

	const { attributes: { url, theme }, className, setAttributes } = props;



	const TEMPLATE = [
		['core/image'],
		['core/group', { className: 'txt__container' }, [
			['core/heading', { level: 3 , className: 'has-light-color has-medium-font-size'}],
			['core/paragraph', { className: 'has-light-color has-small-font-size' }]
		]],
	];
	const themes = [
		{
			value: 'image-contain',
			label: (
				<>
					<p className='mytheme-label-admin'>{__(' Image', 'your-text-domain')}</p>
				</>
			),
		},
		{
			value: 'image-full',
			label: (
				<>
					<p className='mytheme-label-admin'>{__(' Image de fond', 'your-text-domain')}</p>
				</>
			),
		},
	];

	const blockContainer = `${blockProps.className} ${theme ? theme : ''}`;

	return (
		<>
			<InspectorControls>
				<PanelBody title={('Link Options')}>
					{/* <TextControl
						label={('Link URL')}
						value={url}
						onChange={(value) => props.setAttributes({ url: value })}
					/> */}
					<MenuGroup label="Url">
						<URLInput
							value={props.attributes.url}
							onChange={(url, post) => props.setAttributes(
								{ url }
							)}
						/>
					</MenuGroup>
				</PanelBody>
				<PanelBody title="Style et disposition" initialOpen={true} className="custom-panel-body-class">
					<PanelRow>
						<MenuGroup label="Affichage de l'image">
							<MenuItemsChoice
								choices={themes}
								value={theme ?? themes[0].value}
								onSelect={(value) => props.setAttributes({ theme: value })}
							/>
						</MenuGroup>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<div {...blockProps} className={blockContainer}>
				<InnerBlocks
					templateLock="all"
					orientation="horizontal"
					template={TEMPLATE}
					templateProps={{ url }}
				/>
			</div>
		</>
	);
}