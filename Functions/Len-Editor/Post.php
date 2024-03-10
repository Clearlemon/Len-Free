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
 * Len_Post_Link 函数用于定义文章类型 'diary' 和 'photo' 的自定义固定链接结构。
 *
 * 该函数通过 add_filter 将自己添加为 'post_type_link' 过滤器，以便在获取文章链接时应用这个功能。
 * 根据文章类型 ('diary' 或 'photo')，函数构建不同的链接结构，包含文章的 ID。
 *
 * @param string $url   默认的文章链接。
 * @param WP_Post $post 当前文章的 WP_Post 对象。
 * @return string 处理后的文章链接。
 */
function Len_Post_Link($url, $post)
{
    if ($post->post_type == 'diary') {
        $url = trailingslashit(home_url('/diary/') . $post->ID);
    } elseif ($post->post_type == 'photo') {
        $url = trailingslashit(home_url('/photo/') . $post->ID);
    }
    return $url;
}
add_filter('post_type_link', 'Len_Post_Link', 10, 2);

/**
 * Len_Rewrite_Rules 函数用于添加自定义的重写规则。
 *
 * 该函数通过 add_filter 将自己添加为 'rewrite_rules_array' 过滤器，以便在生成重写规则时应用这个功能。
 * 分别为 'diary' 和 'photo' 文章类型添加自定义的规则，将文章 ID 包含在链接中。
 *
 * @param array $rules 默认的重写规则数组。
 * @return array 处理后的重写规则数组。
 */
function Len_Rewrite_Rules($rules)
{
    $new_rules = array();

    // 添加 'diary' 文章类型的规则
    $new_rules['diary/([0-9]+)/?$'] = 'index.php?post_type=diary&p=$matches[1]';

    // 添加 'photo' 文章类型的规则
    $new_rules['photo/([0-9]+)/?$'] = 'index.php?post_type=photo&p=$matches[1]';

    return $new_rules + $rules;
}
add_filter('rewrite_rules_array', 'Len_Rewrite_Rules');

/**
 * Len_Rewrite_Rules_Flush 函数用于在 WordPress 初始化时刷新重写规则。
 *
 * 该函数通过 add_action 将自己添加为 'init' 动作，以便在 WordPress 初始化时应用这个功能。
 * 主要目的是在修改了重写规则后，刷新规则，确保新规则生效。
 */
function Len_Rewrite_Rules_Flush()
{
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}
add_action('init', 'Len_Rewrite_Rules_Flush');




/**
 * Len_Taxonomies_Diary 函数用于注册自定义分类标签 '日记分类' 并将其关联到自定义文章类型 '日记'。
 *
 * 该函数定义了分类标签的名称、搜索和显示等相关信息，并设置了分类标签为层级结构。
 * 然后，通过 register_taxonomy 函数将 'diary_category' 注册到 'diary' 文章类型。
 *
 * @return void
 */
function Len_Taxonomies_Diary()
{
    // 设置分类标签的显示名称等信息
    $labels = array(
        'name'              => '日记分类',
        'singular_name'     => '日记分类',
        'search_items'      => '搜索日记分类',
        'all_items'         => '所有日记分类',
        'parent_item'       => '该日记分类的上级分类',
        'parent_item_colon' => '该日记分类的上级分类：',
        'edit_item'         => '编辑日记分类',
        'update_item'       => '更新日记分类',
        'add_new_item'      => '添加新的日记分类',
        'new_item_name'     => '新日记分类',
        'menu_name'         => '日记分类',
    );

    // 设置分类标签的参数
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );

    // 注册分类标签 'diary_category' 到 'diary' 文章类型
    register_taxonomy('diary_category', 'diary', $args);
}
add_action('init', 'Len_Taxonomies_Diary', 0);

/**
 * Len_Diary_Post 函数用于注册自定义文章类型 '日记'，并设置相关参数和支持的功能。
 *
 * 该函数定义了文章类型的显示名称、支持的功能、分类法、重写规则等相关信息。
 * 然后，通过 register_post_type 函数将 'diary' 文章类型注册到 WordPress。
 *
 * @return void
 */
