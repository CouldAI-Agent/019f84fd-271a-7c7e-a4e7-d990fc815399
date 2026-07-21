<?php
/**
 * NexaNews functions and definitions
 *
 * @package NexaNews
 */

if ( ! defined( 'NEXANEWS_VERSION' ) ) {
    define( 'NEXANEWS_VERSION', '1.0.0' );
}

if ( ! function_exists( 'nexanews_setup' ) ) :
    function nexanews_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // Register Menus
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'nexanews' ),
            'footer' => esc_html__( 'Footer Menu', 'nexanews' ),
        ) );

        // Switch default core markup to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add support for core custom logo.
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'nexanews_setup' );

/**
 * Enqueue scripts and styles.
 */
function nexanews_scripts() {
    wp_enqueue_style( 'nexanews-style', get_stylesheet_uri(), array(), NEXANEWS_VERSION );
    
    // Google Fonts
    wp_enqueue_style( 'nexanews-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap', array(), null );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'nexanews_scripts' );

/**
 * Register widget area.
 */
function nexanews_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'nexanews' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'nexanews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'nexanews' ),
        'id'            => 'footer-1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'nexanews_widgets_init' );
