( function( blocks, editor, element ) {
  var el = element.createElement;
  var InnerBlocks = wp.editor.InnerBlocks;  
  var createElement = wp.element.createElement;
  blocks.registerBlockType( 'bitv/accordion', {
    title: 'Akkordeon Modul', // The title of block in editor.
    icon: 'align-wide', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.
    edit() {
      return [        
      el(
          "div",{multiline: 'bitv/accordion-item',style:{border:'1px solid gray', padding:'32px'} },
        el(
          "span",
          null,
          "Akkordeon-Modul: "
        ),         
        el(
          "hr",
          null
        ),          

          createElement( InnerBlocks )
        )]

    },
    save: function() {
      return createElement('div', { className: 'modul accordion' }, createElement( InnerBlocks.Content ));
    },
  } );
} )( window.wp.blocks, window.wp.editor, window.wp.element );
