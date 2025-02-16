const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls, ColorPalette, useBlockProps } = wp.blockEditor;
const { PanelBody, TextControl, ToggleControl } = wp.components;
const { Fragment, createElement } = wp.element;

registerBlockType('custom/hero', {
    title: 'Hero Section',
    icon: 'cover-image',
    category: 'layout',
    attributes: {
        title: { type: 'string', source: 'html', selector: 'h1' },
        subtitle: { type: 'string', source: 'html', selector: 'p' },
        backgroundColor: { type: 'string', default: 'background' },
        titleColor: { type: 'string', default: 'content' },
        textColor: { type: 'string', default: 'content' },
        buttonText: { type: 'string' },
        buttonLink: { type: 'string' },
        buttonTextColor: { type: 'string', default: 'content' },
        buttonBackgroundColor: { type: 'string', default: 'primary' },
        showButton: { type: 'boolean', default: false }
    },

    edit: ({ attributes, setAttributes }) => {
        const {
            title,
            subtitle,
            backgroundColor,
            titleColor,
            textColor,
            buttonText,
            buttonLink,
            buttonTextColor,
            buttonBackgroundColor,
            showButton
        } = attributes;

        const { colors } = wp.data.select('core/block-editor').getSettings();

        const onColorChange = (colorType) => (hexValue) => {
            const color = colors.find(c => c.color === hexValue);
            const slug = color ? color.slug : '';
            setAttributes({ [colorType]: slug });
        };

        const blockProps = useBlockProps({
            className: `hero-block has-${backgroundColor}-background-color hero-container`
        });

        return createElement(Fragment, null,
            createElement(InspectorControls, null,
                createElement(PanelBody, { title: 'Paramètres du Hero', initialOpen: true },
                    createElement(TextControl, {
                        label: 'Titre',
                        value: title,
                        onChange: (val) => setAttributes({ title: val })
                    }),
                    createElement(TextControl, {
                        label: 'Sous-titre',
                        value: subtitle,
                        onChange: (val) => setAttributes({ subtitle: val })
                    }),
                    createElement('div', { className: 'block-editor-block-inspector__color-group' },
                        createElement('p', null, 'Couleur de fond'),
                        createElement(ColorPalette, {
                            colors,
                            value: colors.find(c => c.slug === backgroundColor)?.color,
                            onChange: onColorChange('backgroundColor')
                        })
                    ),
                    createElement('div', { className: 'block-editor-block-inspector__color-group' },
                        createElement('p', null, 'Couleur du titre'),
                        createElement(ColorPalette, {
                            colors,
                            value: colors.find(c => c.slug === titleColor)?.color,
                            onChange: onColorChange('titleColor')
                        })
                    ),
                    createElement('div', { className: 'block-editor-block-inspector__color-group' },
                        createElement('p', null, 'Couleur du texte'),
                        createElement(ColorPalette, {
                            colors,
                            value: colors.find(c => c.slug === textColor)?.color,
                            onChange: onColorChange('textColor')
                        })
                    ),
                    createElement(ToggleControl, {
                        label: 'Afficher un bouton ?',
                        checked: showButton,
                        onChange: (val) => setAttributes({ showButton: val })
                    }),
                    showButton && [
                        createElement(TextControl, {
                            label: 'Texte du bouton',
                            value: buttonText,
                            onChange: (val) => setAttributes({ buttonText: val })
                        }),
                        createElement(TextControl, {
                            label: 'Lien du bouton',
                            value: buttonLink,
                            onChange: (val) => setAttributes({ buttonLink: val })
                        }),
                        createElement('div', { className: 'block-editor-block-inspector__color-group' },
                            createElement('p', null, 'Couleur du texte du bouton'),
                            createElement(ColorPalette, {
                                colors,
                                value: colors.find(c => c.slug === buttonTextColor)?.color,
                                onChange: onColorChange('buttonTextColor')
                            })
                        ),
                        createElement('div', { className: 'block-editor-block-inspector__color-group' },
                            createElement('p', null, 'Couleur de fond du bouton'),
                            createElement(ColorPalette, {
                                colors,
                                value: colors.find(c => c.slug === buttonBackgroundColor)?.color,
                                onChange: onColorChange('buttonBackgroundColor')
                            })
                        )
                    ]
                )
            ),
            createElement('section', blockProps,
                createElement(RichText, {
                    tagName: 'h1',
                    placeholder: 'Votre Titre',
                    value: title,
                    className: `has-${titleColor}-color`,
                    onChange: (val) => setAttributes({ title: val })
                }),
                createElement(RichText, {
                    tagName: 'p',
                    placeholder: 'Votre Sous-titre',
                    value: subtitle,
                    className: `has-${textColor}-color`,
                    onChange: (val) => setAttributes({ subtitle: val })
                }),
                showButton && createElement('a', {
                    href: buttonLink || '#',
                    className: `button-ui has-${buttonTextColor}-color has-${buttonBackgroundColor}-background-color`,
                }, buttonText || 'Cliquez ici')
            )
        );
    },

    save: ({ attributes }) => {
        const {
            title,
            subtitle,
            backgroundColor,
            titleColor,
            textColor,
            buttonText,
            buttonLink,
            buttonTextColor,
            buttonBackgroundColor,
            showButton
        } = attributes;

        const blockProps = useBlockProps.save({
            className: `hero-block has-${backgroundColor}-background-color hero-container`
        });

        return createElement('section', blockProps,
            createElement('h1', { 
                className: `has-${titleColor}-color`
            }, title),
            createElement('p', {
                className: `has-${textColor}-color`
            }, subtitle),
            showButton && createElement('a', {
                href: buttonLink || '#',
                className: `button-ui has-${buttonTextColor}-color has-${buttonBackgroundColor}-background-color`,
            }, buttonText || 'Cliquez ici')
        );
    }
});