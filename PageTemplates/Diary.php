<?php
/*
Template Name: Diary【日记】
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
                    <!-- 说说开始 -->
                    <div class="say">
                        <img class="say" src="../Images/say.jpg" alt="" class="img-night" style="">
                    </div>

                    <div class="say-main">
                        <div class="say-author">
                            <div class="say-bode">
                                <div class="say-information">
                                    <img alt="" src="https://q.qlogo.cn/headimg_dl?dst_uin=1992890443&amp;spec=640" srcset="https://q.qlogo.cn/headimg_dl?dst_uin=1992890443&amp;spec=640 2x" class="avatar avatar-96 photo" height="96" width="96" decoding="async">

                                    <div class="say-content">
                                        <div class="say-information-name">大绵羊</div>
                                        <div class="say-information-time">2024年1月13日 00:10</div>
                                    </div>
                                </div>
                                <div class="say-substance">
                                    青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- 说说结束 -->
                </div>




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