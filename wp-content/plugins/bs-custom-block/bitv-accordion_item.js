( function( blocks, editor, element ) {
  var el = element.createElement;
  var InnerBlocks = wp.editor.InnerBlocks;  
  var createElement = wp.element.createElement;
  blocks.registerBlockType( 'bitv/accordion-item', {
    title: 'BITV-Accordion-Item', // The title of block in editor.
    icon: 'align-wide', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.
    edit() {
      return [        
      el(
          "div",{multiline: 'div',style:{border:'1px solid gray', padding:'32px'} },
        el(
          "span",
          null,
          "Accordion-Item: "
        ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/heading',{className:'e_headline content','placeholder':'Block Überschrift',fontSize: 'large'},
               [ ['core/button',{className:'modul-button content','placeholder':'Button'}]],
              ],
              ['core/paragraph',{className:'block-text content','placeholder':'Blocktext'}],                  
            ],
          }
        ),

        el(
          "hr",
          null
        ),          
        )]

    },
    save: function() {
      return createElement('div', { className: 'accordion_item' }, createElement( InnerBlocks.Content ));
    },
  } );
} )( window.wp.blocks, window.wp.editor, window.wp.element );
