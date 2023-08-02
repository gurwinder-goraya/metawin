<?php
/**
 * Metawin functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 */

if ( ! function_exists( 'metawin_theme_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function metawin_theme_setup() {

        /**
         * Register Menus
         */
        register_nav_menus(
            array(
                'primary' => __( 'Primary menu' ),
                'footer'  => __( 'Secondary menu' ),
            )
        );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

    }
}
add_action( 'after_setup_theme', 'metawin_theme_setup' );

/**
 * Enqueue styles and scripts.
 */
function metawin_register_styles_scripts() {

    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'metawin-style', get_template_directory_uri() . '/style.css', array(), $theme_version );
    wp_enqueue_script( 'lazy-load', 'https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js', array(), false, true );
    wp_enqueue_script( 'jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), false, true );
    wp_enqueue_script( 'custom-script', get_template_directory_uri().'/assets/js/custom-script.js', array(), false, true );
    
}

add_action( 'wp_enqueue_scripts', 'metawin_register_styles_scripts' );


/**
 * Register a custom post type called "Casino Hotels".
 *
 * @see get_post_type_labels() for label keys.
 */
function register_casino_hotels_post_type() {
    $labels = array(
        'name'                  => _x( 'Casino Hotels', 'Post type general name' ),
        'singular_name'         => _x( 'Casino Hotels', 'Post type singular name' ),
        'menu_name'             => _x( 'Casino Hotels', 'Admin Menu text' ),
        'name_admin_bar'        => _x( 'Casino Hotel', 'Add New on Toolbar' ),
        'add_new'               => __( 'Add New' ),
        'add_new_item'          => __( 'Add New Casino Hotel' ),
        'new_item'              => __( 'New Casino Hotel' ),
        'edit_item'             => __( 'Edit Casino Hotel' ),
        'view_item'             => __( 'View Casino Hotel' ),
        'all_items'             => __( 'All Casino Hotels' ),
        'search_items'          => __( 'Search Casino Hotels' ),
        'parent_item_colon'     => __( 'Parent Casino Hotels:' ),
        'not_found'             => __( 'No Casino Hotels found.' ),
        'not_found_in_trash'    => __( 'No Casino Hotels found in Trash.' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'casino_hotels' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'casino_hotels', $args );
}

add_action( 'init', 'register_casino_hotels_post_type' );