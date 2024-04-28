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
// function Len_Post_Link($url, $post)
// {
//     if ($post->post_type == 'diary') {
//         $url = trailingslashit(home_url('/diary/') . $post->ID);
//     } elseif ($post->post_type == 'photo') {
//         $url = trailingslashit(home_url('/photo/') . $post->ID);
//     }
//     return $url;
// }
// add_filter('post_type_link', 'Len_Post_Link', 10, 2);

// /**
//  * Len_Rewrite_Rules 函数用于添加自定义的重写规则。
//  *
//  * 该函数通过 add_filter 将自己添加为 'rewrite_rules_array' 过滤器，以便在生成重写规则时应用这个功能。
//  * 分别为 'diary' 和 'photo' 文章类型添加自定义的规则，将文章 ID 包含在链接中。
//  *
//  * @param array $rules 默认的重写规则数组。
//  * @return array 处理后的重写规则数组。
//  */
// function Len_Rewrite_Rules($rules)
// {
//     $new_rules = array();

//     // 添加 'diary' 文章类型的规则
//     $new_rules['diary/([0-9]+)/?$'] = 'index.php?post_type=diary&p=$matches[1]';

//     // 添加 'photo' 文章类型的规则
//     $new_rules['photo/([0-9]+)/?$'] = 'index.php?post_type=photo&p=$matches[1]';


//     return $new_rules + $rules;
// }
// add_filter('rewrite_rules_array', 'Len_Rewrite_Rules');

// /**
//  * Len_Rewrite_Rules_Flush 函数用于在 WordPress 初始化时刷新重写规则。
//  *
//  * 该函数通过 add_action 将自己添加为 'init' 动作，以便在 WordPress 初始化时应用这个功能。
//  * 主要目的是在修改了重写规则后，刷新规则，确保新规则生效。
//  */
// function Len_Rewrite_Rules_Flush()
// {
//     global $wp_rewrite;
//     $wp_rewrite->flush_rules();
// }
// add_action('init', 'Len_Rewrite_Rules_Flush');

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
        'description'   => '网站的日记信息',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports'      => array('title', 'editor', 'thumbnail', 'author', 'tags'),
        'taxonomies'    => array('diary_tag'), // 添加 'post_tag' 到支持的分类法中
        'menu_icon'     => get_template_directory_uri() . '/Assets/Len-Images/Admin/Diary.svg',
    );

    // 注册自定义文章类型 'diary'
    register_post_type('diary', $args);
}
add_action('init', 'Len_Diary_Post');

// 注册自定义标签分类法
function Len_Diary_Tag()
{
    $labels = array(
        'name'               => '日记标签',
        'singular_name'      => 'diary_tag',
        'add_new'            => '编写日记标签',
        'add_new_item'       => '新写一个日记标签',
        'edit_item'          => '编辑日记标签',
        'new_item'           => '新日记标签',
        'all_items'          => '所有日记标签',
        'view_item'          => '查看日记标签',
        'search_items'       => '搜索日记标签',
        'not_found'          => '没有找到有关日记标签',
        'not_found_in_trash' => '回收站里面没有相关日记标签',
        'menu_name'          => '日记标签'
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'diary-tag'),
    );

    register_taxonomy('diary_tag', array('diary'), $args);
}
add_action('init', 'Len_Diary_Tag');


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
        'description'   => '网站的相册信息',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports'      => array('title', 'editor', 'thumbnail', 'author', 'tags'),
        'taxonomies'    => array('photo_tag'),
        'capability_type' => 'post',
        'menu_icon'     => get_template_directory_uri() . '/Assets/Len-Images/Admin/Photo.svg',
    );

    // 注册自定义文章类型 'Photo'
    register_post_type('photo', $args);
}
add_action('init', 'Len_Photo_Post');

function Len_Photo_Tag()
{
    $labels = array(
        'name'               => '相册标签',
        'singular_name'      => 'photo_tag',
        'add_new'            => '编写相册标签',
        'add_new_item'       => '新写一个相册标签',
        'edit_item'          => '编辑相册标签',
        'new_item'           => '新相册标签',
        'all_items'          => '所有相册标签',
        'view_item'          => '查看相册标签',
        'search_items'       => '搜索相册标签',
        'not_found'          => '没有找到有关相册标签',
        'not_found_in_trash' => '回收站里面没有相关相册标签',
        'menu_name'          => '相册标签'
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'photo-tag'),
    );

    register_taxonomy('photo_tag', array('photo'), $args);
}
add_action('init', 'Len_Photo_Tag');
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
        'ul' => 'len_post_ul_blcok',
        'ol' => 'len_post_ol_blcok',
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


