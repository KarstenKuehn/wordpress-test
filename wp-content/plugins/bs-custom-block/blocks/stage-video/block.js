(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;
var registerBlockType = blocks.registerBlockType;
var RichText = editor.RichText;
var BlockControls = editor.BlockControls;
var AlignmentToolbar = editor.AlignmentToolbar;
var MediaUpload = editor.MediaUpload;
var InspectorControls = editor.InspectorControls;
var TextControl = components.TextControl;


const iconEl = el('svg', { width: 20, height: 20 },
  el('path', { d: "M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z" } )
);
  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/stage-video-modul', {
    title: 'Stage-Video Modul', // The title of block in editor.
    icon: 'align-pull-left', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.
    attributes: {

    mediaID: {
    type: 'number'
    },
    mediaURL: {
    type: 'string',
    source: 'attribute',
    selector: 'video',
    attribute: 'src'
    },
    mediaALT: {
    type: 'string',
    source: 'attribute',
    selector: 'video',
    attribute: 'alt'
    },
    alignment: {
    type: 'string',
    default: 'center'
    }
    },    
    edit: function(props) {

  var attributes = props.attributes;
  var onSelectVideo = function (media) {
  return props.setAttributes({
  mediaURL: media.url,
  mediaID: media.id,
  mediaALT: media.alt
  })
  };

      return[ 
/*
    el(BlockControls, {key: 'controls'},
      el('div', {
        className: 'components-toolbar'
        },
        el(MediaUpload, {
          onSelect: onSelectVideo,
          type: 'video',
          render: function (obj) {
          return el(components.Button, {
            className: 'components-icon-button components-toolbar__control',
            onClick: obj.open
            },
            el(
              'svg', 
              {className: 'dashicon dashicons-edit', width: '20', height: '20'},
              el('path', {d: 'M2.25 1h15.5c.69 0 1.25.56 1.25 1.25v15.5c0 .69-.56 1.25-1.25 1.25H2.25C1.56 19 1 18.44 1 17.75V2.25C1 1.56 1.56 1 2.25 1zM17 17V3H3v14h14zM10 6c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zm3 5s0-6 3-6v10c0 .55-.45 1-1 1H5c-.55 0-1-.45-1-1V8c2 0 3 4 3 4s1-3 3-3 3 2 3 2z'})
            ));
          }
        })
      ),
      el(AlignmentToolbar, {
      value: attributes.alignment,
      onChange: function(newAlignment) {
      props.setAttributes({ alignment: newAlignment })
      }
      })
    ),
          el(
        'div', {
          className: 'wp-block-media-text__media',
          style:{display:'inline-block',width:'50%',verticalAlign:'top', padding:'10px'},
        },
              el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Stage-Video' ),
        el(
          MediaUpload, {
            onSelect: onSelectVideo,
            type: 'video',
            value: attributes.mediaID,
            render: function (obj) {
              return el(
                components.Button, {
                className: attributes.mediaID ? 'video-button' : 'button button-large',
                style:{height:'auto',width:'auto'},
                onClick: obj.open
                },
                !attributes.mediaID ? i18n.__('Upload Video', 'my-first-gutenberg-block') : el('video', {autoplay:'1', loop:"1", muted:"1" ,src: attributes.mediaURL,
                style:{height:'auto',width:'100%'}})
              )
            }
          }
        )
        )
    ),
*/ 
      el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
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
      )
     
      ];
    },

  save: function (props) {
  var attributes = props.attributes;
  var video_datei=attributes.mediaURL;
      return el( 'div', { className:'modul stage-video' },
/*
el('video', {autoplay:'1', loop:"1", muted:"1" ,src: attributes.mediaURL,
                style:{height:'auto',width:'100%'}}),
*/
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