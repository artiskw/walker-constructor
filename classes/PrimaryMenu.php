<?php

class PrimaryMenuWalker extends Walker {
    public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

    public function start_el(&$output, $item, $depth=0, $args = null, $current_obj_id = 0) {
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' data-fr-popup-align="center"';
        
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;



        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $predefined_class_names = " fr-widget fr-link "; //tie, kas ir visos turpmākajos <div> būs
        
        $wraper_class_names = '';

        //START
        //Kods, kas atiecas uz icon
        if (in_array('icon', $classes )) { //"icon" class ir ielikta wp-admin, pie menu, home page
            $predefined_class_names .= " fr-svg"; //predefined_class_names - iepriekš, definētiem/noteiktiem class nosaukumiem -> nāk, klāt  jauna class -> fr-widget fr-link  fr-svg
            
            //active icon
             if (in_array('current_page_item', $classes)) { //current_page_item -> WP class, kad lapa ir active
                $wraper_class_names .= ' fr_selected_nav_item'; //fr_selected_nav_item -> css class, kas ir nostilizēta
                $class_names .= ' fr_svg_13';
            
            //not active icon
            } else {
                $wraper_class_names .= ' fr_navigation_text_light'; 
                $class_names .= ' fr_svg_12';

            }

            $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="'. $predefined_class_names. ' ' . esc_attr( $class_names ) . '"' : ' class="'.$predefined_class_names.'"';

            //1.<div class=" fr-widget fr-container fr_container_356  %4$s"</div> -> apkārt esošais, <div>, kas ietver visu icon.
            //2.<a %1$s %2$s></a> ->
            $template = '<div class=" fr-widget fr-container fr_container_356  %4$s" ><a %1$s %2$s><div class="fr-svg-inner">%3$s</div></a></div>';
            $content = esc_attr($item->label);
            $content .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output = sprintf($template, $attributes, $class_names, $content, $wraper_class_names);
            //Funkcija sprintf () raksta formatētu virkni mainīgajam.
        }
        //Kods, kas atiecas uz burtiem
        else {
            $style = '';
            $predefined_class_names .= " fr-text fr-wf fr-richtext fr_navigation_text_light fr_item_51"; //<-- šīs, visas class, nāk klāt -> fr-widget fr-link
            
            if (in_array('current_page_item', $classes)) {
                $class_names .= ' fr_selected_nav_item'; 
            } else {
                $class_names .= ' fr_navigation_text_light'; 
            }
            
            $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="'. $predefined_class_names. ' ' . esc_attr( $class_names ) . '"' : ' class="'.$predefined_class_names.'"';

            $template = '<a %1$s %2$s><div class="fr-text"><p %3$s>%4$s</p></div></a>';
            $content = esc_attr($item->label);
            $content .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

            $item_output = sprintf($template, $attributes, $class_names, $style, $content);
        }
        //END

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