function Len_Diary_Post()
{
    // 设置自定义文章类型 '日记' 的显示名称等信息
    $labels = array(
        'name'               => '日记',
        'singular_name'      => 'diary',
        'add_new'            => '编写日记',
        'add_new_item'       => '新写一个日记',
        'edit_item'          => '编辑日记',
        'new_item'           => '新日记',
        'all_items'          => '所有日记',
        'view_item'          => '查看日记',
        'search_items'       => '搜索日记',
        'not_found'          => '没有找到有关日记',
        'not_found_in_trash' => '回收站里面没有相关日记',
        'menu_name'          => '日记'
    );

    // 设置自定义文章类型的参数
    $args = array(
        'labels'        => $labels,
        'description'   => '我们网站的日记信息',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array('title', 'editor', 'thumbnail', 'author', 'tags'),
        'has_archive'   => false,
        'taxonomies'    => array('post_tag', 'diary_category'), // 添加 'post_tag' 到支持的分类法中
        'rewrite'       => array('with_front' => false, 'slug' => 'diary'),
        'capability_type' => 'post',
        'menu_icon'     => get_template_directory_uri() . '/Assets/Len-Images/Admin/saysay.svg',
    );

    // 注册自定义文章类型 'diary'
    register_post_type('diary', $args);
}
add_action('init', 'Len_Diary_Post');


/**
 * Len_Taxonomies_Photo 函数用于注册自定义分类标签 '相册分类' 并将其关联到自定义文章类型 '相册'。
 *
 * 该函数定义了分类标签的名称、搜索和显示等相关信息，并设置了分类标签为层级结构。
 * 然后，通过 register_taxonomy 函数将 'Photo_category' 注册到 'Photo' 文章类型。
 *
 * @return void
 */
function Len_Taxonomies_Photo()
{
    // 设置分类标签的显示名称等信息
    $labels = array(
        'name'              => '相册分类',
        'singular_name'     => '相册分类',
        'search_items'      => '搜索相册分类',
        'all_items'         => '所有相册分类',
        'parent_item'       => '该相册分类的上级分类',
        'parent_item_colon' => '该相册分类的上级分类：',
        'edit_item'         => '编辑相册分类',
        'update_item'       => '更新相册分类',
        'add_new_item'      => '添加新的相册分类',
        'new_item_name'     => '新相册分类',
        'menu_name'         => '相册分类',
    );

    // 设置分类标签的参数
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );

    // 注册分类标签 'Photo_category' 到 'Photo' 文章类型
    register_taxonomy('photo_category', 'photo', $args);
}
add_action('init', 'Len_Taxonomies_Photo', 0);

/**
 * Len_Photo_Post 函数用于注册自定义文章类型 '相册'，并设置相关参数和支持的功能。
 *
 * 该函数定义了文章类型的显示名称、支持的功能、分类法、重写规则等相关信息。
 * 然后，通过 register_post_type 函数将 'Photo' 文章类型注册到 WordPress。
 *
 * @return void
 */
function Len_Photo_Post()
{
    // 设置自定义文章类型 '相册' 的显示名称等信息
    $labels = array(
        'name'               => '相册',
        'singular_name'      => 'photo',
        'add_new'            => '编写相册',
        'add_new_item'       => '新写一个相册',
        'edit_item'          => '编辑相册',
        'new_item'           => '新相册',
        'all_items'          => '所有相册',
        'view_item'          => '查看相册',
        'search_items'       => '搜索相册',
        'not_found'          => '没有找到有关相册',
        'not_found_in_trash' => '回收站里面没有相关相册',
        'menu_name'          => '相册'
    );

    // 设置自定义文章类型的参数
    $args = array(
        'labels'        => $labels,
        'description'   => '我们网站的相册信息',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array('title', 'editor', 'thumbnail', 'author', 'tags'),
        'has_archive'   => false,
        'taxonomies'    => array('post_tag', 'photo_category'), // 添加 'post_tag' 到支持的分类法中
        'rewrite'       => array('with_front' => false, 'slug' => 'photo'),
        'capability_type' => 'post',
        'menu_icon'     => get_template_directory_uri() . '/Assets/Len-Images/Admin/saysay.svg',
    );

    // 注册自定义文章类型 'Photo'
    register_post_type('photo', $args);
}
add_action('init', 'Len_Photo_Post');


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
