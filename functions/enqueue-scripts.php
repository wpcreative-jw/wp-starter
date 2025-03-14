<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
        
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );
   
    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

    // Register slick js and css
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/slick/slick.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );
    wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/slick/slick.css', array(), filemtime(get_template_directory() . '/assets/styles'), 'all' );
    wp_enqueue_style( 'slicktheme-css', get_template_directory_uri() . '/assets/slick/slick-theme.css', array(), filemtime(get_template_directory() . '/assets/styles'), 'all' );
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);