(function (blocks, editor, components, i18n, element) {
var el = element.createElement;
var registerBlockType = blocks.registerBlockType;
var RichText = editor.RichText;
var BlockControls = editor.BlockControls;
var AlignmentToolbar = editor.AlignmentToolbar;
var MediaUpload = editor.MediaUpload;
var InspectorControls = editor.InspectorControls;
var TextControl = components.TextControl;
registerBlockType('my-first-gutenberg-block/image-with-text-block', {
title: i18n.__('LB-SlideItem-aa', 'my-first-gutenberg-block'),
description: i18n.__('A custom block for displaying image with text section', 'my-first-gutenberg-block'),
icon: 'id',
category: 'common',
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
  title: {
  type: 'text',
  selector: 'h3'
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
mediaID: media.id
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
  el(InspectorControls, {key: 'inspector'},
  el(components.PanelBody, {
  title: i18n.__('Block Content', 'my-first-gutenberg-block'),
  className: 'block-content',
  initialOpen: true
  },
  el('p', {}, i18n.__('Add custom meta options to your block', 'my-first-gutenberg-block')),
  el(TextControl, {
  type: 'text',
  label: i18n.__('Button Text', 'my-first-gutenberg-block'),
  value: attributes.buttonText,
  onChange: function (newButtonText) {
  props.setAttributes({ buttonText: newButtonText })
  }
  }),
  el(TextControl, {
  type: 'url',
  label: i18n.__('Button URL', 'my-first-gutenberg-block'),
  value: attributes.buttonURL,
  onChange: function (newButtonUrl) {
  props.setAttributes({ buttonURL: newButtonUrl })
  }
  })
  )
  ),
  el(
    'div', {
    className: props.className,
    style: { textAlign: attributes.alignment,border:'1px solid grey',paddingBottom:'10px' }
    },
      el(
        "div",
        null,
        "Slide-Item"
      ),    el(
      'div', {
      className: 'my-block-image',
      style:{display:'inline-block',width:'40%'},
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
      style:{height:'120px'},
              onClick: obj.open
              },
              !attributes.mediaID ? i18n.__('Upload Image', 'my-first-gutenberg-block') : el('img', {src: attributes.mediaURL,
      style:{height:'120px'}})
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
  key: 'editable',
  tagName: 'h3',
  className: 'my-block-title',
  placeholder: i18n.__('Title Text', 'my-first-gutenberg-block'),
  keepPlaceholderOnFocus: true,
  value: attributes.title,
  onChange: function (newTitle) {
  props.setAttributes({title: newTitle})
  }
  }),
  el(RichText, {
  key: 'editable',
  tagName: 'p',
  className: 'my-block-text text',
  placeholder: i18n.__('Text', 'my-first-gutenberg-block'),
  keepPlaceholderOnFocus: true,
  value: attributes.text,
  onChange: function (newText) {
  props.setAttributes({text: newText})
  }
  }),
  el('button', {
  className: 'my-block-button',
  placeholder: i18n.__('Text', 'my-first-gutenberg-block'),
  href: attributes.buttonURL
  }, attributes.buttonText)
  )
  )
];
},
save: function (props) {
var attributes = props.attributes;
return (
  el(
    'div', 
    {
      className: 'mySlides',
      style: {textAlign: attributes.alignment}
    },
    el(
      'div', {
      className: 'my-block-image'
      },
      el('img', {
      src: attributes.mediaURL
      })
    ),
    el(
      'div', {
      className: 'text'
      },
      el(RichText.Content, {
      tagName: 'h3',
      className: 'my-block-title',
      value: attributes.title
      }),
      el(RichText.Content, {
      tagName: 'p',
      className: 'my-block-text',
      value: attributes.text
      }),
      el('a', {
      className: 'my-block-button',
      href: attributes.buttonURL
      }, attributes.buttonText)
    )
  )
)
}
})
})(
window.wp.blocks,
window.wp.editor,
window.wp.components,
window.wp.i18n,
window.wp.element
);



