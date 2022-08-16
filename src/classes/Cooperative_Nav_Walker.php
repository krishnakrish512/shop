<?php

class Cooperative_Nav_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = [])
    {
//	    var_dump($output);
//	    exit();
//		$output .= "<li class='menu-item mega-menu-title dropdown-left'><li class='dropdown-inner'><li class='menu-item'>";
        $output .= "<ul class='sub-menu-container'>";
    }

    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $classes = empty($item->classes) ? [] : (array)$item->classes;

        if (isset($args->walker->has_children) && $args->walker->has_children) {

                $classes[] = 'sub-menu';
        }

        if (in_array('current-menu-item', $classes, true) || in_array('current-menu-parent', $classes, true) || in_array('current-menu-ancestor', $classes, true)) {
            if ($depth == 0) {
                $classes[] = 'current';
            }
        }

        $output .= "<li class='" . implode($classes, ' ') . "'>";
        $output .= "<a href='" . $item->url . "' class='menu-link'>";
        $output .= "<div>";
        $output .= $item->title;


        if ($args->walker->has_children) {

                $output .= " <i class='icon-angle-down'></i>";
        }
        $output .= "</div>";
        $output .= "</a>";
    }
}