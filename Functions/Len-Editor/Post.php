<?php

/**
 * 添加主题支持特色图像（缩略图）
 *
 * 这段代码使用 function_exists 函数检查是否存在 add_theme_support 函数。
 * 如果 add_theme_support 函数存在，表示当前 WordPress 版本支持主题功能。
 * 然后，通过 add_theme_support 函数添加对特色图像（缩略图）的支持。
 *
 * @return void 无返回值。
 */
if (function_exists('add_theme_support')) {
    // 添加对特色图像（缩略图）的支持
    add_theme_support('post-thumbnails');
}


//注册自定义文章类型
function Len_Diary_Post()
{
    $args = array(
        'public' => true, // 是否公开可见
        'name' => 'say', // 自定义文章类型的名称
        'labels' => array(
            'name' => '说说', // 自定义文章类型的名称
            'singular_name' => '写说说', // 自定义文章类型的单数形式名称
        ),
        'taxonomies' => array('category', 'post_tag'),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'category', 'tags'), // 设置支持的功能
        'menu_icon' => get_template_directory_uri() . '/Assets/Len-Images/Admin/saysay.svg', // 设置图标路径
        'menu_position' => 6,
    );
    register_post_type('say', $args); // 将 'post_type' 参数改为 'say'
}
add_action('init', 'Len_Diary_Post');
