( function( blocks, editor, components, i18n, element ) {
  var el = element.createElement;
var RichText = editor.RichText;
var BlockControls = editor.BlockControls;
var AlignmentToolbar = editor.AlignmentToolbar;
var MediaUpload = editor.MediaUpload;
var InspectorControls = editor.InspectorControls;
var TextControl = components.TextControl;
  blocks.registerBlockType( 'lb/extranavi', {
    title: 'ExtraNavi', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'common', // The category of block in editor.
attributes: {
  content: {
  type: 'text',
  selector: 'p'
  },
  button: {
    type: 'string',
    default: 'Join Today'
  },
  mediaID: {
  type: 'number'
  },
  mediaURL: {
  type: 'string',
  source: 'attribute',
  selector: 'img',
  attribute: 'src'
  },
  mediaALT: {
  type: 'string',
  source: 'attribute',
  selector: 'img',
  attribute: 'alt'
  }, 
/*  */
  title: {
  type: 'text',
  selector: 'h3'
  },
  text: {
  type: 'text',
  selector: 'p'
  },
  buttonText: {
  type: 'text'
  },
  buttonURL: {
  type: 'url'
  },
  alignment: {
  type: 'string',
  default: 'center'
  },
  mediaID_a: {
  type: 'number'
  },
  mediaURL_a: {
  type: 'string',
  source: 'attribute',
  selector: 'img',
  attribute: 'src'
  },
  mediaALT_a: {
  type: 'string',
  source: 'attribute',
  selector: 'img',
  attribute: 'alt'
  }, 
  buttonURL_a: {
  type: 'url'
  },

  mediaID_b: {
  type: 'number'
  },
  mediaURL_b: {
  type: 'string',
  source: 'attribute',
  selector: 'img',
  attribute: 'src'
  },
  mediaALT_b: {
  type: 'string',
  source: 'attribute',
  selector: 'img',
  attribute: 'alt'
  }, 
  buttonURL_b: {
  type: 'url'
  },
  mediaID_c: {
  type: 'number'
  },
  mediaURL_c: {
  type: 'string',
  source: 'attribute',
  selector: 'img',
  attribute: 'src'
  },
  mediaALT_c: {
  type: 'string',
  source: 'attribute',
  selector: 'img',
  attribute: 'alt'
  }, 
  buttonURL_c: {
  type: 'url'
  },  
},
edit: function( props ) {

var onSelectImage = function (media) {
return props.setAttributes({
mediaURL: media.url,
mediaID: media.id,
mediaALT: 'media.alt'
})
};
var onSelectImageA = function (media) {
return props.setAttributes({
mediaURL_a: media.url,
mediaID_a: media.id,
mediaALT_a: media.alt
})
};

var onSelectImageB = function (media) {
return props.setAttributes({
mediaURL_b: media.url,
mediaID_b: media.id,
mediaALT_b: media.alt
})

};
var onSelectImageC = function (media) {
return props.setAttributes({
mediaURL_c: media.url,
mediaID_c: media.id,
mediaALT_c: media.alt
})

};
var attributes = props.attributes;
  return (
    el( 'div', { className: 'cc' , style:{display:'inline-block',width:'100%',verticalAlign:'top',border:'1px solid gray'},},
      el('div',{
        className: 'b',
        style:{display:'inline-block',width:'33.3%',verticalAlign:'top',border:'1px solid red'},
        },
        el('span',{className: 'b',style:{display:'inline-block',padding:'9px',width:'100%',verticalAlign:'top'},},'Item-LogoImage: '),          
        el(
          MediaUpload, {
            onSelect: onSelectImageA,
            type: 'image',
            value: attributes.mediaID_a,
            render: function (obj) {
              return el(
                components.Button, {
                className: attributes.mediaID_a ? 'image-button' : 'button button-large',
                style:{height:'auto',width:'98%', margin:'8px auto'},
                onClick: obj.open
                },
                !props.attributes.mediaID_a ? i18n.__('Upload Image', 'lb') : 
                el('img', {className: 'mybild',src: attributes.mediaURL_a,alt: attributes.mediaALT_a,
                style:{height:'auto',width:'auto'}})
              )
            }
          }
        ),
        el('span',{className: 'b',style:{display:'inline-block',padding:'9px',width:'48%',verticalAlign:'top'},},'Item-LogoURL: '),          
       
          el(
          RichText,
          {
            key: 'editable',
            tagName: 'span',
            style:{display:'inline-block',padding:'8px',width:'50%',verticalAlign:'top',border:'1px solid gray'},
            className: 'bxxx',
            value: attributes.buttonURL_a,
            onChange: function( newText ) {
              props.setAttributes( { buttonURL_a: newText } );
            }
          }
        ),
      ),
/*

      */
      el(
        'div',
        {
          className: 'b',
          style:{display:'inline-block',width:'33.3%',verticalAlign:'top',border:'1px solid red'},
        },
      el('span',{className: 'b',style:{display:'inline-block',padding:'9px',width:'100%',verticalAlign:'top'},},'Item-LogoImage: '),          
        el(
          MediaUpload, {
            onSelect: onSelectImage,
            type: 'image',
            value: attributes.mediaID,
            render: function (obj) {
              return el(
                components.Button, {
                className: attributes.mediaID ? 'image-button' : 'button button-large',
                style:{height:'auto',width:'98%', margin:'8px auto'},
                onClick: obj.open
                },
                !attributes.mediaID ? i18n.__('Upload Image', 'lb') : 
                el('img', {className: 'mybild',src: attributes.mediaURL,alt: attributes.mediaALT,
                style:{height:'auto',width:'auto'}})
              )
            }
          }
        ),
      el('span',{className: 'b',style:{display:'inline-block',padding:'9px',width:'48%',verticalAlign:'top'},},'Item-LogoURL: '),          
          el(
          RichText,
          {
            key: 'editable',
            tagName: 'span',
            className: 'bxxx',
           style:{display:'inline-block',padding:'8px',width:'50%',verticalAlign:'top',border:'1px solid gray'},
           value: attributes.buttonURL_b,
            onChange: function( newText ) {
              props.setAttributes( { buttonURL_b: newText } );
            }
          }
        ),        
      ),

 /*     el(
        'div',
        {
          className: 'b',
          style:{display:'inline-block',width:'33.3%',verticalAlign:'top',border:'1px solid red'},
        },
      el('span',{className: 'b',style:{display:'inline-block',padding:'9px',width:'100%',verticalAlign:'top'},},'Item-LogoImage: '),          
      
        el(
          MediaUpload, {
            onSelect: onSelectImageC,
            type: 'image',
            value: attributes.mediaID_c,
            render: function (obj) {
              return el(
                components.Button, {
                className: attributes.mediaID_c ? 'image-button' : 'button button-large',
                style:{height:'auto',width:'98%', margin:'8px auto'},
                onClick: obj.open
                },
                !props.attributes.mediaID_c ? i18n.__('Upload Image', 'lb') : 
                el('img', {className: 'mybild',src: attributes.mediaURL_c,alt:attributes.mediaALT_c,
                style:{height:'auto',width:'auto'}})
              )
            }
          }
        ),
      el('span',{className: 'b',style:{display:'inline-block',padding:'9px',width:'48%',verticalAlign:'top'},},'Item-LogoURL: '),          
           
       
          el(
          RichText,
          {
            key: 'editable',
            tagName: 'span',
            className: 'bxxx',
           style:{display:'inline-block',padding:'8px',width:'50%',verticalAlign:'top',border:'1px solid gray'},
           value: attributes.buttonURL_c,
            onChange: function( newText ) {
              props.setAttributes( { buttonURL_c: newText } );
            }
          }
        ),  
      ),   
      */   
    )
  );
},
save: function( props ) {
  var attributes = props.attributes;
  return (
    el( 'section', { className: 'content_section'},

  el(
    'div', 
    {
      className: 'navi-item',
      style: {textAlign: attributes.alignment}
    },
    el(
      'div', {
      className: 'wp-block-media-text__media'
      },
      el('a', {
      className: 'my-block-button',
      href: attributes.buttonURL_a
      },       
      el('img', {
      src: attributes.mediaURL_a,
      alt: attributes.mediaALT_a
      }))
    )
  ),


  el(
    'div', 
    {
      className: 'navi-item',
      style: {textAlign: attributes.alignment}
    },
    el(
      'div', {
      className: 'wp-block-media-text__media'
      },
      el('a', {
      className: 'my-block-button',
      href: attributes.buttonURL
      },       
      el('img', {
      src: attributes.mediaURL,
      alt: attributes.mediaALT
      }))
    )
  ),
/*
  el(
    'div', 
    {
      className: 'navi-item',
      style: {textAlign: attributes.alignment}
    },
    el(
      'div', {
      className: 'wp-block-media-text__media'
      },
      el('a', {
      className: 'my-block-button',
      href: attributes.buttonURL_c
      },       
      el('img', {
      src: attributes.mediaURL_c,
      alt: attributes.mediaALT_c
      }))
    )
  ),


*/

  )
  );
}, // end save
}// end registerBlockType
);
} // end function
)( window.wp.blocks,
window.wp.blockEditor,
window.wp.components,
window.wp.i18n,
window.wp.element );