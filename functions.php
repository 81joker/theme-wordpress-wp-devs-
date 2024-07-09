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
add_action( 'widgets_init', 'wpdevs_sidebars' );
function wpdevs_sidebars(){
    register_sidebar(
        array(
            'name'  => 'Blog Sidebar',
            'id'    => 'sidebar-blog',
            'description'   => 'This is the Blog Sidebar. You can add your widgets here.',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
}