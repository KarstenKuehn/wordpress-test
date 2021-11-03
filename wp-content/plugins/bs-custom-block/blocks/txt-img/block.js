(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  var InnerBlocks = wp.editor.InnerBlocks;

blocks.registerBlockStyle( 'core/column', {
name: 'spiegeln',
label: 'Spiegeln'
} );

  blocks.registerBlockType( 'bitv/text-image', {
    title: 'Text-Bild Modul', // The title of block in editor.
   icon: 'align-pull-right', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.  
    edit: function() {
      return el( 'div', { className:'block-frame',style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Text-Bild-Modul' ),
        el(
          InnerBlocks,
          {
            template: [
                  ['core/column',{className:'block-text content',},
                    [
                      ['core/heading',{className:'e_headline content modul-title','placeholder':'Modul Überschrift',fontSize: 'large'}],
                      ['core/image',{className:'modul-bild','placeholder':'Modul-Bild'}],
                      ['core/paragraph',{className:'modul-text','placeholder':'Modul-Text'}],
                      ['core/button',{className:'modul-button content','placeholder':'Modul-Button'}],
                      
                    ]
                  ],
/*
              ['core/heading',{className:'e_headline content','placeholder':'Block Überschrift',fontSize: 'large'}],

                  ['core/column',{className:'block-text content',},
                    [
                      ['core/paragraph',{'placeholder':'Blocktext'}],
                      
                    ]
                  ],
              ['core/button',{className:'modul-button content','placeholder':'Button'}],
              ['core/image',{className:'modul-image','placeholder':'Verlinkung-Bild'}],

*/              
            ],
            //templateLock: "all",
            //allowedBlocks: ['core/columns'],
          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'modul text-bild' },
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