(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-roofing_flooring_options-';
		
		// Label
		function roofing_flooring_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-roofing_flooring_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Global Color Setting

			if ( id === 'roofing_flooring_global_color' || id === 'roofing_flooring_heading_color' || id === 'roofing_flooring_paragraph_color') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-roofing_flooring_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'roofing_flooring_scroll_hide' || id === 'roofing_flooring_preloader_hide' || id === 'roofing_flooring_sticky_header' || id === 'roofing_flooring_products_per_row' || id === 'roofing_flooring_scroll_top_position' || id === 'roofing_flooring_products_per_row')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-roofing_flooring_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'roofing_flooring_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-roofing_flooring_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-roofing_flooring_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'roofing_flooring_facebook_icon' || id === 'roofing_flooring_twitter_icon' || id === 'roofing_flooring_intagram_icon'|| id === 'roofing_flooring_linkedin_icon'|| id === 'roofing_flooring_pintrest_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-roofing_flooring_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header

			if ( id === 'roofing_flooring_email_text' || id === 'roofing_flooring_phone_text' || id === 'roofing_flooring_location_text' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-roofing_flooring_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Banner

			if ( id === 'roofing_flooring_slider_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-roofing_flooring_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Our Team

			if ( id === 'roofing_flooring_activities_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-roofing_flooring_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'roofing_flooring_footer_text_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-roofing_flooring_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

	    // Site Identity
		roofing_flooring_customizer_label( 'custom_logo', 'Logo Setup' );
		roofing_flooring_customizer_label( 'site_icon', 'Favicon' );

		// Global Color Setting
		roofing_flooring_customizer_label( 'roofing_flooring_global_color', 'Global Color' );
		roofing_flooring_customizer_label( 'roofing_flooring_heading_color', 'Heading Typography' );
		roofing_flooring_customizer_label( 'roofing_flooring_paragraph_color', 'Paragraph Typography' );

		// General Setting
		roofing_flooring_customizer_label( 'roofing_flooring_preloader_hide', 'Preloader' );
		roofing_flooring_customizer_label( 'roofing_flooring_scroll_hide', 'Scroll To Top' );
		roofing_flooring_customizer_label( 'roofing_flooring_scroll_top_position', 'Scroll to top Position' );
		roofing_flooring_customizer_label( 'roofing_flooring_products_per_row', 'woocommerce Setting' );

		// Colors
		roofing_flooring_customizer_label( 'roofing_flooring_theme_color', 'Theme Color' );
		roofing_flooring_customizer_label( 'background_color', 'Colors' );
		roofing_flooring_customizer_label( 'background_image', 'Image' );

		//Header Image
		roofing_flooring_customizer_label( 'header_image', 'Header Image' );

		// Social Icon
		roofing_flooring_customizer_label( 'roofing_flooring_facebook_icon', 'Facebook' );
		roofing_flooring_customizer_label( 'roofing_flooring_twitter_icon', 'Twitter' );
		roofing_flooring_customizer_label( 'roofing_flooring_intagram_icon', 'Intagram' );
		roofing_flooring_customizer_label( 'roofing_flooring_linkedin_icon', 'Linkedin' );
		roofing_flooring_customizer_label( 'roofing_flooring_pintrest_icon', 'Pintrest' );

		// Header
		roofing_flooring_customizer_label( 'roofing_flooring_email_text', 'Email Address' );
		roofing_flooring_customizer_label( 'roofing_flooring_phone_text', 'Phone' );
		roofing_flooring_customizer_label( 'roofing_flooring_location_text', 'Location' );

		//Banner
		roofing_flooring_customizer_label( 'roofing_flooring_slider_section_setting', 'Banner' );

		//Our Team
		roofing_flooring_customizer_label( 'roofing_flooring_activities_section_setting', 'Our Team' );

		//Footer
		roofing_flooring_customizer_label( 'roofing_flooring_footer_text_setting', 'Footer' );
	

	});

})( jQuery );
