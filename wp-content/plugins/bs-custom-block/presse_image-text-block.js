(function (blocks, editor, components, i18n, element) {
var el = element.createElement;
var registerBlockType = blocks.registerBlockType;
var RichText = editor.RichText;
var BlockControls = editor.BlockControls;
var AlignmentToolbar = editor.AlignmentToolbar;
var MediaUpload = editor.MediaUpload;
var InspectorControls = editor.InspectorControls;
var TextControl = components.TextControl;
  blocks.registerBlockType( 'lb/presse-img-text', {
    title: 'UPLB-Presse-Image-Text', // The title of block in editor.
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
  ansprechpartner: {
  type: 'text',
  selector: 'p'
  },

  mail: {
  type: 'text',
  selector: 'p'
  },
  phone: {
  type: 'text',
  selector: 'p'
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
  el('div', {
      className: 'wp-block-media-text__media',
      style:{display:'inline-block',width:'40%',verticalAlign:'top',margin:'16px'},
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
    el(RichText, {
      type: 'text',
      label: i18n.__('Headline', 'my-first-gutenberg-block'),
      key: 'editable',
      tagName: 'h2',
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
    el('svg',{ width: 24, height: 24 },
      el('path',{d:"M0 0h24v24H0z",fill:"none"}),
      el('path',{d:"M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"}),
    ),
    el(RichText, {
      type: 'text',
      label: i18n.__('Ansprechpartner', 'my-first-gutenberg-block'),
      key: 'editable',
      tagName: 'p',
      className: 'my-block-text content',
      placeholder: i18n.__('Ansprechpartner', 'my-first-gutenberg-block'),
      keepPlaceholderOnFocus: true,
      value: attributes.ansprechpartner,
      onChange: function (newText) {
        props.setAttributes({ansprechpartner: newText})
      }
    }),
    el(
      "hr",
      null
    ),
    el('svg',{ width: 24, height: 24 },
      el('path',{d:"M0 0h24v24H0z",fill:"none"}),
      el('path',{d:"M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"}),
    ),

    el(RichText, {
      type: 'text',
      label: i18n.__('Mail-Adress', 'my-first-gutenberg-block'),
      key: 'editable',
      tagName: 'p',
      className: 'my-block-text content',
      placeholder: i18n.__('Mail-Adress', 'my-first-gutenberg-block'),
      keepPlaceholderOnFocus: true,
      value: attributes.mail,
      onChange: function (newText) {
        props.setAttributes({mail: newText})
      }
    }),      
      
    el(
      "hr",
      null
    ),
    el('svg',{ width: 24, height: 24 },
      el('path',{d:"M0 0h24v24H0z",fill:"none"}),
      el('path',{d:"M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"}),
    ),

    el(RichText, {
      type: 'text',
      label: i18n.__('Mail-Adress', 'my-first-gutenberg-block'),
      key: 'editable',
      tagName: 'p',
      className: 'my-block-text content',
      placeholder: i18n.__('Phone', 'my-first-gutenberg-block'),
      keepPlaceholderOnFocus: true,
      value: attributes.phone,
      onChange: function (newText) {
        props.setAttributes({phone: newText})
      }
    }),  
  )
)
];
},
save: function (props) {
var attributes = props.attributes;
return (
  el('section', {
      className: 'content_section media-text kontakt full gray'
      },
      el('div', {
          className: 'image-text'
        },
        el('h2',{
            className:'content desktop_hidden'
          },
          attributes.title
        ),
        el('div', {
          className: 'block_text'
          },
          el('h2',{
            className:'content mobile_hidden'
            },
            attributes.title
          ),
        el('div', {
          className: 'block_image_div mobile_hidden',
          style : {backgroundImage:'url('+attributes.mediaURL+')'}
        },
        ),
        el('img', {
          src: attributes.mediaURL,
          alt: attributes.mediaALT,
          className:'block_image desktop_hidden'
        }),
          el('p',{
            className:'block_content content'
            },
            attributes.text
          ), 
          el('div',{className:'block_content content'},
            el('span',{className:'material-icons'},'person_outline'),
            el('span',null,attributes.ansprechpartner),
          ),
          el('div',{className:'block_content content'},
            el('span',{className:'material-icons'},'mail_outline'),
            el('span',null,attributes.mail),
            ),
          el('div',{className:'block_content content'},
            el('span',{className:'material-icons'},'phone'),
            el('span',null,attributes.phone),
          )
        )
      )
    )// end section
  )}// end save
})
})(
window.wp.blocks,
window.wp.blockEditor,
window.wp.components,
window.wp.i18n,
window.wp.element
);



