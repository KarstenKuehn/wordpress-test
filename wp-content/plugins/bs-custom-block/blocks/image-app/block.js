(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  var InnerBlocks = wp.editor.InnerBlocks;

  blocks.registerBlockType( 'bitv/img-app-modul', {
    title: 'Bild-App-Modul', // The title of block in editor.
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
        el( 'span', {}, 'Bild-App-Modul' ),
        el(
          InnerBlocks,
          {


            
            template: [
              ['core/heading',{className:'e_headline app-head','placeholder':'Block Überschrift',fontSize: 'large'}],
                                ['core/column',{className:'app-text content',},
                    [
                      ['core/paragraph',{'placeholder':'Blocktext'}],                      
                    ]
                  ],
                  ['core/image',{className:'app-button my-app','placeholder':'app-button',url:'/wp-content/uploads/2021/08/AppStore.png',href:'https://itunes.apple.com/us/app/playoff-selbsthilfe-fur-glucksspieler/id1102852513?l=de&&ls=1&&mt=8/'}],
                  ['core/image',{className:'google-button my-app','placeholder':'google-button',url:'/wp-content/uploads/2021/08/GooglePlay.png',href:'https://itunes.apple.com/us/app/playoff-selbsthilfe-fur-glucksspieler/id1102852513?l=de&&ls=1&&mt=8/'}],
/*
              ['core/button',{className:'app-button','placeholder':'Button'}],
              ['core/button',{className:'google-button','placeholder':'Button'}],
*/
              ['core/image',{className:'app-image','placeholder':'App-Bild',align:'center'}],   

            ],
            //templateLock: "all",
            //allowedBlocks: ['core/columns'],
          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'modul app-modul mirror' },
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