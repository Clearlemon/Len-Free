<!DOCTYPE html>
<?php
/*
Template Name: Photo【相册】
*/

/**
 * wp_footer(); @引用Wordpress自带的顶部样式文件
 */
wp_head();
?>
<link rel="stylesheet" href="wp-content/themes/Len-Free/Assets/Len-Css/index-say.css">

<body>
    <img class="bady-background-block" src="wp-content/themes/Len-Free/Assets/Len-Images/body-background.jpg" alt="">
    <main class="len-body-main len-body-m">
        <?php
        /**
         * 引用底部样式
         * require_once get_theme_file_path('Page/Len-Block/Header.php');
         * Logo栏目模块样式文件目录
         */
        require_once get_theme_file_path('Page/Len-Block/Header.php');
        ?>

        <div id="len-content" class="len-content">
            <div class="len-content-min">
                <?php
                /**
                 * 引用底部样式
                 * require_once get_theme_file_path('Sidebars/Left-Sidebars.php');
                 * 左侧边栏模块样式文件目录
                 */
                require_once get_theme_file_path('Sidebars/Left-Sidebars.php');
                ?>
                <div class="len-showcase-main">
                    <!-- 图片开始 -->
                    <div id="len-waterfall">
                        <div class="len-waterfall-content">
                            <a data-fancybox="gallery" href="https://dmyblog.cn/wp-content/uploads/2023/12/2023122813134040.jpg"><img src="https://dmyblog.cn/wp-content/uploads/2023/12/2023122813134040.jpg" alt=""></a>
                        </div>
                        <div class="len-waterfall-content">
                            <a data-fancybox="gallery" href="https://dmyblog.cn/wp-content/uploads/2023/12/2023122813134040.jpg"><img src="https://dmyblog.cn/wp-content/uploads/2023/12/2023122813134040.jpg" alt=""></a>
                        </div>
                        <div class="len-waterfall-content">
                            <a data-fancybox="gallery" href="https://dmyblog.cn/wp-content/uploads/2024/03/2024030913355347.webp"><img src="https://dmyblog.cn/wp-content/uploads/2024/03/2024030913355347.webp" alt=""></a>
                        </div>
                        <div class="len-waterfall-content">
                            <a data-fancybox="gallery" href="https://dmyblog.cn/wp-content/uploads/2024/03/2024030913355347.webp"><img src="https://dmyblog.cn/wp-content/uploads/2024/03/2024030913355347.webp" alt=""></a>
                        </div>
                        <div class="len-waterfall-content">
                            <a data-fancybox="gallery" href="https://dmyblog.cn/wp-content/uploads/2024/02/2024021408193873.jpg"><img src="https://dmyblog.cn/wp-content/uploads/2024/02/2024021408193873.jpg" alt=""></a>
                        </div>
                        <div class="len-waterfall-content">
                            <a data-fancybox="gallery" href="https://dmyblog.cn/wp-content/uploads/2024/02/2024020417410171.jpg"><img src="https://dmyblog.cn/wp-content/uploads/2024/02/2024020417410171.jpg" alt=""></a>
                        </div>
                        <div class="len-waterfall-content">
                            <a data-fancybox="gallery" href="https://dmyblog.cn/wp-content/uploads/2024/02/2024020417410171.jpg"><img src="https://dmyblog.cn/wp-content/uploads/2024/02/2024020417410171.jpg" alt=""></a>
                        </div>
                        <div class="len-waterfall-content">
                            <a data-fancybox="gallery" href="https://dmyblog.cn/wp-content/uploads/2024/02/2024020417410171.jpg"><img src="https://dmyblog.cn/wp-content/uploads/2024/02/2024020417410171.jpg" alt=""></a>
                        </div>
                        <div class="len-waterfall-content">
                            <a data-fancybox="gallery" data-download-src="https://dmyblog.cn/wp-content/uploads/2024/02/2024020417410171.jpg" href="https://dmyblog.cn/wp-content/uploads/2024/02/2024020417410171.jpg"><img src="https://dmyblog.cn/wp-content/uploads/2024/02/2024020417410171.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- 图片结束 -->
                </div>
                <!-- <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script> -->
                



                <?php
                /**
                 * 引用右侧边栏样式
                 * require_once get_theme_file_path('Sidebars/Right-Sidebars.php');
                 * 右侧边栏模块样式文件目录
                 */
                require_once get_theme_file_path('Sidebars/Right-Sidebars.php');
                ?>
            </div>
        </div>
        </div>
        <?php
        /**
         * 引用底部样式
         * require_once get_theme_file_path('Page/Len-Block/Footer.php');
         * 底部模块样式文件目录
         */
        require_once get_theme_file_path('Page/Len-Block/Footer.php');


        /**
         * wp_footer(); @引用Wordpress自带的底部样式文件
         */
        wp_footer();
        ?>

    </main>

</body>