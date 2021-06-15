( function(blocks, editor, components, i18n, element) {
  var registerBlockType = wp.blocks.registerBlockType;
  var el = wp.element.createElement;
  var InnerBlocks = wp.editor.InnerBlocks;

  registerBlockType( 'lb/verlinkungen-frame', {
    title: 'Verlinkungen-Frame', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'layout', // The category of block in editor.
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Parent' ),
        el(
          InnerBlocks,
          {
            template:  [
              [ 'test/child' ],
            ],
            templateLock: 'all',
          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'verlinkungen' },
        el( InnerBlocks.Content, {} )
      );
    },
  } );

  registerBlockType( 'test/child', {
    title: 'Test Child',
    icon: 'cart',
    category: 'common',
    parent: [ 'test/parent' ],

    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Child' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/columns',{},
                [
                  ['core/column',{},
                    [
                    ['core/heading',{'placeholder':'Überschrift'}],
                      ['core/image',{'placeholder':'Verlinkung-Bild'}],
                      ['core/paragraph',{'placeholder':'Inhalt linke Spalte'}]
                    ]
                  ],
                  ['core/column',{},
                    [
                    ['core/heading',{'placeholder':'Überschrift'}],
                    ['core/image',{'placeholder':'Verlinkung-Bild'}],
                      ['core/paragraph',{'placeholder':'Inhalt rechte Spalte'}]
                    ]
                  ]
                ]
              ]
            ],
            templateLock: "all",
            allowedBlocks: ['core/columns'],
          }
        )
      );
    },

    save: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( InnerBlocks.Content, {} )
      );
    },
    } );
/*    
    registerBlockType( 'test/grandchild', {
    title: 'Test Grandchild',
    icon: 'product',
    category: 'common',
    parent: [ 'test/child' ],

    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Grandchild' ),
        el(
          InnerBlocks,
          {
            template:  [
              [ 'core/video' ],
              [ 'core/paragraph' ],
              [ 'core/audio' ],
            ],
          }
        )
      );
    },

    save: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( InnerBlocks.Content, {} )
      );
    },



  } );*/
} )(
window.wp.blocks,
window.wp.blockEditor,
window.wp.components,
window.wp.i18n,
window.wp.element
);







