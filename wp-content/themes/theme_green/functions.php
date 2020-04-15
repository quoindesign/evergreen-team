<?php
/**
 * theme_green functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme_green
 */

if ( ! function_exists( 'theme_green_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function theme_green_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on theme_green, use a find and replace
		 * to change 'theme_green' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'theme_green', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'theme_green' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'theme_green_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'theme_green_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_green_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'theme_green_content_width', 640 );
}
add_action( 'after_setup_theme', 'theme_green_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_green_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theme_green' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'theme_green' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme_green_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_green_scripts() {
	wp_enqueue_style( 'theme_green-style', get_stylesheet_uri() );

	wp_enqueue_style( 'theme_green-style-abovethefold', get_template_directory_uri() . '/css/abovethefold.css');

	wp_enqueue_style( 'theme_green-style-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');

	wp_enqueue_style( 'theme_green-style-plugin', get_template_directory_uri() . '/css/plugin.css');

	wp_enqueue_style( 'theme_green-style-styles', get_template_directory_uri() . '/css/style.css');

	wp_enqueue_style( 'theme_green-style-responsive', get_template_directory_uri() . '/css/responsive.css');

	wp_enqueue_style( 'theme_green-style-header', get_template_directory_uri() . '/css/header.css');

	wp_enqueue_style( 'theme_green-style-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css');

	//wp_enqueue_script( 'theme_green-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'theme_green-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'theme_green-script-plugin', get_template_directory_uri() . '/js/plugin.js', array(), '20151215', true );

	wp_enqueue_script( 'theme_green-script-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );

	wp_enqueue_script( 'theme_green-script-custom', get_template_directory_uri() . '/js/custom.js', array(), '20151215', true );

	wp_enqueue_script( 'theme_green-script-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20151215', true );

}
add_action( 'wp_enqueue_scripts', 'theme_green_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Add Your Menu Locations
function register_my_menus() {
  register_nav_menus(
    array(
    	'ftr_part1' => __( 'Footer Part1' ),
    	'ftr_part2' => __( 'Footer Part2' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

/*
*  Change the Options Page menu to 'Theme Options'
*/
if( function_exists('acf_set_options_page_title') ){

    acf_set_options_page_title( __('Theme Options') );
}

/**
 * Implement Theme Option
 */
if( function_exists('acf_add_options_sub_page') ) {

	acf_add_options_sub_page('Header Block');
	acf_add_options_sub_page('Footer Block');
	acf_add_options_sub_page('Sidebar Block');
}

// Menu Class
function new_submenu_class($menu) {
    $menu = preg_replace('/ class="sub-menu"/','/ class="submenu" /',$menu);
    return $menu;
}
add_filter('wp_nav_menu','new_submenu_class');

function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'menu-1') {
    $classes[] = 'menu-link';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

// SVG
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// Telephone no.
function theme_green_my_telephone_no() {
  $display_as = get_field('display_tel_no_as','option');
	$tel_num = get_field('telephone_no','option');
	$message = 'Call Us! <a href="' + $tel_num + '">' + $tel_num + '</a>';
	return $message;
}

add_shortcode('tel_no', 'theme_green_my_telephone_no');
