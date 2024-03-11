<?php
$var = '1.0.0';
function enqueue_custom_admin_styles()
{
    global $var;
    //引用主题的设置样式文件
    wp_enqueue_style('Len', CSF::include_plugin_url('assets/css/len.css'), array(), $var, 'all');
    wp_enqueue_style('Len-min', CSF::include_plugin_url('assets/css/len.min.css'), array(), $var, 'all');
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_styles');

//前台全局CSS和JS文件
function Len_scripts_styles()
{

    global $var;
    //引用JavaScript文件
    if (is_home()) {
    } elseif (is_search()) {
    } elseif (is_archive()) {
    } elseif (is_single()) {
        wp_enqueue_script('article', get_template_directory_uri() . '/Assets/Lne-JavaScript/article.js', array(), $var, true);
    }
    wp_enqueue_script('Len-swiper', get_template_directory_uri() . '/Assets/Lne-JavaScript/swiper-bundle.min.js', array(), $var, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/Assets/Lne-JavaScript/main.js', array(), $var, true);

    wp_enqueue_script('Len-jquery', get_template_directory_uri() . '/Assets/Lne-JavaScript/jquery.js', array(), $var, false);
    wp_enqueue_script('Len-menmes-js', get_template_directory_uri() . '/Assets/Lne-JavaScript/menmes.js', array(), $var, false);
    wp_enqueue_script('fancybox-umd', get_template_directory_uri() . '/Assets/Lne-JavaScript/fancybox.umd.js', array(), $var, true);
    wp_enqueue_script('music-min', get_template_directory_uri() . '/Assets/Lne-JavaScript/music.min.js', array(), $var, true);


    //引用Css样式文件
    wp_enqueue_style('Len-header', get_template_directory_uri() . '/Assets/Len-Css/header.css', array(), $var, 'all');
    wp_enqueue_style('fancybox', get_template_directory_uri() . '/Assets/Len-Css/fancybox.css', array(), $var, 'all');
    wp_enqueue_style('Len-menmes-css', get_template_directory_uri() . '/Assets/Len-Css/menmes.css', array(), $var, 'all');
    wp_enqueue_style('Len-main', get_template_directory_uri() . '/Assets/Len-Css/main.css', array(), $var, 'all');
    wp_enqueue_style('Len-footer', get_template_directory_uri() . '/Assets/Len-Css/footer.css', array(), $var, 'all');
    wp_enqueue_style('Len-diary', get_template_directory_uri() . '/Assets/Len-Css/diary.css', array(), $var, 'all');
    wp_enqueue_style('music-min', get_template_directory_uri() . '/Assets/Len-Css/music.min.css', array(), $var, 'all');


    //幻灯片样式
    wp_enqueue_style('Len-swiper', get_template_directory_uri() . '/Assets/Len-Css/swiper-bundle.min.css', array(), $var, 'all');

    //文章页样式
    wp_enqueue_style('Len-article', get_template_directory_uri() . '/Assets/Len-Css/article.css', array(), $var, 'all');

    //图标引用
    wp_enqueue_script('ali', '//at.alicdn.com/t/c/font_4353348_olazyjuckre.js', array(), $var, true);
    add_action('wp_footer', 'Len_footer_content', 20);
}
add_action('wp_enqueue_scripts', 'Len_scripts_styles');

function Len_footer_content()
{
?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script> -->
    <script type="text/javascript">
        const ap = new APlayer({
            container: document.getElementById('aplayer'),
            audio: [{
                name: 'name',
                artist: 'artist',
                url: 'url.mp3',
                cover: 'cover.jpg'
            }]
        });
    </script>
    <script type="text/javascript">
        Fancybox.bind('[data-fancybox="gallery"]', {
            Toolbar: {
                display: {
                    left: ["infobar"],
                    middle: ["zoomIn", "zoomOut", "toggle1to1", "rotateCCW", "rotateCW", "flipX", "flipY", ],
                    right: ["iterateZoom",
                        "slideshow",
                        "fullscreen",
                        "thumbs",
                        "close",
                    ],
                },
            },
        });
    </script>
<?php
}

/**
 * 在WordPress主题的<head>部分添加自定义的<meta>标签。
 */
function Len_content_before_hade()
{
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">' . PHP_EOL;
    // echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />';
    echo Len_Seo_Module();
}

// 将函数挂载到wp_head动作上
add_action('wp_head', 'Len_content_before_hade');
