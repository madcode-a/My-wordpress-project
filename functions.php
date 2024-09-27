<?php
/**
 * Roofing Flooring functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Roofing Flooring
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Roofing_Flooring_Loader.php' );

$Roofing_Flooring_Loader = new \WPTRT\Autoload\Roofing_Flooring_Loader();

$Roofing_Flooring_Loader->roofing_flooring_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Roofing_Flooring_Loader->roofing_flooring_register();

if ( ! function_exists( 'roofing_flooring_setup' ) ) :

	function roofing_flooring_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		load_theme_textdomain( 'roofing-flooring', get_template_directory() . '/languages' );
		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        add_image_size('roofing-flooring-featured-header-image', 2000, 660, true);

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','roofing-flooring' ),
        ) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'roofing_flooring_custom_background_args', array(
			'default-color' => 'f7ebe5',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 200,
			'width'       => 200,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_roofing_flooring_dismissable_notice', 'roofing_flooring_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'roofing_flooring_setup' );


function roofing_flooring_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'roofing_flooring_content_width', 1170 );
}
add_action( 'after_setup_theme', 'roofing_flooring_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function roofing_flooring_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'roofing-flooring' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'roofing-flooring' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'roofing-flooring' ),
		'id'            => 'roofing-flooring-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'roofing-flooring' ),
		'id'            => 'roofing-flooring-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'roofing-flooring' ),
		'id'            => 'roofing-flooring-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'roofing_flooring_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function roofing_flooring_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'inter',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);
	// font-family: "Outfit", sans-serif;
	wp_enqueue_style(
		'outfit',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'roofing-flooring-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'roofing-flooring-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'roofing-flooring-style',$roofing_flooring_theme_css );

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('roofing-flooring-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'roofing_flooring_scripts' );

/**
 * Enqueue Preloader.
 */
function roofing_flooring_preloader() {

  $roofing_flooring_theme_color_css = '';
  $roofing_flooring_preloader_bg_color = get_theme_mod('roofing_flooring_preloader_bg_color');
  $roofing_flooring_preloader_dot_1_color = get_theme_mod('roofing_flooring_preloader_dot_1_color');
  $roofing_flooring_preloader_dot_2_color = get_theme_mod('roofing_flooring_preloader_dot_2_color');
  $roofing_flooring_logo_max_height = get_theme_mod('roofing_flooring_logo_max_height');

  	if(get_theme_mod('roofing_flooring_logo_max_height') == '') {
		$roofing_flooring_logo_max_height = '200';
	}

	if(get_theme_mod('roofing_flooring_preloader_bg_color') == '') {
		$roofing_flooring_preloader_bg_color = '#EA3A50';
	}
	if(get_theme_mod('roofing_flooring_preloader_dot_1_color') == '') {
		$roofing_flooring_preloader_dot_1_color = '#ffffff';
	}
	if(get_theme_mod('roofing_flooring_preloader_dot_2_color') == '') {
		$roofing_flooring_preloader_dot_2_color = '#000000';
	}
	$roofing_flooring_theme_color_css = '
		.custom-logo-link img{
			max-height: '.esc_attr($roofing_flooring_logo_max_height).'px;
	 	}
		.loading{
			background-color: '.esc_attr($roofing_flooring_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($roofing_flooring_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($roofing_flooring_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'roofing-flooring-style',$roofing_flooring_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'roofing_flooring_preloader' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * TGM
 */
require get_template_directory() . '/inc/tgm.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

function roofing_flooring_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function roofing_flooring_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/*radio button sanitization*/
function roofing_flooring_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function roofing_flooring_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function roofing_flooring_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'roofing_flooring_loop_columns');
if (!function_exists('roofing_flooring_loop_columns')) {
	function roofing_flooring_loop_columns() {
		$columns = get_theme_mod( 'roofing_flooring_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

function roofing_flooring_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'pro_version_footer_setting' );
    $wp_customize->remove_control( 'pro_version_footer_setting' );

}
add_action( 'customize_register', 'roofing_flooring_remove_customize_register', 11 );

/**
 * Get CSS
 */

function roofing_flooring_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
   	wp_localize_script('admin-notice-script','roofing_flooring',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('roofing_flooring_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'roofing_flooring_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_roofing-flooring-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'roofing-flooring-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'roofing_flooring_getpage_css' );

if ( ! defined( 'ROOFING_FLOORING_CONTACT_SUPPORT' ) ) {
define('ROOFING_FLOORING_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/roofing-flooring/','roofing-flooring'));
}
if ( ! defined( 'ROOFING_FLOORING_REVIEW' ) ) {
define('ROOFING_FLOORING_REVIEW',__('https://wordpress.org/support/theme/roofing-flooring/reviews/','roofing-flooring'));
}
if ( ! defined( 'ROOFING_FLOORING_LIVE_DEMO' ) ) {
define('ROOFING_FLOORING_LIVE_DEMO',__('https://demo.themagnifico.net/roofing-flooring/','roofing-flooring'));
}
if ( ! defined( 'ROOFING_FLOORING_GET_PREMIUM_PRO' ) ) {
define('ROOFING_FLOORING_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/flooring-wordpress-theme','roofing-flooring'));
}
if ( ! defined( 'ROOFING_FLOORING_PRO_DOC' ) ) {
define('ROOFING_FLOORING_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/roofing-flooring-pro-doc/','roofing-flooring'));
}
if ( ! defined( 'ROOFING_FLOORING_FREE_DOC' ) ) {
define('ROOFING_FLOORING_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/roofing-flooring-free-doc/','roofing-flooring'));
}

