<base href="<?= get_stylesheet_directory_uri() . '/' ;?>">
<?php include('head.php'); ?>

<body class="loading-editor-overlay">
    <div class="b-content hide-footer">
        <div style="display: block;" id="nav_without_logo" class="fr-widget fr-container fr_nav_without_logo">
            <div id="container_38" class="fr-widget fr-container fr_container_38">
                <a id="image_2" class="fr-widget fr-img fr_image_2 fr-link " href="/" data-fr-popup-align="center">
                    <img src="images/thumbnail/miniland.png_539x179.png" />
                </a>
                <div id="container_355" class="fr-widget fr-container fr_two_navigation_block fr_container_355">
                    <div id="navigation_without_logo_11"
                        class="fr-widget fr-navigation fr-navigation-active fr_navigation_without_logo_11">
                        <div id="hamburger_icon_18" class="fr-widget fr-navigation-toggle fr_hamburger_icon_18">
                            <div id="icon_16" class="fr-widget fr-svg fr_icon_16">
                                <div class="fr-svg-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0"
                                        viewBox="0 0 73.2 61.6" xml:space="preserve">
                                        <path
                                            d="M4.2 8.6h64.7c2.3 0 4.2-1.9 4.2-4.3C73.2 1.9 71.3 0 68.9 0H4.2C1.9 0 0 1.9 0 4.3 0 6.7 1.9 8.6 4.2 8.6zM68.9 26.5H4.2C1.9 26.5 0 28.4 0 30.8c0 2.4 1.9 4.3 4.2 4.3h64.7c2.3 0 4.2-1.9 4.2-4.3C73.2 28.4 71.3 26.5 68.9 26.5zM68.9 53H4.2C1.9 53 0 54.9 0 57.3c0 2.4 1.9 4.3 4.2 4.3h64.7c2.3 0 4.2-1.9 4.2-4.3C73.2 54.9 71.3 53 68.9 53z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div id="menu_items_13" class="fr-widget fr-container fr_menu_items_13">
                            <?php
                        include('classes/CustomWalker.php');
                        include('classes/MenuBuilder.php');
                        $menu_builder = new MenuBuilder();
                        
                        if (has_nav_menu('primary_menu')) {
                            $menu_builder->displayMenu([
                                "name" => 'primary_menu',
                                "templates" => [
                                    'default' => '<a %1$s %2$s><div class="fr-text"><p %3$s>%4$s</p></div></a>',
                                    'icon' => '<div class=" fr-widget fr-container fr_container_356  %4$s" ><a %1$s %2$s><div class="fr-svg-inner">%3$s</div></a></div>'
                                ],
                                'classes' => [
                                    'default' => 'fr-widget fr-link fr-text fr-wf fr-richtext fr_navigation_text_light fr_item_51',
                                    'icon' => 'fr-widget fr-link fr-svg',
                                ]
                            ]);
                        }
                    ?>

                        </div>
                    </div>

                    <div id="container_357" class="fr-widget fr-container fr_language_block fr_container_357">
                        <?php
                         $menu_builder = new MenuBuilder();
                            if (has_nav_menu('language_menu')) {
                                $menu_builder->displayMenu([
                                    "name" => 'language_menu',
                                    "templates" => [
                                        'default' => '<a %1$s %2$s><div class="fr-text"><p %3$s>%4$s</p></div></a>',
                                        'icon' => ''
                                    ],
                                    'classes' => [
                                        'default' => 'language-current fr-widget fr-text fr-wf fr-richtext fr_text_block_199 fr-widget-hover-opacity-100 fr-link',
                                        'conditions' => [
                                           'current-lang' => [
                                            'true' => 'fr_language_item',
                                            'false' => 'fr_langauge_item__passive'
                                           ] 
                                        ],
                                        'icon' => '',
                                    ]
                                ]);
                            }
                        ?>
                    </div>
                </div>
            </div>

        </div>
        <div id="hero_bg_image_centered_text"
            class="fr-widget fr-container fr_hero_bg_image_centered_text fr_apg_pre_nav_section">
            <div id="container_350" class="fr-widget fr-container fr_container_350">
            </div>
            <div id="vertically_centered_block" class="fr-widget fr-container fr_vertically_centered_block">
                <div id="image_3" class="fr-widget fr-img fr_image_3 fr-having-animation animated fadeIn"
                    data-fr-animation="fadeIn" data-fr-animation-duration="1s" data-fr-animation-delay="0s"> <img
                        src="images/thumbnail/miniland-transparent.png_792x792.png" />
                </div>
                <div id="text_27" class="fr-widget fr-text fr-wf fr-richtext fr_text_dark_center fr_text_27
                fr-having-animation animated fadeInDown" data-fr-animation="fadeInDown"
                    data-fr-animation-duration="1.5s" data-fr-animation-delay="0.5s">
                    <div class="fr-text">
                        <h1>Bērnu pasākumu eksperts</h1>
                    </div>
                </div>
                <div id="text_381" class="fr-widget fr-text fr-wf fr-richtext fr_text_dark_center fr_text_381
                fr-having-animation animated fadeIn" data-fr-animation="fadeIn" data-fr-animation-duration="1.5s"
                    data-fr-animation-delay="0.5s">
                    <div class="fr-text">
                        <h3>Vairo bērnības laimīgās atmiņas!</h3>
                    </div>
                </div>
                <div id="container_23" class="fr-widget fr-container fr_container_23">
                <?php
            if (has_nav_menu('home_menu')) {
                include('classes/ApgHomeMenuWalker.php');
                wp_nav_menu(
                    [
                        'theme_location' => 'home_menu',
                        'container' => 'div',
                        'container_class' => 'fr-widget fr-container fr_container_23',
                        'depth' => 1,
                        'items_wrap' => '%3$s',
                        'walker' => new ApgHomeMenuWalker
                    ]
                );
            }
            ?>
                </div>
                <script>
                (function(window, document, $) {
                    'use strict';
                    $(this).animate({
                        'background-position-x': '100000px'
                    }, 6000000, 'linear');
                }).call(document.getElementsByClassName('fr_vertically_centered_block')[0], window, document, (window
                    .Froont && window.Froont.jQuery || window.jQuery));
                </script>
            </div>
        </div>
        <div id="footer-assets">
        </div>
</body>