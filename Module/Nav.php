<?php

/**
 * @About: Len主题幻灯片模块函数
 * @Author：青桔&dmy 
 * @Url： lmeon.com/len-thems
 * @Time：2024-3-24
 * @Email: Len@tqlen.com
 * @Project: Len主题
 * */

// 
$Home_Module_3  = _len('Home_Module_3');
if ($Home_Module_3 == true) {
    $nav_array = array('nav_1' => '侧边栏导航', 'nav_2' => '头部导航');
} else {
    $nav_array = array('nav_1' => '侧边栏导航');
}
register_nav_menus($nav_array);
function Len_Nav_Module($Top = true, $Sidebar = true)
{
    $Home_Module_3  = _len('Home_Module_3');
    $locations = get_nav_menu_locations();
    if ($Sidebar == true) {
        if (isset($locations['nav_1'])) {
            wp_nav_menu(
                array(
                    'menu' => 'nav_1',
                    'theme_location' => 'nav_1',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => 'len-sidebar-nav',
                    'menu_class' => 'len-nav-ul',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'walker' => new Leaf_Sidebar_Nav,
                )
            );
        }
    } elseif ($Top == true) {
        if (isset($locations['nav_2'])) {
            wp_nav_menu(
                array(
                    'menu' => 'nav_2',
                    'theme_location' => 'nav_2',
                    'depth' => 3,
                    'container' => 'div',
                    'container_class' => 'len-showcase-banner-nav-blcok',
                    'menu_class' => 'banner-nav-ul',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'walker' => new Leaf_Top_Nav,
                )
            );
        }
    }
}

class Leaf_Sidebar_Nav extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $wp_query;
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // 缩进

        $depth_classes = array(
            ($depth == 0 ? 'len-nav-li-first' : 'len-nav-li-second'),
            ($depth >= 2 ? 'len-nav-li-second' : ''),
            ($depth % 2 ? '' : ''),
        );
        $depth_class_names = esc_attr(implode('', $depth_classes));

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item))); //这句我没看懂，不知道是在干啥

        // 把样式合成到li里面
        // 把样式合成到li里面
        $output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . '">';

        // 处理图标
        $Nav_Module_1_3 = _Len_Nav_Module($item->ID, 'Nav_Module_1_3');
        $Nav_Module_1_2 = _Len_Nav_Module($item->ID, 'Nav_Module_1_2');
        $Nav_Module_1_1 = _Len_Nav_Module($item->ID, 'Nav_Module_1_1');
        $Nav_Module_1 = _Len_Nav_Module($item->ID, 'Nav_Module_1');
        if ($Nav_Module_1 == 'icon_1') {
            if (!empty($Nav_Module_1_1)) {
                $output .=  $Nav_Module_1_1;
            }
        } elseif ($Nav_Module_1 == 'icon_2') {
            if (!empty($Nav_Module_1_2)) {
                $output .= '<i class="fas ' . $Nav_Module_1_2 . '"></i>'; // 输出图标的 HTML
            }
        } elseif ($Nav_Module_1 == 'icon_3') {
            if (!empty($Nav_Module_1_3)) {
                $output .= '<svg class="len-banner-nav-icon" aria-hidden="true">
            <use xlink:href="#icon-' . $Nav_Module_1_3 . '"></use>
        </svg>'; // 输出图标的 HTML
            }
        }

        // 处理a的属性
        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
        $attributes .= ' class="len-nav-link-block len-pjax-link-all-blcok"';
        $link_before = ''; // 定义$link_before变量
        $link_after = ''; // 定义$link_after变量

        // 使用动态设置的值构建 $item_output
        if ($depth === 0 && !empty($item->classes) && in_array('menu-item-has-children', $item->classes)) {
            $icon = '<i style="" class="toggleButton ico-0009 fa-solid fa-caret-right" onclick="toggleIcon(this)"></i>';
        } else {
            $icon = '';
        }

        // 使用动态设置的值构建 $item_output
        $item_output = sprintf(
            '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            apply_filters('the_title', $item->title, $item->ID),
            $args->link_before,
            $args->link_after,
            $icon
        );


        // 获取当前菜单项的子菜单项
        $children = wp_get_nav_menu_items($item->ID);

        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

        //定义ul的样式
        $indent = str_repeat("\t", $depth);
        $sub_menu_class = ($depth === 1) ? 'len-nav-ul-second' : '';
        // 寻找现有的ul元素，并添加新的类
        $output = str_replace('<ul class="sub-menu">', '<ul class="' . $sub_menu_class . '" style="display: none;">', $output);
    }
}

class Leaf_Top_Nav extends Walker_Nav_Menu
{

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $wp_query;
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // 缩进

        $depth_classes = array();
        if ($depth == 0) {
            $depth_classes[] = 'len-banner-nav banner-nav-li';
        }
        $depth_class_names = esc_attr(implode(' ', $depth_classes));

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item))); //这句我没看懂，不知道是在干啥

        // 把样式合成到li里面
        // 把样式合成到li里面
        $output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . '">';

        // 处理图标
        $Nav_Module_1_3 = _Len_Nav_Module($item->ID, 'Nav_Module_1_3');
        $Nav_Module_1_2 = _Len_Nav_Module($item->ID, 'Nav_Module_1_2');
        $Nav_Module_1_1 = _Len_Nav_Module($item->ID, 'Nav_Module_1_1');
        $Nav_Module_1 = _Len_Nav_Module($item->ID, 'Nav_Module_1');
        if ($Nav_Module_1 == 'icon_1') {
            if (!empty($Nav_Module_1_1)) {
                $output .=  $Nav_Module_1_1;
            }
        } elseif ($Nav_Module_1 == 'icon_2') {
            if (!empty($Nav_Module_1_2)) {
                $output .= '<i class="fas ' . $Nav_Module_1_2 . '"></i>'; // 输出图标的 HTML
            }
        } elseif ($Nav_Module_1 == 'icon_3') {
            if (!empty($Nav_Module_1_3)) {
                $output .= '<svg class="len-banner-nav-icon" aria-hidden="true">
            <use xlink:href="#icon-' . $Nav_Module_1_3 . '"></use>
        </svg>'; // 输出图标的 HTML
            }
        }

        // 处理a的属性
        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
        $attributes .= ' class="banner-nav-a-links len-pjax-link-all-blcok"';
        $link_before = ''; // 定义$link_before变量
        $link_after = ''; // 定义$link_after变量
        // 使用动态设置的值构建 $item_output
        $item_output = sprintf(
            '%1$s<a%2$s>%3$s%4$s%5$s</a>',
            $args->before,
            $attributes,
            apply_filters('the_title', $item->title, $item->ID),
            $link_before,
            $link_after
        );


        // 获取当前菜单项的子菜单项
        $children = wp_get_nav_menu_items($item->ID);

        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

        //定义ul的样式
        $indent = str_repeat("\t", $depth);
        $sub_menu_class = ($depth === 1) ? 'leaf_second_menu_sidebar_ul' : 'leaf_third_menu_sidebar_ul';

        // 寻找现有的ul元素，并添加新的类
        $output = str_replace('<ul class="sub-menu">', '<ul class="' . $sub_menu_class . '">', $output);
    }
}