/**
 * 在文章内容中的img标签上增加额外的类、data-src属性，并包裹在a标签中
 *
 * @param string $content 文章内容
 * @return string 修改后的文章内容
 */
function Fetch_Post_Content_IMG($content)
{
    // 定义查找img标签的正则表达式模式
    $pattern = '/<img([^>]*)>/i';

    // 使用正则表达式匹配文章内容中的img标签，并在匹配到的每个标签上执行回调函数
    $content = preg_replace_callback($pattern, 'Parse_Post_Content_IMG', $content);

    // 返回修改后的文章内容
    return $content;
}
add_filter('the_content', 'Fetch_Post_Content_IMG');

/**
 * 回调函数：在img标签上增加额外的类、data-src属性，并包裹在a标签中
 *
 * @param array $matches 匹配到的img标签
 * @return string 修改后的img标签
 */
function Parse_Post_Content_IMG($matches)
{
    // 原始的img标签
    $img_tag = $matches[0];

    // 原始img标签的属性字符串
    $attributes = $matches[1];

    // 获取原始img标签的src属性值
    preg_match('/src="([^"]+)"/i', $attributes, $src_match);
    $src = isset($src_match[1]) ? $src_match[1] : '';
    $Lazy = Len_Lazy_Thumbnail();
    // 在原始img标签的类属性中增加额外的类
    $new_img_tag = str_replace('class="', 'class="len_post_content_img lazy ', $img_tag);

    // 添加data-src属性
    $new_img_tag = preg_replace('/src="([^"]+)"/i', 'src="' . $Lazy . '" data-src="$1"', $new_img_tag);

    // 包裹在a标签中
    $new_img_tag = '<a data-fancybox="gallery" href="' . $src . '">' . $new_img_tag . '</a>';

    // 返回修改后的img标签
    return $new_img_tag;
}



