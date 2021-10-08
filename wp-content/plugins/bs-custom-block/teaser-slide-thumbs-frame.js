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
  
  blocks.registerBlockType( 'lb/teaser-slide-thumbs-frame', {
    title: 'Teaser-Slide-Thumbs-Frame', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'layout', // The category of block in editor.
    edit() {
/*      return createElement( InnerBlocks );

        */

      return [        
      el(
          "div",{multiline: 'div', className: 'aa',style:{border:'1px solid gray', padding:'32px'} },
        el(
          "span",
          null,
          "Teaser-Thumbs-Slide-Frame: "
        ),         
        el(
          "hr",
          null
        ),          

          createElement( InnerBlocks )
        )]

    },
    save: function() {
      //return createElement('section', { className: 'content_section' }, createElement( InnerBlocks.Content ));

      return createElement('div', { 
        className: 'slideshow-container xx gallery-container' },
            createElement( 'div',{
              className: 'swiper-pagination teaser desktop_hidden'},'' )  , 
        createElement('div', { 
        className: 'swiper-container gallery-main' }, 
        createElement( 'div',{
          className: 'swiper-wrapper'},
          createElement( InnerBlocks.Content ),
        ),
           createElement( 'div',{
            className: 'swiper-button_x mobile_hidden'},
            createElement( 'div',{
              className: 'swiper-button-next teaser'},'' ),
            createElement( 'div',{
              className: 'swiper-button-prev teaser'},'' ) 
          )       
      ),

      createElement('div', { 
        className: 'swiper-container gallery-thumbs' },
        createElement( 'div',{
          className: 'swiper-wrapper'},
          '',
        ),
      )
    )
    },
  } );
} )( window.wp.blocks, window.wp.editor, window.wp.element );
