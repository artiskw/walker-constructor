<?php

class ApgLanguagePrimaryMenuWalker extends Walker {
    public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    private $start_id = 3;


    public function start_el(&$output, $item, $depth=0, $args = null, $current_obj_id = 0) {

        $animation_type = '.';

        //Šeit
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $attributes .= ' data-fr-popup-align="center"';
        $attributes .= ' data-fr-animation="'.$animation_type.'"';
        $attributes .= '  data-fr-animation-duration="0.5s"';
        $attributes .= '  data-fr-animation-delay="0s"';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $predefined_class_names = 'language-current fr-widget fr-text fr-wf fr-richtext fr_text_block_199 fr-widget-hover-opacity-100 fr-link';
        
        if (in_array('current-lang', $classes)) {
            $class_names .= ' fr_language_item'; 
        } else {
            $class_names .= ' fr_langauge_item__passive'; 
        }
       
        $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="'. $predefined_class_names. ' ' . esc_attr( $class_names ) . '"' : ' class="'.$predefined_class_names.'"';
        $item_output = '';
        $start_id = $this->start_id++;


        $item_output .= '<a '.$attributes.' '.$class_names . " id='text_custom_$start_id'>";
        $item_output .= '<div class="fr-text">';
        $item_output .= '<p>';
        $item_output .= esc_attr($item->label);
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</p>';
        $item_output .= '</div>';
        $item_output .= "</a>\n";
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );


    }
}