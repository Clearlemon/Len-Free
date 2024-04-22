<?php
$var = '2.7.1';
function enqueue_custom_admin_styles()
{
    global $var;
    //引用主题的设置样式文件
    wp_enqueue_style('Len-min', CSF::include_plugin_url('assets/css/len.min.css'), array(), $var, 'all');
    wp_enqueue_script('len-min', CSF::include_plugin_url('assets/js/len.min.js'), array(), $var, 'all');
    wp_enqueue_script('ali-set-min', '//at.alicdn.com/t/c/font_4398276_fd8voicbj9.js', array(), $var, true);
    wp_enqueue_script('ali-svg-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/alisvg.min.js', array(), $var, true);
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_styles');

//前台全局CSS和JS文件
function Len_scripts_styles()
{

    global $var;
    //引用JavaScript文件
    if (is_home()) {
        wp_enqueue_script('Len-swiper-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/swiper-bundle.min.js', array(), $var, true);
    } elseif (is_search()) {
    } elseif (is_archive()) {
    } elseif (is_single()) {
        wp_enqueue_script('article-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/article.min.js', array(), $var, true);
        wp_enqueue_script('Len-menmes', get_template_directory_uri() . '/Assets/Lne-JavaScript/menmes.min.js', array(), $var, false);
        wp_enqueue_style('music-min', get_template_directory_uri() . '/Assets/Len-Css/music.min.css', array(), $var, 'all');
        wp_enqueue_script('music-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/music.min.js', array(), $var, true);

        wp_enqueue_style('tocbot-min', get_template_directory_uri() . '/Assets/Len-Css/tocbot.min.css', array(), $var, 'all');
        wp_enqueue_script('tocbot-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/tocbot.min.js', array(), $var, true);
    } elseif (is_page()) {
    }
    wp_enqueue_style('link-min', get_template_directory_uri() . '/Assets/Len-Css/link.min.css', array(), $var, 'all');
    wp_enqueue_style('prism-min', get_template_directory_uri() . '/Assets/Len-Css/prism.min.css', array(), $var, 'all');
    wp_enqueue_script('prism-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/prism.min.js', array(), $var, true);


    wp_enqueue_style('sidebar-min', get_template_directory_uri() . '/Assets/Len-Css/sidebar.min.css', array(), $var, 'all');
    wp_enqueue_script('sidebar-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/sidebar.min.js', array(), $var, true);


    wp_enqueue_script('scrollreveal-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/scrollreveal.min.js', array(), $var, true);
    wp_enqueue_script('index-main', get_template_directory_uri() . '/Assets/Lne-JavaScript/index.main.js', array(), $var, true);
    wp_enqueue_script('jquery-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/jquery.min.js', array(), $var, false);
    wp_enqueue_script('bootstrap-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/sticky-sidebar.min.js', array(), $var, true);
    wp_enqueue_style('comments-min', get_template_directory_uri() . '/Assets/Len-Css/comments.min.css', array(), $var, 'all');
    wp_enqueue_script('comments-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/comments.min.js', array(), $var, true);

    wp_enqueue_script('fancybox-umd-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/fancybox.umd.js', array(), $var, true);

    wp_enqueue_script('lazyload-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/lazyload.min.js', array(), $var, true);
    wp_enqueue_script('message-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/message.min.js', array(), $var, true);
    wp_enqueue_script('smoothscroll-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/smoothscroll.min.js', array(), $var, true);

    //引用Css样式文件
    wp_enqueue_style('animate-min', get_template_directory_uri() . '/Assets/Len-Css/animate.min.css', array(), $var, 'all');
    wp_enqueue_style('classify-min', get_template_directory_uri() . '/Assets/Len-Css/classify.min.css', array(), $var, 'all');
    wp_enqueue_style('fasicon-min', get_template_directory_uri() . '/Assets/Len-Font/fasicon.min.css', array(), $var, 'all');
    wp_enqueue_style('header-min', get_template_directory_uri() . '/Assets/Len-Css/header.min.css', array(), $var, 'all');
    wp_enqueue_style('fancybox-min', get_template_directory_uri() . '/Assets/Len-Css/fancybox.min.css', array(), $var, 'all');
    wp_enqueue_style('menmes-min', get_template_directory_uri() . '/Assets/Len-Css/menmes.min.css', array(), $var, 'all');
    wp_enqueue_style('index-main', get_template_directory_uri() . '/Assets/Len-Css/index.main.css', array(), $var, 'all');
    wp_enqueue_style('footer-min', get_template_directory_uri() . '/Assets/Len-Css/footer.min.css', array(), $var, 'all');
    wp_enqueue_style('diary-min', get_template_directory_uri() . '/Assets/Len-Css/diary.min.css', array(), $var, 'all');

    wp_enqueue_style('message-min', get_template_directory_uri() . '/Assets/Len-Css/message.min.css', array(), $var, 'all');
    wp_enqueue_style('search-min', get_template_directory_uri() . '/Assets/Len-Css/search.min.css', array(), $var, 'all');



    //幻灯片样式
    wp_enqueue_style('Len-swiper', get_template_directory_uri() . '/Assets/Len-Css/swiper-bundle.min.css', array(), $var, 'all');


    //文章页样式
    wp_enqueue_style('article-min', get_template_directory_uri() . '/Assets/Len-Css/article.min.css', array(), $var, 'all');

    //图标引用
    wp_enqueue_script('ali-svg-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/alisvg.min.js', array(), $var, true);
    add_action('wp_footer', 'Len_footer_content', 20);
}
add_action('wp_enqueue_scripts', 'Len_scripts_styles');

function Len_footer_content()
{
    if (is_single()) {
        Len_Module_Music_Js();
    }
}

/**
 * 在WordPress主题的<head>部分添加自定义的<meta>标签。
 */
function Len_content_before_hade()
{
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">' . PHP_EOL;
    echo '<meta charset="UTF-8">';
    echo Len_Web_Background();
    echo Len_Seo_Module();
}

// 将函数挂载到wp_head动作上
add_action('wp_head', 'Len_content_before_hade');
