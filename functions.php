<?php

//Theme Support
show_admin_bar(false);
add_theme_support('custom-logo');
add_theme_support('menus');
add_theme_support('post-thumbnails');

// Register Menu
if (!function_exists('menu_register')) {

    function menu_register()
    {
        register_nav_menus([
            'primary_menu' => __('Primary Menu', 'text_domain'),
            'language_menu' => __('Language Menu', 'text_domain'),
            'home_menu' => __('Home Menu', 'text_domain'),
        ]);
    }

    add_action('after_setup_theme', 'menu_register', 0);
}