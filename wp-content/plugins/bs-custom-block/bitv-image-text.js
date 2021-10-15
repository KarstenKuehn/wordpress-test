(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;
const iconEl = el('svg', { width: 20, height: 20 },
  el('path', { d: "M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z" } )
);
  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/image-text', {
    title: 'BITV-Bild-Text', // The title of block in editor.
    icon: 'align-pull-left', // The icon of block in editor.
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
        el( 'span', {}, 'Bild-Text-Modul' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/heading',{className:'e_headline content','placeholder':'Block Überschrift',fontSize: 'large'}],

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