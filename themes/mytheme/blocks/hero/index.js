const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls, ColorPalette } = wp.blockEditor;
const { PanelBody, TextControl, ToggleControl } = wp.components;
const { Fragment, createElement } = wp.element;

const getColorSlug = (hexValue, colors) => {
    if (!hexValue) return '';
    const color = colors.find(c => c.color === hexValue);
    return color ? color.slug : '';
};

registerBlockType('custom/hero', {
    title: 'Hero Section',
    icon: 'cover-image',
    category: 'layout',
    attributes: {
        title: { type: 'string', source: 'html', selector: 'h1' },
        subtitle: { type: 'string', source: 'html', selector: 'p' },
        backgroundColor: { type: 'string', default: 'background' },
        titleColor: { type: 'string', default: 'primary' },
        textColor: { type: 'string', default: 'text' },
        buttonText: { type: 'string' },
        buttonLink: { type: 'string' },
        buttonTextColor: { type: 'string', default: 'primary' },
        buttonBackgroundColor: { type: 'string', default: 'background' },
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

        const onColorChange = (colorType, setColor) => (hexValue) => {
            const slug = getColorSlug(hexValue, colors);
            setAttributes({ [colorType]: slug });
        };

        const getHexFromSlug = (slug) => {
            const color = colors.find(c => c.slug === slug);
            return color ? color.color : '';
        };

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
                            colors: colors,
                            value: getHexFromSlug(backgroundColor),
                            onChange: onColorChange('backgroundColor', setAttributes)
                        })
                    ),
                    createElement('div', { className: 'block-editor-block-inspector__color-group' },
                        createElement('p', null, 'Couleur du titre'),
                        createElement(ColorPalette, {
                            colors: colors,
                            value: getHexFromSlug(titleColor),
                            onChange: onColorChange('titleColor', setAttributes)
                        })
                    ),
                    createElement('div', { className: 'block-editor-block-inspector__color-group' },
                        createElement('p', null, 'Couleur du texte'),
                        createElement(ColorPalette, {
                            colors: colors,
                            value: getHexFromSlug(textColor),
                            onChange: onColorChange('textColor', setAttributes)
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
                                colors: colors,
                                value: getHexFromSlug(buttonTextColor),
                                onChange: onColorChange('buttonTextColor', setAttributes)
                            })
                        ),
                        createElement('div', { className: 'block-editor-block-inspector__color-group' },
                            createElement('p', null, 'Couleur de fond du bouton'),
                            createElement(ColorPalette, {
                                colors: colors,
                                value: getHexFromSlug(buttonBackgroundColor),
                                onChange: onColorChange('buttonBackgroundColor', setAttributes)
                            })
                        )
                    ]
                )
            ),
            createElement('section', {
                className: `hero-block has-${backgroundColor}-background-color`,
            },
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

        return createElement('section', {
            className: `hero-block has-${backgroundColor}-background-color`,
        },
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
