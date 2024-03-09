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


/**
 * Len_Diary_Post 函数用于注册一个自定义的文章类型 'say'，用于表示说说或日记。
 *
 * 该函数使用 register_post_type 函数注册自定义文章类型，设置了各种参数以定义该文章类型的属性。
 * 包括是否公开可见、名称、标签、支持的功能、图标路径、菜单位置等。
 *
 * @return void 无返回值。
 */
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

    // 使用 register_post_type 函数注册 'say' 文章类型
    register_post_type('say', $args);
}

// 在 WordPress 初始化时执行 Len_Diary_Post 函数
add_action('init', 'Len_Diary_Post');



/**
 * Len_Content_Class 函数用于在文章内容中的标题标签（h1、h2、h3、h4、h5、h6）添加自定义样式类。
 *
 * 该函数定义了一个关联数组 $headings，其中包含标题级别和对应的样式类。
 * 然后，通过正则表达式匹配文章内容中的标题标签，并在匹配到的标签中添加指定的样式类。
 * 最后，通过 add_filter 函数将 Len_Content_Class 函数添加为 'the_content' 过滤器，以便在显示文章内容时应用这个功能。
 *
 * @param string $content 文章内容。
 * @return string 处理后的文章内容。
 */
function Len_Content_Class($content)
{
    // 定义标题级别和对应的样式类
    $headings = array(
        'h1' => 'len_post_title_h1',
        'h2' => 'len_post_title_h2',
        'h3' => 'len_post_title_h3',
        'h4' => 'len_post_title_h4',
        'h5' => 'len_post_title_h5',
        'h6' => 'len_post_title_h6',
    );

    // 使用正则表达式匹配文章内容中的标题并添加自定义类
    foreach ($headings as $tag => $class) {
        $pattern = '/<' . $tag . '([^>]*)>/i';
        $replacement = '<' . $tag . ' class="' . $class . '"$1>';
        $content = preg_replace($pattern, $replacement, $content);
    }

    return $content;
}

// 添加 Len_Content_Class 函数为 'the_content' 过滤器
add_filter('the_content', 'Len_Content_Class');