/*
(function (blocks, editor, components, i18n, element) {
var el = element.createElement;
var registerBlockType = blocks.registerBlockType;
var RichText = editor.RichText;
var BlockControls = editor.BlockControls;
var AlignmentToolbar = editor.AlignmentToolbar;
//var MediaUpload = editor.MediaUpload;
var InspectorControls = editor.InspectorControls;
var TextControl = components.TextControl;
  blocks.registerBlockType( 'lb/verlinkungen-frame', {
    title: 'Verlinkungen-Frame', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'layout', // The category of block in editor.
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


    mediaRID: {
    type: 'number'
    },
    mediaRURL: {
    type: 'string',
    source: 'attribute',
    selector: 'img',
    attribute: 'src'
    },
    mediaRALT: {
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

  var onSelectRImage = function (media_r) {
  return props.setAttributes({
  mediaRURL: media_r.url,
  mediaRID: media_r.id,
  mediaRALT: media_r.alt
  })
  };

  return [
    el(BlockControls, {key: 'controls'},
      el('div', {
        className: 'components-toolbar'
        },

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
        "div",{
        style: { textAlign: attributes.alignment,borderBottom:'1px solid grey',margin:'10px',padding:'10px' }
      },
        "Bild-Text-Modul "
      ),     
          el(
        'div', {
          className: 'wp-block-media-text__media',
          style:{display:'inline-block',width:'50%',verticalAlign:'top', padding:'10px'},
        },
        el(
          editor.MediaUpload, {
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
                !attributes.mediaID ? i18n.__('Upload Image L', 'lb') : el('img', {src: attributes.mediaURL,alt: attributes.mediaALT,
                style:{height:'auto',width:'auto'}})
              )
            }
          }
        )
    ),
    el('div', {
    className: 'my-block-content wp-block-media-text__content',
        style:{display:'inline-block',width:'50%', padding:'10px'}
    },
        el(
          editor.MediaUpload, {
            onSelect: onSelectRImage,
            type: 'image',
            value: attributes.mediaRID,
            render: function (objR) {
              return el(
                components.Button, {
                className: attributes.mediaRID ? 'image-button' : 'button button-large',
                style:{height:'auto',width:'auto'},
                onClick: objR.open
                },
                !attributes.mediaRID ? i18n.__('Upload Image R', 'lb') : el('img', {src: attributes.mediaRURL,alt: attributes.mediaRALT,
                style:{height:'auto',width:'auto'}})
              )
            }
          }
        ),

    el(RichText, {
    type: 'text',
    label: i18n.__('Überschrift <H2>', 'lb'),
    value: attributes.title,    
    key: 'editable',
    tagName: 'h2',
    className: 'my-block-text title',
    placeholder: i18n.__('Überschrift <H2>', 'lb'),
    keepPlaceholderOnFocus: true,
    value: attributes.title,
    onChange: function (newTitle) {
    props.setAttributes({title: newTitle})
    }
    }),
      el(RichText, {
    type: 'text',
    label: i18n.__('Inhalt', 'lb'),
    value: attributes.title,    
    key: 'editable',
    tagName: 'p',
    className: 'my-block-text content',
    placeholder: i18n.__('Inhalt', 'lb'),
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
          "div",
          {style:{display:'inline-block',width:'30%', padding:'10px',textAlign:'left'}},
          "Button URL: "
        ),    
    el(RichText, {
    type: 'url',
    label: i18n.__('Button URL', 'lb'),
    value: attributes.buttonURL,    
    key: 'editable',
    tagName: 'div',
    style:{display:'inline-block',width:'70%', padding:'10px',textAlign:'left'},
    className: 'my-block-text url',
    placeholder: i18n.__('URL', 'lb'),
    keepPlaceholderOnFocus: true,
    value: attributes.buttonURL,
    onChange: function (newURL) {
    props.setAttributes({buttonURL: newURL})
    }
    }),
        el(
          "div",
          {style:{display:'inline-block',width:'30%', padding:'10px',textAlign:'left'}},
          "Button Text: "
        ),     
    el(RichText, {
    type: 'text',
    label: i18n.__('Button Text', 'lb'),
    value: attributes.buttonText,    
    key: 'editable',
    tagName: 'div',
    className: 'my-block-text url-text',
    style:{display:'inline-block',width:'70%', padding:'10px',textAlign:'left'},
    
    placeholder: i18n.__('ButtonText', 'lb'),
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
      className: 'image-text std'
      },
      el(
        'h2',{
          className:'content desktop_hidden'
        },
        attributes.title

      ),

      attributes.buttonURL ? 
      (
        el('a', {
          href: attributes.buttonURL
          },
          el('img', {
            src: attributes.mediaURL,
            alt: attributes.mediaALT,
            className:'block_image std'
          }),
        )
      )
      :
      (
        el('img', {
          src: attributes.mediaURL,
          alt: attributes.mediaALT,
          className:'block_image std'
        })
      ),

    el(
      'div', {
      className: 'block_text'
      },


      attributes.buttonURL ? 
      (
        el('a', {
          href: attributes.buttonURL
          },
          el('img', {
            src: attributes.mediaRURL,
            alt: attributes.mediaRALT,
            className:'block_image std'
          }),
        )
      )
      :
      (
        el('img', {
          src: attributes.mediaRURL,
          alt: attributes.mediaRALT,
          className:'block_image std'
        })
      ),



      el(
        'h2',{
          className:'content mobile_hidden'
        },
        attributes.title

      ),
        el( editor.RichText.Content, {
          tagName:'p',
          className:'block_content content',
          value:  attributes.text
          },
         

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



*/