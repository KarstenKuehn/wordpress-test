(function (blocks, editor, components, i18n, element) {
var el = element.createElement;
var registerBlockType = blocks.registerBlockType;
var RichText = editor.RichText;
var BlockControls = editor.BlockControls;
var AlignmentToolbar = editor.AlignmentToolbar;
var MediaUpload = editor.MediaUpload;
var InspectorControls = editor.InspectorControls;
var TextControl = components.TextControl;
blocks.registerBlockType( 'lb/img-text', {
  title: 'UPLB-Image-Text', // The title of block in editor.
  icon: 'id', // The icon of block in editor.
  category: 'common', // The category of block in editor.
  attributes: {
    mediaID: {
    type: 'number'
    },
    mediaURL: {
    type: 'string',
    source: 'attribute',
    selector: 'img',
    attribute: 'src'
    },
    mediaALT: {
    type: 'string',
    source: 'attribute',
    selector: 'img',
    attribute: 'alt'
    },
    title: {
    type: 'text',
    selector: 'h2'
    },
    text: {
    type: 'text',
    selector: 'p'
    },
    buttonText: {
    type: 'text'
    },
    buttonURL: {
    type: 'url'
    },
    alignment: {
    type: 'string',
    default: 'center'
    }
  },
  edit: function (props) {
  var attributes = props.attributes;
  var onSelectImage = function (media) {
  return props.setAttributes({
  mediaURL: media.url,
  mediaID: media.id,
  mediaALT: media.alt
  })
  };
  return [
    el(BlockControls, {key: 'controls'},
      el('div', {
        className: 'components-toolbar'
        },
        el(MediaUpload, {
          onSelect: onSelectImage,
          type: 'image',
          render: function (obj) {
          return el(components.Button, {
            className: 'components-icon-button components-toolbar__control',
            onClick: obj.open
            },
            el(
              'svg', 
              {className: 'dashicon dashicons-edit', width: '20', height: '20'},
              el('path', {d: 'M2.25 1h15.5c.69 0 1.25.56 1.25 1.25v15.5c0 .69-.56 1.25-1.25 1.25H2.25C1.56 19 1 18.44 1 17.75V2.25C1 1.56 1.56 1 2.25 1zM17 17V3H3v14h14zM10 6c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zm3 5s0-6 3-6v10c0 .55-.45 1-1 1H5c-.55 0-1-.45-1-1V8c2 0 3 4 3 4s1-3 3-3 3 2 3 2z'})
            ));
          }
        })
      ),
      el(AlignmentToolbar, {
      value: attributes.alignment,
      onChange: function(newAlignment) {
      props.setAttributes({ alignment: newAlignment })
      }
      })
    ),
    el(
      'div', {
      className: props.className,
      style: { textAlign: attributes.alignment,border:'1px solid grey',paddingBottom:'10px' }
      },
        el(
          "div",
          null,
          "Image Text"
        ),    
          el(
        'div', {
          className: 'wp-block-media-text__media',
          style:{display:'inline-block',width:'40%',verticalAlign:'top'},
        },
        el(
          MediaUpload, {
            onSelect: onSelectImage,
            type: 'image',
            value: attributes.mediaID,
            render: function (obj) {
              return el(
                components.Button, {
                className: attributes.mediaID ? 'image-button' : 'button button-large',
                style:{height:'auto',width:'auto'},
                onClick: obj.open
                },
                !attributes.mediaID ? i18n.__('Upload Image', 'my-first-gutenberg-block') : el('img', {src: attributes.mediaURL,alt: attributes.mediaALT,
                style:{height:'auto',width:'auto'}})
              )
            }
          }
        )
    ),
    el('div', {
    className: 'my-block-content wp-block-media-text__content',
        style:{display:'inline-block',width:'40%'}
    },
        el(
          "span",
          null,
          "Headline"
        ), 
    el(RichText, {
    type: 'text',
    label: i18n.__('Headline', 'my-first-gutenberg-block'),
    value: attributes.title,    
    key: 'editable',
    tagName: 'h3',
    className: 'my-block-text title',
    placeholder: i18n.__('Headline', 'my-first-gutenberg-block'),
    keepPlaceholderOnFocus: true,
    value: attributes.title,
    onChange: function (newTitle) {
    props.setAttributes({title: newTitle})
    }
    }),
      el(RichText, {
    type: 'text',
    label: i18n.__('Content', 'my-first-gutenberg-block'),
    value: attributes.title,    
    key: 'editable',
    tagName: 'p',
    className: 'my-block-text content',
    placeholder: i18n.__('Content', 'my-first-gutenberg-block'),
    keepPlaceholderOnFocus: true,
    value: attributes.text,
    onChange: function (newText) {
    props.setAttributes({text: newText})
    }
    }),
        el(
          "hr",
          null
        ),
        el(
          "span",
          null,
          "Button URL: "
        ),    
    el(RichText, {
    type: 'url',
    label: i18n.__('Button URL', 'my-first-gutenberg-block'),
    value: attributes.buttonURL,    
    key: 'editable',
    tagName: 'p',
    className: 'my-block-text url',
    placeholder: i18n.__('TextURL', 'my-first-gutenberg-block'),
    keepPlaceholderOnFocus: true,
    value: attributes.buttonURL,
    onChange: function (newURL) {
    props.setAttributes({buttonURL: newURL})
    }
    }),
        el(
          "span",
          null,
          "Button Text: "
        ),    
    el(RichText, {
    type: 'text',
    label: i18n.__('Button Text', 'my-first-gutenberg-block'),
    value: attributes.buttonText,    
    key: 'editable',
    tagName: 'p',
    className: 'my-block-text url-text',
    placeholder: i18n.__('ButtonText', 'my-first-gutenberg-block'),
    keepPlaceholderOnFocus: true,
    value: attributes.buttonText,
    onChange: function (newbuttonText) {
    props.setAttributes({buttonText: newbuttonText})
    }
    }),  ),

    )
  ];
  },
  save: function (props) {
  var attributes = props.attributes;
return (
    el(
      'section', {
      className: 'content_section full media-text gray'
      },
    el(
      'div', {
      className: 'image-text'
      },
      el(
        'h2',{
          className:'content desktop_hidden'
        },
        attributes.title

      ),
      el(
      'div', {
      className: 'block_image_div mobile_hidden',
      style : {backgroundImage:'url('+attributes.mediaURL+')'}
      },
      ),
      el('img', {
      src: attributes.mediaURL,
      alt: attributes.mediaALT,
          className:'block_image desktop_hidden'
      }),

    el(
      'div', {
      className: 'block_text'
      },
      el(
        'h2',{
          className:'content mobile_hidden'
        },
        attributes.title

      ),
      el(
        'p',{
          className:'block_content content'
        },
        attributes.text

      ),      
      el('a', {
        className: 'my-block-button content',
        href: attributes.buttonURL
        },       
        el(
          'span',{
            className:'button-text wp-block-button__link'
          },
          attributes.buttonText
        ),      
      )//end a
      )
    )
)
    )
  }
})
})(
window.wp.blocks,
window.wp.blockEditor,
window.wp.components,
window.wp.i18n,
window.wp.element
);



