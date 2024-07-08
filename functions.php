<?php

function wpdevs_load_scripts(){
    wp_enqueue_style( 'wpdevs-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap', array(), null );
    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdevs_load_scripts' );

function my_register_nav_menus() {
    register_nav_menus(
        array(
            'wp_devs_main_menu' => 'Main Menu',
            // 'secondary' => __( 'Secondary Menu', 'my-theme' ),
            'wp_devs_footer_menu' => 'Footer Menu'
        )
    );
    $args = array(
        'height' => 255,
        'width'  => 1920
    );
    add_theme_support('custom-header' , $args);
    add_theme_support('post-thumbnails');
    // add_image_size( 'post-thumbnail', 300, 300, TRUE );
    add_theme_support('custom-logo', array(
        'width'       => 200,
        'height'      => 110,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // add_theme_support('custom-background', array(
    //     'default-color' => 'ffffff',
    //     'default-image' => get_template_directory_uri() . '/images/background.jpg',
    // ));
}
add_action( 'after_setup_theme', 'my_register_nav_menus' );

/**
 * Add a sidebar.
 */
function wpdocs_theme_slug_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'textdomain' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );