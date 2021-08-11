(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;
const iconEl = el('svg', { width: 20, height: 20 },
  el('path', { d: "M22 13h-8v-2h8v2zm0-6h-8v2h8V7zm-8 10h8v-2h-8v2zm-2-8v6c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V9c0-1.1.9-2 2-2h6c1.1 0 2 .9 2 2zm-1.5 6l-2.25-3-1.75 2.26-1.25-1.51L3.5 15h7z" } )
);
  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/image-text', {
    title: 'BITV-Image-Text', // The title of block in editor.
    icon: iconEl, // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.
    attributes: {
      headline: {
        type: 'string',
        default: 'Lorem ipsum dolor sit amet.',
      },
      content: {
        type: 'string',
        default: ''
      },
      content_right: {
        type: 'string',
        default: ''
      },
      button: {
        type: 'string',
        default: 'mehr erfahren'
      },
      buttonURL: {
      type: 'url'
      },    
      button_right: {
        type: 'string',
        default: 'mehr erfahren'
      },
      buttonURL_right: {
      type: 'url'
      }, 
      ingredients_l: {
        type: 'string',
        default: ''
      },
      ingredients_r: {
        type: 'string',
        default: ''
      },
      block: {
        type: 'string',
        default: ''
      },
      alignment: {
        type: 'string',
        default: 'center'
      }
    },    
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Image-Text' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/heading',{className:'e_headline content','placeholder':'Block Überschrift','style_handle' : 'block-styles-stylesheet'}],

                  ['core/column',{className:'block-text content',},
                    [
                      ['core/paragraph',{'placeholder':'Blocktext'}],
                      
                    ]
                  ],
              ['core/button',{className:'modul-button content','placeholder':'Button'}],
              ['core/image',{className:'modul-image','placeholder':'Verlinkung-Bild'}],
            ],
            //templateLock: "all",
            //allowedBlocks: ['core/columns'],
          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'modul image-text' },
        el( InnerBlocks.Content, {} )
      );
    },
  } );
} )(
window.wp.blocks,
window.wp.blockEditor,
window.wp.components,
window.wp.i18n,
window.wp.element
);