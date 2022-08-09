<?php

class CustomWalker extends Walker {
    public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    private $settings = [];

    public function __construct(array $settings) {
        $this->settings = $settings;
    }

    public function getClasses() {
        if (array_key_exists('classes', $this->settings)) {
            return $this->settings['classes'];
        }
        return [];
    }
    
    public function getTemplates() {
        if (array_key_exists('templates', $this->settings)) {
            return $this->settings['templates'];
        }
        return [];
    }

    public function start_el(&$output, $item, $depth=0, $args = null, $current_obj_id = 0) {
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' data-fr-popup-align="center"';
        
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        
        $wraper_class_names = '';

        $templates = $this->getTemplates();
        $setting_classes = $this->getClasses();

        //START
        //Kods, kas atiecas uz icon
        if (in_array('icon', $classes )) { //"icon" class ir ielikta wp-admin, pie menu, home page
          
            //active icon
             if (in_array('current_page_item', $classes)) { //current_page_item -> WP class, kad lapa ir active
                $wraper_class_names .= ' fr_selected_nav_item'; //fr_selected_nav_item -> css class, kas ir nostilizēta
                $class_names .= ' fr_svg_13';
            
            //not active icon
            } else {
                $wraper_class_names .= ' fr_navigation_text_light'; 
                $class_names .= ' fr_svg_12';

            }

            $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="'. $setting_classes['icon']. ' ' . esc_attr( $class_names ) . '"' : ' class="'.$predefined_class_names.'"';

            //1.<div class=" fr-widget fr-container fr_container_356  %4$s"</div> -> apkārt esošais, <div>, kas ietver visu icon.
            //2.<a %1$s %2$s></a> ->

            $content = esc_attr($item->label);
            $content .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output = sprintf($templates['icon'], $attributes, $class_names, $content, $wraper_class_names);
            //Funkcija sprintf () raksta formatētu virkni mainīgajam.
        }
        //Kods, kas atiecas uz burtiem
        else {
            $style = '';
            
            if (in_array('current_page_item', $classes)) {
                $class_names .= ' fr_selected_nav_item'; 
            } else {
                $class_names .= ' fr_navigation_text_light'; 
            }
            
            $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="'. $setting_classes['default']. ' ' . esc_attr( $class_names ) . '"' : ' class="'.$predefined_class_names.'"';

            $content = esc_attr($item->label);
            $content .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

            $item_output = sprintf($templates['default'], $attributes, $class_names, $style, $content);
        }

        if (in_array('current-lang', $classes)) {
            $class_names .= ' fr_language_item'; 
        } else {
            $class_names .= ' fr_langauge_item__passive'; 
        }
       
        //END

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