add_action('admin_menu', 'roofing_flooring_themepage');
function roofing_flooring_themepage(){

	$roofing_flooring_theme_test = wp_get_theme();

	$roofing_flooring_theme_info = add_theme_page( __('Theme Options','roofing-flooring'), __(' Theme Options','roofing-flooring'), 'manage_options', 'roofing-flooring-info.php', 'roofing_flooring_info_page' );
}

function roofing_flooring_info_page() {
	$roofing_flooring_theme_user = wp_get_current_user();
	$roofing_flooring_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap roofing-flooring-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','roofing-flooring'); ?><?php echo esc_html( $roofing_flooring_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "roofing-flooring"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Roofing Flooring , feel free to contact us for any support regarding our theme.", "roofing-flooring"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( ROOFING_FLOORING_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "roofing-flooring"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "roofing-flooring"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "roofing-flooring"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( ROOFING_FLOORING_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
							<?php esc_html_e("Get Premium", "roofing-flooring"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "roofing-flooring"); ?></h3>
						<p><?php esc_html_e("If You love Roofing Flooring theme then we would appreciate your review about our theme.", "roofing-flooring"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( ROOFING_FLOORING_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "roofing-flooring"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Free Documentation", "roofing-flooring"); ?></h3>
						<p><?php esc_html_e("Our guide is available if you require any help configuring and setting up the theme. Easy and quick way to setup the theme.", "roofing-flooring"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( ROOFING_FLOORING_FREE_DOC ); ?>" class="button button-primary get">
							<?php esc_html_e("Free Documentation", "roofing-flooring"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","roofing-flooring"); ?></h2>
		<div class="roofing-flooring-button-container">
			<a target="_blank" href="<?php echo esc_url( ROOFING_FLOORING_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "roofing-flooring"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( ROOFING_FLOORING_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "roofing-flooring"); ?>
			</a>
		</div>

		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "roofing-flooring"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "roofing-flooring"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "roofing-flooring"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "roofing-flooring"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "roofing-flooring"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "roofing-flooring"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "roofing-flooring"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="roofing-flooring-button-container">
			<a target="_blank" href="<?php echo esc_url( ROOFING_FLOORING_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
				<?php esc_html_e("Go Premium", "roofing-flooring"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Admin Notice For Getstart
function roofing_flooring_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'roofing_flooring_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}
add_action( 'wp_ajax_roofing_flooring_dismissed_notice_handler', 'roofing_flooring_ajax_notice_handler' );

function roofing_flooring_deprecated_hook_admin_notice() {

    $roofing_flooring_dismissed = get_user_meta(get_current_user_id(), 'roofing_flooring_dismissable_notice', true);
    if ( !$roofing_flooring_dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'roofing-flooring'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'roofing-flooring'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=roofing-flooring-info.php' )); ?>"><?php esc_html_e( 'Get started', 'roofing-flooring' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( ROOFING_FLOORING_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'roofing-flooring' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( ROOFING_FLOORING_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'roofing-flooring' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'roofing_flooring_deprecated_hook_admin_notice' );

function roofing_flooring_switch_theme() {
    delete_user_meta(get_current_user_id(), 'roofing_flooring_dismissable_notice');
}
add_action('after_switch_theme', 'roofing_flooring_switch_theme');
function roofing_flooring_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'roofing_flooring_dismissable_notice', true);
    die();
}