<?php
/**
 * Woomer Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Woomer_Theme
 */

if ( ! function_exists( 'woomer_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function woomer_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Woomer Theme, use a find and replace
		 * to change 'woomer-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'woomer-theme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'woomer-theme' ),
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
		add_theme_support( 'custom-background', apply_filters( 'woomer_theme_custom_background_args', array(
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
add_action( 'after_setup_theme', 'woomer_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function woomer_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'woomer_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'woomer_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function woomer_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'woomer-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'woomer-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'woomer_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function woomer_theme_scripts() {
	wp_enqueue_style( 'woomer-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'woomer-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'woomer-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'woomer_theme_scripts' );





/* 
	Custom Code
*/
register_sidebar( array(
	'name' => 'Footer Sidebar 1',
	'id' => 'footer-sidebar-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array(
	'name' => 'Footer Sidebar 2',
	'id' => 'footer-sidebar-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array(
	'name' => 'Footer Sidebar 3',
	'id' => 'footer-sidebar-3',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
function create_faqs_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
$labels = array(
	'name'              => _x( 'type', 'taxonomy general name', 'textdomain' ),
	'singular_name'     => _x( 'type', 'taxonomy singular name', 'textdomain' ),
	'search_items'      => __( 'Search Types', 'textdomain' ),
	'all_items'         => __( 'All Types', 'textdomain' ),
	'parent_item'       => __( 'Parent Type', 'textdomain' ),
	'parent_item_colon' => __( 'Parent Type:', 'textdomain' ),
	'edit_item'         => __( 'Edit Type', 'textdomain' ),
	'update_item'       => __( 'Update Type', 'textdomain' ),
	'add_new_item'      => __( 'Add New Type', 'textdomain' ),
	'new_item_name'     => __( 'New Type Name', 'textdomain' ),
	'menu_name'         => __( 'Type', 'textdomain' ),
);

$args = array(
	'hierarchical'      => true,
	'labels'            => $labels,
	'show_ui'           => true,
	'show_admin_column' => true,
	'query_var'         => true,
	'rewrite'           => array( 'slug' => 'type' ),
);

	register_taxonomy( 'type', array( 'faqs' ), $args );
}
add_action( 'init', 'create_faqs_taxonomies', 0 );

// Our custom post type function
function create_faq_posttype() {
 
    register_post_type( 'faqs',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'FAQs' ),
                'singular_name' => __( 'FAQ' )
            ),
            'public' => true,
            'has_archive' => true,
			'rewrite' => array('slug' => 'faq'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_faq_posttype' );
















/* ---------------------- Registration page ----------------------- */
//Add extra fields in registration form
add_action('woocommerce_register_form_start','my_extra_register_fields');
function my_extra_register_fields(){
?>
    <p class="woocommerce-FormRow form-row form-row-first">
        <label for="reg_billing_first_name"><?php _e('First Name','woocommerce'); ?><span class="required">*</span></label>
        <input type="text" class="wm-input input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if(! empty($_POST['billing_first_name'])) esc_attr_e($_POST['billing_first_name']); ?>"/>
    </p>
    <p class="woocommerce-FormRow form-row form-row-last">
        <label for="reg_billing_last_name"><?php _e('Last Name','woocommerce'); ?><span class="required">*</span></label>
        <input type="text" class="wm-input input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if(! empty($_POST['billing_last_name'])) esc_attr_e($_POST['billing_last_name']); ?>"/>
    </p>
<?php
    wp_enqueue_script('wc-country-select');
    woocommerce_form_field('billing_country',array(
        'type'        => 'country',
        'class'       => array('chzn-drop','wm-select-wrapper'),
        'label'       => __('Country'),
        'placeholder' => __('Choose your country.'),
        'required'    => true,
        'clear'       => true,
        'default'     => 'BE'
    ));
?>
<?php
}
//Registration form fields Validation
add_action('woocommerce_register_post','my_validate_extra_register_fields',10,3);
function my_validate_extra_register_fields($username,$email,$validation_errors){
    if(isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])){$validation_errors->add('billing_first_name_error',__('A first name is required!','woocommerce'));}
    if(isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])){$validation_errors->add('billing_last_name_error',__('A last name is required!','woocommerce'));}
    if(isset($_POST['billing_country']) && empty($_POST['billing_country'])){$validation_errors->add('billing_country_error',__('A country is required!','woocommerce'));}
    return $validation_errors;
}
//Below code save extra fields when new user register
add_action('woocommerce_created_customer','my_save_extra_register_fields'); 
function my_save_extra_register_fields($customer_id){
    if(isset($_POST['billing_first_name'])){
        update_user_meta($customer_id,'first_name',sanitize_text_field($_POST['billing_first_name']));
        update_user_meta($customer_id,'billing_first_name',sanitize_text_field($_POST['billing_first_name']));
    }
    if(isset($_POST['billing_last_name'])){
        update_user_meta($customer_id,'last_name',sanitize_text_field($_POST['billing_last_name']));
        update_user_meta($customer_id,'billing_last_name',sanitize_text_field($_POST['billing_last_name']));
    }
    if(isset($_POST['billing_country'])){
        update_user_meta($customer_id,'billing_country',sanitize_text_field($_POST['billing_country']));
    }
    if(isset($_POST['email'])){
        update_user_meta($customer_id,'billing_email',sanitize_text_field($_POST['email']));
    }
}








add_action('template_redirect', 'remove_shop_breadcrumbs' );
function remove_shop_breadcrumbs(){
 
    if (is_shop())
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
 
}
/**
 * Trim zeros in price decimals
 **/
add_filter( 'woocommerce_price_trim_zeros', '__return_true' );

/* 
	Custom Code Ends
*/











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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
