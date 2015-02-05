<?php

/**
* Sets content width.
*/
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}


/**
* Requires
*/
require_once get_template_directory() . '/core/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/cpt.php';
require_once get_template_directory() . '/core/metabox.php';
require_once get_template_directory() . '/core/widgets.php';

/**
* Load os stylesheets e scripts.
*/
function wam_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// WP Default.
	wp_enqueue_style( 'wp-style', get_stylesheet_uri(), array(), null, 'all' );

	// font Awesome.
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), null, 'all' );

	// Bootstrap.
	wp_enqueue_style( 'bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css', array(), null, 'all' );

	// Google Fonts
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans|Roboto:300,300italic,400,400italic,700,700italic', array(), null, 'all' );

	// NanoGallery.
	wp_enqueue_style( 'nanogallery-style', 'https://cdnjs.cloudflare.com/ajax/libs/nanogallery/5.2.3/css/nanogallery.min.css', array(), null, 'all' );

	// WAM.
	wp_enqueue_style( 'wam-style', $template_url . '/assets/css/main.css', array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Bootstrap JS.
	wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js', array(), null, true );

	// NanoGallery.
	wp_enqueue_script( 'nanogallery', 'https://cdnjs.cloudflare.com/ajax/libs/nanogallery/5.2.3/jquery.nanogallery.min.js', array(), null, true );

	// WAM init.
	wp_enqueue_script( 'wam-init', $template_url . '/assets/js/main.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'wam_enqueue_scripts', 1 );

/**
* Features do Tema
*/
if ( ! function_exists( 'wam_setup_features' ) ) {
	function wam_setup_features() {
		/**
		* Add suporte à multiplas linguagens.
		*/
		load_theme_textdomain( 'wam', get_template_directory() . '/languages' );

		/**
		* Register nav menus.
		*/
		register_nav_menus(
			array(
				'main-menu' => __( 'Principal', 'wam' )
			)
		);

		/**
		* Add post_thumbnails suport.
		*/
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'site-head', 1920, 500 );
		add_image_size( '740-620', 740 );

		/**
		* Add feed link.
		*/
		add_theme_support( 'automatic-feed-links' );

		/**
		* HTML5 core markup
		*/
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		/**
		* Title markup
		*/
		add_theme_support( "title-tag" );

		remove_filter('the_excerpt', 'wpautop');
	}
}
add_action( 'after_setup_theme', 'wam_setup_features' );


/**
* Pagination.
* @since 2.2.0
* @author WPBrasil
*/
function odin_pagination( $mid = 2, $end = 1, $show = false, $query = null ) {

	// Prevent show pagination number if Infinite Scroll of JetPack is active.
	if ( ! isset( $_GET[ 'infinity' ] ) ) {

		global $wp_query, $wp_rewrite;

		$total_pages = $wp_query->max_num_pages;

		if ( is_object( $query ) && null != $query ) {
			$total_pages = $query->max_num_pages;
		}

		if ( $total_pages > 1 ) {
			$current_page = max( 1, get_query_var( 'paged' ) );
			$url_base = $wp_rewrite->pagination_base;
			$big = 999999999; // Need an unlikely integer.

			// Sets the URL format.
			if ( $wp_rewrite->permalink_structure ) {
				$format = '?paged=%#%';
			} else {
				$format = '/' . $url_base . '/%#%';
			}

			// Sets the paginate_links arguments.
			$arguments = apply_filters( 'odin_pagination_args', array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => $format,
				'current' => $current_page,
				'total' => $total_pages,
				'show_all' => $show,
				'end_size' => $end,
				'mid_size' => $mid,
				'type' => 'list',
				'prev_text' => __( '&laquo; Previous', 'odin' ),
				'next_text' => __( 'Next &raquo;', 'odin' ),
				)
			);

			$pagination = '<div class="pagination-wrap">' . paginate_links( $arguments ) . '</div>';

			// Prevents duplicate bars in the middle of the url.
			if ( $url_base ) {
				$pagination = str_replace( '//' . $url_base . '/', '/' . $url_base . '/', $pagination );
			}

			return $pagination;
		}
	}
}


/**
* Cleanup wp_head().
*/
function wam_head_cleanup() {
	// EditURI link.
	remove_action( 'wp_head', 'rsd_link' );

	// Windows live writer.
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// WP version.
	remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'wam_head_cleanup' );

/**
* Remove WP version from RSS.
*/
add_filter( 'the_generator', '__return_false' );

/**
* Add custom post types count action to WP Dashboard
*/
function wam_posttype_glance_items() {
	$glances = array();

	$args = array(
		'public' => true,
		'_builtin' => false
	);

	// Getting your custom post types
	$post_types = get_post_types($args, 'object', 'and');
	foreach ($post_types as $post_type)	{
		// Counting each post
		$num_posts = wp_count_posts($post_type->name);
		// Number format
		$num = number_format_i18n($num_posts->publish);
		// Text format
		$text = _n($post_type->labels->singular_name, $post_type->labels->name, intval($num_posts->publish));
		// If use capable to edit the post type
		if (current_user_can('edit_posts')) {
			// Show with link
			$glance = '<a class="'.$post_type->name.'-count" href="'.admin_url('edit.php?post_type='.$post_type->name).'">'.$num.' '.$text.'</a>';

		}
		else {
			// Show without link
			$glance = '<span class="'.$post_type->name.'-count">'.$num.' '.$text.'</span>';
		}
		// Save in array
		$glances[] = $glance;
	}
	return $glances;
}
add_action('dashboard_glance_items', 'wam_posttype_glance_items');
function helf_cpts_css() {
	echo '<style type="text/css">
		#dashboard_right_now a.projetos-count:before { content: "\f499"; }
		#dashboard_right_now a.voluntarias-count:before { content: "\f307"; }
	</style>';
}
add_action('admin_head', 'helf_cpts_css');
