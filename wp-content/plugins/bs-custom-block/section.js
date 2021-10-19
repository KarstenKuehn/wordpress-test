/*
( function( blocks, editor, element ) {
  var el = element.createElement;
var InnerBlocks = wp.editor.InnerBlocks;
var createElement = wp.element.createElement;
  blocks.registerBlockType( 'lb/section', {
    title: 'Section', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'common', // The category of block in editor.
    edit() {
      return createElement( InnerBlocks );
    },
    save: function() {
      return createElement('section', { className: 'content_section' }, createElement( InnerBlocks.Content ));
    },
  } );
} )( window.wp.blocks, window.wp.editor, window.wp.element );
*/


( function( blocks, editor, element ) {
  var el = element.createElement;
  var InnerBlocks = wp.editor.InnerBlocks;  
  var createElement = wp.element.createElement;

  blocks.registerBlockType( 'lb/section', {
    title: '[ALT] Section', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'alt-blocks', // The category of block in editor.
    edit() {
/*      return createElement( InnerBlocks );

        */

      return [        
      el(
          "div",{multiline: 'div', className: 'aa',style:{border:'1px solid gray', padding:'32px'} },
        el(
          "span",
          null,
          "[ALT] Section => Beliebiger Inhalt: "
        ),         
        el(
          "hr",
          null
        ),          

          createElement( InnerBlocks )
        )]

    },
    save: function() {
      return createElement('section', { className: 'content_section' }, createElement( InnerBlocks.Content ));
    },
  } );
} )( window.wp.blocks, window.wp.editor, window.wp.element );