if (!function_exists('Len_All_Icons')) {

    function Len_All_Icons($icons)
    {

        $icons[]  = array(
            'title' => 'Len主题自用的SVG',
            'icons' => array(
                'icon-gitee',
                'icon-beianxinxi-ICP-gonganbeian',
                'icon-biaoqingbao1',
                'icon-zantianchongxiao',
                'icon-icon-plq',
                'icon-biaoqian1',
                'icon-dian',
                'icon-tupian',
                'icon-arrow_left',
                'icon-arrow_right',
                'icon-cuowu',
                'icon-weixin',
                'icon-weibo',
                'icon-QQ',
                'icon-youxiang',
                'icon-moe-beian',
                'icon-xieyi',
                'icon-xieyi',
                'icon-guanyuwomen',
                'icon-beian',
                'icon-wordpress',
                'icon-mianxingningmeng',
                'icon-dianzan',
                'icon-toubi',
                'icon-fenxiang',
                'icon-xihuan',
                'icon-liulan',
                'icon-pinglun',
                'icon-shijianzhouqi',
                'icon-Rss',
                'icon-github',
                'icon-set-up-dot',
                'icon-biaoqian',
                'icon-xiangce',
                'icon-guidang',
                'icon-sort',
                'icon-shouye5-copy',
                'icon-kantanriji',
                'icon-guidang1',
                'icon-yemianshezhi',
                'icon-fenleix',
                'icon-tubiao',
                'icon-qjpz',
                'icon-shezhi1',
                'icon-shouye',
                'icon-yemiankuangjia_o',
                'icon-quanjushezhi',
                'icon-find',
                'icon-biaoqian11',
                'icon-mokuai',
                'icon-icon_61308998f3924',
                'icon-shuoshuo',
                'icon-shangjiayouhua',
                'icon-line-layouttopdingbubuju-02',
                'icon-6_10shangxiaguanxi',
                'icon-dibu',
                'icon-rizhi',
                'icon-SEO',
                'icon-wenzhangliebiao',
                'icon-',
                'icon-',
                'icon-',
                'icon-',
                'icon-',
                //占位SVG开始
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                'icon-Other-18',
                //占位SVG结束
                //第一版SVG
                'icon-kefuguanli',
                'icon-laodonghetong',
                'icon-kaoqinguanli',
                'icon-kaizhibaoxiao',
                'icon-guanlishezhi',
                'icon-gongzuorenwu',
                'icon-huiyuanshenqing',
                'icon-guanyuwomen1',
                'icon-gongzimingxi',
                'icon-gengduoyingyong',
                'icon-gongzuorizhi',
                'icon-dianzimingpian',
                'icon-gongzichaxun',
                'icon-bukashenqing',
                'icon-dakaguanli',
                'icon-chuchashenqing',
                //第二版SVG
                'icon-zhujiaotongji',
                'icon-zhujiaoguanli',
                'icon-yuezhangdan',
                'icon-zhangdantongji_1',
                'icon-youhuiquanfenlei',
                'icon-jiejiari',
                'icon-tongjifenxi',
                'icon-shangpinguanli',
                'icon-benyueyingshoupaihang',
                'icon-qiuzhuoshezhi',
                'icon-zhujiaoticheng',
                'icon-shangpintongji',
                'icon-huiyuanliebiao',
                'icon-jiaobanjilu',
                'icon-huiyuanpaihang',
                'icon-chongzhijilu',
                //第三版SVG
                'icon-anquan',
                'icon-yun',
                'icon-bofang',
                'icon-liebiao',
                'icon-yanjing',
                'icon-xiaoxi',
                'icon-dianzan1',
                'icon-dingwei',
                'icon-gengduo',
                'icon-shoucang',
                'icon-shezhi',
                'icon-shijian',
                'icon-sousuo',
                'icon-faxian',
                'icon-xinxi',
                'icon-shanchu',
                //第四版SVG
                'icon-qiyexiangce',
                'icon-gongsigonggao',
                'icon-kaoqinguanli1',
                'icon-qiyebumen',
                'icon-lizhishenqing',
                'icon-kefuguanli1',
                'icon-dianzimingpian1',
                'icon-liuchengshenpi',
                'icon-guanlishezhi1',
                'icon-huiyuanshenqing1',
                'icon-gongzuorenwu1',
                'icon-gongzimingxi1',
                'icon-gengduoyingyong1',
                'icon-guanyuwomen2',
                'icon-gongzuorizhi1',
                'icon-chuchashenqing1',
            ),
        );

        //
        // Move custom icons to top of the list.
        $icons = array_reverse($icons);

        return $icons;
    }
    add_filter('csf_field_icon_add_icons', 'Len_All_Icons');
}


/**
 * 后台编辑器函数引用
 */

add_filter('mce_external_plugins', 'add_tinymce_plugin');
add_filter('mce_buttons', 'register_mce_button');
add_filter('mce_buttons_2', 'register_mce_button2');
add_filter('mce_buttons_3', 'register_mce_button3');

function add_tinymce_plugin($plugin_array)
{

    $plugin_array['codesample'] =  get_template_directory_uri() . '/Assets/Admin/Short-Code/plugin.min.js';
    $plugin_array['cntent_hidden'] = get_template_directory_uri() . '/Assets/Admin/Short-Code/Hide-Codes/Hide.js';
    $plugin_array['cntent_video'] = get_template_directory_uri() . '/Assets/Admin/Short-Code/Video-Codes/Video.js';
    $plugin_array['cntent_reply_view'] = get_template_directory_uri() . '/Assets/Admin/Short-Code/Reply-View-Codes/Reply.js';
    $plugin_array['cntent_password_viewing'] = get_template_directory_uri() . '/Assets/Admin/Short-Code/Password-Viewing-Codes/Password.js';
    $plugin_array['cntent_fold'] = get_template_directory_uri() . '/Assets/Admin/Short-Code/Fold-Codes/Fold.js';
    $plugin_array['cntent_background'] = get_template_directory_uri() . '/Assets/Admin/Short-Code/Background-Codes/Background.js';
    $plugin_array['cntent_click_view'] = get_template_directory_uri() . '/Assets/Admin/Short-Code/Click-View-Codes/Cick.js';

    return $plugin_array;
}

//注册第一行按钮
function register_mce_button($buttons)
{
    array_push($buttons, "|", "codesample",);


    return $buttons;
}

function register_mce_button2($buttons)
{
    array_push($buttons, "|", "cntent_hidden", "cntent_reply_view", "cntent_password_viewing", "cntent_fold", "cntent_click_view");


    return $buttons;
}

function register_mce_button3($buttons)
{
    array_push($buttons, "cntent_video", "cntent_background");


    return $buttons;
}
