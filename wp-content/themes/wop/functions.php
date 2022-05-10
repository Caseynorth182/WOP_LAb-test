<?php

/**
 * Wop_Lab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wop_Lab
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wop_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Wop_Lab, use a find and replace
		* to change 'wop' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('wop', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'wop'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wop_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'wop_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wop_content_width()
{
	$GLOBALS['content_width'] = apply_filters('wop_content_width', 640);
}
add_action('after_setup_theme', 'wop_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wop_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'wop'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'wop'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'wop_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wop_scripts()
{
	wp_enqueue_style('wop-bootstrap-cdn-style', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', [], _S_VERSION);
	wp_enqueue_style('wop-bootswatch-style', get_template_directory_uri() . '/css/bootstrap.min.css', [], _S_VERSION);
	wp_enqueue_style('wop-style', get_stylesheet_uri(), array(), _S_VERSION);

	wp_enqueue_script('wop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('wop-bootstrap-cdn-script', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', ['jquery'], _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'wop_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}



/* -------------------------- //SECTION my scripts -------------------------- */

/* ----------------------------- //ANCHOR DEBUG ----------------------------- */
function debug($data)
{
	echo "<div class='hidden_block'><pre>";
	var_dump($data);
	echo "</pre></div>";
}

/* ------------------------ //LINK REGISTER POST TYPE && TAX ----------------------- */
add_action('init', 'register_post_types');
function register_post_types()
{
	register_post_type('car', [
		'label'  => null,
		'labels' => [
			'name'               => 'Car',
			'singular_name'      => 'Car',
			'add_new'            => 'Add Car',
			'add_new_item'       => 'Add Car',
			'edit_item'          => 'Edit Car',
			'new_item'           => 'New Car',
			'view_item'          => 'View Car',
			'search_items'       => 'Search Car',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Не найдено в корзине',
			'parent_item_colon'  => '',
			'menu_name'          => 'Car',
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 20,
		//NOTE иконка 
		'menu_icon'           => 'dashicons-car',
		'hierarchical'        => false,
		'supports'            => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['brand', 'country'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);
}

register_taxonomy('brand', ['car'], [
	'labels'                => [
		'name'              => 'Brand',
		'singular_name'     => 'Brand',
		'search_items'      => 'find Brand',
		'all_items'         => 'All Brands',
		'view_item '        => 'view Brand',
		'edit_item'         => 'edit Brand',
		'update_item'       => 'update Brand',
		'add_new_item'      => 'add new Brand',
		'new_item_name'     => 'new Brand name',
		'menu_name'         => 'Brand',
	],
	'description'           => '',
	'public'                => true,
	'hierarchical'          => true
]);
register_taxonomy('country', ['car'], [
	'labels'                => [
		'name'              => 'Producing Country',
		'singular_name'     => 'Producing Country',
		'search_items'      => 'find Producing Country',
		'all_items'         => 'All Producing Country',
		'view_item '        => 'view Producing Country',
		'edit_item'         => 'edit Producing Country',
		'update_item'       => 'update Producing Country',
		'add_new_item'      => 'add new Producing Country',
		'new_item_name'     => 'new Producing Country name',
		'menu_name'         => 'Producing Country',
	],
	'description'           => '',
	'public'                => true,
	'hierarchical'          => true
]);



/* -------------------------- //LINK CUSTOMIZER API ------------------------- */

function wop_customize_reg($wp_customize)
{
	$wp_customize->add_section('phone', [
		'title' => 'Телефон',
		'priority' => 30,

	]);

	$wp_customize->add_setting('phone_code', [
		'default' => '****',
		'transport' => 'postMessage'
	]);

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'phone_code', [
		'label' => 'Header Phone',
		'section' => 'phone',
		'settings' => 'phone_code',
		'type' => 'number'
	]));
}

add_action('customize_register', 'wop_customize_reg');

function wop_customize_live()
{
	wp_enqueue_script('wop_customizer', get_template_directory_uri() . '/js/customizer.js', ['jquery'], true);
}

add_action('customize_preview_init', 'wop_customize_live');

/* ------------------------ //LINK ADD CUSTOM METABOX ----------------------- */
add_action('add_meta_boxes', 'wop_add_metabox');

function wop_add_metabox()
{

	add_meta_box(
		'car_settings',
		'Car Settings',
		'car_metabox_callback',
		'car',
		'normal',
		'default'
	);
}


function car_metabox_callback($post)
{
	wp_nonce_field('woppostsettingsupdate-' . $post->ID, '_wopnonce');

	$color = get_post_meta($post->ID, 'car_color', true);
	$fuel = get_post_meta($post->ID, 'fuel', true);
	$power_int = get_post_meta($post->ID, 'power_int', true);
	$price = get_post_meta($post->ID, 'price', true);

	echo '
	<p>
		<label>
			Car color
			<input name="myColor" id="color-picker" type="color" class="wpColorChoose" value="' . $color . '"
		</label>
	</p>';

	echo '
	<p>
		<label>
			Power 
			<input name="car_power"  type="number"  value="' . $power_int . '"
		</label>
	</p>';

	echo '
	<p>
	Fuel:
		<select name="fuel_select">
			<option value="diesel" ' . selected('diesel', $fuel, false) . '>diesel</option>
			<option value="hybrid" ' . selected('hybrid', $fuel, false) . '>hybrid</option>
			<option value="electro" ' . selected('electro', $fuel, false) . '>electro</option>
  		</select>
	</p> ';

	echo '
	<p>
		<label>
			Car Price:
			<input name="car_price" " type="number"  value="' . $price . '"
		</label>
	</p>';
}

//save meta

add_action('save_post', 'wop_save_meta', 10, 2);

function wop_save_meta($post_id, $post)
{

	if (!isset($_POST['_wopnonce']) || !wp_verify_nonce($_POST['_wopnonce'], 'woppostsettingsupdate-' . $post->ID)) {
		return $post_id;
	}

	$post_type = get_post_type_object($post->post_type);

	if (!current_user_can($post_type->cap->edit_post, $post_id)) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if ('car' !== $post->post_type) {
		return $post_id;
	}

	if (isset($_POST['myColor'])) {
		update_post_meta($post_id, 'car_color', sanitize_hex_color($_POST['myColor']));
	} else {
		delete_post_meta($post_id, 'car_color');
	}
	if (isset($_POST['fuel_select'])) {
		update_post_meta($post_id, 'fuel', sanitize_text_field($_POST['fuel_select']));
	} else {
		delete_post_meta($post_id, 'fuel');
	}
	if (isset($_POST['car_power'])) {
		update_post_meta($post_id, 'power_int', sanitize_text_field(intval($_POST['car_power'])));
	} else {
		delete_post_meta($post_id, 'power_int');
	}
	if (isset($_POST['car_price'])) {
		update_post_meta($post_id, 'price', sanitize_text_field(intval($_POST['car_price'])));
	} else {
		delete_post_meta($post_id, 'price');
	}


	return $post_id;
}