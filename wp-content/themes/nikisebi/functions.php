<?php
/**
 * _s functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nikisebastino
 */

if ( ! function_exists( 'nikisebastino_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nikisebastino_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'nikisebastino' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'nikisebastino', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo' );
	add_theme_support( 'header-text' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	//add_image_size( 'featured-thumb', 260, 250, true );
	//add_image_size( 'medium-thumb', 300, 300, false );
	//add_image_size( 'small-thumb-crop', 300, 200, true );
	//add_image_size( 'small-thumb-no-crop', 300, 200, false );
	//add_image_size( 'lg-thumb-no-crop', 500, 400, false );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'nikisebastino' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nikisebastino_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'nikisebastino_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nikisebastino_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nikisebastino_content_width', 640 );
}
add_action( 'after_setup_theme', 'nikisebastino_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nikisebastino_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nikisebastino' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nikisebastino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'nikisebastino_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nikisebastino_scripts() {
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );
	wp_enqueue_style( 'google-header-font', 'https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,700" rel="stylesheet"' );
	wp_enqueue_style( '_nikisebastino-style', get_template_directory_uri() . '/build/styles/main.min.css' );
	// shane style sheet ' beause the idiot still has not learned modern CSS
	wp_enqueue_style( '_nikisebastino-sl-style', get_template_directory_uri() . '/assets/css/style.css', array(), '3' );
	wp_enqueue_script( '_nikisebastino-script', get_stylesheet_directory_uri().'/build/scripts/main.min.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'nikisebastino_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom filters for this gravity-forms.
 */
require get_template_directory() . '/inc/gravity-forms.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// Remove query string from static files
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

/* remove emoji scripts */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Custom excerpt.
 */
function excerpt($num) {
    $limit = $num+1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt) . '<div class="section-margin-top"><a class="readmore small upper sans-serif" href="'.get_permalink()  . '">' . __('Read More', 'fatlab') . ' </a></div>';
    echo $excerpt;
}

// filter the Gravity Forms button type on Form ID
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
	$formnum = $form['id'];
		return "<button type='submit' id='gform_submit_button_{$form['id']}' class='text-orange small upper sans-serif'>Submit <i class='fa fa-caret-right' aria-hidden='true'></i></a></button>";
}

//read only gf field on agreement form
// update '1' to the ID of your form
add_filter( 'gform_pre_render_6', 'add_readonly_script' );
function add_readonly_script( $form ) {
    ?>

    <script type="text/javascript">
        jQuery(document).ready(function(){
            /* apply only to a input with a class of gf_readonly */
            jQuery("li.gf_readonly input").attr("readonly","readonly");
        });
    </script>

    <?php
    return $form;
}


