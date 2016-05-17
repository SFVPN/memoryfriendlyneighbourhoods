<?php
// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul id=\"dropdown-1\" class=\"dropdown-content\">\n";
    }
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
       $item_html = '';
       parent::start_el($item_html, $item, $depth, $args);

       if ( $item->is_dropdown && $depth === 0 ) {
           $item_html = str_replace( '<a', '<a class="dropdown-button"', $item_html );
           $item_html = str_replace( '</a>', '<i class="mdi mdi-menu-down right"></i></a>', $item_html );
       }

       $output .= $item_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if ( $element->current )
        $element->classes[] = 'active';

        $element->is_dropdown = !empty( $children_elements[$element->ID] );

        if ( $element->is_dropdown ) {
            if ( $depth === 0 ) {
                $element->classes[] = 'dropdown';
            } elseif ( $depth === 1 ) {
                // Extra level of dropdown menu,
                // as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
                $element->classes[] = 'dropdown-menu';
            }
        }

    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

class Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = Array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent<ul id=\"dropdown-1\" class=\"collapsible-body\">\n";
  }
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
     $item_html = '';
     parent::start_el($item_html, $item, $depth, $args);

     if ( $item->is_dropdown && $depth === 0 ) {
         $item_html = str_replace( '<a', '<a class="collapsible-header"', $item_html );
        // $item_html = str_replace( '</a>', '<i class="mdi mdi-menu-down"></i></a>', $item_html );
     }

     $output .= $item_html;
  }

  function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
      if ( $element->current )
      $element->classes[] = 'active';

      $element->is_dropdown = !empty( $children_elements[$element->ID] );

      if ( $element->is_dropdown ) {
          if ( $depth === 0 ) {
              $element->classes[] = 'dropdown';
          } elseif ( $depth === 1 ) {
              // Extra level of dropdown menu,
              // as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
              $element->classes[] = 'collapsible-body';
          }
      }

  parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
  }
}
