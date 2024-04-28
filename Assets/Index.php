<?php
$var = '3.2.4';
function enqueue_custom_admin_styles()
{
    global $var;
    //引用主题的设置样式文件
    wp_enqueue_style('Len-min', CSF::include_plugin_url('assets/css/len.min.css'), array(), $var, 'all');
    wp_enqueue_script('len-min', CSF::include_plugin_url('assets/js/len.min.js'), array(), $var, 'all');
    wp_enqueue_script('ali-svg-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/alisvg.min.js', array(), $var, true);
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_styles');

//前台全局CSS和JS文件
function Len_scripts_styles()
{

    global $var;
    //引用JavaScript文件
    if (is_home()) {
        wp_enqueue_script('swiper-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/swiper-bundle.min.js', array(), $var, true);
    } elseif (is_search()) {
    } elseif (is_archive()) {
    } elseif (is_single()) {
        wp_enqueue_script('article-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/article.min.js', array(), $var, true);
        wp_enqueue_script('menmes-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/menmes.min.js', array(), $var, false);

        wp_enqueue_style('music-min', get_template_directory_uri() . '/Assets/Len-Css/music.min.css', array(), $var, 'all');
        wp_enqueue_script('music-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/music.min.js', array(), $var, true);

        //影视播放器样式和脚本文件
        wp_enqueue_style('plyr-min', get_template_directory_uri() . '/Assets/Len-Css/plyr.min.css', array(), $var, 'all');
        wp_enqueue_script('plyr-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/plyr.min.js', array(), $var, true);
        //短代码样式和脚本文件
        wp_enqueue_style('shord-codes-min', get_template_directory_uri() . '/Assets/Len-Css/shord-codes.min.css', array(), $var, 'all');
        wp_enqueue_script('shord-codes-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/shord-codes.min.js', array(), $var, true);

        //侧边栏文章目录
        wp_enqueue_style('tocbot-min', get_template_directory_uri() . '/Assets/Len-Css/tocbot.min.css', array(), $var, 'all');
        wp_enqueue_script('tocbot-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/tocbot.min.js', array(), $var, true);
    } elseif (is_page()) {
    }
    wp_enqueue_style('link-min', get_template_directory_uri() . '/Assets/Len-Css/link.min.css', array(), $var, 'all');
    wp_enqueue_script('link-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/link.min.js', array(), $var, true);

    wp_enqueue_style('prism-min', get_template_directory_uri() . '/Assets/Len-Css/prism.min.css', array(), $var, 'all');
    wp_enqueue_script('prism-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/prism.min.js', array(), $var, true);

    wp_enqueue_style('photo-min', get_template_directory_uri() . '/Assets/Len-Css/photo.min.css', array(), $var, 'all');

    wp_enqueue_style('sidebar-min', get_template_directory_uri() . '/Assets/Len-Css/sidebar.min.css', array(), $var, 'all');
    wp_enqueue_script('sidebar-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/sidebar.min.js', array(), $var, true);

    wp_enqueue_script('default-passive-events-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/default-passive-events.min.js', array(), $var, false);

    wp_enqueue_script('scrollreveal-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/scrollreveal.min.js', array(), $var, true);
    wp_enqueue_script('index-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/index.min.js', array(), $var, true);
    wp_enqueue_script('header-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/header.min.js', array(), $var, true);
    wp_enqueue_script('footer-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/footer.min.js', array(), $var, true);

    wp_enqueue_script('jquery-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/jquery.min.js', array(), $var, false);

    wp_enqueue_script('sticky-sidebar-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/sticky-sidebar.min.js', array(), $var, true);
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
    wp_enqueue_style('404-min', get_template_directory_uri() . '/Assets/Len-Css/404.min.css', array(), $var, 'all');
    wp_enqueue_style('fancybox-min', get_template_directory_uri() . '/Assets/Len-Css/fancybox.min.css', array(), $var, 'all');
    wp_enqueue_style('menmes-min', get_template_directory_uri() . '/Assets/Len-Css/menmes.min.css', array(), $var, 'all');
    wp_enqueue_style('index-min', get_template_directory_uri() . '/Assets/Len-Css/index.min.css', array(), $var, 'all');
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


//优化后的样式文件加载【有问题等待修复】
// function Len_scripts_styles()
// {

//     global $var;
//     //引用JavaScript文件
//     if (is_home()) {
//         //首页幻灯片样式和脚本
//         wp_enqueue_script('swiper-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/swiper-bundle.min.js', array(), $var, true);
//         wp_enqueue_style('Len-swiper', get_template_directory_uri() . '/Assets/Len-Css/swiper-bundle.min.css', array(), $var, 'all');

//         //灯箱样式文件和脚本文件/暂存
//         wp_enqueue_style('fancybox-min', get_template_directory_uri() . '/Assets/Len-Css/fancybox.min.css', array(), $var, 'all');
//         wp_enqueue_script('fancybox-umd-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/fancybox.umd.js', array(), $var, true);
//     } elseif (is_search()) {
//         //搜索页样式文件
//         wp_enqueue_style('search-min', get_template_directory_uri() . '/Assets/Len-Css/search.min.css', array(), $var, 'all');
//         wp_enqueue_script('search-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/search.umd.js', array(), $var, true);
//     } elseif (is_404()) {
//         //404页样式和脚本文件
//         wp_enqueue_style('404-min', get_template_directory_uri() . '/Assets/Len-Css/404.min.css', array(), $var, 'all');
//         wp_enqueue_script('404-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/404.umd.js', array(), $var, true);
//     } elseif (is_archive()) {
//         //分类样式和脚本文件
//         wp_enqueue_style('classify-min', get_template_directory_uri() . '/Assets/Len-Css/classify.min.css', array(), $var, 'all');
//         wp_enqueue_script('classify-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/classify.umd.js', array(), $var, true);
//     } elseif (is_single()) {
//         //文章页灯箱样式和脚本文件
//         wp_enqueue_style('fancybox-min', get_template_directory_uri() . '/Assets/Len-Css/fancybox.min.css', array(), $var, 'all');
//         wp_enqueue_script('fancybox-umd-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/fancybox.umd.js', array(), $var, true);

//         //文章页样式和脚本文件
//         wp_enqueue_script('article-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/article.min.js', array(), $var, true);
//         wp_enqueue_style('article-min', get_template_directory_uri() . '/Assets/Len-Css/article.min.css', array(), $var, 'all');
//         //评论表情包脚本
//         wp_enqueue_script('menmes-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/menmes.min.js', array(), $var, false);
//         wp_enqueue_style('menmes-min', get_template_directory_uri() . '/Assets/Len-Css/menmes.min.css', array(), $var, 'all');

//         //文章详情页代码高亮样式文件
//         wp_enqueue_style('prism-min', get_template_directory_uri() . '/Assets/Len-Css/prism.min.css', array(), $var, 'all');
//         wp_enqueue_script('prism-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/prism.min.js', array(), $var, true);

//         //文章短代码样式和脚本
//         wp_enqueue_style('music-min', get_template_directory_uri() . '/Assets/Len-Css/music.min.css', array(), $var, 'all');
//         wp_enqueue_script('music-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/music.min.js', array(), $var, true);

//         //文章页底部音乐播放器样式和脚本
//         wp_enqueue_style('music-min', get_template_directory_uri() . '/Assets/Len-Css/music.min.css', array(), $var, 'all');
//         wp_enqueue_script('music-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/music.min.js', array(), $var, true);

//         //文章详情页评论样式和脚本
//         wp_enqueue_style('comments-min', get_template_directory_uri() . '/Assets/Len-Css/comments.min.css', array(), $var, 'all');
//         wp_enqueue_script('comments-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/comments.min.js', array(), $var, true);

//         //侧边栏小工具样式和脚本【文章导航目录】
//         //进行小工具启用判断如果启用则输出如果未启用则不执行
//         if (is_active_widget(false, false, 'len_post_title_module', true)) {
//             wp_enqueue_style('tocbot-min', get_template_directory_uri() . '/Assets/Len-Css/tocbot.min.css', array(), $var, 'all');
//             wp_enqueue_script('tocbot-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/tocbot.min.js', array(), $var, true);
//         }
//     } elseif (is_page()) {
//         //页面灯箱样式和脚本文件
//         wp_enqueue_style('fancybox-min', get_template_directory_uri() . '/Assets/Len-Css/fancybox.min.css', array(), $var, 'all');
//         wp_enqueue_script('fancybox-umd-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/fancybox.umd.js', array(), $var, true);

//         //页面评论模块样式和脚本文件
//         wp_enqueue_script('menmes-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/menmes.min.js', array(), $var, false);
//         wp_enqueue_style('menmes-min', get_template_directory_uri() . '/Assets/Len-Css/menmes.min.css', array(), $var, 'all');

//         //页面代码高亮样式文件
//         wp_enqueue_style('prism-min', get_template_directory_uri() . '/Assets/Len-Css/prism.min.css', array(), $var, 'all');
//         wp_enqueue_script('prism-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/prism.min.js', array(), $var, true);

//         //页面评论样式和脚本
//         wp_enqueue_style('comments-min', get_template_directory_uri() . '/Assets/Len-Css/comments.min.css', array(), $var, 'all');
//         wp_enqueue_script('comments-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/comments.min.js', array(), $var, true);
//     } elseif (is_page_template('PageTemplates/Links.php')) {
//         //友情链接样式和脚本
//         wp_enqueue_style('link-min', get_template_directory_uri() . '/Assets/Len-Css/link.min.css', array(), $var, 'all');
//         wp_enqueue_script('link-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/link.min.js', array(), $var, true);
//     } elseif (is_page_template('PageTemplates/Diary.php')) {
//         //日记页样式文件
//         wp_enqueue_style('diary-min', get_template_directory_uri() . '/Assets/Len-Css/diary.min.css', array(), $var, 'all');
//     } elseif (is_page_template('PageTemplates/Photo.php')) {
//         //相册页样式文件
//         wp_enqueue_style('photo-min', get_template_directory_uri() . '/Assets/Len-Css/photo.min.css', array(), $var, 'all');

//         //相册页灯箱样式和脚本文件
//         wp_enqueue_style('fancybox-min', get_template_directory_uri() . '/Assets/Len-Css/fancybox.min.css', array(), $var, 'all');
//         wp_enqueue_script('fancybox-umd-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/fancybox.umd.js', array(), $var, true);
//     }

//     //引用Css样式文件
//     //动画样式文件
//     wp_enqueue_style('animate-min', get_template_directory_uri() . '/Assets/Len-Css/animate.min.css', array(), $var, 'all');
//     //图标样式文件【待优化】
//     wp_enqueue_style('fasicon-min', get_template_directory_uri() . '/Assets/Len-Font/fasicon.min.css', array(), $var, 'all');
//     //头部样式文件
//     wp_enqueue_style('header-min', get_template_directory_uri() . '/Assets/Len-Css/header.min.css', array(), $var, 'all');
//     //消息提示样式文件
//     wp_enqueue_style('message-min', get_template_directory_uri() . '/Assets/Len-Css/message.min.css', array(), $var, 'all');
//     //主页样式文件
//     wp_enqueue_style('index-min', get_template_directory_uri() . '/Assets/Len-Css/index.min.css', array(), $var, 'all');
//     //底部样式文件
//     wp_enqueue_style('footer-min', get_template_directory_uri() . '/Assets/Len-Css/footer.min.css', array(), $var, 'all');
//     //图标引用
//     wp_enqueue_script('ali-svg-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/alisvg.min.js', array(), $var, true);
//     //侧边栏样式文件
//     wp_enqueue_style('sidebar-min', get_template_directory_uri() . '/Assets/Len-Css/sidebar.min.css', array(), $var, 'all');


//     //脚本文件
//     //侧边栏脚本脚本文件
//     wp_enqueue_script('sidebar-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/sidebar.min.js', array(), $var, true);
//     //页面事件脚本文件
//     wp_enqueue_script('default-passive-events-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/default-passive-events.min.js', array(), $var, false);
//     //元素随页面滚动产生动画脚本文件
//     wp_enqueue_script('scrollreveal-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/scrollreveal.min.js', array(), $var, true);
//     //主页脚本文件
//     wp_enqueue_script('index-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/index.min.js', array(), $var, true);
//     //头部脚本文件
//     wp_enqueue_script('header-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/header.min.js', array(), $var, true);
//     //底部脚本文件
//     wp_enqueue_script('footer-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/footer.min.js', array(), $var, true);
//     //jq脚本文件
//     wp_enqueue_script('jquery-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/jquery.min.js', array(), $var, false);
//     //侧边栏粘贴脚本文件
//     wp_enqueue_script('sticky-sidebar-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/sticky-sidebar.min.js', array(), $var, true);
//     //懒加载脚本文件
//     wp_enqueue_script('lazyload-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/lazyload.min.js', array(), $var, true);
//     //提示框脚本文件
//     wp_enqueue_script('message-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/message.min.js', array(), $var, true);
//     //让页面滚动的更丝脚本文件【待使用】
//     wp_enqueue_script('smoothscroll-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/smoothscroll.min.js', array(), $var, true);


//     add_action('wp_footer', 'Len_footer_content', 20);
// }
// add_action('wp_enqueue_scripts', 'Len_scripts_styles');