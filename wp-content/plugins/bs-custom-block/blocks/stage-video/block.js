(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;
const iconEl = el('svg', { width: 20, height: 20 },
  el('path', { d: "M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z" } )
);
  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/stage-video-modul', {
    title: 'Stage-Video Modul', // The title of block in editor.
    icon: 'align-pull-left', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.
    attributes: {
    },    
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Stage-Video Modul' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/video',{className:'video','placeholder':'Video', 'autoplay':'1',controls:false,'muted':true,loop:'1'}],
            ],
            //templateLock: "all",
            //allowedBlocks: ['core/columns'],
          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'modul stage-video' },
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