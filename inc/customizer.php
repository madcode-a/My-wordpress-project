<?php
/**
 * Roofing Flooring Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Roofing Flooring
 */

if ( ! defined( 'ROOFING_FLOORING_URL' ) ) {
    define( 'ROOFING_FLOORING_URL', esc_url( 'https://www.themagnifico.net/products/flooring-wordpress-theme', 'roofing-flooring') );
}
if ( ! defined( 'ROOFING_FLOORING_TEXT' ) ) {
    define( 'ROOFING_FLOORING_TEXT', __( 'Roofing Flooring Pro','roofing-flooring' ));
}
if ( ! defined( 'ROOFING_FLOORING_BUY_TEXT' ) ) {
    define( 'ROOFING_FLOORING_BUY_TEXT', __( 'Buy Roofing Flooring Pro','roofing-flooring' ));
}

use WPTRT\Customize\Section\Roofing_Flooring_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Roofing_Flooring_Button::class );

    $manager->add_section(
        new Roofing_Flooring_Button( $manager, 'roofing_flooring_pro', [
            'title'       => esc_html( ROOFING_FLOORING_TEXT,'roofing-flooring' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'roofing-flooring' ),
            'button_url'  => esc_url( ROOFING_FLOORING_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'roofing-flooring-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'roofing-flooring-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function roofing_flooring_customize_register($wp_customize){

    // Pro Version
    class Roofing_Flooring_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( ROOFING_FLOORING_BUY_TEXT,'roofing-flooring' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Roofing_Flooring_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('roofing_flooring_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'roofing_flooring_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'roofing_flooring_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'roofing-flooring' ),
        'section'        => 'title_tagline',
        'settings'       => 'roofing_flooring_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('roofing_flooring_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'roofing_flooring_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'roofing_flooring_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'roofing-flooring' ),
        'section'        => 'title_tagline',
        'settings'       => 'roofing_flooring_theme_description',
        'type'           => 'checkbox',
    )));

    //Logo
    $wp_customize->add_setting('roofing_flooring_logo_max_height',array(
        'default'   => '200',
        'sanitize_callback' => 'roofing_flooring_sanitize_number_absint'
    ));
    $wp_customize->add_control('roofing_flooring_logo_max_height',array(
        'label' => esc_html__('Logo Width','roofing-flooring'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // Global Color Settings
     $wp_customize->add_section('roofing_flooring_global_color_settings',array(
        'title' => esc_html__('Global Settings','roofing-flooring'),
        'priority'   => 28,
    ));

    $wp_customize->add_setting( 'roofing_flooring_global_color', array(
        'default' => '#EA3A50',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'roofing_flooring_global_color', array(
        'description' => __('Change the global color of the theme in one click.', 'roofing-flooring'),
        'section' => 'roofing_flooring_global_color_settings',
        'settings' => 'roofing_flooring_global_color',
    )));

    //Typography option
    $roofing_flooring_font_array = array(
        ''                       => 'No Fonts',
        'Abril Fatface'          => 'Abril Fatface',
        'Acme'                   => 'Acme',
        'Anton'                  => 'Anton',
        'Architects Daughter'    => 'Architects Daughter',
        'Arimo'                  => 'Arimo',
        'Arsenal'                => 'Arsenal',
        'Arvo'                   => 'Arvo',
        'Alegreya'               => 'Alegreya',
        'Alfa Slab One'          => 'Alfa Slab One',
        'Averia Serif Libre'     => 'Averia Serif Libre',
        'Bangers'                => 'Bangers',
        'Boogaloo'               => 'Boogaloo',
        'Bad Script'             => 'Bad Script',
        'Bitter'                 => 'Bitter',
        'Bree Serif'             => 'Bree Serif',
        'BenchNine'              => 'BenchNine',
        'Cabin'                  => 'Cabin',
        'Cardo'                  => 'Cardo',
        'Courgette'              => 'Courgette',
        'Cherry Swash'           => 'Cherry Swash',
        'Cormorant Garamond'     => 'Cormorant Garamond',
        'Crimson Text'           => 'Crimson Text',
        'Cuprum'                 => 'Cuprum',
        'Cookie'                 => 'Cookie',
        'Chewy'                  => 'Chewy',
        'Days One'               => 'Days One',
        'Dosis'                  => 'Dosis',
        'Droid Sans'             => 'Droid Sans',
        'Economica'              => 'Economica',
        'Fredoka One'            => 'Fredoka One',
        'Fjalla One'             => 'Fjalla One',
        'Francois One'           => 'Francois One',
        'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
        'Gloria Hallelujah'      => 'Gloria Hallelujah',
        'Great Vibes'            => 'Great Vibes',
        'Handlee'                => 'Handlee',
        'Hammersmith One'        => 'Hammersmith One',
        'Inconsolata'            => 'Inconsolata',
        'Indie Flower'           => 'Indie Flower',
        'IM Fell English SC'     => 'IM Fell English SC',
        'Julius Sans One'        => 'Julius Sans One',
        'Josefin Slab'           => 'Josefin Slab',
        'Josefin Sans'           => 'Josefin Sans',
        'Kanit'                  => 'Kanit',
        'Lobster'                => 'Lobster',
        'Lato'                   => 'Lato',
        'Lora'                   => 'Lora',
        'Libre Baskerville'      => 'Libre Baskerville',
        'Lobster Two'            => 'Lobster Two',
        'Merriweather'           => 'Merriweather',
        'Monda'                  => 'Monda',
        'Montserrat'             => 'Montserrat',
        'Muli'                   => 'Muli',
        'Marck Script'           => 'Marck Script',
        'Noto Serif'             => 'Noto Serif',
        'Open Sans'              => 'Open Sans',
        'Overpass'               => 'Overpass',
        'Overpass Mono'          => 'Overpass Mono',
        'Oxygen'                 => 'Oxygen',
        'Orbitron'               => 'Orbitron',
        'Patua One'              => 'Patua One',
        'Pacifico'               => 'Pacifico',
        'Padauk'                 => 'Padauk',
        'Playball'               => 'Playball',
        'Playfair Display'       => 'Playfair Display',
        'PT Sans'                => 'PT Sans',
        'Philosopher'            => 'Philosopher',
        'Permanent Marker'       => 'Permanent Marker',
        'Poiret One'             => 'Poiret One',
        'Quicksand'              => 'Quicksand',
        'Quattrocento Sans'      => 'Quattrocento Sans',
        'Raleway'                => 'Raleway',
        'Rubik'                  => 'Rubik',
        'Roboto'                 => 'Roboto',
        'Rokkitt'                => 'Rokkitt',
        'Russo One'              => 'Russo One',
        'Righteous'              => 'Righteous',
        'Slabo'                  => 'Slabo',
        'Source Sans Pro'        => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light'     => 'Shadows Into Light',
        'Sacramento'             => 'Sacramento',
        'Shrikhand'              => 'Shrikhand',
        'Tangerine'              => 'Tangerine',
        'Ubuntu'                 => 'Ubuntu',
        'VT323'                  => 'VT323',
        'Varela Round'           => 'Varela Round',
        'Vampiro One'            => 'Vampiro One',
        'Vollkorn'               => 'Vollkorn',
        'Volkhov'                => 'Volkhov',
        'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
    );

    // Heading Typography
    $wp_customize->add_setting( 'roofing_flooring_heading_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'roofing_flooring_heading_color', array(
        'label' => __('Heading Color', 'roofing-flooring'),
        'section' => 'roofing_flooring_global_color_settings',
        'settings' => 'roofing_flooring_heading_color',
    )));

    $wp_customize->add_setting('roofing_flooring_heading_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'roofing_flooring_sanitize_choices',
    ));
    $wp_customize->add_control( 'roofing_flooring_heading_font_family', array(
        'section' => 'roofing_flooring_global_color_settings',
        'label'   => __('Heading Fonts', 'roofing-flooring'),
        'type'    => 'select',
        'choices' => $roofing_flooring_font_array,
    ));

    $wp_customize->add_setting('roofing_flooring_heading_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_heading_font_size',array(
        'label' => esc_html__('Heading Font Size','roofing-flooring'),
        'section' => 'roofing_flooring_global_color_settings',
        'setting' => 'roofing_flooring_heading_font_size',
        'type'  => 'text'
    ));

    // Paragraph Typography
    $wp_customize->add_setting( 'roofing_flooring_paragraph_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'roofing_flooring_paragraph_color', array(
        'label' => __('Paragraph Color', 'roofing-flooring'),
        'section' => 'roofing_flooring_global_color_settings',
        'settings' => 'roofing_flooring_paragraph_color',
    )));

    $wp_customize->add_setting('roofing_flooring_paragraph_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'roofing_flooring_sanitize_choices',
    ));
    $wp_customize->add_control( 'roofing_flooring_paragraph_font_family', array(
        'section' => 'roofing_flooring_global_color_settings',
        'label'   => __('Paragraph Fonts', 'roofing-flooring'),
        'type'    => 'select',
        'choices' => $roofing_flooring_font_array,
    ));

    $wp_customize->add_setting('roofing_flooring_paragraph_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_paragraph_font_size',array(
        'label' => esc_html__('Paragraph Font Size','roofing-flooring'),
        'section' => 'roofing_flooring_global_color_settings',
        'setting' => 'roofing_flooring_paragraph_font_size',
        'type'  => 'text'
    ));

    // General Settings
     $wp_customize->add_section('roofing_flooring_general_settings',array(
        'title' => esc_html__('General Settings','roofing-flooring'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('roofing_flooring_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'roofing_flooring_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'roofing_flooring_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'roofing-flooring' ),
        'section'        => 'roofing_flooring_general_settings',
        'settings'       => 'roofing_flooring_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'roofing_flooring_preloader_bg_color', array(
        'default' => '#EA3A50',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'roofing_flooring_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','roofing-flooring'),
        'section' => 'roofing_flooring_general_settings',
        'settings' => 'roofing_flooring_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'roofing_flooring_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'roofing_flooring_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','roofing-flooring'),
        'section' => 'roofing_flooring_general_settings',
        'settings' => 'roofing_flooring_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'roofing_flooring_preloader_dot_2_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'roofing_flooring_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','roofing-flooring'),
        'section' => 'roofing_flooring_general_settings',
        'settings' => 'roofing_flooring_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('roofing_flooring_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'roofing_flooring_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'roofing_flooring_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'roofing-flooring' ),
        'section'        => 'roofing_flooring_general_settings',
        'settings'       => 'roofing_flooring_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('roofing_flooring_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'roofing_flooring_sanitize_choices'
    ));
    $wp_customize->add_control('roofing_flooring_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'roofing_flooring_general_settings',
        'choices' => array(
            'Right' => __('Right','roofing-flooring'),
            'Left' => __('Left','roofing-flooring'),
            'Center' => __('Center','roofing-flooring')
        ),
    ) );

    // Product Columns
    $wp_customize->add_setting( 'roofing_flooring_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'roofing_flooring_sanitize_select',
    ) );

    $wp_customize->add_control('roofing_flooring_products_per_row', array(
       'label' => __( 'Product per row', 'roofing-flooring' ),
       'section'  => 'roofing_flooring_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );    

    //Top Header
    $wp_customize->add_section('roofing_flooring_top_header',array(
        'title' => esc_html__('Top Header Option','roofing-flooring')
    ));

    $wp_customize->add_setting('roofing_flooring_email_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_email_text',array(
        'label' => esc_html__('Email Text','roofing-flooring'),
        'section' => 'roofing_flooring_top_header',
        'setting' => 'roofing_flooring_email_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_email',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('roofing_flooring_email',array(
        'label' => esc_html__('Email Address','roofing-flooring'),
        'section' => 'roofing_flooring_top_header',
        'setting' => 'roofing_flooring_email',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_phone_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_phone_text',array(
        'label' => esc_html__('Phone Text','roofing-flooring'),
        'section' => 'roofing_flooring_top_header',
        'setting' => 'roofing_flooring_phone_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_phone_number',array(
        'default' => '',
        'sanitize_callback' => 'roofing_flooring_sanitize_phone_number'
    ));
    $wp_customize->add_control('roofing_flooring_phone_number',array(
        'label' => esc_html__('Phone Number','roofing-flooring'),
        'section' => 'roofing_flooring_top_header',
        'setting' => 'roofing_flooring_phone_number',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_location_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_location_text',array(
        'label' => esc_html__('Location Text','roofing-flooring'),
        'section' => 'roofing_flooring_top_header',
        'setting' => 'roofing_flooring_location_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_location',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_location',array(
        'label' => esc_html__('Our Location','roofing-flooring'),
        'section' => 'roofing_flooring_top_header',
        'setting' => 'roofing_flooring_location',
        'type'  => 'text'
    ));

    //Slider
    $wp_customize->add_section('roofing_flooring_top_slider',array(
        'title' => esc_html__('Banner Settings','roofing-flooring'),
    ));

    $wp_customize->add_setting('roofing_flooring_slider_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'roofing_flooring_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'roofing_flooring_slider_section_setting',array(
        'label'          => __( 'Show Banner', 'roofing-flooring' ),
        'section'        => 'roofing_flooring_top_slider',
        'settings'       => 'roofing_flooring_slider_section_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('roofing_flooring_banner_short_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_banner_short_heading',array(
        'label' => __('Short Heading','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_banner_short_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_banner_main_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_banner_main_heading',array(
        'label' => __('Main Heading','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_banner_main_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_banner_main_content',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_banner_main_content',array(
        'label' => __('Content','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_banner_main_content',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_banner_button_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_banner_button_text',array(
        'label' => __('Banner Button Text','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_banner_button_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_banner_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_banner_button_url',array(
        'label' => __('Banner Button Url','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_banner_button_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('roofing_flooring_contact_box_left_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_contact_box_left_heading',array(
        'label' => __('Contact Form Heading','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_contact_box_left_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_contact_box_left_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_contact_box_left_text',array(
        'label' => __('Contact Form Text','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_contact_box_left_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_contact_box_phone_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_contact_box_phone_text',array(
        'label' => esc_html__('Contact Form Phone Text','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_contact_box_phone_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_contact_box_phone_number',array(
        'default' => '',
        'sanitize_callback' => 'roofing_flooring_sanitize_phone_number'
    ));
    $wp_customize->add_control('roofing_flooring_contact_box_phone_number',array(
        'label' => esc_html__('Contact Form Phone Number','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_contact_box_phone_number',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_contact_form_shortcode',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_contact_form_shortcode',array(
        'label' => __('Contact Form Shortcode','roofing-flooring'),
        'description' => __('Add Contact Form Shortcode Here','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_contact_form_shortcode',
        'type'    => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_banner_center_image',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( 
    $wp_customize,'roofing_flooring_banner_center_image',array(
        'label' => __('Banner Right Image ','roofing-flooring'),
        'description' => __('Dimension 400 x 500 ','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'settings' => 'roofing_flooring_banner_center_image',
    )));

    $wp_customize->add_setting('roofing_flooring_right_image_box_1_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_right_image_box_1_heading',array(
        'label' => esc_html__('Image Box 1 Heading','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_right_image_box_1_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_right_image_box_2_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_right_image_box_2_heading',array(
        'label' => esc_html__('Image Box 2 Heading','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_right_image_box_2_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_right_image_box_3_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_right_image_box_3_heading',array(
        'label' => esc_html__('Image Box 3 Number','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_right_image_box_3_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_right_image_box_3_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_right_image_box_3_text',array(
        'label' => esc_html__('Image Box 3 Text','roofing-flooring'),
        'section' => 'roofing_flooring_top_slider',
        'setting' => 'roofing_flooring_right_image_box_3_text',
        'type'  => 'text'
    ));

    // Our Team
    $wp_customize->add_section('roofing_flooring_services_section',array(
        'title' => esc_html__('Our Team Option','roofing-flooring'),
    ));

    $wp_customize->add_setting('roofing_flooring_activities_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'roofing_flooring_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'roofing_flooring_activities_section_setting',array(
        'label'          => __( 'Show Our Team', 'roofing-flooring' ),
        'section'        => 'roofing_flooring_services_section',
        'settings'       => 'roofing_flooring_activities_section_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('roofing_flooring_services_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_services_heading',array(
        'label' => esc_html__('Short Heading','roofing-flooring'),
        'section' => 'roofing_flooring_services_section',
        'setting' => 'roofing_flooring_services_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('roofing_flooring_services_content',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('roofing_flooring_services_content',array(
        'label' => esc_html__('Heading','roofing-flooring'),
        'section' => 'roofing_flooring_services_section',
        'setting' => 'roofing_flooring_services_content',
        'type'  => 'text'
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('roofing_flooring_services_sec_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'roofing_flooring_sanitize_select',
    ));
    $wp_customize->add_control('roofing_flooring_services_sec_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display Our Team','roofing-flooring'),
        'section' => 'roofing_flooring_services_section',
    ));

    for ($i=1; $i <=8; $i++) {
        $wp_customize->add_setting('roofing_flooring_services_team_designation'.$i,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('roofing_flooring_services_team_designation'.$i,array(
            'label' => esc_html__('Designation ','roofing-flooring').$i,
            'section' => 'roofing_flooring_services_section',
            'setting' => 'roofing_flooring_services_team_designation'.$i,
            'type'  => 'text'
        ));
        $wp_customize->add_setting('roofing_flooring_facebook_icon'.$i,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('roofing_flooring_facebook_icon'.$i,array(
            'label' => esc_html__('Facebook Icon ','roofing-flooring') .$i,
            'section' => 'roofing_flooring_services_section',
            'setting' => 'roofing_flooring_facebook_icon'.$i,
            'type'  => 'text',
            'default' => 'fab fa-facebook-f',
            'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-facebook-f','roofing-flooring')
        ));

        $wp_customize->add_setting('roofing_flooring_facebook_url' .$i,array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('roofing_flooring_facebook_url' .$i,array(
            'label' => esc_html__('Facebook Link ','roofing-flooring') .$i,
            'section' => 'roofing_flooring_services_section',
            'setting' => 'roofing_flooring_facebook_url'.$i,
            'type'  => 'url'
        ));

        $wp_customize->add_setting('roofing_flooring_twitter_icon'.$i,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('roofing_flooring_twitter_icon' .$i,array(
            'label' => esc_html__('Twitter Icon ','roofing-flooring') .$i,
            'section' => 'roofing_flooring_services_section',
            'setting' => 'roofing_flooring_twitter_icon'.$i,
            'type'  => 'text',
            'default' => 'fab fa-twitter',
            'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-twitter','roofing-flooring')
        ));

        $wp_customize->add_setting('roofing_flooring_twitter_url'.$i,array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('roofing_flooring_twitter_url'.$i,array(
            'label' => esc_html__('Twitter Link ','roofing-flooring').$i,
            'section' => 'roofing_flooring_services_section',
            'setting' => 'roofing_flooring_twitter_url'.$i,
            'type'  => 'url'
        ));

        $wp_customize->add_setting('roofing_flooring_intagram_icon' .$i,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('roofing_flooring_intagram_icon'.$i,array(
            'label' => esc_html__('Intagram Icon ','roofing-flooring').$i,
            'section' => 'roofing_flooring_services_section',
            'setting' => 'roofing_flooring_intagram_icon'.$i,
            'type'  => 'text',
            'default' => 'fab fa-instagram',
            'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-instagram','roofing-flooring')
        ));

        $wp_customize->add_setting('roofing_flooring_intagram_url' .$i,array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('roofing_flooring_intagram_url' .$i,array(
            'label' => esc_html__('Intagram Link ','roofing-flooring').$i,
            'section' => 'roofing_flooring_services_section',
            'setting' => 'roofing_flooring_intagram_url'.$i,
            'type'  => 'url'
        ));

        $wp_customize->add_setting('roofing_flooring_linkedin_icon'.$i,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('roofing_flooring_linkedin_icon'.$i,array(
            'label' => esc_html__('Linkedin Icon ','roofing-flooring').$i,
            'section' => 'roofing_flooring_services_section',
            'setting' => 'roofing_flooring_linkedin_icon'.$i,
            'type'  => 'text',
            'default' => 'fab fa-linkedin-in',
            'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-linkedin-in','roofing-flooring')
        ));

        $wp_customize->add_setting('roofing_flooring_linkedin_url'.$i,array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('roofing_flooring_linkedin_url'.$i,array(
            'label' => esc_html__('Linkedin Link ','roofing-flooring').$i,
            'section' => 'roofing_flooring_services_section',
            'setting' => 'roofing_flooring_linkedin_url'.$i,
            'type'  => 'url'
        ));

        $wp_customize->add_setting('roofing_flooring_pintrest_icon'.$i,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('roofing_flooring_pintrest_icon'.$i,array(
            'label' => esc_html__('Pinterest Icon ','roofing-flooring').$i,
            'section' => 'roofing_flooring_services_section',
            'setting' => 'roofing_flooring_pintrest_icon'.$i,
            'type'  => 'text',
            'default' => 'fab fa-pinterest-p',
            'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-pinterest-p','roofing-flooring')
        ));

        $wp_customize->add_setting('roofing_flooring_pintrest_url'.$i,array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('roofing_flooring_pintrest_url'.$i,array(
            'label' => esc_html__('Pinterest Link ','roofing-flooring').$i,
            'section' => 'roofing_flooring_services_section',
            'setting' => 'roofing_flooring_pintrest_url'.$i,
            'type'  => 'url'
        ));
    }

    // Post Settings
     $wp_customize->add_section('roofing_flooring_post_settings',array(
        'title' => esc_html__('Post Settings','roofing-flooring'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('roofing_flooring_post_page_title',array(
        'sanitize_callback' => 'roofing_flooring_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('roofing_flooring_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'roofing-flooring'),
        'section'     => 'roofing_flooring_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'roofing-flooring'),
    ));

    $wp_customize->add_setting('roofing_flooring_post_page_meta',array(
        'sanitize_callback' => 'roofing_flooring_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('roofing_flooring_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'roofing-flooring'),
        'section'     => 'roofing_flooring_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'roofing-flooring'),
    ));

    $wp_customize->add_setting('roofing_flooring_post_page_thumb',array(
        'sanitize_callback' => 'roofing_flooring_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('roofing_flooring_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'roofing-flooring'),
        'section'     => 'roofing_flooring_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'roofing-flooring'),
    ));
    
    // Footer
    $wp_customize->add_section('roofing_flooring_site_footer_section', array(
        'title' => esc_html__('Footer', 'roofing-flooring'),
    ));

    $wp_customize->add_setting('roofing_flooring_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('roofing_flooring_footer_text_setting', array(
        'label' => __('Replace the footer text', 'roofing-flooring'),
        'section' => 'roofing_flooring_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('roofing_flooring_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'roofing_flooring_sanitize_checkbox'
    ));
    $wp_customize->add_control('roofing_flooring_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','roofing-flooring'),
        'section' => 'roofing_flooring_site_footer_section',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Roofing_Flooring_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Roofing_Flooring_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'roofing_flooring_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'roofing-flooring' ),
        'description' => esc_url( ROOFING_FLOORING_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'roofing_flooring_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function roofing_flooring_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function roofing_flooring_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function roofing_flooring_customize_preview_js(){
    wp_enqueue_script('roofing-flooring-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'roofing_flooring_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function roofing_flooring_panels_js() {
    wp_enqueue_style( 'roofing-flooring-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'roofing-flooring-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'roofing_flooring_panels_js' );