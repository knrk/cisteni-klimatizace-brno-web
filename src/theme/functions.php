<?php
function ckbrno_resources() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	// wp_enqueue_script( 'header_js', get_template_directory_uri() . '/js/header-bundle.js', null, 1.0, false );
	// wp_enqueue_script( 'footer_js', get_template_directory_uri() . '/js/footer-bundle.js', null, 1.0, true );
}
add_action( 'wp_enqueue_scripts', 'ckbrno_resources' );

// Customize excerpt word count length
function custom_excerpt_length() {
	return 22;
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );

// Theme setup
function ckbrno_setup() {
	// Handle Titles
	add_theme_support( 'title-tag' );

	// Add featured image support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-thumbnail', 720, 720, true );
	add_image_size( 'square-thumbnail', 80, 80, true );
	add_image_size( 'banner-image', 1024, 1024, true );
}
add_action( 'after_setup_theme', 'ckbrno_setup' );

show_admin_bar( false );

// Checks if there are any posts in the results
function is_search_has_results() {
	return 0 != $GLOBALS['wp_query']->found_posts;
}

// Add Widget Areas
function ckbrno_widgets() {
	register_sidebar(
		array(
			'name'          => 'Sidebar',
			'id'            => 'sidebar1',
			'before_widget' => '<div class="widget-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ckbrno_widgets' );

function ckbrno_custom_menu() {
	register_nav_menus(array(
		'navigation-menu' => __('Navigation Menu')
	));
}
add_action('init', 'ckbrno_custom_menu');

add_filter('body_class', 'body_class_section');
function body_class_section($classes) {
	global $wpdb, $post;
	if (is_page()) {
		if ($post->post_parent) {
			$parent = end(get_post_ancestors($current_page_id));
		} else {
			$parent = $post->ID;
		}
		$post_data = get_post($parent, ARRAY_A);
		$classes[] = $post_data['post_name'];
	}
	return $classes;
}

// Remove WP Version From Styles	
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}