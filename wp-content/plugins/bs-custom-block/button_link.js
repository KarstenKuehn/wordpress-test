(function (blocks, editor, components, i18n, element) {
var el = element.createElement;
var registerBlockType = blocks.registerBlockType;
var RichText = editor.RichText;
var BlockControls = editor.BlockControls;
var AlignmentToolbar = editor.AlignmentToolbar;
var MediaUpload = editor.MediaUpload;
var InspectorControls = editor.InspectorControls;
var TextControl = components.TextControl;

  blocks.registerBlockType( 'lb/button', {
    title: 'Link Button', // The title of block in editor.
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
mediaID: media.id,
mediaALT: media.alt
})
};
return [
  el(
    'div', {
    className: '',
    style: { textAlign: attributes.alignment,border:'1px solid grey',paddingBottom:'10px' }
    },

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
      label: i18n.__('Button URL', 'lb'),
      value: attributes.buttonURL,    
      key: 'editable',
      tagName: 'p',
      className: 'button-url',
      placeholder: i18n.__('TextURL', 'lb'),
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
      label: i18n.__('Button Text', 'lb'),
      value: attributes.buttonText,    
      key: 'editable',
      tagName: 'p',
      className: 'button-text',
      placeholder: i18n.__('ButtonText', 'lb'),
      keepPlaceholderOnFocus: true,
      value: attributes.buttonText,
      onChange: function (newbuttonText) {
      props.setAttributes({buttonText: newbuttonText})
      }
      }),  
  )

];
},
save: function (props) {
var attributes = props.attributes;


return (
  el('section', {className: 'content_section',},
    el('a', {
      className: 'button',
      href: attributes.buttonURL
      },   
      attributes.buttonText  
    )
  )
)// end return
}
})
})(
window.wp.blocks,
window.wp.editor,
window.wp.components,
window.wp.i18n,
window.wp.element
);



