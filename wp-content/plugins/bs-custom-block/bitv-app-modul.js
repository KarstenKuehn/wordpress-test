(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/app-modul', {
    title: 'BITV-App-Modul', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
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
        el( 'span', {}, 'BITV-App-Modul' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/heading',{className:'e_headline','placeholder':'Block Überschrift',fontSize: 'large'}],
              ['core/paragraph',{className:'text1_content','placeholder':'App-Description'}],
              ['core/button',{className:'app-button','placeholder':'Button'}],
              ['core/button',{className:'google-button','placeholder':'Button'}],
              ['core/image',{className:'app-image','placeholder':'App-Bild'}],        
            ],
            //templateLock: "all",
            //allowedBlocks: ['core/columns'],
          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'modul app-modul' },
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