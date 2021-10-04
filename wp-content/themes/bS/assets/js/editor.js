wp.domReady( () => {

	wp.blocks.registerBlockStyle( 'core/heading', [ 
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'alt',
			label: 'Alternate',
		}
	]);
} );