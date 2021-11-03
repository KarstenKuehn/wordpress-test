( function( blocks, editor, element ) {
  var el = element.createElement;
  var InnerBlocks = wp.editor.InnerBlocks;  
  var createElement = wp.element.createElement;

  blocks.registerBlockType( 'bitv/section', {
    title: 'Section', // The title of block in editor.
    icon: 'welcome-widgets-menus', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.
    edit() {
      return [        
      el(
          "div",{multiline: 'div',style:{border:'1px solid gray', padding:'32px'} },
        el(
          "span",
          null,
          "Section => Beliebiger Inhalt / Modul "
        ),         
        el(
          "hr",
          null
        ),          

          createElement( InnerBlocks )
        )]

    },
    save: function() {
      return createElement('section', { className: 'content_section bitv' }, createElement( InnerBlocks.Content ));
    },
  } );
} )( window.wp.blocks, window.wp.editor, window.wp.element );
