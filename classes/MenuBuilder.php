<?php

class MenuBuilder{

    public function __construct() {

    }

    /**
     * $settings = [
     *   "link" => 'a',
     *   'classes' => 'red large',
     * ]
     */
    public function displayMenu($settings) {

        wp_nav_menu(
            [
                'theme_location' => $settings['name'],
                'container' => 'p',
                'container_class' => '',
                'depth' => 1,
                'items_wrap' => '%3$s',
                'walker' => new CustomWalker($settings)
            ]
        );
    }



}
    
    