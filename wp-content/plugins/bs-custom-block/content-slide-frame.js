( function( blocks, editor, element ) {
  var el = element.createElement;
  var InnerBlocks = wp.editor.InnerBlocks;
  var createElement = wp.element.createElement;
  
  blocks.registerBlockType( 'lb/content-slide-frame', {
    title: 'Content-Slide-Frame', // The title of block in editor.
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
          "Teaser-Slide-Frame: "
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
      return createElement('div',{className:'slide-frame'},
           createElement( 'div',{
            className: 'swiper-button mobile_hidden'},
            createElement( 'div',{
              className: 'swiper-button-next teaser'},'' ),
            createElement( 'div',{
              className: 'swiper-button-prev teaser'},'' ) 
          ),createElement('div', { 
        className: 'slideshow-container gallery-container content-slider' },
            createElement( 'div',{
              className: 'swiper-pagination teaser desktop_hidden'},'' )  , 
        createElement('div', { 
        className: 'swiper-container gallery-main' }, 
        createElement( 'div',{
          className: 'swiper-wrapper'},
          createElement( InnerBlocks.Content ),
        )       
      ),
    )
      )
    },
  } );
} )( window.wp.blocks, window.wp.editor, window.wp.element );
